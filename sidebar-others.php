<div class="sidebar">
	<?php if (!dynamic_sidebar('sidebar-others') && current_user_can('administrator')) : ?>
		<div class="sidebar-wrapper">
			<div class="sidebar-inner">
				فقط مدیر می تواند این متن را ببیند. برای جایگزینی ابزارک با این متن، آنها را از 
			<a href="<?php echo admin_url('/widgets.php'); ?>">قسمت مدیریت ابزارک ها</a> در ستون های کناری بکشید.</div>
		</div>
	<?php endif ?>
</div>