jQuery(document).ready(function($){
    // now you can use jQuery code here with $ shortcut formatting
    // this will execute after the document is fully loaded
    // anything that interacts with your html should go here
    document.getElementById("shoping-content").style.cssText= 'display:none' ;
    $("#shoping").click(function(){
        if (document.getElementById("rev_slider_1_2_wrapper")!= null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
        document.getElementById("shoping-content").style.cssText= 'display:block !important' ;
        document.getElementById("parquet").style.cssText = 'display:none';
        document.getElementById("wallcover").style.cssText = 'display:none';
        document.getElementById("floorCovering").style.cssText = 'display:none';
        document.getElementById("decorativetools").style.cssText = 'display:none';
        
document.getElementById("logo_home").style.cssText = 'display:none';

    });
    $("#parqet").click(function () {
        if (document.getElementById("rev_slider_1_2_wrapper")!= null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
    	document.getElementById("shoping-content").style.cssText = 'display: none';
		document.getElementById("parquet").style.cssText = 'display:block !important';
    });
    $("#divarkoob").click(function () {
        if (document.getElementById("rev_slider_1_2_wrapper")!= null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
    	document.getElementById("shoping-content").style.cssText = 'display: none !important';
		document.getElementById("wallcover").style.cssText = 'display:block ';
    });
    $("#kafpoosh").click(function () {
        if (document.getElementById("rev_slider_1_2_wrapper")!= null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
    	document.getElementById("shoping-content").style.cssText = 'display: none !important';
		document.getElementById("floorCovering").style.cssText = 'display:block ';
    });
    $("#abzaredeq").click(function () {
        if (document.getElementById("rev_slider_1_2_wrapper")!= null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
    	document.getElementById("shoping-content").style.cssText = 'display: none !important';
		document.getElementById("decorativetools").style.cssText = 'display:block ';
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
