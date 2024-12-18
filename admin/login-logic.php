<?php

session_start();
require_once '../core/conn.php';

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
		header("Location: ../login.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        // $pass = md5($pass);

        
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

			$hashedPasswordFromDB = $row['password'];





            if ($row['usertype'] == "Customer" && password_verify($pass, $hashedPasswordFromDB)) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['user_id'] = $row['user_id'];
            	$_SESSION['usertype'] = $row['usertype'];
            	$_SESSION['surname'] = $row['surname'];
            	$user_data = 'user_name='. $_SESSION['user_name'].  '&surname='. $_SESSION['surname'];
            	header("Location: ../index.php?success=Your have successfully Logedin$user_data");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}