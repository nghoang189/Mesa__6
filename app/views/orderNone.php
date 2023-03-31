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

                                <h5>You haven't order anything</h5>
                                <?php
                                ?>
                                <hr class="mb-4">
                                <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
                                    items to your cart does not mean booking them.</p>
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
                                        <span>₫<span></span></span>
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
                                        <span><strong> ₫<span></span></strong></span>
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