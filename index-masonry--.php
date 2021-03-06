	<?php global $wp_rewrite; ?>
	<section class="centent-hirad">
	<div id="ajax-loader-masonry" class="ajax-loader"></div>

<div class="logo-res">
	<?php echo do_shortcode('[rev_slider alias="logo"]') ?>
	<hr>
</div>


	
	<?php echo do_shortcode('[rev_slider alias="company-home"]') ?>
<hr>

	<div id="brand" class="row">
	<div class="col-md-6">
		<?php echo do_shortcode('[rev_slider alias="Category"]') ?>
	</div>
	<div class="col-md-6">
		<?php echo do_shortcode('[rev_slider alias="brand"]') ?>
	</div>
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
		get_template_part('index-masonry-inc');
		$count_ad++;
		endwhile;
		else :
		?>
		<div class="container">
			<div class="row">
				<div class="bigmsg">
					<?php if ($wp->query_vars['pagename'] == 'following') { ?>
					<h4><?php _e('Start following some users or boards to fill this space up', 'ipin'); ?></h4>
					<?php } else { ?>
					<h2><?php _e('Nothing yet.', 'ipin'); ?></h2>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php get_sidebar('home'); ?>
<?php get_sidebar('setting'); ?>

<div class="modal" id="post-lightbox" tabindex="-1" aria-hidden="true" role="article"></div>

