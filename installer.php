<?php
	global $wpdb;
	global $xms_conf;
	global $xms_default;
				
	$xms_conf = get_option('xms_conf');
	if($xms_conf === false){
		$xms_conf = $xms_default;	
		add_option('xms_conf', $xms_conf);
	}else{			
		$xms_conf['show_credit'] = 1;
		$xms_conf = array_merge($xms_default, $xms_conf);		
		update_option('xms_conf', $xms_conf);
	}
?>