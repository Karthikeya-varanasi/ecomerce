
    <?php 
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/homehead.php';
                    

  
    include 'includes/Layout_pages/Header.php';
    include 'Pages/slider.php';
    if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
    ?>

<?php
    $query = "SELECT * FROM `a_products` WHERE Feature_catogery_id	= 1";
    $prodectsearch_result = filterTable($query);
?>

    <section class="catogery-section default-size" >
        <div class="container">
            
            
               <div class="customer-support">
                    <div class="customer-support-handler" id="deskspec">
                        
                        
                                  <div class="customer-support-middle">
                            <div class="customer-support-data">
                                <div class="customer-supportimg">
                                    <img src="assets/images/support/warranty-100.png" alt=""> 
                                </div>                               
                                <div class="customer-support-text">
                                    <h3>1 Year Warranty</h3>
                                    <p>1 Year Warranty</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- First Division -->
                       
                        
                        <div class="supporthr"></div>
                
                        <!-- Second Division -->
                         <div class="customer-support-left">
                            <div class="customer-support-data">
                                <div class="customer-supportimg">
                                    <img src="assets/images/support/icons8-emi-100.png" alt=""> 
                                </div>                               
                                <div class="customer-support-text">
                                    <h3>No Cost EMI</h3>
                                    <p>No Cost EMI</p>
                                </div>
                            </div>
                        </div>
                      
                  
                        <div class="supporthr"></div>
                
                        <!-- Third Division -->
                            <div class="customer-support-right">
                            <div class="customer-support-data">
                                <div class="customer-supportimg">
                                    <img src="assets/images/support/dispatch.png" alt=""> 
                                </div>                               
                                <div class="customer-support-text">
                                    <h3>Same Day Dispatch</h3>
                                    <p>Same Day Dispatch</p>
                                </div>
                            </div>
                        </div>
                
                        <div class="supporthr"></div>
                
                        <!-- Fourth Division -->
                        <div class="customer-support-rightmost">
                            <div class="customer-support-data">
                                <div class="customer-supportimg">
                                    <img src="assets/images/support/cod.png" alt=""> 
                                </div>                               
                                <div class="customer-support-text">
                                    <h3>Cash on Delivery</h3>
                                    <p>Cash on Delivery</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                    
                    <div class="customer-support-handler" id="mobspec">
                        
                        
                           <div>
                                  <div class="customer-support-middle">
                            <div class="customer-support-data">
                                <div class="customer-supportimg">
                                    <img src="assets/images/support/warranty-100.png" alt=""> 
                                </div>                               
                                <div class="customer-support-text">
                                    <h3>1 Year Warranty</h3>
                                    <!--<p>1 Year Warranty</p>-->
                                </div>
                            </div>
                        </div>
                        
                        <!-- First Division -->
                       
                        
                        <div class="supporthr"></div>
                
                        <!-- Second Division -->
                         <div class="customer-support-left">
                            <div class="customer-support-data">
                                <div class="customer-supportimg">
                                    <img src="assets/images/support/icons8-emi-100.png" alt=""> 
                                </div>                               
                                <div class="customer-support-text">
                                    <h3>No Cost EMI</h3>
                                    <!--<p>No Cost EMI</p>-->
                                </div>
                            </div>
                        </div>
                           </div>
                  
                        <div class="supporthr"></div>
                
                        <!-- Third Division -->
                       <div>
                            <div class="customer-support-right">
                            <div class="customer-support-data">
                                <div class="customer-supportimg">
                                    <img src="assets/images/support/dispatch.png" alt=""> 
                                </div>                               
                                <div class="customer-support-text">
                                    <h3>Same Day Dispatch</h3>
                                    <!--<p>Same Day Dispatch</p>-->
                                </div>
                            </div>
                        </div>
                
                        <div class="supporthr"></div>
                
                        <!-- Fourth Division -->
                        <div class="customer-support-rightmost">
                            <div class="customer-support-data">
                                <div class="customer-supportimg">
                                    <img src="assets/images/support/cod.png" alt=""> 
                                </div>                               
                                <div class="customer-support-text">
                                    <h3>Cash on Delivery</h3>
                                    <!--<p>Cash on Delivery</p>-->
                                </div>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>

            <div class="catogery-handler">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="section-details">
                                <h2 class="section-title">Explore By Category</h2>
                                <!--<p>Explore & Buy Quality Tradtional Food Products at Anveshan Farm - View Natural Food Online, Get Discount on </p>-->
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                  
                    </div>
                </div>

                <div class="catogerie">
                    <div class="swiper catogeriey">
                        <div class="swiper-wrapper">

                        <?php while($q = mysqli_fetch_array($catosearch_result)):?>
                        <!-- catogeries start -->
                        <div class="swiper-slide">
                            <div class="catogeries-box">
                                <div class="catogeries">
                                    <a href="category/<?php echo $q['prodect_catogery_Title'];?>">
                                    <div class="catogeries-overlay"></div>
                                    <img src="admin/imageView.php?prodect_catogery_id=<?php echo $q["prodect_catogery_id"];?>" style="width:100%; border-top-right-radius:5px;border-top-left-radius:5px;">
                                    
                                    <div class="catogeries-details fadeIn-bottom">
                                        <h3 class="content-title"><?php echo $q['prodect_catogery_Title'];?></h3>
                                        <!-- <p class="content-text"><?php echo $q['prodect_catogery_Title'];?></p> -->
                                    </div>
                                    </a>
                                </div>
                                
                                <h5><?php echo $q['prodect_catogery_Title'];?></h5>
                            </div>
                        </div>
                        <!-- catogeries end -->
                       
                        <?php endwhile;?>
                        </div>
                    </div>
                </div>


                <!--<div class="section-button" id="mobbtn">-->
                <!--            <a style="--clr: #7808d0" class="button" href="#">-->
                <!--                <span class="button__icon-wrapper">-->
                <!--                    <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">-->
                <!--                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>-->
                <!--                    </svg>-->
                                    
                <!--                    <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">-->
                <!--                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>-->
                <!--                    </svg>-->
                <!--                </span>-->
                <!--                Explore All-->
                <!--            </a>-->
                <!--            </div>-->
            </div>
        </div>

    </section>
