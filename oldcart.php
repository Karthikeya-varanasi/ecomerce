<!--<?php -->
<!--    session_start();-->

<!--    require_once 'core/conn.php';-->
<!--    include 'admin/functions/user-logic.php';-->
<!--    include 'includes/Layout_pages/head.php';-->
<!--    include 'includes/Layout_pages/Header.php';  -->
 // $product_id = $_REQUEST['id'];
    /*if(empty($_SESSION['user_id'])){
          echo "<script> window.location.href = 'login.php';  </script>";
        exit;
  
    }*/
<!--    if (!isset($_SESSION['cart'])) {-->
<!--    $_SESSION['cart'] = array();-->
<!--}-->

<!--$coupon_amount = 0;-->
<!--if(@$_SESSION['coupon_status']=="Y"){-->
<!--    $coupon_amount = $_SESSION['coupon_amount'];-->
<!--}-->
    /*else if($product_id<0){
         echo "<script> alert('Invalid access');
         window.location.href = 'index.php';  </script>";
        exit;


       
    }else if($product_id>0 ){


    $quantity = 1;
    

    // Check if product already exists in cart, if so, update quantity
  if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Add product to cart
        $product_query = "SELECT * FROM a_products WHERE id = $product_id";
        $product_res = mysqli_query($conn, $product_query);
        $products = mysqli_fetch_array($product_res);

       
        $_SESSION['cart'][$product_id] = array(
            'name' => $products['name'],
            'price' => $products['price'],
            'quantity' => $quantity
        );
        
    }

             


    }*/

<!--    if (isset($_POST['add_to_cart'])) {-->
<!--    $product_id = $_POST['product_id'];-->
<!--    $quantity = $_POST['quantity'];-->

    // Check if product already exists in cart, if so, update quantity
<!--     if (isset($_SESSION['cart'][$product_id])) {-->
<!--        $_SESSION['cart'][$product_id]['quantity'] += $quantity;-->
<!--    } else {-->

<!--        $product_query = "SELECT * FROM a_products WHERE id = $product_id";-->
<!--        $product_res = mysqli_query($conn, $product_query);-->
<!--        $products = mysqli_fetch_array($product_res);-->
        // Add product to cart
        // $_SESSION['cart'][$product_id] = array(
        //     'name' => $products[$product_id]['name'],
        //     'price' => $products[$product_id]['price'],
        //     'quantity' => $quantity
        // );
<!--        $_SESSION['cart'][$product_id] = array(-->
<!--            'name' => $products['name'],-->
<!--            'price' => $products['price'],-->
<!--            'quantity' => $quantity-->
<!--        );-->
<!--    }-->
<!--    $_SESSION['message'] = "Cart Updated";-->

<!--    unset($_POST);-->
<!--}-->

<!--    if (isset($_POST['coupon_submit'])) {-->
<!--    $coupon_code = $_POST['coupon_code'];-->
    

<!--         $coupon_query = "SELECT * FROM coupons WHERE coupon_code = '$coupon_code'";-->
<!--        $coupon_res = mysqli_query($conn, $coupon_query);-->
<!--        $coupons = mysqli_fetch_array($coupon_res);-->
<!--         $coupon_count  = mysqli_num_rows($coupon_res);-->
<!--        if($coupon_count>0){-->
<!--             $_SESSION['coupon_code'] = $coupon_code;-->
<!--            $_SESSION['coupon_amount'] = $coupons['coupon_amount'];-->
<!--            $_SESSION['coupon_status'] = 'Y';-->
<!--            echo "<script> alertify.success('Coupon Applied Successfully');-->
<!--        </script>";-->
<!--        echo "<script> window.location.href='cart.php';  </script>";-->
<!--        unset($_POST['coupon_submit']);-->

<!--        }else{-->

<!--            $_SESSION['coupon_code'] = '';-->
<!--            $_SESSION['coupon_amount'] = 0;-->
<!--            $_SESSION['coupon_status'] = 'N';-->
<!--            echo "<script> alertify.error('Coupon Not Applied');  </script>";-->
<!--        }-->
    

    
<!--}-->



