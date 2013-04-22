$(document).ready(function() {
    var mapZoom=0;
    var BGnum=0;
    var frame=240;
    var URL='http://borndevelopments.com/glass/';
    
    $('.fitScreen').on("click",function(){
        
        
    });
    $('header').on('mouseenter',function(){
        $('.menuOpt').queue(function () {
            $(this).clearQueue();
            $(this).not('.selected').animate({
                opacity: 1,
                height: '17px',
                margin: '5px auto'
              }, 500);
          });
    }).on('mouseleave',function(){
        $('.menuOpt').queue(function () {
            $(this).clearQueue();
            $(this).not('.selected').animate({
                opacity: 0,
                height: '0px'
              }, 500);
        });
    });        
    var std=({
        fontFamily:     'Akkurat',
        color:          '#7f7e82',
        letterSpacing:  '0.3em',
        fontSize:       '11px',
    });
    var link=({
        fontFamily:     'Akkurat',
        color:          '#807f83',
        letterSpacing:  '0.3em',
        fontSize:       '11px',
        hover: {
            color:      '#2d2427',
            fontSize:   '11px'
        }
    });
    var menuLink=({
        fontFamily:     'Akkurat',
        color:          '#7f7e82',
        letterSpacing:  '0.3em',
        fontSize:       '11px',
        hover: {
            color:      '#2d2427',
            fontSize:   '11px'
        }
    });
    var menu=({
        fontFamily:     'Akkurat',
        color:          '#2d2427',
        letterSpacing:  '0.3em',
        fontSize:       '13px',
    });
    var frameContent=({
        fontFamily:     'Akkurat_bold',
        color:          '#2d2427',
        letterSpacing:  '0.8em',
        fontSize:       '13px',
    });
    Cufon.replace('p,span,label', std);
    Cufon.replace('.menuOpt', menuLink);
    Cufon.replace('.menuTitlespan', menu);
    Cufon.replace('.frameContent', frameContent);
    Cufon.replace('.link', link);
    Cufon.replace('.bold', frameContent);
    
});

        
    
    
    
    //Cufon.set('fontSize', '13px').set('color', '#2f292b').set('letterSpacing', '1em').replace('.title', { fontFamily: 'Akkurat'});
    //Cufon.set('fontSize', '14px').set('color', '#2f292b').set('letterSpacing', '1em').replace('h1', { fontFamily: 'Akkurat'});

    