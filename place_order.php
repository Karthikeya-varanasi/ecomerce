<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
session_start();
require_once 'core/conn.php';
include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';  

/*if(empty($_SESSION['user_id'])){
          echo "<script> window.location.href = 'login.php';  </script>";
        exit;
  
    }*/
if(empty($_SESSION['cart'])){
          echo "<script> window.location.href = 'index.php';  </script>";
        exit;
  
    }


$order_no=time();
 $products_count =  count($_SESSION['cart']);

 $total = 0;
 $total_products_quantity = 0;
foreach ($_SESSION['cart'] as $product_id => $product) {
    $total += $product['price'] * $product['quantity'];
    $total_products_quantity = $total_products_quantity+$product['quantity'];
}


$coupon_amount = 0;
if($_SESSION['coupon_status']=="Y"){
    $coupon_amount = $_SESSION['coupon_amount'];
    $coupon_code = $_SESSION['coupon_code'] ;
            
}else{
    $coupon_amount = 0;
    $coupon_code = '' ;
}



 $sub_total = $total;
 

 $fname = $_POST['first_name'];
 $lname = $_POST['last_name'];
 $b_company_name = $_POST['company_name'];
 $b_country = $_POST['b_country']; 
 $b_street_address = $_POST['street_address'];
 $b_city = $_POST['city'];
 $b_state = $_POST['state'];
 $b_pin = $_POST['pin'];
 $b_phone = $_POST['phone'];
 $b_email = $_POST['email'];
 $b_message = $_POST['message'];

if (isset($_POST['ship_bill_different'])) {

     $s_fname = $_POST['first_name'];
 $s_lname = $_POST['last_name'];
 $s_company_name = $_POST['company_name'];
 $s_country = $_POST['b_country']; //TODO
 $s_street_address = $_POST['street_address'];
 $s_city = $_POST['city'];
 $s_state = $_POST['state'];
 $s_pin = $_POST['pin'];
 $s_phone = $_POST['phone'];
 $s_email = $_POST['email'];
 $s_message = $_POST['message'];

}else{
     $s_fname = $_POST['s_first_name'];
 $s_lname = $_POST['s_last_name'];
 $s_company_name = $_POST['s_company_name'];
 $s_country = $_POST['s_country']; //TODO
 $s_street_address = $_POST['s_street_address'];
 $s_city = $_POST['s_city'];
 $s_state = $_POST['s_state'];
 $s_pin = $_POST['s_pin'];
 $s_phone = $_POST['s_phone'];
 $s_email = $_POST['s_email'];
 $s_message = $_POST['s_message'];

}
if($s_country=="India"){

$shipping_cost = 0;
}else{
    // $shipping_cost = 0;// TODO 
    $country_sql = "SELECT * FROM `countries` WHERE country_name='$s_country'";
    $country_query = mysqli_query($conn, $country_sql);
    $country_row = mysqli_fetch_assoc($country_query);
    $shipping_cost =  $country_row['shipping_cost'];


}

// $shipping_cost = $_SESSION['shipping_details']['shipping_cost']; //TODO
 $total_final = $total+$shipping_cost;
 $total_final = $total_final-$coupon_amount;

/* $shipping_country = $_SESSION['shipping_details']['country'];
 $shipping_state = $_SESSION['shipping_details']['state'];
 $shipping_city = $_SESSION['shipping_details']['city'];
 $shipping_pin = $_SESSION['shipping_details']['pin'];*/
  $shipping_country = $s_country;
 $shipping_state = $s_state;
 $shipping_city = $s_city;
 $shipping_pin = $s_pin;




 $payment_method = $_POST['payment_methods'];
 $discount_percentage = 0; // TODO
 $discount_amount = 0; // TODO
 $discount_status = 'N'; //TODO
 $order_status = 'N'; //TODO
 $payment_status = 'N';//TODO
 $user_id = $_SESSION['user_id'];


