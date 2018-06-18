<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.06.2018
 * Time: 11:26
 */
echo $this->formHelper->createForm("user","/user/login","POST"); ?>
<?php echo $this->formHelper->inputGroup('username', 'form-control','text', ['label' => 'Username', 'required'=>true, 'maxlength'=>16]); ?>
<?php echo $this->formHelper->inputGroup('password', 'form-control','password', ['label' => 'Password', 'required'=>true, 'maxlength'=>24]); ?>
<button type="submit">Login</button>
<br>
<a href="/user/register">Don't have an account yet? click here!</a>
<?php echo $this->formHelper->endForm(); ?>
