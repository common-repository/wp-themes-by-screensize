<?php

if(isset($_COOKIE['aphs_tbs_screensize'])){
	//add_action('init','aphs_tbs_change_theme');
	add_filter('template', 'aphs_tbs_change_theme_template');
	add_filter('stylesheet', 'aphs_tbs_change_theme_stylesheet');
}
else{
	add_action('init','add_aphs_tbs_screensize_script');
}


function add_aphs_tbs_screensize_script(){
	$options= get_option('aphs_tbs_options');
	$params=array(
		'recheck_cookie_duration'=>$options['recheck_cookie_duration']
	);
	wp_enqueue_script('aphs_tbs_screensize', APHS_TBS_INSERTJS.'aphs_tbs_screensize.js');
	wp_localize_script('aphs_tbs_screensize', 'aphs_tbs_params', $params);
}

function aphs_tbs_change_theme_template(){
	$options= get_option('aphs_tbs_options');
	if($options['screensize']>$_COOKIE['aphs_tbs_screensize']){
		//then we load theme corresonding to $options['whenscreensizelt'] having checked it exists
		$themename=$options['whenscreensizelt'];
	}
	else{
		//then we load theme corresonding to $options['whenscreensizegt'] having checked it exists
		$themename=$options['whenscreensizegt'];
	}
	if(!is_null(get_theme($themename))){
		$themedata=get_theme($themename);
		return $themedata['Template'];
	}
	else{
		$themedata=get_theme(get_current_theme());
		return $themedata['Template'];
	}
}

function aphs_tbs_change_theme_stylesheet(){
	$options= get_option('aphs_tbs_options');
	if($options['screensize']>$_COOKIE['aphs_tbs_screensize']){
		//then we load theme corresonding to $options['whenscreensizelt'] having checked it exists
		$themename=$options['whenscreensizelt'];
	}
	else{
		//then we load theme corresonding to $options['whenscreensizegt'] having checked it exists
		$themename=$options['whenscreensizegt'];
	}
	if(!is_null(get_theme($themename))){
		$themedata=get_theme($themename);
		return $themedata['Stylesheet'];
	}
	else{
		$themedata=get_theme(get_current_theme());
		return $themedata['Stylesheet'];
	}
}
?>
