<?php
require_once('../app/models/PhieuDangKy.php');
class PhieuDangKyController {
    // hien thi phieu dang ky
    public function index() {
        require_once('../app/views/dangKy.php');
    }
    // hien thi phieu cap nhat
    public function suaphieu() {
        require_once('../app/views/suaphieu.php');
    }
    // hien thi danh sach da dang ky 
    public function showPhieuDangKy() {
        $danhSachPhieuDK = PhieuDangKy::getAll();
        require_once('../app/views/danhsach.php');
    }

    function createPhieuDangKy(){

        $hoten = $_POST['hoten'];
        
        $chuyennganh = $_POST['chuyennganh'];
        $congty = $_POST['congty'];

        $isSuccess = PhieuDangKy::create($hoten, $chuyennganh, $congty);
        if($isSuccess)        
            // Redirect to homepage
            header('Location: ?route=danh-sach');
        else 
            header('Location: ?route=failure');
        exit;

    }
    function updatePhieuDangKy(){
        $id = $_GET['id'];
        $hoten = $_POST['hoten'];
        
        $chuyennganh = $_POST['chuyennganh'];
        $congty = $_POST['congty'];

        $isSuccess = PhieuDangKy::update($id,$hoten, $chuyennganh, $congty);
        if($isSuccess)        
            // Redirect to homepage
            header('Location: ?route=danh-sach');
        else 
            header('Location: ?route=failure');
        exit;

    }

    function delete() {
        $id = $_GET['idPhieu'];
        $isSuccess = PhieuDangKy::delete($id);
        if($isSuccess)        
            // Redirect to homepage
            header('Location: ?route=danh-sach');
        else 
            header('Location: ?route=failure');
        exit;
    }

    function addCart(){
        // session_start();
        if(isset($_GET['idPhieu'])){
            $masoPhieu = $_GET['idPhieu'];
            $phieuDangky = PhieuDangKy::find($masoPhieu);

            if(!empty($_SESSION['cart'])){
                $acol = array_column($_SESSION['cart'], 'idPhieu');

                if(in_array($masoPhieu, $acol)){
                    $_SESSION['cart'][$masoPhieu]['soluong'] += 1;
                }else{
                    $item = [
                        'idPhieu' => $_GET['idPhieu'],
                        'soluong' => 1,
                        'ten' => $phieuDangky['HoTen']
                    ];
                    $_SESSION['cart'][$masoPhieu] = $item;
                }
            }else{
                $item = [
                    'idPhieu' => $_GET['idPhieu'],
                    'soluong' => 1,
                    'ten' => $phieuDangky['HoTen']
                ];
                $_SESSION['cart'][$masoPhieu] = $item;
            }
            header('Location: ?route=view-cart');
            exit;
        }else{
            header('Location: ?route=error');
            exit;
        }
    } 

    function viewCart(){
        require_once('../app/views/cart.php');
    }
    
    function deleteCart(){
        $id = $_GET['idPhieu'];
        unset($_SESSION['cart'][$id]);
        header('Location: ?route=view-cart');
        exit;
    }

    function deleteAllCart(){
        unset($_SESSION['cart']);
        header('Location: ?route=view-cart');
        exit;
    }

    function updateCart(){
        if(isset($_GET['idPhieu'])){
            $masoPhieu = $_GET['idPhieu'];
            $soluong = $_GET['soluong'];
            $phieuDangky = PhieuDangKy::find($masoPhieu);
            $acol = array_column($_SESSION['cart'], 'idPhieu');
            $_SESSION['cart'][$masoPhieu]['soluong'] = $soluong;               
            header('Location: ?route=view-cart');
            exit;
        }else{
            header('Location: ?route=error');
            exit;
        }
    }

    function deleteAjax(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $idPhieu = $_POST['id'];
            $isSuccess = PhieuDangKy::delete($idPhieu);
            echo json_encode(['success' => $isSuccess]);
        }
    }
}
