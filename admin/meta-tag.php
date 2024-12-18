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




            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
   <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert " role="alert">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>An Meta Tag has been added successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                  
                </div>
            <?php }?>
        <?php } ?>
        <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "deleted"){?>
                <div class="alert " role="alert">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>An  Meta has been dismissing successfully <?php echo $q['id']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                 
                </div>
            <?php }?>
        <?php } ?>

                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        
                                             
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightt" aria-controls="offcanvasRight">Add Meta Tags</button>
          
                              <div style="display:inline-flex;">
<input  type="search" class="form-control  bg-light text-dark" name="valueToSearch" id="serch_bar" placeholder="Value To Search">
  <button type="submit" name="search" class="btn btn-primary" value="Filter"><i class="fa fa-search"></i></button>
                              </div>

                    </div>
                    <div class="table-responsive">  
                       <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
        <th>Id</th>
            <th class="th-sm">url</th> 
      <th class="th-sm">Title</th> 
      <th class="th-sm">Keywords</th> 
      <th class="th-sm">Description</th>
            <th class="th-sm">Changes</th>  
    </tr>
  </thead>
  <tbody style="text-align-last:left;">
  <?php

   while($q = mysqli_fetch_array($metasearch_result)):?>
     <tr>

      <td><?php echo $q['meta_id'];?></td>
      <td><?php echo $q['meta_url'];?></td>
      <td><?php echo $q['meta_title'];?></td>
      <td><?php echo substr($q['meta_keywords'], 0, 50);?>...</td>
      <td><?php echo substr($q['meta_description'], 0, 30);?>...</td>
            <td style="text-align-last:center;">    
<form method="POST">
        <a href="update-meta-tag.php?meta_id=<?php echo $q['meta_id']?>" >
<button class="btn btn-primary btn-sm ml-2" type="button" data-bs-toggle="offcanvas" id="edit-user" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-pen-to-square"></i></button></a>
<input type="text" hidden value='<?php echo $q['meta_id']?>' name="meta_id">
                        <button onclick="myFunction()" class="btn btn-danger btn-sm ml-2" name="metadelete"><i class="fa-solid fa-trash"></i></button>

                    </form>


</td>  

    </tr>

                <?php endwhile;?>
    
  </tbody>
 
</table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightt" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Add Meta Tags</h5>
    <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="" method="POST">
                         <div class="card custom-card">
                     
                        <div class=card-body>
                            <div class="row gy-3">
                              <div class=col-xl-12> 
                                <label for=blog-title class=form-label>Meta Tag Url</label> 
                                <input type=text class="form-control bg-light text-dark"   name="metatag_url" id="metatag_url" placeholder="Prodect Title"> 

                            </div>                        
                         
                            

                              
                                <div class=col-xl-12> 
                                <label for=blog-title class=form-label>Metatag Title</label> 
                                <input type=text class="form-control bg-light text-dark"   id="metatag_title" name="metatag_title"  placeholder="Metatag Title"> 

                            </div>

                             

                            <div class=col-xl-12> 
                                <label for=blog-title class=form-label>Meta Keywords</label> 
                              
                                    <textarea name="metatag_keywords" id="metatag_keywords" class="form-control bg-light text-dark"  placeholder=" Meta Keywords" style="height:100px;"></textarea>

                            </div>
                             <div class=col-xl-12> 
                                <label for=blog-title class=form-label>Meta Descrip0tion</label> 
                              
                                    <textarea name="metatag_description" id="metatag_description" class="form-control bg-light text-dark"  placeholder=" Meta Keywords" style="height:100px;"></textarea>

                            </div>
                         <div class=col-xl-12> 
                                <label for=blog-title class=form-label> Status</label> 
                                <select class="form-control bg-light text-dark" name="meta_status" id="meta_status" aria-label="Default select example"> 
                                    <option selected>Open this select menu</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div> 
                            

                            

                         </div>
                        </div>

                        <div class=card-footer>
                           <div class="btn-list text-end"> 
                            <button  name="submit" id="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                        </div>
                     </div>
                     </form>
 
            </div>
  </div>
</div>

    </div>


<?php 
}
include 'adminincude/footer.php';
?>