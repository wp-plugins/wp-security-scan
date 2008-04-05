<?php
/*
Plugin Name: WP Security Scan
Plugin URI: http://wordpress.org/extend/plugins/wp-security-scan/
Description: Perform security scan of WordPress installation.
Author: Michael Torbert
Version: 2.2.47
Author URI: http://semperfiwebdesign.com/
*/
require_once(ABSPATH."wp-content/plugins/wp-security-scan/support.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/scanner.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/password_tools.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/database.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/functions.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/scripts.js");

add_action("init",mrt_wpdberrors,1);
add_action("parse_query",mrt_wpdberrors,1);
add_action('admin_menu', 'add_men_pg');
add_action("init",mrt_remove_wp_version,1);
function add_men_pg() {
        if (function_exists('add_menu_page')){
add_menu_page('Security', 'Security', 8, __FILE__, 'mrt_opt_mng_pg');
add_submenu_page(__FILE__, 'Scanner', 'Scanner', 8, 'scanner', 'mrt_sub0');
add_submenu_page(__FILE__, 'Password Tool', 'Password Tool', 8, 'passwordtool', 'mrt_sub1');
add_submenu_page(__FILE__, 'Database', 'Database', 8, 'database', 'mrt_sub3');
add_submenu_page(__FILE__, 'Support', 'Support', 8, 'support', 'mrt_sub2');
}}

function mrt_opt_mng_pg() {
        ?>
<!--<div id='update-nag'>A new version of WP Security Scan is available!</div>-->
<?php //$rss = fetch_rss('http://alexrabe.boelinger.com/?tag=nextgen-gallery&feed=rss2');?>

<div class=wrap>
                <h2><?php _e('WP - Security Admin Tools') ?></h2>
          <div>
<!--               <div id="message" class="updated fade"><p></p></div>-->
<br /><div style="float: left;width: 600px; height: 410px;border: 1px solid #999;margin: 0 15px 15px 0;padding: 5px;">
<div width=600px style="text-align:center;font-weight:bold;"><h3>Initial Scan</h3></div>
<?php
mrt_check_version();
mrt_check_table_prefix();
mrt_version_removal();
mrt_errorsoff();
?>

<br /><br />
<hr align=center size=2 width=500px>
<br /><br />
<div width=600px style="text-align:center;font-weight:bold;"><h3>Future Releases</h3></div>
<ul><li>one-click change file/folder permissions</li><li>test for XSS vulnerabilities</li><li>intrusion detection/prevention</li><li>lock out/log incorrect login attempts</ul>
</div>
<div style="float: left; height: 410;border: 1px solid #999;margin: 0 15px 15px 0;padding: 5px;">
<?php mrt_get_serverinfo(); ?>
</div>
<div style="clear:both"></div>
</div>
             Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>
<?php } ?>
