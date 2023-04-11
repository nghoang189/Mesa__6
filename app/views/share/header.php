<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../app/css/navbrand.css">
</head>
<style>
    .nav-item {
        padding: 0.1em 0.5em;
        border: none;
        outline: none;
        color: rgb(255, 255, 255);
        background: whitesmoke;
        cursor: pointer;
        position: relative;
        z-index: 0;
        border-radius: 10px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .nav-item:before {
        content: "";
        background: linear-gradient(45deg,
                #ff0000,
                #ff7300,
                #fffb00,
                #48ff00,
                #00ffd5,
                #002bff,
                #7a00ff,
                #ff00c8,
                #ff0000);
        position: absolute;
        top: -2px;
        left: -2px;
        background-size: 200%;
        z-index: -1;
        filter: blur(5px);
        -webkit-filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing-nav-item 20s linear infinite;
        transition: opacity 0.3s ease-in-out;
        border-radius: 10px;
    }

    @keyframes glowing-nav-item {
        0% {
            background-position: 0 0;
        }

        50% {
            background-position: 400% 0;
        }

        100% {
            background-position: 0 0;
        }
    }

    .nav-item:after {
        z-index: -1;
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: whitesmoke;
        left: 0;
        top: 0;
        border-radius: 10px;
    }

    .nav-item:hover {
        text-shadow: 0px -40px 0px rgba(255, 255, 255, 0);
        transform: translateY(15%) translateZ(1px) scale(1.1);
        font-weight: 450;
        transition: all 0.75s;
        transition-delay: all 0.5s;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="background-two link-container">
                <a style="font-size: 25px;" class="link-two" href="?">Store</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="?">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="?route=shop">Shop</a>
                    </li>
                    <?php
                    session_start();
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="?route=view-cart">Cart (<?php if (isset($_SESSION['cart'])) {
                                                                                echo count($_SESSION['cart']);
                                                                            } else
                                                                                echo "0";
                                                                            ?>)</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="?route=your-order">Your Order</a>
                    </li>
                    <?php
                    if (isset($_SESSION['UserId'])) {
                        echo "";
                    } else {
                        echo "<li class='nav-item active'><a class='nav-link' href='?route=register'>Register</a></li>";
                    }
                    ?>
                    <li class="nav-item active">
                        <?php
                        if (isset($_SESSION['UserId'])) {
                            echo "<a class='nav-link' href='?route=logout'>Logout</a>";
                        } else {
                            echo "<a class='nav-link' href='?route=login'>Login</a>";
                        }
                        ?></li>
                    <?php
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] == 1) {
                            echo "<li class='nav-item active'><a class='nav-link' href='?route=admin'>Admin Home</a></li>";
                        } else if (isset($_SESSION['userName'])) {
                            $userName = $_SESSION['userName'];
                            echo "<li class='nav-item active'><a class='nav-link' href='?route=user-info'>$userName</a></li>";
                        } else {
                            echo "";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>