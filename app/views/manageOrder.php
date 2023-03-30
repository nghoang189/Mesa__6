<!doctype html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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

    <title>Admin - Manage Users</title>
    <style>
        .btn-danger {
            padding: 0.2em 0.8em;
            border: none;
            outline: none;
            color: rgb(255, 255, 255);
            background: red;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .btn-warning {
            padding: 0.2em 0.8em;
            border: none;
            outline: none;
            color: black;
            background: #FFCC00;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

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
    </style>
</head>

<body>
    <div class="container-fluid">

        <!-- <a href="?route=register" style="margin: 20px 0" class="btn btn-primary">Add User</a> -->
        <table class="table" style="margin-top: 80px;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">State</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Additional Info</th>
                    <th scope="col">Total</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderList as $order) : ?>
                    <tr>
                        <th scope="row"><?= $order['id'] ?></th>
                        <td style="width:100px; padding-right: 20px;"><?= $order['orderid'] ?></td>
                        <td style="width:150px; padding-right: 20px;"><?= $order['name'] ?></td>
                        <td style="width:100px; padding-right: 20px;"><?= $order['email'] ?></td>
                        <td style="width:150px; padding-right: 20px;"><?= $order['sdt'] ?></td>
                        <td style="width:150px; padding-right: 20px;"><?= $order['state'] ?></td>
                        <td style="width:150px; padding-right: 20px;"><?= $order['city'] ?></td>
                        <td style="width:250px; padding-right: 20px;"><?= $order['address'] ?></td>
                        <td style="width:250px; padding-right: 20px;"><?= $order['addinfor'] ?></td>
                        <td style="width:100px; padding-right: 20px;">
                            <?php
                            $price = $order['total'];
                            echo number_format($price, 0, ',', '.');
                            ?>₫
                        </td>
                        <td><a href="?route=order-detail&orderid=<?= $order['orderid'] ?>" class="btn btn-primary">Detail</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>