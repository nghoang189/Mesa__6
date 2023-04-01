<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

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
<?php
include_once('share/header.php');
?>
<style>
    .btn-primary {
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
    }

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
</style>
<div class="container-login101" style="background-image: url('../app/images/bg-01.jpg');">
    <main>
        <div class="container">
            <!--Section: Block Content-->
            <section class="mt-5 mb-4">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-8">
                        <!-- Card -->
                        <div class="card wish-list mb-4">
                            <div class="card-body">
                                <h5 class="form-label">Order</h5>
                                <?php
                                foreach ($getShowCart as $cart) :
                                ?>
                                    <div class="row mb-4" style="margin-top: 20px">
                                        <div class="col-md-5 col-lg-3 col-xl-3">
                                            <div class="mb-3 mb-md-0">
                                                <img class="img-fluid w-100" src="../app/images/<?= $cart['image'] ?>" alt="<?= $cart['image'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-9 col-xl-9">
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <input type="hidden" name="id" value="<?= $cart['id']; ?>">
                                                        <h5 class="form-label"><?= $cart['prdname']; ?></h5>
                                                        <p class="mb-3 text-uppercase" style="margin-top: 20px;">Quantity: <span><?= $cart['quantity']; ?></span></p>
                                                    </div>
                                                </div>
                                                <div class="mt-5 d-flex justify-content-between align-items-center">
                                                    <div>
                                                    </div>
                                                    <p class="mb-0" style="font-size: 18px;">
                                                        <?php
                                                        $price = $cart['unit'] * $cart['quantity'];
                                                        echo number_format($price, 0, ',', '.');
                                                        ?>
                                                        <span><strong>₫<span></span></strong></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                                <hr class="mb-4">
                                <div style="margin-top: 10px; font-size:large">
                                    <a href="?route=shop" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fa fa-cart-plus mr-1" aria-hidden="true"></i>&nbsp;Keep Shopping </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-4">
                        <!-- Card -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="form-label">The total amount </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Amount Payable
                                        <span>
                                            <?php
                                            $totalPrice = 0;
                                            foreach ($getShowCart as $cart) :
                                                $price = $cart['unit'] * $cart['quantity'];
                                                $totalPrice += $price;
                                            endforeach;
                                            echo number_format($totalPrice, 0, ',', '.');
                                            ?>
                                            ₫<span></span></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        Shipping
                                        <span>Free</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>The total amount of</strong>
                                            <strong>
                                                <p class="mb-0">(including 10% VAT)</p>
                                            </strong>
                                        </div>
                                        <span><strong>
                                                <?php
                                                $vatPrice = 0;
                                                $totalPrice = 0;
                                                foreach ($getShowCart as $cart) :
                                                    $price = $cart['unit'] * $cart['quantity'];
                                                    $totalPrice += $price;
                                                endforeach;
                                                $vatPrice = $totalPrice + ($totalPrice * 10) / 100;
                                                // $_SESSION['total'] = $vatPrice;
                                                echo number_format($vatPrice, 0, ',', '.');
                                                ?>
                                                ₫<span></span></strong></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!--Section: Block Content-->
        </div>
    </main>
</div>

</html>