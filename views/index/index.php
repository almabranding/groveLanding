<body>
    <div class="accessFrame">
        <div class="frameContent">
            <p class="bold" style="color:#000;">GLASS</p>
            <p class="bold">120 Ocean Drive<br>Miami Beach</p>
            <p class="bold">18 floors,<br>10 residences,<br>360 views</p>
            <p class="bold">Starting at 7 million</p>
            <p class="bold">2,500 sq fr on floors  6 & 7<br>3,000 sq fr on floors 8 - 15<br>9,000SQ ft on floors PH<br>(occupying flors 16 - 18)</p>
            <br>
            <br><p class="link startForm"> ACCESS THE WEBSITE</p>
        </div>
        <div class="frameForm">
            <p class="bold" style="">PLEASE COMPLETE<br>THE FORM BELOW TO<br>ACCESS THE GLASS<br> WEBSITE</p>
            <p>GLASS<br>120 Ocean Drive<br>Miami Beach, Florida 33139<br>glass120ocean.com</p>
            <p>Representation:<br>Eloy Carmenale<br>ONE Sotheby's International Realty<br>119 Washington Avenue, Suite 600<br>Miami Beach, FL 33139<br>305.282.7179</p>
            <p>Owned and developed by Terra Group.<br>Broker participation welcome.</p>
            <div>
                <form action="form/register" method="post" id="contactform">
                    <fieldset>
                        <label>Name</label>
                        <input type='text' value='' name="name">
                    </fieldset> 
                    <fieldset>
                        <label>Last name</label>
                        <input type='text' value='' name="last">
                    </fieldset>   
                    <fieldset>
                        <label>Email address</label>
                        <input type='text' value='' name="email">
                    </fieldset>   
                    <fieldset>
                        <label>Subject</label>
                        <input type='text' value='' name="subject">
                    </fieldset>   
                    <fieldset>
                        <label>Message</label>
                        <textarea value='' name="message"></textarea>
                    </fieldset>
                    <fieldset><input type="submit" value="SUBMIT"></fieldset>
                </form>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div id="body">
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script>
        <?php
        foreach ($this->gallery as $value) { 
            $php_array[]=URL.UPLOAD.$value['page'].'/'.$value['img'];
        }
        $js_array = json_encode($php_array);
        $js_array=str_replace('\\/', '/', $js_array);
        echo "var BGImageArray = ". $js_array . ";\n";
        ?>
        
    </script>
    <?php
    if (isset($this->js)) 
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
    ?>
    <script src="<?php echo URL;?>public/js/cufon-yui.js"></script>
    <script src="<?php echo URL;?>public/js/Akkurat_400.font.js"></script>
    <script src="<?php echo URL;?>public/js/custom.js"></script>
</body>
</html>