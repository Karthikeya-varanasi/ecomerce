<?php

session_start();
require_once '../core/conn.php';

$id=$_GET['id'];
$prodect_status=$_GET['prodect_status'];

$q="update a_products set prodect_status=$prodect_status where id=$id ";


$dd = mysqli_query($con,$q);


header('location:prodects.php');



?>