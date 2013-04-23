<?php
function ValidarDatos($campo){
	//Array con las posibles cabeceras a utilizar por un spammer
	$badHeads = array("Content-Type:",
	"MIME-Version:",
	"Content-Transfer-Encoding:",
	"Return-path:",
	"Subject:",
	"From:",
	"Envelope-to:",
	"To:",
	"bcc:",
	"cc:");
	
	//Comprobamos que entre los datos no se encuentre alguna de
	//las cadenas del array. Si se encuentra alguna cadena se
	//dirige a una página de Forbidden
	foreach($badHeads as $valor){
            if(strpos(strtolower($campo), strtolower($valor)) !== false){
                header("HTTP/1.0 403 Forbidden");
                exit;
            }
	}
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        ValidarDatos($_POST['mail']);
	$mail = "dmartin@terragroup.com,nherrera@terragroup.com,info@groveatgrandbay.com,pfreedman@groveatgrandbay.com,lbarroso@terragroup.com";
        //$mail ='dan@almabranding.com';
        $to = $mail;
	$subject = "Grove";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: contact@terragroup.com" . "\r\n";
	$body = "";
        $body.= 'Name: '.$_POST['name'].'<br/>';		
	$body.= 'Mail: '.$_POST['email'].'<br/>';
        $body.= 'Phone: '.$_POST['phone'].'<br/>';	
	mail($to, $subject, $body, $headers);
        if(empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['phone'])){
            header("location:/");	
            exit;
        }
        header("Location: index.php");
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Grove at Grand Bay</title>
<meta property="og:site_name" content="Image Nation" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="http://www.almabranding.com" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script src="http://www.google.com/jsapi"></script>
<script>google.load("jquery", "1");</script>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.ez-bg-resize.js"></script>
<script src="js/cufon-yui.js"></script>
<script src="js/AvenirLight_300.font.js"></script>
<script src="js/AvenirMedium_550.font.js"></script>

<script type="text/javascript">
    Cufon.set('fontSize', '14px').replace('*', { fontFamily: 'AvenirMedium'});    
    Cufon.set('fontSize', '18px').replace('h2', { fontFamily: 'AvenirMedium'});
    Cufon.set('fontSize', '25px').replace('h1', { fontFamily: 'AvenirMedium'});
    
    $(document).ready(function() {
    if (screen.width > 699) {        
        $("body").ezBgResize({
                img     : "http://groveatgrandbay.com/temp/images/background.jpg", // Relative path example.  You could also use an absolute url (http://...).
                opacity : 1, // Opacity. 1 = 100%.  This is optional.
                center  : true // Boolean (true or false). This is optional. Default is true.
        });
        
    } 
    var quiz= [
        "Somewhere extraordinary",
        "In a customizable home in the sky",
        "A place with between 307 and 375ft of frontage",
        "A place with between 307 and 375ft of frontage",
        "Somewhere with up to 11,000 sq ft of living space",
        "Within the historic and cultural heart of Miami",
        "A place with at least 2 bedrooms",
        "Over 2 floors"];
        var fQuiz = quiz[Math.floor(Math.random()*quiz.length)];
        $('#quiz').html(fQuiz);
        $('#TWIST').on('click',function(){
            var fQuiz = quiz[Math.floor(Math.random()*quiz.length)];
            $('#quiz').html(fQuiz);
            Cufon.set('fontSize', '17px').replace('h2', { fontFamily: 'AvenirMedium'});
        });
        $('#STICK').on('click',function(){
            $('#qform').toggle();
            $('.form').toggle();
            Cufon.set('fontSize', '24px').replace('h2', { fontFamily: 'AvenirMedium'});
        }); 
});

</script>
</head>
<body ondragstart="return false" style="overflow: auto;">
<div id="floater"></div>
<header class="header">
    <h1>
        WHERE WOULD <br>YOU LIKE TO LIVE?
    </h1>
    <div id="qform"> 
    <h2>
        <p id="quiz"></p>
    </h2>
        <br/><br/>
    <input class="button" type="submit" value="STICK" id="STICK" style="width: 100px;margin-right: 40px;">
    <input class="button" type="submit" value="TWIST" id="TWIST" style="width: 100px;">
    </div>
    <div class="form" style="display: none">
        <div>
            <h2>
                Excellent choice
            </h2>
            <p>
                Enter your details below and we’ll let you know <br/>when we’re ready to accommodate you.
            </p>
        </div>
        <div>
            <form id="form" name="form" action="" method="POST" enctype="multipart/form-data">
                <div>
                <label for="name" id='name'>Name</label>
                <input type="text" value="" name="name">
                </div>
                <div>
                <label for="phone" id='phone'>Phone</label>
                <input type="text" value="" name="phone">
                </div>
                <div>
                <label for="email" id='email'>Email</label>
                <input type="text" value="" name="email">
                </div>
                <div>
                <input type="submit" value="Submit" class="button">
                </div>
            </form>
        </div>
    </div>
        
    <div id="sended" style="display: none">
        <p>
        <br/><br/>Your message has been sent.
        </p>
    </div>
    <div>
        <img src="http://groveatgrandbay.com/temp/images/grove.png" alt="Grove">
    </div>
    <div>
        <p>3 bedroom residences priced from $3,000,000<br>
        Sales <br>
        2675 South Bayshore Drive <br>
        Coconut Grove, FL 33133<br>
        877 316 4806</p>
    </div>
    <div style="height: 30px;">
        <input style="width: 100px;" onclick="window.open('http://65.97.138.211:5000/','_blank');" type="submit" value="Watch us grow" class="button">
    </div></a>

    <div>
        <img style="float:left;" src="images/terra.png" alt="Terra Group"><div style="position:relative;top:8px;left:8px">Owned and developed by Terra Group</div>
    </div>
    <div>
       <div>Full website redesign coming soon.</div>
    </div>
</header>
<script>
 
$('form').submit(function(){
    var flag=true;
    $('input').each(function(){
        if($(this).val()===''){
            $(this).css('border-bottom', '2px solid #fc5a5a');
            flag=false;
        }
        $(this).on('focus',function(){
            $(this).css('border-bottom', '2px solid #BE9E7E');
        });
    });
    if(flag){
        $('#sended').toggle();
        $('.form').toggle();
        $.post("", $("#form").serialize());
    }
    return false;
});
</script>
</body>
