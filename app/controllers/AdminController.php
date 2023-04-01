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

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fullName = $_POST['FullName'];
            $userName = $_POST['UserName'];
            $pass = $_POST['Pass'];
            $confirmPass = $_POST['ConfirmPass'];
            $role = $_POST['role'];

            if ($pass != $confirmPass) {
                $_SESSION['Error'] = "Mat khau xac nhan khong dung!";
                header('Location: ?route=register');
                exit;
            }

            $hashPass = password_hash($pass, PASSWORD_BCRYPT);
            $isSuccess = Admin::create($fullName, $userName, $hashPass, $role);
            if ($isSuccess)
                // Redirect to homepage
                header('Location: ?route=manage-user');
            else {
                $_SESSION['Error'] = "Something went wrong when attempt to add new user.";
                header('Location: ?route=failure');
            }
            exit;
        }
        require_once('../app/views/addUser.php');
    }
}
