<script>
    var BGImageArray=new Array('<?php echo URL . 'public/images/home.jpg'; ?>');
</script>

<?php for($i=0;$i<20;$i++){?>
<div class="bgContainer">
    <div class="body-background" class="">
        <img class="imgBG" src="<?php echo URL . 'public/images/home.jpg'; ?>" alt="Bg">
    </div>
    <div class="bgDesc">
        Descripcion
    </div>
</div>
<?php }?>