<!--  if (isset($_POST['remove_coupon'])) {-->
     

<!--    unset($_SESSION['coupon_code']);-->
<!--    unset($_SESSION['coupon_amount']);-->
<!--    unset($_SESSION['coupon_status']);-->
     // echo "<script> window.location.reload();  </script>";
<!--        echo "<script> window.location.href='cart.php';  </script>";-->
<!--        unset($_POST['remove_coupon']);-->

<!--}-->

<!--  if (isset($_POST['update_cart'])) {-->
     

<!--    unset($_POST);-->
     // echo "<script> window.location.reload();  </script>";
<!--        echo "<script> window.location.href='cart.php';  </script>";-->
        

<!--}-->




<!--    if (isset($_POST['removeProdect'])) {-->
<!--     $product_id = $_POST['product_id'];-->
    

    // Check if product already exists in cart, if so, update quantity
<!--     if (isset($_SESSION['cart'][$product_id])) {-->
<!--        unset($_SESSION['cart'][$product_id]);-->
<!--    }-->
<!--    unset($_POST);-->
<!--}-->

<!-- if (isset($_POST['decrement'])) {-->
<!--     $product_id = $_POST['product_id'];-->
<!--     $prodectqtyhidden = $_POST['prodectqtyhidden'];-->
    

    // Check if product already exists in cart, if so, update quantity
<!--     if (isset($_SESSION['cart'][$product_id])) {-->
<!--        $_SESSION['cart'][$product_id]['quantity']  =  $prodectqtyhidden;-->
<!--    }-->
<!--    unset($_POST);-->
<!--}-->



<!--$total = 0;-->
<!--foreach ($_SESSION['cart'] as $product_id => $product) {-->
<!--    $total += $product['price'] * $product['quantity'];-->
<!--}-->

<!--$total_final = $total-$coupon_amount;-->


<!--    ?>-->




<!--<div class="pagetitle">-->
<!--        <div class="container-fluidd">-->
<!--            <h1>Cart </h1>-->
<!--            <p>Welcome to cart</p>-->
<!--        </div>-->
<!--    </div>-->
<!--    <section class="cart-page">-->
<!--        <div class="container-fluidd">-->
<!--            <div class="row">-->
<!--            <div class="col-md-8 ">-->

        <!-- table start  -->

 

            
<!--            <div class="card  py-2 px-2" >-->

<!--                <?php-->
<!--foreach ($_SESSION['cart'] as $product_id => $product) {-->
    // echo $product['name'] . " - $" . $product['price'] . " x " . $product['quantity'] . "<br>";

<!--?>-->

<!--                <div class="row">-->
<!--                    <div class="col-xl-2 col-sm-2 col-xs-2">-->
<!--                    <img width="100px" height="120px" src="admin/imageView.php?id=<?php echo $product_id;?>" alt="House">-->
<!--                    </div>-->
<!--                    <div class="col-xl-5 col-sm-5 col-xs-2">-->
<!--                    <div class="card-body" id="cartbodybox">-->
<!--                        <a href=""><h5 class="card-title cart-trtly"><?php echo $product['name'];?></h5></a>-->
<!--                        <form action="#" method='post'>-->
<!--                            <input type='hidden' name='product_id' value='<?php echo $product_id;?>' />-->
<!--                        <button class=" btn btn-outline-danger" type='submit' name='removeProdect' style="border-radius:4px; width:50px" >-->
<!--                                <i class="fa-solid fa-trash"></i>-->
                               
<!--                            </button>-->

<!--                        </form>-->
<!--                    </div>-->
<!--                    </div>-->
<!--                    <div class="col-5 col-sm-5">-->
<!--                    <div class="cart-data">-->
                    
<!--                    <div class="input-group mb-3  " style="width: 130px; ">-->
                       
<!--                            <input type='hidden' name='product_id' class='product_id' value='<?php echo $product_id;?>' />-->
<!--                            <input type="hidden" class="prodectqtyhidden" value="<?php echo $product['quantity'];?>" >-->
<!--                            <button class="input-group-text decrement-btn" type='submit' name='decrement'>-</button>-->
                       
<!--                            <input type="text" class="form-control prodectqty text-center bg-white" value="<?php echo $product['quantity'];?>" disabled>-->
                            
                           
                            
<!--                            <input type="hidden" class="prodectqtyhidden" value="<?php echo $product['quantity'];?>" >-->
<!--                            <button class="input-group-text increment-btn" >+</button>-->
<!--                        </form>-->
<!--                            </div>-->
<!--                            <p style="color:green;">Rs.<?php echo $product['price'];?>/- </p>-->
                        
                        
<!--                    </div>-->

<!--                    </div>-->
<!--                </div>-->


<!--            <?php  } ?>-->
<!--            </div>-->


        <!-- table end  -->

        <!-- continue shopping start  -->

