<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Glass</title>
    <meta charset="UTF-8"> 
    <meta property="og:site_name" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!--<link rel="shortcut icon" href="../favicon.ico" Content-type="image/x-icon" />-->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/elastislide.css" />
    <?php
    if (isset($this->css)) 
        foreach ($this->css as $css)
            echo '<link rel="stylesheet" href="'.URL.'views/'.$css.'"/>';
    ?>
    
</head>
    
    