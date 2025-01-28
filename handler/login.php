<?php


//  session_start();
      
//     require('../inc/db.php');

//      if(isset($_POST['submit'])){

//         $email =filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
//         $password =filter_var($_POST['password'],FILTER_SANITIZE_STRING);


//         $sql = "SELECT * FROM users WHERE email = ?";

//         $stmt = $conn->prepare($sql);

//         $stmt->execute([$email]);

//         $data = $stmt->fetchObject();


//         if($data){

//              $password_hashed = password_hash($password,PASSWORD_DEFAULT);

//              echo $password_hashed ."<br>".$data->password;die;

//             $check=password_verify($password_hashed,$data->password);
//             if($check){

//                 echo "true";die;
//                 $_SESSION['user_id']=$data->id;
//                 $_SESSION['user_name']=$data->name;
//                 $_SESSION['user_email']=$data->email;
//                 $_SESSION['user_phone']=$data->phone;

//                 header("location:../index.php");

//             }else{
                    
//                 $_SESSION['error']="Email or Password are Correct";
//             }

//         }else{

//             $_SESSION['error']="Data Not Correct";
//         }

//     }




//////////////////////////////////////////////////////////////////////////////////////////////////



session_start(); 
include "../inc/db.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM `users` WHERE TRIM(`email`) ='$email' AND TRIM(`password`)='$pass' ";

        $values = array($email , $pass);

		$stmt = $conn->prepare($sql);

		
        $stmt->execute();
	
        // $stmt->execute(array('email' => $email, 'password' => $pass));

        $result= $stmt->fetchAll();
		$result = array_shift($result);

		if ($result){
             
            if ($result['email'] === $email && $result['password'] === $pass) {
				// echo "yes";die;
            	$_SESSION['email'] = $result['email'];
            	$_SESSION['name'] = $result['name'];
            	 $_SESSION['phone'] = $result['phone'];
            	$_SESSION['id'] = $result['id'];
            	header("Location: ../show-data.php");
		        exit();
            }else{
				header("Location:../login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location:../login.php?error=Incorect Data");
	        exit();
		}
	}
	
}else{
	header("Location:../login.php?error=hkjhjkhkh");
	exit();
}





?>