$(document).ready(function (){
	$('.admin_list').click(function (){
		$('#front_cover').hide()
		$('#userlist_area').hide();
		$('#admin_list_area').show();
		$('#user').hide();
		$('#action_area').hide();
		$('#admin').hide();
		$('#alldata').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
		$('#result').hide();
		$('#result_table').hide();
		$('#back4').hide();
	});
	
	$('.user_list').click(function (){
		$('#admin_list_area').hide();
		$('#front_cover').hide()
		$('#userlist_area').show();
		$('#user').hide();
		$('#action_area').hide();
		$('#admin').hide();
		$('#alldata').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
		$('#result').hide();
		$('#result_table').hide();
		$('#back4').hide();
	});
	
	$('.all_list').click(function (){
		$('#front_cover').hide()
		$('#admin_list_area').show();
		$('#userlist_area').show();
		$('#user').hide();
		$('#action_area').hide();
		$('#admin').hide();
		$('#alldata').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
		$('#result').hide();
		$('#result_table').hide();
		$('#back4').hide();
	});
	//add_admin user
	$('#add_admin').click(function (){
		$('#admin').show();
		$('#front_cover').hide()
		$('#admin_list_area').hide();
		$('#userlist_area').hide();
		$('#action_area').hide();
		$('#alldata').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
	});
	//user
	$('#add_user').click(function (){
		$('#user').show();
		$('#front_cover').hide()
		$('#admin_list_area').hide();
		$('#userlist_area').hide();
		$('#action_area').hide();
		$('#admin').hide();
		$('#alldata').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
	});
	//alldata
	$('#view_alldata').click(function (){
		$('#alldata').show();
		$('#front_cover').hide()
		$('#admin_list_area').hide();
		$('#userlist_area').hide();
		$('#action_area').hide();
		$('#admin').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
	});
	//manage
	$('#manage').click(function (){
		$('#alldata').hide();
		$('#front_cover').hide()
		$('#admin_list_area').hide();
		$('#userlist_area').hide();
		$('#action_area').hide();
		$('#admin').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
		$('#manage_user').show();
	});
	//search
	$('#search_product').click(function (){
		$('#alldata').hide();
		$('#front_cover').hide()
		$('#admin_list_area').hide();
		$('#userlist_area').hide();
		$('#action_area').hide();
		$('#admin').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
		$('#search').show();
	});
	//anounced
	$('#anounced').click(function (){
		$('#alldata').hide();
		$('#front_cover').hide()
		$('#admin_list_area').hide();
		$('#userlist_area').hide();
		$('#action_area').hide();
		$('#admin').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#search').hide();
		$('#to_anounced').show();
	});
	
	$('#edits').click(function (){
		$('#edits').hide();
		$('#add').fadeIn();
		$('#minus').fadeIn();
		$('#addminus').fadeIn();
		$('#cans').fadeIn();
	});
	$('#cans').click(function (){
		$('#edits').fadeIn();
		$('#add').hide();
		$('#minus').hide();
		$('#addminus').hide();
		$('#cans').hide();
	});
});
