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
                            <button type="submit" name="blogsearch" class="btn btn-primary" value="Filter"><i class="fa fa-search"></i></button>
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
                            
                            <th>Author</th>
                            <th>Image</th>
                            
                            
                            <th>Status</th>
                            
                            <th>Posted Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Sno.</th>
                            <th>Tittle</th>
                            <th>Description</th>
                            
                            <th>Author</th>
                            <th>Image</th>
                            
                            
                            <th>Status</th>
                            <th>Posted Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        <?php while($q = mysqli_fetch_array($Blogsearch_result)):?>
                        <tr>
                            <td><?php echo $q['blog_id'];?></td>
                            <td><?php echo $q['blog_tittle'];?></td>
                            <td><?php echo substr($q['blog_description'], 0, 50);?></td>
                            <td><?php echo substr($q['blog_author'], 0, 50);?></td>
                            <td><img src="imageView.php?blog_id=<?php echo $q["blog_id"];?>" style="width:100%; height: 50px; border-top-right-radius:5px;border-top-left-radius:5px;"></td>
                        
                            <td>
                            <form method="POST" style="display:inline-flex;">
                            <a href="update-blog.php?blog_id=<?php echo $q['blog_id'];?>" class="btn btn-primary btn-sm" name="edit">Edit</a>
                            <input type="text" hidden value='<?php echo $q['blog_id']?>' name="blog_id">
                            <button onclick="myFunction()" class="btn btn-danger btn-sm ml-2" name="blogdelete">Delete</button>
                            </form>
                            </td>
                            <td><?php echo substr($q['event_posted_at'], 0, 50);?></td>
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
  alert("Are you sure to delete this Blog   ");
}
   </script>
<?php 
}
include 'adminincude/footer.php';
?>
