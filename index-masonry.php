	<?php global $wp_rewrite; ?>

<section class="centent-hirad">
	<div id="ajax-loader-masonry" class="ajax-loader"></div>




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
	<ul id="shoping-content" class="shoping_blb cbp-ig-grid animated slideInLeft ">

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-shoe"></span>
<h3 class="cbp-ig-title" data-name="wood floor">پارکت و کفپوش</h3>
<span class="cbp-ig-category">متریال</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-ribbon"></span>
<h3 class="cbp-ig-title" data-name="Wall Panel">دیوارکوب</h3>
<span class="cbp-ig-category">متریال</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-milk"></span>
<h3 class="cbp-ig-title" data-name="ابزار دکوراتیو">ابزار دکوراتیو</h3>
<span class="cbp-ig-category">ابزار</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-whippy"></span>
<h3 class="cbp-ig-title" data-name="نمای کلاسیک">نمای کلاسیک</h3>
<span class="cbp-ig-category">ابزار</span> </a> </li>

		<li> <a href="#"> <span class="cbp-ig-icon cbp-ig-icon-spectacles"></span>
<h3 class="cbp-ig-title" data-name="پارتیشن">پارتیشن</h3>
<span class="cbp-ig-category">ابزار</span> </a> </li>

		<li> <a href="#" > <span class="cbp-ig-icon cbp-ig-icon-doumbek"></span>
<h3 class="cbp-ig-title" data-name="Stone">سنگ</h3>
<span class="cbp-ig-category">متریال </span> </a> </li>


	</ul>




    <?php
    $plugin_url=plugins_url('hirad_shoping');
    echo '<script>var url_product='.$plugin_url.'</script>'
    ?>

<div id="cbp-pgcontainer" class="cbp-pgcontainer">
        <ul id="main_shop"  class=" cbp-pggrid"></ul>
</div>

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
