
<?php 
    
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';


    if(isset($_REQUEST['brands_id'])){
        $brands_id = $_REQUEST['brands_id'];
         $sql = "SELECT * FROM a_products ap,a_brands ab WHERE ab.brands_id=ap.brands_id and ap.prodect_status='1' and ab.name = '".$brands_id."' ";
        $query = mysqli_query($conn, $sql);
        
    }else{
        $sql = "SELECT * FROM a_products";
        $query = mysqli_query($conn, $sql);
    }
    
    ?>
    <div class="container-fluidd">
        
<div class="col-md-12 mt-3" >
    <div class="card " style="border:none;">
        <div class="card-body row"  id="prodect-scroll" >
                
                <?php 
                
                while($q = mysqli_fetch_array($query)){
                    
                 ?>
                <div class="col-md-3 mt-3">
                    <div class="border" style="border-radius: 5px;">
                    <a href="products/<?php echo $q['urlname']?>">
                        <div class="prodect-details">
                            <div class="prodect-img">
                            <img src="admin/imageView.php?id=<?php echo $q["id"];?>" alt="">
                            </div>
                            <div class="prodect-content">
                                <h2><?php echo substr($q['name'], 0, 200);?>...</h2>
                    </a>         
                    
                                <div class="prodecthr"></div>
                                <div class="prodect-cart">
                                <span><p style=" text-decoration: line-through;">Rs.<?php echo $q['orginal_price']?></p> <b style="font-size:18px;">Rs.<?php echo $q['price'];?>/-</b></span>
                                <form action='cart.php' method="post">
                                            <input type='hidden' name='product_id' value='<?php echo $q['id']?>' />
                                            <input type='hidden' name='quantity' value='1' />

                                        <button class="CartBtn" type="submit" name='add_to_cart' >
                                            <!-- href="cart.php?id=<?php echo $q['id']?>" -->
                                        <span class="IconContainer"> 
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        </span>
                                        <p class="text">Add to Cart</p>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                
                <?php } ?>
        </div>
    </div>
</div>

    </div>
    <?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>