<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 11:56
 */

namespace models;


class Item extends Entity
{
    public $title;
    public $description;
    public $image;


    protected function defaultValidationConfiguration()
    {
        $this->validator->isRequired('title');
        $this->validator->isRequired('description');
        $this->validator->isRequired('image');
        $this->validator->maxLength('title',32);
        $this->validator->maxLength('description',8192);
    }
}