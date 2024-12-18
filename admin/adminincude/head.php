<?php
/*session_start();
if (!isset($_SESSION['username']) ) {
echo "<script> alert('Invalid access');
         window.location.href = 'index.php';  </script>";
        exit;

}
*/
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
<?php 
include "adminincude/adminlinks.php";
?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<body >
    <div id="wrapper">
    <?php include 'adminincude/admin-header.php';?>
    <div id="content-wrapper" class="d-flex flex-column">

    <div id="content">
    <?php 
include "adminincude/navbar.php";
?>


    <div class="row p-2">