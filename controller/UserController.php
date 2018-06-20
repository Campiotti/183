<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.06.2018
 * Time: 11:14
 */

namespace controller;


use models\user;

class UserController extends BaseController implements ControllerInterface
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function add()
    {
        $user = new user();
        if($this->httpHandler->isPost() && !$this->renderer->sessionManager->isSet('User')){
            $data=$this->httpHandler->getData();
            if($data['password']!=$data['password2']){
                $this->httpHandler->redirect('user','register');
                $this->createAlert('Register failed',"Password repeat did not match!",false);
                die();
            }
            $usr = new user();
            $usr->viewByUsername($data['username']);
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $user->patchEntity($data);
            if($user->isValid() && $usr->getId() == null){
                $user->save();
                $this->httpHandler->redirect('user', 'login');
                $this->createAlert('Register succeeded','you can now login',true);
                die();
            }
            $this->httpHandler->redirect('user','register');
            $this->createAlert('Register failed',"username already taken!",false);
        }
    }

    public function view(int $id)
    {
        // TODO: Implement view() method.
    }

    public function delete(int $id)
    {
        if($this->httpHandler->isPost() && $this->renderer->sessionManager->isSet('User')){
            $user = new user();
            $user->delete($id);
            if($this->renderer->sessionManager->getSessionItem('User','id')==$id)
                $this->logout();
        }
        $this->baseRedirect();
    }

    public function edit(int $id)
    {
        if($this->httpHandler->isPost() && $this->renderer->sessionManager->isSet('User')){
            $user = new user();
            $data=$this->httpHandler->getData();
            $user->patchEntity($data);

            if($user->isValid())
                $user->update();
        }
        $this->baseRedirect();
    }

    public function register(){
        //placeholder function.
    }

    public function login(){

        if($this->httpHandler->isPost() && !$this->renderer->sessionManager->isSet('User')){
            $data=$this->httpHandler->getData();
            $user=$this->renderer->queryBuilder->setTable('User')
                ->setMode(0)
                ->addCond('User','username',0,$data['username'],0)
                ->executeStatement()[0];
            if(password_verify($data['password'],$user['password'])){
                $ussr=$this->renderer->queryBuilder->setTable('User')->setMode(0)
                    ->addCond('User','id',0,$user['id'],0)
                    ->executeStatement()[0];
                $this->renderer->sessionManager->regenSessionId();
                $this->renderer->sessionManager->setSessionArray('User',$ussr);
                $this->httpHandler->redirect('user','profile');
            }
        }
    }

    public function profile(){
        $this->checkLoggedIn('Error','you\'re not logged in!');
        $user = new user();
        $user->view($this->renderer->sessionManager->getSessionItem('User','id'));
        $this->renderer->setAttribute('user',$user);
    }

    public function logout(){
        session_destroy();
        $this->httpHandler->redirect('base','index');
    }

    public function update(){
        $this->checkLoggedIn('Error','You need to be logged in to do that!');
        $new = new user();
        $old = new user();
        $usr = new user();
        if($this->httpHandler->isPost() && $this->renderer->sessionManager->isSet('User')){
            $old->view($this->renderer->sessionManager->getSessionItem('User','id'));
            $data = $this->httpHandler->getData();
            $usr->viewByUsername($data['username']);
            if(($usr->getId() == $old->getId() || $usr->getId()==null) && password_verify($data['password'],$old->password)){
                if($data['newpassword']!=null && strlen($data['newpassword'])>0)
                    $data['password']=$data['newpassword'];
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                $data['id']=$old->getId();
                $new->patchEntity($data);
                if($new->isValid()){
                    $new->update();
                    $this->createAlert('Success','successfully updated your profile info!',true);
                }else
                    $this->createAlert('Error','There was an error handling your request',false);

            }else
                $this->createAlert('Error','Wrong password entered, please try again!',false);
        }
        $this->httpHandler->redirect('user','profile');
    }
}