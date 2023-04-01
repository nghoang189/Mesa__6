<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin - Add Products</title>
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

	.input101 {
		font-family: Poppins-Medium;
		font-size: 16px;
		color: #333333;
		line-height: 1.2;
		display: block;
		width: 100%;
		height: 30px;
		background: transparent;
		padding: 0 7px 0 10px;
	}
</style>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../app/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="?route=add" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-49">
						Add Products
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Product's Name is required">
						<span class="label-input100">Product's Name</span>
						<input class="input101" type="text" name="hoten">
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Price is required">
						<span class="label-input100">Price</span>
						<input class="input101" type="text" name="chuyennganh">
					</div>

					<div class="wrap-input100 validate-input  m-b-23" data-validate="Description is required">
						<span class="label-input100">Description</span>
						<textarea name="note" id="note" value="none" class="md-textarea form-control" rows="5"></textarea>
					</div>

					<div class="wrap-input101 validate-input  m-b-23" data-validate="Product's Image is required">
						<span class="label-input100">Product's Image</span>
						<input class="input101" type="file" name="prd-picture" style="margin-top:10px; cursor: pointer; ">
						<div class="label-input100" style="margin-top: 20px;">Slide Images</div>
						<input class="input101" type="file" name="prd-picture1" style="margin-top:10px; cursor: pointer; ">
						<input class="input101" type="file" name="prd-picture2" style="margin-top:10px; cursor: pointer; ">
						<input class="input101" type="file" name="prd-picture3" style="margin-top:10px; cursor: pointer; ">
						<input class="input101" type="file" name="prd-picture4" style="margin-top:10px; cursor: pointer; ">
						<input class="input101" type="file" name="prd-picture5" style="margin-top:10px; cursor: pointer; ">
						<div class="label-input100" style="margin-top: 20px;">Detail Images</div>
						<input class="input101" type="file" name="prd-picture6" style="margin-top:10px; cursor: pointer; ">
						<input class="input101" type="file" name="prd-picture7" style="margin-top:10px; cursor: pointer; ">
						<input class="input101" type="file" name="prd-picture8" style="margin-top:10px; cursor: pointer; ">
					</div>

					<div class="wrap-input100 validate-input  m-b-23" data-validate="Description is required">
						<span class="label-input100">Detail Description 1</span>
						<textarea name="note1" id="note1" value="none" class="md-textarea form-control" rows="5"></textarea>
					</div>

					<div class="wrap-input100 validate-input  m-b-23" data-validate="Description is required">
						<span class="label-input100">Detail Description 2</span>
						<textarea name="note2" id="note2" value="none" class="md-textarea form-control" rows="5"></textarea>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Product's Name is required">
						<span class="label-input100">Title Des 1</span>
						<input class="input101" type="text" name="ttdes1">
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Product's Name is required">
						<span class="label-input100">Title Des 2</span>
						<input class="input101" type="text" name="ttdes2">
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Product's Name is required">
						<span class="label-input100">Embed Code</span>
						<input class="input101" type="text" name="embed">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Add
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