        <?php
        if ( !defined('INCLUDED') ) { die("Access Denied"); }
        
        ?>
        </div> <!-- end of contentCol -->
    
    
    </div> <!-- end of contentDiv -->



<div id="bannerHeader" align="center">
   <?php echo $banner_header_content;?>
</div>

    <footer>
        <div class="footerfont" id="footerLinks">
        
                  <a href="<?php echo $index_link;?>"><?php echo MSG_BTN_HOME;?></a>
                <?php if (!$setts['enable_private_site'] || $is_seller) { ?>
                | <a href="<?php echo $place_ad_link;?>"><?php echo $place_ad_btn_msg;?></a>
                <?php } ?>
                | <a href="<?php echo $register_link;?>"><?php echo $register_btn_msg;?></a>
                | <a href="<?php echo $login_link;?>"><?php echo $login_btn_msg;?></a>
                | <a href="<?php echo process_link('content_pages', array('page' => 'help'));?>"><?php echo MSG_BTN_HELP;?></a>
                | <a href="<?php echo process_link('content_pages', array('page' => 'faq'));?>"><?php echo MSG_BTN_FAQ;?></a>
                    | <a href="<?php echo process_link('site_fees');?>"><?php echo MSG_BTN_SITE_FEES;?></a>
                    <?php if ($layout['is_about']) { ?>
                    | <a href="<?php echo process_link('content_pages', array('page' => 'about_us'));?>"><?php echo MSG_BTN_ABOUT_US;?></a>
                    <?php } ?>
                    <?php if ($layout['is_contact']) { ?>
                    | <a href="<?php echo process_link('content_pages', array('page' => 'contact_us'));?>"><?php echo MSG_BTN_CONTACT_US;?></a>
                    <?php } ?>
                    <?php 
        			if(!empty($custom_pages_links)) {
        				echo $custom_pages_links;
        			}
        			?>
        </div>
        <div class="footerfont1"> <b></b>
          <br>
           <center>Copyright &copy <?php echo date("Y") ?> - <a href="./" title="<?php echo $page_title;?>"><?php echo $page_title;?></a> - <?php if ($layout['is_terms']) { ?>
           <a href="<?php echo process_link('content_pages', array('page' => 'terms'));?>"><?php echo MSG_BTN_TERMS;?></a>. 
           <?php } ?>
           <?php if ($layout['is_pp']) { ?>
           - <a href="<?php echo process_link('content_pages', array('page' => 'privacy'));?>"><?php echo MSG_BTN_PRIVACY;?></a></center>
           <?php } ?>
        </div>
        
    </footer>



	</div> <!-- end of main -->
</div><!-- end of mainWrap -->
</body></html>