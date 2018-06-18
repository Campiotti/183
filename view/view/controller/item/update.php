<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 19:30
 */$item=$this->item;
echo $this->formHelper->createForm("user","/item/edit/$item->id","POST"); ?>
<?php echo $this->formHelper->inputGroup('title', 'form-control','text', ['label' => 'Title', 'required'=>true, 'maxlength'=>32, 'value'=>$item->title]); ?>
<?php echo $this->formHelper->inputGroup('description', 'form-control','text', ['label' => 'Description', 'required'=>true, 'maxlength'=>9999, 'extra'=>'textarea','value'=>$item->description]); ?>
<?php echo $this->formHelper->inputGroup('image', 'form-control','file', ['label' => 'Image']); ?>
    <img src="<?php echo$this->public_image.$item->image?>" alt="product image">
    <button type="submit">update</button>
    <br>
    <a href="/base/index">Return to Overview</a>
<?php echo $this->formHelper->endForm(); ?>