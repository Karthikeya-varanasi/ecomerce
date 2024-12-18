</body>
</html>

<?php   
/*}
else{
    header("Location:index.php?error=UnAuthorized Access");
}*/

if (!isset($_SESSION['username']) ) {
echo "<script> alert('Invalid access');
         window.location.href = 'index.php';  </script>";
        exit;

}
?>
