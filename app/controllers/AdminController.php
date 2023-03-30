<?php
require_once('../app/models/Admin.php');
require_once('../app/models/PhieuDangKy.php');

class AdminController{
    public function index() {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        }else{
            require_once('../app/views/adminHome.php');
        }
    }
    public function manageProduct() {
        $productList = PhieuDangKy::getAll();
        require_once('../app/views/manageProduct.php');
    }
}