
jQuery(document).ready(function($){

  var icon = document.getElementById("icon_list");
    var main=document.getElementById('main_shop')
    var child_ul
    var data_product
    document.getElementById("shoping-content").style.cssText= 'display:none' ;
    $("#shoping").click(function() {
        icon.remove();
        if (document.getElementById("rev_slider_1_2_wrapper") != null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
        document.getElementById("shoping-content").style.cssText = 'display:block !important';
    });
		$('.shoping_blb').on('click','h3',function (e) {
            document.getElementById("cbp-pgcontainer").style.cssText='display:block !important';
            document.getElementById('masonry').style.cssText='display:none !important'
            e.preventDefault();
            var cbs = e.target.getAttribute('data-name')
            console.log(cbs)

            $.ajax({
                url:'http://hirad-co.com/wp-content/themes/hirad-site/shoping.php?cat='+cbs,
                dataType:'json',
                success:function (data) {

data_product=data.product
                    main.innerHTML=""

                        for (var i=0;i<data.brand.length;i++){

                            main.innerHTML+="<li><div class='cbp-pgcontent'><span class='bk_blb cbp-pgrotate'>Rotate Item</span>" +
                                "<div class='cbp-pgitem'><div class='box_shop_brand'>  <div class='brand'>"+data.brand[i]+"</div>"+
                                "<div class='list_product'></div></div></div>"+"<ul class='cbp-pgoptions'> <li class='cbp-pgoptcompare'>Compare</li>"+
                                "<li class='cbp-pgoptfav'>Favorite</li>"+
                                "<li class='cbp-pgoptsize'><span data-size='XL'>XL</span><div class='cbp-pgopttooltip'>"+
                                "<span data-size='XL'>XL</span><span data-size='L'>L</span><span data-size='M'>M</span>"+
                                "<span data-size='S'>S</span></div></li><li class='cbp-pgoptcolor'><span data-color='c1'>Blue</span>"+
                                " <div class='cbp-pgopttooltip'> <span data-color='c1'>Blue</span> <span data-color='c2'>Pink</span>"+
                                " <span data-color='c3'>Orange</span><span data-color='c4'>Green</span></div></li>"+
                                " <li class='cbp-pgoptcart'></li></ul></div><div class='cbp-pginfo'><h3>Save my trees</h3> <span class='cbp-pgprice'>$29</span>"+
                                "</div></li>"
                        }

                    }

            })
        })
        $(".icon_div").append(icon);


    $('body').on('click','.bk_blb',function (e) {
        console.log("hi")
        var img_list=[];
        e.preventDefault();
        var mybrand_name = e.target.nextElementSibling.lastElementChild.firstElementChild.innerHTML
        var img_pr=e.target.nextElementSibling.lastElementChild.firstElementChild.nextElementSibling.firstElementChild
         var mybrand= e.target.nextElementSibling.lastElementChild;
        var ul_per= e.target.nextElementSibling.lastElementChild.firstElementChild.nextElementSibling;
        /*img_pr.innerHTML=""*/

        data_product.forEach(function (t) {
            if (t.company.toUpperCase()==mybrand_name.toUpperCase()){
                img_list.push(t.sn)

            }

        })

        var count_ul=img_list.length/3
        count_ul=Math.ceil(count_ul)
        ul_per.innerHTML=""
        for (var i=0;i<count_ul;i++){
            ul_per.innerHTML+="<ul></ul>"
        }

        var counter=0
        var o,c,b
        c=0
         b=c+3
var b_d=0

        while (counter<count_ul){
            child_ul=ul_per.children
            for (o=c;o<b;o++ ){

                if (b_d<img_list.length){
                    var text_sn=img_list[o].replace(".jpg","");
                    child_ul[counter].innerHTML+="<li><img src=http://hirad-co.com/wp-content/plugins/hirad_shoping/img/"+img_list[o]+" width=100%><p>"+text_sn+"</p></li>"
                }else{
                    child_ul[counter].innerHTML+="<li width='100%'></li>"

                }
                b_d=b_d+1;
            }

            if (b<img_list.length){
                c=b
                b=c+3
                o=c
            }
            counter=counter+1
        }
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
