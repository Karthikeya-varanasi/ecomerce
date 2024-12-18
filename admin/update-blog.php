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
if(isset($_REQUEST['blog_id'])){
    $blog_id = $_REQUEST['blog_id'];
    $sql = "SELECT * FROM blogpost WHERE blog_id = $blog_id";
    $query = mysqli_query($conn, $sql);
}


if(isset($_REQUEST['blogupdate'])){
    $blog_tittle = $_REQUEST['blog_tittle'];
    $blog_author = $_REQUEST['blog_author'];
    $categories_id = $_REQUEST['categories_id'];
    $blog_description = $_REQUEST['blog_description']; 
    $sql = "UPDATE blogpost SET blog_tittle = '$blog_tittle',blog_author = '$blog_author',categories_id = '$categories_id', blog_description = '$blog_description' WHERE blog_id = $blog_id";
    mysqli_query($conn, $sql);

    header("Location: blogs.php?info=updated");
    exit();
}
include 'adminincude/head.php';
?>


<div class="container-fluid pt-4 px-4">
              <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert " role="alert">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>An Blog has been added successfully<?php echo $q['user_id']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                  
                </div>
            <?php }?>
        <?php } ?>
        <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "deleted"){?>
                <div class="alert " role="alert">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>An  Blog has been dismissing successfully <?php echo $q['id']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                 
                </div>
            <?php }?>
        <?php } ?>
               
            </div>
            <!-- Recent Sales End -->
  <!-- Widget Start -->

<?php foreach($query as $q){ ?>
<div  class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 px-3">



                        <form  method="post">
                         <div class="card custom-card">
                        <div class=card-header>
                           <div class=card-title><?php echo $q['blog_tittle'];?></div>
                        </div>
                        <div class=card-body>
                           <div class="row gy-3">
                              <div class=col-xl-6> 
                                <label for=blog-title class=form-label>Blog Title</label> 
                                <input type=text class="form-control bg-light text-dark"   id="blog_tittle" name="blog_tittle" value="<?php echo $q['blog_tittle'];?>"> 
                            </div>
                            <div class=col-xl-6> 
                                <label for=blog-author class=form-label>Blog Author</label> 
                                <input type=text class="form-control bg-light text-dark" name="blog_author" id="blog_author"value="<?php echo $_SESSION['username'];?>" > </div>

                       

                            <div class="col-xl-12">
                            <textarea name="blog_description" id="blog_description"  class="form-control bg-dark text-light   py-3 text-left" style="height: 250px;" ><?php echo $q['blog_description'];?></textarea>   
                            </div>
                      
                            <div class=col-xl-12>
                                <label for=blog-category class=form-label>Blog Category</label> 
                                <select class=form-control data-trigger name="categories_id" id="categories_id">


                                <?php

                                
                                    $sql = "SELECT * FROM categories";
                                    $query = mysqli_query($conn, $sql);
                                foreach($query as $q){ ?>
                                    <option value="<?php echo $q['categories_id']?>"><?php echo $q['categories_type']?></option>
                                <?php }?> 
                                </select>
                            </div>
                            

                        </div>
                        </div>
                        <div class=card-footer>
                            <div class="btn-list text-end"> 
                            <button  name="blogupdate" id="blogupdate" class="btn btn-sm btn-primary">Update</button>
                        </div>
                        </div>
                    </div>
                    </form>
                    </div>
                    <?php } ?>
                        

                    </div>

                    
  
            

            </div>
            <!-- Widget End -->



</div>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#blog_description' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>

<?php 
}
include 'adminincude/footer.php';
?>