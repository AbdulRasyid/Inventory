<script>
$(document).ready(function(){
	$('#to_form').click(function(){
		$('#comment_area').hide();
		$('#ordinary_login').show();
	});
});
function o_register(){
	 var o_firstname = $('#o_firstname').val();
	 var o_lastname = $('#o_lastname').val();
	 var o_email = $('#o_email').val();
	 var o_occupation = $('#o_occupation').val();
	 var o_mobile = $('#o_mobile').val();
	 var o_username = $('#o_username').val();
	 var o_password = $('#o_password').val();
	 var o_password2 = $('#o_password2').val();
	 var location = '<?php echo base_url();?>ordinary_user/ordinary_user_register';
	 
	//validation class
	if(o_mobile == '' && o_firstname == '' && o_lastname == '' && o_email == '' && o_occupation == '' && o_username == '' && o_password == '' && o_password2 == ''){
		alert('all input are required!');
		return false;
	}
	if(o_firstname == ''){
		alert('firstname field is required!');
		$('#o_firstname').focus();
		return false;
	}
	if(o_lastname == ''){
		alert('lastname field is required!');
		$('#o_lastname').focus();
		return false;
	}
	if(o_email == ''){
		alert('email address field is required!');
		$('#o_email').focus();
		return false;
	}
	if(o_occupation == ''){
		alert('occupation field is required!');
		$('#o_occupation').focus();
		return false;
	}
	if(o_mobile == ''){
		alert('mobile number field is required!');
		$('#o_mobile').focus();
		return false;
	}
	if(o_username == ''){
		alert('username field is required!');
		$('#o_username').focus();
		return false;
	}
	if(o_password == ''){
		alert('password field is required!');
		$('#o_password').focus();
		return false;
	}
	if(o_password2 != o_password){
		alert('confirm password di not match password field!');
		$('#o_password2').focus();
		return false;
	}
	else
	{
		$.ajax({
			type: "POST",
			url: location,
			data:{
				'firstname':o_firstname,
				'lastname':o_lastname,
				'email':o_email,
				'occupation':o_occupation,
				'mobile':o_mobile,
				'username':o_username,
				'password':o_password
				},
			dataType:"json",
			success: function(){
				alert('success');
				$('#o_firstname').val('');
				$('#o_lastname').val('');
				$('#o_email').val('');
				$('#o_occupation').val('');
				$('#o_mobile').val('');
				$('#o_username').val('');
				$('#o_password').val('');
				$('#o_password2').val('');
			}
		});
	}
	
}
function valid(){
	var u = $('#ou_username').val();
	var p = $('#ou_password').val();
	if(u == '' && p == ''){
		alert('all field requied!');
		return false;
	}
	if(u == ''){
		alert('username field is requires!');
		$('#ou_username').focus();
		return false;
	}
	if(p == ''){
		alert('password filed is required!');
		$('#ou_password').focus();
		return false;
	}
}
</script>
<div id="comment_area">
	<section>
		<header id="welcome" style="float: left;"><h1>Welcome Please Login or Register</h1></header>
		<h3 id="to_form" style="float: left;margin-bottom: 30px;margin-top:10px;color: #333;cursor: pointer;">Click Here To Login!</h3>
		<article>
			<table>
				<tr>
					<?php
					$o_firstname = array('name'=>'o_firstname','id'=>'o_firstname','placeholder'=>'Firstname');
					?>
					<td><?php echo form_input($o_firstname);?></td>
				</tr>
				<tr>
					<?php
					$o_lastname = array('name'=>'o_lastname','id'=>'o_lastname','placeholder'=>'Lastname');
					?>
					<td><?php echo form_input($o_lastname);?></td>
				</tr>
				<tr>
					<?php
					$o_username = array('name'=>'o_username','id'=>'o_username','placeholder'=>'Username');
					?>
					<td><?php echo form_input($o_username);?></td>
				</tr>
				<tr>
					<?php
					$o_email = array('name'=>'o_email','id'=>'o_email','placeholder'=>'Email Address');
					?>
					<td><?php echo form_input($o_email);?></td>
				</tr>
				<tr>
					<?php
					$o_occupation = array('name'=>'o_occupation','id'=>'o_occupation','placeholder'=>'Occupation');
					?>
					<td><?php echo form_input($o_occupation);?></td>
				</tr>
				<tr>
					<?php
					$o_mobile = array('name'=>'o_mobile','id'=>'o_mobile','placeholder'=>'Mobile Number');
					?>
					<td><?php echo form_input($o_mobile);?></td>
				</tr>
				<tr>
					<?php
					$o_password = array('name'=>'o_password','id'=>'o_password','placeholder'=>'Password');
					$o_password2 = array('name'=>'o_password2','id'=>'o_password2','placeholder'=>'Confirm Password');
					?>
					<td><?php echo form_password($o_password);?></td>
					<td><?php echo form_password($o_password2);?></td>
				</tr>
				<tr>
					<td><input type="submit" onclick="javascript: o_register()" name="o_submit" id="o_submit" value="Submit"></td>
				</tr>
			</table>
		</article>
	</section>
</div>
<div id="ordinary_login">
	<h1>Login</h1>
	<ul id="login_form">
		<?php echo form_open('ordinary_user/validate_login');
			$ou_username = array('name'=>'ou_username', 'id'=>'ou_username');
			$ou_password = array('name'=>'ou_password', 'id'=>'ou_password');
		?>
		<li class="text">Username</li>
		<li><?php echo form_input($ou_username);?></li>
		<li class="text">Password</li>
		<li><?php echo form_password($ou_password);?></li>
		<li><input onclick="javascript: valid()" type="submit" value="Login"/></li>
		<?php echo form_close();?>
	</ul>
</div>