<?php
#################################################################
## MyPHPAuction v6.04															##
##-------------------------------------------------------------##
## Copyright �2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>

<div class="mainhead"><img src="images/fees.gif" align="absmiddle">
   <?php echo $header_section;?>
</div>
<?php echo $msg_changes_saved;?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
   <tr>
      <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
      <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
      <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
   </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
	<form action="table_currencies.php" method="post">
      <tr>
         <td colspan="5" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
            <?php echo strtoupper(AMSG_CURRENCY_SETTINGS);?>
            </b></td>
      </tr>
      <tr class="c1">
         <td width="170" align="right"><b>
            <?php echo AMSG_DEFAULT_CURRENCY;?>
            </b></td>
         <td><?php echo $default_currency_dropdown;?></td>
      </tr>
      <tr>
         <td class="explain" align="right"><img src="images/info.gif"></td>
         <td class="explain"><?php echo AMSG_DEFAULT_CURRENCY_DESC;?></td>
      </tr>
   </table>
   <table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
      <tr>
         <td><table width="100%" border="0" cellpadding="3" cellspacing="1">
               <tr class="c4">
                  <td width="170"><?php echo AMSG_CURRENCY_SYMBOL;?></td>
                  <td><?php echo AMSG_CURRENCY_CAPTION;?></td>
                  <td width="200" align="center"><?php echo GMSG_EXCHANGE_RATE;?></td>
                  <td width="150" align="center"><?php echo AMSG_LAST_UPDATE;?></td>
                  <td width="80" align="center"><?php echo AMSG_DELETE;?></td>
               </tr>
               <?php echo $currencies_page_content;?>
               <tr>
                  <td colspan="5" class="c4"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
                     <?php echo AMSG_ADD_CURRENCY;?>
                     </b></td>
               </tr>
               <tr class="c2">
                  <td><input name="new_symbol" type="text" id="new_symbol" size="8"></td>
                  <td><input name="new_caption" type="text" id="new_caption" size="40"></td>
                  <td colspan="3"></td>
               </tr>
               <tr>
                  <td colspan="5" align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES;?>"></td>
               </tr>
            </table></td>
      </tr>
	</form>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
   <tr>
      <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
      <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
      <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
   </tr>
</table>
