
<section class="best-seller default-size">
        <div class="best-saller-handler">
            <div class="container">
                <div class="row">
                        <div class="col-md-6 ">
                                <div class="section-details">
                                    <h2 class="section-title">Best Seller</h2>
                                    <!--<p>Explore & Buy Quality Tradtional Food Products at Anveshan Farm - View Natural Food Online, Get Discount on </p>-->
                                </div>
                        </div>
                        <div class="col-md-6 ">
                                <div class="section-button">
                                <!--<a style="--clr: #7808d0" class="button" href="#">-->
                                <!--    <span class="button__icon-wrapper">-->
                                <!--        <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">-->
                                <!--            <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>-->
                                <!--        </svg>-->
                                        
                                <!--        <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">-->
                                <!--            <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>-->
                                <!--        </svg>-->
                                <!--    </span>-->
                                <!--    Explore All-->
                                <!--</a>-->
                                </div>
                        </div>
                </div>
                


                <div class="best-saller-prodects-list">
                    <div class="swiper Prodectslist">
                        <div class="swiper-wrapper">
                        <?php while($q = mysqli_fetch_array($prodectsearch_result)):?>
                            <div class="swiper-slide">
                                <a href="products/<?php echo $q['urlname']?>">
                                <div class="prodect-details">
                                    <div class="prodect-img">
                                    <span class="badge">New</span>
                                    <img src="admin/imageView.php?id=<?php echo $q["id"];?>" style="width:100%;  border-top-right-radius:5px;border-top-left-radius:5px;">
                                    </div>
                                    <div class="prodect-content">
                                        <h2><?php echo substr($q['name'], 0, 100);?>...</h2>
                                        
                                </a>  
                                        <div class="prodecthr"></div>
                                        <div class="prodect-cart">

                                        <span><p style=" text-decoration: line-through; color:red;">Rs.<?php echo $q['orginal_price']?></p> <b style="font-size:18px; color:green">Rs.<?php echo $q['price'];?>/-</b></span>
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
                            <?php endwhile;?>                          
                        </div>
                        
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                            <!--<div class="swiper-pagination"></div>-->
                            
                    </div>
                </div>


            </div>
        </div>
    </section>