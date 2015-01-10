<script>
	$(document).ready(function (){
		$('#login_area').hide();
		$('#image').hide();
		$('#register_area').show();
		$('.er').delay(3000).fadeIn();
	});
</script>
<div id="register_area">
	
	<li class="header_login"><h3>Register</h3></li>
	<?php $error = $this->form_validation->set_error_delimiters('<li class="redlog">', '</li>'); ?>
	<ul class="errors">
	<?php echo validation_errors();?>
	</ul>
	
<?php echo form_open('user/create_member');

	$firstname = array('name'=>'firstname','class'=>'firstname');
	$lastname = array('name'=>'lastname','class'=>'lastname');
	$username = array('name'=>'username','class'=>'username');
	$password = array('name'=>'password','class'=>'password');
	$emailaddress = array('name'=>'emailaddress','class'=>'emailaddress');
	$confirm = array('name'=>'password2','class'=>'password2');
?>
	<table id="side1">
		<tr style="display: none;" class="er">
			<td class="text" style="color: #fff;">Firstname</td>
		</tr>
		<tr style="display: none;" class="er">
			<td><?php echo form_input($firstname); ?></td>
		</tr>
		<tr style="display: none;" class="er">
			<td class="text" style="color: #fff;">Lastname</td>
		</tr>
		<tr style="display: none;" class="er">
			<td><?php echo form_input($lastname); ?></td>
		</tr>
		<tr style="display: none;" class="er">
			<td class="text" style="color: #fff;">Your Email</td>
		</tr>
		<tr style="display: none;" class="er">
			<td><?php echo form_input($emailaddress); ?></t>
		</tr>
	</table>
	
	<table id="side2">
		<tr style="display: none;" class="er">
			<td class="text" style="color: #fff;">Username</td>
		</tr>
		<tr style="display: none;" class="er">
			<td><?php echo form_input($username); ?></td>
		</tr>	
		<tr style="display: none;" class="er">
			<td class="text" style="color: #fff;">Password</td>
		</tr>
		<tr style="display: none;" class="er">
			<td><?php echo form_password($password); ?></td>
		</tr>
		<tr style="display: none;" class="er">
			<td class="text" style="color: #fff;">Confirm Password</td>
		</tr>
		<tr style="display: none;" class="er">
			<td><?php echo form_password($confirm); ?></td>
		</tr>
		<tr style="display: none;" class="er">
			<td><?php echo form_submit(array('name'=>'','class'=>'regbtn','value'=>'Go')); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?>
	
</div>
	
	
		


