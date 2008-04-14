<?php
/*
Plugin Name: WP Security Scan
Plugin URI: http://semperfiwebdesign.com/plugins/wp-security-scan/
Description: Perform security scan of WordPress installation.
Author: Michael Torbert
Version: 2.2.56.21
Author URI: http://semperfiwebdesign.com/
*/

/*
Copyright (C) 2008 semperfiwebdesign.com (michael AT semperfiwebdesign DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once(ABSPATH."wp-content/plugins/wp-security-scan/support.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/scanner.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/password_tools.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/database.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/functions.php");
//require_once(ABSPATH."wp-content/plugins/wp-security-scan/scripts.js");

add_action( 'admin_notices', mrt_update_notice, 5 );
add_action('admin_head', 'mrt_hd');
add_action("init",mrt_wpdberrors,1);
add_action("parse_query",mrt_wpdberrors,1);
add_action('admin_menu', 'add_men_pg');
add_action("init",mrt_remove_wp_version,1);
//add_action('admin_head', 'mrt_root_scripts');
function add_men_pg() {
        if (function_exists('add_menu_page')){
add_menu_page('Security', 'Security', 8, __FILE__, 'mrt_opt_mng_pg');
add_submenu_page(__FILE__, 'Scanner', 'Scanner', 8, 'scanner', 'mrt_sub0');
add_submenu_page(__FILE__, 'Password Tool', 'Password Tool', 8, 'passwordtool', 'mrt_sub1');
add_submenu_page(__FILE__, 'Database', 'Database', 8, 'database', 'mrt_sub3');
add_submenu_page(__FILE__, 'Support', 'Support', 8, 'support', 'mrt_sub2');
}}

/*function mrt_root_scripts(){
$siteurl = get_option('siteurl');
echo '<script language="JavaScript" type="text/javascript" src="' . $siteurl . '/wp-content/plugins/wp-security-scan/scripts.js"></script>';
}*/

function mrt_update_notice(){
/*$mrt_version = "2.2.52";
$mrt_latest = fgets(fopen("http://semperfiwebdesign.com/wp-security-scan.html", "r"));
echo $mrt_latest . " and " . $mrt_version;
if($mrt_latest > $mrt_version)
    echo "New Version Available";
   else
      echo "Latest Version";
  */  }

function mrt_opt_mng_pg() {
        ?>
<!--<div id='update-nag'>A new version of WP Security Scan is available!</div>-->
<?php //$rss = fetch_rss('http://alexrabe.boelinger.com/?tag=nextgen-gallery&feed=rss2');?>

<div class=wrap>
                <h2><?php _e('WP - Security Admin Tools') ?></h2>
          <div>
<!--               <div id="message" class="updated fade"><p></p></div>-->
<br /><div style="float: left;width: 600px; height: 430px;border: 1px solid #999;margin: 0 15px 15px 0;padding: 5px;">
<div width=600px style="text-align:center;font-weight:bold;"><h3>Initial Scan</h3></div>
<?php
global $wpdb;
mrt_check_version();
mrt_check_table_prefix();
mrt_version_removal();
mrt_errorsoff();


$name = $wpdb->get_var("SELECT user_login FROM $wpdb->users WHERE user_login='admin'");
if ($name=="admin"){
  echo '<font color="red">"admin" user exists.</font>';
  }
  else{
      echo '<font color="green">No user "admin".</font>';
      }
?>
<br /><br /><br />
<hr align=center size=2 width=500px>
<br />

<div width=600px style="text-align:center;font-weight:bold;"><h3>Future Releases</h3></div>
<ul><li>one-click change file/folder permissions</li><li>test for XSS vulnerabilities</li><li>intrusion detection/prevention</li><li>lock out/log incorrect login attempts</li><li>user enumeration protection</li><li>WordPress admin protection/security</li></ul>
</div>


<div style="float: left; height: 430px;border: 1px solid #999;margin: 0 15px 15px 0;padding: 15px;">
<div width=600px style="text-align:center;font-weight:bold;"><h3>System Information Scan</h3></div>
<?php mrt_get_serverinfo(); ?>
</div>

<div style="float: left;width: 350px; height: 255;border: 1px solid #999;margin: 0 15px 15px 0;padding: 25px;">
<div width=600px style="text-align:center;font-weight:bold;"><h3>Donations</h3></div>
<div style="text-align:center"><em>This plugin is updated as a free services to the WordPress community.  Donations of any size are appreciated.</em>
<br /><br />
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=mrtorbert%40gmail%2ecom&item_name=Support%20WordPress%20Security%20Scan%20Plugin&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8" target="_blank">Click here to support this plugin.</a>
<br /><br /><h4>Recent Donations</h4></div><?php 
$file = fopen("http://semperfiwebdesign.com/donations.php", "r");
while ( ! feof($file) ) {
      $text = fgets($file);
      echo '<li>' . $text . '</li>';
}
fclose($file);
?>
</div>
<div style="clear:both"></div>
</div>
             Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>
<?php } 

function mrt_hd()
{
 $siteurl = get_option('siteurl');?>
<script language="JavaScript" type="text/javascript" src="<?php echo $siteurl;?>/wp-content/plugins/wp-security-scan/js/scripts.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $siteurl;?>/wp-content/plugins/wp-security-scan/scripts.js"></script>

<!--<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>/wp-content/plugins/wp-security-scan/style.css" />-->
<?php }
?>
