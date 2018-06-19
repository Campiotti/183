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
    <a href="/item/new">Add Item</a>
    <br>
    <a href="/item/display">Display Items</a>
    <br>
<?php }else{?>
    <a href="/user/login">Login</a>
    <br>
    <a href="/user/register">Register</a>
<?php } ?>
<script>hideLink(10,'DamnDaniel','superSecret')</script>
<a id="superSecret" href="/base/resetDatabase?bypass=" style="display: none">Super Hack Reset Database 3000</a>
