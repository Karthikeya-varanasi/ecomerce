<?php 
    
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';  

        
    ?>


    <div class="login-page">
    <div class="form-container">
      <p class="title">Login / Sign up</p>
      <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>
          <?php if (isset($_GET['sucess'])) { ?>
               <p class="sucess"><?php echo $_GET['sucess']; ?></p>
          <?php } ?>
      <form action="admin/login-logic.php" class="form" method="post">

        <input type="email"id="email" type="email"  name="email" class="input" placeholder="Email">
        <input id="password" name="password" type="password" class="input" placeholder="Password">
        <p class="page-link">
          <span class="page-link-label">Forgot Password?</span>
        </p>
        <button type="submit" class="form-btn">Log in</button>
      </form>
      <p class="sign-up-label">
        Don't have an account?<span class="sign-up-link"><a href="register.php">Sign up</a></span>
      </p>

      </div>
    </div>
    </div>
  

<?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>