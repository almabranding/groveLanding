<body>
<div id="wrapper">
<?php Session::init(); ?>
    <header>
        <div class="fitScreenBar"><div class="fitScreen"><img src="<?php echo URL;?>public/images/fitScreen.png">Fit to screen</div></div>
    <div class="header">
        <div class="logo">
            <a href="index.php">
                <div id="logo_img"></div>
            </a>
        </div>
    <nav id="menu">
        <?php echo $this->getMenu; ?>
    </nav>
    <div class="clr"></div>
    </div>
</header>
<div id="white_full" class="hide" onclick="$('.hide').css('display','none').html('')"></div>
<div id="white_box" class="hide"></div>
<div id="container">
    
    