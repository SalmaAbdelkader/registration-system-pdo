<?php
      include ('./inc/db.php');


      class user
      {
        public static function getAllUser(){

        global $conn;
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);

      }

    }


?>