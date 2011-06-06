<?php
/*
Plugin Name: WP Security Scan
Plugin URI: http://semperfiwebdesign.com/plugins/wp-security-scan/
Description: Perform security scan of WordPress installation.
Author: Michael Torbert, pbaylies, WebsiteDefender
Version: 2.7.4
Author URI: http://semperfiwebdesign.com/
*/

/*
Copyright (C) 2008-2010 Michael Torbert / semperfiwebdesign.com (michael AT semperfiwebdesign DOT com)

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

if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

//main files
require_once(WP_PLUGIN_DIR . "/wp-security-scan/support.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/scanner.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/password_tools.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/database.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/functions.php");

//menus
require_once(WP_PLUGIN_DIR . "/wp-security-scan/inc/admin/security.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/inc/admin/scanner.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/inc/admin/pwtool.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/inc/admin/db.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/inc/admin/support.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/inc/admin/templates/header.php");
require_once(WP_PLUGIN_DIR . "/wp-security-scan/inc/admin/templates/footer.php");




//require_once(WP_PLUGIN_DIR . "/plugins/wp-security-scan/scripts.js");


add_action( 'admin_notices', 'mrt_update_notice', 5 );
add_action('admin_head', 'mrt_hd');
add_action("init",'mrt_wpdberrors',1);
add_action("parse_query",'mrt_wpdberrors',1);
add_action('admin_menu', 'add_men_pg');
add_action("init", 'mrt_remove_wp_version',1);   //comment out this line to make ddsitemapgen work
add_action('admin_init','mrt_wpss_admin_init');


function mrt_wpss_admin_init(){
	wp_enqueue_style('mrt_wpss_style',WP_PLUGIN_URL . '/wp-security-scan/style.css');
}


remove_action('wp_head', 'wp_generator');
//add_action('admin_head', 'mrt_root_scripts');
function add_men_pg() {
         if (function_exists('add_menu_page')){
            add_menu_page('Security', 'Security', 'edit_pages', __FILE__, 'mrt_opt_mng_pg',WP_PLUGIN_URL . '/wp-security-scan/images/wpss_icon_small_color.png');
            add_submenu_page(__FILE__, 'Scanner', 'Scanner', 'edit_pages', 'scanner', 'mrt_sub0');
            add_submenu_page(__FILE__, 'Password Tool', 'Password Tool', 'edit_pages', 'passwordtool', 'mrt_sub1');
            add_submenu_page(__FILE__, 'Database', 'Database', 'edit_pages', 'database', 'mrt_sub3');
            add_submenu_page(__FILE__, 'Support', 'Support', 'edit_pages', 'support', 'mrt_sub2');
         }
}

		// function for WP < 2.8
		function get_plugins_url($path = '', $plugin = '') {

			if ( function_exists('plugin_url') )
				return plugins_url($path, $plugin);

			if ( function_exists('is_ssl') )
				$scheme = ( is_ssl() ? 'https' : 'http' );
			else
				$scheme = 'http';
			if ( function_exists('plugins_url') )
				$url = plugins_url();
			else
				$url = WP_PLUGIN_URL;
			if ( 0 === strpos($url, 'http') ) {
				if ( function_exists('is_ssl') && is_ssl() )
					$url = str_replace( 'http://', "{$scheme}://", $url );
			}

			if ( !empty($plugin) && is_string($plugin) )
			{
				$folder = dirname(plugin_basename($plugin));
				if ('.' != $folder)
					$url .= '/' . ltrim($folder, '/');
			}

			if ( !empty($path) && is_string($path) && strpos($path, '..') === false )
				$url .= '/' . ltrim($path, '/');

			return apply_filters('plugins_url', $url, $path, $plugin);
		}

/*function mrt_root_scripts(){
$siteurl = get_option('siteurl');
echo '<script language="JavaScript" type="text/javascript" src="' . WP_PLUGIN_URL . '/wp-security-scan/scripts.js"></script>';
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


	function wpss_mrt_meta_box(){  
	
		global $wpdb;
		mrt_check_version();
		mrt_check_table_prefix();
		mrt_version_removal();
		mrt_errorsoff();
		echo '<div class="scanpass">WP ID META tag removed form WordPress core</div>';

		$name = $wpdb->get_var("SELECT user_login FROM $wpdb->users WHERE user_login='admin'");
		if ($name=="admin"){
		  echo '<a href="http://semperfiwebdesign.com/documentation/wp-security-scan/change-wordpress-admin-username/" title="WordPress Admin" target="_blank"><font color="red">"admin" user exists.</font></a>';
		  }
		  else{
		      echo '<font color="green">No user "admin".</font>';
		      }
		?><br /><?php 
		$filename = '.htaccess';
		if (file_exists($filename)) {
		    echo '<font color="green">.htaccess exists in wp-admin/</font>';
		} else {
		    echo '<font color="red">The file .htaccess does not exist in wp-admin/.</font>';
		}

		?>

		<div class="mrt_wpss_note"><em>**WP Security Scan plugin must remain active for security features to remain**</em></div>
		
		<?php	}

/*** website defender registration ***/
	function wpss_mrt_meta_box5(){ 
		include_once(WP_PLUGIN_DIR . '/wp-security-scan/registration.php');
	}

	function wpss_mrt_meta_box2(){ ?>
		<div style="padding-left:10px;">
			<?php mrt_get_serverinfo(); ?>
		</div>
			
		<?php	}
	


function mrt_hd()
{
 $siteurl = get_option('siteurl');?>
<script language="JavaScript" type="text/javascript" src="<?php echo WP_PLUGIN_URL;?>/wp-security-scan/js/scripts.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo WP_PLUGIN_URL;?>/wp-security-scan/scripts.js"></script>

			<script type="text/javascript">var wordpress_site_name = "<?php echo htmlentities(get_bloginfo('siteurl'));?>"</script>
			<script type="text/javascript">
				//<![CDATA[
				jQuery(document).ready( function($) {
					$('.postbox h3').click( function() { $($(this).parent().get(0)).toggleClass('closed'); } );
					$('.postbox .handlediv').click( function() { $($(this).parent().get(0)).toggleClass('closed'); } );
					$('.postbox.close-me').each(function() {
						$(this).addClass("closed");
					});
				});
				//]]>
			</script>
			<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<?php
/*** old method of adding dynamic fields ***/
/*
			<script type="text/javascript" src="http://dashboard.websitedefender.com/swpuser.php?FIELDS"></script>
*/

/*** new method of adding dynamic fields ***/
?>
			<script type="text/javascript" src="<?php echo get_plugins_url( 'user_fields.php', __FILE__ )?>"></script>
			<script type="text/javascript" src="<?php echo get_plugins_url( 'js/prepare_new_user_form.js', __FILE__ )?>"></script>
			<script type="text/javascript" src="<?php echo get_plugins_url( 'js/verify_form.js', __FILE__ )?>"></script>
		</div>

<script type="text/javascript">
//window.onload=function(){enableTooltips()};
</script>
<!--<link rel="stylesheet" type="text/css" href="<?php //echo WP_PLUGIN_URL;?>/plugins/wp-security-scan/style.css" />-->
<?php }
?>
