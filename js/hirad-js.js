jQuery(document).ready(function($){
  var icon = document.getElementById("icon_list");
    document.getElementById("shoping-content").style.cssText= 'display:none' ;
    $("#shoping").click(function() {
        icon.remove();
        if (document.getElementById("rev_slider_1_2_wrapper") != null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
        document.getElementById("shoping-content").style.cssText = 'display:block !important';
    });
		
        $(".icon_div").append(icon);
        /*
document.getElementById("logo_home").style.cssText = 'display:none';

    });
    var brn_rot =document.getElementById("brand_rotate");




    document.getElementById("blb_rotate").addEventListener("click",function(){
        if( brn_rot.getAttribute ( 'data-open' ) === 'open' ) {
            brn_rot.setAttribute( 'data-open', '' );
            brn_rot.className = brn_rot.className.replace(/\b box_shop_rotate\b/,'');

        }
        else {
            brn_rot.setAttribute( 'data-open', 'open' );
            brn_rot.className += ' box_shop_rotate';

        }

    });*/

    $('.bk_blb').on('click',function (e) {
        e.preventDefault();
       console.log( e.target.parentNode.className)
    })

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
