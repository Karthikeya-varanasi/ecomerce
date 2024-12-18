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


include 'functions/admin-logic.php';
include 'adminincude/head.php';
?>


<div class="col-xl-12">
<div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center  justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
            <div >
                    
                        <form action="" method="POST" style="display:inline-flex;">
                            <input  type="search" name="valueToSearch" class="form-control  bg-light text-dark"   id="serch_bar" placeholder="Value To Search">
                            <button type="submit" name="blogsearch" class="btn btn-primary" value="Filter"><i class="fa fa-search"></i></button>
                        </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="    overflow-x: auto;height: 600px;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Sl.no</th>
                    <th>Order no</th>
                    <th>Total Items </th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Order Status</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>User Details</th>
                    <th>Order Detail</th>
                    
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                         <?php
                $i = 1;
               
                 $sql = "SELECT * FROM orders WHERE  payment_status='Y' order by id desc";
            $res = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res)){

                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['order_no'];?></td>
                    <td><?php echo $row['products_quantity'];?></td>
                    <td><?php echo $row['total_final'];?></td>
                    <td><?php echo $row['paid_amount'];?></td>
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
                    <td><?php echo date('d-m-Y',strtotime($row['created_by']));?></td>

                    <td><?php 
                    $user_id =  $row['user_id'];
                    $user_sql = "SELECT * FROM users WHERE  user_id='$user_id'";
            $users_res = mysqli_query($con,$user_sql);
            $user_row = mysqli_fetch_array($users_res);
            echo $user_row['user_name'].' '.$user_row['surname'];



                ?></td>
                    <td><a href="order_detail.php?order_id=<?php echo $row['id'];?>">View</a></td>
                </tr>
                <?php $i++;} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



<?php 
}
include 'adminincude/footer.php';
?>