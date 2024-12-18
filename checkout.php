<?php 
    session_start();
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php'; 
/*
    if(empty($_SESSION['user_id'])){
          echo "<script> window.location.href = 'login.php';  </script>";
        exit;
  
    }*/

    @$_SESSION['shipping_details']['country'] = $_POST['country']; 
    @$_SESSION['shipping_details']['state'] = $_POST['state']; 
    @$_SESSION['shipping_details']['city'] = $_POST['city']; 
    @$_SESSION['shipping_details']['pin'] = $_POST['pin']; 
    @$_SESSION['shipping_details']['shipping_cost'] = $_POST['shipping_cost']; 


if(empty($_SESSION['cart'])){
          echo "<script>
          alert('Cart empty Please add Products')
           window.location.href = 'index.php';  </script>";
        exit;
  
    }

$user_id =$_SESSION['user_id'];

// $user_query = "SELECT * FROM users WHERE user_id = $user_id";
//         $user_res = mysqli_query($conn, $user_query);
//         $user_row = mysqli_fetch_array($user_res);


                                    $total = 0;
foreach ($_SESSION['cart'] as $product_id => $product) {
    $total += $product['price'] * $product['quantity'];
}


$total = $total+$_SESSION['shipping_details']['shipping_cost'];

$coupon_amount = 0;
if($_SESSION['coupon_status']=="Y"){
    $coupon_amount = $_SESSION['coupon_amount'];
}


$total_final = $total-$coupon_amount;

?>



