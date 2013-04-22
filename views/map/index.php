<ul id="carousel" class="map-list">
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
        <li id="<?php echo $value['id'];?>">
            <div class="carouselBox" style="margin:auto">
            <div class="primaryInfo" style="<?php echo $infoStyle;?>">
                <p><?php echo $description; ?></p>
            </div>
            <div class="primaryImage" style="<?php echo $imgStyle;?>">
                <?php { 
                    echo '<img class="map" alt="map" src="'.URL.UPLOAD.$value['page'].'/'.$value['img'].'" />';
                 }?>
            </div>
            </div>
        </li>
<?php } ?>
</ul>
<div id="imgFull">
    <div id="bgPrev" class="elastislide-prev bgControl bgPrev"></div>
    <div id="bgNext" class="elastislide-next bgControl bgNext"></div>
    <div class="preload preloadW"></div>
    <img class="imgBG" id="imgBG" src="" alt="Bg"> 
</div>
<div id="gallerys" class="clearfix fluid masonry" style="<?php if(sizeof($this->gallery)==1) echo 'display:none'; ?>">
    <?php foreach ($this->gallery as $id => $value) { ?>
        <div class="gallerysBox">
            <div class="gallerysBoxImg">
                <a href="#<?php echo $value['id'];?>"><img title="<?php echo URL . UPLOAD . $value['page']. '/' . $value['img']; ?>" ref="<?php echo $id; ?>" src="<?php echo URL . UPLOAD . $this->page['id'] . '/thumb_' . $value['img']; ?>" alt="<?php echo $value['caption']; ?>"></a>
            </div>
            <div class="gallerysBoxInfo"><p><?php echo $value['name'];?></p></div>
        </div> 
    <?php } ?>
    <div class="clr"></div>
</div>
<div class="clr"></div>


