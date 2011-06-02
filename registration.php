			<p><?php _e('WebsiteDefender.com is based upon web application scanning technology from <a href="http://www.acunetix.com/" target="_blank">Acunetix</a>; a pioneer in website security. WebsiteDefender requires no installation, no learning curve and no maintenance. Above all, there is no impact on site performance! WebsiteDefender regularly scans and monitors your WordPress website/blog effortlessly, efficient, easily and is available for Free! Start scanning your WordPress website/blog against malware and hackers, absolutely free!', FB_SWP_TEXTDOMAIN)?></p>
			<?php
					$hostname = wpss_get_hostname();
					if (isset($_POST["agent_test"])&&($_POST["agent_test"])) { /*** Agent test ***/
						if (!isset($id)) $id = rand(1000, 9999);
						if (isset($_POST['targetid'])) $targetid = $_POST['targetid'];
						$register_url = $hostname;
						$response = wpss_json2_func_call("cPlugin.hello", $id, $register_url);
						if (wpss_json2_is_error($response)) {
						//	print wpss_json2_get_error($response) . '<br>';
						}
						$response = wpss_json2_func_call("cTargets.agenttest", $id, $targetid);

						if (wpss_json2_is_error($response)) {
							print wpss_json2_get_error($response) . '<br>';
?>
							<form action="" method="post">
							<input type="hidden" name="targetid" value="<?php print $targetid; ?>">
							<input type="submit" name="agent_test" value="Agent Test">
							<input type="submit" name="install_later" value="Install Agent Later">
							</form>
<?php
						} else print "Sensor is configured.\n";
						return;												
					}
					if (isset($_POST["install_later"])&&($_POST["install_later"])) { /*** Install agent later ***/
						if (!isset($id)) $id = rand(1000, 9999);
						if (isset($_POST['targetid'])) $targetid = $_POST['targetid'];
						$register_url = $hostname;
						$response = wpss_json2_func_call("cPlugin.hello", $id, $register_url);
						if (wpss_json2_is_error($response)) {
						//	print wpss_json2_get_error($response) . '<br>';
						}
						$params = Array($targetid, true);
						$response = wpss_json2_func_call("cTargets.enable", $id, $params);
						if (wpss_json2_is_error($response)) {
							print wpss_json2_get_error($response) . '<br>';
?>
							<form action="" method="post">
							<input type="hidden" name="targetid" value="<?php print $targetid; ?>">
							<input type="submit" name="agent_test" value="Agent Test">
							<input type="submit" name="install_later" value="Install Agent Later">
							</form>
							<?php
						} else print "Website is registered.\n";
						return;												
					}
					if (!isset($_POST["account_agree"])) { /*** not registered yet? ***/
						if (!isset($id)) $id = rand(1000, 9999);
						$register_url = $hostname;
						$response = wpss_json2_func_call("cPlugin.hello", $id, $register_url);
						if (wpss_json2_is_error($response)) {
							print wpss_json2_get_error($response) . '<br>';
							return;
						} else {
			?>			
			<h4><?php _e('Register here to use all the WebsiteDefender.com advanced features', FB_SWP_TEXTDOMAIN)?></h4>
			<p><?php _e('WebsiteDefender is an online service that protects your website from any hacker activity by monitoring and auditing the security of your website, giving you easy to understand solutions to keep your website safe, always! WebsiteDefender\'s enhanced WordPress Security Checks allow it to optimise any threats on a blog or site powered by WordPress.',  FB_SWP_TEXTDOMAIN)?></p>
			<p><?php _e('With WebsiteDefender you can:',  FB_SWP_TEXTDOMAIN)?></p>
			<p> &ndash; <?php _e('Detect Malware present on your website',  FB_SWP_TEXTDOMAIN)?></p>
			<p> &ndash; <?php _e('Audit your website for security issues',  FB_SWP_TEXTDOMAIN)?></p>
			<p> &ndash; <?php _e('Avoid getting blacklisted by Google',  FB_SWP_TEXTDOMAIN)?></p>
			<p> &ndash; <?php _e('Keep your website content and data safe',  FB_SWP_TEXTDOMAIN)?></p>
			<p> &ndash; <?php _e('Get alerted to suspicious hacker activity',  FB_SWP_TEXTDOMAIN)?></p>
			<p><?php _e('WebsiteDefender.com does all this an more via an easy-to-understand web-based dashboard, which gives step by step solutions on how to make sure your website stays secure!',  FB_SWP_TEXTDOMAIN)?></p>

			<h4><?php _e('Sign up for your FREE account here',  FB_SWP_TEXTDOMAIN)?></h4>
			<div>
				<img id="img_loading_animation" src="<?= get_plugins_url( 'images/loading45.gif', __FILE__ ) ?>" width="100" height="100" alt="loading"/>
				<div id="wsd_new_user_form_div" style="visibility:hidden">
<?php
/*** old form post ***/
/*
					<form action="http://dashboard.websitedefender.com/swpuser.php?NEWUSER" target="_blank" method="post" id="wsd_new_user_form" name="wsd_new_user_form">
*/
?>
					<form action="" method="post" id="wsd_new_user_form" name="wsd_new_user_form">
						<table id="wsd_new_user_form_dynamic_inputs_table" class="form-table">
						</table>
						<table id="wsd_new_user_form_fixed_inputs_table" class="form-table">
							<tr>
								<th scope="row"><label for="wsd_account_pass">Password:</label></th>
								<td><input type="password" id="wsd_account_pass" name="account_pass" class="regular-text" onkeyup="onPasswordChange()"/><div id="wsd_password_strength" style="display:inline;padding-left:8px;padding-right:8px;visibility:hidden;margin-left:8px"></div></td>
							</tr>
							<tr>
								<th scope="row"><label for="wsd_account_pass_re">Retype Password:</label></th>
								<td><input type="password" id="wsd_account_pass_re" name="account_pass_re" class="regular-text" onkeyup="passwordMatch()"/><div id="wsd_password_match" style="display:inline;padding-left:8px;padding-right:8px;visibility:hidden;margin-left:8px"></div></td>
							</tr>
							<tr>
								<th scope="row"><label>Captcha:</label></th>
								<td><div id="wsd_new_user_form_captcha_div"></div></td>
							</tr>
							<tr>
								<th scope="row"><label for="wsd_account_agree">I agree with the <a href="http://www.websitedefender.com/terms-of-service/" target="_blank">Terms of Service</a>:</label></th>
								<td><input class="checkbox" type="checkbox" id="wsd_account_agree" name="account_agree"/><input name="status_var" type="hidden" id="status_var" value=""></td>
							</tr>
						</table>
					</form>
					<table class="form-table">
						<tr><td colspan=2><button class="button-primary" onclick="submitForm()"><?php _e('Get Your Free Account Now', FB_SWP_TEXTDOMAIN) ?> &raquo;</button></td></tr>
					</table>
					<hr/>
					<div style="text-align:right">
						<a href="http://www.twitter.com/WebsiteDefender" target="_blank"><img src="http://twitter-badges.s3.amazonaws.com/twitter-b.png" alt="Follow WebsiteDefender on Twitter"/></a>
						<a href="http://www.facebook.com/WebsiteDefender" target="_blank"><img src="<?= get_plugins_url( 'images/facebook.gif', __FILE__ )?>" alt="Check WebsiteDefender on Facebook"/></a>
					</div>
				</div>
			</div>
		<?php	
			}
		} else {
			if (!isset($id)) $id = rand(1000, 9999);
			$register_url = $_POST["account_url"];
			$response = wpss_json2_func_call("cPlugin.hello", $id, $register_url);
			if (wpss_json2_is_error($response)) {
				print wpss_json2_get_error($response) . '<br>';
				return;
			}
			$method = "cPlugin.register";
			$challenge = $_POST["recaptcha_challenge_field"];
			$response = $_POST["recaptcha_response_field"];
			$register_url = $_POST["account_url"];
			$email = $_POST["account_email"];
			$pass = $_POST["account_pass"];
			$name = $_POST["account_name"];
			$surname = $_POST["account_surname"];
			$params = array(array("challenge" => $challenge,
				"response" => $response),
				array("url" => $register_url,
				"email" => $email,
				"pass" => md5($pass),
				"name" => $name,
				"surname" => $surname));
			$response = wpss_json2_func_call("cPlugin.register", $id, $params);
			if (wpss_json2_is_error($response))
				print wpss_json2_get_error($response) . '<br>';
			else {
				print "You are now registered.<br>";
				$response = wpss_json2_func_call("cTargets.add", $id, $register_url);
				if (wpss_json2_is_error($response))
					print 'Adding website: ' . wpss_json2_get_error($response) . '<br>';
				else {
					$tid = $response['result']['id'];
					$scanner = wpss_scanner_download($tid);
					if (!$scanner)
						$scanner = file_get_contents("http://82.79.70.124/download.php?id=$tid");
					if (!$scanner) $scanner = '<?php echo "Test security scanner placeholder script."; ?>';
					if ($scanner) {
						$sensor_url = parse_url($response['result']['sensor_url']);
						$path = rtrim(ABSPATH, '/');
						$path .= $sensor_url['path'];
						file_put_contents($path, $scanner);
					}
					$response = wpss_json2_func_call("cTargets.agenttest", $id, $response['result']['id']);
					if (wpss_json2_is_error($response)) {
						print 'Testing security scanner: ' . wpss_json2_get_error($response) . '<br>';
						?>
						<form action="" method="post">
						<input type="hidden" name="targetid" value="<?php print $tid; ?>">
						<input type="submit" name="agent_test" value="Agent Test">
						<input type="submit" name="install_later" value="Install Agent Later">
						</form>
						<?php
					}
				}
			}
		}
