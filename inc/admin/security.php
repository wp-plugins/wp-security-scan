<?php

function mrt_opt_mng_pg() {

echo '
	<div class="wrap">
		<div class="wpss_icon"><br /></div>
    		<h2>WP - Security Admin Tools</h2>';  

			add_meta_box("wpss_mrt", 'Initial Scan', "wpss_mrt_meta_box", "wpss");  
			add_meta_box("wpss_mrt", 'System Information Scan', "wpss_mrt_meta_box2", "wpss2");  
			add_meta_box("wpss_mrt", 'About Website Defender', "wpss_mrt_meta_box5", "wpss5");

echo '	
		<div class="wrap">
			<div class="metabox-holder">
				<div style="float:left; width:48%;" class="inner-sidebar1">';
		 
					do_meta_boxes('wpss','advanced',''); 	
					do_meta_boxes('wpss2','advanced',''); 	

echo '		
				</div>
				<div style="float:right;width:48%;" class="inner-sidebar1">';
					do_meta_boxes('wpss5','advanced','');  
echo '	
				</div>
						
				<div style="clear:both"></div>
			</div>
			<div style="clear:both;"></div>
		</div>
		<br /><em>For comments, suggestions, bug reporting, etc please <a href="http://semperfiwebdesign.com/contact/">click here</a>.</em>
        Plugin by <a href="http://semperfiwebdesign.com/" title="Semper Fi Web Design">Semper Fi Web Design</a>
	</div>';

	}
?>