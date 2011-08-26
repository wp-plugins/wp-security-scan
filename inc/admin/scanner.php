<?php
function mrt_sub0(){

mrt_wpss_menu_head('WP - Security Scan');?>

<div class="metabox-holder" style="width:100%;">

    <div style="" class="inner-sidebar1 postbox">
        <h3 class="hndle"><span>WP Security file scan report</span></h3>
        <div class="inside acx-section-box">
            <table id="wsd_permissions_table" width="100%"  border="0" cellspacing="0" cellpadding="3"
                   style="text-align:center; border: solid 1px #DFDFDF;">
                     <thead style="background: #ececec; line-height: 1.5em;">
                        <th style="border:0px;"><b>Name</b></th>
                        <th style="border:0px;"><b>File/Dir</b></th>
                        <th style="border:0px;"><b>Needed Chmod</b></th>
                        <th style="border:0px;"><b>Current Chmod</b></th>
                    </thead>
                    <tbody>
                <?php
                    // DIR_NAME | DIR_PATH | EXPECTED_PERMISSION
                    check_perms("root directory","../","0755");
                    check_perms("wp-includes/","../wp-includes","0755");
                    check_perms(".htaccess","../.htaccess","0644");
                    check_perms("wp-admin/index.php","index.php","0644");
                    check_perms("wp-admin/js/","js/","0755");
                    check_perms("wp-content/themes/","../wp-content/themes","0755");
                    check_perms("wp-content/plugins/","../wp-content/plugins","0755");
                    check_perms("wp-admin/","../wp-admin","0755");
                    check_perms("wp-content/","../wp-content","0755");
                ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php
   mrt_wpss_menu_footer();
 } ?>
