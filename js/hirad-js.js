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
        var img_list=[];
        e.preventDefault();
        var mybrand_name = e.target.nextElementSibling.lastElementChild.firstElementChild.innerHTML
        var img_pr=e.target.nextElementSibling.lastElementChild.firstElementChild.nextElementSibling.firstElementChild
         var mybrand= e.target.nextElementSibling.lastElementChild;
        var ul_per= e.target.nextElementSibling.lastElementChild.firstElementChild.nextElementSibling;
        img_pr.innerHTML=""
        console.log(mybrand.childNodes[0].className)
        data_product.forEach(function (t) {
            if (t.company.toUpperCase()==mybrand_name.toUpperCase()){
                img_list.push(t.sn)

            }

        })
        /*var count_ul=img_list.length/3
        count_ul=Math.ceil(count_ul)
        var counter=0
        var o,c,b
        c=0
         b=c+3

        while (counter<count_ul){
            ul_per.innerHTML+="<ul></ul>"
            for (o=c;o<b;o++ ){
                ul_per.childNodes[counter].innerHTML+="<li><img src="+url_product+'/img/'+img_list[o]+" width=100px></li>"
            }
            if (b<img_list.length){
                c=b
                b=c+3
                o=c
            }
            counter=counter+1
        }*/
        if( mybrand.getAttribute ( 'data-open' ) === 'open' ) {
            mybrand.setAttribute( 'data-open', '' );
            mybrand.className = mybrand.className.replace(/\b box_shop_rotate\b/,'');

        }
        else {
            mybrand.setAttribute( 'data-open', 'open' );
            mybrand.className += ' box_shop_rotate';

        } 



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
