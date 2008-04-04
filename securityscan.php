<?php
/*
Plugin Name: WP Security Scan
Plugin URI: http://wordpress.org/extend/plugins/wp-security-scan/
Description: Perform security scan of WordPress installation.
Author: Michael Torbert
Version: 2.2.3.9.1
Author URI: http://semperfiwebdesign.com/
*/
require_once(ABSPATH."wp-content/plugins/wp-security-scan/support.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/scanner.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/password_tools.php");

add_action('admin_menu', 'add_men_pg');
function add_men_pg() {
        if (function_exists('add_menu_page')){
add_menu_page('Security', 'Security', 8, __FILE__, 'mrt_opt_mng_pg');
add_submenu_page(__FILE__, 'Scanner', 'Scanner', 8, 'scanner', 'mrt_sub0');
add_submenu_page(__FILE__, 'Password Tool', 'Password Tool', 8, 'passwordtool', 'mrt_sub1');
add_submenu_page(__FILE__, 'Support', 'Support', 8, 'support', 'mrt_sub2');
}
}

function mrt_opt_mng_pg() {
        ?>
<div class=wrap>
                <h2><?php _e('WP - Security Admin Tools') ?></h2>
          <div style="height:299">
<!--               <div id="message" class="updated fade"><p></p></div>-->
<br /><br /><br />
<?php
echo "WordPress versions = ";
global $wp_version;
if ($wp_version == 2.5) $g2k5 = "You have the latest stable version of WordPress.";
if ($wp_version < 2.5) $g2k5 = "You need version 2.5.  Upgrade immediately for security reasons.";
echo "<b>" . $wp_version . "</b>" . "<br />";echo $g2k5;?>
<br /><br /><br />
<hr align=left size=2 width=612px>
<br /><br />
<b>Future Releases</b>
<ul><li>one-click change file/folder permissions</li><li>test for XSS vulnerabilities</li></ul>
</div>
             Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>
<?php } ?>
