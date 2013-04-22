<body> 
    <div class="centered loginBox">
        <p class="title">PLEASE ENTER DE PASSCODE<BR>FROM YOUR WELCOME EMAIL</p><br>
        <form action="login/run" method="post" id="contactform">
            <fieldset>
                <label>E-Mail Address</label>
                <input type='text' value='' name="email">
            </fieldset> 
            <fieldset>
                <label>Passcode</label>
                <input type='password' value='' name="passcode">
            </fieldset>   
            <br>
            <fieldset><input type="submit" value="SUBMIT"></fieldset>
        </form>
    </div>
    <div id="background" class=""><img src="<?php echo URL.'public/images/loginBackground.jpg';?>" alt="Bg"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <?php
    if (isset($this->js)) 
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
    ?>
    <script>
    $(document).ready(function() {
        $("body").ezBgResize({
            img: "<?php echo URL . 'public/images/loginBackground.jpg'; ?>", // Relative path example.  You could also use an absolute url (http://...).
            opacity: 1, // Opacity. 1 = 100%.  This is optional.
            center: true // Boolean (true or false). This is optional. Default is true.
        });
    });
    </script>
    <script src="<?php echo URL;?>public/js/cufon-yui.js"></script>
    <script src="<?php echo URL;?>public/js/Akkurat_400.font.js"></script>
    <script src="<?php echo URL;?>public/js/custom.js"></script>
</body>
</html>