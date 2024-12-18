
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

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM a_products WHERE id = $id";
    $prod_res_query = mysqli_query($conn, $sql);
}


if(isset($_REQUEST['prodectupdate'])){


    $name = $_REQUEST['name'];
    $urlname = $_REQUEST['urlname'];
    $prodect_status = $_REQUEST['prodect_status'];
    $p_state = $_REQUEST['p_state'];
    $prodect_description = $_REQUEST['prodect_description'];   
    $prodect_info = $_REQUEST['prodect_info']; 
    $prodect_specifications = $_REQUEST['prodect_specifications'];
    $price = $_REQUEST['price'];
    $prodect_catogery_id = $_REQUEST['prodect_catogery_id'];
    $brands_id = $_REQUEST['brands_id'];
    
    $Feature_catogery_id = $_REQUEST['Feature_catogery_id'];
    $orginal_price = $_REQUEST['orginal_price'];
    $video1 = $_REQUEST['video1'];
      $video2 = $_REQUEST['video2'];
       $video3 = $_REQUEST['video3'];
       
       

   


    $sql = "UPDATE a_products SET name = '$name', urlname = '$urlname', prodect_status = '$prodect_status', p_state = '$p_state', prodect_description = '$prodect_description', prodect_specifications='$prodect_specifications', prodect_info='$prodect_info', price = '$price', prodect_catogery_id = '$prodect_catogery_id', brands_id='$brands_id', Feature_catogery_id='$Feature_catogery_id', orginal_price='$orginal_price',video1='$video1',video2='$video2',video3='$video3' WHERE id = $id";
    mysqli_query($conn, $sql);

     

    if($_FILES['prodect_main_Image']['tmp_name']!=''){
        $imgData =addslashes(file_get_contents($_FILES['prodect_main_Image']['tmp_name']));
    $imageProperties = getimageSize($_FILES['prodect_main_Image']['tmp_name']);

        $sql = "UPDATE a_products SET imageType = '{$imageProperties['mime']}', imageData = '{$imgData}' WHERE id = $id";
    mysqli_query($conn, $sql);

    }

    






       foreach ($_FILES["prodect_Images"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["prodect_Images"]["tmp_name"][$key];
             $file_type = $_FILES["prodect_Images"]["type"][$key];
            // Generate unique filename to avoid overwriting files
            $upload_dir = "uploads/";
            mkdir($upload_dir);
            $file_name = uniqid() . "_" . basename($_FILES["prodect_Images"]["name"][$key]);
            $upload_path = $upload_dir . $file_name;
            
            // Move uploaded file to the desired directory
            if (move_uploaded_file($tmp_name, $upload_path)) {
                $sql = "INSERT INTO product_images (prod_id, file_path, file_type) VALUES('$id', '$upload_path', '$file_type')";
                $product_res = mysqli_query($conn, $sql);
                // echo "File uploaded successfully: $file_name <br>";
            } else {
                // echo "Error uploading file: $file_name <br>";
            }
        }
    }




    header("Location:  prodects.php?info=updated");
    exit();
}

