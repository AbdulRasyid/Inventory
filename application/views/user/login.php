<div id="login_nav">
	<section>
		<h2 class="link_head">Direct Links</h2>
		<ul>
			<li class="home-view" style="margin-top: 2px;">Home</li>
			<li class="login-view">Login</li>
			<li class="register-view">Register</li>
		</ul>
		<h2 class="link_head">Others</h2>
		<ul>
			<li class="comments-view">Login As Ordinary User</li>
			<li class="description-view">Description</li>
			<li class="about-view">About</li>
		</ul>
		
	</section>
</div>

<!--login area-->
<div id="login_area">
	
	<li class="header_login"><h3>Login</h3></li>

	
	<?php $error = $this->form_validation->set_error_delimiters('<li class="redlog">', '</li>'); ?>
	<ul class="errors">
	<?php
		if($this->session->flashdata('login_error'))
		{
			echo '<li class="redlog">You entered Incorrect Username or Password</li>';
		}
	?>
	</ul>
	
	

	<?php
	echo form_open('user/validate_login');
	
		$username = array('name'=>'username');
		$password= array('name'=>'password');
					
	?>	

	<ul>
		<li class="text">Username</li>
		<li><?php echo form_input($username); ?></li>
		<li class="text">Password</li>
		<li><?php echo form_password($password);?><li>
	</ul>
	
	<ul class="botton">
		<li><?php echo form_submit(array('name'=>'Submit','value'=>'Go')); ?></li>
	<?php echo form_close(); ?>
	</ul>
</div>

	
