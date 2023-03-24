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
            <h3 class="form-title">AVATAR UPDATE</h3>
          </div>
          <div class="card-body">
            <form action="?route=edit-avatar" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="avatar">Avatar:</label>
                <input type="file" class="form-control" id="avatar" name="avatar" required>
              </div>
              <br/>
              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn">
                        Update Avatar
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
