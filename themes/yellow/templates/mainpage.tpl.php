<?php
#################################################################
## Auctionlivesoft V6.8															##
##-------------------------------------------------------------##
## Copyright �2008 Auctionlivesoft SoftwareLTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################
if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<?php if ($layout['hpfeat_nb']) { ?>
<div class="mainPageSection">
<?php echo $featured_auctions_header;?>
<table width="100%" border="0" cellpadding="0" cellspacing="3" >
   <?php
	$counter = 0;
	for ($i=0; $i<$featured_columns; $i++) { ?>
   <tr>
      <?php
      for ($j=0; $j<$layout['hpfeat_nb']; $j++) {
			$width = 100/$layout['hpfeat_nb'] . '%'; ?>
      <td width="<?php echo $width;?>" align="center" valign="top" class="borderfeat">
      	<?php
      	if (!empty($item_details[$counter]['name'])) {
      		$main_image = $feat_db->get_sql_field("SELECT media_url FROM " . DB_PREFIX . "auction_media WHERE
      			auction_id='" . $item_details[$counter]['auction_id'] . "' AND media_type=1 AND upload_in_progress=0 ORDER BY media_id ASC LIMIT 0,1", 'media_url');
      		$auction_link = process_link('auction_details', array('name' => $item_details[$counter]['name'], 'auction_id' => $item_details[$counter]['auction_id']));?>
         <table width="100%" border="0" cellspacing="1" cellpadding="3">
            <tr>
               <td class="c1feat"><a style="color: #ffffff;" href="<?php echo $auction_link;?>">&raquo; <?php echo title_resize($item_details[$counter]['name']);?></a></td>
            </tr>
            <tr height="<?php echo $layout['hpfeat_width']+12;?>">
               <td align="center"><a href="<?php echo $auction_link;?>"><img src="<?php echo ((!empty($main_image)) ? 'thumbnail.php?pic=' . $main_image . '&w=' . $layout['hpfeat_width'] . '&sq=Y' : 'themes/' . $setts['default_theme'] . '/img/system/noimg.gif');?>" border="0" alt="<?php echo $item_details[$counter]['name'];?>"></a></td>
            </tr>
            <tr class="c2">
               <td>
               	<b><?php echo MSG_START_BID;?>:</b> <?php echo $feat_fees->display_amount($item_details[$counter]['start_price'], $item_details[$counter]['currency']);?> <br>
               <b><?php echo MSG_CURRENT_BID;?>:</b> <?php echo $feat_fees->display_amount($item_details[$counter]['max_bid'], $item_details[$counter]['currency']);?> <br>
               <b><?php echo MSG_ENDS;?>:</b> <?php echo show_date($item_details[$counter]['end_time']); ?>             
              </td>
            </tr>
         </table>
         <?php $counter++;
      	} ?></td>
      <?php } ?>
   </tr>
   <?php } ?>
</table>
</div>

<?php } ?>
<?php if ($layout['nb_recent_auct']) { ?>
<div class="mainPageSection">
<?php echo $recent_auctions_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
   <tr class="c4" height="15">
      <td></td>
      <td nowrap="nowrap" class="smallfont"><strong>Picture</strong></td>
      <td nowrap="nowrap" class="smallfont"><b>
        <?php echo GMSG_START_TIME;?>
      </b></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?php echo MSG_START_BID;?></b></td>
      <td class="smallfont" width="100%">&nbsp;<b><?php echo MSG_ITEM_TITLE;?></b></td>
      <td class="smallfont" nowrap>&nbsp;</td>
   </tr>
   <?php
	while ($item_details = mysql_fetch_array($sql_select_recent_items))
	{
		$background = ($counter++%2) ? '' : '';
		$background .= ($item_details['bold']) ? ' bold_item' : '';
		$background .= ($item_details['hl']) ? ' hl_item' : ''; ?>
	<tr height="15" class="<?php echo $background;?>">
		<td width="11" id="bot"><img src="themes/<?php echo $setts['default_theme'];?>/img/recent.gif" width="13" height="12" hspace="3"></td>
		<td class="smallfont" id="bot" nowrap="nowrap"><a href="<?php echo process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><img src="<?php echo ((!empty($item_details["media_url"])) ? 'thumbnail.php?pic=' . $item_details["media_url"] . '&w=50&sq=Y' : 'themes/' . $setts['default_theme'] . '/img/system/noimg.gif');?>" border="0" alt="<?php echo $item_details['name'];?>" /></a></td>
		<td class="smallfont" id="bot" nowrap="nowrap"><b>
		  <?php echo show_date($item_details['start_time']);?>
		</b></td>
		<td class="smallfont" id="bot" nowrap="nowrap">&nbsp;<?php echo $fees->display_amount($item_details['start_price'], $item_details['currency']);?></td> 
		<td id="bot" width="100%" class="smallfont">&nbsp;<a href="<?php echo process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><?php echo title_resize($item_details['name']);?></a></td> 
		<td nowrap id="bot"><?php echo item_pics($item_details);?>&nbsp;</td>
	</tr> 
   <?php } ?>
</table>
</div>
<?php } ?>
<?php if ($layout['nb_popular_auct'] && $is_popular_items) { ?>
<div class="mainPageSection">
<?php echo $popular_auctions_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
   <tr class="c4" height="15">
      <td></td>
      <td nowrap="nowrap" class="smallfont"><strong>Picture</strong></td>
      <td class="smallfont" nowrap="nowrap"><b>
        <?php echo MSG_MAX_BID;?>
      </b></td>
      <td class="smallfont" width="100%">&nbsp;<b><?php echo MSG_ITEM_TITLE;?><b></td>
      <td class="smallfont" nowrap>&nbsp;</td>
   </tr>
   <?php 
	while ($item_details = mysql_fetch_array($sql_select_popular_items))
	{
		$background = ($counter++%2) ? '' : '';
		$background .= ($item_details['bold']) ? ' bold_item' : '';
		$background .= ($item_details['hl']) ? ' hl_item' : ''; ?>
		
	<tr height="15" class="<?php echo $background;?>">
		<td width="11" id="bot"><img src="themes/<?php echo $setts['default_theme'];?>/img/popular.gif" width="13" height="12" hspace="3"></td> 
		<td nowrap="nowrap" class="smallfont" id="bot"><a href="<?php echo process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><img src="<?php echo ((!empty($item_details["media_url"])) ? 'thumbnail.php?pic=' . $item_details["media_url"] . '&w=50&sq=Y' : 'themes/' . $setts['default_theme'] . '/img/system/noimg.gif');?>" border="0" alt="<?php echo $item_details['name'];?>" /></a></td> 
		<td nowrap="nowrap" class="smallfont" id="bot"><?php echo $fees->display_amount($item_details['max_bid'], $item_details['currency']);?></td>
		<td width="100%" class="smallfont" id="bot">&nbsp;<a href="<?php echo process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><?php echo title_resize($item_details['name']);?></a></td> 
		<td nowrap id="bot"><?php echo item_pics($item_details);?>&nbsp;</td> 
	</tr> 
   <?php } ?>
</table>
</div>
<?php } ?>
<?php if ($layout['nb_ending_auct']) { ?>
<div class="mainPageSection">
<?php echo $ending_auctions_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
   <tr class="c4" height="15">
      <td></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<strong>Picture</strong></td>
      <td class="smallfont" nowrap="nowrap"><b>
        <?php echo MSG_TIME_LEFT;?>
      </b></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?php echo MSG_CURRENTLY;?></b></td>
      <td class="smallfont" width="100%">&nbsp;<b><?php echo MSG_ITEM_TITLE;?></b></td>
      <td class="smallfont" nowrap>&nbsp;</td>
   </tr>
   <?php
	while ($item_details = mysql_fetch_array($sql_select_ending_items))
	{
		$background = ($counter++%2) ? '' : '';
		$background .= ($item_details['bold']) ? ' bold_item' : '';
		$background .= ($item_details['hl']) ? ' hl_item' : ''; ?>
	<tr height="15" class="<?php echo $background;?>"> 
		<td width="11" id="bot"><img src="themes/<?php echo $setts['default_theme'];?>/img/soon.gif" width="13" height="12" hspace="3"></td> 
      		<td nowrap="nowrap" class="smallfont" id="bot"><a href="<?php echo process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><img src="<?php echo ((!empty($item_details["media_url"])) ? 'thumbnail.php?pic=' . $item_details["media_url"] . '&w=50&sq=Y' : 'themes/' . $setts['default_theme'] . '/img/system/noimg.gif');?>" border="0" alt="<?php echo $item_details['name'];?>" /></a>
	  </td> 
      <td nowrap="nowrap" class="smallfont" id="bot"><?php echo time_left($item_details['end_time']);?></td>
      <td class="smallfont" nowrap="nowrap" id="bot">&nbsp;<?php echo $fees->display_amount($item_details['max_bid'], $item_details['currency']);?></td> 
      <td  class="smallfont" width="100%" id="bot">&nbsp;<a href="<?php echo process_link('auction_details', array('name' => $item_details['name'], 'auction_id' => $item_details['auction_id']));?>"><?php echo title_resize($item_details['name']);?></a></td> 
		<td nowrap id="bot"><?php echo item_pics($item_details);?>&nbsp;</td> 
   </tr> 
	<?php } ?>
</table>
</div>
<?php } ?>
<?php if ($layout['nb_want_ads']) { ?>
<div class="mainPageSection">
<?php echo $recent_wa_header;?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
   <tr class="c4" height="15">
      <td></td>
      <td class="smallfont" nowrap="nowrap">&nbsp;<b><?php echo GMSG_START_TIME;?></b></td>
      <td class="smallfont" width="100%">&nbsp;<b><?php echo MSG_ITEM_TITLE;?><b></td>
   </tr>
   <?php
	while ($item_details = mysql_fetch_array($sql_select_recent_wa))
	{
		$background = ($counter++%2) ? '' : ''; ?>
	<tr height="15" class="<?php echo $background;?>">
		<td width="11" id="bot"><img src="themes/<?php echo $setts['default_theme'];?>/img/wanted.gif" width="13" height="12" hspace="3"></td> 
		<td class="smallfont" nowrap="nowrap" id="bot">&nbsp;<b><?php echo show_date($item_details['start_time']);?></b></td> 
		<td class="smallfont" width="100%" id="bot">&nbsp;<a href="<?php echo process_link('wanted_details', array('name' => $item_details['name'], 'wanted_ad_id' => $item_details['wanted_ad_id']));?>"><?php echo title_resize($item_details['name']);?></a></td> 
	</tr> 
   <?php } ?>
</table>
</div>
<?php } ?>
</td>