<?php
    include 'Pages/Best-seller.php';
    
    include 'Pages/featured-prodects.php';
?>


    
    <?php
    include 'Pages/vision.php';

    ?>
    
    
    
<div class="testimonials-section">
 <div class="section-title-design">
                                    <span class="title-water-print">Testimonals</span>
                                    <span class="title-tag">Testimonals</span>
                                </div>
                    <div class="swiper testimonials-swiper" id="testipositab">
        <div class="swiper-wrapper">
             
            <div class="swiper-slide">
                <div class="testimonial">
                    <p class="testimonial-text">"The hoverboard I purchased exceeded my expectations! It's smooth, fast, and perfect for my daily commute. The battery lasts long, and it's super easy to control. Highly recommend it for anyone looking for a fun and practical ride!"</p>
                    <h4 class="testimonial-name">- John Doe</h4>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial">
                    <p class="testimonial-text">"I bought this hoverboard for my son, and he absolutely loves it! The build quality is amazing, and it feels super safe with the self-balancing feature. It’s been a hit at family outings and with his friends. Great product!"</p>
                    <h4 class="testimonial-name">- Jane Smith</h4>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial">
                    <p class="testimonial-text">"As a first-time hoverboard user, I was hesitant, but this product made it so easy to learn! It’s lightweight, stylish, and durable. I've been using it every weekend, and it’s become my favorite way to explore the city!"</p>
                    <h4 class="testimonial-name">- Alex Brown</h4>
                </div>
            </div>
        </div>
        <!--<div class="swiper-pagination"></div>-->
    </div>
                