<div class="checkout" style="background:#eae7e7;" >
    <div class="container-fluid">
        <div class="checkout-prodect">
            <form action="place_order.php" method='post'>
                <section class="cart-page">
                    <div class="container-fluid">
                        <div class="row">
                        <!-- address form start -->
                        
                        <div class=" card col-md-7 py-3 px-3 ">
                                    <h4 class="card-title" style="text-align:left;">BILLING DETAILS</h4>
                                    <hr class="cart-line">

                                   
                        <div class=" row billing_details">
                       <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">First Name <sup>*</sup></label>
                            <input type="text" class="form-control" id="first_name" name='first_name'  required='required' >
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Last Name <sup>*</sup></label>
                            <input type="text" class="form-control" id="last_name" name='last_name' required='required'>
                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Company Name (Optional)</label>
                            <input type="text" class="form-control" id="company_name" name='company_name' placeholder="">
                        </div>

                        
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Country / Region</label>
                             <select name="b_country" id="b_country" class="form-control bg-light text-dark" required='required'>

                            <option value="India" selected>India</option>
                            <option value="Australia">Australia</option>
                        </select>
                        </div>
                       


                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Street Address <sup>*</sup></label>
                            <input type="text" class="form-control" id="street_address" name='street_address' required='required' placeholder="">
                            
                            
                        </div>


                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Town / City <sup>*</sup></label>
                            <input type="text" class="form-control" id="city" name='city' required='required' >
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">State <sup>*</sup></label>
                            <select id="state" name='state' required='required'class="form-control">
                            <option value="Telangana">Telangana </option>
                            <option value="Andhra pradesh">Andhra pradesh </option>
                            <option value="Goa">Goa </option>
                            <option value="Orissa">Orissa </option>
                            <option value="Jharkhand">Jharkhand </option>
                            <option value="Bihar">Bihar</option>
                            <option value="Meghalaya">Meghalaya </option>
                            <option value="Tamilnadu">Tamilnadu </option>
                            <option value="Tripura">Tripura </option>
                            <option value="Manipur">Manipur </option>
                            <option value="Mizoram">Mizoram </option>
                            <option value="Nagaland">Nagaland </option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh </option>
                            <option value="Delhi">Delhi</option>
                            <option value="Maharastra">Maharastra</option>
                            
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Gujarath">Gujarath</option>
                            <option value="Assam">Assam</option>
                            <option value="Rajestha">Rajestha</option>
                            
                            <option value="Sikkim">Sikkim</option>
                            

                            
                            <option value="madhya pradesh">madhya pradesh</option>
                            <option value="Pondicherry">Pondicherry</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu ">Dadra and Nagar Haveli and Daman and Diu </option>
                            <option value="Lakshadeep">Lakshadeep</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                            
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">PIN Code <sup>*</sup></label>
                            <input type="text" class="form-control" id="pin" name='pin' required='required' >
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Phone <sup>*</sup></label>
                            
                            <input type="text" class="form-control" id="phone" name='phone' required='required' value="<?php echo $user_row['mobile'];?>" >
                        </div>


                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Email <sup>*</sup></label>
                            <input type="email" class="form-control" id="inputAddress" id="email" name='email' required='required' value="<?php echo $user_row['email'];?>" >
                            
                        </div>
                         <p> <input type='checkbox' class='ship_bill_different'style="margin-right:10px; color:red;" name='ship_bill_different'>Shipping Address is Same as Billing Details</p>

                        <div class="col-12">
                        <label for="inputAddress" class="form-label">Message </label>
                            
                        <textarea  placeholder="Description" class="form-control  bg-light text-dark   py-3 text-left" style="height: 200px; margin-top:10px" id="message" name='message'></textarea>   
                                 
                        </div>



                        
                        </div>



                        
                    <div class=" row shipping_details" >
                        <br>
                          <hr class="cart-line">
                          <h4 class="card-title" style="text-align:left;">SHIPPING DETAILS</h4>
                                    <hr class="cart-line">


                       <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">First Name <sup>*</sup></label>
                            <input type="text" class="form-control" id="s_first_name" name='s_first_name' required='required' >
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Last Name <sup>*</sup></label>
                            <input type="text" class="form-control" id="s_last_name" name='s_last_name' required='required'>
                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Company Name (Optional)</label>
                            <input type="text" class="form-control" id="s_company_name" name='s_company_name' placeholder="">
                        </div>

                       <div class="col-12">
                            <label for="inputAddress" class="form-label">Country / Region</label>
                             <select name="s_country" id="s_country" class="form-control bg-light text-dark" >
                                
                            <option value="India" selected>India</option>
                            <option value="Australia">Australia</option>
                        </select>
                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Street Address <sup>*</sup></label>
                            <input type="text" class="form-control" id="s_street_address" name='s_street_address' required='required' placeholder="">
                            
                            
                        </div>


                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Town / City <sup>*</sup></label>
                            <input type="text" class="form-control" id="s_city" name='s_city' required='required' >
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">State <sup>*</sup></label>
                            <select id="s_state" name='s_state' class="form-control">
                             <option value="Telangana">Telangana </option>
                            <option value="Andhra pradesh">Andhra pradesh </option>
                            <option value="Goa">Goa </option>
                            <option value="Orissa">Orissa </option>
                            <option value="Jharkhand">Jharkhand </option>
                            <option value="Bihar">Bihar</option>
                            <option value="Meghalaya">Meghalaya </option>
                            <option value="Tamilnadu">Tamilnadu </option>
                            <option value="Tripura">Tripura </option>
                            <option value="Manipur">Manipur </option>
                            <option value="Mizoram">Mizoram </option>
                            <option value="Nagaland">Nagaland </option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh </option>
                            <option value="Delhi">Delhi</option>
                            <option value="Maharastra">Maharastra</option>
                            
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Gujarath">Gujarath</option>
                            <option value="Assam">Assam</option>
                            <option value="Rajestha">Rajestha</option>
                            
                            <option value="Sikkim">Sikkim</option>
                            

                            
                            <option value="madhya pradesh">madhya pradesh</option>
                            <option value="Pondicherry">Pondicherry</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu ">Dadra and Nagar Haveli and Daman and Diu </option>
                            <option value="Lakshadeep">Lakshadeep</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                            
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">PIN Code <sup>*</sup></label>
                            <input type="text" class="form-control" id="s_pin" name='s_pin' required='required' >
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Phone <sup>*</sup></label>
                            
                            <input type="text" class="form-control" id="s_phone" name='s_phone' required='required' >
                        </div>


                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Email <sup>*</sup></label>
                            <input type="email" class="form-control" id="inputAddress" id="s_email" name='s_email' required='required' >
                            
                        </div>


                        <div class="col-12">
                        <label for="inputAddress" class="form-label">Message </label>
                            
                        <textarea  placeholder="Description" class="form-control  bg-light text-dark   py-3 text-left" style="height: 200px; margin-top:10px" id="s_message" name='s_message'></textarea>   
                                 
                        </div>



                        
                        </div>
                            
                        </div>


                        <!-- address form End -->




                        
                        <!-- prodect check start  -->

                        <div class="col-md-5 px-0 py-1">
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align:center;">Your Order</h4>
                                    <hr class="cart-line">
                                    <div class="cart-subtotall">
                                        <h5>Product(s)</h5>
                                        
                                    </div>

                                    <?php



                                        foreach ($_SESSION['cart'] as $product_id => $product) {
                                            // echo $product['name'] . " - $" . $product['price'] . " x " . $product['quantity'] . "<br>";

                                        ?>
                                        <div  class="checkout-prodectdata">
                                                                            <b><?php echo $product['name'];?></b>
                                                                            <b><?php echo $product['quantity'];?></b>
                                                                            <p style="color:black;text-align:right; margin:0px;"><b>Rs.<?php echo $product['price'];?>/-</b> </p>
                                                                            </div>


                                        <?php  } ?>
                                        <hr class="cart-line">
                                    

                                    
                                    

                                    <div class="cart-subtotall">
                                        <h5>Sub Total</h5>
                                        <p style="color:black;text-align:right; margin:0px;"><b>Rs.<?php echo $total;?>.00/-</b> </p>
                                    </div>
                                    
                                    <hr class="cart-line">

                                    

                                    <div class="cart-subtotall">
                                        <span>Shipping</span>
                                        <p style="color:black;text-align:right; margin:0px;">
                                            <?php
                                            if($_SESSION['shipping_details']['shipping_cost']>0){
                                                echo 'Rs.'.$_SESSION['shipping_details']['shipping_cost'];
                                            }else{
                                                echo 'Free shipping in India';
                                            }
                                            ?>
                                         </p>
                                    </div>

                                    <?php
                        if($_SESSION['coupon_status']=="Y"){
                            ?>
                            <div class="cart-subtotall">
                                        <span>Coupon Applied</span>
                                        <p style="color:black;text-align:right; margin:0px;"> -Rs.<?php echo $_SESSION['coupon_amount'];?> </p>
                                    </div>

                            <?php
                        }

                        $product_cost_paisa = $total_final*100;
                        
                        ?>

                                    
                                    

                                    <hr class="cart-line">
                                    <div class="cart-subtotall">
                                        <h4>Total:</h4>
                                        <p style="color:black;text-align:right; margin:0px;"><b>Rs.<?php echo $total_final;?>.00/-</b> </p>
                                    </div>
                                    <hr class="cart-line">
                                    
                                    

                                    <div class="cart-subtotall">
                                        <h5>Payment Methods</h5>
                                        
                                    </div>
                                    <div  class="checkout-prodectdat">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_methods" id="payment_methods" value="RPAY" checked>
                                        <label class="form-check-label" for="payment_methods1">
                                        Razorpay (Pay with Credit Card/ Debit Card/ EMI/ Net Banking/ UPI)
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_methods" id="payment_methods1" value="CASH">
                                        <label class="form-check-label" for="exampleRadios2">
                                        Cash on delivery (Rs: 1500 Advance need to pay) <a style="text-decoration:underline; color:blue;" onclick="myFunction()">know more</a>
                                        <br>
                                        <p id="demo"></p>
                                        
                                        </label>
                                        </div>
                                        
                                    </div>


                                        <hr class="cart-line">
                                    <div class="accordion active">
                            
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
                                    
                                    <hr class="cart-line">


                                    <div class="description-of-checkout">
                                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                    </div>
                                    <div class="description-of-checkout">
                                        <p><input type='checkbox' name='terms_conditions' required='required'/ style="margin-right:10px">I have read the following <a href='terms_conditions.php' target='_blank'>terms and Conditions</a></p>
                                    </div>
                                    <div class="prodect-discription-cartt">
                                        <a href="checkout.php">
                                        <button class="CartBtnn btn btn-secondary" type='submit' name='place_order'>
                                                <p class="cartbtntext" style="margin:0px; font-weight:500; text-transform:uppercase;">Place Order</p>
                                            </button>
                                        </a>
                                            </div>


                                    
                            </div>
                        </div>
                        
                        <!-- prodect check end  -->
                        </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>
