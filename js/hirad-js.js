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
	var brn_rot =$(".blb_rotate");


    var brand=document.getElementsByClassName('brand_rotate')
	
 brn_rot.on("click",'cbp-pgitem',function(event){
     event.preventDefault();

     console.log($(this).className)

	  /*if( brand.getAttribute ( 'data-open' ) === 'open' ) {
				brand.setAttribute( 'data-open', '' );
				brand.className = brn_rot.className.replace(/\b box_shop_rotate\b/,'');

			}
			else {
         brand.setAttribute( 'data-open', 'open' );
        brand.className += ' box_shop_rotate';
				
			}*/
	 
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
