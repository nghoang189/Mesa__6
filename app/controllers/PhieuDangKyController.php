<?php
require_once('../app/models/PhieuDangKy.php');
class PhieuDangKyController {
    // hien thi phieu dang ky
    public function index() {
        require_once('../app/views/addProducts.php');
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
        $congty = $_POST['note'];

        if($_SERVER['REQUEST_METHOD']=="POST"){
            //upload file
            $isUploaded = $this->uploadImageFile();
            if($isUploaded == 1){
                $image = htmlspecialchars( basename( $_FILES["prd-picture"]["name"]));
            }
            else{
                die("Server's Error");
            }
        }
        $isSuccess = PhieuDangKy::create($hoten, $chuyennganh, $congty, $image);
        if($isSuccess)        
            // Redirect to homepage
            header('Location: ?route=manage-prd');
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
            header('Location: ?route=manage-prd');
        else 
            header('Location: ?route=failure');
        exit;
    }

    function addCart(){
        //session_start();
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        }
        else if(isset($_GET['idPhieu'])){
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
                        'ten' => $phieuDangky['HoTen'],
                        'image' => $phieuDangky['Image'],
                        'price' => $phieuDangky['ChuyenNganh']
                    ];
                    $_SESSION['cart'][$masoPhieu] = $item;
                }
            }else{
                $item = [
                    'idPhieu' => $_GET['idPhieu'],
                    'soluong' => 1,
                    'ten' => $phieuDangky['HoTen'],
                    'image' => $phieuDangky['Image'],
                    'price' => $phieuDangky['ChuyenNganh']
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

    function uploadImageFile(){
        $target_dir = "../app/images/";
        $target_file = $target_dir . basename($_FILES["prd-picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["prd-picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        return 0;
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["prd-picture"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
            return 1;
        } else {
            // echo "Sorry, there was an error when uploading your file.";
            return 0;
        }
        }
    }

    function checkOut(){
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        }else{
            require_once('../app/views/checkout.php');
        }
    }

    function viewProduct(){
        require_once('../app/views/viewProduct.php');
    }
}
