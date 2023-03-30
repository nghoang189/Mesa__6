<?php
class Product
{
  public static function getAll()
  {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM phieudangkythuctap');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //tao phieu dang ky
  public static function create(
    $hoten,
    $chuyennganh,
    $congty,
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
  ) {
    global $pdo;

    $sql = "INSERT INTO phieudangkythuctap (HoTen, ChuyenNganh, CongTy, Image, Image1, Image2, Image3, 
                                            Image4, Image5, Image6, Image7, Image8, des1, des2, ttdes1, ttdes2, embed) 
            VALUES (:hoten, :chuyennganh, :congty, :image, :image1, :image2, :image3, 
                    :image4, :image5, :image6, :image7, :image8, :des1, :des2, :ttdes1, :ttdes2, :embed);";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':chuyennganh', $chuyennganh);
    $stmt->bindParam(':congty', $congty);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':image1', $image1);
    $stmt->bindParam(':image2', $image2);
    $stmt->bindParam(':image3', $image3);
    $stmt->bindParam(':image4', $image4);
    $stmt->bindParam(':image5', $image5);
    $stmt->bindParam(':image6', $image6);
    $stmt->bindParam(':image7', $image7);
    $stmt->bindParam(':image8', $image8);
    $stmt->bindParam(':des1', $des1);
    $stmt->bindParam(':des2', $des2);
    $stmt->bindParam(':ttdes1', $ttdes1);
    $stmt->bindParam(':ttdes2', $ttdes2);
    $stmt->bindParam(':embed', $embed);

    return $stmt->execute();
  }

  // xóa phiếu đăng ký
  public static function delete($id)
  {
    global $pdo;
    $sql = "DELETE FROM `phieudangkythuctap` WHERE `phieudangkythuctap`.`MaSV` = $id;
            SET @num:= 0;
            UPDATE `phieudangkythuctap` SET `MaSV` = @num:= (@num + 1);
            ALTER TABLE `phieudangkythuctap` AUTO_INCREMENT = 1;";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute();
  }
  // xóa phiếu đăng ký
  public static function update(
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
  ) {
    global $pdo;
    $sql = "UPDATE `phieudangkythuctap` SET `HoTen` = '$name', `ChuyenNganh` = '$price', 
                                            `CongTy` = '$des',`Image` = '$image',
                                            `Image1` = '$image1', `Image2` = '$image2', 
                                            `Image3` = '$image3',`Image4` = '$image4',
                                            `Image5` = '$image5', `Image6` = '$image6', 
                                            `Image7` = '$image7',`Image8` = '$image8',
                                            `des1` = '$des1', `des2` = '$des2', 
                                            `ttdes1` = '$ttdes1',`ttdes2` = '$ttdes2', `embed` = '$embed',   
            WHERE `phieudangkythuctap`.`MaSV` = '$id'";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute();
  }

  public static function find($id)
  {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM phieudangkythuctap WHERE MaSV =:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function search($keyword)
  {
    global $pdo;
    $sql = "SELECT * FROM `phieudangkythuctap` WHERE `HoTen` LIKE '%$keyword%'=:keyword;";
    $q = $pdo->prepare($sql);
    $q->bindValue(':keyword', '%' . $keyword . '%');
    $q->execute();
    $r = $q->fetch(PDO::FETCH_ASSOC);
    return $r;
  }

  public static function createOrder($orderid, $name, $email, $sdt, $state, $city, $address, $addinfor, $total,)
  {
    global $pdo;
    $sql = "INSERT INTO orderlist (orderid, name, email, sdt, state, city, address, addinfor, total) 
                VALUES (:orderid, :name, :email, :sdt, :state, :city, :address, :addinfor, :total);
                SET @num:= 0;
                UPDATE `orderlist` SET `id` = @num:= (@num + 1);
                ALTER TABLE `orderlist` AUTO_INCREMENT = 1;";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':orderid', $orderid);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':sdt', $sdt);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':addinfor', $addinfor);
    $stmt->bindParam(':total', $total);

    $stmt->execute();
    return $orderid;
  }
}