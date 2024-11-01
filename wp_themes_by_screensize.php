<?php
/*
Plugin Name: WP Themes by Screensize
Plugin URI: http://www.sitecoders.net/wordpress-plugins/wp-themes-by-screensize/
Description: A VERY simple plugin to display theme depending on browser size.
Version: 0.1.1
Author: Adam Sargant
Author URI: http://www.sitecoders.net
License: GPL2
Copyright 2011  Adam Sargant  (email : adam@sargant.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
register_activation_hook(__FILE__, 'aphs_tbs_install');

function aphs_tbs_install(){
	//first check that option aphs_tbs_options is not set already
	if(get_option('aphs_tbs_options')===false){
		$aphs_tbs_options=array(
			'whenscreensizegt'=>'',
			'whenscreensizelt'=>'',
			'screensize'=>1024,
			'recheck_cookie_duration'=>30	
		);
		update_option('aphs_tbs_options', $aphs_tbs_options);
	}
}

define('APHS_TBS_INSERTJS', plugin_dir_url(__FILE__).'js/');

if ( is_admin() ) {
	// we're in wp-admin
	require_once( dirname(__FILE__) . '/includes/admin.php' );
}
else{
	require_once( dirname(__FILE__) . '/includes/detectscreensize.php' );
}
?>
