<?php
$current_version = "6.03";
(array) $setts = NULL;
define("CURRENT_TIME", time());
define("CURRENT_TIME_MYSQL", date("Y-m-d H:i:s", time()));
$setts = $db->get_sql_row("SELECT * FROM " . DB_PREFIX . "gen_setts LIMIT 1");
define("DEFAULT_THEME", $setts['default_theme']);
define("SITE_PATH", $setts['site_path']);
define("EMAIL_FONT", "<font face=\"Verdana, Arial, Helvetica\" size=\"2\">");
$layout = $db->get_sql_row("SELECT * FROM " . DB_PREFIX . "layout_setts LIMIT 1");
$layout['nb_want_ads'] = $setts['enable_wanted_ads'] ? $layout['nb_want_ads'] : 0;
$db->setts =& $setts;
$db->layout =& $layout;
$currentTime = time();
if (!$session->is_set("site_lang"))
{
    $session->set("site_lang", $setts['site_lang']);
}
include_once($fileExtension . "language/" . $session->value( "site_lang" ) . "/global.lang.php");
include_once($fileExtension . "language/" . $session->value( "site_lang" ) . "/category.lang.php");
if (IN_SITE == 1)
{	
	$site_lang = $fileExtension . "language/" . $session->value( "site_lang" ) . "/site.lang.php";
	if (file_exists($site_lang)) {
		include_once($site_lang);
	} else {
		echo "The file $site_lang does not exist";
	}
    
}
if (IN_ADMIN == 1)
{
    include_once($fileExtension . "language/" . $setts['admin_lang'] . "/admin.lang.php");
}
include_once($fileExtension . "language/" . $session->value("site_lang") . "/categories_array.php");
$date_format_row = $db->get_sql_row("SELECT value FROM " . DB_PREFIX . "dateformat WHERE active='checked'");
$datetime_format = $date_format_row['value'];
define("DATETIME_FORMAT", $datetime_format);
$date_format = substr($datetime_format, 0, -6);
define("DATE_FORMAT", $date_format);
define("TIME_OFFSET", $setts['time_offset']);
if ($setts['is_mod_rewrite'])
{
    $valsArray = explode(",", $_REQUEST['rewrite_params']);
    $valsCnt = 0;
    $count_valsArray = count($valsArray);
    while ($valsCnt < $count_valsArray)
    {
        $_REQUEST[$valsArray[$valsCnt + 1]] = $valsArray[$valsCnt];
        $_GET[$valsArray[$valsCnt + 1]] = $valsArray[$valsCnt];
        $_POST[$valsArray[$valsCnt + 1]] = $valsArray[$valsCnt];
        $valsCnt += 2;
    }
}
if (!preg_match("/sell_item.php/i", $_SERVER['PHP_SELF']) || !preg_match("/sell_item.php/i", $_SERVER['PHP_SELF']) || $_REQUEST['option'] == "new_item" || preg_match("/sell_item.php/i", $_SERVER['PHP_SELF']) && $_REQUEST['option'] == "sell_similar")
{
    $session->unregister("auction_id");
    $session->unregister("refresh_id");
}
if (!preg_match("/wanted_manage.php/i", $_SERVER['PHP_SELF']))
{
    $session->unregister("wanted_ad_id");
    $session->unregister("wa_refresh_id");
}
if (!preg_match("/edit_item.php/i", $_SERVER['PHP_SELF']))
{
    $session->unregister("edit_refresh_id");
}
if (!preg_match("/bid.php/i", $_SERVER['PHP_SELF']))
{
    $session->unregister("bid_id");
}
if (!preg_match("/buy_out.php/i", $_SERVER['PHP_SELF']))
{
    $session->unregister("buyout_id");
}
if (!preg_match("/make_offer.php/i", $_SERVER['PHP_SELF']))
{
    $session->unregister("make_offer_id");
}
if (!preg_match("/swap_offer.php/i", $_SERVER['PHP_SELF']))
{
    $session->unregister("swap_offer_id");
}
if(isset($_GET['start'])){
	$start = abs(intval($_GET['start']));
}
?>