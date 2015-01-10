<div id="layer01_holder">
  <div id="left"></div>
  <div id="center"></div>
  <div id="right"></div>
</div>

<div id="layer02_holder">
  <div id="left"></div>
  <div id="center"></div>
  <div id="right"></div>
</div>

<div id="layer03_holder">
  <div id="left"></div>
  <div id="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>LOGIN<br /><br /></td>
  </tr>
  <tr>
  	<?php echo form_open('admin/validate_login');
		$username = array('name'=>'username','id'=>'textfield');
		$password = array('name'=>'password','id'=>'textfield2','style'=>'margin-top: 5px;margin-left: 5px');
	?>
    <td>
      <label>Username  
        <?php echo form_input($username);?>
      </label>
      <label>Password  
        <?php echo form_password($password);?>
      </label>
      <label>
      	<?php echo form_submit(array('name'=>'button','id'=>'button','value'=>'submit'));?>
      </label>
    </td>
  </tr>
</table>
  </div>
  <div id="right"></div>
</div>

<div id="layer04_holder">
  <div id="left"></div>
  <div id="center">
  If you forgot your password, please contact administrator or <a href="#">click here</a></div>
  <div id="right"></div>
</div>

<div id="layer05_holder">
  <div align="left">Copyright © 2012, Dingle Design</div>
</div>