<?php
require_once('../app/models/User.php');
require_once('../app/models/Admin.php');

class AccountController
{
    public function logout()
    {
        unset($_SESSION['UserId']);
        unset($_SESSION['Error']);
        unset($_SESSION['cart']);
        unset($_SESSION['role']);
        unset($_SESSION['orderid']);
        unset($_SESSION['pass']);
        header('Location: ?route=login');
        exit;
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $userName = $_POST['UserName'];
            $pass = $_POST['Pass'];
            if (empty($userName) || empty($pass)) {
                $_SESSION['Error'] = "Please fill out your Username & Password";
                header('Location: ?route=login');
                exit;
            }
            $user = User::find($userName);
            $_SESSION['role'] = $user['role'];

            if (!empty($user)) {
                $isSuccess = password_verify($pass, $user['Pass']);
                if ($isSuccess) {
                    if ($user['role'] == 1) {
                        $_SESSION['UserId'] = $user['Id'];
                        $_SESSION['userName'] = $userName;
                        $_SESSION['pass'] = $pass;
                        header('Location: ?route=admin');
                    } else {
                        $_SESSION['userName'] = $userName;
                        $_SESSION['pass'] = $pass;
                        $_SESSION['UserId'] = $user['Id'];
                        header('Location: ?');
                    }
                } else {
                    $_SESSION['Error'] = "Username or Password was wrong";
                    header('Location: ?route=login');
                }
                exit;
            } else {
                $_SESSION['Error'] = "Username or Password was wrong";
                header('Location: ?route=login');
                exit;
            }
        }
        require_once('../app/views/login.php');
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fullName = $_POST['FullName'];
            $userName = $_POST['UserName'];
            $pass = $_POST['Pass'];
            $confirmPass = $_POST['ConfirmPass'];

            if ($pass != $confirmPass) {
                $_SESSION['Error'] = "Mat khau xac nhan khong dung!";
                header('Location: ?route=register');
                exit;
            }

            $hashPass = password_hash($pass, PASSWORD_BCRYPT);
            $isSuccess = User::create($fullName, $userName, $hashPass);
            if ($isSuccess)
                // Redirect to homepage
                header('Location: ?route=login');
            else {
                $_SESSION['Error'] = "Loi tao tai khoan";
                header('Location: ?route=failure');
            }
            exit;
        }
        require_once('../app/views/register.php');
    }

    function showUserInfo()
    {
        $id = $_SESSION['UserId'];
        $user = User::getUser($id);
        require_once('../app/views/userInfo.php');
    }

    function updateUserInfo()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 0) {
            $id = $_GET['idUser'];
            $fullName = $_POST['FullName'];
            $userName = $_POST['UserName'];
            $pass = $_POST['Pass'];
            $confirmPass = $_POST['ConfirmPass'];
            if ($pass != $confirmPass) {
                $_SESSION['Error'] = "Mat khau xac nhan khong dung!";
                header('Location: ?route=edit-user-info');
                exit;
            }
            $hashPass = password_hash($pass, PASSWORD_BCRYPT);
            $isSuccess = User::update($id, $userName, $fullName, $hashPass);
            if ($isSuccess)
                // Redirect to Manage Products Page
                header('Location: ?route=user-info');
            else
                header('Location: ?route=failure');
            exit;
        } else {
            header('Location: ?');
        }
    }

    public function editUserInfo()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 0) {
            require_once('../app/views/editUserInfo.php');
        } else {
            header('Location: ?');
        }
    }

    function uploadImageFile()
    {
        $target_dir = "../app/images/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
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
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
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
}
