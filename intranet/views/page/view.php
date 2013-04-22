<h1>Help</h1>
<div class="white_box hide" id="newImage" style="width:auto;left:30%;position:absolute;">
    <?php $this->viewUploadFile($this->id);?>
</div>
<div>
    <?php $this->form->render(); ?>
</div>
<div>
    <ul id="sortable" class="ui-sortable sortable" rel="cosa">
    <?php foreach ($this->Gallery as $key=>$value){?>
    <li id="foo_<?php echo $value['id'];?>" class="ui-state-default" onclick="">
    <img caption="<?php echo $value['caption'];?>" src="<?php echo URL.UPLOAD.$this->id.'/'.$value['thumb'];?>">
    <?php
    // project_model::editImage(1);
    ?>
    <input id="h1096" class="btn editImg" type="button" value="Edit" onclick="location.href='<?php echo URL;?>image/view/<?php echo $value['id'];?>' " style="margin:0;">
    <input id="save" class="btn" type="submit" value="Delete"onclick="location.href='<?php echo URL;?>image/delete/<?php echo $this->id.'/'.$value['id'];?>' " style="background: #bb0000;margin:0;">
    </li>
    <?php }?>
</div>
<div style="text-align: right;">
   <input type="button" id="save" value="Upload" onclick="showPop('newImage');" class="btn" />
</div>