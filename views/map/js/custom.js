var carousel;
var carouselPos=0;
var ROOT='/glass/';
$(window).load(function(){  
    $('#gallerys').masonry({
        itemSelector: '.gallerysBox',
        columnWidth: 130,
        isAnimated: true,
        isFitWidth: true
    });
    $('#gallerys').masonry('reload');
    var sample = 3;
    var smPos = 153;
    var spPos = 153;
    var sW;
    var sH;
    
        $('.map').each(function(){
            $(this).smoothZoom({
                zoom_MAX:200,
                button_SIZE:22,
                pan_BUTTONS_SHOW: 'NO',
                button_ALIGN:'bottom center',
                zoom_OUT_TO_FIT:'NO'
            });
        });
   
    
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
        $("#imgFull").fadeIn();
        $('.preload').hide();
        $('.map-list').css(
            {
                opacity:'0',
                position:'absolute',
                width:0
            }
        );
        $('#gallerys').css('left','10px');
        $('#wrapper').css('background-position','right center');
        $('#gallerys').masonry('reload');
        resampleBG();    
    }else{
        $('#gallerys').css('left','0');
        $('#wrapper').css('background-position','center center');
        $('#gallerys').masonry('reload');   
        $("#imgFull").delay(1000).fadeOut(function(){
            $('.map-list').css(
                {
                  opacity:'1',
                  position:'relative',
                  width:'auto'
                }
            );  
            $('#container').toggleClass("fullScreen");
            $('#gallerys').masonry('reload');
            var parent=$('img[ref="'+carouselPos+'"]').parent();
            window.location = parent.attr('href');
        });
    }
    $('#gallerys').masonry('reload');

}
function changeBG(img){
    jQuery('html,body').animate({scrollTop: $("#carousel").offset().top}, 1000);
    carouselPos=$(img).attr('ref');
    var link=$(img).attr('title');
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