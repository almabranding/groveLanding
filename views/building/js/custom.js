var carousel;
var carouselPos=0;
var ROOT='/glass/';
$(window).load(function(){  
    carousel=$( '#carousel' ).elastislide({
        minItems: 1
    });
    $('#gallerys').masonry({
        itemSelector: '.gallerysBox',
        columnWidth: 130,
        isAnimated: true,
        isFitWidth: true
    });
    $('#gallerys').masonry('reload');
    
});
$('.fitScreen').on('click',function(){
   fitScreen();
});
$(window).on('resize',function(){
  resampleBG();    
});

$('.gallerysBoxImg img').on('click',function(){
    changeBG(this);
});
function control(btn){
    if(btn==='next') carouselPos++;
    if(btn==='prev') carouselPos--;
    console.log(carouselPos);
}
$('.bgControl').on('click',function(){
    var max=$('.gallerysBox').length-1;
    if($(this).hasClass('bgPrev')){
        carouselPos--;
        if(carouselPos<0)carouselPos=max;
    }
    if($(this).hasClass('bgNext')){
        carouselPos++;
        if(carouselPos>max)carouselPos=0;
    }
    console.log(carouselPos);
    var img=$('img[ref="'+carouselPos+'"]');
    changeBG(img);
});
function fitScreen(){
     if(!$("#container").hasClass('fullScreen')){
         jQuery('html,body').animate({scrollTop: $("#carousel").offset().top}, 1000);
         $('#container').toggleClass("fullScreen");
         $('#gallerys').masonry('reload');
        var URLBG=$('img[ref="'+carouselPos+'"]').attr('title');
        $('.imgBG').attr('src',URLBG);
        /*$("#body-background").ezBgResize({
            img     : URLBG,
            opacity : 1,
            center  : true		
        }); */
        $("#imgFull").fadeIn();
        $('.preload').hide();
        $('.elastislide-wrapper').css(
            {
                opacity:'0',
                position:'absolute',
                width:0
            }
        );
        //$('#whiteBG').css('display','block');
        //$('#whiteBG').css('height',$('#imgFull').height());
        $('#gallerys').css('left','10px');
        $('#wrapper').css('background-position','right center');
        $('#gallerys').masonry('reload');
        resampleBG();    
    }else{
          
        //$('#whiteBG').css('display','none');
        $('#gallerys').css('left','0');
        $('#wrapper').css('background-position','center center');
        $('#gallerys').masonry('reload');
         
        $("#imgFull").delay(1000).fadeOut(function(){
            $('.elastislide-wrapper').css(
                {
                  opacity:'1',
                  position:'relative',
                  width:'auto'
                }
            );  
                $('#container').toggleClass("fullScreen");
                $('#gallerys').masonry('reload');
            carousel._slideTo(carouselPos);
        });
    }
    $('#gallerys').masonry('reload');

}
function changeBG(img){
    jQuery('html,body').animate({scrollTop: $("#carousel").offset().top}, 1000);
    carouselPos=$(img).attr('ref');
    var link=$(img).attr('title');
    carousel._slideTo(carouselPos);
    $('.preload').show();
    $('.imgBG').fadeOut(function(){
        $(this).attr('src','');
        $(this).load(link,function(){
            $(this).attr('src',link);
            $('.preload').delay(100).hide('fast',function(){ 
                $('.imgBG').fadeIn();
                resampleBG();
            });;
        });
    });
    
}
function resampleBG(){
        var Wh=$(window).height()-180;
        var img = document.getElementById('imgBG'); 
        var bgH=Math.min(Wh,img.clientHeight);
        $('#imgFull').css('height',img.clientHeight);
}