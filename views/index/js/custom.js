$(document).ready(function() {
    var mapZoom=0;
    var BGnum=0;
    var frame=240;
    $(window).on('resize',function(){
        var f=$('.accessFrame').width();
        var bodySize=$(window).width()-f;
        $('#body').css(
            {
                width:bodySize+'px'
            }
        ).change();
    });
    $('.labelInfo').on('mouseover',function(){
        var bodySize=$(window).width()-frame;
        $('#body').queue(function () {
            $(this).clearQueue();
            $(this).animate(
                {
                    width:bodySize+'px',
                    left:frame+'px'
                },
                {
                    duration:500,
                    step: function(now, fx) {    
                        $(this).change();    
                    },
                    complete: function (){
                        $(this).change(); 
                    }
                });
            });
        $('.accessFrame').queue(function () {
            $(this).clearQueue();
            $(this).animate({
                width:frame+'px'
            },500);
        });     
    });
    $('#body-background').on('mouseover',function(){ 
        var bodySize=$(window).width();
        $('#body').queue(function () {
            $(this).clearQueue();
            $(this).animate(
                {
                    width:bodySize+'px',
                    left: '0px'
                },
                {
                    duration:500,
                    step: function(now, fx) {    
                        $(this).change();    
                    },
                    complete: function (){
                        $(this).change(); 
                    }
                }
                );
        });
        $('.accessFrame').queue(function () {
            $(this).clearQueue();
            $(this).animate({
                width:'0px'
            },500);
        }); 
    });
    $('.labelNext').on('click',function(){
        BGnum++;
        if(BGnum>=BGImageArray.length)BGnum=0;
	var BGImage = BGImageArray[BGnum];
        $('.preload').show();
        $('.imgBG').fadeOut(function(){
            $(this).attr('src','');
            $(this).load(BGImage,function(){
                $(this).attr('src',BGImage);
                $('.preload').delay(500).hide('fast',function(){
                    $('.imgBG').fadeIn();
                });
                
            });
        });
        
        
    });
    $('.startForm').on('click',function(){
        $('.frameContent').toggle();
        $('.frameForm').toggle();
    });
 
    $("#body-background").ezBgResize({
        img     : BGImageArray[0]
    });
  
});
    
