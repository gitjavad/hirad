<div id="sid-setting" class="ui right fixed vertical menu sid-menu-setting animated bounceIn">
	
<div class="ui grid">
  <div class="sixteen wide column">
  <a class="ui teal right ribbon label sid-setting-label">موقعیت</a>
  </div>
  </div>
      
      <div class="ui grid centered">
  <div class="sixteen wide center aligned column">
 
  	<div class="ui floating dropdown labeled icon button sid-pos" >
  
  <span class="text">مکان مورد نظر را انتخاب نمایید</span>
  <i class="sort descending icon"></i>
  <div class="menu sid-cat-list">
    
    
    <?php
$cat_con= get_categories( array(
    'orderby' => 'name',
    'parent'  => 0
) );
foreach( $cat_con as $category ) {
	echo '<div class="item">';
	echo '<div class="ui red empty circular label"></div>';
	echo $category->name;
	echo "</div>";
	echo '<div class="divider"></div>';
	/*echo "<p>".get_category_link( $category->term_id )."</p>";*/
}
?>
  
</div>
</div>


</div>	
</div>
<div class="ui grid ">
  <div class="sixteen wide column">
  <a class="ui teal right ribbon label sid-setting-more-label">موارد بیشتر</a>
  </div>
  </div>
<div class="sid-setting-more ui grid">
    <div class="ui grid centered">
  <div class="six wide column ">
<div class="ui form">
  <div class="grouped fields">
  
    <div class="field">
      <div class="ui radio checkbox">
  
        <input type="radio" name="fruit" tabindex="0" class="hidden">
        <label style="
    text-align: center;
    font-size: 12px;
    font-family: 'BYekan',tahoma;
"><i class="coffee icon" style="
    font-size: 43px;
"></i>ککه دونی</label>
      </div>
    </div><div class="field">
      <div class="ui radio checkbox">
  
        <input type="radio" name="fruit" tabindex="0" class="hidden">
        <label style="
        text-align: center;
    font-size: 20px;
    font-family: 'BYekan',tahoma;
"><i class="food icon" style="
    font-size: 43px;
"></i>خلا</label>
      </div>
      </div>
  </div>
</div></div><div class="six wide column ">
  <div class="ui form">
  <div class="grouped fields">
  <div class="field">
      <div class="ui radio checkbox">
  
        <input type="radio" name="fruit" tabindex="0" class="hidden">
        <label style="
        text-align: center;
    font-size: 20px;
    font-family: 'BYekan',tahoma;
"><i class="paw icon" style="
    font-size: 43px;
"></i>حمام</label>
      </div>
    </div><div class="field">
      <div class="ui radio checkbox">
  
        <input type="radio" name="fruit" tabindex="0" class="hidden">
        <label style="
        text-align: center;
    font-size: 20px;
    font-family: 'BYekan',tahoma;
"><i class="bicycle icon" style="
    font-size: 43px;
"></i>توالت</label>
      </div>
    </div>
    
  </div>
</div>
  </div>


</div>	
</div>




</div>



