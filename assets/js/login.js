//error message

$(document).ready(function () {
	$('.redlog').delay(3000).fadeOut();//delay time for validation errors
	//for register and login animation
	$('.register-view').click(function() {
		$('#login_area').hide();
		$('#image').hide();
		$('#register_area').fadeIn("slow");	
		$('#description').hide();
		$('#center_area').hide();
		$('#comment_area').hide();
		$('#ordinary_login').hide();
	});
	$('.login-view').click(function() {
		$('#register_area').hide();
		$('#image').hide();
		$('#login_area').fadeIn();
		$('#description').hide();
		$('#center_area').hide();
		$('#comment_area').hide();
		$('#ordinary_login').hide();
	});
	$('.home-view').click(function() {
		$('#register_area').hide();
		$('#login_area').hide();
		$('#image').fadeIn();
		$('#description').hide();
		$('#center_area').hide();
		$('#comment_area').hide();
		$('#ordinary_login').hide();
	});
	$('.description-view').click(function() {
		$('#register_area').hide();
		$('#login_area').hide();
		$('#image').hide();
		$('#comment_area').hide();
		$('#description').fadeIn();
		$('#center_area').fadeIn();
		$('#ordinary_login').hide();
	});
	$('.comments-view').click(function() {
		$('#register_area').hide();
		$('#login_area').hide();
		$('#image').hide();
		$('#description').hide();
		$('#center_area').hide();
		$('#comment_area').fadeIn();
		$('#ordinary_login').hide();
	});
	$('.loginbtn').click(function() {
		$('#image').hide();
	});
	
	
	
	$('.cancelbotton').click(function() {
		$('#register_area').remove('fast').hide();
		$('#login_area').fadeIn();
	});
	//end
	
	//for SHOWING pages description animation
	$('#r1').click(function (){
		$('#description2').fadeIn("slow");
		$('#r1').fadeOut("slow");
		$('#h2').hide("slow");
	});
	$('#r2').click(function (){
		$('#description3').fadeIn("slow");
		$('#r2').fadeOut("slow");
		$('#h3').hide("slow");
	});
	$('#r3').click(function (){
		$('#description4').fadeIn("slow");
		$('#r3').fadeOut("slow");
		$('#h4').show("slow");
	});
	
	//for HIDING pages description animation
	$('#r1').click(function (){
		$('#description2').fadeIn("slow");
		$('#r1').fadeOut("slow");
	});
	$('#r2').click(function (){
		$('#description3').fadeIn("slow");
		$('#r2').fadeOut("slow");
	});
	$('#r3').click(function (){
		$('#description4').fadeIn("slow");
		$('#r3').fadeOut("slow");
	});
	//end
	
	//hiding all pages
	$('#h4').click(function (){
		$('#description4').fadeOut("slow");
		$('#r3').fadeIn("slow");
		$('#h3').fadeIn("slow");
	$('#h3').click(function (){
		$('#description3').fadeOut("slow");
		$('#r2').fadeIn("slow");
		$('#h2').fadeIn("slow");			
	$('#h2').click(function (){
		$('#description2').fadeOut("slow");
		$('#r1').fadeIn("slow");
	});
	});
	
	//conrtol hiding and reading
	$('#r1').click(function (){
		$('#description2').fadeIn("slow");
		$('#r2').fadeIn("slow");
	});
	$('#r2').click(function (){
		$('#description3').fadeIn("slow");
		$('#r3').fadeIn("slow");
	});
	$('#r3').click(function (){
		$('#description4').fadeIn("slow");
		$('#r4').fadeIn("slow");
	});
	
	});
});