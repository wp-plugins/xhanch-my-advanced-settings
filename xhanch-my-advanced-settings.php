<?php
	/*
		Plugin Name: Xhanch - My Advanced Settings
		Plugin URI: http://xhanch.com/wordpress-plugin-my-advanced-settings/
		Description: Provide useful advanced settings that are not provided by WordPress by default
		Author: Susanto BSc (Xhanch Studio)
		Author URI: http://xhanch.com
		Version: 1.0.0
	*/
	
	define('xms', true);
	define('xms_base_dir', dirname(__FILE__));
		
	global $xms_conf;
	global $xms_default;
		
	load_plugin_textdomain('xms', WP_PLUGIN_URL.'/xhanch-my-advanced-settings/lang/', 'xhanch-my-advanced-settings/lang/');
		
	$xms_default = array(
		'disable_wp_auto_p_post' => 0,
		'disable_wp_auto_p_comment' => 0,
		'disable_wp_texturize' => 0,
		'disable_post_revision' => 1,
		'enable_shortcode_on_text_widget' => 1,
		'show_credit' => 1,
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
	
	if($xms_conf['disable_wp_auto_p_post'])
		remove_filter ('the_content',  'wpautop');
	if($xms_conf['disable_wp_auto_p_comment'])
		remove_filter ('comment_text',  'wpautop');
	if($xms_conf['disable_wp_texturize'])
		remove_filter ('the_content',  'wptexturize');
	if($xms_conf['disable_post_revision'])
		define ('WP_POST_REVISIONS', 0);
	if($xms_conf['enable_shortcode_on_text_widget'])
		add_filter('widget_text', 'do_shortcode');
	if($xms_conf['show_credit'])
		add_action('wp_footer', 'xmp_credit');	

	function xmp_credit() {
		$content = '<div style="font-size:10px">Empowered by <a href="http://xhanch.com/wordpress-plugin-my-advanced-settings/" rel="section" title="'.__('Xhanch - My Advanced Settings - Provide useful advanced options that are not provided by WordPress by default', 'xms').'">'.__('My Advanced Settings', 'xms').'</a>, <a href="http://xhanch.com/" rel="section" title="'.__('Developed by Xhanch Studio', 'xms').'">'.__('by Xhanch Studio', 'xms').'</a></div>';
		echo $content;
	}
			
	if(is_admin()){
		function xms_admin_menu() {	
			if(!defined('xhanch_root')){
				add_menu_page(
					'Xhanch', 
					'Xhanch', 
					8, 
					'xhanch', 
					'xhanch_intro',
					'http://xhanch.com/icon-16x16.jpg'
				);
				define('xhanch_root', true);
			}
			add_submenu_page(
				'xhanch', 
				__('My Advanced Settings', 'xms'), 
				__('My Adv. Settings', 'xms'), 
				8, 
				'xhanch-my-advanced-settings', 
				'xms_setting'
			);
		}
		require_once(xms_base_dir.'/admin/xhanch.php');
		require_once(xms_base_dir.'/admin/setting.php');
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