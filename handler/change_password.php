<?php


 session_start();
 
    require('../inc/db.php');

     if(isset($_POST['submit'])){

        
        $old_password =filter_var($_POST['old_password'],FILTER_SANITIZE_STRING);
        $new_password =filter_var($_POST['new_password'],FILTER_SANITIZE_STRING);

        $confirm_password =filter_var($_POST['confirm_password'],FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM users WHERE email = ?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$_SESSION['user_email']]);

        $data = $stmt->fetchObject();


        if($data){

            $check=password_verify($old_password,$data->password);
            if(!$check){

                // echo "True";
                // die;

                if($new_password === $confirm_password){
                
                    $password =password_hash($_POST['new_password'],PASSWORD_DEFAULT);

                    echo $password;


                //     $sql = "UPDATE users SET password = ?  WHERE email = ?";

                //     $stmt = $conn -> prepare($sql);

                //     $stmt -> execute([$password,$data->email]);

                //    if($stmt){
                //       echo "true";

                //    }
                //    else
                //    {
                //       echo "false";
                //    }

                
                //     header("location:../show-data.php");
                //     die();
                }
                else
                {
                    $_SESSION['error']="Password Not The Same";
                }

            }else{
                    
                $_SESSION['error']="Password Not Correct";
                

            }

        }else{

            $_SESSION['error']="Data Not Correct";
        }

    }

   header("location:../change_password.php");








?>