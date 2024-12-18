<?php 
    
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';  


    
    ?>

    <div class="login-page">
  

    <div class="form-container">
      <p class="title">Sign Up</p>
      <!-- <form action="admin/register-logic.php" class="form" method="POST">
        <input type="text"  name="username" id="username" class="input" placeholder="Name">
        <input type="text" name="surname" id="surname" class="input" placeholder="Sur Name">
        <input id="email" type="email"  name="email" class="input" placeholder="Email">
        <input type="password" name="password" id="password" class="input" placeholder="Password">
        <input type="number" name="mobile" id="mobile" class="input" placeholder="Mobile">
        <button class="form-btn">Register</button>
      </form> -->
      <form action="admin/register-logic.php" class="form" method="post">
      <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          
          <!-- <label>User Name</label> -->
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      class="input"
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      class="input"
                      placeholder="User Name">
          <?php }?>

          <!-- <label>Sur Name</label> -->
          <?php /*if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="surname" 
                      class="input"
                      placeholder="Name"
                      value="<?php echo $_GET['surname']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="surname" 
                      class="input"
                      placeholder="surname">
          <?php } */?>
          <input type="hidden" 
                      name="surname" 
                      class="input"
                      placeholder="surname">
          <!-- <label>Email</label> -->
          <?php if (isset($_GET['name'])) { ?>
               <input type="email" 
                      name="email" 
                      class="input"
                      placeholder="Name"
                      value="<?php echo $_GET['email']; ?>">
          <?php }else{ ?>
               <input type="email" 
                      name="email" 
                      class="input"
                      placeholder="Enter Your Email-ID" require>
          <?php }?>

     	<!-- <label>Password</label> -->
     	<input type="password" 
                  class="input"
                 name="password" 
                 placeholder="Password">

          <!-- <label>Re Password</label> -->
          <input type="password" 
                 name="re_password" 
                 class="input"
                 placeholder="Re_Password">

          <!-- <label>Mobile</label> -->
          <?php if (isset($_GET['name'])) { ?>
               <input type="number" 
                      name="mobile" 
                      placeholder="Name"
                      class="input"
                      value="<?php echo $_GET['mobile']; ?>">
          <?php }else{ ?>
               <input type="number"
                      class="input" 
                      name="mobile" 
                      placeholder="Enter Your Number" require>
          <?php }?>

     	<button class="form-btn" type="submit">Sign Up</button>
          <a href="login.php" class="ca">Already have an account?</a>
     </form>


      </div>
    </div>
    </div>
<?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>