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


<form action="functions/admin-logic.php" enctype="multipart/form-data" class="frmImageUpload" name="frmImage" method="post">
<?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <?php if (isset($_GET['sucess'])) { ?>
                                <p class="sucess"><?php echo $_GET['sucess']; ?></p>
                            <?php } ?> 
          <div class="card custom-card">
         <div class=card-header>
            <div class=card-title>New Blog</div>

         </div>
         <div class=card-body>
            <div class="row gy-3">
               <div class=col-xl-12> 
                 <label for=blog-title class=form-label>Blog Title</label> 
                 <input type=text class="form-control bg-light text-dark"   id="blog_tittle" name="blog_tittle" placeholder="Blog Title"> 
             </div>



          
               <div class=col-xl-6> 
                 <label for=blog-author class=form-label>Blog Author</label> 
                 <input type=text class="form-control bg-light text-dark" name="blog_author" id="blog_author"value="<?php echo $_SESSION['username'];?>" > </div>

        


               
             
               <div class="col-xl-6 blog-images-container"> 
                 <label for=blog-author-email class=form-label>Blog Images</label> <br>
                 <input type=file class="fileuplode"  id="blog_Images" name="blog_Images" multiple data-allow-reorder=true data-max-file-size=3MB data-max-files=6> 
             </div>

             <div class=col-xl-6>
                                 <label for=blog-category class=form-label>Blog Category</label> 
                                 <select class=form-control data-trigger name="categories_type" id="categories_type">


                                 <?php

                                
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($conn, $sql);
                               
                                foreach($query as $q){ ?>
                                    <option value="<?php echo $q['categories_id']?>"><?php echo $q['categories_type']?></option>
                                   <?php }?>  
                                   
                                 </select>
                              </div>

               <div class="col-xl-12">
                <textarea name="blog_description" id="blog_description" placeholder="blog_description" class="form-control bg-dark text-light   py-3 text-left" style="height: 300px;"></textarea>   
               </div>
                

            </div>
         </div>
         <div class=card-footer>
            <div class="btn-list text-end"> 
             <button  name="new_blog_posts" id="new_blog_posts" class="btn btn-sm btn-primary">Post Blog</button>
         </div>
         </div>
      </div>
      </form>


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
