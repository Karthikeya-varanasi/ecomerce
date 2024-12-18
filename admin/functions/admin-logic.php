

<?php

// session_start();
// require_once './../../core/conn.php';
// var_dump($conn)
// require_once './../core/conn.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // This is an AJAX request
     require_once './../../core/conn.php';
}

if(@$_POST['action']=="removeProductImage")
{
    $image_id = $_POST['image_id'];   
 $sql = "DELETE FROM product_images WHERE id = $image_id";
    $query = mysqli_query($conn, $sql);
    echo 201;
    exit();

    
}


if(@$_POST['action']=="shipping_charge")
{
    $shipping_state = $_POST['shipping_state'];
    // search in all table columns
    // using concat mysql function
    $sql = "SELECT * FROM `states` WHERE state_name='$shipping_state'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    echo $row['shipping_cost'];
   exit; 

}


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `a_brands` WHERE CONCAT(`brands_id`,`name`, `prodect_catogery_id`) LIKE '%".$valueToSearch."%'";
    $brandsearch_result = filterTable($query);
    
}else {
    $query = "SELECT * FROM `a_brands`ORDER BY brands_id DESC";
    $brandsearch_result = filterTable($query);
}



if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `prodect_catogery` WHERE CONCAT(`prodect_catogery_id`, `prodect_catogery_Title`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}else {
    $query = "SELECT * FROM `prodect_catogery`ORDER BY prodect_catogery_id DESC";
    $search_result = filterTable($query);
}


