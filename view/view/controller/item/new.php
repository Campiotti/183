<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 19:30
 */
echo $this->formHelper->createForm("user","/item/add","POST"); ?>
<?php echo $this->formHelper->inputGroup('title', 'form-control','text', ['label' => 'Title', 'required'=>true, 'maxlength'=>32]); ?>
<?php echo $this->formHelper->inputGroup('description', 'form-control','text', ['label' => 'Description', 'required'=>true, 'maxlength'=>9999],'textarea'); ?>
<?php echo $this->formHelper->inputGroup('image', 'form-control','file', ['label' => 'Image', 'required'=>true, 'maxlength'=>24, 'accept'=>'image/*', 'onchange'=>"readURL(this,'imeg');"]); ?>
<button type="submit">add</button>
<br>
<div class="imeg"><img id="imeg" src="#" alt="your image" style="visibility: hidden; max-height: 50%; max-width: 75%;"></div>
<br>
<a href="/base/index">Return to Overview</a>
<?php echo $this->formHelper->endForm(); ?>
