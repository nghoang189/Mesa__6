<?php
class User {
    public static function create($fullName, $userName, $hashPass) {
        global $pdo;
        
        $sql = "INSERT INTO User (UserName, Pass, FullName) VALUES (:userName, :pass, :fullName)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':pass', $hashPass);
    
        return $stmt->execute();
      }
    
    public static function editAvatar($userId, $avatar) {
        global $pdo;
        
        $sql = "UPDATE User SET Avatar =:a WHERE Id=:i";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':a', $avatar);
        $stmt->bindParam(':i', $userId);
    
        return $stmt->execute();
      }
    
    public static function find($userName)
    {
      global $pdo;
      $stmt = $pdo->prepare('SELECT * FROM User WHERE UserName =:userName');
      $stmt->bindParam(':userName', $userName);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($userId) {
      global $pdo;
      $sql = "DELETE FROM `user` WHERE `user`.`Id` = $userId;
              SET @num:= 0;
              UPDATE `user` SET `Id` = @num:= (@num + 1);
              ALTER TABLE `user` AUTO_INCREMENT = 1;";
      $stmt = $pdo->prepare($sql);
      return $stmt->execute();
    }

}
?>
