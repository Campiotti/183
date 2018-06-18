<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 19:44
 */
?>
<!--a href="/base/index">Index</a><br-->
<?php $i=1;foreach($this->items as $item){?>
    <?php if($i%4==1)
        echo'<div class="itemRow">'?>
<div class="listItem">
    <h2 class="itemTitle"><?php echo$item->title?></h2>
    <div class="itemDesc"><?php echo substr($item->description,0,100)?></div>
    <img src="<?php echo$this->public_image.$item->image?>" alt="image" class="itemImage"><br>
    <a class="itemLink" href="/item/update/<?php echo$item->getId()?>">Update</a>
</div>
    <?php if($i%4==1)
        echo"</div>"?>
<?php $i++;}?>
