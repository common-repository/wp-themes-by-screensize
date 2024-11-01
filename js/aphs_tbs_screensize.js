if(navigator.cookieEnabled != 0){
	var today = new Date();
	var expire = new Date();
	//var c_duration=30000;//in milliseconds
	var c_duration=aphs_tbs_params.recheck_cookie_duration*1000;
	expire.setTime(today.getTime() + c_duration);
	var c_value="aphs_tbs_screensize="+escape(window.innerWidth) + ";expires="+expire.toUTCString();
	document.cookie = c_value;
	location.reload(true);
}
