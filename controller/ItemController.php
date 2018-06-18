<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 11:55
 */

namespace controller;


use helper\fileUploader;
use models\Item;

class ItemController extends BaseController implements ControllerInterface
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function add()
    {
        if($this->httpHandler->isPost()){
            $this->checkLoggedIn();
            $data = $this->httpHandler->getData();
            $item = new Item();
            $data['image']=$this->uploadImage();
            if($data['image']=="")
                $this->baseRedirect();
            $item->patchEntity($data);
            if($item->isValid())
                $item->save();
        }
        $this->httpHandler->redirect('item','display');
    }

    public function view(int $id)
    {
        $this->checkLoggedIn();
        $item = new Item();
        $item->view($id);
        $this->renderer->setAttribute('item',$item);
        if($item->title==null || $item->title=="")
            $this->baseRedirect();
    }

    public function delete(int $id)
    {
        $this->checkLoggedIn();
        $item = new Item();
        $item->delete($id);
        $this->httpHandler->redirect('item','display');
    }

    public function edit(int $id)
    {
        $this->checkLoggedIn();
        if($this->renderer->sessionManager->getSessionItem('Item','id')!=$id || !$this->httpHandler->isPost())
            $this->baseRedirect();
        $data=$this->httpHandler->getData();
        $old = new Item();
        $new = new Item();
        $old->view($id);
        if(count($_FILES)>0)
            $data['image']=$this->uploadImage();
        else
            $data['image']=$old->image;
        $data['id']=$id;
        $new->patchEntity($data);
        if($new->isValid())
            $new->update();
        $this->httpHandler->redirect('item','view/'.$id);

    }

    public function display(){
        $this->checkLoggedIn();
        $item = new Item();
        $items=$item->viewAll();
        $this->renderer->setAttribute('items',$items);

    }

    public function update(int $id){
        $this->checkLoggedIn();
        $item = new Item();
        $item->view($id);
        $this->renderer->setAttribute('item',$item);
        if($item->title==null)
            $this->baseRedirect();
        $this->renderer->sessionManager->setSessionArray('Item',['id'=>$id]);
    }

    private function uploadImage($name='image',$type=0){
        $fileUploader = new fileUploader();
        return$fileUploader->upload($_FILES[$name],$type);
    }
}