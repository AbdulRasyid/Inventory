//animation
$(document).ready(function(){
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
		$('#acount_error').fadeIn();
		$('#data').hide();	
		$('#add_data').hide();	
	});
	//end
	
	//browse botton
	$('.browse').click(function (){
		//loader 
		$('.loader').delay(500).fadeOut();//loader div dis appear
		$('#data').fadeIn();
		$('#acount_error').hide();
		$('#add_data').hide();				
	});
	//end
	
	//add botton
	$('.add').click(function (){
		$('#add_data').fadeIn();
		$('#data').hide();	
		$('#acount_error').hide();	
	});
	//end
});