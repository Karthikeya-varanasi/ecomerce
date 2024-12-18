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

                    <div class="col-sm-12 col-xl-6">
                        
                        <?php foreach($query as $q){ ?>
                       <div class="bg-light  rounded h-100 p-4">

                           <h6 class="mb-4">Edit <?php echo $q['meta_title'];?></h6>

                           <form method="POST">
                               <div class="mb-3">
                                   <label for="exampleInputEmail1" class="form-label">Metatag_url</label>
                                   <input type="text" name="meta_url" id="metatag_url" class="form-control bg-light text-dark   py-3 text-left" value="<?php echo $q['meta_url'];?>">
                               </div>
                               <div class="mb-3">
                                   <label for="exampleInputPassword1" class="form-label">Metatag_Title</label>
                                    <input type="text"  name="meta_title"  class="form-control bg-light text-dark   py-3 text-left"  value="<?php echo $q['meta_title'];?>">
                               </div>
                               <div class="mb-3 ">
                                      <label class="form-check-label" for="exampleCheck1">Meta_Keywords</label>
                                   <textarea name="meta_keywords" class="form-control bg-light text-dark   py-3 text-left"style="height:100px;" ><?php echo $q['meta_keywords'];?></textarea>
                                
                               </div>
                               <div class="mb-3 ">
                                   <label class="form-check-label" for="exampleCheck1">Meta_Description</label>
                                   <textarea name="meta_description" class="form-control bg-light text-dark   py-3 text-left" style="height:100px;"><?php echo $q['meta_description'];?></textarea>
                               </div>
                               
                               <button type="submit" name="metaupdate" class="btn btn-primary">Update</button>
                           </form>
                          
                    </div> 
                       <?php } ?>

<?php 
}
include 'adminincude/footer.php';
?>