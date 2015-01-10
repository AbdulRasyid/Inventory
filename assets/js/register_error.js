$(document).ready(function () {
	$('#image').hide();
	$('#side1').hide().delay(3800).fadeIn("slow");
	$('#side2').hide().delay(3800).fadeIn("slow");
	//error message
	$('.redlog').delay(3500).fadeOut("slow");//delay time for validation errors
	//for register and login animation
	$('.register-view').click(function() {
		$('#login_area').hide();
		$('#image').hide();
		$('#description').hide();
		$('#register_error').fadeIn("slow");	
	});
	$('.login-view').click(function() {
		$('#register_error').hide();
		$('#image').hide();
		$('#description').hide();
		$('#login_area').fadeIn();
	});
	$('.home-view').click(function() {
		$('#register_error').hide();
		$('#login_area').hide();
		$('#description').hide();
		$('#image').fadeIn();
	});
	$('.description-view').click(function() {
		$('#register_error').hide();
		$('#login_area').hide();
		$('#image').hide();
		$('#description').fadeIn();
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