</div>

    <div class="mega-tag" style="padding-bottom:3%">
        

                <div class="container">
                                   <div style="text-align:center; font-family:var( --primary-font); ">
                                        <h3 style="font-size:23px; ">About Megatron India</h3>
                                   </div>
                                  
                                    <span><b>Are You Desiring to have Adventures and Fun Ride all Over the City?</b></span>
                                    <p>Hoverboards is one of the best entertaining adventure’s device to move around the city in a stylish manner. Nowadays, every board is updated with the standard quality of material and the technology regularly by launching new models into the market. So that, you can have a safe ride with the advanced features of the hoverboard in India. Most of the people love to have an adventures ride on a hoverboard in a safe manner without harming their arms and legs</p>
                                    
                                    <div class="read-more-content">
                                        <p class="nomargin">We, Megatron India offers the various models of Megatron with advanced features to have a safe ride. If you are seeking to purchase the best standard product within an affordable price, then hoverboards India is the right platform to shop online in India. We offer various stylish Megatron collections such as;  10 Inch boards, 6.5 Inch, 8 Inch, Black, Gold, Blue, Graffiti, Red and White Megatron. Browse best price list on our website</p>
                                        <p>All these various collections of Megatron which are offering by Megatron India are affordable to everyone. In MegatronIndia.in, this product will be supplied in various sizes such as 10, 6.5 and 8 inches and net weight is nearly 15 kgs which can handle a maximum load of 120 kgs. Now these boards are available in the format of electric, where you can charge and have a fun ride. The outer body is build up with both durable and fire resistant, which helps to avoid the overheats of the battery system.</p>
                                        <p><b>Most of the similar features that which are available in hoverboards offered by us:</b></p>
                                        
                                        <ul class="status-meeting" style="padding-left:30px;">
                                            <li> Megatron runs with high-speed CPU that which gives ultra fast reaction while riding. Some boards come with monster tyres, which has great grip and holds a maximum weight of 120 kgs.</li>
                                            <li> All these self-balancing scooters have updated with new safety standard for electric systems.</li>
                                            <li>Original Samsung battery with 4400 MAH, where hoverboard can run for 10 to 12 miles with a full charge. Life of the battery will be 3 years until the water gets inside the battery.</li>
                                            <li>The charger which is offered through hoverboard is Premium UL Certified. A special feature added to hoverboards is overcharging protection, Auto power offs will be activated when the battery was fully charged.</li>
                                            <li>For those who love to listen to music are lucky enough to have Bluetooth speakers with Remote control, that which has 24 months extended warranty as well.</li>
                                            <li>All the custom operations of your board can be controlled through the smart device app with Bluetooth connectivity.</li>
                                            <li>Boards are featured with a single control system with the premium high-performance motherboard.</li>
                                            <li>The technology which is used for the hoverboard will be helpful to the rider to have a safe and smooth ride.</li>
                                            <li>Speed protection alert will slow down the speeds of the board when the rider exceeds the maximum speed while riding.</li>
                                        </ul>
                                        <p>Megatron India offers the best Megatron with crazy features in it and this is the best online platform to shop Megatron at a reasonable price. We, Megatron India not only supply the Megatron and self-balancing scooters with multiple features but also satisfies our customers by giving the exciting offers and extend the warranty time period for an inbuilt system of megtron. We are one of the best suppliers of megtron in India for within less span of time.</p>
                                        <p>To know more about the specific features of each and every hoverboard and hoverboard price in India, check out on hoverboardsindia.in. So still what you are looking for, stay back where you are and grab your smartphones to shop the best standard hoverboard that you is desired to have on Megatronindia.</p>
                                        <p><b>Buy Optimum Quality Hoverboards in India at Affordable Price</b></p>
                                        <p>Our experts have gained a name as a reputed retailer for supplying the latest mobility solutions. We have specialization in hoverboards and self-balancing scooters in different regions of India. Our experts always stay committed to introducing next-gen electric hoverboards by designing with a few outstanding features at an affordable price. Our hoverboards are not only suitable for adults but also are kid-friendly. You only have to Google hoverboard in India to get information on hoverboards available at different prices with diverse terms related to the warranty period.</p>
                                        <p><b>The Best Hoverboards and Mobility Solutions</b></p>
                                        <p>The best quality mobility solutions at a pocket-friendly price have made us a leading seller of hoverboards in almost every metro city of India. Besides hoverboards, we are a leading supplier of mini segways and electric scooters.</p>
                                        <p><b>Exclusive Range of</b></p>
                                        <p>Affordable and Trendy Hoverboards</p>
                                        <p>While searching for hoverboard prices in India, you will likely get information about our exclusive range of affordable and trendy hoverboard skates. The in-built technology of our mobile devices is enough to give a wonderful experience to our customers. Our team always stays committed to our customers’ safety, durability, reliability, and comfort. Hence, we have set leading benchmarks for supplying classic and budget-friendly hoverboards in all-over India.</p>
                                        
                                    </div>
                                    <a href="javascript:void(0);" class="read-more" style="background-color:red; padding:15px 30px;color:white;" title="Read More">Read More</a>

                 </div>
    </div>
    <?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script src="assets/js/main.js"></script>
    <script >



$('.read-more').click(function() {
        $(this).prev().slideToggle();
        if (($(this).text()) == "Read More") {
            $(this).text("Read Less");
        } else {
            $(this).text("Read More");
        }
    });
    </script>
</body>
</html>
