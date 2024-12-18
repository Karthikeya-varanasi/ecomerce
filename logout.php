<?php 
session_start();
session_destroy();
header("Location:login.php?sucess=Succesfully logout. Enter Your details to log in");