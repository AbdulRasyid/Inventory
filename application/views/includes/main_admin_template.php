<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<base href="<?php echo base_url();?>assets/ ">
		<link rel="stylesheet" href="css/admin_css/main_admin.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/admin_js/admin.js"></script>
	</head>
	<body id="admin_body">
		<div id="admin_header">
			<div id="logo">
				<h1>Admin</h1>
				<h6>PANEL Inventory System</h6>
				<div id="nav">
				<h5 class="home"><?php echo anchor('main_controller/' ,'Home');?></h5>
				<h5 class="action"><?php echo anchor('main_controller/actions' ,'Action');?></h5>
				<h5><?php echo anchor('admin/logout' ,'Logout');?></h5>
				</div>
			</div>
		</div>
		<div id="main_admin_content">
			<div id="admin_page">
				<?php $this->load->view($main_page);?>
			</div>
			<div class="push"></div>
		</div>
		<div id="whole">
		<div id="footer">
				<?php $this->load->view($lower_nav);?>
		</div>
		</div>
	</body>
</html>