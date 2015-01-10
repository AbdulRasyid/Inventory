<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<base href="<?php echo base_url();?>assets/ " />
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/login-nav.css" type="text/css" media="screen" />
		
		<!-JQUERY CODES-!>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
	</head>
	<body>
		<div id="whole_head">
			<div id="header">
				<div id="one">
					<div id="clockDisplay" class="clockStyle"></div>
					<div id="header-image"></div>
					<div id="extra">
						<div id="logo"></div>
					</div>
				</div>
				<div id="headline"></div>
				<div id="header-space"></div>
			</div>
		</div>
		<script>
			$(document).ready(function (){
			$('#ordinary_login').hide();
		});
		function renderTime() {
			var currentTime = new Date();
			var diem = "AM";
			var h = currentTime.getHours();
			var m = currentTime.getMinutes();
		    var s = currentTime.getSeconds();
			setTimeout('renderTime()',1000);
		    if (h == 0) {
				h = 12;
			} else if (h > 12) { 
				h = h - 12;
				diem="PM";
			}
			if (h < 10) {
				h = "0" + h;
			}
			if (m < 10) {
				m = "0" + m;
			}
			if (s < 10) {
				s = "0" + s;
			}
		    var myClock = document.getElementById('clockDisplay');
			myClock.textContent = h + ":" + m + ":" + s + " " + diem;
			myClock.innerText = h + ":" + m + ":" + s + " " + diem;
		}
		renderTime();
		</script>
		<div id="container">
			<div id="login_content">
				<?php $this->load->view($login); ?>
				<?php $this->load->view($register); ?>
				<?php $this->load->view($center); ?>
				<?php $this->load->view($comment); ?>
			</div>
			<div id="footer">
				<?php $this->load->view('includes/footer'); ?>
			</div>
		</div>
	</body>
</html>