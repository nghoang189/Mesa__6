<?php
require_once('../app/models/Product.php');
require_once('../app/models/Admin.php');

class ProductController
{
    // Add Product
    public function addProduct()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            require_once('../app/views/addProducts.php');
        } else {
            header('Location: ?');
        }
    }
    // Edit Product Information
    public function editProduct()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            require_once('../app/views/editProduct.php');
        } else {
            header('Location: ?');
        }
    }
    // Show Products List
    public function showProduct()
    {
        $danhSachPhieuDK = Product::getAll();
        require_once('../app/views/shop.php');
    }

    function createProduct()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $name = $_POST['hoten'];
            $price = $_POST['chuyennganh'];
            $des = $_POST['note'];
            $des1 = $_POST['note1'];
            $des2 = $_POST['note2'];
            $ttdes1 = $_POST['ttdes1'];
            $ttdes2 = $_POST['ttdes2'];
            $embed = $_POST['embed'];
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // Upload Image File
                $isUploaded = $this->uploadImageFile();
                if ($isUploaded == 1) {
                    $image = htmlspecialchars(basename($_FILES["prd-picture"]["name"]));
                    $image1 = htmlspecialchars(basename($_FILES["prd-picture1"]["name"]));
                    $image2 = htmlspecialchars(basename($_FILES["prd-picture2"]["name"]));
                    $image3 = htmlspecialchars(basename($_FILES["prd-picture3"]["name"]));
                    $image4 = htmlspecialchars(basename($_FILES["prd-picture4"]["name"]));
                    $image5 = htmlspecialchars(basename($_FILES["prd-picture5"]["name"]));
                    $image6 = htmlspecialchars(basename($_FILES["prd-picture6"]["name"]));
                    $image7 = htmlspecialchars(basename($_FILES["prd-picture7"]["name"]));
                    $image8 = htmlspecialchars(basename($_FILES["prd-picture8"]["name"]));
                } else {
                    die("Server's Error");
                }
            }
            $isSuccess = Product::create(
                $name,
                $price,
                $des,
                $image,
                $image1,
                $image2,
                $image3,
                $image4,
                $image5,
                $image6,
                $image7,
                $image8,
                $des1,
                $des2,
                $ttdes1,
                $ttdes2,
                $embed
            );
            if ($isSuccess)
                // Redirect to Manage Products Page
                header('Location: ?route=manage-prd');
            else
                header('Location: ?route=failure');
            exit;
        } else {
            header('Location: ?');
        }
    }
    function updateProduct()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $id = $_GET['idPhieu'];
            $name = $_POST['hoten'];
            $price = $_POST['chuyennganh'];
            $des = $_POST['note'];
            $des1 = $_POST['note1'];
            $des2 = $_POST['note2'];
            $ttdes1 = $_POST['ttdes1'];
            $ttdes2 = $_POST['ttdes2'];
            $embed = $_POST['embed'];

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //Upload File
                $isUploaded = $this->uploadImageFile();
                if ($isUploaded == 1) {
                    $image = htmlspecialchars(basename($_FILES["prd-picture"]["name"]));
                    $image1 = htmlspecialchars(basename($_FILES["prd-picture1"]["name"]));
                    $image2 = htmlspecialchars(basename($_FILES["prd-picture2"]["name"]));
                    $image3 = htmlspecialchars(basename($_FILES["prd-picture3"]["name"]));
                    $image4 = htmlspecialchars(basename($_FILES["prd-picture4"]["name"]));
                    $image5 = htmlspecialchars(basename($_FILES["prd-picture5"]["name"]));
                    $image6 = htmlspecialchars(basename($_FILES["prd-picture6"]["name"]));
                    $image7 = htmlspecialchars(basename($_FILES["prd-picture7"]["name"]));
                    $image8 = htmlspecialchars(basename($_FILES["prd-picture8"]["name"]));
                } else {
                    die("Server's Error");
                }
            }
            $isSuccess = Product::update(
                $id,
                $name,
                $price,
                $des,
                $image,
                $image1,
                $image2,
                $image3,
                $image4,
                $image5,
                $image6,
                $image7,
                $image8,
                $des1,
                $des2,
                $ttdes1,
                $ttdes2,
                $embed
            );
            if ($isSuccess)
                // Redirect to Manage Products Page
                header('Location: ?route=manage-prd');
            else
                header('Location: ?route=failure');
            exit;
        } else {
            header('Location: ?');
        }
    }

    function deleteProduct()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else if ($_SESSION['role'] == 1) {
            $id = $_GET['idPhieu'];
            $isSuccess = Product::delete($id);
            if ($isSuccess)
                // Redirect to Manage Products Page
                header('Location: ?route=manage-prd');
            else
                header('Location: ?route=failure');
            exit;
        } else {
            header('Location: ?');
        }
    }

    function addCart()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Redirect to Login Page if User haven't Login yet
            header('Location: ?route=login');
        } else if (isset($_GET['idPhieu'])) {
            $masoPhieu = $_GET['idPhieu'];
            $Product = Product::find($masoPhieu);
            // $count = 0;
            if (!empty($_SESSION['cart'])) {
                $acol = array_column($_SESSION['cart'], 'idPhieu');

                if (in_array($masoPhieu, $acol)) {
                    $_SESSION['cart'][$masoPhieu]['soluong'] += 1;
                } else {
                    $item = [
                        'idPhieu' => $_GET['idPhieu'],
                        'soluong' => 1,
                        'ten' => $Product['HoTen'],
                        'image' => $Product['Image'],
                        'price' => $Product['ChuyenNganh']
                    ];
                    $_SESSION['cart'][$masoPhieu] = $item;
                }
            } else {
                $item = [
                    'idPhieu' => $_GET['idPhieu'],
                    'soluong' => 1,
                    'ten' => $Product['HoTen'],
                    'image' => $Product['Image'],
                    'price' => $Product['ChuyenNganh']
                ];
                $_SESSION['cart'][$masoPhieu] = $item;
            }
            header('Location: ?route=view-cart');
            exit;
        } else {
            header('Location: ?route=error');
            exit;
        }
    }

    function viewCart()
    {
        require_once('../app/views/cart.php');
    }

    function deleteCart()
    {
        $id = $_GET['idPhieu'];
        unset($_SESSION['cart'][$id]);
        header('Location: ?route=view-cart');
        exit;
    }

    function deleteAllCart()
    {
        unset($_SESSION['cart']);
        header('Location: ?route=view-cart');
        exit;
    }

    function deleteAjax()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $idPhieu = $_POST['id'];
            $isSuccess = Product::delete($idPhieu);
            echo json_encode(['success' => $isSuccess]);
        }
    }

    function uploadImageFile()
    {
        $target_dir = "../app/images/";
        $target_file = $target_dir . basename($_FILES["prd-picture"]["name"]);
        $target_file1 = $target_dir . basename($_FILES["prd-picture1"]["name"]);
        $target_file2 = $target_dir . basename($_FILES["prd-picture2"]["name"]);
        $target_file3 = $target_dir . basename($_FILES["prd-picture3"]["name"]);
        $target_file4 = $target_dir . basename($_FILES["prd-picture4"]["name"]);
        $target_file5 = $target_dir . basename($_FILES["prd-picture5"]["name"]);
        $target_file6 = $target_dir . basename($_FILES["prd-picture6"]["name"]);
        $target_file7 = $target_dir . basename($_FILES["prd-picture7"]["name"]);
        $target_file8 = $target_dir . basename($_FILES["prd-picture8"]["name"]);

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
        if (file_exists($target_file) || file_exists($target_file1) || file_exists($target_file2) || file_exists($target_file3)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["prd-picture"]["size"] > 500000) {
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
            if (move_uploaded_file($_FILES["prd-picture"]["tmp_name"], $target_file)) {
                if (move_uploaded_file($_FILES["prd-picture1"]["tmp_name"], $target_file1)) {
                    if (move_uploaded_file($_FILES["prd-picture2"]["tmp_name"], $target_file2)) {
                        if (move_uploaded_file($_FILES["prd-picture3"]["tmp_name"], $target_file3)) {
                            if (move_uploaded_file($_FILES["prd-picture4"]["tmp_name"], $target_file4)) {
                                if (move_uploaded_file($_FILES["prd-picture5"]["tmp_name"], $target_file5)) {
                                    if (move_uploaded_file($_FILES["prd-picture6"]["tmp_name"], $target_file6)) {
                                        if (move_uploaded_file($_FILES["prd-picture7"]["tmp_name"], $target_file7)) {
                                            if (move_uploaded_file($_FILES["prd-picture8"]["tmp_name"], $target_file8)) {
                                                // echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
                                                return 1;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                // echo "Sorry, there was an error when uploading your file.";
                return 0;
            }
        }
    }

    function checkOut()
    {
        if (isset($_SESSION['UserId']) == false) {
            // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
            header('Location: ?route=login');
        } else {
            require_once('../app/views/checkout.php');
        }
    }

    function detailProduct()
    {
        $id = $_GET['idPhieu'];
        $product = Product::getAll();
        require_once('../app/views/detailProduct.php');
    }

    function searchProduct()
    {
        $keyword = $_GET['keyword'];
        $product = Product::search($keyword);
        require_once('../app/views/shop.php');
    }

    function createOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_SESSION['cart'])) {
                $orderid = "mystore" . rand(0, 999999);
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sdt = $_POST['phone'];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $address = $_POST['address'];
                $addinfor = $_POST['note'];
                $total = $_POST['total'];
                $iddh = Product::createOrder($orderid, $name, $email, $sdt, $state, $city, $address, $addinfor, $total);
                $_SESSION['orderid'] = $iddh;
                foreach ($_SESSION['cart'] as $cart) {
                    Admin::createOrderDetail($iddh, $cart['idPhieu'], $cart['ten'], $cart['soluong'], $cart['price'], $cart['image']);
                }
                unset($_SESSION['cart']);
                $getShowCart = Product::getShowCart($iddh);
                require_once('../app/views/order.php');
            }
        }
    }
}
