jQuery(document).ready(function($){
  var icon = document.getElementById("icon_list");
    document.getElementById("shoping-content").style.cssText= 'display:none' ;
    $("#shoping").click(function(){
		icon.remove();
        if (document.getElementById("rev_slider_1_2_wrapper")!= null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
        document.getElementById("shoping-content").style.cssText= 'display:block !important' ;
     
		
        $(".icon_div").append(icon);
document.getElementById("logo_home").style.cssText = 'display:none';

    });
	
  document.getElementById("blb_rotate").addEventListener("click",function(){
	  console.log("salam");
	 /*$(".box_shop_brand").className += ' box_shop_rotate'; */
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
