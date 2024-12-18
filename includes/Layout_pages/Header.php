<?php
session_start();
    $query = "SELECT * FROM `prodect_catogery`";
    $prodect_catogery = filterTable($query);

    if(isset($_SESSION['cart'])){
       $cart_items_count =  count($_SESSION['cart']);

    }else{
        $cart_items_count = 0;
    }
?>


<header>
    <div class="header-handler">
        <div class="container">
            
            <nav class="navbar">    
                <div class="logo">
                    <a href="index.php"><img src="assets/images/logo/logo.svg" alt=""></a>
                    
                </div>
                
              <div class="saparator">
              <div class="mobile-icon">
                                <button class="btn" style="display:flex;" onclick="openNav()">
                    <span class="icon">
                    <i class="fa-solid fa-bars"></i>
                    </span>
                    <span class="menutext">MENU</span>
                </button>
                </div>
                <div class="main-menu overlay" id="myNav">
                        <ul class="nav-menu">
                            <li class='nav-item'>
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            </li>
                            <a href="javascript:void(0)"  class='nav-links'  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" > 
                                <li class='nav-item'>Hoverboards <i class="fa fa-angle-down" aria-hidden="true"></i></li>
                            </a> 
                            <a href="javascript:void(0)"  class='nav-links'  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptionsscooter" > 
                                <li class='nav-item'>E-Scooters<i class="fa fa-angle-down" aria-hidden="true"></i></li>
                            </a>  
                            <a href="javascript:void(0)"  class='nav-links'  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptionsSegway" > 
                                <li class='nav-item'>Segway<i class="fa fa-angle-down" aria-hidden="true"></i></li>
                            </a> 
                            <!--<a href="javascript:void(0)"  class='nav-links'  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptionsPremium" > -->
                            <!--    <li class='nav-item'>Premium brands <i class="fa fa-angle-down" aria-hidden="true"></i></li>-->
                            <!--</a> -->
                            <!--<a href="Accessories.php"  class='nav-links' > -->
                            <!--    <li class='nav-item'>Accessories</li>-->
                            <!--</a> -->
                        <li class='nav-item dropdown'>
    <a href="javascript:void(0)" class='nav-links'>
        Support <i class="fa fa-angle-down" aria-hidden="true"></i>
    </a>
    <ul class="dropdown-menu">
        <li><a href="Accessories.php">Accessories</a></li>
        <li><a href="https://wa.me/message/PDTQMC332JZQB1">Register Your Complaint</a></li>
        <li><a href="https://wa.me/message/PDTQMC332JZQB1">Chat with Expert</a></li>
    </ul>
</li>





                    
                            <!-- <a href="Collections.php"  class='nav-links'> 
                                <li class='nav-item'>Electric Scooter</li>
                            </a>
                            <a href="Collections.php"  class='nav-links'> 
                                <li class='nav-item'>Seg way</li>
                            </a>
                            <a href="Collections.php"  class='nav-links'> 
                                <li class='nav-item'>Premium Brands</li>
                            </a>
                            <a href="Collections.php"  class='nav-links'> 
                                <li class='nav-item'>Accessories</li>
                            </a> -->

                        </ul>
                    </div>

                    <div class="hr"></div>
                    
                    <div style="display:inline-flex;">
                        <a href="cart.php"><button class="btn " type="button"><i class="fa-solid fa-cart-shopping"></i><sup><?php echo $cart_items_count;?></sup></button></a>
                        <?php 
                        // var_dump($_SESSION);
                        if(isset($_SESSION['user_name']))
                        {
                           ?>
                            <div class="dropdown" >
                            <button class="btn  btn-outline-danger dropbtn" onclick="myFunction()" type="button"><i class="fa-solid fa-user"></i> <span class="username-visible">Mr. <?php echo substr($_SESSION['user_name'], 0, 7);?> <i class="fa fa-caret-down" aria-hidden="true"></i></span></button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="my-orders.php">My Orders</a>
                                <a href="logout.php">Logout</a>
                            </div>
                            </div>


                           <?php
                        }else{
                            ?>
                            <!-- <a href="login.php" id="desk"> <button class="btn  btn-outline-danger" onclick="myFunction()" type="button">Log in <i class="fa-solid fa-arrow-right-to-bracket"></i> </button></a>
                            <a href="login.php" id="mobl"> <button class="btn  btn-outline-danger" onclick="myFunction()" type="button"><i class="fa-solid fa-user"></i></button></a> -->
                            <?php
                        }
                        ?>
                       
                        
                        
                    </div>
              </div>
            </nav>
        </div>
    </div>
</header>

<div class="second-header">
    <div class="second-header-handler">
    <marquee width="100%" direction="left">
        <span>Special offer Use Coupon "Xmas24" Grab Extra 15% Instant Discount  *</span> 
        
        <span>Special offer Use Coupon "Xmas24" Grab Extra 15% Instant Discount  *</span> 
        
        <span>Special offer Use Coupon "Xmas24" Grab Extra 15% Instant Discount *</span> 
    </marquee>
    </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Cart</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  
<button>kjdckjsdcn</button>
    <button>kjdckjnzdkxlcmzlxmczldm</button>
</div>
</div>

                    <?php include 'includes/Layout_pages/submenu.php'?>



                    <script>
                        


function myFunction() {
    
    document.getElementById("myDropdown").classList.toggle("show");
    // document.getElementById("myDropdown").classList.add("show");

  }
  
  document.querySelectorAll(".nav-item .fa-angle-down").forEach(function (dropdownIcon) {
    dropdownIcon.addEventListener("click", function (e) {
        const isMobile = window.matchMedia("(max-width: 768px)").matches;
        if (isMobile) {
            e.preventDefault();
            const dropdownMenu = this.parentElement.querySelector(".dropdown-menu");
            dropdownMenu.classList.toggle("show");
        }
    });
});
  
//   document.querySelectorAll(".nav-item .fa-angle-down").forEach(function (dropdownIcon) {
//     dropdownIcon.addEventListener("click", function (e) {
//         e.preventDefault();
//         const dropdownMenu = this.parentElement.querySelector(".dropdown-menu");
//         dropdownMenu.classList.toggle("show");
//     });
// });
  
  // Close the dropdown if the user clicks outside of it
  // window.onclick = function(event) {
  //   if (!event.target.matches('.dropbtn')) {
  //     var dropdowns = document.getElementsByClassName("dropdown-content");
  //     var i;
  //     for (i = 0; i < dropdowns.length; i++) {
  //       var openDropdown = dropdowns[i];
  //       if (openDropdown.classList.contains('show')) {
  //         openDropdown.classList.remove('show');
  //       }
  //     }
  //   }
  // }





                    </script>