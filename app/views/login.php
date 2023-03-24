<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký thực tập Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../app/css/btn.css">

</head>
<?php
    include_once('partital/header.php');
?>
<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="form-title">LOGIN</h3>
          </div>
          <div class="card-body">
            <form action="?route=login" method="post">
              <div class="form-group">
                <label for="UserName" class="dark-grey-text"for="chuyennganh">User Name:</label>
                <input type="text" class="form-control" id="UserName" name="UserName" required>
              </div>
              <div class="form-group">
                <label class="dark-grey-text"  for="congty">Pass:</label>
                <input type="password" class="form-control" id="Pass" name="Pass" required>
              </div>
              <br/>
              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
