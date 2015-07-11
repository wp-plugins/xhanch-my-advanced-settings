<?php
	/*
		Plugin Name: Xhanch - My Advanced Settings
		Plugin URI: http://xhanch.com/wordpress-plugin-my-advanced-settings/
		Description: Provide useful advanced settings that are not provided by WordPress by default
		Author: Susanto BSc (Xhanch Studio)
		Author URI: http://xhanch.com
		Version: 1.1.2
	*/
	
	define('xms', true);
	define('xms_base_dir', dirname(__FILE__));
		
	global $xms_conf;
	global $xms_default;
		
	load_plugin_textdomain('xms', WP_PLUGIN_URL.'/xhanch-my-advanced-settings/lang/', 'xhanch-my-advanced-settings/lang/');
		
	$xms_default = array(
		'disable_wp_auto_p' => array(
			'post' => 0,
			'comment' => 0
		),
		'disable_wp_texturize' => array(
			'post' => 0,
			'comment' => 0
		),
		'disable_convert_chars' => array(
			'post' => 0,
			'comment' => 0
		),
		'disable_post_revision' => 1,
		'disable_tinymce' => 0,
		'disable_canonical_url' => 0,
		'disable_xml_rpc' => 1,
		'enable_shortcode_on_text_widget' => 1,
		'hide_top_admin_bar' => 0,
		'show_sql_query_num' => 0,
		'favicon_url' => '',
		'ga_acc_id' => '',
		'show_credit' => 0,
		'show_sql_error' => 0,
	);
		
	$xms_conf = get_option('xms_conf');
	if($xms_conf === false){
		$xms_conf = array();
	}
	
	function xms_install () {
		require_once(xms_base_dir.'/installer.php');
	}
	register_activation_hook(__FILE__,'xms_install');

	xms_inc('inc');
	
	define('xms_base_url', xms_get_dir('url'));

	if($xms_conf['show_sql_error']){
		global $wpdb;
		$wpdb->show_errors();
	}
	
	if($xms_conf['disable_wp_auto_p']['post'])
		remove_filter ('the_content',  'wpautop');
	if($xms_conf['disable_wp_auto_p']['comment'])
		remove_filter ('comment_text',  'wpautop');
		
	if($xms_conf['disable_wp_texturize']['post'])
		remove_filter ('the_content',  'wptexturize');
	if($xms_conf['disable_wp_texturize']['comment'])
		remove_filter ('comment_text',  'wptexturize');
		
	if($xms_conf['disable_convert_chars']['post'])
		remove_filter ('the_content',  'convert_chars');
	if($xms_conf['disable_convert_chars']['comment'])
		remove_filter ('comment_text',  'convert_chars');
	
	if($xms_conf['disable_post_revision'])
		define ('WP_POST_REVISIONS', 0);
	if($xms_conf['disable_tinymce'])
		add_filter('user_can_richedit', 'xms_disable_tinymce');
	if($xms_conf['disable_canonical_url'])
		remove_action('wp_head', 'rel_canonical');
	if($xms_conf['enable_shortcode_on_text_widget'])
		add_filter('widget_text', 'do_shortcode');
	if($xms_conf['hide_top_admin_bar']){
		wp_deregister_script('admin-bar');
		wp_deregister_style('admin-bar');
		remove_action('wp_footer','wp_admin_bar_render',1000);
	}
	if($xms_conf['disable_xml_rpc'])
		add_filter('xmlrpc_enabled', '__return_false');
	if($xms_conf['show_sql_query_num'])
		add_action('wp_footer', 'xms_sql_query_num');	
	
	add_action('wp_head', 'xms_head');
		
	if($xms_conf['show_credit'])
		add_action('wp_footer', 'xms_credit');	

	function xms_head(){
		global $xms_conf;
		
		$content = '';
		
		if($xms_conf['favicon_url'])
			$content .= '<link rel="shortcut icon" href="'.$xms_conf['favicon_url'].'" />';
		if($xms_conf['ga_acc_id'])
			$content .= '
				<script type="text/javascript"> 
					var _gaq = _gaq || [];
					_gaq.push([\'_setAccount\', \''.$xms_conf['ga_acc_id'].'\']);
					_gaq.push([\'_trackPageview\']);
		
					(function() {
						var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
						ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
						var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
					})();		 
				</script>
			';
		echo $content;
	}

	function xms_credit() {
		$content = '<div style="font-size:10px;text-align:center">Empowered by <a href="http://xhanch.com/wordpress-plugin-my-advanced-settings/" rel="section" title="'.__('Xhanch - My Advanced Settings - Provide useful advanced options that are not provided by WordPress by default', 'xms').'">'.__('My Advanced Settings', 'xms').'</a>, <a href="http://xhanch.com/" rel="section" title="'.__('Developed by Xhanch Studio', 'xms').'">'.__('by Xhanch Studio', 'xms').'</a></div>';
		echo $content;
	}
	
	function xms_disable_tinymce($res){
		return false;
	}
	
	function xms_sql_query_num(){
		global $wpdb;
		$content = '<div style="font-size:10px;text-align:center">'.$wpdb->num_queries.' '.__('SQL queries have been executed to show this page', 'xms').'</div>';
        echo $content;
	}
			
	if(is_admin()){
		function xms_admin_menu() {	//var_dump(xhanch_root);
			if(!defined('xhanch_root')){
				add_menu_page(
					'Xhanch', 
					'Xhanch', 
					'activate_plugins', 
					'xhanch-my-advanced-settings/admin/xhanch.php', 
					'',
					xms_get_dir('url').'/img/icon.jpg'
				);
				define('xhanch_root', 'xhanch-my-advanced-settings/admin/xhanch.php');
			}//var_dump(xhanch_root);
			add_submenu_page(
				xhanch_root, 
				__('My Advanced Settings', 'xms'), 
				__('My Adv. Settings', 'xms'), 
				'activate_plugins', 
				'xhanch-my-advanced-settings/admin/setting.php', 
				''
			);
		}
		add_action('admin_menu', 'xms_admin_menu');
	}
	
	function xms_inc($rel_path){	
		$path = xms_base_dir.'/'.$rel_path;		
		$dir = dir($path);	
		while($file = $dir->read()){
			if($file == '.' || $file == '..')
				continue;
			$target = $path.'/'.$file;			
			if(is_dir($target))
				 xms_inc($rel_path.'/'.$file);
			elseif(substr($target,-4) == '.php'){				
				require_once $target;	
			}
		}
		$dir->close();
	}
?>