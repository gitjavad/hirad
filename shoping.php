<?php
/**
 * Created by PhpStorm.
 * User: MyMac
 * Date: 10/25/2017 AD
 * Time: 19:44
 */
$category=$_GET['cat'];

       $plug_url=plugins_url('hirad_shoping');
       echo "<script>var url_product='".$plug_url."'</script>";
$s_key=$_POST['key'];
$hostname="localhost";
$user = "hirad_admin15023";
$pass= "9133647736!@#";
$mysql_database = "hirad-co_com_site";
$conn = new mysqli($hostname, $user, $pass, $mysql_database);
mysqli_set_charset($conn,'utf8');
        $res=array();
        $result = $conn->query( "SELECT COUNT(*), company FROM wp_hirad_shoping WHERE cat='".$category."' GROUP BY company" );
        foreach ($result as $row){
            echo "<li>
                   <div class='cbp-pgcontent'>
                      <span class='bk_blb cbp-pgrotate'>Rotate Item</span>";

            echo "    <div class='cbp-pgitem'>
                          <div class='box_shop_brand'>
                            <div class='brand'>{$row->company}</div>
                            <div class='list_product'>
                                ";






            echo      " </div>
                          </div> 
                      </div> 
                      <ul class='cbp-pgoptions'>
                            <li class='cbp-pgoptcompare'>Compare</li>
                            <li class='cbp-pgoptfav'>Favorite</li>
                            <li class='cbp-pgoptsize'>
                                <span data-size='XL'>XL</span>
                                <div class='cbp-pgopttooltip'>
                                    <span data-size='XL'>XL</span>
                                    <span data-size='L'>L</span>
                                    <span data-size='M'>M</span>
                                    <span data-size='S'>S</span>
                                </div>
                            </li>
                            <li class='cbp-pgoptcolor'>
                                <span data-color='c1'>Blue</span>
                                <div class='cbp-pgopttooltip'>
                                    <span data-color='c1'>Blue</span>
                                    <span data-color='c2'>Pink</span>
                                    <span data-color='c3'>Orange</span>
                                    <span data-color='c4'>Green</span>
                                </div>
                            </li>
                            <li class='cbp-pgoptcart'></li>
                      </ul>
                   </div>
                   <div class='cbp-pginfo'>
                        <h3>Save my trees</h3>
                        <span class='cbp-pgprice'>$29</span>
                   </div> 
                   
                  
                  </li>
                   
                   ";

        }

        $result2 = $conn->query("SELECT * FROM wp_hirad_shoping");
          foreach ($result2 as $row2) {

              array_push($res,$row2);




          }

            echo "<script type='text/javascript'>var data_product=[];data_product=".json_encode($res)."</script>"


        ?>
