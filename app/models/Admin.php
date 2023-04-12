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
