<?php
/*
Plugin Name: WP Security Scan
Plugin URI: http://wordpress.org/extend/plugins/wp-security-scan/
Description: Perform security scan of WordPress installation.
Author: Michael Torbert
Version: .3.4
Author URI: http://semperfiwebdesign.com/
*/
require_once('../wp-content/plugins/securityscan/menu.php');
add_action('admin_menu', 'add_men_pg');

function add_men_pg() {
        if (function_exists('add_menu_page')){
add_menu_page('Security Scan', 'Security Scan', 8, __FILE__, 'mrt_opt_mng_pg');
add_submenu_page(__FILE__, 'Password Tool', 'Password Tool', 8, '1dfg23f', 'mrt_sub1');
add_submenu_page(__FILE__, 'Help', 'Help', 8, '23d2f331', 'mrt_sub2');

}
}
function check_perms($name,$path,$perm)
{
    clearstatcache();
//    $configmod = fileperms($path);
    $configmod = substr(sprintf(".%o.", fileperms($path)), -4);
    $trcss = (($configmod != $perm) ? "background-color:#fd7a7a;" : "background-color:#91f587;");
    echo "<tr style=".$trcss.">";
    echo '<td style="border:0px;">' . $name . "</td";
    echo '<td style="border:0px;">'. $path ."</td>";
    echo '<td style="border:0px;">' . $perm . '</td>';
    echo '<td style="border:0px;">' . $configmod . '</td>';
    echo "</tr>";
}

function mrt_opt_mng_pg() {
        ?>
        <div class=wrap>
                <h2><?php _e('WP - Security Scan') ?></h2>
          <div style="height:299px">
               <div id="message" class="updated fade"><p><?php echo "SECURITY SCAN";?></p></div>
<table width="100%"  border="0" cellspacing="0" cellpadding="3" style="text-align:center;">
         <tr>
        <th style="border:0px;"><b>Name</b></th>
        <th style="border:0px;"><b>File/Dir</b></th>
        <th style="border:0px;"><b>Needed Chmod</b></th>
        <th style="border:0px;"><b>Current Chmod</b></th>
    </tr>
    <?php
        check_perms("root directory","../","0745");
        check_perms("wp-includes/","../wp-includes","0447");
        check_perms(".htaccess","../.htaccess","0644");
        check_perms("wp-admin/index.php","index.php","0644");
        check_perms("wp-admin/js/","js/","0775");
        check_perms("wp-content/themes/","../wp-content/themes","0745");
        check_perms("wp-content/plugins/","../wp-content/plugins","0745");
        check_perms("wp-admin/","../wp-admin","0745");
        check_perms("wp/content/","../wp-content","0745");
    ?>
</table>
          </div>
             Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>
<?php } ?>
