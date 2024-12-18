<?php 
    
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';  



    if(isset($_REQUEST['addto_cart'])){
        $prod_id = $_REQUEST['prod_id'];
        $price = $_REQUEST['price'];
        $prod_name = $_REQUEST['prod_name'];
        $prod_qty = $_REQUEST['prod_qty'];

        $select_cart = mysqli_query($conn, "SELECT * FROM `carts` WHERE prod_id = '$prod_id' AND user_id = '$user_id'");
        
        if(mysqli_num_rows($select_cart) > 0){
            $message[] = 'product already added to cart!';
        }else{
            mysqli_query($conn, "INSERT INTO `carts`(user_id, prod_id, prod_name, price, prod_qty) VALUES('$user_id', '$prod_id', '$prod_name', '$price', '$prod_qty')");
            $message[] = 'product added to cart!';
        }
    
        
    }
    

    

    if(isset($_REQUEST['product_search_id'])){
        $id = $_REQUEST['product_search_id'];
        // $sql = "SELECT * FROM a_products WHERE id = $id";
          $sql = "SELECT * FROM a_products WHERE urlname = '".$id."' ";
         
        $query = mysqli_query($conn, $sql);
    }

$q = mysqli_fetch_array($query);

$id = $q['id'];
$product_cost = $q['price'];
$product_cost_paisa = $product_cost*100;

    ?>

    <style>

 .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }


    .swiper {
      width: 100%;
      margin-left: auto;
      margin-right: auto;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2 {
      height: auto;
      width: 100%;
    }

    .mySwiper {
      height: auto;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .mySwiper .swiper-slide {
      width: 10%!important;
      height: 100%;
      opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
      opacity: 1;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
      .video-container {
            width: 100%;
            height: 100%;
            position: relative;
        }
        .video-container iframe {
            width: 100%;
            height: revert-layer;
        }
    </style>

    <div class="prodect-main">
        <div class="container" id="sizeoverdue">
            <section class="prodect-data row">
               

                <div class="prodect-discription col-md-10">



                    <div class='col-md-6'>

                            <input type='hidden' id='video1' value="<?php echo $q['video1'];?>">
                            <input type='hidden' id='video2' value="<?php echo $q['video2'];?>">
                            <input type='hidden' id='video3' value="<?php echo $q['video3'];?>">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="admin/imageView.php?id=<?php echo $q["id"];?>"  class='prod_thumb_image' onclick="imageChanger('admin/imageView.php?id=<?php echo $q["id"];?>')"> </div>
                                <?php
                                            if($q['video1']!=''){
                                                ?>
                                                    <div class="swiper-slide">
                                                    <div class="video-container">
                                        <div id="player1"></div>
                                    </div>

                                                    <!-- <img src="https://img.youtube.com/vi/<?php echo $q['video1'];?>/default.jpg"  data-video-id="<?php echo $q['video1'];?>" alt="Thumbnail 1"  class='prod_thumb_image video-trigger' onclick="imageChanger('https://img.youtube.com/vi/<?php echo $q['video1'];?>/default.jpg')"> -->
                                                        <!-- <iframe id="player0" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $q['video1'];?>?enablejsapi=1&html5=1&rel=0" frameborder="0" allowfullscreen iframe-video></iframe> -->
                                                </div>
                                                <!-- <img src="https://img.youtube.com/vi/VIDEO_ID/default.jpg" alt="Thumbnail"> -->
                                                <!-- class="video-trigger" -->
                                                <?php
                                            }
                                            ?>
                                <?php
                                            if($q['video2']!=''){
                                                ?>
                                                    <div class="swiper-slide">
                                                        <div class="video-container">
                                        <div id="player2"></div>
                                    </div>
                                                    <!-- <img src="https://img.youtube.com/vi/<?php echo $q['video2'];?>/default.jpg"  data-video-id="<?php echo $q['video2'];?>" alt="Thumbnail 1"  class='prod_thumb_image video-trigger' onclick="imageChanger('https://img.youtube.com/vi/<?php echo $q['video2'];?>/default.jpg')"> -->
                                                    <!-- <iframe id="player0" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $q['video2'];?>?enablejsapi=1&html5=1&rel=0" frameborder="0" allowfullscreen iframe-video></iframe> -->
                                                </div>
                                                <!-- <img src="https://img.youtube.com/vi/VIDEO_ID/default.jpg" alt="Thumbnail"> -->
                                                <?php
                                            }
                                            ?>
                                <?php
                                            if($q['video3']!=''){
                                                ?>
                                                    <div class="swiper-slide">
                                                    <!--  <img src="https://img.youtube.com/vi/<?php echo $q['video3'];?>/default.jpg"  data-video-id="<?php echo $q['video3'];?>" alt="Thumbnail 1"  class='prod_thumb_image video-trigger' onclick="imageChanger('https://img.youtube.com/vi/<?php echo $q['video3'];?>/default.jpg')"> -->
                                                    <!--  <iframe id="player0" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $q['video3'];?>?enablejsapi=1&html5=1&rel=0" frameborder="0" allowfullscreen iframe-video></iframe> -->
                                                    <div class="video-container">
                                        <div id="player3"></div>
                                    </div>
                                                </div>
                                                <!-- <img src="https://img.youtube.com/vi/VIDEO_ID/default.jpg" alt="Thumbnail"> -->
                                                <?php
                                            }
                                            ?>
                                                <?php

                                                    
                                                    $first_image = '';

                                                        $prod_img_sql = "SELECT * FROM product_images where prod_id='$id'";
                                                        $prod_img_query = mysqli_query($conn, $prod_img_sql);
                                                    while($prod_images =mysqli_fetch_assoc($prod_img_query)){ 
                                                        // var_dump($prod_images);
                                                        $first_image = "admin/".$prod_images["file_path"];
                                                        ?>

                                                        
                                
                                        
                                        <div class="swiper-slide"> <img src="admin/<?php echo $prod_images["file_path"]; ?>"  class='prod_thumb_image' onclick="imageChanger('admin/<?php echo $prod_images["file_path"]; ?>')"> </div>
                                        
                                    
                                
                                    


                                                            
                                                            

                                                    <?php  } ?>
                            </div>
                            <!--<div class="swiper-button-next"></div>-->
                            <!--<div class="swiper-button-prev"></div>-->
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="admin/imageView.php?id=<?php echo $q["id"];?>"  class='prod_thumb_image' onclick="imageChanger('admin/imageView.php?id=<?php echo $q["id"];?>')"> </div>
                                <?php
                                            if($q['video1']!=''){
                                                ?>
                                                    <div class="swiper-slide"><img src="https://img.youtube.com/vi/<?php echo $q['video1'];?>/default.jpg"  data-video-id="<?php echo $q['video1'];?>" alt="Thumbnail 1" style="width: 100%; height:55px;"  class='prod_thumb_image ' onclick="imageChanger('https://img.youtube.com/vi/<?php echo $q['video1'];?>/default.jpg')"></div>
                                                <!-- <img src="https://img.youtube.com/vi/VIDEO_ID/default.jpg" alt="Thumbnail"> -->
                                                <!-- class="" -->
                                                <?php
                                            }
                                            ?>
                                <?php
                                            if($q['video2']!=''){
                                                ?>
                                                    <div class="swiper-slide"><img src="https://img.youtube.com/vi/<?php echo $q['video2'];?>/default.jpg"  data-video-id="<?php echo $q['video2'];?>" alt="Thumbnail 1"  class='prod_thumb_image ' onclick="imageChanger('https://img.youtube.com/vi/<?php echo $q['video2'];?>/default.jpg')"></div>
                                                <!-- <img src="https://img.youtube.com/vi/VIDEO_ID/default.jpg" alt="Thumbnail"> -->
                                                <?php
                                            }
                                            ?>
                                <?php
                                            if($q['video3']!=''){
                                                ?>
                                                    <div class="swiper-slide"><img src="https://img.youtube.com/vi/<?php echo $q['video3'];?>/default.jpg"  data-video-id="<?php echo $q['video3'];?>" alt="Thumbnail 1"  class='prod_thumb_image ' onclick="imageChanger('https://img.youtube.com/vi/<?php echo $q['video3'];?>/default.jpg')"></div>
                                                <!-- <img src="https://img.youtube.com/vi/VIDEO_ID/default.jpg" alt="Thumbnail"> -->
                                                <?php
                                            }
                                            ?>
                                                <?php

                                                    
                                                    $first_image = '';

                                                        $prod_img_sql = "SELECT * FROM product_images where prod_id='$id'";
                                                        $prod_img_query = mysqli_query($conn, $prod_img_sql);
                                                    while($prod_images =mysqli_fetch_assoc($prod_img_query)){ 
                                                        // var_dump($prod_images);
                                                        $first_image = "admin/".$prod_images["file_path"];
                                                        ?>

                                                        
                                
                                        
                                        <div class="swiper-slide"> <img src="admin/<?php echo $prod_images["file_path"]; ?>"  class='prod_thumb_image' onclick="imageChanger('admin/<?php echo $prod_images["file_path"]; ?>')"> </div>
                                        
                                    
                                
                                    


                                                            
                                                            

                                                    <?php  } ?>
                            </div>
                            </div>
</div>

                  
                    

               
                    <div class="prodect-detail-description"style="width:100%;">
                        <h1><?php echo $q['name']?></h1>
                        
                        <p>
                            <?php
$p_state = $q['p_state'];

if ($p_state == 1) {
    echo '<button class="btn btn-success btn-sm">In Stock ..</button>';
}  else {
    echo '<button class="btn btn-danger btn-sm">Out Of Stock ...</button>';
}
?>
                        </p>
                        <p><?php echo $q['prodect_description']?></p>
                        <p style="color:green;font-family:var(--second-font); font-size:22px; font-weight:400;"> <span style="color:red; font-size:14px;">Rs. <?php echo $q['orginal_price']?></span> Rs.  <b ><?php echo $q['price'];?>/-</b> </p>

                        

                        <?php
                        if(isset($message)){
                            foreach($message as $message){
                               echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
                            }
                         }
                        ?>

                        <div class="accordion active">
                            <!--<div class="accordion-item">-->
                            <!--<button id="accordion-button-1" aria-expanded="false">-->
                            <!--    <span class="accordion-title">Specifications</span>-->
                            <!--    <span class="icon" aria-hidden="true"></span>-->
                            <!--</button>-->
                            <!--<div class="accordion-content">-->
                            <!--    <p>-->
                            <!--    </p>-->
                            <!--</div>-->
                            <!--</div>-->
                            <div class="accordion-item">
                            <button id="accordion-button-2" aria-expanded="false">
                                <span class="accordion-title">Discounts & Offers</span>
                                <span class="icon" aria-hidden="true"></span>
                            </button>
                            <div class="accordion-content">
                                <div id="razorpay-affordability-widget"> </div>
                            </div>
                            </div>
                        </div>

                       
                        <div class="prodect-discription-cart">
                            
                            
                               
                        
                        <form action='cart.php' method="post">
                                            <input type='hidden' name='product_id' value='<?php echo $q['id']?>' />
                                            <!-- <input type='hidden' name='quantity' value='1' /> -->
                                             <div class="input-group mb-3" style="width: 130px">
                        <button class="input-group-text decrement-btn emi_update">-</button>
                        <input type="number" class="form-control prodectqty text-center bg-white emi_update" value="1" name='quantity'  >
                        <button class="input-group-text increment-btn emi_update" >+</button>
                        </div>

                                        <button class="CartBtn" type="submit" name='add_to_cart' >
                                            <!-- href="cart.php?id=<?php echo $q['id']?>" -->
                                        <span class="IconContainer"> 
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        </span>
                                        <p class="text">Add to Cart</p>
                                        </button>

                                    </form>
                                    
                                    <div class="accordion active">
                     
                        <!--<div class="accordion-item">-->
                        <!--    <button id="accordion-button-2" aria-expanded="false">-->
                        <!--        <span class="accordion-title">Discounts & Offers</span>-->
                        <!--        <span class="icon" aria-hidden="true"></span>-->
                        <!--    </button>-->
                        <!--    <div class="accordion-content">-->
                        <!--       <div id="razorpay-affordability-widget"> </div>-->
                               
                        <!--    </div>-->
                        <!--    </div>-->
                        </div>
                      
                      
                        </div>
                        
                        
                        
                        
                        
                    </div>
                </div>
                <hr>
                <div class="desper-size">
                    <h3>Description</h3>
                                        <?php echo $q['prodect_info']?>
                                        
                                        <h4>More information:</h4>
                    <?php echo $q['prodect_specifications']?>
                </div>
            </section>
        </div>
    </div>

  
    <?php
      include 'Pages/whymegtron.php';
    include 'Pages/Best-seller.php';?>
    <!--<section class="prodect-video default-size">-->
    <!--    <div class="prodect-video-handler">-->
    <!--    <div class="prodect-video-desc">-->
    <!--            <h2>Welcome to the Prodect</h2>-->
    <!--            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>-->
    <!--        </div>-->
    <!--        <div class="video-bar">-->
                
    <!--                                <?php-->
    <!--                if($q['video1']!=''){-->
    <!--                    ?>-->
    <!--                     <img src="https://img.youtube.com/vi/<?php echo $q['video1'];?>/default.jpg" class="video-trigger" data-video-id="<?php echo $q['video1'];?>" alt="Thumbnail 1" style="width: 50%; height:50px; border:1px solid #000; padding: 5px; margin:5px; clear: both;" class='prod_thumb_image'>-->
                     <!-- <img src="https://img.youtube.com/vi/VIDEO_ID/default.jpg" alt="Thumbnail"> -->
    <!--                    <?php-->
    <!--                }-->
    <!--                ?>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</section>-->
 



    <!--<section class=" default-size">-->
    <!--    <div class="best-saller-handler">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
    <!--                    <div class="col-md-6 ">-->
    <!--                            <div class="section-details">-->
    <!--                                <h2 class="section-title">Reviews</h2>-->

    <!--                            </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6 ">-->
    <!--                            <div class="section-button">-->
    <!--                            <a style="--clr: #7808d0" class="button" href="#">-->
    <!--                                <span class="button__icon-wrapper">-->
    <!--                                    <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">-->
    <!--                                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>-->
    <!--                                    </svg>-->
                                        
    <!--                                    <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">-->
    <!--                                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>-->
    <!--                                    </svg>-->
    <!--                                </span>-->
    <!--                                Explore All-->
    <!--                            </a>-->
    <!--                            </div>-->
    <!--                    </div>-->
    <!--            </div>-->
                




    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>

    <script>

 // var swiper = new Swiper(".mySwiper", {});
  var swiper = new Swiper(".mySwiper", {
      spaceBetween: 0,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
       
    });
  var swiper2

  document.addEventListener('DOMContentLoaded', function() {
            swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
    //   autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    //   },
      on: {
                slideChange: function () {
                    players.forEach(player => player.pauseVideo());
                    swiper.autoplay.start();
                }
            },
      rewind: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });

    });



    // let player;

    let players = [];
        function onYouTubeIframeAPIReady() {
        /*player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: 'GnD2ZigSee8', // Replace with your YouTube video ID
            events: {
                'onStateChange': onPlayerStateChange
            }
        });*/
            let video1 = $('#video1').val();
            let video2 = $('#video2').val();
            let video3 = $('#video3').val();

            const videoIds = [video1 , video2, video3]; // Replace with your YouTube video IDs

        videoIds.forEach((videoId, index) => {
            const player = new YT.Player(`player${index + 1}`, {
                height: '390',
                width: '640',
                videoId: videoId,
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
            players.push(player);
        });
    }

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
            swiper2.autoplay.stop();
        } else if (event.data == YT.PlayerState.PAUSED || event.data == YT.PlayerState.ENDED) {
            swiper2.autoplay.start();
        }
    }




$(document).ready(function() {
    var currentIndex = 0;
    var totalImages = $('.imageslist img').length;
    console.log(totalImages)

    $('.next').click(function() {
        currentIndex = (currentIndex + 1) % totalImages;
        updateCarousel();
    });

    $('.prev').click(function() {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
        updateCarousel();
    });

    function updateCarousel() {
        // var translateValue = -currentIndex * $('.images img').eq(0).width();
        // $('.images').css('transform', 'translateX(' + translateValue + 'px)');
           var currentImageSrc = $('.imageslist img').eq(currentIndex).attr('src');
           // console.log(currentImageSrc,currentIndex);
        
           $('.imageslist img').eq(currentIndex).trigger('click');

        // document.getElementById("myimage").src=currentImageSrc; 

    }
});

document.addEventListener('DOMContentLoaded', function() {
  // Get references to image elements and YouTube player container
  const videoTriggers = document.querySelectorAll('.video-trigger');
  const playerContainer = document.getElementById('youtube-player');

  // Add click event listeners to each image
  videoTriggers.forEach(function(trigger) {
    trigger.addEventListener('click', function() {
        $('#myimage').hide();
        $('#youtube-player').show();
      // Get the video ID from the clicked image's data attribute
      const videoId = trigger.getAttribute('data-video-id');

      // Embed the YouTube video player with the specified video ID
      embedYouTubeVideo(videoId);
    });
  });

  // Function to embed YouTube video
  function embedYouTubeVideo(videoId) {
    playerContainer.innerHTML = `
      <iframe
        width="560"
        height="315"
        src="https://www.youtube.com/embed/${videoId}?"
        frameborder="0"
        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    `;
  }
});




        function imageChanger(newimage) { 
             $('#myimage').show();
             const playerContainer = document.getElementById('youtube-player');
             playerContainer.innerHTML='';
              $('#youtube-player').hide();
document.getElementById("myimage").src=newimage; 
} 

        const key = "<?php echo $razorpayKeyId;?>"; //Replace it with your Test Key ID generated from the Dashboard
const amount = <?php echo $product_cost_paisa;?>; //in paise

window.onload = function() {
const widgetConfig = {
    "key": key,
    "amount": amount,
};
const rzpAffordabilitySuite = new RazorpayAffordabilitySuite(widgetConfig);
rzpAffordabilitySuite.render();
}

        
  const items = document.querySelectorAll('.accordion button');

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach((item) => item.addEventListener('click', toggleAccordion));

    </script>
    <script>
    // magnify("myimage", 3);

</script>

<script>
      var swiper = new Swiper(".Whytronn", {
      slidesPerView: 2,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 10,
        },
        
      },
       navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
</script>

<?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
   
    <script src="assets/js/main.js"></script>
</body>
</html>