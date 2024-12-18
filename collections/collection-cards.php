

<div class="container-fluidd">
        
        <div class="col-md-12 mt-3" >
            <div class="card " style="border:none;">
                <div class="card-body row "  id="prodect-scroll" >
                        
                        <?php 
                        while($q=mysqli_fetch_array($query)){
                        ?>
                        <div class="col-md-3 mt-3">
                            <div class="border" style="border-radius: 5px;">
                            <a href="products/<?php echo $q['urlname']?>">
                                <div class="prodect-details">
                                    <div class="prodect-img">
                                    <img src="admin/imageView.php?id=<?php echo $q["id"];?>" alt="">
                                    </div>
                                    <div class="prodect-content">
                                        <p style="color:black;"><?php echo substr($q['name'], 0, 40);?>...</p>    
                                        
                                        <div class="prodecthr"></div>
                                        <div class="prodect-cart">
                                        <span style="display:block;"><i class="fa-solid fa-indian-rupee-sign"></i>.<b><?php echo $q["price"]; ?></b>/-</span>
                                        <form action='cart.php' method="post">
                                            <input type='hidden' name='product_id' value='<?php echo $q['id']?>' />
                                            <input type='hidden' name='quantity' value='1' />

                                        <button class="CartBtn" type="submit" name='add_to_cart' >
                                            <!-- href="cart.php?id=<?php echo $q['id']?>" -->
                                        <span class="IconContainer"> 
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        </span>
                                        <p class="text" >Add to Cart</p>
                                        </button>

                                    </form>
                                        </div>
                                    </div>
                                </div>  
                                </a>         
                            </div>
                        </div>
                        
                        <?php }  ?>
                </div>
            </div>
        </div>
        
            </div>