<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 20:41
 */$item=$this->item;?>
<h1><?php echo$item->title?></h1><br>
<textarea readonly><?php echo$item->description?></textarea><br>
<img src="<?php echo$this->public_image.$item->image?>">
