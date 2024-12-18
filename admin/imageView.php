<?php

ini_set("display_errors", "off");

// $conn = mysqli_connect("localhost", "root", "", "hoverboards" );
require_once '../core/conn.php';


if(!$conn){
    echo "<h3 class='container bg-dark  p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
}

    if(isset($_GET['blog_id'])) {
        $sql = "SELECT imageType,imageData FROM blogpost WHERE blog_id=" . $_GET['blog_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
	}

    if(isset($_GET['prodect_catogery_id'])) {
        $sql = "SELECT imageType,imageData FROM prodect_catogery WHERE prodect_catogery_id=" . $_GET['prodect_catogery_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
	}
    if(isset($_GET['brands_id'])) {
        $sql = "SELECT imageType,imageData FROM a_brands WHERE brands_id=" . $_GET['brands_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
	}
        
        if(isset($_GET['id'])) {
        $sql = "SELECT imageType,imageData FROM a_products WHERE id=" . $_GET['id'];
        $result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image Project<br/>" . mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
    }

	mysqli_close($conn);

?>