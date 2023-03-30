<?php
require_once('../app/models/Admin.php');
require_once('../app/models/Product.php');
require_once('../app/models/User.php');

class AdminController
{
    public function index()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            require_once('../app/views/adminHome.php');
        } else {
            header('Location: ?');
        }
    }
    public function manageProduct()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else 
            if ($_SESSION['role'] == 1) {
            $productList = Product::getAll();
            require_once('../app/views/manageProduct.php');
        } else {
            header('Location: ?');
        }
    }

    public function showUserList()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $userList = Admin::getAll();
            require_once('../app/views/manageUser.php');
        } else {
            header('Location: ?');
        }
    }

    public function showOrderList()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $orderList = Admin::getAllOrderList();
            require_once('../app/views/manageOrder.php');
        } else {
            header('Location: ?');
        }
    }

    // public function createOrderDetail()
    // {
    //     if (isset($_SESSION['UserId']) == false) {
    //         // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
    //         header('Location: ?route=login');
    //     } else if ($_SESSION['role'] == 1) {
    //         $item = $_SESSION['cart'];
    //         $orderid = 
    //         $isSuccess = Admin::createOrderDetail();
    //         require_once('../app/views/orderDetail.php');
    //     } else {
    //         header('Location: ?');
    //     }
    // }

    public function showOrderDetail()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $id = $_GET['orderid'];
            $orderDetail = Admin::getOrderDetail($id);
            require_once('../app/views/orderDetail.php');
        } else {
            header('Location: ?');
        }
    }

    public function showYourOrder()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $id = $_SESSION['orderid'];
            $getShowCart = Product::getShowCart($id);
            // $orderDetail = Admin::getOrderDetail($id);
            require_once('../app/views/order.php');
        } else {
            header('Location: ?');
        }
    }

    function deleteUser()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $userId = $_GET['idUser'];
            $isSuccess = User::delete($userId);
            if ($isSuccess)
                // Redirect to homepage
                header('Location: ?route=manage-user');
            else
                header('Location: ?route=failure');
            exit;
        } else {
            header('Location: ?');
        }
    }

    public function editUser()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            require_once('../app/views/editUser.php');
        } else {
            header('Location: ?');
        }
    }

    function updateUser()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $id = $_GET['idUser'];
            $fullName = $_POST['FullName'];
            $userName = $_POST['UserName'];
            $role = $_POST['role'];
            $isSuccess = Admin::update($id, $userName, $fullName, $role);
            if ($isSuccess)
                // Redirect to Manage Products Page
                header('Location: ?route=manage-user');
            else
                header('Location: ?route=failure');
            exit;
        } else {
            header('Location: ?');
        }
    }
}
