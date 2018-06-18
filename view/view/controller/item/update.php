<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 19:30
 */$item=$this->item;
echo $this->formHelper->createForm("user","/item/edit/".$item->getId(),"POST"); ?>
<?php echo $this->formHelper->inputGroup('title', 'form-control','text', ['label' => 'Title', 'required'=>true, 'maxlength'=>32, 'value'=>$item->title]); ?>
<?php echo $this->formHelper->inputGroup('description', 'form-control','text', ['label' => 'Description', 'required'=>true, 'maxlength'=>9999,'value'=>$item->description],'textarea'); ?>
<?php echo $this->formHelper->inputGroup('image', 'form-control','file', ['label' => 'Image']); ?>
    <button type="submit">update</button><br>
    <img src="<?php echo$this->public_image.$item->image?>" alt="product image" style="height: 300px; width: 300px;">
    <br>
    <a onclick="document.getElementById('del').style.display='block'" href="#">Delete Item</a>
    <a id="del" href="/item/delete/<?php echo$item->getId()?>" style="display: none">Confirm Deletion</a>
<?php echo $this->formHelper->endForm(); ?>