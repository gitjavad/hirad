	<?php global $wp_rewrite; ?>
<section class="centent-hirad">
	<div id="ajax-loader-masonry" class="ajax-loader"></div>

	<div id="logo_home" class="logo-res">
		<?php echo do_shortcode('[rev_slider alias="logo"]') ?>
		<hr>
	</div>



	<?php echo do_shortcode('[rev_slider alias="company-home"]') ?>
	<hr>
<div class="icon_div">
	<ul id="icon_list" class="iconlist animated slideInDown">
		<li class="no_border">
			<i  class="fa fa-paint-brush fa-3x" aria-hidden="true"></i>
			<p class="caption"> استودیوی طراحی</p>
		</li>
		<li>

			<i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>
			<p class="caption">اخبار</p>

		</li>
		<li>

			<i class="fa fa-download fa-3x" aria-hidden="true"></i>
			<p class="caption">دانلودها</p>

		</li>
		<li>

			<i class="fa fa-lightbulb-o fa-3x" aria-hidden="true"></i>
			<p class="caption"> ایده ها</p>

		</li>
		<li>

			<i class="fa fa-university fa-3x" aria-hidden="true"></i>
			<p class="caption">برند شناسی</p>

		</li>
	</ul>
</div>
	<hr>
	<ul id="shoping-content" class="cbp-ig-grid animated slideInLeft ">

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-shoe"></span>
<h3 class="cbp-ig-title">پارکت و کفپوش</h3>
<span class="cbp-ig-category">متریال</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-ribbon"></span>
<h3 class="cbp-ig-title">دیوارکوب</h3>
<span class="cbp-ig-category">متریال</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-milk"></span>
<h3 class="cbp-ig-title">ابزار دکوراتیو</h3>
<span class="cbp-ig-category">ابزار</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-whippy"></span>
<h3 class="cbp-ig-title">نمای کلاسیک</h3>
<span class="cbp-ig-category">ابزار</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-spectacles"></span>
<h3 class="cbp-ig-title">پارتیشن</h3>
<span class="cbp-ig-category">ابزار</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-doumbek"></span>
<h3 class="cbp-ig-title">سنگ</h3>
<span class="cbp-ig-category">متریال </span> </a> </li>


	</ul>



	<hr>

<div id="cbp-pgcontainer" class="cbp-pgcontainer">
	<ul class="cbp-pggrid">
        <?php
       $plug_url=plugins_url('hirad_shoping');
        $res=array();
        global $wpdb;
        $result = $wpdb->get_results( "SELECT COUNT(*), company FROM wp_hirad_shoping WHERE cat='Wood floor' GROUP BY company" );
        foreach ($result as $row){
            echo "<li>
                   <div class='cbp-pgcontent'>
                      <span class='bk_blb cbp-pgrotate'>Rotate Item</span>";

                 echo "    <div class='cbp-pgitem'>
                          <div class='box_shop_brand'>
                            <div>{$row->company}</div>
                            <div>
                                <ul>";
                 $brand="<script type='text/javascript'>
                            $('.bk_blb').on('click','div',function(e) {
                                console.log(e.target.hasChildNodes());
                            })
                            </script>";
            /*$result2=$wpdb->get_results( "SELECT * FROM wp_hirad_shoping WHERE company='".$row->company."'" );
            foreach ($result2 as $row2){



            }

            echo "<li><img src='".$plug_url."/img/".$row2->sn."'></li>";*/




                      echo      " </ul></div>
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

        }?>


</ul>
</div>



	<hr>


	<div id="masonry" class="row">
		<?php $count_ad = 1; if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if (isset($_GET['pnum']) && $_GET['pnum'] > 1) { $paged = 2; } //stop ads from repeating in author page - likes section  ?>

		<?php if (of_get_option('frontpage1_ad') == $count_ad && of_get_option('frontpage1_ad_code') != '' && ($paged == 0 || $paged == 1 || of_get_option('infinitescroll') == 'disable')) { ?>
		<div class="thumb thumb-ad-wrapper">
			<div class="thumb-ad">
				<?php eval('?>' . of_get_option('frontpage1_ad_code')); ?>
			</div>
		</div>
		<?php } ?>

		<?php if (of_get_option('frontpage2_ad') == $count_ad && of_get_option('frontpage2_ad_code') != '' && ($paged == 0 || $paged == 1 || of_get_option('infinitescroll') == 'disable')) { ?>
		<div class="thumb thumb-ad-wrapper">
			<div class="thumb-ad">
				<?php eval('?>' . of_get_option('frontpage2_ad_code')); ?>
			</div>
		</div>
		<?php } ?>

		<?php if (of_get_option('frontpage3_ad') == $count_ad && of_get_option('frontpage3_ad_code') != '' && ($paged == 0 || $paged == 1 || of_get_option('infinitescroll') == 'disable')) { ?>
		<div class="thumb thumb-ad-wrapper">
			<div class="thumb-ad">
				<?php eval('?>' . of_get_option('frontpage3_ad_code')); ?>
			</div>
		</div>
		<?php } ?>

		<?php if (of_get_option('frontpage4_ad') == $count_ad && of_get_option('frontpage4_ad_code') != '' && ($paged == 0 || $paged == 1 || of_get_option('infinitescroll') == 'disable')) { ?>
		<div class="thumb thumb-ad-wrapper">
			<div class="thumb-ad">
				<?php eval('?>' . of_get_option('frontpage4_ad_code')); ?>
			</div>
		</div>
		<?php } ?>

		<?php if (of_get_option('frontpage5_ad') == $count_ad && of_get_option('frontpage5_ad_code') != '' && ($paged == 0 || $paged == 1 || of_get_option('infinitescroll') == 'disable')) { ?>
		<div class="thumb thumb-ad-wrapper">
			<div class="thumb-ad">
				<?php eval('?>' . of_get_option('frontpage5_ad_code')); ?>
			</div>
		</div>
		<?php } ?>

		<?php
		get_template_part( 'index-masonry-inc' );
		$count_ad++;
		endwhile;
		else :
			?>
		<div class="container">
			<div class="row">
				<div class="bigmsg">
					<?php if ($wp->query_vars['pagename'] == 'following') { ?>
					<h4>
						<?php _e('Start following some users or boards to fill this space up', 'ipin'); ?>
					</h4>
					<?php } else { ?>
					<h2>
						<?php _e('Nothing yet.', 'ipin'); ?>
					</h2>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php query_posts( 'cat=16' ); ?>
	<?php get_sidebar('home'); ?>
	<?php get_sidebar('setting'); ?>

<div class="modal" id="post-lightbox" tabindex="-1" aria-hidden="true" role="article"></div>
