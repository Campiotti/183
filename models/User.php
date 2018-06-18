<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.06.2018
 * Time: 16:34
 */

namespace models;


class user extends Entity
{
    public $username;
    public $password;

    protected function defaultValidationConfiguration()
    {
        $this->validator->isRequired('username');
        $this->validator->maxLength('username',16);
        $this->validator->isRequired('password');

    }

    public function viewByUsername($name){
        $t=$this->queryBuilder->setTable($this->tableName)
            ->setMode(0)
            ->addCond($this->tableName,'username',0,$name,0)
            ->executeStatement()[0];
            $this->patchEntity($t);
    }

}
