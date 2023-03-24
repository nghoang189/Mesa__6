<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Intern List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../app/css/btn.css">

</head>
<style>
  h1{
    margin: 20px 0px;
    text-align: center;
    font-size: 40px;
  }
  .rowCustom{
    display: flex; 
  }
  button{
    margin-right: 10px;
  }
  .formH input{
    display: none;
  }
  .col-3{
    padding-left: 25px;
  }
</style>
<?php 
include_once('partital/header.php');
?>

<body>
  <h1 class="form-title">Products List</h1>
  <div class="row" id="phieu-container">
  <?php foreach ($danhSachPhieuDK as $phieu): ?>
    <div class="col-3" id="<?=$phieu['MaSV']?>">
      <div class="card" style="width: 20rem;">
      <div class="card-body">
        <h5 class="card-title"><?=$phieu['MaSV']?></h5>
        <p class="card-text"><?=$phieu['HoTen'] ?> <br> <?=$phieu['ChuyenNganh']?> <br> <?=$phieu['CongTy']?></p>
        <a href="?route=add-cart&idPhieu=<?=$phieu['MaSV']?>" class="btn btn-primary">Add to Cart</a>
        <button class="btn btn-danger delete-phieu" style="margin-left: 10px;"  data-id="<?=$phieu['MaSV']?>">Delete</button>
        <button data-id="<?=$phieu['MaSV']?>" class="btn btn-warning edit-phieu">Edit</button>
      </div>
      </div>  
    </div>
  <?php endforeach ?>
</div> 
</body>
<?php 
include_once('partital/footer.php');
?>
</html>
