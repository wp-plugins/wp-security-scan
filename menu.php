<?php

require_once(ABSPATH."wp-content/plugins/wp-security-scan/functions.php");
require_once(ABSPATH."wp-content/plugins/wp-security-scan/scripts.js");


function mrt_sub0(){?>


<div class=wrap>
                <h2><?php _e('WP - Security Scan') ?></h2>
          <div style="height:299px">


<table width="100%"  border="0" cellspacing="0" cellpadding="3" style="text-align:center;">
         <tr>
        <th style="border:0px;"><b>Name</b></th>
        <th style="border:0px;"><b>File/Dir</b></th>
        <th style="border:0px;"><b>Needed Chmod</b></th>
        <th style="border:0px;"><b>Current Chmod</b></th>
  <!--      <th style="border:0px;"><b>Change Permissions</b></th>-->
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
        check_perms("wp-content/","../wp-content","0745");
    ?>
</table>
          </div>
             Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>


<?}


function mrt_sub1(){
 ?>
        <div class=wrap>
                <h2><?php _e('WP - Password Tools') ?></h2>
          <div style="height:299px">
              <?php
echo "<br /><strong>Password Strength Tool</strong>";
?>
<table><tr valign=top><td><form name="commandForm">

Type password: <input type=password size=30 maxlength=50 name=password onkeyup="testPassword(document.forms.commandForm.password.value);" value="">

<br/><font color="#808080">Minimum 6 Characters</td><td><font size="1">  Password Strength:</font><a id="Words"><table><tr><td><table><tr><td height=4 width=150 bgcolor=tan></td></tr></table></td><td>   <b>Begin Typing</b></td></tr></table></a></td></tr></table></td></tr></table>



</form>
<?php
echo "<br /><br /><strong>Strong Password Generator</strong><br />";
echo "Strong Password: " . '<font color="red">' . make_password(15) . "</font>";
?>

<?php 

//Check_Password('heythere');
/*function Check_Password($password)
         {
         //Makes it easy to implement grammar rules.
         $password_flaws = array();
         $strlen = strlen($password);
         if($strlen <= 5)
            $password_flaws[sizeof($password_flaws)] = "too short";
         $count_chars = count_chars($password, 3);
         if(strlen($count_chars) < $strlen / 2)
            $password_flaws[sizeof($password_flaws)] = "too simple";
         //The function returns an empty string if the password is "good".
         $return_string = "";
         $sizeof = sizeof($password_flaws);
         for($index = 0; $index < $sizeof; $index++)
            {
            if($index == 0)
               $return_string .= "the password is ";
            if($index == $sizeof - 1 && $sizeof != 1)
               $return_string .= " and ";
            //this is in case i have more than 3 sources of error.
            if($index != 0 && $index != $sizeof - 1)
               $return_string .= ", ";
            $return_string .= $password_flaws[$index];
            }
         return($return_string);
         }
*/?>
          </div>
   Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>
<?  }

function mrt_sub2(){
 ?>
        <div class=wrap>
                <h2><?php _e('WP - Security Support') ?></h2>
          <div style="height:299px">
<br /><br />support page coming soon...
<br /><br /><br />
              <em>For comments, suggestions, bug reporting, etc email <a href="mailto:michael@semperfiwebdesign.com">michael@semperfiwebdesign.com</a></em>


          </div>
   Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>
<?  }



?>
