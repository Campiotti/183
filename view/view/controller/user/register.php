<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.06.2018
 * Time: 16:20
 */
echo $this->formHelper->createForm("user","/user/add","POST"); ?>
<?php echo $this->formHelper->inputGroup('username', 'form-control','text', ['label' => 'Username', 'required'=>true, 'maxlength'=>16]); ?>
<?php echo $this->formHelper->inputGroup('password', 'form-control','password', ['label' => 'Password', 'required'=>true, 'maxlength'=>24]); ?>
<?php echo $this->formHelper->inputGroup('password2', 'form-control','password', ['label' => 'Password Again', 'required'=>true, 'maxlength'=>24]); ?>
<button type="submit">Register</button>
<br>
<a href="/user/login">Already have an account? click here!</a>
<?php echo $this->formHelper->endForm(); ?>
