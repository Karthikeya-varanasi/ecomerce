<?php

session_start();
require_once './../../core/conn.php';

if(@$_POST['action']=="update_cart")
{
    $product_id = $_POST['prod_id'];
     $prodectqtyhidden = $_POST['prod_qty'];
    

    // Check if product already exists in cart, if so, update quantity
     if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']  =  $prodectqtyhidden;
    }

    if($prodectqtyhidden<=0){
         unset($_SESSION['cart'][$product_id]);
    }
    echo 201;

    
}



?>