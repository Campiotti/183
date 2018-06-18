<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 10:45
 */
echo $this->formHelper->createForm("user","/user/update","POST"); ?>
<?php echo $this->formHelper->inputGroup('username', 'form-control','text', ['label' => 'Username', 'required'=>true, 'maxlength'=>16, 'value' => $this->user->username]); ?>
<?php echo $this->formHelper->inputGroup('password', 'form-control','password', ['label' => 'Password', 'required'=>true, 'maxlength'=>24]); ?>
<?php echo $this->formHelper->inputGroup('newpassword', 'form-control','password', ['label' => 'New Password(optional)', 'maxlength'=>24]); ?>
<button>Update</button>
<?php echo $this->formHelper->endForm(); ?>
<br>
<a href="/user/logout">Logout</a>
<br>
<a href="/base/index">Index</a>
<a onclick="document.getElementById('del').style.display='block'" href="#">Delete Account</a>

<a id="del" href="/user/delete/123456789" style="display: none">Confirm Deletion</a>
