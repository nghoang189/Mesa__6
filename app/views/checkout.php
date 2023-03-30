<!doctype html>
<html lang="en" xmlns:th="http://www.thymeleaf.org" xmlns:sec="http://www.thymeleaf.org/thymeleaf-extras-springsecurity3">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <title>Store - Checkout</title>
    <link rel="stylesheet" href="../app/css/btn.css">
</head>
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

<body>
    <div class="container-login101" style="background-image: url('../app/images/bg-01.jpg');">

        <div class="container">

            <!--Section: Block Content-->
            <section class="mt-5 mb-4">
                <form action="?route=order" method="post">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column left-->
                        <div class="col-lg-8 mb-4">

                            <!-- Card -->
                            <div class="card wish-list pb-1">
                                <div class="card-body">

                                    <h5 class="form-label">Billing details</h5>

                                    <!-- RecipientName & Email -->
                                    <!-- Grid row -->
                                    <div class="row">
                                        <!-- Grid column -->
                                        <div class="col-lg-6">
                                            <!-- Recipient Name -->
                                            <div class="md-form md-outline mb-0 mb-lg-4">
                                                <label class="form-label" for="recipientName">Recipient Name</label>
                                                <input type="text" name="name" id="name" placeholder="Nguyen Hoang" class="form-control mb-0 mb-lg-2">
                                            </div>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <div class="col-lg-6">
                                            <!-- Email -->
                                            <div class="md-form md-outline">
                                                <label class="form-label" for="email">Email Address</label>
                                                <input type="email" name="email" id="email" placeholder="nghoang189@gmail.com" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Grid column -->
                                    </div>
                                    <!-- Grid row -->
                                    <!-- Phone & PostCode -->
                                    <!-- Grid row -->
                                    <div class="row">
                                        <!-- Grid column -->
                                        <div class="col-lg-6">
                                            <!-- Phone -->
                                            <div class="md-form md-outline mb-0 mb-lg-4">
                                                <label class="form-label" for="phone">Phone</label>
                                                <input type="number" th:maxlength="12" name="phone" id="phone" placeholder="0971499652" class="form-control mb-0 mb-lg-2">
                                            </div>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <!-- <div class="col-lg-6"> -->
                                        <!-- Postal Code -->
                                        <!-- <div class="md-form md-outline">
                                                <label class="form-label" for="postalCode">Postcode/ZIP</label>
                                                <input type="number" th:maxlength="7" th:field="*{postalCode}" name="postalCode" id="postalCode" placeholder="90002" class="form-control">
                                            </div>
                                        </div> -->
                                        <!-- Grid column -->
                                    </div>
                                    <!-- Grid row -->
                                    <!-- State & CountryCode -->
                                    <!-- Grid row -->
                                    <div class="row">
                                        <!-- Grid column -->
                                        <div class="col-lg-6">
                                            <!-- State -->
                                            <div class="md-form md-outline mb-0 mb-lg-4">
                                                <label class="form-label" for="state">State</label>
                                                <input type="text" name="state" id="state" placeholder="Binh Thanh" class="form-control mb-0 mb-lg-2">
                                            </div>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <!-- <div class="col-lg-6"> -->
                                        <!-- Country Code -->
                                        <!-- <div class="md-form md-outline">
                                                <label class="form-label" for="countryCode">Country Code</label>
                                                <input type="text" th:field="*{countryCode}" name="countryCode" id="countryCode" placeholder="VN" class="form-control">
                                            </div> -->
                                        <!-- </div> -->
                                        <!-- Grid column -->
                                    </div>
                                    <!-- Grid row -->

                                    <!-- Town / City -->
                                    <div class="md-form md-outline mt-2">
                                        <label class="form-label" for="city">Town / City</label>
                                        <input type="text" name="city" id="city" placeholder="Ho Chi Minh" class="form-control">
                                    </div>

                                    <!-- Address Part 1 -->
                                    <div class="md-form md-outline mt-2">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" name="address" id="address" placeholder="House number and street name" class="form-control">
                                    </div>

                                    <!-- Address Part 2 -->
                                    <!-- <div class="md-form md-outline mt-2">
                                        <label class="form-label" for="line2">Address (Line 2)</label>
                                        <input type="text" th:field="*{line2}" name="line2" id="line2" placeholder="Apartment, suite, unit etc. (optional)" class="form-control">
                                    </div> -->

                                    <!-- Additional information -->
                                    <div class="md-form md-outline mt-2">
                                        <label class="form-label" for="note">Additional information</label>
                                        <textarea name="note" id="note" value="none" class="md-textarea form-control" rows="4"></textarea>
                                    </div>
                                    <input type="hidden" th:field="*{total}" name="total" id="total">
                                </div>
                            </div>
                            <!-- Card -->

                        </div>
                        <!--Grid column left-->

                        <!--Grid column right-->
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
                                                if (isset($_SESSION['cart'])) :
                                                    foreach ($_SESSION['cart'] as $cart) :
                                                        $price = $cart['price'] * $cart['soluong'];
                                                        $totalPrice += $price;
                                                    endforeach;
                                                    echo number_format($totalPrice, 0, ',', '.');
                                                endif;
                                                ?>
                                                ₫<span th:text="${total}"></span></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            Shipping
                                            <span>Free</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                            <div>
                                                <strong>The total amount of</strong>
                                                <strong>
                                                    <p class="mb-0">(including VAT)</p>
                                                </strong>
                                            </div>
                                            <span><strong>
                                                    <?php
                                                    $vatPrice = 0;
                                                    $totalPrice = 0;
                                                    if (isset($_SESSION['cart'])) :
                                                        foreach ($_SESSION['cart'] as $cart) :
                                                            $price = $cart['price'] * $cart['soluong'];
                                                            $totalPrice += $price;
                                                        endforeach;
                                                        $id = $cart['idPhieu'];
                                                        $vatPrice = $totalPrice + ($totalPrice * 10) / 100;
                                                        echo number_format($vatPrice, 0, ',', '.');
                                                    endif;
                                                    ?>
                                                    ₫<span></span></strong></span>
                                        </li>
                                        <input type="hidden" value="<?= $vatPrice ?>" name="total">
                                        <!-- <input type="hidden" value="<?= $id ?>"  > -->
                                    </ul>

                                    <button type="submit" name="order" class="btn btn-primary btn-block waves-effect waves-light">Order</button>

                                </div>
                            </div>
                            <!-- Card -->

                            <!-- Card -->
                            <div class="card mb-4">
                                <div class="card-body">

                                    <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Add a discount code (optional)
                                        <span><i class="fas fa-chevron-down pt-1"></i></span>
                                    </a>

                                    <div class="collapse" id="collapseExample">
                                        <div class="mt-3">
                                            <div class="md-form md-outline mb-0">
                                                <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->

                        </div>
                        <!--Grid column right-->
                    </div>
                    <!--Grid row-->
                </form>


            </section>
            <!--Section: Block Content-->


        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>