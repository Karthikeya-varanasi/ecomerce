<?php
session_start();
if (!isset($_SESSION['username']) ) {
echo "<script> alert('Invalid access');
         window.location.href = 'index.php';  </script>";
        exit;

}
require_once '../core/conn.php';
if (isset($_SESSION['usertype']) ) {
$utype = $_SESSION['usertype'];
if ($utype == "1") {
	$sql = "SELECT * FROM menu WHERE usertype = '1'";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);
}

include 'adminincude/head.php';
?>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
        <div id="content">


                    <!-- Sale & Revenue Start -->
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                                    <div class="ms-3" id="dash">
                                    <?php
                                            $sql0 = "SELECT brands_id FROM a_brands";
                                            $query_run = mysqli_query($conn, $sql0);
                                            $row = mysqli_num_rows($query_run);
                                            ?>
                                        
                                        <h6 class="mb-0"><?php echo $row; ?></h6>
                                        <p class="mb-2">Brands</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light  rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                                    <div class="ms-3" id="dash">
                                        <?php
                                            $sql0 = "SELECT prodect_catogery_id   FROM prodect_catogery";
                                            $query_run = mysqli_query($conn, $sql0);
                                            $row = mysqli_num_rows($query_run);
                                            ?>
                                        <h6 class="mb-0"><?php echo $row; ?></h6>
                                        <p class="mb-2">Catogeries</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light  rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                                    <div class="ms-3" id="dash">
                                        <?php
                                            $sql0 = "SELECT user_id   FROM users";
                                            $query_run = mysqli_query($conn, $sql0);
                                            $row = mysqli_num_rows($query_run);
                                            ?>
                                        <h6 class="mb-0"><?php echo $row; ?></h6>
                                        <p class="mb-2">Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light  rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                                    <div class="ms-3" id="dash">
                                        <?php
                                            $sql0 = "SELECT id   FROM a_products";
                                            $query_run = mysqli_query($conn, $sql0);
                                            $row = mysqli_num_rows($query_run);
                                            ?>
                                        <h6 class="mb-0"><?php echo $row; ?></h6>
                                        <p class="mb-2">Prodects</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3 mt-3" >
                                <div class="bg-light  rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                                    <div class="ms-3" id="dash">
                                        <?php
                                            $sql0 = "SELECT blog_id   FROM blogpost";
                                            $query_run = mysqli_query($conn, $sql0);
                                            $row = mysqli_num_rows($query_run);
                                            ?>
                                        <h6 class="mb-0"><?php echo $row; ?></h6>
                                        <p class="mb-2">Blogs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3 mt-3" >
                                <div class="bg-light  rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                                    <div class="ms-3" id="dash">
                                        <?php
                                            $sql0 = "SELECT meta_id   FROM meta_tag";
                                            $query_run = mysqli_query($conn, $sql0);
                                            $row = mysqli_num_rows($query_run);
                                            ?>
                                        <h6 class="mb-0"><?php echo $row; ?></h6>
                                        <p class="mb-2">Meta Links</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sale & Revenue End -->
        </div>
    <!-- End of Main Content -->
</div>

</div>
<?php 

}
include 'adminincude/footer.php';
?>



