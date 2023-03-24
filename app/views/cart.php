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

  <main id= "main" class="main">
      <div class="pagetitle">
        <h1>SHOPPING CART</h1>
      </div>
      <table class="table my-3">
      <a href="?route=empty-cart" class="btn btn-sm btn-danger mt-2">
          Хоа Gio Hang
      </a>
      <thead>
        <tr class= "text-center">
          <th>Ma So Phieu</th>
          <th>Ho Va Ten</th>
          <th>So Luong</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_SESSION['cart'])) :
          foreach ($_SESSION['cart'] as $cart) :
        ?>
            <tr class="text-center">
              <td><?= $cart ['idPhieu']; ?></td>
              <td><?= $cart ['ten']; ?></td>
              <td>
                  <form action="?route-cart-update" method= "post">
                  <input type= "number" value="<?= $cart['soluong']; ?>" name="soluong" min="1">
                  <input type= "hidden" name="idPhieu" value="<?= $cart['idPhieu']; ?>">
                  <a class="btn btn-sm btn-warning" >Update</a>
                </form>
                </td>
                <td><a class="btn btn-sm btn-danger" href="?route=delete-cart-item&idPhieu=<?=$cart['idPhieu']; ?>">Remove</a></td>
                </tr>
                <?php
                endforeach;
                endif;
                ?>
                </tbody>
      </table>
  </main>
  </html>           
