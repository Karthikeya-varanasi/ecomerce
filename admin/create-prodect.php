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

<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="" enctype="multipart/form-data" class="frmImageUpload" name="frmImage" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <?php if (isset($_GET['sucess'])) { ?>
                                <p class="sucess"><?php echo $_GET['sucess']; ?></p>
                            <?php } ?> 
                        <div class="card custom-card">
                        <div class=card-header>
                        <div class=card-title><b>Create a Prodect</b></div>
                        </div>
                        <div class=card-body>
                            <div class="row gy-3">
                                <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Prodect Title</label> 
                                <input type=text class="form-control bg-light text-dark"   id="name" name="name" placeholder="Prodect Title"> 

                            </div>   
                            <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Prodect URL</label> 
                                <input type=text class="form-control bg-light text-dark"   id="urlname" name="urlname" placeholder="Prodect Title"> 

                            </div>   
                                
                        
                            <div class=col-xl-6 id="align-data">
                                <label for=blog-category class=form-label>Status</label> 
                                <select class=form-control data-trigger name="prodect_status" id="prodect_status">
                                    <option selected>Status</option>
                                    <option value="0">Deactive</option>
                                    <option value="1">Active</option>
                                    
                                </select>
                            </div>
                            <br>
                                <div class="col-xl-12" id="align-data">
                                    
                                <label for=blog-category class=form-label>Description</label> 
                                    <textarea name="prodect_description" id="prodect_description" placeholder="Description" class="form-control  bg-light text-dark   py-3 text-left" style="height: 700px; margin-top:10px"></textarea>   
                                </div>
                                <div class="col-xl-12" id="align-data">
                                    
                                <label for=blog-category class=form-label>Specifications</label> 
                                    <textarea name="prodect_specifications" id="prodect_specifications" placeholder="Specifications" class="form-control  bg-light text-dark   py-3 text-left" style="height: 700px; margin-top:10px"></textarea>   
                                </div>
                                <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Prodect Price</label> 
                                <input type=number class="form-control  bg-light text-dark"   id="price" name="price" placeholder="Selling Price"> 

                            </div>
                         
                                
                            <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Orginal Price</label> 
                                <input type=number class="form-control  bg-light text-dark"   id="orginal_price" name="orginal_price" placeholder="Orginal Price"> 

                            </div>
                            <div class="col-xl-6  blog-images-container" id="align-data"> 
                                <label for=blog-author-email class=form-label>Prodect Main Image</label> <br>
                                <input type=file class="fileuplode"  id="prodect_main_Image" name="prodect_main_Image" multiple data-allow-reorder=true data-max-file-size=3MB data-max-files=6> 
                            </div>
                            <div class="col-xl-6  blog-images-container" id="align-data"> 
                                <label for=blog-author-email class=form-label>Prodect Other Images</label> <br>
                                <input type=file class="fileuplode"  id="prodect_Images" name="prodect_Images[]" multiple data-allow-reorder=true data-max-file-size=3MB data-max-files=6> 
                            </div>
                            

                            <div class=col-xl-6 id="align-data">
                                <label for=blog-category class=form-label>Catogery</label> 
                                    <select class=form-control data-trigger name="prodect_catogery_id" id="prodect_catogery_id">

                                <?php
                                 $sql = "SELECT * FROM prodect_catogery";
                                 $query = mysqli_query($conn, $sql);
                                     
                                foreach($query as $q){ ?>
                                    <option value="<?php echo $q['prodect_catogery_id']?>"><?php echo $q['prodect_catogery_Title']?></option>
                                <?php }?>    
                                </select>
                            </div>

                            <div class=col-xl-6 id="align-data">
                                <label for=blog-category class=form-label>Brand</label> 
                                    <select class=form-control data-trigger name="brands_id" id="brands_id">

                                <?php

                                
                                        $sql = "SELECT * FROM a_brands";
                                $query = mysqli_query($conn, $sql);
                                    
                                foreach($query as $q){ ?>
                                    <option value="<?php echo $q['brands_id']?>"><?php echo $q['name']?></option>
                                <?php }?>    
                                </select>
                            </div>

                            <div class=col-xl-6 id="align-data">
                                <label for=blog-category class=form-label>Feature</label> 
                                    <select class=form-control data-trigger name="Feature_catogery_id" id="Feature_catogery_id">

                                <?php

                                
                                        $sql = "SELECT * FROM feature_catogery";
                                $query = mysqli_query($conn, $sql);
                                    
                                foreach($query as $q){ ?>
                                    <option value="<?php echo $q['Featurecatogery_id']?>"><?php echo $q['Feature_catogery_tittle']?></option>
                                <?php }?>    
                                </select>
                            </div>


                            <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Video1 (Enter Only Youtube Video ID)</label> 
                                <input type='text' class="form-control  bg-light text-dark"   id="video1" name="video1" placeholder="Video1"> 
                                Ex: https://www.youtube.com/watch?v=<b style='color:red'>EngW7tLk6R8</b>

                            </div>

                            <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Video2 (Enter Only Youtube Video ID)</label> 
                                <input type='text' class="form-control  bg-light text-dark"   id="video2" name="video2" placeholder="Video2"> 

                            </div>

                            <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Video3 (Enter Only Youtube Video ID)</label> 
                                <input type='text' class="form-control  bg-light text-dark"   id="video3" name="video3" placeholder="Video3"> 

                            </div>

                              
                        </div>
                        </div>

                        <div class=card-footer>
                        <div class="btn-list text-end"> 
                            <button  name="new_posts" id="new_posts" class="btn btn-sm btn-primary">Create</button>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>


    </div>
 
    <script>
        ClassicEditor
            .create( document.querySelector( '#prodect_description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#prodect_specifications' ) )
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