<script>

function myFunction() {
  document.getElementById("demo").innerHTML = "We accept Cash on Delivery, Need to Pay a Security Deposit of Rs. 1500/- in Advance. You can pay the balance amount at the courier's delivery time. Without Advance Orders won't be processed. <br> Pay the Advance Amount below link: https://pmny.in/kIllUwMArtki or simply pay by Google Pay I Paytm or Phonepe at Number: 9705913835 (Name: D Radha) <br> Could you share your Order Number along with an advance screenshot on WhatsApp: 8008599340 or email us at megatronindia@gmail.com? <br> We are not taking any extra charges over product value, it's only an advance amount against shipping charges";
  
}

// Function to toggle the 'required' attribute based on the visibility of a div
function toggleRequired(divId, toggle) {
    $('.' + divId + ' input[required], #' + divId + ' select[required]').prop('required', toggle);
}

// Toggle required attribute on page load



var itens = $(".shipping_details").html();

$('.ship_bill_different').on('change',function(){
    // Assuming you have a checkbox with the ID 'myCheckbox'
if ($(this).prop('checked')) {
      $('.shipping_details').hide();
      toggleRequired('shipping_details', false);
   
} else {
 
   $('.shipping_details').show();
    
       $('.shipping_details').html(itens)

}
})




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

<?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>