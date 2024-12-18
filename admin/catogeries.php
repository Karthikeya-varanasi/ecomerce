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

<div class="col-lg-6">
    <div class="card mb-4">
        <div class="card-header">
        Catogery Title
        </div>
        <div class="card-body">
            <form action="" enctype="multipart/form-data" class="frmImageUpload" name="frmImage"  method="POST">
            <input type=text class="form-control bg-Light text-dark" required  id="prodect_catogery_Title" name="prodect_catogery_Title" placeholder="Name of the Catogerie">
            <br>
            <input type=file class="fileuplode"  id="catogery_Images" name="catogery_Images" multiple data-allow-reorder=true data-max-file-size=3MB data-max-files=6> 
            <br>
            <button  name="catosave" id="catosave" class="btn btn-sm btn-primary">Create Catogery</button>
        
            </form>
        </div>
     
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Categories</th>
                            
                            <th>Image</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sno.</th>
                            <th>Categories</th>
                            <th>Image</th>
                            <th>Update</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                    <?php while($q = mysqli_fetch_array($catosearch_result)):?>
                        <tr>
                            <td><?php echo $q['prodect_catogery_id'];?></td>
                            <td><?php echo $q['prodect_catogery_Title'];?></td>
                            <td><img src="imageView.php?prodect_catogery_id=<?php echo $q["prodect_catogery_id"];?>" style="width:100%; height: 50px; border-top-right-radius:5px;border-top-left-radius:5px;"></td>
                            <td>
                                <form action="post">
                                <a href="update-catogeries.php?prodect_catogery_id=<?php echo $q['prodect_catogery_id'];?>" class="btn btn-primary btn-sm" name="edit">Edit</a>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<div class="col-lg-6">
    <div class="card mb-4">
        <div class="card-header">
            Brand Title
        </div>
        <div class="card-body">
            <form action=""  enctype="multipart/form-data" class="frmImageUpload" name="frmImage"  method="POST">
                <input type=text class="form-control bg-light text-dark"   id="name" name="name" placeholder="Name">
                    <br>
                <select class=form-control data-trigger name="prodect_catogery_id" id="prodect_catogery_id">
                    <?php                                                
                        $sql = "SELECT * FROM prodect_catogery";
                        $query = mysqli_query($conn, $sql);   
                        foreach($query as $q){ ?>
                        <option value="<?php echo $q['prodect_catogery_id']?>"><?php echo $q['prodect_catogery_Title']?></option>
                    <?php }?>    
                </select>
                        <br>
                        <input type=file class="fileuplode"  id="brands_Images" name="brands_Images" multiple data-allow-reorder=true data-max-file-size=3MB data-max-files=6> 
            
                        <button  name="create" id="create" class="btn btn-sm btn-primary">Create a Brand</button>
                </div>

            </form>        
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Brands</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Prodect Catogery Id</th>
                                <th>Brand Name</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sno.</th>
                                <th>Prodect Catogery Id</th>
                                <th>Brand Name</th>
                                <th>Image</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            <?php while($q = mysqli_fetch_array($brandsearch_result)):?>
                            <tr>
                                <td><?php echo $q['brands_id']?></td>
                                <td><?php echo $q['prodect_catogery_id']?></td>
                                <td><?php echo $q['name'];?></td>
                                <td><img src="imageView.php?brands_id=<?php echo $q["brands_id"];?>" style="width:100%; height: 50px; border-top-right-radius:5px;border-top-left-radius:5px;"></td>
                            </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
}
include 'adminincude/footer.php';
?>
