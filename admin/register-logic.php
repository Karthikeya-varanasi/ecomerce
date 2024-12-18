<?php

require_once '../core/conn.php';



if (isset($_POST['uname'])  && isset($_POST['surname']) && isset($_POST['email'])
    && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['mobile'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$surname = validate($_POST['surname']);
   $email = validate( $_POST['email']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
   $mobile = validate( $_POST['mobile']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: register.php?error=User Name is required&$user_data");
	    exit();
	}	else if(empty($email)){
      header("Location: register.php?error=Name is required&$user_data");
     exit();
 }
   else if(empty($pass)){
        header("Location: register.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: register.php?error=Re Password is required&$user_data");
	    exit();
	}

	/*else if(empty($surname)){
        header("Location: register.php?error=Name is required&$user_data");
	    exit();
	}else if(empty($mobile)){
      header("Location: register.php?error=Name is required&$user_data");
     exit();
 }
*/
	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        // $pass = md5($pass);
        $pass = password_hash($pass, PASSWORD_BCRYPT);


	    $sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../register.php?error=The Email is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, surname, email, password, mobile ) VALUES('$uname', '$surname', '$email', '$pass', '$mobile')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../login.php?success=Your account has been created successfully Log in to your account ");
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: register.php");
	exit();
}