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
}
?>
