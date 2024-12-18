<?php

session_start();

require_once '../core/conn.php';
if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = ($_POST['password']);

    $sql = "SELECT * FROM employee WHERE email = '$email'";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);
    if ($row['password'] == $password && $row['status']==1) {
       
    	if ($row['usertype'] == "Super Admin") {   	
       $_SESSION['usertype'] = $row['usertype'];
       $_SESSION['username'] = $srow['username'];
    	header('Location: ../admin/dashboard.php');
    	}elseif ($row['usertype'] == "Admin") {
       $_SESSION['usertype'] = $row['usertype'];
       $_SESSION['username'] = $row['username'];    
    	header('Location: ../admin/dashboard.php');
        }
    	else{
         header("Location:index.php?error=Invalid Login Details");
    	}
    }
    else{
           header("Location:index.php?error=Please Enter Email and Password");
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'adminincude/adminlinks.php' ?>
</head>
<body>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5" id="admin-text">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Hover Boards</h1>
                            </div>
                            <form action method="POST" class="user">
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <?php if (isset($_GET['sucess'])) { ?>
                                <p class="sucess"><?php echo $_GET['sucess']; ?></p>
                            <?php } ?>    
                                <div class="form-group">
                                    <input id="email" type="email"  name="email"  class="form-control form-control-user"
                                        
                                        placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input id="password" name="password" type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger py-3 w-100 mb-4">Sign In</button>
                                
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
</body>
</html>