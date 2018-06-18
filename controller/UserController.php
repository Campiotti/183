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
                echo"Password repeat did not match!";
                die();
            }
            $user->patchEntity($data);
            if($user->isValid()){
                $user->save();
                $this->httpHandler->redirect('user', 'login');
            }
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
                $this->renderer->sessionManager->unsetSessionArray('User');
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
                $this->renderer->sessionManager->setSessionArray('User',$ussr);
            }
        }
    }
}