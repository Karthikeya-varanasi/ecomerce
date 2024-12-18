<?php
session_start();
require_once 'core/conn.php';
require 'mail_class/PHPMailerAutoload.php';


 $order_id = $_SESSION['order_id'];
  $user_id = $_SESSION['user_id'];



// Include Razorpay PHP SDK
require_once 'razorpay-php/Razorpay.php';

use Razorpay\Api\Api;



// Initialize Razorpay API
$api = new Api($razorpayKeyId, $razorpayKeySecret);

// Get the POST data sent by Razorpay
$queryString = file_get_contents('php://input');
parse_str($queryString, $data);



// Get payment id and order id from the data
 $paymentId = $data['razorpay_payment_id'];
$orderId = $data['razorpay_order_id'];

// Fetch payment details
$payment = $api->payment->fetch($paymentId);
$status = $payment->status;
 $amount = ($payment->amount)/100;
  $invoice_id = $payment->invoice_id;
  $order_id_fetch = $payment->description;
// var_dump($data);

// Process the payment details here
// For example, update your database with payment status

// Send a 200 OK response to Razorpay
http_response_code(200);

 if ($status === 'captured' || $status === 'authorized') {
       
 	$order_status = "P";
 	 $payment_status = "Y";
 	 $order_sql = "UPDATE orders SET order_status  = '$order_status', payment_status = '$payment_status', rpay_payment_id = '$paymentId', rpay_order_id = '$orderId', rpay_invoice_id = '$invoice_id',paid_amount='$amount' WHERE id = $order_id_fetch";
    mysqli_query($conn, $order_sql);

		$response =  json_encode($data);
        $user_id = $data['my_user_id'];

        // $user_query = "SELECT * FROM users WHERE user_id = $user_id";
        // $user_res = mysqli_query($conn, $user_query);
        // $user_row = mysqli_fetch_array($user_res);


      $order_payment_sql = "UPDATE payment_trans SET payment_status  = '$payment_status ', response = '$response' WHERE order_id = $order_id_fetch";
    mysqli_query($conn, $order_payment_sql);

unset($_SESSION['cart']);
unset($_SESSION['coupon_status']);
unset($_SESSION['coupon_amount']);
unset($_SESSION['shipping_details']);
 $msg  = "Payment was successful! Order No.".$data['my_order_no'];






 $order_sql = "SELECT * FROM orders WHERE id = '$order_id_fetch' ";
            $order_res = mysqli_query($con,$order_sql);
            $order_row = mysqli_fetch_array($order_res);
    // function send_mail_schedule($connection,$to,$nameto,$cc,$subject,$message,$mail_no,$mail_type,$recepient_id,$message_to,$message_from){

    $to=$order_row['b_email'];
    $nameto=$order_row['fname'].' '.$order_row['lname'];
    $cc_arr=array();
    $subject='Order Details'.$data['my_order_no'];




// Sample order details
$orderDetails = [
    'order_id' => $data['my_order_no'],
    'customer_name' => $order_row['fname'].' '.$order_row['lname'],
    'customer_email' => $order_row['b_email'],

];

$orderdetails_menu = '';


                $i = 1;
                $user_id = $_SESSION['user_id'];
                
                  switch (trim($order_row['order_status'])) {
                        case 'N':
                            $order_status = 'Not Placed';
                            break;
                            case 'P':
                            $order_status =  'Order Placed';
                            break;
                            case 'PR':
                            $order_status =  'Processing';
                            break;
                             case 'D':
                            $order_status = 'Delivered';
                            break;
                        
                        default:
                            $order_status = '-';
                            break;
                    }

                ?>
                <?php $orderdetails_menu.="<tr>
                   
                    <td>".$order_row['order_no']."</td>
                    <td>".$order_row['products_quantity']."</td>
                    <td>".$order_row['total_final']."</td>
                    <td>".$order_row['coupon_amount']."</td>
                    <td>".$order_status."</td>
                    <td>".$order_row['payment_method']."</td>
                    <td>".$order_row['paid_amount']."</td>
                    <td>".date('d-m-Y',strtotime($order_row['created_by']))."</td>
                </tr>";

                 $i++;
             // } 


$product_detail = '';

                $pr_i = 1;
               
                 $sql = "SELECT * FROM order_products WHERE order_id = '$order_id_fetch' ";
            $res = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res)){

                
                $product_detail.='<tr>
                    <td>'.$pr_i.'</td>
                    <td>'.$row['prod_name'].'</td>
                    <td>'.$row['prod_price'].'</td>
                    <td>'.$row['prod_quantity'].'</td>
                    <td>'.$row['prod_price']*$row['prod_quantity'].'</td>
                   
                </tr>';
                 $pr_i++;} 
               


// Email template
 $email_body_msg = '
<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        .container {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            width: 600px;
        }
        .header {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }
        .content {
            margin: 20px 0;
        }
        .footer {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank you for your order!</h1>
        </div>
        <div class="content">
            <p>Dear ' . $orderDetails['customer_name'] . ',</p>
            <p>Thank you for your purchase. Here are your order details:</p>
            <table>
                <tr>
                     
                    <th>Order no</th>
                    <th>Total Items </th>
                    <th>Total Amount</th>
                    <th>Coupon Amount</th>
                    <th>Order Status</th>
                    <th>Payment Mode</th>
                    <th>Paid Amount</th>
                    <th>Order Date</th>
                   
                </tr>
                
                 ' . $orderdetails_menu . '
            </table>
                <table>
            <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Amount</th>
                    

                </tr>
            </thead>

            <tbody>
                '.$product_detail.'
            </tbody>
        </table>
            <p>We hope you enjoy your purchase! If you have any questions, feel free to contact us.</p>
        </div>
        <div class="footer">
            <p>&copy; ' . date('Y') . ' '.$p_company_name.'. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
';


    
        $mail = new PHPMailer;
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        // 3 = Enable verbose debug output
        // 4 = server and client debug output
        $mail->SMTPDebug = 0;             
        $mail->Debugoutput = 'html';                               

        $mail->isSMTP();                                      // Set mailer to use SMTP

        //SMTP
        // $mail->Host = 'smtpout.secureserver.net';  // Specify main and backup SMTP servers
        // $mail->SMTPAuth = true;                               // Enable SMTP authentication
        // $mail->Username = EMAIL;                 // SMTP username
        // $mail->Password = PASS;                           // SMTP password
        // $mail->Port = 465;                                    // TCP port to connect to
        // $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        //SMTP



        //GMAIL
         $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username =EMAIL;
    $mail->Password = PASS; // Use an App Password instead of your Google account password
    $mail->SMTPSecure = 'tls';
     $mail->Port = 587;
     //$mail->Port = 25;
    ////GMAIL




        $mail->setFrom(EMAIL, $p_company_name);
        $mail->addAddress($to, $nameto);               // Name is optional
            $mail->addAddress($admin_mail, $p_company_name.'Admin'); // Add a second recipient

        $mail->addReplyTo(EMAIL);
        foreach($cc_arr as $ccemail){
            $mail->addCC($ccemail);
        }
        //$mail->addBCC('bcc@example.com');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $email_body_msg;               //An HTML or plain text message body
        if($mail->Send()){

            //save in db
        }


echo $email_body_msg;
    exit;



 //TODO SENT MAIL TO ADMIN AND USER

        echo "<script> 
        alert('".$msg."')
        window.location.href = 'my-orders.php';  </script>";



    } else {
        $msg =  "Payment was not successful. Status: $status";

        echo "<script> 
        alert('".$msg."')
        window.location.href = 'cart.php';  </script>";
    }

exit;




?>