$(document).ready(function() {
    resizeContainer();
    $(window).on('resize',function(){
        resizeContainer();
    });
    $('.bgContainer').on('mouseenter',function(){
        var desc=$(this).find('.bgDesc');
        desc.queue(function () {
            $(this).clearQueue();
            $(this).addClass('bgDescShow', 500);
          });
    }).on('mouseleave',function(){
        var desc=$(this).find('.bgDesc');
        desc.queue(function () {
            $(this).clearQueue();
            $(this).removeClass('bgDescShow', 500);
        });
    });
    $('.bgContainer').on('click',function(){
         $(this).find(".body-background").ezBgResize({
            img     : BGImageArray[0]
        });
        
        $(this).css({
           position:'relative',
           margin:0,
           left:0,
           'z-index':1
        });
        
        $(this).animate(
        {
            width:$('#container').width()-1
        },
        {
            duration:1000,
            step: function(now, fx) {    
                $(this).change();    
            },
            complete: function (){
                $(this).change(); 
                $('#descMenu').addClass('navBoxShow',500);
            }
        });
        $('.bgContainer').not(this).animate(
        {
            width:0,
            margin:0
        },1000);
    });
  
});
function resizeContainer(){
    $('#container').css('height',$(window).height()-90).change();
}
    
