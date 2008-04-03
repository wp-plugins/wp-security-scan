<?php
function mrt_sub1(){
 ?>
        <div class=wrap>
                <h2><?php _e('WP - Security Scan') ?></h2>
          <div style="height:299px">
              <?php
echo "Password Strength Tool";
?>

<script language="JavaScript1.1">
function testPassword(passwd){
var description = new Array();
description[0] = "<table><tr><td><table cellpadding=0 cellspacing=2><tr><td height=4 width=30 bgcolor=#ff0000></td><td height=4 width=120 bgcolor=tan></td></tr></table></td><td>   <b>Weakest</b></td></tr></table>";
description[1] = "<table><tr><td><table cellpadding=0 cellspacing=2><tr><td height=4 width=60 bgcolor=#990000></td><td height=4 width=90 bgcolor=tan></td></tr></table></td><td>   <b>Weak</b></td></tr></table>";
description[2] = "<table><tr><td><table cellpadding=0 cellspacing=2><tr><td height=4 width=90 bgcolor=#990099></td><td height=4 width=60 bgcolor=tan></td></tr></table></td><td>   <b>Improving</b></td></tr></table>";
description[3] = "<table><tr><td><table cellpadding=0 cellspacing=2><tr><td height=4 width=120 bgcolor=#000099></td><td height=4 width=30 bgcolor=tan></td></tr></table></td><td>   <b>Strong</b></td></tr></table>";
description[4] = "<table><tr><td><table><tr><td height=4 width=150 bgcolor=#0000ff></td></tr></table></td><td>   <b>Strongest</b></td></tr></table>";
description[5] = "<table><tr><td><table><tr><td height=4 width=150 bgcolor=tan></td></tr></table></td><td>   <b>Begin Typing</b></td></tr></table>";

var base = 0
var combos = 0
if (passwd.match(/[a-z]/)){
base = (base+26);
   }

if (passwd.match(/[A-Z]/)){
base = (base+26);
   }
if (passwd.match(/\d+/)){

base = (base+10);

}



if (passwd.match(/[>!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~]/))

{

base = (base+33);

}



combos=Math.pow(base,passwd.length);



if(combos == 1)

{

strVerdict = description[5];

}

else if(combos > 1 && combos < 1000000)

{

strVerdict = description[0];

}

else if (combos >= 1000000 && combos < 1000000000000)

{

strVerdict = description[1];

}

else if (combos >= 1000000000000 && combos < 1000000000000000000)

{

strVerdict = description[2];

}

else if (combos >= 1000000000000000000 && combos < 1000000000000000000000000)

{

strVerdict = description[3];

}

else
{
strVerdict = description[4];
}
document.getElementById("Words").innerHTML= (strVerdict);
}
</script>







<table><tr valign=top><td><form name="commandForm">

Type password: <input type=password size=30 maxlength=50 name=password onkeyup="testPassword(document.forms.commandForm.password.value);" value="">

<br/><font color="#808080">Minimum 6 Characters</td><td><font size="1">  Password Strength:</font><a id="Words"><table><tr><td><table><tr><td height=4 width=150 bgcolor=tan></td></tr></table></td><td>   <b>Begin Typing</b></td></tr></table></a></td></tr></table>

</td></tr></table>



</form>



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
                <h2><?php _e('WP - Security Scan') ?></h2>
          <div style="height:299px">
              coming soon...

          </div>
   Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
        </div>
<?  }



?>
