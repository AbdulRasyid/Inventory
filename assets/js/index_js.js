//animation
$(document).ready(function(){
	$('.red').delay(3500).fadeOut("slow");//delay time for validation errors

	$('.edit').click(function (){
		$('#my_acount').hide();
		$('.acountbar').fadeIn();
		$('.acountcancel').fadeIn();
	});
	
	$('.acountcancel').click(function (){
		$('.acountbar').hide();
		$('.acountcancel').hide();
		$('#my_acount').fadeIn();
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