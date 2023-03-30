<?php

class Admin{
    public static function find($userName)
    {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM User WHERE UserName =:userName');
        $stmt->bindParam(':userName', $userName);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function checkUser($userName, $pass)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM  `user` WHERE UserName ='".$userName."' AND Pass='".$pass."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
}