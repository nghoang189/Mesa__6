<?php
require_once('../app/models/User.php');
class AccountController {
    public function logout(){
        unset($_SESSION['UserId']);
        unset($_SESSION['Error']);
        unset($_SESSION['Avatar']);
        unset($_SESSION['cart']);
        header('Location: ?route=login');   
        exit;
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD']=="POST"){ 
            // session_start();
            $userName = $_POST['UserName'];
            $pass = $_POST['Pass'];
        
            if(empty($userName) || empty($pass))
            {
                $_SESSION['Error'] = "Vui long nhap TK & MK";
                header('Location: ?route=login');
                exit;
            }

            $user = User::find($userName);
            if(!empty($user)){
                $isSuccess = password_verify($pass, $user['Pass']);
                if($isSuccess){     
                    $_SESSION['UserId'] = $user['Id'];  
                    $_SESSION['FullName'] = $user['FullName'];          
                    $_SESSION['Avatar'] = $user['Avatar'];      
                    header('Location: ?');   
                }   
                else 
                {
                    $_SESSION['Error'] = "Tai khoan khong chinh xac";
                    header('Location: ?route=login');
                }
                exit;
            }
            else{
                $_SESSION['Error'] = "Tai khoan khong chinh xac";
                header('Location: ?route=login');
                exit;
            }
    
    }
    require_once('../app/views/login.php');
    }
    public function register() {
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $fullName = $_POST['FullName'];
            $userName = $_POST['UserName'];
            $pass = $_POST['Pass'];
            $confirmPass = $_POST['ConfirmPass'];          
        
        
        if($pass != $confirmPass){
            $_SESSION['Error']="Mat khau xac nhan khong dung!";
            header('Location: ?route=register');
            exit;
        }

        $hashPass = password_hash($pass, PASSWORD_BCRYPT);
        $isSuccess = User::create($fullName, $userName, $hashPass);
        if($isSuccess)              
            // Redirect to homepage
            header('Location: ?route=login');      
        else 
        {
            $_SESSION['Error'] = "Loi tao tai khoan";
            header('Location: ?route=failure');
        }
        exit;
    }
        require_once('../app/views/register.php');
    }

    function editAvatar(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //upload file
            $isUploaded = $this->uploadImageFile();
            if($isUploaded == 1){
                $avatar = htmlspecialchars( basename( $_FILES["avatar"]["name"]));
                session_start();
                $userId = $_SESSION['UserId'];
                $isSuccess =  User::editAvatar($userId, $avatar);
                if($isSuccess){
                    $_SESSION['Avatar'] = $avatar;
                    header('Location: ?');
                    exit;
                }
                else{
                    die("Error Update User's Avatar!");
                }
            }
            else{
                die("Server's Error");
            }
        }
        require_once('../app/views/edit-avatar.php');
    }

    function uploadImageFile(){
        $target_dir = "../app/images/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
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
        if ($_FILES["avatar"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
            return 1;
        } else {
            // echo "Sorry, there was an error when uploading your file.";
            return 0;
        }
        }
    }

    function checkRole(){
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        }else {
            if (isset($_SESSION['permision']) == true) {
                // Ngược lại nếu đã đăng nhập
                $permission = $_SESSION['permision'];
                // Kiểm tra quyền của người đó có phải là admin hay không
                if ($permission == '0') {
                    // Nếu không phải admin thì xuất thông báo
                    echo "Bạn không đủ quyền truy cập vào trang này<br>";
                    echo "<a href='?'>Click để về lại trang chủ</a>";
                    exit();
                }
            }
        }
    }
    
}
?>