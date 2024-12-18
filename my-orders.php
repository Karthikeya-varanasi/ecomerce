<?php 
    
session_start();
    require_once 'core/conn.php';
    if (isset($_SESSION['usertype']) ) {
        $utype = $_SESSION['usertype'];
        if ($utype == "2") {
            $sql = "SELECT * FROM menu WHERE usertype = '2'";
            $res = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($res);
        }
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';  
   
?>
<div class="pagetitle">
        <div class="container-fluidd">
          <div class="userorder-data">
            <div class="userdetails">
                <h1>My Orders </h1>
                <!-- <p>Welcome to cart</p> -->
            </div>
            
          </div>
        </div>
    </div>
<div class="order-details py-3">
    <div class="container-fluidd">

    <table>
            <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>Order no</th>
                    <th>Total Items </th>
                    <th>Total Amount</th>
                    <th>Order Status</th>
                    <th>Payment Mode</th>
                    <th>Paid Amount</th>
                    <th>Order Date</th>
                    

                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                $user_id = $_SESSION['user_id'];
                 $sql = "SELECT * FROM orders WHERE user_id = '$user_id' and payment_status='Y' order by id desc";
            $res = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res)){

                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['order_no'];?></td>
                    <td><?php echo $row['products_quantity'];?></td>
                    <td><?php echo $row['total_final'];?></td>
                    <td><?php 
             
                    switch (trim($row['order_status'])) {
                        case 'N':
                            echo 'Not Placed';
                            break;
                             case 'P':
                            echo 'Order Placed';
                            break;
                            case 'PR':
                            echo 'Processing';
                            break;
                             case 'D':
                            echo 'Delivered';
                            break;
                        
                        default:
                            echo '-';
                            break;
                    }

                    ?></td>
                    <td><?php echo $row['payment_method'];?></td>
                    <td><?php echo $row['paid_amount'];?></td>
                    <td><?php echo date('d-m-Y',strtotime($row['created_by']));?></td>
                </tr>
                <?php $i++;} ?>
            </tbody>
        </table>
    </div>
    


</div>
<?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>


<?php   
}
else{
    header("Location:login.php?error=UnAuthorized Access");
}
?>
