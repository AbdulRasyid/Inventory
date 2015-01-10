$(document).ready(function (){
	$('#addmore').click(function (){
		var current_count = $('input[type="file"]').length;
		var next_count = current_count + 1;	

		if(next_count > 3)
		{
			return false;
		}
		if(next_count > 2)
		{
			$('#addmore').hide();
		}
		
		$('#file_upload').append('<p><input type="file" name="file_'+ next_count +'" /></p>');
		
		
		return false;
	});	
	
	$('.json').click(function (){
		var file_input = $('.file_input').val();
		if(file_input == ''){
			alert('file_input cannot be empty!!');
		}
		
	});
});