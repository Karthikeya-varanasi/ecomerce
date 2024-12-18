
<?php 
    
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';

    if(isset($_REQUEST['prodect_catogery_id'])){
        $prodect_catogery_id = $_REQUEST['prodect_catogery_id'];
        // $sql = "SELECT * FROM a_products WHERE prodect_catogery_id = $prodect_catogery_id";
        $sql = "SELECT * FROM a_products ap,prodect_catogery pc WHERE pc.prodect_catogery_id=ap.prodect_catogery_id and ap.prodect_status='1' and pc.prodect_catogery_Title = '".$prodect_catogery_id."' ";
        $query = mysqli_query($conn, $sql);
    }else{
        $sql = "SELECT * FROM a_products";
        $query = mysqli_query($conn, $sql);
    }
    ?>
    <div class="container-fluidd">
        
        <div class="col-md-12 mt-3" >
            <div class="card " style="border:none;">
                <div class="card-body row "  id="prodect-scroll" >
                        
                        <?php foreach($query as $q){ ?>
                        <div class="col-md-4 mt-3">
                            <div class="border" style="border-radius: 5px;">
                            <a href="products/<?php echo $q['urlname']?>">
                                <div class="prodect-details">
                                    <div class="prodect-img">
                                    <img src="admin/imageView.php?id=<?php echo $q["id"];?>" alt="">
                                    </div>
                                    <div class="prodect-content">
                                        <p><?php echo substr($q['name'], 0, 200);?>...</p>    
                                        <h2><?php echo substr($q['prodect_description'], 0, 130);?>...</h2>
                                        <div class="prodecthr"></div>
                                        <div class="prodect-cart">
                                        <span style="display:block;font-size:20px;"><i class="fa-solid fa-indian-rupee-sign"></i>.<b><?php echo $q["price"]; ?></b>/-</span>
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
                                </a>         
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