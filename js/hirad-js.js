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
	var brn_rot =$(".brand_rotate");


	
	
 blb_rotate.on("click",'div',function(eveny){
     event.preventDefault();

     var blb_rotate=$(event.target).children();
	  if( blb_rotate.getAttribute ( 'data-open' ) === 'open' ) {
				blb_rotate.setAttribute( 'data-open', '' );
				blb_rotate.className = brn_rot.className.replace(/\b box_shop_rotate\b/,'');

			}
			else {
         blb_rotate.setAttribute( 'data-open', 'open' );
        blb_rotate.className += ' box_shop_rotate';
				
			}
	 
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
