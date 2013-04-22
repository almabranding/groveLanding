<div class="clr"></div></div><div class="clr"></div>
<footer>
    <div class="mapSubBar clr">
    <div class="barLogo"><img alt="Terra Group" src="/glass/public/images/terraLogo.png" /></div>
    <div class="barText">&copy;TERRA GROUP 2013&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DISCLAIMER</div>
    </div>
</footer>
</div>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src="<?php echo URL;?>public/js/custom.js"></script>
    <script src="<?php echo URL;?>public/js/cufon-yui.js"></script>
    <script src="<?php echo URL;?>public/js/Akkurat_400.font.js"></script>
<?php
    if (isset($this->js)) 
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
?>
</body>
</html>