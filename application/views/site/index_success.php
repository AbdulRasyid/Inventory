<script>
	$(document).ready(function(){
		$('#add_data').hide();
		$('#main_area').hide();
		$('#acount').show();
		$('#acountbar').show();
		$('.suceess_update').delay(2500).hide();
	});
</script>
<!--------INVENTORY PAGE---------->
<div id="inventory_page">
	<!--SIDE BAR -->
	<section id="left">
		<h2 class="link_head">User Manage</h2>
		<ul class="sidebar">
			<li class="acount">Acount</li>
			<li class="browse">Browse</li>
			<li class="add">Add Data</li>
		</ul>
		<h2 class="link_head">Admin User</h2>
		<ul class="sidebar">
			<li class="acount" id="admin_edit">Edit/Account</li>
			<li class="browse" id="admin_user_list">User List</li>
			<li class="add" id="admin_acount">Add Data</li>
		</ul>
	</section>
	<!--END -->
	
<!--MAIN AREA -->
	<section id="main_area">
		<?php foreach($my_info->result() as $row):?>
		<li class="acountheader">
			<h4 id="welcome">Welcome Encoder <?php echo $row->username;?></h4>
			<h3 id="name"><?php echo $row->username;?> Profile</h3>
		</li>
		<?php endforeach ;?>
		<ul>
			<li class="text">Yout Can Now manage this System ..!</li>
			<li class="text">By Using Side Bar Bottons </li>
		</ul>
	</section>
	<!--END -->
	
	<!--ACOUNT AREA -->
<script>
function update_user(user_id){
		var user_id = user_id;
		var username = $('#username_up').val();
		var password = $('#password_up').val();
		var password2 = $('#confirm').val();
		if(username == '' && password == '' && password2 == '')
		{
			alert('all input are required required!');
			return false;
		}
		if(username == '')
		{
			alert('username required!');
			$("input#username_up").focus();
			return false;
		}
		if(password == '')
		{
			alert('password required!');
			$("input#password_up").focus();
			return false;
		}
		if(password != password2)
		{
			alert('password did not match confirm password field !!');
			$("input#confirm").focus();
			return false;
		}
		else
		{
			var location = '<?php echo base_url ();?>site/edit_user/'+user_id;
			$.ajax({
				type: "POST",
				url: location,
				data: {
					'username':username,
					'password':password
				},
				dataType: "json",
				success: function user(){
					alert('your account has been updated!try logout and logged in again?');	
					var mylink = '<?php echo base_url();?>site/get_user/'+user_id;
					$.getJSON(mylink, function(data){
					$.each(data, function(key, val){
						$('#username_up').val('');
						$('#password_up').val('');
						$('#confirm').val('');
						
						$('.acountbar').hide();
						$('#old').remove();
						$('.acountcancel').hide();
						$('#my_acount').hide().delay(3000).fadeIn();
						$('#success_update').show().delay(2000).fadeOut();
						$('table tr td#nu').append('<h3 id="old">'+val.username+'</h3>');
						});
					});
				}
			});
		}
};
</script>
	<section id="acount">
		<ul id="a">
		<li class="acountheader"><h4>Your Acount</h4></li>
			<li class="edit">Edit Acount</li>
			<li class="acountcancel">Cancel</li>
		</ul>
		<ul>
			<li id="success_update"><h1>You Had Succesfully Update Your Account!</h1></li>
		</ul>
		<table id="my_acount">
				<?php foreach($my_info->result() as $row): ?>
			<tr class="b">
				<td class="s">Username : </td><td id="nu"><h3 id="old"><?php echo $row->username ;?></h3></td>
			</tr>
			<tr class="b"> 
				<td class="s">Password : </td><td>hidden</td>
			</tr>
				<?php endforeach; ?>
		</table>
		<?php
			$new_username = array('name'=>'my_new_username', 'id'=>'username_up');
			$new_password = array('name'=>'my_new_password','id'=>'password_up');
			$confirm = array('name'=>'confirm','class'=>'','id'=>'confirm');
			?>
		<ul class="acountbar">
			<li class="text">Username</li>
			<li><?php echo form_input($new_username); ?></li>
			<li class="text">Password</li>
			<li><?php echo form_password($new_password); ?></li>
			<li class="text">Confirm Password</li>
			<li><?php echo form_password($confirm); ?></li>
			<li class="botton">
				<input type="submit" name="submit" class="submit" value="Update" onclick="javascript: update_user(<?php echo $user;?>)" />
			</li>
		</ul>
	</section>
	<!--END -->
