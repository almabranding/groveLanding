var std=({
    fontFamily:     'Akkurat',
    color:          '#7f7e82',
    letterSpacing:  '0.3em',
    fontSize:       '11px',
});
$(document).ready(function() {
    $('.teamCol').each(function(){
        if($(this).find('.teamText').height()+$(this).find('.teamPic').height()>550){
            $(this).find('.teamText').toggleClass( "teamTextShort");
            $(this).append('<div class="teamRead">Read More</div>');
        }
        Cufon.replace('.teamRead', std);
    });
    $('.teamRead').on('click',function(){
        var col=$(this).parent();
        col.find('.teamText').toggleClass( "teamTextShort", 2000 );
        if(col.find('.teamText').hasClass( "teamTextShort" )) $(this).text('Read Less');
        else $(this).text('Read More');
        Cufon.replace('.teamRead', std);
    });
   
});