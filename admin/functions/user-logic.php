

<?php

    // Menu Catogery


    // Catogeries
    $query = "SELECT * FROM `prodect_catogery`ORDER BY prodect_catogery_id ASC";
    $catosearch_result = filterTable($query);

    // Best seller
    $query = "SELECT * FROM `a_products` WHERE Feature_catogery_id	= 1";
    $prodectsearch_result = filterTable($query);


    $query = "SELECT * FROM `a_brands` ";
    $sub_catogery = filterTable($query);


    // Featured Prodects
    $query = "SELECT * FROM `a_products` WHERE Feature_catogery_id	= 2";
    $featuredsearch_result = filterTable($query);

    //Prodect -detailsdes
    
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM a_products WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }


    $query = "SELECT * FROM `prodect_catogery`";
    $prodect_catogery = filterTable($query);

    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);



?>
