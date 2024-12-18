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
            <h6 class="m-0 font-weight-bold text-primary">Prodects</h6>
            <div >
                    
                        <form action="" method="POST" style="display:inline-flex;">
                            <input  type="search" name="valueToSearch" class="form-control  bg-light text-dark"   id="serch_bar" placeholder="Value To Search">
                            <button type="submit" name="Prodectsearch" class="btn btn-primary" value="Filter"><i class="fa fa-search"></i></button>
                        </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="    overflow-x: auto;height: 600px;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Tittle</th>
                            <th>Description</th>
                            
                            <th>Price</th>
                            <th>Image</th>
                            
                            <th>Cato_Id</th>
                            
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Sno.</th>
                            <th>Tittle</th>
                            <th>Description</th>
                            
                            <th>Price</th>
                            <th>Image</th>
                            
                            <th>Cato_Id</th>
                            
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        <?php while($q = mysqli_fetch_array($prodectsearch_result)):?>
                        <tr>
                            <td><?php echo $q['id'];?></td>
                            <td><?php echo $q['name'];?></td>
                            <td><?php echo substr($q['prodect_description'], 0, 50);?></td>
                            <td><i class="fa fa-inr" aria-hidden="true"></i><?php echo $q["price"]; ?></td>
                            <td><img src="imageView.php?id=<?php echo $q["id"];?>" style="width:100%; height: 50px; border-top-right-radius:5px;border-top-left-radius:5px;"></td>
                            <td><?php echo $q['prodect_catogery_id'];?></td>
                            <td>
                            <form method="POST" style="display:inline-flex;">

<a href="update-prodect.php?id=<?php echo $q['id']?>" >
<button class="btn btn-primary btn-sm ml-2" type="button"  id="edit-user" ><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
<input type="text" hidden value='<?php echo $q['id']?>' name="id">
                <button onclick="myFunction()" class="btn btn-danger btn-sm ml-2" name="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
<?php
        if($q['prodect_status']==1){
        echo '<a href="status.php?id='.$q['id'].'&prodect_status=0" ><button class="btn btn-success btn-sm ml-2" type="button"  id="edit-user" >enable</button></a>';
        }else{
        echo '<a href="status.php?id='.$q['id'].'&prodect_status=1" ><button class="btn btn-danger btn-sm ml-2" type="button"  id="edit-user" >Disable</button></a>';
        }
    ?>

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




<script>
     function myFunction() {
  alert("Are you sure to delete this Prodect");
}
   </script>
<?php 
}
include 'adminincude/footer.php';
?>