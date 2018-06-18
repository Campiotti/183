<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 08:42
 */
?>

<?php if($this->sessionManager->isSet('User')){?>
<a href="/user/login">Login</a>
    <br>
<?php }?>
<a href="/user/register">Register</a>