<?php
function optionsframework_option_name() {
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

add_action('admin_init', 'optionscheck_change_santiziation', 100);
  
function optionscheck_change_santiziation() {
    remove_filter('of_sanitize_textarea', 'of_sanitize_textarea');
	remove_filter('of_sanitize_text', 'sanitize_text_field');
    add_filter('of_sanitize_textarea', 'custom_sanitize_input');
    add_filter('of_sanitize_text', 'custom_sanitize_input');
}
  
function custom_sanitize_input($input) {
    return $input;
}

if (isset($_GET['settings-updated']) && of_get_option('default_avatar') != '') {
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	$image = wp_get_image_editor(get_home_path() . str_replace(home_url('/'), '', of_get_option('default_avatar')));
	$ext = explode('.', of_get_option('default_avatar'));
	$ext = strtolower(array_pop($ext));
	$upload_dir = wp_upload_dir();
	
	if (!is_wp_error($image)) {
		$image->resize(96, 96, true);
		$image->save($upload_dir['basedir'] . '/avatar-96x96.' . $ext);
		update_option('ipin_avatar_96', $upload_dir['baseurl'] . '/avatar-96x96.' . $ext);
		$image->resize(48, 48, true);
		$image->save($upload_dir['basedir'] . '/avatar-48x48.' . $ext);
		update_option('ipin_avatar_48', $upload_dir['baseurl'] . '/avatar-48x48.' . $ext);
	}
} else if (isset($_GET['settings-updated']) && of_get_option('default_avatar') == '') {
	$ext = explode('.', get_option('ipin_avatar_48'));
	$ext = array_pop($ext);
	$upload_dir = wp_upload_dir();

	delete_option('ipin_avatar_48');
	delete_option('ipin_avatar_96');

	if (file_exists($upload_dir['basedir'] . '/avatar-48x48.' . $ext))
		unlink($upload_dir['basedir'] . '/avatar-48x48.' . $ext);

	if (file_exists($upload_dir['basedir'] . '/avatar-96x96.' . $ext))
		unlink($upload_dir['basedir'] . '/avatar-96x96.' . $ext);
}

function optionsframework_options() {
	// Pull all the parent categories into an array	
	$options_categories = array('');
	$options_categories_obj = get_categories('hide_empty=0&exclude=1');
	foreach ($options_categories_obj as $category) {
		if ($category->category_parent == 0) {
			$options_categories[$category->cat_ID] = $category->cat_name;
		}
	}
	
	// Pull all pages into an array	
	$options_pages = array('');
	$options_pages_obj = get_pages();
	foreach ($options_pages_obj as $page) {
			$options_pages[$page->ID] = $page->post_title;
	}
	
	$options = array();
	
	$options[] = array(
		'name' => __('اصلی', 'options_framework_theme'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('رنگ بندی', 'options_framework_theme'),
		'id' => 'color_scheme',
		'std' => 'light',
		'type' => 'radio',
		'options' => array('light' => __('روشن', 'options_framework_theme'), 'dark' => __('تاریک', 'options_framework_theme')));
		
	$options[] = array(
		'name' => __('نمایش وصله ها در صفحه نخست بر اساس', 'options_framework_theme'),
		'id' => 'frontpage_popularity',
		'std' => 'showall',
		'type' => 'radio',
		'options' => array('likes' => __('محبوب ترین ها', 'options_framework_theme'), 'repins' => __('بیشترین باز وصل ها', 'options_framework_theme'), 'comments' => __('بیشترین دیدگاه ها', 'options_framework_theme'), 'random' => __('تصادفی', 'options_framework_theme'), 'showall' => __('نمایش همه', 'options_framework_theme')));

	$options[] = array(
		'desc' => __('آخرین X روز (فقط برای محبوب ترین ها/بیشترین باز وصل ها/بیشترین دیدگاه ها)', 'options_framework_theme'),
		'id' => 'frontpage_popularity_duration',
		'std' => '180',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('نمایش وصله های محبوب بر اساس', 'options_framework_theme'),
		'id' => 'popularity',
		'std' => 'showall',
		'type' => 'radio',
		'options' => array('likes' => __('محبوب ترین ها', 'options_framework_theme'), 'repins' => __('بیشترین باز وصل ها', 'options_framework_theme'), 'comments' => __('بیشترین دیدگاه', 'options_framework_theme'), 'showall' => __('نمایش همه', 'options_framework_theme')));

	$options[] = array(
		'desc' => __('آخرین X روز (فقط برای محبوب ترین ها/بیشترین باز وصل ها/بیشترین دیدگاه ها)', 'options_framework_theme'),
		'id' => 'popularity_duration',
		'std' => '180',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'desc' => __('اگر سایت شما به تازگی راه اندازی شده است، گزینه "نمایش همه" را انتخاب کنید تا صفحه نخست و صفحه وصله های محبوب خالی نباشید. پس از آن شما می توانید گزینه دلخواه خود را انتخاب نمائید.', 'options_framework_theme'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('تصویر لوگوی سر صفحه', 'options_framework_theme'),
		'desc' => __('طول لوگو باید در اندازه 50px باشد. عرض انعطاف پذیر است. برای استفاده از متن به عنوان لوگو، این گزینه را خالی نگه دارید.', 'options_framework_theme'),
		'id' => 'logo',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('تصویر گزینه وصل کردن با دکمه', 'options_framework_theme'),
		'desc' => __('برای استفاده از متن پیشفرض وصل کردن با دکمه که در آدرس <a href="' . home_url('/itm-settings/') . '">افزودن > وصله</a> قرار دارد، این گزینه را خالی نگه دارید.', 'options_framework_theme'),
		'id' => 'pinit_button',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('نگاره پیشفرض', 'options_framework_theme'),
		'desc' => __('اندازه توصیه شده: 96px در 96px. برای استفاده از <a target="_blank" href="' . get_template_directory_uri() . '/img/avatar-48x48.png">نگاره پیشفرض</a> این گزینه را خالی نگه دارید.', 'options_framework_theme'),
		'id' => 'default_avatar',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('پیغام سر صفحه برای کاربران مهمان', 'options_framework_theme'),
		'id' => 'top_message',
		'std' => 'علاقه مندی های خود را مدیریت کرده و به اشتراک بگذارید.',
		'type' => 'text');

	$options[] = array(
		'name' => __('آدرس شبکه های اجتماعی', 'options_framework_theme'),
		'desc' => __('آدرس صفحه فیسبوک. برای مخفی سازی آیکون، این گزینه را خالی نگه دارید.', 'options_framework_theme'),
		'id' => 'facebook_icon_url',
		'std' => 'http://facebook.com/#',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('آدرس صفحه توئیتر. برای مخفی سازی آیکون، این گزینه را خالی نگه دارید.', 'options_framework_theme'),
		'id' => 'twitter_icon_url',
		'std' => 'http://twitter.com/#',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('تعداد دیدگاه ها در صفحه نخست', 'options_framework_theme'),
		'desc' => __('برای مخفی سازی دیدگاه ها در صفحه نخست، 0 را وارد نمائید.', 'options_framework_theme'),
		'id' => 'frontpage_comments_number',
		'std' => '2',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('دیدگاه های فیسبوک', 'options_framework_theme'),
		'desc' => __('چنانچه فعال گردد، جعبه دیدگاه های فیسبوک در صفحه وصله ها به نمایش گذاشته خواهد شد.', 'options_framework_theme'),
		'id' => 'facebook_comments',
		'std' => 'enable',
		'type' => 'radio',
		'options' => array('enable' => __('فعال', 'options_framework_theme'), 'disable' => __('غیرفعال', 'options_framework_theme')));
		
	$options[] = array(
		'name' => __('نمایش باز وصل ها', 'options_framework_theme'),
		'desc' => __('چنانچه غیر فعال گردد، باز وصل ها در صفحه نخست، دسته ها و برچسب ها مخفی خواهد شد.', 'options_framework_theme'),
		'id' => 'show_repins',
		'std' => 'enable',
		'type' => 'radio',
		'options' => array('enable' => __('فعال', 'options_framework_theme'), 'disable' => __('غیرفعال', 'options_framework_theme')));
		
	$options[] = array(
		'name' => __('بارگذاری خودکار', 'options_framework_theme'),
		'desc' => __('چنانچه غیرفعال گردد، صفحه بندی عادی به نمایش گذاشته خواهد شد. این پوسته با افزونه <a href="http://wordpress.org/extend/plugins/wp-pagenavi/">WP-PageNavi</a> هماهنگ سازی شده است، اما اگر گزینه بارگذاری خودکار فعال باشد، صفحه بندی عادی غیرفعال می گردد.', 'options_framework_theme'),
		'id' => 'infinitescroll',
		'std' => 'enable',
		'type' => 'radio',
		'options' => array('enable' => __('فعال', 'options_framework_theme'), 'disable' => __('غیرفعال', 'options_framework_theme')));

	$options[] = array(
		'name' => __('جعبه روشن', 'options_framework_theme'),
		'desc' => __('چنانچه غیرفعال گردد، با کلیک وصله ها در صفحه جدید باز می شوند، در غیر اینصورت وصله بوسیله جعبه ای در همان صفحه به نمایش گذاشته خواهد شد.', 'options_framework_theme'),
		'id' => 'lightbox',
		'std' => 'enable',
		'type' => 'radio',
		'options' => array('enable' => __('فعال', 'options_framework_theme'), 'disable' => __('غیرفعال', 'options_framework_theme')));
		
	$options[] = array(
		'name' => __('فرم عنوان و توضیحات', 'options_framework_theme'),
		'desc' => __('برای استفاده در فرم های افزودن/ویرایش وصله ها.', 'options_framework_theme'),
		'id' => 'form_title_desc',
		'std' => 'single',
		'type' => 'radio',
		'options' => array('single' => __('نمایش گزینه توضیحات به تنهایی', 'options_framework_theme'), 'separate' => __('نمایش گزینه های عنوان و توضیحات به صورت جداگانه', 'options_framework_theme')));

	$options[] = array(
		'name' => __('کد HTML', 'options_framework_theme'),
		'desc' => __('با فعالسازی این گزینه، ویرایشگر کد HTML در گزینه توضیحات به نمایش گذاشته خواهد شد.', 'options_framework_theme'),
		'id' => 'htmltags',
		'std' => 'disable',
		'type' => 'radio',
		'options' => array('enable' => __('فعال', 'options_framework_theme'), 'disable' => __('غیرفعال', 'options_framework_theme')));
		
	$options[] = array(
		'name' => __('ورودی برچسب', 'options_framework_theme'),
		'desc' => __('اگر می خواهید کاربران برای وصله های خود برچسب انتخاب کنند، این گزینه را فعال سازید.', 'options_framework_theme'),
		'id' => 'posttags',
		'std' => 'disable',
		'type' => 'radio',
		'options' => array('enable' => __('فعال', 'options_framework_theme'), 'disable' => __('غیرفعال', 'options_framework_theme')));
		
	$options[] = array(
		'name' => __('ورودی منبع', 'options_framework_theme'),
		'desc' => __('چنانچه این گزینه فعال باشد، کاربر مجاز است منبع وصله خود را ذکر نماید.', 'options_framework_theme'),
		'id' => 'source_input',
		'std' => 'disable',
		'type' => 'radio',
		'options' => array('enable' => __('فعال', 'options_framework_theme'), 'disable' => __('غیرفعال', 'options_framework_theme')));

	$options[] = array(
		'name' => __('نشان واحد پول', 'options_framework_theme'),
		'desc' => __('به صورت پیشفرض تومان می باشد. برای غیرفعال کردن ورودی قیمت و برچسب آن در وصله ها، این گزینه را خالی نگه دارید.', 'options_framework_theme'),
		'id' => 'price_currency',
		'std' => 'تومان',
		'type' => 'text');
		
	$options[] = array(
		'id' => 'price_currency_position',
		'std' => 'left',
		'type' => 'radio',
		'options' => array('left' => __('نشان در سمت چپ', 'options_framework_theme'), 'right' => __('نشان در سمت راست', 'options_framework_theme')));

	$options[] = array(
		'name' => __('حذف حساب توسط کاربر', 'options_framework_theme'),
		'desc' => __('چنانچه فعال باشد، کاربر می تواند حساب کاربری خود را از طریق صفحه <a href="' . home_url('/settings/') . '">تنظیمات</a> حذف نماید. مدیریت همیشه می تواند لینک حذف حساب کاربری را مشاهده نماید.', 'options_framework_theme'),
		'id' => 'delete_account',
		'std' => 'disable',
		'type' => 'radio',
		'options' => array('enable' => __('فعال', 'options_framework_theme'), 'disable' => __('غیرفعال', 'options_framework_theme')));

	$options[] = array(
		'name' => __('ساخت تخته برای کاربران جدید', 'options_framework_theme'),
		'desc' => __('تخته های موردنظر خود را با کامای انگلیسی از هم جدا سازید. برای مثال: هنرمندان, تکنولوژی, تغذیه', 'options_framework_theme'),
		'id' => 'auto_create_boards_name',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('شناسه تخته موردنظر خود را با کامای انگلیسی از هم جدا سازید. برای مثال: 1, 4, 2. شما می توانید شناسه تخته ها را از <a href="' . admin_url('post-new.php?post_type=page') . '">نوشته‌ها > دسته‌ها</a> بیابید.', 'options_framework_theme'),
		'id' => 'auto_create_boards_cat',
		'std' => '',
		'type' => 'text');

	/* $options[] = array(
		'name' => __('Auto Follow These Users for New Users', 'options_framework_theme'),
		'desc' => __('Enter user IDs seperated by commas e.g 1, 23, 45', 'options_framework_theme'),
		'id' => 'auto_default_follows',
		'type' => 'text');
	*/

	$options[] = array(
		'name' => __('تنظیمات ارسال ایمیل', 'options_framework_theme'),
		'desc' => __('آدرس ایمیل', 'options_framework_theme'),
		'id' => 'outgoing_email',
		'std' => 'noreply@' . parse_url(home_url(), PHP_URL_HOST),
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('از طرف چه کسی؟', 'options_framework_theme'),
		'id' => 'outgoing_email_name',
		'std' => get_bloginfo('name'),
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('گزینه "از طرف" ایمیل شما. برای ارسال اطلاعیه های پسندها، دنبال کردن ها، دیدگاه ها و...', 'options_framework_theme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('زمانبندی ها', 'options_framework_theme'),
		'desc' => __('نوشته در هر', 'options_framework_theme'),
		'id' => 'prune_postnumber',
		'std' => '5',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('دقیقه', 'options_framework_theme'),
		'id' => 'prune_duration',
		'std' => '5',
		'type' => 'text');

	$options[] = array(
		'desc' => __('وقتی کاربری وصله یا تخته ای را حذف می کنند، به عنوان نخاله نشانه گذاری شده تا بعداً حذف گردند. این  اطلاعات برروی سرور شما نگه داری می گردند و شما می توانید تصمیم بگیرید که چگونه حذف شوند.', 'options_framework_theme'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('کد امنیتی فرم ورود/نام نویسی', 'options_framework_theme'),
		'desc' => __('کلید سایت ریکپچا', 'options_framework_theme'),
		'id' => 'captcha_public',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('کلید امنیتی ریکپچا', 'options_framework_theme'),
		'id' => 'captcha_private',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('برای دریافت این کلیدها در <a href="http://www.google.com/recaptcha/">گوگل ریکچا</a> عضو شوید. برای مخفی سازی کد امنیتی این گزینه ها را خالی نگه دارید.', 'options_framework_theme'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('شرایط سرویس دهی برای صفحه نام نویسی', 'options_framework_theme'),
		'desc' => __('ابتدا برای ایجاد صفحه به آدرس <a href="' . admin_url('post-new.php?post_type=page') . '">برگه‌ها > افزودن برگه</a> بروید. اگر نمی خواهید کاربران شما گزینه شرایط سرویس دهی را تیک بزنند، این گزینه را خالی نگه دارید.', 'options_framework_theme'),
		'id' => 'register_agree',
		'type' => 'select',
		'options' => $options_pages);
		
	$options[] = array(
		'name' => __('دسته بندی برای وبلاگ', 'options_framework_theme'),
		'desc' => __('مخفی سازی دسته وبلاگ در صفحه افزودن/ویرایش وصله. اگر به وبلاگ نیازی ندارید این گزینه را خالی نگه دارید.', 'options_framework_theme'),
		'id' => 'blog_cat_id',
		'std' => '0',
		'type' => 'select',
		'options' => $options_categories);
		
	$options[] = array(
		'name' => __('اسکریپت های سرصفحه', 'options_framework_theme'),
		'desc' => __('افزودن اسکریپت دلخواه قبل از تگ &lt;/head>.', 'options_framework_theme'),
		'id' => 'header_scripts',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('اسکریپت های پاصفحه', 'options_framework_theme'),
		'desc' => __('افزودن اسکریپت دلخواه قبل از تگ &lt;/body>. برای مثال: آنالیزر گوگل.', 'options_framework_theme'),
		'id' => 'footer_scripts',
		'type' => 'textarea');

	/*
	$options[] = array(
		'name' => __('Browser Extension Pack ID', 'options_framework_theme'),
		'desc' => __('If you purchase the optional Browser Extension Pack, enter the ID to activate (<a href="http://ericulous.com/2013/09/18/browser-addonsextensions-pack-for-ipin-pro/" target="_blank">how to get ID</a>).', 'options_framework_theme'),
		'id' => 'browser-extension-id',
		'std' => '',
		'type' => 'text');
	*/
	
	$options[] = array(
		'name' => __('تبلیغات', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('تبلیغات سرصفحه', 'options_framework_theme'),
		'desc' => __('HTML / PHP / Javascript مجاز می باشند.', 'options_framework_theme'),
		'id' => 'header_ad',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('صفحه نوشته - بالای تصویر', 'options_framework_theme'),
		'desc' => __('عرض توصیه شده: 700px یا کمتر. HTML / PHP / Javascript مجاز می باشند. توجه: تبلیغاتی که پایه آنها Javascript باشد ممکن است در جعبه روشن نمایش داده نشوند. تنها در صفحه نوشته به نمایش گذاشته خواهند شد.', 'options_framework_theme'),
		'id' => 'single_pin_above_ad',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('صفحه نوشته - زیر تصویر', 'options_framework_theme'),
		'desc' => __('عرض توصیه شده: 700px یا کمتر. HTML / PHP / Javascript مجاز می باشند. توجه: تبلیغاتی که پایه آنها Javascript باشد ممکن است در جعبه روشن نمایش داده نشوند. تنها در صفحه نوشته به نمایش گذاشته خواهند شد.', 'options_framework_theme'),
		'id' => 'single_pin_below_ad',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('تبلیغات بندانگشتی صفحه نخست #1', 'options_framework_theme'),
		'desc' => __('نمایش قبل از چند وصله؟', 'options_framework_theme'),
		'id' => 'frontpage1_ad',
		'std' => '1',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('عرض توصیه شده: 200px یا کمتر. HTML / PHP / Javascript مجاز می باشند.', 'options_framework_theme'),
		'id' => 'frontpage1_ad_code',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('تبلیغات بندانگشتی صفحه نخست #2', 'options_framework_theme'),
		'desc' => __('نمایش قبل از چند وصله؟', 'options_framework_theme'),
		'id' => 'frontpage2_ad',
		'std' => '2',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('عرض توصیه شده: 200px یا کمتر. HTML / PHP / Javascript مجاز می باشند.', 'options_framework_theme'),
		'id' => 'frontpage2_ad_code',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('تبلیغات بندانگشتی صفحه نخست #3', 'options_framework_theme'),
		'desc' => __('نمایش قبل از چند وصله؟', 'options_framework_theme'),
		'id' => 'frontpage3_ad',
		'std' => '3',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('عرض توصیه شده: 200px یا کمتر. HTML / PHP / Javascript مجاز می باشند.', 'options_framework_theme'),
		'id' => 'frontpage3_ad_code',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('تبلیغات بندانگشتی صفحه نخست #4', 'options_framework_theme'),
		'desc' => __('نمایش قبل از چند وصله؟', 'options_framework_theme'),
		'id' => 'frontpage4_ad',
		'std' => '4',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('عرض توصیه شده: 200px یا کمتر. HTML / PHP / Javascript مجاز می باشند.', 'options_framework_theme'),
		'id' => 'frontpage4_ad_code',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('تبلیغات بندانگشتی صفحه نخست #5', 'options_framework_theme'),
		'desc' => __('نمایش قبل از چند وصله؟', 'options_framework_theme'),
		'id' => 'frontpage5_ad',
		'std' => '5',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('عرض توصیه شده: 200px یا کمتر. HTML / PHP / Javascript مجاز می باشند.', 'options_framework_theme'),
		'id' => 'frontpage5_ad_code',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('یادداشت ها', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'desc' => __('
		<h2>افزونه های توصیه شده</h2>
		<ol>
		<li><a href="http://wordpress.org/extend/plugins/wp-super-cache/" target="_blank">WP Super Cache</a></li>
		<ul>
		<li>- برگه پیشرفته: "صفحات برای کاربران شناخته شده کش نشوند" باید تیک خورده باشد.</li>
		</ul>
		<li><a href="http://wordpress.org/plugins/wordpress-social-login/" target="_blank">WordPress Social Login</a> (به کاربران این امکان را می دهد تا از طریق شبکه های توئیتر و فیسبوک وارد سایت گردند).</li>
		<ul>
		<li>- برگه شبکه ها: تنها برروی فیسبوک، توئیتر و گوگل امتحان شده است.</li>
		<li>- برگه بونسر: امکانات را پشتیبانی نمی کند.</li>
		<li>- برگه ابزارک:<br />--- نگاره کاربران: نمایش نگاره پیشفرض برای کاربران.<br />--- جریان احراز هویت: بدون پنجره پاپ آپ.</li>
		</ul>
		</ol>

		<hr style="border:none;border-top:1px solid #ccc;color" />
		<h2>افزودن وصله ها</h2>
		<p>تمامی کاربران باید وصله خود را از طریق فرانت‌اِند (بالا، سمت چپ، گوشه)  > افزودن > <a href="' . home_url('/itm-settings/') . '" target="_blank">وصله</a> ارسال نمایند. برای ارسال وصله توسط بک‌اِند از آدرس: مدیریت وردپرس > نوشته‌ها > افزودن نوشته اقدام فرمائید.</p>
		<ol>
		<li>"تصویر شاخص" باید تنظیم گردد.</li>
		<li>نوشته باید در دسته بندی مشابه منتشر شود. برای مثال اگر نوشته ای در دسته تکنولوژی ارسال شود و تخته ای با این نام وجود نداشته باشد، تخته به صورت خودکار ساخته خواهد شد.</li>
		<ul>
		</ol>
		
		<hr style="border:none;border-top:1px solid #ccc;color" />
		<h2>استفاده از وبلاک</h2>
		اگر از وبلاگ استفاده می کنید (برگه اصلی > دسته بندی برای وبلاگ)، لطفاً در نوشته های خود از برچسب استفاده نکنید. شما می توانید از زیر دسته هایی برای وبلاگ خود استفاده نمائید.
		
		<hr style="border:none;border-top:1px solid #ccc;color" />
		<h2>دسترسی ها</h2>
		<p>شما می توانید بسته به نیاز خود از طریق آدرس تنظیمات > همگانی > <a href="' . admin_url('options-general.php') . '" target="_blank">نقش پیشفرض کاربر تازه</a> نقش دلخواهتان را تنظیم نمائید. چنانچه مطمئن نیستید، این گزینه را برروی "نویسنده" که با سایت Pinterest.com هماهنگ تر است، حفظ نمائید. دسترسی نقش های مختلف را می توانید از قسمت زیر مشاهده فرمائید:.</p>
		<p><strong>مدیر کل</strong>
		- همه چیز</p>
		<p><strong>ویرایشگر</strong>
		- دسترسی نویسندگان
		- دسترسی به مدیریت وردپرس
		- انتشار وصله هایی با وضعیت "برای بازبینی" (بک‌اِند)
		- ویرایش/حذف وصله های دیگران (فرانت‌اِند)
		- ویرایش/حذف تخته دیگران (فرانت‌اِند)
		- ویرایش نمایه دیگران (فرانت‌اِند)
		</p>
		<p><strong>نویسنده</strong>
		- دسترسی مشارکت کنندگان
		- افزودن وصله (وضعیت نوشته: منتشر شده)
		- باز وصل کردن
		</p>
		<p><strong>مشارکت کننده</strong>
		- دسترسی مشترکان
		- افزودن وصله (وضعیت نوشته: برای بازبینی)
		</p>
		<p><strong>مشترک</strong>
		- دیدگاه
		- دنبال کردن
		- پسندیدن
		</p>

		<hr style="border:none;border-top:1px solid #ccc;color" />
		<h2>ملاحظات</h2>
		<ol>
		<li>
		مدیریت وردپرس > برگه‌ها > همه‌ی برگه‌ها<br />پیوند یکتا را برای این صفحات تغییر ندهید (تنظیمات تخته, همه چیز, دنبال کننده ها, ورود, فراموشی رمز عبور, اطلاع رسانی ها, تنظیمات وصله, محبوب ترین ها, نام نویسی, تنظیمات, منبع, برترین کاربران)
		</li>
		<li>
		مدیریت وردپرس > نوشته‌ها > دسته‌ها<br />چنانچه نوشته ای در دسته ها وجود دارد، دسته ها را حذف نکنید. به هرحال شما می توانید نام آنها را ویرایش کرده و یا دسته های جدیدی را ایجاد کنید..
		</li>
		</ol>
		', 'options_framework_theme'),
		'type' => 'info');

	return $options;
}
?>