if(isset($_POST['catosearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `prodect_catogery` WHERE CONCAT(`prodect_catogery_id`, `prodect_catogery_Title`) LIKE '%".$valueToSearch."%'";
    $catosearch_result = filterTable($query);
    
}else {
    $query = "SELECT * FROM `prodect_catogery`ORDER BY prodect_catogery_id DESC";
    $catosearch_result = filterTable($query);
}




if(isset($_POST['Prodectsearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `a_products` WHERE CONCAT(`id`, `name`, `price`) LIKE '%".$valueToSearch."%'";
    $prodectsearch_result = filterTable($query);
    
}else {
    $query = "SELECT * FROM `a_products`ORDER BY id DESC";
    $prodectsearch_result = filterTable($query);
}


if(isset($_POST['Blogsearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `blogpost` WHERE CONCAT(`blog_id`, `blog_tittle`, `blog_author`) LIKE '%".$valueToSearch."%'";
    $Blogsearch_result = filterTable($query);
    
}else {
    $query = "SELECT * FROM `blogpost`ORDER BY blog_id DESC";
    $Blogsearch_result = filterTable($query);
}



if(isset($_POST['metasearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `meta_tag` WHERE CONCAT(`meta_id`,`meta_url`, `meta_title`, `meta_keywords`, `meta_description`) LIKE '%".$valueToSearch."%'";
    $metasearch_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `meta_tag`";
    $metasearch_result = filterTable($query);
}


if(isset($_REQUEST['new_posts'])){
   /* $name = $_REQUEST['name'];
    $prodect_status = $_REQUEST['prodect_status'];
    $prodect_description = $_REQUEST['prodect_description'];   
    $prodect_specifications = $_REQUEST['prodect_specifications'];
    $price = $_REQUEST['price'];
    $imgData =addslashes(file_get_contents($_FILES['prodect_Images']['tmp_name']));
    $imageProperties = getimageSize($_FILES['prodect_Images']['tmp_name']);
    $prodect_catogery_id = $_REQUEST['prodect_catogery_id'];
    $brands_id = $_REQUEST['brands_id'];
    $Feature_catogery_id = $_REQUEST['Feature_catogery_id'];
    $orginal_price = $_REQUEST['orginal_price'];
    


    $sql = "INSERT INTO a_products (name, prodect_status, prodect_description, prodect_specifications, price, imageType,imageData, prodect_catogery_id, brands_id, 	Feature_catogery_id, orginal_price) VALUES('$name', '$prodect_status', '$prodect_description', '$prodect_specifications', '$price','{$imageProperties['mime']}', '{$imgData}', '$prodect_catogery_id', '$brands_id', '$Feature_catogery_id', '$orginal_price')";
    mysqli_query($conn, $sql);*/

     $name = $_REQUEST['name'];
     $urlname = $_REQUEST['urlname'];
    $prodect_status = $_REQUEST['prodect_status'];
    $prodect_description = $_REQUEST['prodect_description'];   
    $prodect_specifications = $_REQUEST['prodect_specifications'];
    $price = $_REQUEST['price'];
    $imgData =addslashes(file_get_contents($_FILES['prodect_main_Image']['tmp_name']));
    $imageProperties = getimageSize($_FILES['prodect_main_Image']['tmp_name']);
    $prodect_catogery_id = $_REQUEST['prodect_catogery_id'];
    $brands_id = $_REQUEST['brands_id'];
    $Feature_catogery_id = $_REQUEST['Feature_catogery_id'];
    $orginal_price = $_REQUEST['orginal_price'];
     $video1 = $_REQUEST['video1'];
      $video2 = $_REQUEST['video2'];
       $video3 = $_REQUEST['video3'];
    


    $sql = "INSERT INTO a_products (name, urlname, prodect_status, prodect_description, prodect_specifications, price, imageType,imageData, prodect_catogery_id, brands_id,  Feature_catogery_id, orginal_price,video1,video2,video3) VALUES('$name', '$urlname', '$prodect_status', '$prodect_description', '$prodect_specifications', '$price','{$imageProperties['mime']}', '{$imgData}', '$prodect_catogery_id', '$brands_id', '$Feature_catogery_id', '$orginal_price', '$video1', '$video2', '$video3')";
    $product_res = mysqli_query($conn, $sql);
    $product_last_id = mysqli_insert_id($conn);



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
                $sql = "INSERT INTO product_images (prod_id, file_path, file_type) VALUES('$product_last_id', '$upload_path', '$file_type')";
                $product_res = mysqli_query($conn, $sql);
                // echo "File uploaded successfully: $file_name <br>";
            } else {
                // echo "Error uploading file: $file_name <br>";
            }
        }
    }





    header("Location: create-prodect.php?sucess=Prodect Added sucessfully");
    exit();

}






if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM a_products WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    header("Location: prodects.php?error= Prodect Deleted sucessfully");
    exit();
}





if(isset($_POST['Blogsearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `blogpost` WHERE CONCAT(`blog_id`, `blog_tittle`, `blog_author`) LIKE '%".$valueToSearch."%'";
    $Blogsearch_result = filterTable($query);
    
}else {
    $query = "SELECT * FROM `blogpost`ORDER BY blog_id DESC";
    $Blogsearch_result = filterTable($query);
}


$sql = "SELECT * FROM blogpost ORDER BY blog_id DESC";
$query = mysqli_query($conn, $sql);

$sql = "SELECT blog_id FROM blogpost ORDER BY blog_id DESC"; 
$result = mysqli_query($conn, $sql);


if(isset($_REQUEST['new_blog_posts'])){
    $blog_tittle = $_REQUEST['blog_tittle'];
    $blog_author = $_REQUEST['blog_author'];
    $categories_id = $_REQUEST['categories_id'];
    $blog_description = $_REQUEST['blog_description'];      
    $imgData =addslashes(file_get_contents($_FILES['blog_Images']['tmp_name']));
    $imageProperties = getimageSize($_FILES['blog_Images']['tmp_name']);
    $sql = "INSERT INTO blogpost (blog_tittle,  blog_author,  categories_id, blog_description, imageType ,imageData) VALUES('$blog_tittle',  '$blog_author', '$categories_id', '$blog_description','{$imageProperties['mime']}', '{$imgData}')";
    mysqli_query($conn, $sql);
    header("Location: ../create-blog.php?sucess=Blog Post Sucessfully added");
    exit();

}






if(isset($_REQUEST['catosave'])){   
    $prodect_catogery_Title = $_REQUEST['prodect_catogery_Title']; 
    $imgData =addslashes(file_get_contents($_FILES['catogery_Images']['tmp_name']));
    $imageProperties = getimageSize($_FILES['catogery_Images']['tmp_name']);

    $sql = "INSERT INTO prodect_catogery (prodect_catogery_Title, imageType ,imageData) VALUES('$prodect_catogery_Title', '{$imageProperties['mime']}', '{$imgData}')";
    mysqli_query($conn, $sql);
    header("Location: catogeries.php?info=added");
    exit();

}


if(isset($_REQUEST['create'])){
    $name = $_REQUEST['name'];
    $prodect_catogery_id = $_REQUEST['prodect_catogery_id'];
    $imgData =addslashes(file_get_contents($_FILES['brands_Images']['tmp_name']));
    $imageProperties = getimageSize($_FILES['brands_Images']['tmp_name']);



    $sql = "INSERT INTO a_brands (name, prodect_catogery_id, imageType ,imageData ) VALUES('$name', '$prodect_catogery_id', '{$imageProperties['mime']}', '{$imgData}')";
    mysqli_query($conn, $sql);
    header("Location: catogeries.php?info=added");
    exit();

}


if(isset($_REQUEST['blogdelete'])){
    $blog_id = $_REQUEST['blog_id'];

    $sql = "DELETE FROM  blogpost WHERE blog_id = $blog_id";
    $query = mysqli_query($conn, $sql);

    header("Location: blogs.php?error= Blog Post Sucessfully deleted");
    exit();
}










if(isset($_POST['submit']))
{
	$metatag_url=$_POST['metatag_url'];
	$metatag_title=$_POST['metatag_title'];
	$metatag_keywords=addslashes($_POST['metatag_keywords']);
	$metatag_description=addslashes($_POST['metatag_description']);
    $meta_status=$_POST['meta_status'];

	if($metatag_url!='')
	{
		$insertqry="INSERT INTO `meta_tag`( `meta_url`, `meta_title`, `meta_keywords`, `meta_description`,`meta_status`) VALUES ('$metatag_url','$metatag_title','$metatag_keywords','$metatag_description','$meta_status')";
		$insertres=mysqli_query($con,$insertqry);

		
          header("Location: meta-tag.php?info=sucess");
    exit();
	}
}


$sql = "SELECT * FROM meta_tag";
$query = mysqli_query($conn, $sql);


if(isset($_REQUEST['meta_id'])){
    $meta_id = $_REQUEST['meta_id'];
    $sql = "SELECT * FROM meta_tag WHERE meta_id = $meta_id";
    $query = mysqli_query($conn, $sql);
}



if(isset($_REQUEST['metadelete'])){
    $meta_id = $_REQUEST['meta_id'];

    $sql = "DELETE FROM meta_tag WHERE meta_id = $meta_id";
    mysqli_query($conn, $sql);

    header("Location: meta-tag.php?info=deleted");
    exit();
}

if(isset($_REQUEST['metaupdate'])){
    $meta_url = $_REQUEST['meta_url'];
    $meta_title = $_REQUEST['meta_title'];
    $meta_keywords = $_REQUEST['meta_keywords'];
    $meta_description = $_REQUEST['meta_description'];
    $meta_status=$_POST['meta_status'];

    $sql = "UPDATE meta_tag SET meta_url  = '$meta_url ', meta_title = '$meta_title', meta_keywords = '$meta_keywords', meta_description = '$meta_description', meta_status = '$meta_status' WHERE meta_id = $meta_id";
    mysqli_query($conn, $sql);

    header("Location: meta-tag.php");
    exit();
}


?>
