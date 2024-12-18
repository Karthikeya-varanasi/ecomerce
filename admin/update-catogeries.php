
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


if(isset($_REQUEST['prodect_catogery_id'])){
    $prodect_catogery_id = $_REQUEST['prodect_catogery_id'];
    $sql = "SELECT * FROM prodect_catogery WHERE prodect_catogery_id = $prodect_catogery_id";
    $query = mysqli_query($conn, $sql);
}

if(isset($_REQUEST['catoupdate'])){
    $prodect_catogery_Title = $_REQUEST['prodect_catogery_Title']; 

    $sql = "UPDATE prodect_catogery SET prodect_catogery_Title = '$prodect_catogery_Title' WHERE prodect_catogery_id = $prodect_catogery_id";
    mysqli_query($conn, $sql);



    if($_FILES['catogery_Images']['tmp_name']!=''){
        $imgData =addslashes(file_get_contents($_FILES['catogery_Images']['tmp_name']));
    $imageProperties = getimageSize($_FILES['catogery_Images']['tmp_name']);
    
        $sql = "UPDATE prodect_catogery SET imageType = '{$imageProperties['mime']}', imageData = '{$imgData}' WHERE prodect_catogery_id = $prodect_catogery_id";
    mysqli_query($conn, $sql);
    
    }

    header("Location: catogeries.php?info=updated");
    exit();
    
}

include 'adminincude/head.php';
?>

<div class="container-fluid pt-4 px-4">

<?php foreach($query as $q){ ?>
            <form action="" enctype="multipart/form-data" class="frmImageUpload" name="frmImage"  method="POST">
                <input type=text class="form-control bg-Light text-dark" required  id="prodect_catogery_Title" name="prodect_catogery_Title"  value="<?php echo $q['prodect_catogery_Title'];?>">
                    <br>
                <input type=file class="fileuplode"  id="catogery_Images" name="catogery_Images" multiple data-allow-reorder=true data-max-file-size=3MB data-max-files=6> 
                <img src="imageView.php?id=<?php echo $q["prodect_catogery_id"]; ?>" style="width: 10%;">
                    <br>
                <button  name="catoupdate" id="catoupdate" class="btn btn-sm btn-dark my-2"  id="buttons-dzin">Create Catogery</button>
            </form>
            <?php } ?>
            

</div>


<?php 
}
include 'adminincude/footer.php';
?>