$sql = "INSERT INTO `orders` ( `order_no`, `products_count`, `sub_total`, `shipping_cost`, `total_final`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_pin`, `fname`, `lname`, `b_company_name`, `b_country`, `b_street_address`, `b_city`, `b_state`, `b_pin`, `b_phone`, `b_email`, `b_message`, `payment_method`, `discount_percentage`, `discount_amount`, `discount_status`, `order_status`, `user_id`,`payment_status`,`products_quantity`,`coupon_amount`,`coupon_code`,`s_first_name`,`s_last_name`,`s_company_name`,`s_street_address`,`s_city`,`s_state`,`s_pin`,`s_phone`,`s_email`,`s_message`,`s_country`) VALUES ( '$order_no', '$products_count', '$sub_total', '$shipping_cost', '$total_final', '$shipping_country', '$shipping_state', '$shipping_city', '$shipping_pin', '$fname', '$lname', '$b_company_name', '$b_country', '$b_street_address', '$b_city', '$b_state', '$b_pin', '$b_phone', '$b_email', '$b_message', '$payment_method', '$discount_percentage', '$discount_amount', '$discount_status', '$order_status', '$user_id','$payment_status','$total_products_quantity','$coupon_amount','$coupon_code','$s_fname','$s_lname','$s_company_name','$s_street_address','$s_city','$s_state','$s_pin','$s_phone','$s_email','$s_message','$s_country')";
    $order_res = mysqli_query($conn, $sql);
    $order_id = mysqli_insert_id($conn);

     $_SESSION['order_id'] = $order_id;
     $_SESSION['order_no'] = $order_no;


    foreach ($_SESSION['cart'] as $product_id => $product) {
        $product_name=$product['name'];
        $product_price=$product['price'];
        $product_quantity = $product['quantity'];

    $order_product_query = "INSERT INTO `order_products` ( `order_id`, `prod_id`, `prod_name`, `prod_price`, `prod_quantity`) VALUES ( '$order_id', '$product_id','$product_name' , '$product_price',$product_quantity )";
        $order_product_res = mysqli_query($conn, $order_product_query);

    }

    $txn_id='O_'.time();

    $request_json = json_encode($_SESSION);

    if($payment_method=='CASH'){
        $total_final = $cash_on_deliver_amount;
    }

    $order_payment_query = "INSERT INTO `payment_trans` ( `order_id`, `amount`, `trans_id`, `payment_status`, `request`, `response`,`user_id`) VALUES ( '$order_id', '$total_final', '$txn_id', 'N', '$request_json', 'N','$user_id');";
        $order_payment_res = mysqli_query($conn, $order_payment_query);




$total_in_paisa = $total_final*100;
require_once 'razorpay-php/Razorpay.php'; // Include the Razorpay PHP SDK

use Razorpay\Api\Api;


$api = new Api($razorpayKeyId, $razorpayKeySecret);

// Create an order
$orderData = [
    'amount' => $total_in_paisa, // Amount in paise (100 paise = 1 rupee)
    'currency' => 'INR',
    'receipt' =>  $txn_id,
    // 'payment_capture' => 1 // Auto capture
];

// var_dump($orderData);
$order = $api->order->create($orderData);

// Display the payment form with order ID

 /*   <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
        <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
        <input type="hidden" name="hidden">*/
?>
<!-- <form action="payment_success.php" method="POST" id="razorpay-form">
    <center style='padding: 25px; color:#fff; font-size: 35px;'>
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo $razorpayKeyId;?>"
                data-amount="<?php echo $order->amount;?>"
                data-currency="<?php echo $order->currency;?>"
                data-order_id="<?php echo $order->id;?>"
                data-buttontext="PAY WITH RAZORPAY"
                data-name="<?php echo $p_company_name;?>"
                data-description="<?php echo "Order No".$order_no;?>"
                data-prefill.name="<?php echo $fname.' '.$lname;?>"
                data-prefill.email="<?php echo $b_email;?>"
                data-theme.color="#F37254"
               >
        </script>
    </center>
        <input type="hidden" value="<?php echo  $order_id;?>" name="order_id">
        <input type="hidden" value="<?php echo  $user_id;?>" name="user_id">
      </form> -->

       
      <!-- Razorpay payment form -->
    <form id="razorpay-form" action="payment_success.php" method="POST"  style='padding: 25px; color:#fff; font-size: 35px;text-align:center'>

        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo $razorpayKeyId; ?>"
                data-amount="<?php echo $order->amount;?>"
                data-currency="<?php echo $order->currency;?>"
                data-order_id="<?php echo $order->id;?>"
                
                data-name="<?php echo $p_company_name;?>"
                data-description="<?php echo $order_id;?>"
                data-prefill.name="<?php echo $fname.' '.$lname;?>"
                data-prefill.email="<?php echo $b_email;?>"
                data-theme.color="#F37254">
                // data-buttontext="PAY WITH RAZORPAY"
        </script>
         <input type="hidden" value="<?php echo  $order_id;?>" name="my_order_id">
         <input type="hidden" value="<?php echo  $order_no;?>" name="my_order_no">
        <input type="hidden" value="<?php echo  $user_id;?>" name="my_user_id">
     
    </form>






    <?php include 'includes/Layout_pages/Footer.php'; ?>
    <?php include 'includes/Handles/footer_script.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        // Function to automatically submit the Razorpay form
       /* function submitRazorpayForm() {
            document.getElementById('razorpay-form').submit();
        }

        // Wait for Razorpay script to load and then submit the form
        window.addEventListener('load', function () {
            submitRazorpayForm();
        });*/
        $("document").ready(function() {
    setTimeout(function() {
        $(".razorpay-payment-button").trigger('click');
    },10);
});

    </script>
</body>
</html>