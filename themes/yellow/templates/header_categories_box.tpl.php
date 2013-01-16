<?php
#################################################################
## myphpauction V6.8															##
##-------------------------------------------------------------##
## Copyright ©2008 myphpauction SoftwareLTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################
if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<div class="catSideList sideBoxContent">
	<ul>
   <?php 
while ($cats_header_details = $db->fetch_array($sql_select_cats_list)) 
{
	$category_link = process_link('categories', array('category' => $category_lang[$cats_header_details['category_id']], 'parent_id' => $cats_header_details['category_id'])); ?>
	

      <li class="contentfont"><a class="ln" href="<?php echo $category_link;?>" <?php echo ((!empty($cats_header_details['hover_title'])) ? 'title="' . $cats_header_details['hover_title'] . '"' : '');?>>
         <?php echo $category_lang[$cats_header_details['category_id']];?>
         <?php echo (($setts['enable_cat_counters']) ? (($cats_header_details['items_counter']) ? '(<strong>' . $cats_header_details['items_counter'] . '</strong>)' : '(' . $cats_header_details['items_counter'] . ')') : '');?></a></li>
  
   <?php } ?>
	</ul>
</div>
<!--<div class="stat"><div class="nav_r"><div class="nav_l"><div class="nav"></div></div></div></div>-->