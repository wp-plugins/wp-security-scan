<?php

function make_seed() {
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}

function make_password($password_length){
srand(make_seed());
$alfa = "!@123!@4567!@890qwer!@tyuiopa@!sdfghjkl@!zxcvbn@!mQWERTYUIO@!PASDFGH@!JKLZXCVBNM!@";
$token = "";
for($i = 0; $i < $password_length; $i ++) {
  $token .= $alfa[rand(0, strlen($alfa))];
}
return $token;
}

function check_perms($name,$path,$perm)
{
    clearstatcache();
//    $configmod = fileperms($path);
    $configmod = substr(sprintf(".%o.", fileperms($path)), -4);
    $trcss = (($configmod != $perm) ? "background-color:#fd7a7a;" : "background-color:#91f587;");
    echo "<tr style=".$trcss.">";
    echo '<td style="border:0px;">' . $name . "</td>";
    echo '<td style="border:0px;">'. $path ."</td>";
    echo '<td style="border:0px;">' . $perm . '</td>';
    echo '<td style="border:0px;">' . $configmod . '</td>';
//    echo '<td style="border:0px;">' . '<input type="submit" name="' . $perm . '" value="Change now.">' . '</td>';
    echo "</tr>";
}

function mrt_get_serverinfo() {
        global $wpdb;
        $sqlversion = $wpdb->get_var("SELECT VERSION() AS version");
        $mysqlinfo = $wpdb->get_results("SHOW VARIABLES LIKE 'sql_mode'");
        if (is_array($mysqlinfo)) $sql_mode = $mysqlinfo[0]->Value;
        if (empty($sql_mode)) $sql_mode = __('Not set');
        if(ini_get('safe_mode')) $safe_mode = __('On');
        else $safe_mode = __('Off');
        if(ini_get('allow_url_fopen')) $allow_url_fopen = __('On');
        else $allow_url_fopen = __('Off');
        if(ini_get('upload_max_filesize')) $upload_max = ini_get('upload_max_filesize');
        else $upload_max = __('N/A');
        if(ini_get('post_max_size')) $post_max = ini_get('post_max_size');
        else $post_max = __('N/A');
        if(ini_get('max_execution_time')) $max_execute = ini_get('max_execution_time');
        else $max_execute = __('N/A');
        if(ini_get('memory_limit')) $memory_limit = ini_get('memory_limit');
        else $memory_limit = __('N/A');
        if (function_exists('memory_get_usage')) $memory_usage = round(memory_get_usage() / 1024 / 1024, 2) . __(' MByte');
        else $memory_usage = __('N/A');
        if (is_callable('exif_read_data')) $exif = __('Yes'). " ( V" . substr(phpversion('exif'),0,4) . ")" ;
        else $exif = __('No');
        if (is_callable('iptcparse')) $iptc = __('Yes');
        else $iptc = __('No');
        if (is_callable('xml_parser_create')) $xml = __('Yes');
        else $xml = __('No');

?>
        <li><?php _e('Operating System'); ?> : <strong><?php echo PHP_OS; ?></strong></li>
        <li><?php _e('Server'); ?> : <strong><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></strong></li>
        <li><?php _e('Memory usage'); ?> : <strong><?php echo $memory_usage; ?></strong></li>
        <li><?php _e('MYSQL Version'); ?> : <strong><?php echo $sqlversion; ?></strong></li>
        <li><?php _e('SQL Mode'); ?> : <strong><?php echo $sql_mode; ?></strong></li>
        <li><?php _e('PHP Version'); ?> : <strong><?php echo PHP_VERSION; ?></strong></li>
        <li><?php _e('PHP Safe Mode'); ?> : <strong><?php echo $safe_mode; ?></strong></li>
        <li><?php _e('PHP Allow URL fopen'); ?> : <strong><?php echo $allow_url_fopen; ?></strong></li>
        <li><?php _e('PHP Memory Limit'); ?> : <strong><?php echo $memory_limit; ?></strong></li>
        <li><?php _e('PHP Max Upload Size'); ?> : <strong><?php echo $upload_max; ?></strong></li>
        <li><?php _e('PHP Max Post Size'); ?> : <strong><?php echo $post_max; ?></strong></li>
        <li><?php _e('PHP Max Script Execute Time'); ?> : <strong><?php echo $max_execute; ?>s</strong></li>
        <li><?php _e('PHP Exif support'); ?> : <strong><?php echo $exif; ?></strong></li>
        <li><?php _e('PHP IPTC support'); ?> : <strong><?php echo $iptc; ?></strong></li>
        <li><?php _e('PHP XML support'); ?> : <strong><?php echo $xml; ?></strong></li>
<?php
}
?>


<?php
function mrt_check_table_prefix(){
if($GLOBALS['table_prefix']=='wp_'){
echo '<font color="red">Your table prefix should not be <i>wp_</i>.  <a href="wp-admin/admin.php?page=database">Click here</a> to change it.</font><br />';
}else{
echo '<font color="green">Your table prefix is not <i>wp_</i>.</font><br />';
}
}

function mrt_errorsoff(){
echo '<font color="green">WordPress DB Errors turned off.</font><br />';
}

function mrt_wpdberrors()
{
		global $wpdb;
		$wpdb->show_errors = false;

}

function mrt_version_removal(){
echo '<font color="green">Your WordPress version is successfully hidden.</font><br />';
}

function mrt_remove_wp_version()
{
                if (!is_admin()) {
                        global $wp_version;
                        $wp_version = '';
                              }

}

function mrt_check_version(){
echo "WordPress Version: ";
global $wp_version;
if ($wp_version == 2.5) $g2k5 = '<font color="green">You have the latest stable version of WordPress.</font><br />';
if ($wp_version < 2.5) $g2k5 = '<font color="red">You need version 2.5.  Please <a href="http://wordpress.org/download/">upgrade</a> immediately.</font><br />';
echo "<b>" . $wp_version . "</b>  &nbsp;&nbsp;&nbsp " ;echo $g2k5;
}

?>

