$(document).ready(function(){
	$('#side1').hide().delay(3800).fadeIn("slow");
	$('#side2').hide().delay(3800).fadeIn("slow");
	//error message
	$('.red').delay(3500).fadeOut("slow");//delay time for validation errors
	
	//for register and login animation
	$('.edit').click(function (){
		$('.acountbar').fadeIn();
		$('.acountcancel').fadeIn();
	});
	$('.acountcancel').click(function (){
		$('.acountbar').hide();
		$('.acountcancel').hide();
	});
	//acount botton
	$('.acount').click(function (){
		$('#acount').fadeIn();
		$('#data').hide();	
		$('#add_data').hide();	
		$('#main_area').hide();	
	});
	//end
	
	//browse botton
	$('.browse').click(function (){
		//loader 
		$('.loader').delay(500).fadeOut();//loader div dis appear
		$('#data').fadeIn();
		$('#acount').hide();
		$('#add_data').hide();	
		$('#main_area').hide();				
	});
	//end
	
	//add botton
	$('.add').click(function (){
		$('#add_data').fadeIn();
		$('#data').hide();	
		$('#acount').hide();	
		$('#main_area').hide();	
	});
	//end
});