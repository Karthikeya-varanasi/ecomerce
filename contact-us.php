
    <?php 
    
    require_once 'core/conn.php';
    include 'admin/functions/user-logic.php';
    include 'includes/Layout_pages/head.php';
    include 'includes/Layout_pages/Header.php';
    
    ?>
    <section class="contact">
        <div class=' container-fluidd '>
      <div class="row">
          <div class="col-lg-6">
              <div class="contact-detail p-5 text-white bg-dark">
                    <h3 class="down-line-primary mb-4 text-white">Get In Touch</h3>
                    <span class="d-table mb-4 fs-18 fst-italic">At Megatron India, we're committed to providing our customers with the best possible experience. </span>
                    <div class="mb-4">
                        <span class="text-primary">Phone Number</span>
                        <p>91 9346693756 <br> +91 9000788462</p>
                    </div>
                    <div class="mb-4">
                        <span class="text-primary">E-Mail</span>
                        <p>megatronnindia@gmail.com</p>
                    </div>
                    <div class="mb-4">
                        <span class="text-primary">Address</span>
                        <p>11/2, 1st floor, 3rd Phase Kukatpally, JNTU to Hitech City Road, Opp: Holy Mary Degree College, Hyderabad- 500072, Telangana</p>
                    </div>
                </div>
          </div>
          <div class="col-lg-6">
              <div class="contact-form">
                <form id="contact-form" class="contact_message" action="#" method="post">
                    <div class="row g-4">
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" id="name" name="firstname" placeholder="Name" type="text">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" id="email" name="email" placeholder="Email Address" type="text">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <input class="form-control" id="subject" name="subject" placeholder="Subject" type="text">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <textarea class="form-control" id="message" rows="5" name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <input class="btn  btn-outline-danger" id="send" value="Send Message" type="submit">
                        </div>
                        
                    </div>
                </form>
              </div>
          </div>
      </div>
    </div>
    </section>
    <?php include 'includes/Layout_pages/Footer.php' ?>
    <?php include 'includes/Handles/footer_script.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>