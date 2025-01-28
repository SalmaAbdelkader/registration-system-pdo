<?php

      $host="localhost";
      $user = "root";
      $pass="";
      $db="registration";


      try{

         $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
         $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      //    echo "connected successfully";

      }catch(PDOException $e ){

            echo "Error".$e->getMessage();
      }


   



?>