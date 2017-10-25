jQuery(document).ready(function($){
  var icon = document.getElementById("icon_list");

    var child_ul

    document.getElementById("shoping-content").style.cssText= 'display:none' ;
    $("#shoping").click(function() {
        icon.remove();
        if (document.getElementById("rev_slider_1_2_wrapper") != null)
            document.getElementById("rev_slider_1_2_wrapper").remove();
        document.getElementById("shoping-content").style.cssText = 'display:block !important';
    });
		$('.shoping_blb').on('click','h3',function (e) {
            e.preventDefault();
        var cbs=e.target.getAttribute('data-name')
            console.log(cbs)
           /* $('#main_shop').load("../wp-content/themes/hirad-site/shoping.php");*/
var node=document.getElementsByClassName('main_shop')
            node[0].innerHTML="\n" +
                "       $plug_url=plugins_url('hirad_shoping');\n" +
                "       echo \"<script>var url_product='\".$plug_url.\"'</script>\";\n" +
                "        $res=array();\n" +
                "        global $wpdb;\n" +
                "        $result = $wpdb->get_results( \"SELECT COUNT(*), company FROM wp_hirad_shoping WHERE cat='Wood floor' GROUP BY company\" );\n" +
                "        foreach ($result as $row){\n" +
                "            echo \"<li>\n" +
                "                   <div class='cbp-pgcontent'>\n" +
                "                      <span class='bk_blb cbp-pgrotate'>Rotate Item</span>\";\n" +
                "\n" +
                "            echo \"    <div class='cbp-pgitem'>\n" +
                "                          <div class='box_shop_brand'>\n" +
                "                            <div class='brand'>{$row->company}</div>\n" +
                "                            <div class='list_product'>\n" +
                "                                \";\n" +
                "\n" +
                "\n" +
                "\n" +
                "\n" +
                "\n" +
                "\n" +
                "            echo      \" </div>\n" +
                "                          </div> \n" +
                "                      </div> \n" +
                "                      <ul class='cbp-pgoptions'>\n" +
                "                            <li class='cbp-pgoptcompare'>Compare</li>\n" +
                "                            <li class='cbp-pgoptfav'>Favorite</li>\n" +
                "                            <li class='cbp-pgoptsize'>\n" +
                "                                <span data-size='XL'>XL</span>\n" +
                "                                <div class='cbp-pgopttooltip'>\n" +
                "                                    <span data-size='XL'>XL</span>\n" +
                "                                    <span data-size='L'>L</span>\n" +
                "                                    <span data-size='M'>M</span>\n" +
                "                                    <span data-size='S'>S</span>\n" +
                "                                </div>\n" +
                "                            </li>\n" +
                "                            <li class='cbp-pgoptcolor'>\n" +
                "                                <span data-color='c1'>Blue</span>\n" +
                "                                <div class='cbp-pgopttooltip'>\n" +
                "                                    <span data-color='c1'>Blue</span>\n" +
                "                                    <span data-color='c2'>Pink</span>\n" +
                "                                    <span data-color='c3'>Orange</span>\n" +
                "                                    <span data-color='c4'>Green</span>\n" +
                "                                </div>\n" +
                "                            </li>\n" +
                "                            <li class='cbp-pgoptcart'></li>\n" +
                "                      </ul>\n" +
                "                   </div>\n" +
                "                   <div class='cbp-pginfo'>\n" +
                "                        <h3>Save my trees</h3>\n" +
                "                        <span class='cbp-pgprice'>$29</span>\n" +
                "                   </div> \n" +
                "                   \n" +
                "                  \n" +
                "                  </li>\n" +
                "                   \n" +
                "                   \";\n" +
                "\n" +
                "        }\n" +
                "\n" +
                "        $result2 = $wpdb->get_results(\"SELECT * FROM wp_hirad_shoping\");\n" +
                "          foreach ($result2 as $row2) {\n" +
                "\n" +
                "              array_push($res,$row2);\n" +
                "\n" +
                "\n" +
                "\n" +
                "\n" +
                "          }\n" +
                "\n" +
                "            echo \"<script type='text/javascript'>var data_product=[];data_product=\".json_encode($res).\"</script>\"\n" +
                "\n" +
                "\n" +
                "        ?>\n"

        })
        $(".icon_div").append(icon);

    $('.bk_blb').on('click',function (e) {
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
                    child_ul[counter].innerHTML+="<li><img src="+url_product+'/img/'+img_list[o]+" width=100%><p>"+text_sn+"</p></li>"
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
