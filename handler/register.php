<?php
 session_start();
 
    require('../inc/db.php');

     if(isset($_POST['submit'])){

        $name =filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $email =filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $mobile =filter_var($_POST['mobile'],FILTER_SANITIZE_STRING);
        $password =md5(filter_var($_POST['password'],FILTER_SANITIZE_STRING));



        $sql = "INSERT INTO users (name,email,phone,password) VALUES(?,?,?,?)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$name,$email,$mobile,$password]);

        $_SESSION['success'] = "Data Inserted";

        header("location:../login.php");



     }
         // header("location:../register.php");











?>