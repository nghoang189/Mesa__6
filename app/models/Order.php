<?php

class Order
{
    public static function getAllOrderList()
    {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM orderlist');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create Order
    public static function createOrder($orderid, $userid, $name, $email, $sdt, $state, $city, $address, $addinfor, $total,)
    {
        global $pdo;
        $sql = "INSERT INTO orderlist (orderid, userid ,name, email, sdt, state, city, address, addinfor, total) 
                VALUES (:orderid, :userid, :name, :email, :sdt, :state, :city, :address, :addinfor, :total);
                SET @num:= 0;
                UPDATE `orderlist` SET `id` = @num:= (@num + 1);
                ALTER TABLE `orderlist` AUTO_INCREMENT = 1;";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':orderid', $orderid);
        $stmt->bindParam(':userid', $userid);
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

    public static function createOrderDetail($orderid, $userid, $prdid, $prdname, $quantity, $unit, $image)
    {
        global $pdo;

        $sql = "INSERT INTO orderdetail (orderid, userid ,prdid, prdname, quantity, unit, image) 
                VALUES (:orderid, :userid,:prdid, :prdname, :quantity, :unit, :image);
                SET @num:= 0;
                UPDATE `orderdetail` SET `id` = @num:= (@num + 1);
                ALTER TABLE `orderdetail` AUTO_INCREMENT = 1;";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':orderid', $orderid);
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':prdid', $prdid);
        $stmt->bindParam(':prdname', $prdname);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':unit', $unit);
        $stmt->bindParam(':image', $image);

        return $stmt->execute();
    }

    public static function getOrderDetail($id)
    {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM orderdetail WHERE orderid="' . $id . '"');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
