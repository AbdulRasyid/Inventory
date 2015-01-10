<div id="ordinary_login">
	<ul>
		<?php
			$ou_username = array('name'=>'ou_username', 'id'=>'ou_username');
			$ou_password = array('name'=>'ou_password', 'id'=>'ou_password');
		?>
		<li>Username</li>
		<li><?php echo form_input($ou_username);?></li>
		<li>Password</li>
		<li><?php echo form_password($ou_password);?></li>
	</ul>
</div>