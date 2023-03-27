<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa phiếu thực tập Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../app/images/icons/favicon.ico"/>
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

<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">PHIEU SUA THONG TIN</h3>
          </div>
          <div class="card-body">
            <?php ?>
            <form action="?route=update&id=<?=$_POST['id']?>" method="post">
              <div class="form-group">
                <label for="hoten">Ho Ten</label>
                <input type="text" class="form-control" id="hoten" name="hoten" value="<?= $_POST['hoten'] ?>" required>
              </div>
              
              <div class="form-group">
                <label for="chuyennganh">Chuyen nganh</label>
                <input type="text" class="form-control" id="chuyennganh" name="chuyennganh" value="<?= $_POST['ChuyenNganh'] ?>" required>
              </div>
              <div class="form-group">
                <label for="congty">Cong ty</label>
                <input type="text" class="form-control" id="congty" name="congty" value="<?= $_POST['CongTy'] ?>" required>
              </div>
              <br/>
              <button type="submit" class="btn btn-primary w-100">CẬP NHẬT</button>
            </form>
            <?php  ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
