<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
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
  <link rel="stylesheet" type="text/css" href="../app/css/searchbar.css">
  <link rel="stylesheet" type="text/css" href="../app/css/loader.css">
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<style>
  img {
    margin-top: auto;
    margin-bottom: auto;
  }

  .card:hover {
    transform: translateY(0) translateZ(1px) scale(1.05);
    transition: all 0.5s;
    transition-delay: all 0.25s;
  }

  .btn-primary,
  .btn-warning,
  .btn-danger {
    border: none;
    outline: none;
    color: black;
    cursor: pointer;
    position: relative;
    color: rgb(255, 255, 255);
    z-index: 0;
    border-radius: 10px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    margin-right: 20px
  }

  .list-group {
    max-width: 200px;
    background: #00BFFF;
    border: 1px solid #00BFFF;
    border-radius: 4px;
    box-shadow: 0px 4px 5px cornflowerblue;
  }

  .list-group-item:hover {
    text-decoration: none;
    text-shadow: 0px -40px 0px rgba(255, 255, 255, 0);
    transform: translateY(-10%) translateZ(2px) scale(1.1);
    font-weight: 600;
    transition: all 0.75s;
    transition-delay: all 0.5s;
    border: 1px solid #00BFFF;
  }

  p {
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .container-login101 {
    width: 100%;
    min-height: 100vh;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    /* align-items: center; */
    padding: 15px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  .input-group-append {
    background-color: white;
    border-radius: 0px 10px 10px 0px;
  }
</style>

<body class="preloading">
  <div class="load">
    <img src="../app/images/loader.gif" alt="">
  </div>
  <div class="container-login101" style="background-image: url('../app/images/bg-01.jpg');">
    <div class="container" style="margin-top: 30px;">
      <div class="row">
        <!-- <div class="col-sm-3">
            <h4 class="form-label">Categories</h4>
            <ul class="list-group">
                <a th:href="@{/shop}"><li class="list-group-item">All Products</li></a>
                <a href="" th:each="category, iStat : ${categories}"
                  th:href="@{/shop/category/{id}(id=${category.id})}"><li
                              class="list-group-item" th:text="${category.name}"></li></a>
            </ul>
        </div>   -->
        <form action="" method="get">
          <div class="container justify-content-center">
            <div class="row">
              <div class="col-md-8">
                <div class="input-group mb-3">
                  <input type="text" name="keyword" id="keyword" value="<?php if (isset($_GET['keyword'])) {
                                                                          echo $_GET['keyword'];
                                                                        } ?>" class="form-control input-text" placeholder="Search products...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class=" search-btn btn btn-lg" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

        <?php foreach ($danhSachPhieuDK as $phieu) : ?>
          <div class="col-sm-9" id="phieu-container">
            <div class="card" style="margin-top: 20px">
              <div class="row no-gutters">
                <div class="col-sm-5 d-flex justify-content-center">
                  <img class="" width="200" height="auto" src="../app/images/<?= $phieu['Image'] ?>">
                </div>
                <div class="col-sm-7 d-flex justify-content-center">
                  <div class="card-body">
                    <h5 class="card-title" name="hoten"><?= $phieu['HoTen'] ?></h5>
                    <h4 name="chuyennganh">
                      <?php
                      echo number_format($phieu['ChuyenNganh'], 0, ',', '.')
                      ?>
                      ₫<span></span></h4>
                    <p name="congty"><?= $phieu['CongTy'] ?></p>
                    <!-- <a href="?route=add-cart&idPhieu=<?= $phieu['MaSV'] ?>" class="btn btn-primary">Add to Cart</a> -->
                    <a href="?route=detail-prd&idPhieu=<?= $phieu['MaSV'] ?>" class="btn btn-primary">View Product</a>
                    <!-- <a class="btn btn-danger delete-phieu" id="<?= $phieu['MaSV'] ?>">Delete</a> -->
                    <!-- <a href="?route=cap-nhat&idPhieu=<?= $phieu['MaSV'] ?>" class="btn btn-warning delete-phieu" >Edit</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</body>
<script>
  $(document).on('click', '.delete-phieu', function() {
    var idPhieu = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: '?route=delete-ajax',
      data: {
        id: idPhieu
      },
      success: function(response) {
        var data = JSON.parse(response);
        if (data.success) {
          // Do something on success
          $('#phieu-container div#' + idPhieu).remove();
        } else {
          // Do something on failure
          alert("Xoa khong thanh cong!");
        }
      },
      error: function(xhr) {
        console.log(xhr.responseText);
      }
    });
  });

  $(window).on('load', function(event) {
    $('body').removeClass('preloading');
    $('.load').delay(500).fadeOut('fast');
  });
</script>

</html>