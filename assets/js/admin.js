$(document).ready(function(){
	var secure = 'Access Denied .!! You Dont Have a Permission To access This Area ..';
	$('#admin_edit').click(function(){
		alert(secure);
		return false;
	});
	$('#admin_user_list').click(function(){
		alert(secure);
		return false;
	});
	$('#admin_acount').click(function(){
		alert(secure);
		return false;
	});
});
