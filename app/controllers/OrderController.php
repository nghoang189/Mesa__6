<?php
require_once('../app/models/Product.php');
require_once('../app/models/Order.php');

class OrderController
{
    function checkOut()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if (isset($_SESSION['cart'])) {
            // Nếu đã có sản phẩm trong giỏ hàng
            require_once('../app/views/checkout.php');
        } else {
            // Nếu chưa có sản phẩm trong giỏ hàng
            $categoryList = Product::getCategory();
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $productList = Product::pagination($page);
            require_once('../app/views/shop.php');
        }
    }

    function createOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_SESSION['cart'])) {
                $orderid = "MYSTORE" . rand(0, 999999);
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sdt = $_POST['phone'];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $address = $_POST['address'];
                $addinfor = $_POST['note'];
                $total = $_POST['total'];
                $userid = $_SESSION['UserId'];
                // Tạo đơn hàng
                $iddh = Order::createOrder($orderid, $userid, $name, $email, $sdt, $state, $city, $address, $addinfor, $total);
                if ($iddh) {
                    $_SESSION['orderid'] = $iddh;
                    foreach ($_SESSION['cart'] as $cart) {
                        // Tạo chi tiết đơn hàng theo $iddh
                        Order::createOrderDetail($iddh, $userid, $cart['idPhieu'], $cart['ten'], $cart['soluong'], $cart['price'], $cart['image']);
                    }
                    unset($_SESSION['cart']);
                    $getShowCart = Product::getShowCart($userid);
                    require_once('../app/views/order.php');
                }
            }
        }
    }

    public function showYourOrder()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else {
            $id = $_SESSION['UserId'];
            $getShowCart = Product::getShowCart($id);
            if ($getShowCart) {
                require_once('../app/views/order.php');
            } else {
                require_once('../app/views/orderNone.php');
            }
        }
    }
}
