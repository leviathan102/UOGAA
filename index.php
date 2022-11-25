<?php

include_once("connections/connection.php");
$con = connection();


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BukSU Guidance Office</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/icons8-user-64.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="css/style.css">

	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
		}

		.notification {
			background-color: #555;
			color: white;
			text-decoration: none;
			padding: 8px;
			font-size: large;
			position: relative;
			display: inline-block;
			border-radius: 2px;
		}

		.notification:hover {
			background: teal;
		}

		.notification .badge {
			position: absolute;
			top: -10px;
			right: -10px;
			padding: 5px 10px;
			border-radius: 50%;
			background-color: red;
			color: white;
			align-items: center;
		}

		.form button:hover {
			background-color: greenyellow;
		}
	</style>
</head>

<body id="formindex">
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
						<img class="img-fluid" src="assets/img/R.png" alt="Logo">
					</div>
					<div class="login-right">
						<div class="login-right-wrap">
							<div style="text-align: center" class="form-group">
								<img class="img-fluid" src="https://buksuguidanceapp.000webhostapp.com/admin/assets/images/logo-3.PNG" alt="Logo" height="500px" width="500px">
							</div>
							<div style="text-align: center;  padding: 4px" class="form-group">
								<img class="img-fluid" src="img/splash.jpg" alt="Logo" height="150px" width="150px">
							</div>
							<button title="Not For Students" style="background-color: teal;border:none; padding: 4px ; color: white; float:left; border-radius: 2px;">
							<a href="login.php">
								<b style="background-color: teal; color: white; float:left; border-radius: 2px;">
									Login
								</b>
							</a></button><br><br><br>
							<form action="counseling_college_filter.php" method="post">
								<button role="button" name="counseling" class="btn btn-primary btn-block">
									Counseling
								</button>
							</form><br>
							<form action="testing_college_filter.php" method="post">
								<div class="form-floating mb-3">
									<button role="button" name="testing" class="btn btn-primary btn-block">
										Testing
									</button>
								</div>
							</form><br><br>
							<p style="">
							   <b>For Graduating Students (Exit Interview)</b> 
							</p>
							<form action="exit_interview_college_filter.php" method="post">
								<div class="form-floating mb-3">
									<button role="button" name="exitinterview" class="btn btn-primary btn-block">
										Exit Interview
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>