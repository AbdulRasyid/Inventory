<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<base href="<?php echo base_url();?>assets/ ">
		<link rel="stylesheet" href="css/admin_css/admin_template/stylelog.css" type="text/css" media="screen" />
	</head>
	<body>
		<div id="admin_content">
			<?php echo $this->load->view($admin_page);?>
		</div>
	</body>
</html>