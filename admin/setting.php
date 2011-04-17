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
				'disable_canonical_url' => xms_form_post('chk_xms_disable_canonical_url'),	
				'enable_shortcode_on_text_widget' => xms_form_post('chk_xms_enable_shortcode_on_text_widget'),
				'hide_top_admin_bar' => xms_form_post('chk_xms_hide_top_admin_bar'),	
				'show_sql_query_num' => xms_form_post('chk_xms_show_sql_query_num'),	
				'favicon_url' => xms_form_post('txt_xms_favicon_url'),
				'ga_acc_id' => xms_form_post('txt_xms_ga_acc_id'),
				'show_credit' => xms_form_post('chk_xms_show_credit'),	
				'show_sql_error' => xms_form_post('chk_xms_show_sql_error'),	
			);
						
			update_option('xms_conf', $xms_conf);	
			echo '<div id="message" class="updated fade"><p>'.__('Configuration Updated', 'xms').'</p></div>';
		}		
		if(isset($_POST['cmd_xms_update_services'])){				
			$sql = "
				UPDATE ".$wpdb->prefix."options 
				SET `option_value` = 'http://www.a2b.cc/setloc/bp.a2b
http://1470.net/api/ping
http://a2b.cc/setloc/bp.a2b
http://api.feedster.com/ping
http://api.moreover.com/ping
http://api.moreover.com/RPC2
http://api.my.yahoo.co.jp/RPC2
http://api.my.yahoo.com/ping
http://api.my.yahoo.com/RPC2
http://api.my.yahoo.com/rss/ping
http://audiorpc.weblogs.com/RPC2
http://bblog.com/ping.php
http://bitacoles.net/notificacio.php
http://bitacoles.net/ping.php
http://bitacoras.net/ping
http://blo.gs/ping.php
http://blog.goo.ne.jp
http://blog.goo.ne.jp/XMLRPC
http://blogbot.dk/io/xml-rpc.php
http://blogdb.jp
http://blogdb.jp/xmlrpc
http://blogdigger.com/RPC2
http://blogmatcher.com/u.php
http://blogoole.com/ping/
http://blogoon.net/ping/
http://blogpeople.net/ping
http://blogroots.com/tb_populi.blog?id=1
http://blogsearch.google.ae/ping/RPC2
http://blogsearch.google.at/ping/RPC2
http://blogsearch.google.be/ping/RPC2
http://blogsearch.google.bg/ping/RPC2
http://blogsearch.google.ca/ping/RPC2
http://blogsearch.google.ch/ping/RPC2
http://blogsearch.google.cl/ping/RPC2
http://blogsearch.google.co.cr/ping/RPC2
http://blogsearch.google.co.hu/ping/RPC2
http://blogsearch.google.co.id/ping/RPC2
http://blogsearch.google.co.il/ping/RPC2
http://blogsearch.google.co.in/ping/RPC2
http://blogsearch.google.co.it/ping/RPC2
http://blogsearch.google.co.jp/ping/RPC2
http://blogsearch.google.co.ma/ping/RPC2
http://blogsearch.google.co.nz/ping/RPC2
http://blogsearch.google.co.th/ping/RPC2
http://blogsearch.google.co.uk/ping/RPC2
http://blogsearch.google.co.ve/ping/RPC2
http://blogsearch.google.co.za/ping/RPC2
http://blogsearch.google.com.ar/ping/RPC2
http://blogsearch.google.com.au/ping/RPC2
http://blogsearch.google.com.br/ping/RPC2
http://blogsearch.google.com.co/ping/RPC2
http://blogsearch.google.com.do/ping/RPC2
http://blogsearch.google.com.mx/ping/RPC2
http://blogsearch.google.com.my/ping/RPC2
http://blogsearch.google.com.pe/ping/RPC2
http://blogsearch.google.com.sa/ping/RPC2
http://blogsearch.google.com.sg/ping/RPC2
http://blogsearch.google.com.tr/ping/RPC2
http://blogsearch.google.com.tw/ping/RPC2
http://blogsearch.google.com.ua/ping/RPC2
http://blogsearch.google.com.uy/ping/RPC2
http://blogsearch.google.com.vn/ping/RPC2
http://blogsearch.google.com/ping/RPC2
http://blogsearch.google.com/ping/RPC2
http://blogsearch.google.com/ping/RPC2
http://blogsearch.google.de/ping/RPC2
http://blogsearch.google.es/ping/RPC2
http://blogsearch.google.fi/ping/RPC2
http://blogsearch.google.fr/ping/RPC2
http://blogsearch.google.gr/ping/RPC2
http://blogsearch.google.hr/ping/RPC2
http://blogsearch.google.ie/ping/RPC2
http://blogsearch.google.in/ping/RPC2
http://blogsearch.google.it/ping/RPC2
http://blogsearch.google.jp/ping/RPC2
http://blogsearch.google.lt/ping/RPC2
http://blogsearch.google.nl/ping/RPC2
http://blogsearch.google.pl/ping/RPC2
http://blogsearch.google.pt/ping/RPC2
http://blogsearch.google.ro/ping/RPC2
http://blogsearch.google.ru/ping/RPC2
http://blogsearch.google.se/ping/RPC2
http://blogsearch.google.sk/ping/RPC2
http://blogsearch.google.tw/ping/RPC2
http://blogsearch.google.us/ping/RPC2
http://blogshares.com/rpc.php
http://blogsnow.com/ping
http://blogstreet.com/xrbin/xmlrpc.cgi
http://blogupdate.org/ping/
http://bulkfeeds.net
http://bulkfeeds.net/rpc
http://catapings.com/ping.php
http://coreblog.org/ping
http://effbot.org/rpc/ping.cgi
http://feedsky.com/api/RPC2
http://fgiasson.com/pings/ping.php
http://hamo-search.com/ping.php
http://holycowdude.com/rpc/ping/
http://imblogs.net/ping/
http://lasermemory.com/lsrpc/
http://mod-pubsub.org
http://mod-pubsub.org/kn_apps/blogchatt
http://mod-pubsub.org/knapps/blogchatt
http://mod-pubsub.org/ping.php
http://newsblog.jungleboots.org/ping.php
http://newsisfree.com/RPCCloud
http://packetmonster.net/xmlrpc.php
http://ping.amagle.com
http://ping.amagle.com/
http://ping.bitacoras.com
http://ping.bitacoras.com
http://ping.blo.gs
http://ping.blogg.de/
http://ping.bloggers.jp/rpc
http://ping.blogoon.net/
http://ping.blogs.yandex.ru/RPC2
http://ping.cocolog-nifty.com/xmlrpc
http://ping.exblog.jp/xmlrpc
http://ping.fakapster.com/rpc
http://ping.fc2.com/
http://ping.feedburner.com
http://ping.feeds.yahoo.com/RPC2/
http://ping.kutsulog.net/
http://ping.myblog.jp
http://ping.namaan.net/rpc
http://ping.rootblog.com/rpc.php
http://ping.snap.com/ping/RPC2
http://ping.syndic8.com/xmlrpc.php
http://ping.weblogalot.com/rpc.php
http://ping.weblogs.se
http://ping.wordblog.de/
http://pinger.blogflux.com/rpc
http://pingoat.com/
http://pingoat.com/goat/RPC2
http://pingqueue.com/rpc/
http://popdex.com/addsite.php
http://r.hatena.ne.jp/rpc
http://rcs.datashed.net
http://rcs.datashed.net/RPC2
http://rpc.blogbuzzmachine.com/RPC2
http://rpc.bloggerei.de/ping/
http://rpc.blogrolling.com/pinger
http://rpc.britblog.com/
http://rpc.icerocket.com:10080
http://rpc.newsgator.com/
http://rpc.pingomatic.com
http://rpc.reader.livedoor.com/ping
http://rpc.tailrank.com/feedburner/RPC2
http://rpc.technorati.com/rpc/ping
http://rpc.twingly.com
http://rpc.weblogs.com/RPC2
http://rpc.wpkeys.com
http://services.newsgator.com/ngws/xmlrpcping.aspx
http://signup.alerts.msn.com/alerts-PREP/submitPingExtended.doz
http://snipsnap.org/RPC2
http://syndic8.com/xmlrpc.php
http://thingamablog.sourceforge.net/ping.php
http://topicexchange.com
http://topicexchange.com/RPC2
http://trackback.bakeinu.jp/bakeping.php
http://wasalive.com/ping/
http://weblogues.com/ping/
http://weblogues.com/RPC/
http://www.a2b.cc
http://www.a2b.cc/setloc/bp.a2b
http://www.bitacoles.net/ping.php
http://www.blogdigger.com/RPC2
http://www.bloglines.com/ping
http://www.blogoole.com/ping/
http://www.blogoon.net/ping
http://www.blogpeople.net
http://www.blogpeople.net/servlet/weblogUpdates
http://www.blogroots.com
http://www.blogroots.com/tb_populi.blog?id=1
http://www.blogroots.com/tbpopuli.blog?id=1
http://www.blogsdominicanos.com/ping/
http://www.blogshares.com/rpc.php
http://www.blogsnow.com/ping
http://www.blogstreet.com/xrbin/xmlrpc.cgi
http://www.catapings.com/ping.php
http://www.feedsky.com/api/RPC2
http://www.holycowdude.com/rpc/ping/
http://www.imblogs.net/ping/
http://www.lasermemory.com
http://www.lasermemory.com/lsrpc
http://www.mod-pubsub.org/kn_apps/blogchatter/ping.php
http://www.mod-pubsub.org/knapps/blogchatter/ping.php
http://www.mod-pubsub.org/ping.php
http://www.newsisfree.com/RPCCloud
http://www.newsisfree.com/xmlrpctest.php
http://www.octora.com/add_rss.php
http://www.popdex.com
http://www.popdex.com/addsite.php
http://www.snipsnap.org
http://www.snipsnap.org/RPC2
http://www.wasalive.com/ping/
http://www.weblogues.com
http://www.weblogues.com/RPC
http://www.xianguo.com/xmlrpc/ping.php
http://www.zhuaxia.com/rpc/server.php
http://xmlrpc.blogg.de
http://xping.pubsub.com/ping
http://zhuaxia.com/rpc/server.php
http://zing.zingfast.com'
				where option_name = 'ping_sites'
			";						
			$wpdb->query($sql);
			
			echo '<div id="message" class="updated fade"><p>'.__('Your update services list (ping list) has been updated', 'xms').'</p></div>';
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
                        <td width="22px"><input type="checkbox" id="chk_xms_disable_canonical_url" name="chk_xms_disable_canonical_url" value="1" <?php echo ($xms_conf['disable_canonical_url']?'checked="checked"':''); ?>/></td>
                        <td width="775px"><?php echo __('Disable/hide canonical URL?', 'xms'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xms_enable_shortcode_on_text_widget" name="chk_xms_enable_shortcode_on_text_widget" value="1" <?php echo ($xms_conf['enable_shortcode_on_text_widget']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Enable shortcode on text widgets?', 'xms'); ?></td>
                    </tr>
                    <tr>
                        <td width="22px"><input type="checkbox" id="chk_xms_hide_top_admin_bar" name="chk_xms_hide_top_admin_bar" value="1" <?php echo ($xms_conf['hide_top_admin_bar']?'checked="checked"':''); ?>/></td>
                        <td width="775px"><?php echo __('Hide WP Admin bar on top?', 'xms'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xms_show_sql_query_num" name="chk_xms_show_sql_query_num" value="1" <?php echo ($xms_conf['show_sql_query_num']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Display total number of executed SQL queries?', 'xms'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xms_show_sql_error" name="chk_xms_show_sql_error" value="1" <?php echo ($xms_conf['show_sql_error']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Show SQL errors (FYI, Wordpress hide all SQL query error by default)?', 'xms'); ?></td>
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
                        <td width="75px"> <p class="submit"><input type="submit" name="cmd_xms_update_services" value="<?php echo __('Apply', 'xms'); ?>"/></p></td>
                        <td width="722px"><?php echo __('Insert 200+ update services (ping list)', 'xms'); ?> (<a href="options-writing.php">See your update services here</a>)</td>
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
			<b>Useful links:</b><br/>
			- <a href="http://forum.xhanch.com/index.php/board,20.0.html" target="_blank">Update/change logs of this plugin </a><br/>
			- <a href="http://forum.xhanch.com/index.php/board,28.0.html" target="_blank">Ask and share about how to customize this plugin. You may also ask questions about plugin configurations</a><br/>
			- <a href="http://forum.xhanch.com/index.php/board,32.0.html" target="_blank">Have a thought to improve this plugin? Suggest it here</a><br/>
			- <a href="http://forum.xhanch.com/index.php/board,36.0.html" target="_blank">Found a bug/error? Kindly report it here</a><br/>
			- <a href="http://forum.xhanch.com/index.php/board,24.0.html" target="_blank">Share your experience of using this plugin. You may show off your websites that use this plugin here by providing the URL of yor website</a><br/>
			<br/>		
			<br/>
		</div>
<?php
	}
	
	xms_setting();
?>