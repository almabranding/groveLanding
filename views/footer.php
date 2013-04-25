<div class="clr"></div></div><div class="clr"></div>
<div id="descMenu" class="navBox">
    <nav id="menu">
    <?php echo $this->getMenu; ?>
    </nav>
</div>
<div id="selectMenu">
<nav id="menu" class="navBox ">
    <?php echo $this->getMenu; ?>
</nav>
<footer>
    <div class="mapSubBar clr">
    <nav class="barLeft">
        <ul>
            <li>
                Building
            </li>
            <li>
                Neighborhood
            </li>
        </ul>
    </nav>
    <nav class="barRight">
        <ul>
            <li>
                Disclaimer
            </li>
            <li>
                Contact
            </li>
            <li>
                Facebook
            </li>
            <li>
                Twitter
            </li>
            <li>
                <img alt="Terra Group" src="<?php echo URL;?>/public/images/terraLogo.png" />
            </li>
        </ul>
    </nav>
    </div>
</footer>
</div>
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