
    <?php 
    
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
         // $sql = "SELECT * FROM a_products WHERE prodect_status='1' and prodect_catogery_id = $cat_id";
         $sql = "SELECT * FROM a_products ap,prodect_catogery pc WHERE pc.prodect_catogery_id=ap.prodect_catogery_id and  ap.prodect_status='1' and pc.prodect_catogery_Title = '$cat_id' ";
          $query = mysqli_query($conn, $sql);
    }
   
   
    include 'collections/collection-cards.php';
    ?>
    <?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>