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
        if($this->httpHandler->isPost() && $this->renderer->sessionManager->isSet('User')){
            $data = $this->httpHandler->getData();
            $item = new Item();
            $data['image']=$this->uploadImage();
        }
    }

    public function view(int $id)
    {
        // TODO: Implement view() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function edit(int $id)
    {
        // TODO: Implement edit() method.
    }

    public function display(){
        $item = new Item();
        $items=$item->viewAll();
        $this->renderer->setAttribute('items',$items);
    }

    private function uploadImage($name='image',$type=0){
        $fileUploader = new fileUploader();
        return$fileUploader->upload($_FILES[$name],$type);
    }
}