<!--               <div class="cart-btnsto-continue-shooping">-->
<!--                    <div class="prodect-discription-cartt">-->
<!--                        <a class="CartBtnn btn btn-danger" href='index.php'>-->
<!--                            <p class="cartbtntext" style="margin:0px; font-weight:500; text-transform:uppercase;">Continue Shopping</p>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="prodect-discription-cartt">-->
<!--                        <form action='' method='post'>-->
<!--                        <button class="CartBtnn btn btn-outline-secondary" type='submit' name="update_cart">-->
<!--                            <p class="cartbtntext" style="margin:0px; font-weight:500; text-transform:uppercase;">Update Cart</p>-->
<!--                        </button>-->
<!--                    </form>-->
<!--                    </div>-->
<!--               </div>-->


               
            <!-- continue shopping end  -->


            <!-- coppen start  -->

<!--            <?php-->
<!--            if($total>$coupon_min_amount){-->
<!--            ?>-->

<!--                <div class="coupen-discount">-->
<!--                    <div class="coupen-details">-->
<!--                        <form action='' method='post'>-->

<!--                        <input type="text" style="  border-left: none;-->
<!--                            border-right: none;-->
<!--                            border-top: none;-->
<!--                            border-bottom:1px solid gray;padding:5px 0px; width:100%" placeholder="Enter Your code here" name='coupon_code' required='required'>-->
                        
<!--                            <button class="CartBtnn btn btn-outline-secondary mt-2" style="width:200px" type='submit' name='coupon_submit'>-->
<!--                                <p class="cartbtntext" style="margin:0px; font-weight:500; text-transform:uppercase;">Apply Coupon</p>-->
<!--                            </button>-->


<!--                        </form>-->

<!--                    </div>-->
<!--                </div>-->

<!--            <?php  }else{-->
<!--                $coupon_less_amount = $coupon_min_amount-$total;-->

                // echo 'Add More Rs.'.$coupon_less_amount.' to get the coupon code active';
<!--            } ?>-->

            <!-- coppen end  -->
                



<!--            </div>-->



            
            <!-- cart total start  -->

<!--            <div class="col-md-4">-->
<!--                <div class="card" >-->
<!--                <div class="card-body">-->
                    
<!--                    <h4 class="card-title">Cart Total</h4>-->
<!--                    <hr class="cart-line">-->
<!--                    <div class="cart-subtotal">-->
<!--                        <h5>Sub Total</h5>-->
<!--                        <p style="color:black;text-align:right; margin:0px;" class='total_amount'><b>Rs.<?php echo $total;?>.00/-</b> </p>-->


<!--                    </div>-->
<!--                    <?php-->
<!--                        if(@$_SESSION['coupon_status']=="Y"){-->
<!--                            ?>-->
<!--                            <form action='' method='post'>-->
<!--                            <p style="color:black; margin:0px;" >Coupon Applied <?php echo $_SESSION['coupon_code'];?>-->
                         
<!--                            <button class=" btn btn-outline-danger" type='submit' name='remove_coupon' style=" width:35px" >-->
<!--                                <i class="fa-solid fa-trash"></i>-->
                               
<!--                            </button>-->

<!--                            <b style='text-align:right;float:right;'>Rs.<?php echo $_SESSION['coupon_amount'];?>/-</b> </p>-->
<!--                        </form>-->

<!--                            <?php-->
<!--                        }-->
<!--                        ?>-->
<!--                         <form action="checkout.php" class="cartform" method='post'>-->
                    
