<?php
session_start();
require_once '../core/conn.php';
if (isset($_SESSION['usertype']) ) {
$utype = $_SESSION['usertype'];
if ($utype == "1") {
	$sql = "SELECT * FROM menu WHERE usertype = '1'";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);
}

$order_id = $_GET['order_id'];
$order_sql = "SELECT * FROM orders WHERE id = '$order_id'";
    $order_res = mysqli_query($con,$order_sql);
    $order_row = mysqli_fetch_array($order_res);



if(isset($_REQUEST['order_submit'])){
    $order_id = $_REQUEST['order_id'];
    $order_status = $_REQUEST['order_status'];
    

    $sql = "UPDATE orders SET order_status  = '$order_status' WHERE id = $order_id";
    mysqli_query($conn, $sql);

    
}



include 'functions/admin-logic.php';
include 'adminincude/head.php';
?>


<div class="col-xl-12">
<div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center  justify-content-between">
            <h6 class="m-0 font-weight-bold ">Orders No.<?php echo $order_row['order_no'];?>        <span class='text-right  '><?php 
             
                    switch (trim($order_row['order_status'])) {
                        case 'N':
                            echo 'Not Placed';
                            break;
                             case 'P':
                            echo '<b class="btn-primary">Order Placed</b>';
                            break;
                             case 'PR':
                            echo '<b class="btn-primary">processing</b>';
                            break;
                             case 'D':
                            echo '<b class="btn-success">Delivered</b>';
                            break;
                        
                        default:
                            echo '-';
                            break;
                    }

                    ?> </b></h6>
            
        </div>
        <div class="card-body">
            <div class='row'>
                    <div class='col-md-3'>Payment Method: </div>
                    <div class='col-md-3'><?php echo $order_row['payment_method'];?> </div>
                     <div class='col-md-3'>Paid Amount: </div>
                    <div class='col-md-3'><?php echo $order_row['paid_amount'];?> </div>
                    

                </div>
            
                <div class='row'>
                    <div class='col-md-3'>Order Amount: </div>
                    <div class='col-md-3'><?php echo $order_row['total_final'];?> </div>
                    <div class='col-md-3'>Shipping Details: </div>
                    <div class='col-md-3'><?php echo $order_row['shipping_country'].','.$order_row['shipping_state'].','.$order_row['shipping_city'].','.$order_row['shipping_pin'];?></div>
                </div>

                     

                <div class='row'>
                    <div class='col-md-3'>Phone:<br>Email: </div>
                    <div class='col-md-3'><?php echo $order_row['b_phone'];?><br><?php echo $order_row['b_email'];?> </div>
                    
                    <div class='col-md-3'>Billing Details: </div>
                    <div class='col-md-3'><?php echo $order_row['fname'].' '.$order_row['lname'].'<br>'.$order_row['b_company_name'].'<br>'.$order_row['b_country'].','.$order_row['b_street_address'].','.$order_row['b_city'].','.$order_row['b_state'].','.$order_row['b_pin'];?></div>

                </div>



                <div class='row'>
                    <div class='col-md-3'>Message: </div>
                    <div class='col-md-3'><?php echo $order_row['b_message'];?> </div>
                    <div class='col-md-3'>Payment Status: </div>
                    <div class='col-md-3'><?php 
                     switch (trim($order_row['payment_status'])) {
                        case 'N':
                            echo '<b color="red">Not Paid</b>';
                            break;
                             case 'Y':
                            echo '<b color="green"> Paid</b> ';
                            
                            break;
                        
                        default:
                            echo '-';
                            break;
                    }
                    ;?> </div>

                </div>


                <div class='row'>
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
                <?php
                $i = 1;
               
                 $sql = "SELECT * FROM order_products WHERE order_id = '$order_id' ";
            $res = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res)){

                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['prod_name'];?></td>
                    <td><?php echo $row['prod_price'];?></td>
                    <td><?php echo $row['prod_quantity'];?></td>
                    <td><?php 
             
                    echo $row['prod_price']*$row['prod_quantity'];

                    ?></td>
                   
                </tr>
                <?php $i++;} ?>
            </tbody>
        </table>
                </div>


<?php

if($order_row['order_status']!='D'){
?>

                 <div class="card-header py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Update Order Status</h6>
            <div >
                    
                        <form action="#" method="POST" >
                           <select name='order_status' required='required' >
                            <option value=''>Select</option>
                             <option value='PR'>Processing</option>
                            
                            <option value='D'>Delivered</option>
                           </select>
                           <input type='hidden' name='order_id' value='<?php echo $order_id;?>'/>
                            <button type="submit" name="order_submit" class="btn btn-primary" >Update Order Status</button>
                        </form>
            </div>
        </div>

    <?php  } ?>



                
           
        </div>
    </div>

</div>



<?php 
}
include 'adminincude/footer.php';
?>