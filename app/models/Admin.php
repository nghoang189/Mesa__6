<?php

class Admin
{
    public static function find($userName)
    {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM User WHERE UserName =:userName');
        $stmt->bindParam(':userName', $userName);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAll()
    {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM user');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($id, $userName, $fullName, $role)
    {
        global $pdo;
        $sql = "UPDATE `user` SET `UserName` = '$userName', `FullName` = '$fullName',`role` = '$role'  WHERE `user`.`Id` = '$id'";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute();
    }

    public static function getAllOrderList()
    {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM orderlist');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public static function create($fullName, $userName, $hashPass, $role)
    {
        global $pdo;

        $sql = "INSERT INTO User (UserName, Pass, FullName, role) VALUES (:userName, :pass, :fullName, :role)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':pass', $hashPass);
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }
}