include 'adminincude/head.php';
?>
<div class="container-fluid pt-4 px-4">

    <?php foreach($prod_res_query as $q){ 


        ?>
        
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <form  enctype="multipart/form-data" class="frmImageUpload" name="frmImage" method="POST">
                    <div class="card custom-card">
                    <div class=card-header>
                        <div class=card-title>Update Prodect</div>
                    </div>
                    <div class=card-body>
                        <div class="row gy-3">
                            <div class=col-xl-6 id="align-data"> 
                            <label for=blog-title class=form-label>Prodect Title</label> 
                            <input type=text class="form-control bg-light text-dark"   id="name" name="name" value="<?php echo $q['name']?>"> 

                        </div>  
                             <div class=col-xl-6 id="align-data"> 
                            <label for=blog-title class=form-label>Prodect URL</label> 
                            <input type=text class="form-control bg-light text-dark"   id="urlname" name="urlname" value="<?php echo $q['urlname']?>"> 

                        </div>  
                    
                        <div class="col-xl-6 " id="align-data">
                            <label for=blog-category class=form-label>Status</label> 
                            <select class=form-control data-trigger name="prodect_status" id="prodect_status">
                                <!-- <option selected><?php echo $q['prodect_status']?></option> -->
                                
                                     <option <?php if($q['prodect_status']=="0") {echo "selected";} ?>  value="0">0. Deactive</option>
                                     <option <?php if($q['prodect_status']=="1") {echo "selected";} ?> value="1">1. Active</option>
                                    
                            </select>
                            </div>
                            
                             <div class="col-xl-6 " id="align-data">
                                <label for=blog-category class=form-label>Status</label> 
                                <select class=form-control data-trigger name="p_state" id="p_state">
                                 <!--<option selected><?php echo $q['p_state']?></option> -->
                                 
                                    <option <?php if($q['p_state']=="0") {echo "selected";} ?>  value="0">0. Out of stock</option>
                                    <option <?php if($q['p_state']=="1") {echo "selected";} ?> value="1">1. In stock</option>
                                    
                                </select>
                            </div>
                            


                            <div class="col-xl-12" id="align-data">
                                
                            <label for=blog-category class=form-label>Description</label> 
                            <textarea name="prodect_description" id="prodect_description"  class="form-control bg-dark text-light   py-3 text-left" style="height: 300px;"><?php echo $q['prodect_description']?></textarea>   
                            </div>
                            <div class="col-xl-12" id="align-data">
                                    
                                    <label for=blog-category class=form-label>Specifications</label> 
                                    
                                        <textarea name="prodect_info" id="prodect_info" placeholder="Specifications" class="form-control  bg-light text-dark   py-3 text-left" style="height: 700px; margin-top:10px"> <?php echo $q['prodect_info']?></textarea>   
                                    </div>
                            <div class="col-xl-12" id="align-data">
                                    
                                    <label for=blog-category class=form-label>Specifications</label> 
                                        <textarea name="prodect_specifications" id="prodect_specifications" placeholder="Specifications" class="form-control  bg-light text-dark   py-3 text-left" style="height: 700px; margin-top:10px"> <?php echo $q['prodect_specifications']?></textarea>   
                                    </div>
                            <div class="col-xl-6" id="align-data"> 
                            <label for=blog-title class=form-label>Prodect Price</label> 
                            <input type=text class="form-control bg-light text-dark"   id="price" name="price" value="<?php echo $q['price']?>"> 

                        </div>
                        <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Orginal Price</label> 
                                <input type=number class="form-control  bg-light text-dark"   id="orginal_price" name="orginal_price" value="<?php echo $q['orginal_price']?>"> 

                            </div>
                        <div class="col-xl-6 blog-images-container" id="align-data"> 
                            <label for=blog-author-email class=form-label>Prodect Images</label> <br>
                            <input type=file class="fileuplode"  id="prodect_main_Image" name="prodect_main_Image" multiple data-allow-reorder=true data-max-file-size=3MB data-max-files=6> 
                            <img src="imageView.php?id=<?php echo $q["id"]; ?>" style="width: 100%;">
                        </div>
                        <div class="col-xl-6 blog-images-container" id="align-data"> 
                            <label for=blog-author-email class=form-label>Prodect Images</label> <br>
                            <input type=file class="fileuplode"  id="prodect_Images" name="prodect_Images[]" multiple data-allow-reorder=true data-max-file-size=3MB data-max-files=6> 
                            <!-- <img src="imageView.php?id=<?php echo $q["id"]; ?>" style="width: 100%;"> -->
                            <?php

                            

                                $sql = "SELECT * FROM product_images where prod_id='$id'";
                                $pi_query = mysqli_query($conn, $sql);
                            foreach($pi_query as $pi_resq){ ?>
                                    
                                    <img src="<?php echo $pi_resq["file_path"]; ?>" style="width: 50%; height:25%; float: left;" alt='click to remove image' title='click to remove image' onClick='removeImage(<?php echo $pi_resq['id'];?>)'> 

                            <?php  } ?>

                        </div>
                    
                        

                        <div class="col-xl-6" id="align-data">
                            <label for=blog-category class=form-label>Catogery

                                <?php //var_dump($q['brands_id']);  ?></label> 
                            
                            <select class=form-control data-trigger  name="prodect_catogery_id" id="prodect_catogery_id" >
                                 <option value="">Please Select</option>
                                <!-- <option selected ><?php echo $q['prodect_catogery_id']?></option> -->
                                  
                            <?php

                            

                                $sql = "SELECT prodect_catogery_id,prodect_catogery_Title FROM prodect_catogery";
                                $pc_query = mysqli_query($conn, $sql);
                            foreach($pc_query as $prodect_q){ ?>
                            
                            
                                <option value="<?php echo $prodect_q['prodect_catogery_id']?>" <?php if($prodect_q['prodect_catogery_id']==$q['prodect_catogery_id']) {echo "selected";} ?>><?php echo $prodect_q['prodect_catogery_Title']?></option>
                                <?php }?>    
                            </select>
                        </div>
                        <div class="col-xl-6" id="align-data">
                            <label for=blog-category class=form-label>Brand</label> 
                                    <select class=form-control data-trigger name="brands_id" id="brands_id">
                                         <option value="">Please Select</option>

                                <?php

                                
                                        $b_sql = "SELECT brands_id,name FROM a_brands";
                                $b_query = mysqli_query($conn, $b_sql);
                                    
                                while($brand_q = mysqli_fetch_assoc($b_query)){
                                //var_dump($brand_q); ?>
                                    <option value="<?php echo $brand_q['brands_id']?>" <?php if($brand_q['brands_id']==$q['brands_id']) {echo "selected";} ?>><?php echo $brand_q['name']?></option>
                                <?php }?>    
                                </select>
                        </div>

                        <div class=col-xl-6 id="align-data">
                                <label for=blog-category class=form-label>Feature</label> 
                                    <select class=form-control data-trigger name="Feature_catogery_id" id="Feature_catogery_id">
                                         <option value="">Please Select</option>

                                <?php

                                
                                        $sql = "SELECT Featurecatogery_id,Feature_catogery_tittle FROM feature_catogery";
                                $fc_query = mysqli_query($conn, $sql);
                                    
                                foreach($fc_query as $feature_q){ ?>
                                    <option value="<?php echo $feature_q['Featurecatogery_id']?>" <?php if($feature_q['Featurecatogery_id']==$q['Feature_catogery_id']) {echo "selected";} ?> ><?php echo $feature_q['Feature_catogery_tittle']?></option>
                                <?php }?>    
                                </select>
                            </div>

                            <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Video1 (Enter Only Youtube Video ID)</label> 
                                <input type='text' class="form-control  bg-light text-dark"   id="video1" name="video1" placeholder="Video1" value="<?php echo $q['video1']?>"> 
                                Ex: https://www.youtube.com/watch?v=<b style='color:red'>EngW7tLk6R8</b>

                            </div>

                            <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Video2 (Enter Only Youtube Video ID)</label> 
                                <input type='text' class="form-control  bg-light text-dark"   id="video2" name="video2" placeholder="Video2"  value="<?php echo $q['video2']?>"> 

                            </div>

                            <div class=col-xl-6 id="align-data"> 
                                <label for=blog-title class=form-label>Video3 (Enter Only Youtube Video ID)</label> 
                                <input type='text' class="form-control  bg-light text-dark"   id="video3" name="video3" placeholder="Video3"  value="<?php echo $q['video3']?>"> 

                            </div>


                    </div>
                    </div>

                    <div class=card-footer>
                        <div class="btn-list text-end"> 
                        <button  name="prodectupdate" id="prodectupdate" class="btn btn-sm btn-primary">Update</button>
                    </div>
                    </div>
                </div>
                </form>
        </div>
    <?php }?> 

</div>
<script>

    function removeImage(image_id){
        var vardata = "image_id="+ image_id + "&action=removeProductImage";
         $.ajax({
            method: "POST",
            url: "functions/admin-logic.php",
            data: vardata,
            success: function(response){
                    location.reload();
                console.log(response.trim())
                if(response.trim() == 201){
                     alertify.success('Product Image Removed');
                     location.reload();
                }else if(response == "existing"){
                    alertify.success('exist');
               }else if(response == 401){
                    alertify.success("Login to continue");
                }else if(response == 500){
                    alertify.success("some thing went wrong");
                }
            }
        });
    }



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
            ClassicEditor
            .create( document.querySelector( '#prodect_info' ) )
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