jQuery(document).ready(function($){
  
    document.getElementById("shoping-content").style.cssText= 'display:none' ;
    $("#shoping").click(function(){
        if (document.getElementById("rev_slider_1_2_wrapper")!= null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
        document.getElementById("shoping-content").style.cssText= 'display:block !important' ;
     
        document.getElementById("icon_list").removeClass("animated").addClass("animated");
document.getElementById("logo_home").style.cssText = 'display:none';

    });
  
    $( window ).on( "orientationchange", function( event ) {
        location.reload();
    });
});
/*function openNav() {
    document.getElementById("sid-setting").style.cssText = 'display:block !important';
}
function closeNav() {
    document.getElementById("sid-setting").style.cssText = 'display:none !important';
}*/
