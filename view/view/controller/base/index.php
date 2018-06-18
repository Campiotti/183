<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 08:42
 */
?>

<?php if($this->sessionManager->isSet('User')){?>
    <a href="/user/profile">Profile</a>
    <br>
    <a href="/item/display">Display Items</a>
    <br>
<?php }else{?>
    <a href="/user/login">Login</a>
    <br>
    <a href="/user/register">Register</a>
<?php } ?>