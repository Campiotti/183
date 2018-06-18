<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 19:30
 */
echo $this->formHelper->createForm("user","/item/add","POST"); ?>
<?php echo $this->formHelper->inputGroup('title', 'form-control','text', ['label' => 'Title', 'required'=>true, 'maxlength'=>16]); ?>
<?php echo $this->formHelper->inputGroup('description', 'form-control','text', ['label' => 'Description', 'required'=>true, 'maxlength'=>9999, 'extra'=>'textarea']); ?>
<?php echo $this->formHelper->inputGroup('image', 'form-control','file', ['label' => 'Image', 'required'=>true, 'maxlength'=>24]); ?>
<button type="submit">add</button>
<br>
<a href="/base/index">Return to Overview</a>
<?php echo $this->formHelper->endForm(); ?>
