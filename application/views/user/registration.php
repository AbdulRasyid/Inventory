<div id="register_area">
	
	<li class="header_login"><h3>Register</h3></li>

<?php echo form_open('user/create_member');

	$firstname = array('name'=>'firstname','class'=>'firstname');
	$lastname = array('name'=>'lastname','class'=>'lastname');
	$username = array('name'=>'username','class'=>'username');
	$password = array('name'=>'password','class'=>'password');
	$emailaddress = array('name'=>'emailaddress','class'=>'emailaddress');
	$confirm = array('name'=>'password2','class'=>'password2');
?>
	
	<table id="side1">
		<tr>
			<td class="text" style="color: #fff;">Firstname</td>
		</tr>
		<tr>
			<td><?php echo form_input($firstname); ?></td>
		</tr>
		<tr>
			<td class="text" style="color: #fff;">Lastname</td>
		</tr>
		<tr>
			<td><?php echo form_input($lastname); ?></td>
		</tr>
		<tr>
			<td class="text" style="color: #fff;">Your Email</td>
		</tr>
		<tr>
			<td><?php echo form_input($emailaddress); ?></t>
		</tr>
	</table>
	
	<table id="side2">
		<tr>
			<td class="text" style="color: #fff;">Username</td>
		</tr>
		<tr>
			<td><?php echo form_input($username); ?></td>
		</tr>	
		<tr>
			<td class="text" style="color: #fff;">Password</td>
		</tr>
		<tr>
			<td><?php echo form_password($password); ?></td>
		</tr>
		<tr>
			<td class="text" style="color: #fff;">Confirm Password</td>
		</tr>
		<tr>
			<td><?php echo form_password($confirm); ?></td>
		</tr>
		<tr>
			<td><?php echo form_submit(array('name'=>'','class'=>'regbtn','value'=>'Go')); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?>
	
</div>
	
	
		