<!--JS SCRIPT FOR UPDATE/EDIT/DELETE A DATE-->
<script>
function edit_data(edit_id){
	var edit_id = edit_id;
	var newtitle = $('#newtitle_'+edit_id+'').val();
	var newPrice = $('#newPrice_'+edit_id+'').val();
	var newModel = $('#newModel_'+edit_id+'').val();
	var newSerial = $('#newSerial_'+edit_id+'').val();
	var newStocks = $('#newStocks_'+edit_id+'').val();
	var newDescription = $('#newDescription_'+edit_id+'').val();
	var edit_c_function = '<?php echo base_url();?>site/edit_data/'+edit_id;
	$.ajax({
		type: "POST",
		url: edit_c_function,
		data:{
				'newtitle':newtitle ,
				'newPrice':newPrice ,
				'newModel':newModel , 
				'newSerial':newSerial ,
				'newStocks':newStocks ,
				'newDescription':newDescription
			 },
		dataType:"json",
		success: function(){
			alert('your data has been UPDATED!!');
		}
	});
}
function delete_data(delete_data){
	var del = delete_data;
	if(confirm('Are you sure you want to DELETE this RECORD?'))
	{
		location.href = '<?php echo base_url();?>site/delete_data/'+del;
	}
	else
	{
		return false;
	}
}
</script>
<!--END -->
	
	<!--DATA AREA -->
	<section id="data">
		<li class="acountheader">Stored Data</li>
		<code style="color: #333; padding-left: 40px;">total  :(<?php echo $count->num_rows(); ?>) data</code>
		<div id="gallery">
			<article class="loader">
    			<!--<span></span>
   				<span></span>
   		 		<span></span>
   		 		<span></span>-->
			</article>
			
			<article>
				<?php 
				if($count->num_rows() >= 0 )
				{
				foreach($alldata->result() as $row)
				{
				$newtitle = array('name'=>'newtitle','value'=>$row->product_title,'class'=>'edit_inputs','id'=>'newtitle_'.$row->product_id.'');
				$newPrice = array('name'=>'newPrice','value'=>$row->product_price,'class'=>'edit_inputs','id'=>'newPrice_'.$row->product_id.'');
				$newModel = array('name'=>'newModel','value'=>$row->product_model,'class'=>'edit_inputs','id'=>'newModel_'.$row->product_id.'');
				$newSerial = array('name'=>'newSerial','value'=>$row->product_stocks,'class'=>'edit_inputs','id'=>'newSerial_'.$row->product_id.'');
				$newStocks = array('name'=>'newStocks','value'=>$row->product_serial,'class'=>'edit_inputs','id'=>'newStocks_'.$row->product_id.'');
				$newDescription = array('name'=>'newDescription','value'=>$row->product_description,'rows'=>4,'cols'=>24,'id'=>'newDescription_'.$row->product_id.'');
				echo  '<div id="edit_info">';
				echo  '<table style="margin-left: 335px;">';
				echo  '<tr><td class="text"><td class="infotxt"><a href="javascript: edit_data('.$row->product_id.')" style="color: blue;">Update</a></td></td>';
				echo  '<td class="text"><td class="infotxt"><a href="javascript: delete_data('.$row->product_id.')" style="color: blue;padding-left: 50px;">Delete</a></td></td></tr>';
				echo  '</table>';
				echo  '<img><img src="'.base_url().'assets/upload_image/thumb/'.$row->images.'" title="'.$row->product_title.'">';
				echo  '<table id="files_area">';
				echo  '<tr><td class="text">Title</td><td class="infotxt">'.form_input($newtitle).'</td></tr>';
				echo  '<tr><td class="text">Price</td><td class="infotxt">'.form_input($newPrice).'</td></tr>';
				echo  '<tr><td class="text">Model</td><td class="infotxt">'.form_input($newModel).'</td></tr>';
				echo  '<tr><td class="text">Serial</td><td class="infotxt">'.form_input($newSerial).'</td></tr>';
				echo  '<tr><td class="text">Stocks</td><td class="infotxt">'.form_input($newStocks).'</td></tr>';
				echo  '<tr><td class="text">Decription<td class="infotxt">'.form_textarea($newDescription).'</td></td></tr>';
				echo  '</table>';
				echo  '</div>';
				}
				}
				else
				{
				echo '<li class="img_title">no data found</li>';
				}?>
			</article>
		</div>
	</section>
	<!--END -->
	<!--DATA AREA -->
<script>
	
</script>
	
	<section id="add_data">
		<li class="acountheader">Adding Data Area</li>
		<ul class="errors">
			<?php $error = $this->form_validation->set_error_delimiters('<li class="red">', '</li>'); ?>
			<?php echo validation_errors();?>
		</ul>
		<form id="file_upload" action="<?Php echo base_url('site/add_data');?>" method="POST" enctype="multipart/form-data">
		<?php
			$product_image = array('name'=>'file_1' ,'type'=>'file' ,'class'=>'file_input','style'=>'color:#000');
			$product_title = array('name'=>'product_title','placeholder'=>'Insert a TITLE for Category','class'=>'product_title');
			$product_price = array('name'=>'product_price','class'=>'product_price');
			$product_model = array('name'=>'product_model','class'=>'product_model');
			$product_serial = array('name'=>'product_serial','class'=>'product_serial');
			$product_stocks = array('name'=>'product_stocks','class'=>'product_stocks');
			$product_description = array('name'=>'product_description','cols'=>25,'rows'=>'5','class'=>'product_description');
		?>
		<input type="hidden" name="my_e" value="<?php echo $user;?>" />
		<table id="side1">
			<tr>
				<td><?php echo form_input($product_image); ?></td>
			</tr>
			<tr>
				<td><?php echo form_input($product_title);?></td>
			</tr>
			<tr>
				<td class="text">Price</td>
			</tr>
			<tr>
				<td><?php echo form_input($product_price); ?></td>
			</tr>
			<tr>
				<td class="text">Model</td>
			</tr>
			<tr>
				<td><?php echo form_input($product_model); ?></td>
			</tr>
			<tr>
				<td class="text">Serial Key</td>
			</tr>
			<tr>
				<td><?php echo form_input($product_serial); ?></td>
			</tr>
		</table>
		
		<table id="side2">
			<tr>
				<td class="text">Stocks</td>
			</tr>
			<tr>
				<td><?php echo form_input($product_stocks); ?></td>
			</tr>
			<tr>
				<td class="text">Descripton</td>
			</tr>
			<tr>
				<td><?php echo form_textarea($product_description); ?></td>
			</tr>
			<tr>
				<td><?php echo form_submit(array('name'=>'upload','value'=>'Submit','class'=>'json'));?></td>
			</tr>
			</table>
			<!--<a href="javascript: popNow('http://localhost/thesis/gallery')">
				<li class="popup">Manual Upload?(click here)</li>
			</a>-->
			</form>
	</section>
	<!--END -->	
</div>
<!---------END INVENTORY PAGE--------->