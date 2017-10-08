	<aside class="ui right fixed vertical menu sid-menu sidbar-menu ">
  <div class="item">
  <!--<h1 id="sid-title" class="animated lightSpeedIn"><?php /**bloginfo('name')**/ ?></h1>-->

  <img  id="sid-header"  src="<?php echo( get_bloginfo('template_url').'/images/logo.png');?>"/>
	
    </div>
  <?php 
  get_search_form( $echo ); 
  ?>
    
  <a class="item" href="http://hirad-co.com/?page_id=63"  target="__blank"><i class="browser icon"></i><i class="menu-text">در باره ما</i></a>
   <a class="item" ><i class="users icon"></i><i class="menu-text">خدمات</i></a>
  <a class="item" ><i class="announcement icon"></i><i class="menu-text">مسابقه طراح برتر</i></a>
  <a id="shoping" class="item"><i class="shop icon"></i><i class="menu-text">فروشگاه</i></a>
  <a class="item" onclick="openNav();"><i class="smile icon"></i><i class="menu-text">ورود</i></a>
  <div class="row">
  	<div class="col-md-6"></div>
  	<div class="col-md-6"></div>
  </div>
 
</aside>

