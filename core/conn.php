<?php 
$server = "localhost"; 
$username = "u417506272_karthik";
$password = "CP46lXPQnm0+";
$db = "u417506272_megatronindia";                     
$con = mysqli_connect($server,$username,$password,$db);
// $con = mysqli_connect($server, $username, $password, $db );
// if($con){
// echo "connected";
// }

// else{
// echo "no connection";
// }
 
ini_set("display_errors", "off");  // TODO
// error_reporting(0);
// $conn = mysqli_connect("localhost", "root", "", "hoverboards" );
$conn = mysqli_connect($server, $username, $password, $db );

if(!$conn){
    echo "<h3 class='container bg-dark  p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
}


// function to connect and execute the query
function filterTable($query)
{
    global $con;
    // $connect = mysqli_connect("localhost", "root", "", "hoverboards");
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
}


/*$conn = mysqli_connect("localhost", "root", "", "hoverboards" );

if(!$conn){
    echo "<h3 class='container bg-dark  p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
}*/



$razorpayKeyId = 'rzp_live_GfOq5sXpLpuapn';
$razorpayKeySecret = 'xqC5oq4h4zKqaOFadY6F6sW3';







$p_company_name = 'MEGATRON';

$cash_on_deliver_amount = '1500';

$coupon_min_amount = 10000;


    
    
    
$admin_mail = 'megatronnindia@gmail.com';
@define('EMAIL', 'megatronnindia@gmail.com');
    // @define('PASS', 'uxld zhxp nhjv sdku');
@define('PASS', 'lgqp jprc skby isfd');
?>
