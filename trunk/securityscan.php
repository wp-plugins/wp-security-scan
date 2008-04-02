<?php
/*
Plugin Name: WP Security Scan
Plugin URI: http://wordpress.org/extend/plugins/wp-security-scan/
Description: Perform security scan of WordPress installation.
Author: Michael Torbert
Version: 2.2.1
Author URI: http://semperfiwebdesign.com/
*/

add_action('admin_menu', 'add_men_pg');

function add_men_pg() {
        add_menu_page('Security Scan', 'Security Scan', 10, basename(__FILE__), 'mrt_opt_mng_pg');
}

function check_perms($path,$perm)
{
    clearstatcache();
//    $configmod = fileperms($path);
    $configmod = substr(sprintf(".%o.", fileperms($path)), -4);
    $trcss = (($configmod != $perm) ? "background-color:#fd7a7a;" : "background-color:#91f587;");
    echo "<tr style=".$trcss.">";
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
        <th style="border:0px;"><b>File/Dir</b></th>
        <th style="border:0px;"><b>Needed Chmod</b></th>
        <th style="border:0px;"><b>Current Chmod</b></th>
    </tr>
    <?php
        check_perms("../wp-includes","0644");
        check_perms("../.htaccess","0644");
        check_perms("index.php","0644");
        check_perms("js/","0644");
        check_perms("../wp-content/themes","0644");
        check_perms("../wp-content/plugins","0644");
        check_perms("../wp-admin","0644");
        check_perms("../wp-content","0644");
    ?>
</table>
          </div>
             Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>
<?php } ?>
