
<ul id="carousel" class="elastislide-list">
<?php foreach ($this->gallery as $id => $value) { 
        $description=($value['replace'])?$value['info']:$this->page['content'];
        if(!$description){
            $infoStyle='display:none';
            $imgStyle='';
        }else{
            $infoStyle='display:inherit';
            $imgStyle='';
        }
    ?>
        <li>
            <div class="carouselBox" style="margin:auto">
            <div class="primaryInfo" style="<?php echo $infoStyle;?>">
                <p><?php echo $description; ?></p>
            </div>
            <div class="primaryImage" style="<?php echo $imgStyle;?>">
                <a href="#"><img src="<?php echo URL . UPLOAD . $this->page['id'] . '/' . $value['img']; ?>" alt="<?php echo $value['caption']; ?>" onDrag='return false;' onmousedown='return false' /></a>
            </div>
            </div>
        </li>
<?php } ?>
</ul>
<div id="imgFull">
    <div id="bgPrev" class="elastislide-prev bgControl bgPrev"></div>
    <div id="bgNext" class="elastislide-next bgControl bgNext"></div>
    <div class="preload preloadW"></div>
    <img class="imgBG" id="imgBG" src="<?php echo URL.'public/images/homeBG01.jpg';?>" alt="Bg"> 
</div>
<div id="gallerys" class="clearfix fluid masonry">
    <?php foreach ($this->gallery as $id => $value) { ?>
        <div class="gallerysBox">
            <div class="gallerysBoxImg">
                <img title="<?php echo URL . UPLOAD . $this->page['id'] . '/' . $value['img']; ?>" ref="<?php echo $id; ?>" src="<?php echo URL . UPLOAD . $this->page['id'] . '/thumb_' . $value['img']; ?>" alt="<?php echo $value['caption']; ?>">
            </div>
            <div class="gallerysBoxInfo"><p><?php echo $value['name'];?></p></div>
        </div> 
    <?php } ?>
    <div class="clr"></div>
</div>
<div class="clr"></div>


