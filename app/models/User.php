<?php
class User
{

  // Add User
  public static function create($fullName, $userName, $hashPass)
  {
    global $pdo;

    $sql = "INSERT INTO User (UserName, Pass, FullName) VALUES (:userName, :pass, :fullName)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':fullName', $fullName);
    $stmt->bindParam(':userName', $userName);
    $stmt->bindParam(':pass', $hashPass);

    return $stmt->execute();
  }

  // Find User
  public static function find($userName)
  {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM User WHERE UserName =:userName');
    $stmt->bindParam(':userName', $userName);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Delete User
  public static function delete($userId)
  {
    global $pdo;
    $sql = "DELETE FROM `user` WHERE `user`.`Id` = $userId;
              SET @num:= 0;
              UPDATE `user` SET `Id` = @num:= (@num + 1);
              ALTER TABLE `user` AUTO_INCREMENT = 1;";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute();
  }

  public static function getUser($id)
  {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM user WHERE Id="' . $id . '"');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Update User
  public static function update($id, $userName, $fullName, $pass)
  {
    global $pdo;
    $sql = "UPDATE `user` SET `UserName` = '$userName', `FullName` = '$fullName',`Pass` = '$pass'  WHERE `user`.`Id` = '$id'";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute();
  }
}
