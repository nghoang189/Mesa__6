<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin - Edit Users</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../app/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/css/util.css">
	<link rel="stylesheet" type="text/css" href="../app/css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../app/css/btn.css">

</head>
<style>
	.login-text {
		text-align: right;
		margin-top: 20px;
	}
</style>

<body>

	<div class="limiter">
		<?php
		if (isset($_GET['idUser'])) {
			global $pdo;
			$userId = $_GET['idUser'];
			$querry = "SELECT * FROM `user` WHERE Id=? LIMIT 1";
			$statement = $pdo->prepare($querry);
			$statement->bindParam(1, $userId, PDO::PARAM_INT);
			$statement->execute();

			$data = $statement->fetch(PDO::FETCH_ASSOC);
		}
		?>
		<div class="container-login100" style="background-image: url('../app/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="?route=update-user&idUser=<?= $data['Id'] ?>" method="post">
					<span class="login100-form-title p-b-49">
						Edit User Information
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="FullName" value="<?= $data['FullName'] ?>" placeholder="Type User's Full Name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="UserName" value="<?= $data['UserName'] ?>" placeholder="Type User's Username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
						<span class="label-input100">Role &nbsp; (1: Admin &nbsp;&nbsp; 0: User)</span>
						<input class="input100" type="text" maxlength="1" name="role" value="<?= $data['role'] ?>" placeholder="Type 1 or 0">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>