<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../app/css/prddetail.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="../app/css/main.css">
    <link rel="stylesheet" type="text/css" href="../app/css/loader.css">
</head>

<style>
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

    .input {
        outline: none;
        border: none;
    }
</style>

<body class="preloading">
    <!-- <div class="load">
        <img src="../app/images/loader.gif" alt="">
    </div> -->
    <div class="container-login101" style="background-image: url('../app/images/bg-01.jpg');">
        <div class="container">
            <div class="heading-section">
                <h2 style="color:white;">Product Details</h2>
            </div>
            <?php
            global $pdo;
            if (isset($_GET['idPhieu'])) {
                $stmt = $pdo->prepare('SELECT * FROM phieudangkythuctap WHERE MaSV = ?');
                $stmt->execute([$_GET['idPhieu']]);
                $prd = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            <div class="row">
                <div class="col-md-7">
                    <div id="slider" class="owl-carousel product-slider">
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image1'] ?>">

                        </div>
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image2'] ?>">

                        </div>
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image3'] ?>">
                        </div>
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image4'] ?>">
                        </div>
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image5'] ?>">
                        </div>
                    </div>
                    <div id="thumb" class="owl-carousel product-thumb">
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image1'] ?>">

                        </div>
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image2'] ?>">

                        </div>
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image3'] ?>">
                        </div>
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image4'] ?>">
                        </div>
                        <div class="item">
                            <img src="../app/images/<?= $prd['Image5'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="product-dtl">
                        <div class="product-info">
                            <div class="product-name" style="margin-bottom: 10px; color: white;"><?= $prd['HoTen'] ?></div>
                            <div class="reviews-counter">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" checked />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" checked />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                                <span style="color: white;"></span>3 Reviews</span>
                            </div>
                            <div class="product-price-discount" style="color:white;"><span>
                                    <?php
                                    echo number_format($prd['ChuyenNganh'], 0, ',', '.')
                                    ?>₫
                                </span><span class=" line-through">
                                    <?php
                                    $discount = $prd['ChuyenNganh'] - 1000000;
                                    echo number_format($discount, 0, ',', '.')
                                    ?>₫
                                </span></div>
                        </div>
                        <div style="font-size:large; margin-bottom:30px; color:white;"><?= $prd['CongTy'] ?></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label style="color: white;" for="size">RAM</label>
                                <select id="size" name="size" class="form-control">
                                    <option>8 GB</option>
                                    <option>16 GB</option>
                                    <option>32 GB</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label style="color: white;" for="color">ROM</label>
                                <select id="color" name="color" class="form-control">
                                    <option>128 GB</option>
                                    <option>256 GB</option>
                                    <option>512 GB</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label style="color: white;" for="color">Color</label>
                                <select id="color" name="color" class="form-control">
                                    <option>Blue</option>
                                    <option>Black</option>
                                    <option>White</option>
                                </select>
                            </div>
                        </div>

                        <div class="product-count">
                            <label style="color: white;" for="size">Quantity</label>
                            <form action="?route=add-cart&idPhieu=<?= $prd['MaSV'] ?>" class="display-grid" method="post">
                                <div class="display-flex">
                                    <div class="qtyminus">-</div>
                                    <input id="quantity" type="text" name="quantity" value="1" class="qty">
                                    <div class="qtyplus">+</div>
                                </div>
                                <button type="submit" class="round-black-btn"><i class="fa fa-cart-plus mr-1" aria-hidden="true"></i>&nbsp;Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-info-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="tab-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li class="tab-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <iframe width="80%" height="500px" style="margin-left: 90px;" src="https://www.youtube.com/embed/<?= $prd['embed'] ?>?&autoplay=1&rel=0&loop=1&playlist=<?= $prd['embed'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <h4 style="color:white; margin-top:20px;">Thông tin sản phẩm</h4>
                        <p> <img style="width: 80%; margin-left:90px; margin-top:20px;" src="../app/images/<?= $prd['Image6'] ?>"></p>
                        <h4 style="color:white; margin-top:30px;"><?= $prd['ttdes1'] ?></h4>
                        <p style="color:white; font-size:18px; margin-top:20px;"><?= $prd['des1'] ?></p>
                        <p> <img style="width: 80%; margin-left:90px; margin-top:20px;" src="../app/images/<?= $prd['Image7'] ?>"></p>
                        <h4 style="color:white; margin-top:30px;"><?= $prd['ttdes2'] ?></h4>
                        <p style="color:white; font-size:18px; margin-top:20px;"><?= $prd['des2'] ?></p>
                        <p> <img style="width: 80%; margin-left:90px; margin-top:20px;" src="../app/images/<?= $prd['Image8'] ?>"></p>
                    </div>

                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="review-heading">REVIEWS</div>
                        <p class="mb-20">There are no reviews yet.</p>
                        <form class="review-form">
                            <div class="form-group">
                                <label>Your rating</label>
                                <div class="reviews-counter">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Your message</label>
                                <textarea class="form-control" rows="10"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="Name*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="Email Id*">
                                    </div>
                                </div>
                            </div>
                            <button class="round-black-btn">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
require_once('../app/views/share/footer.php');
?>
<script src="../app/js/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(window).on('load', function(event) {
        $('body').removeClass('preloading');
        $('.load').delay(500).fadeOut('fast');
    });
    $(document).ready(function() {
        var slider = $("#slider");
        var thumb = $("#thumb");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;
        slider.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200
        }).on('changed.owl.carousel', syncPosition);
        thumb
            .on('initialized.owl.carousel', function() {
                thumb.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: true,
                item: 4,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage,
                navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);
            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            thumb
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumb.find('.owl-item.active').length - 1;
            var start = thumb.find('.owl-item.active').first().index();
            var end = thumb.find('.owl-item.active').last().index();
            if (current > end) {
                thumb.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                thumb.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                slider.data('owl.carousel').to(number, 100, true);
            }
        }
        thumb.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            slider.data('owl.carousel').to(number, 300, true);
        });

        // var qty = document.getElementById("quantity");
        $(".qtyminus").on("click", function() {
            var now = $(".qty").val();
            if ($.isNumeric(now)) {
                if (parseInt(now) - 1 > 0) {
                    now--;
                }
                $(".qty").val(now);
            }
            // qty.val = now;
        })
        $(".qtyplus").on("click", function() {
            var now = $(".qty").val();
            if ($.isNumeric(now)) {
                $(".qty").val(parseInt(now) + 1);
            }

        });
    });
</script>

</html>