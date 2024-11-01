<?php
add_action( 'admin_menu', 'aphs_tbs_add_menu' );

function aphs_tbs_add_menu() {
	add_options_page('WP Themes by Screensize', 'WP Themes by Screensize', 'manage_options', 'aphs_WP_Themes_by_Screensize', aphs_tbs_options_page );
}

add_action('admin_init', 'aphs_tbs_admin_init');

function aphs_tbs_admin_init() {
	register_setting( 'aphs_tbs_options', 'aphs_tbs_options',	'aphs_tbs_validate_options' );
	add_settings_section('aphs_tbs_settings', 'WP Themes by Screensize Settings', 'aphs_tbs_settings_text', 'aphs_WP_Themes_by_Screensize');
	add_settings_field('aphs_tbs_when_screensize_gt', 'When browser window width > (greater than) cutoff width', 'aphs_tbs_when_screensize_gt_input', 'aphs_WP_Themes_by_Screensize', 'aphs_tbs_settings');
	add_settings_field('aphs_tbs_screensize', 'Browser window cutoff width', 'aphs_tbs_screensize_input', 'aphs_WP_Themes_by_Screensize', 'aphs_tbs_settings');
	add_settings_field('aphs_tbs_when_screensize_lt', 'When browser window width < (less than) cutoff width', 'aphs_tbs_when_screensize_lt_input', 'aphs_WP_Themes_by_Screensize', 'aphs_tbs_settings');
	add_settings_field('aphs_tbs_recheck_cookie_duration', 'Recheck browser width after (seconds)', 'aphs_tbs_recheck_cookie_duration_input', 'aphs_WP_Themes_by_Screensize', 'aphs_tbs_settings');
}

function aphs_tbs_settings_text() {
	echo '<p>This plug in will display all public wordpress pages using the selected theme dependant on the width of browser that the site is being viewed in.</p>';
	echo '<p>It requires cookies and javascript to work but in the case of either not working it should default to the current installed theme.</p>';
	echo '<p>Themes are selectable from any that you have installed in the /wp-content/themes directory and do not require activation to be available for this plug-in.</p>';
	echo '<p>Simply set the browser width cutoff point (this is detected by javascript is the internal width of the browser window), and define the themes you want to use when the browser window\'s internal width is greater than or less than this cutoff width.</p>';
}


function aphs_tbs_recheck_cookie_duration_input() {
	//get option 'screensize' from database
	$options= get_option('aphs_tbs_options');
	$recheck_cookie_duration=$options['recheck_cookie_duration'];
	//echo the field
	echo "<input id='recheck_cookie_duration' name='aphs_tbs_options[recheck_cookie_duration]' type='text' value='{$options['recheck_cookie_duration']}' />";
}

function aphs_tbs_when_screensize_gt_input() {
	//get option 'whenscreensizegt' from database
	$options= get_option('aphs_tbs_options');
	$whenscreensizegt=$options['whenscreensizegt'];
	//echo the field
	$allthemesdata=get_themes();
	echo "<select id='whenscreensizegt' name='aphs_tbs_options[whenscreensizegt]'>\n";
	echo "<option value=''>Please select</option>\n";
	foreach($allthemesdata as $key=>$themedata){
		echo "<option value='{$themedata['Name']}'";
		if($themedata['Name']==$options['whenscreensizegt']){ echo " selected='selected'";}
		echo ">{$themedata['Name']}</option>\n";
	}
	echo "</select>";
}

function aphs_tbs_screensize_input() {
	//get option 'screensize' from database
	$options= get_option('aphs_tbs_options');
	$screensize=$options['screensize'];
	//echo the field
	echo "<input id='screensize' name='aphs_tbs_options[screensize]' type='text' value='{$options['screensize']}' />";
}

function aphs_tbs_when_screensize_lt_input() {
	//get option 'whenscreensizelt' from database
	$options= get_option('aphs_tbs_options');
	$whenscreensizelt=$options['whenscreensizelt'];
	//echo the field
	$allthemesdata=get_themes();
	echo "<select id='whenscreensizelt' name='aphs_tbs_options[whenscreensizelt]'>\n";
	echo "<option value=''>Please select</option>\n";
	foreach($allthemesdata as $key=>$themedata){
		echo "<option value='{$themedata['Name']}'";
		if($themedata['Name']==$options['whenscreensizelt']){ echo " selected='selected'";}
		echo ">{$themedata['Name']}</option>\n";
	}
	echo "</select>";
}

//validate screensize (numeric only) later to validate that theme is available
function aphs_tbs_validate_options($input){
	$valid=array();
	$valid['whenscreensizegt']=$input['whenscreensizegt'];
	$valid['whenscreensizelt']=$input['whenscreensizelt'];
	$valid['screensize'] = preg_replace('/[^0-9]/','',$input['screensize']);
	$valid['recheck_cookie_duration'] = preg_replace('/[^0-9]/','',$input['recheck_cookie_duration']);
	return $valid;
}

function aphs_tbs_options_page() {
?>
<div class="wrap">
<?php screen_icon(); ?>
<form action="options.php" method="post">
<?php settings_fields('aphs_tbs_options'); ?>
<?php do_settings_sections('aphs_WP_Themes_by_Screensize'); ?>
<input name="Submit" type="submit" value="Save Changes" />
</form>
</div>
<?php
}
?>
