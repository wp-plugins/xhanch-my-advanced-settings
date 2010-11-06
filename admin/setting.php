<?php
	if(!defined('xms'))
		exit;
	
	function xms_setting(){
		global $wpdb;
		global $xms_conf;
		global $xms_default;
				
		if($_POST['cmd_xms_update']){
			$xms_conf = array(
				'disable_wp_auto_p' => array(
					'post' => xms_form_post('chk_xms_disable_wp_auto_p_post'),
					'comment' => xms_form_post('chk_xms_disable_wp_auto_p_comment'),
				),
				'disable_wp_texturize' => array(
					'post' => xms_form_post('chk_xms_disable_wp_texturize_post'),
					'comment' => xms_form_post('chk_xms_disable_wp_texturize_comment'),
				),	
				'disable_convert_chars' => array(
					'post' => xms_form_post('chk_xms_disable_convert_chars_post'),
					'comment' => xms_form_post('chk_xms_disable_convert_chars_comment'),
				),
				'disable_post_revision' => xms_form_post('chk_xms_disable_post_revision'),		
				'disable_tinymce' => xms_form_post('chk_xms_disable_tinymce'),	
				'enable_shortcode_on_text_widget' => xms_form_post('chk_xms_enable_shortcode_on_text_widget'),
				'show_sql_query_num' => xms_form_post('chk_xms_show_sql_query_num'),	
				'favicon_url' => xms_form_post('txt_xms_favicon_url'),
				'ga_acc_id' => xms_form_post('txt_xms_ga_acc_id'),
				'show_credit' => xms_form_post('chk_xms_show_credit'),	
			);
						
			update_option('xms_conf', $xms_conf);	
			echo '<div id="message" class="updated fade"><p>'.__('Configuration Updated', 'xms').'</p></div>';
		}			
?>
		<style type="text/css">
			table, td{font-family:Arial;font-size:12px}
			tr{height:22px}
			ul li{line-height:2px}	
			.clear{clear:both}		
		</style>
		<script type="text/javascript">
			function show_spoiler(obj){
				var inner = obj.parentNode.getElementsByTagName("div")[0];
				if (inner.style.display == "none")
					inner.style.display = "";
				else
					inner.style.display = "none";
			}
			function show_more(obj_nm){
				var obj = document.getElementById(obj_nm);
				if (obj.style.display == "none")
					obj.style.display = "";
				else
					obj.style.display = "none";
			}
    	</script>
		<div class="wrap">
			<h2><?php echo __('Xhanch - My Advanced Settings - Configuration', 'xms'); ?></h2>		
            <div style="float:right;line-height:21px">
            	<b><?php echo __('Do you like this plugin? If yes, click this button -&gt;', 'xms'); ?></b> <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fxhanch.com%2Fwordpress-plugin-my-advanced-settings/%2F&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:1px solid #999; overflow:hidden; width:100px; height:21px; margin:0 0 0 10px; float:right" allowTransparency="true"></iframe>           
            </div>
            <div class="clear"></div>	
            <div style="float:right;line-height:21px">
            	<b><?php echo __('Do you like our service and support? If yes, click this button -&gt;', 'xms'); ?></b> <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FXhanch-Studio%2F146245898739871&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:1px solid #999; overflow:hidden; width:100px; height:21px; margin:0 0 0 10px; float:right" allowTransparency="true"></iframe>           
            </div>
            <div class="clear"></div>
			<br/>
                
            <form action="" method="post">
                <i><small>Note: <a href="#guide"><?php echo __('Click here for a complete explaination about these configurations fields', 'xms'); ?></a></small></i><br/>
                <br/>                             
                <br/>
                <table cellpadding="0" cellspacing="0">
                
                    <tr>
                        <td colspan="2">
							<?php echo __('Disable wp auto p <i>(This will stop WordPress to add paragraph (P html tag) automatically)</i>', 'xms'); ?>
                            <table cellpadding="0" cellspacing="0" style="margin-bottom:5px">
                            	<tr>
                        			<td width="22px"><input type="checkbox" id="chk_xms_disable_wp_auto_p_post" name="chk_xms_disable_wp_auto_p_post" value="1" <?php echo ($xms_conf['disable_wp_auto_p']['post']?'checked="checked"':''); ?>/></td>
                                    <td width="200px"><?php echo __('On post/page content', 'xms'); ?></td>
                                    <td width="10px"></td>
                        			<td width="22px"><input type="checkbox" id="chk_xms_disable_wp_auto_p_comment" name="chk_xms_disable_wp_auto_p_comment" value="1" <?php echo ($xms_conf['disable_wp_auto_p']['comment']?'checked="checked"':''); ?>/></td>
                                   	<td width="200px"><?php echo __('On post/page comments', 'xms'); ?></td>                                	
                                </tr>
                            </table>
                       	</td>
                    </tr>
                
                    <tr>
                        <td colspan="2">
							<?php echo __('Disable content texturize? <i>(This will stop WordPress to automatically clean up your HTML codes)</i>', 'xms'); ?>
                            <table cellpadding="0" cellspacing="0" style="margin-bottom:5px">
                            	<tr>
                        			<td width="22px"><input type="checkbox" id="chk_xms_disable_wp_texturize_post" name="chk_xms_disable_wp_texturize_post" value="1" <?php echo ($xms_conf['disable_wp_texturize']['post']?'checked="checked"':''); ?>/></td>
                                    <td width="200px"><?php echo __('On post/page content', 'xms'); ?></td>
                                    <td width="10px"></td>
                        			<td width="22px"><input type="checkbox" id="chk_xms_disable_wp_texturize_comment" name="chk_xms_disable_wp_texturize_comment" value="1" <?php echo ($xms_conf['disable_wp_texturize']['comment']?'checked="checked"':''); ?>/></td>
                                   	<td width="200px"><?php echo __('On post/page comments', 'xms'); ?></td>                                	
                                </tr>
                            </table>
                       	</td>
                    </tr>
                
                    <tr>
                        <td colspan="2">
							<?php echo __('Disable characters conversion? <i>(This will stop WordPress to automatically convert special characters to its HTML mode)</i>', 'xms'); ?>
                            <table cellpadding="0" cellspacing="0" style="margin-bottom:5px">
                            	<tr>
                        			<td width="22px"><input type="checkbox" id="chk_xms_disable_convert_chars_post" name="chk_xms_disable_convert_chars_post" value="1" <?php echo ($xms_conf['disable_convert_chars']['post']?'checked="checked"':''); ?>/></td>
                                    <td width="200px"><?php echo __('On post/page content', 'xms'); ?></td>
                                    <td width="10px"></td>
                        			<td width="22px"><input type="checkbox" id="chk_xms_disable_convert_chars_comment" name="chk_xms_disable_convert_chars_comment" value="1" <?php echo ($xms_conf['disable_convert_chars']['comment']?'checked="checked"':''); ?>/></td>
                                   	<td width="200px"><?php echo __('On post/page comments', 'xms'); ?></td>                                	
                                </tr>
                            </table>
                       	</td>
                    </tr>                    
                    <tr>
                        <td width="22px"><input type="checkbox" id="chk_xms_disable_post_revision" name="chk_xms_disable_post_revision" value="1" <?php echo ($xms_conf['disable_post_revision']?'checked="checked"':''); ?>/></td>
                        <td width="775px"><?php echo __('Disable post/page revision logging? <i>(This will stop WordPress to store post/page revisions records that will mostly be junks to your database)</i>', 'xms'); ?></td>
                    </tr>
                    <tr>
                        <td width="22px"><input type="checkbox" id="chk_xms_disable_tinymce" name="chk_xms_disable_tinymce" value="1" <?php echo ($xms_conf['disable_tinymce']?'checked="checked"':''); ?>/></td>
                        <td width="775px"><?php echo __('Disable the TinyMCE/visual rich text editor?', 'xms'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xms_enable_shortcode_on_text_widget" name="chk_xms_enable_shortcode_on_text_widget" value="1" <?php echo ($xms_conf['enable_shortcode_on_text_widget']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Enable shortcode on text widgets?', 'xms'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xms_show_sql_query_num" name="chk_xms_show_sql_query_num" value="1" <?php echo ($xms_conf['show_sql_query_num']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Display total number of executed SQL queries?', 'xms'); ?></td>
                    </tr>
                </table><br/>          
                
                <table cellpadding="0" cellspacing="0">                
                    <tr>
                        <td width="250px"><?php echo __('Favicon URL', 'xms'); ?></td>
                        <td width="400px"><input type="text" id="txt_xms_favicon_url" name="txt_xms_favicon_url" value="<?php echo $xms_conf['favicon_url']; ?>" style="width:300px"/></td>
                    </tr>             
                    <tr>
                        <td><?php echo __('Google Analytics Account ID', 'xms'); ?> (<a href="javascript:show_more('sct_ga_acc_id')">?</a>)</td>
                        <td><input type="text" id="txt_xms_ga_acc_id" name="txt_xms_ga_acc_id" value="<?php echo $xms_conf['ga_acc_id']; ?>" style="width:300px"/></td>
                    </tr>          
                    <tr id="sct_ga_acc_id" style="display:none;">
                        <td colspan="2">
                        	<small>
	                        	How to know you google analytics account ID?<br/>
    	                        You can find it on your analytics javascript code. In the JavaScript you can see your account ID in a format like UA-??????-?
                            </small>                        
                        </td>
                    </tr>
                </table><br/>    
                
                <table cellpadding="0" cellspacing="0">                
                    <tr>
                        <td width="22px"><input type="checkbox" id="chk_xms_show_credit" name="chk_xms_show_credit" value="1" <?php echo ($xms_conf['show_credit']?'checked="checked"':''); ?>/></td>
                        <td width="775px"><?php echo __('Show Credit?', 'xms'); ?></td>
                    </tr>
                </table>
                
                <p class="submit">
                    <input type="submit" name="cmd_xms_update" value="<?php echo __('Update Configuration', 'xms'); ?>"/>
                </p>
            </form>	
				
			<br/><br/>
			<a name="guide"></a>
			<b><big><?php echo __('Support This Plugin Development', 'xms'); ?></big></b><br/>
			<br/>
			<?php echo __('Do you like this plugin? Do you think this plugin very helpful?', 'xms'); ?><br/>
			<?php echo __('Why don\'t you support this plugin developement by donating any amount you are willing to give?', 'xms'); ?><br/>
			<br/>
			<?php echo __('If you wish to support the developer and make a donation, please click the following button. Thanks!', 'xms'); ?><br/>
			<a href="http://xhanch.com/xhanch-donate" target="_blank"><img src="http://xhanch.com/image/paypal/btn_donate.gif" alt="<?php echo __('Donate', 'xms'); ?>"></a></p>

			<br/><br/>
			<a name="guide"></a>
			<b><big><?php echo __('Complete Info and Share Room', 'xms'); ?></big></b><br/>		
			<br/>	
			<div class="spoiler">
				<input type="button" onclick="show_spoiler(this);" value="<?php echo __('Complete information regarding Xhanch - My Advanced Settings (Share Room)', 'xms'); ?>"/>
				<div class="inner" style="display:none;">
					<br/>
					<iframe src="http://xhanch.com/wordpress-plugin-my-advanced-settings/" style="width:700px;height:500px"></iframe>
				</div>
			</div>			
			<br/>			
			<br/>
		</div>
<?php
	}
	
	xms_setting();
?>