<!--                    <hr class="cart-line">-->
<!--                        <span id='shipping_state_msg'>Free shipping to <b>India.</b></span>-->
                   
                    <!-- <select name="country" id="country" class="form-control bg-light text-dark" required='required'>
<!--                            <option value="India" selected>India</option>-->
<!--                            <option value="Australia">Australia</option>-->
<!--                        </select>-->
<!--                        <select name="state" id="state" class="form-control bg-light text-dark shipping_state" required='required'>-->
<!--                            <option value="Telangana">Telangana </option>-->
<!--                            <option value="Tamilnadu">Tamilnadu </option>-->
<!--                            <option value="Delhi">Delhi</option>-->
<!--                            <option value="Maharastra">Maharastra</option>-->
<!--                            <option value="Mumbai">Mumbai</option>-->
<!--                            <option value="Kolkatha">Kolkatha</option>-->
<!--                            <option value="Andhra pradesh">Andhra pradesh</option>-->
<!--                            <option value="Karnataka">Karnataka</option>-->
<!--                        </select>-->
<!--                        <input type="hidden" class="form-control bg-light text-dark" name='shipping_cost' id='shipping_cost' value="0" >-->
<!--                        <input type="text" class="form-control bg-light text-dark" name='city' placeholder="Town / City" required='required'>-->
                        
<!--                        <input type="text" class="form-control bg-light text-dark" name='pin' placeholder="Pin code" required='required'> -->-->

                        <!-- <button type="button" class="btn btn-outline-danger cartbtn-shape" style="border-radius:4px" >
<!--                                    <p class="cartbtntext" style="margin:0px;"> Update Total</p>-->
<!--                                </button> -->-->
                   


<!--                    <hr class="cart-line">-->
<!--                    <div class="cart-subtotal">-->
<!--                        <h4>Total:</h4>-->
<!--                        <p style="color:black;text-align:right; margin:0px;" class='total_amount'><b>Rs.<?php echo $total_final;?>.00/-</b> </p>-->
<!--                    </div>-->

<!--                    <div class="prodect-discription-cartt">-->
                           <!-- <a href="checkout.php"> -->
<!--                           <button class="CartBtnn btn btn-secondary" type='submit' name='checkout_submit'>-->
<!--                                <p class="cartbtntext" style="margin:0px; font-weight:500; text-transform:uppercase;">PROCEED TO CHECKOUT</p>-->
<!--                            </button>-->
                           <!-- </a> -->
<!--                            </div>-->


<!--                     </form>-->
<!--                </div>-->
<!--            </div>-->
            
                <!-- cart Total end  -->

<!--            </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

<!--    <script>-->
<!--        $('#state').on('change',function(){-->
<!--            var shipping_state = $(this).val();-->
<!--            if(shipping_state!='Telangana'){-->
<!--           var vardata = "shipping_state="+ shipping_state + "&action=shipping_charge";-->
<!--         $.ajax({-->
<!--            method: "POST",-->
<!--            url: "admin/functions/admin-logic.php",-->
<!--            data: vardata,-->
<!--            success: function(response){-->
<!--                var ship_cost = response.trim();-->
<!--               $('#shipping_cost').val(response.trim())-->
<!--               $('#shipping_state_msg').html('Shipping Cost Rs.'+ship_cost);-->
<!--            }-->
<!--        });-->

<!--     }else{-->
<!--        $('#shipping_cost').val(0);-->
<!--        $('#shipping_state_msg').html('Free Shipping To Telangana');-->
<!--     }-->
<!--        })-->

<!--    </script>-->
<!--<?php include 'includes/Layout_pages/Footer.php' ?>-->
<!--    <?php include 'includes/Handles/footer_script.php' ?>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>-->
<!--    <script src="assets/js/main.js"></script>-->
<!--</body>-->
<!--</html>-->