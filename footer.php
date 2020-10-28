  <footer class="off-white-bg">
    <!-- Footer Top Start -->
    <div class="footer-top pt-50 pb-60">
      <div class="container">
        <div class="row">
          <!-- Single Footer Start -->
          <div class="col-lg-4  col-md-7 col-sm-6">
            <div class="single-footer">
              <h3>Contact us</h3>
              <div class="footer-content">
                <div class="loc-address">
                  <span><i class="fa fa-map-marker"></i>184 Main Rd E, St Albans VIC 3021, Australia.</span>
                  <span><i class="fa fa-envelope-o"></i>Mail Us : yourinfo@example.com</span>
                  <span><i class="fa fa-phone"></i>Phone: + 00 254 254565 54</span>
                </div>
                <div class="payment-mth"><a href="#"><img class="img" src="<?php echo get_theme_file_uri('dist/assets/img/footer/1.png'); ?>" alt="payment-image"></a></div>
              </div>
            </div>
          </div>
          <!-- Single Footer Start -->
          <!-- Single Footer Start -->
          <div class="col-lg-2  col-md-5 col-sm-6 footer-full">
            <div class="single-footer">
              <h3 class="footer-title">Information</h3>
              <div class="footer-content">
                <ul class="footer-list">
                  <li><a href="#">Site Map</a></li>
                  <li><a href="#">Specials</a></li>
                  <li><a href="#">Jobs</a></li>
                  <li><a href="#">Delivery Information</a></li>
                  <li><a href="#">Order History</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Footer Start -->
          <!-- Single Footer Start -->
          <div class="col-lg-2  col-md-4 col-md-4 col-sm-6 footer-full">
            <div class="single-footer">
              <h3 class="footer-title">My Account</h3>
              <div class="footer-content">
                <ul class="footer-list">
                  <li><a href="account.html">My account</a></li>
                  <li><a href="#">Checkout</a></li>
                  <li><a href="#">Login</a></li>
                  <li><a href="#">address</a></li>
                  <li><a href="#">Order status</a></li>
                  <li><a href="#">Site Map</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Footer Start -->
          <!-- Single Footer Start -->
          <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
            <div class="single-footer">
              <h3 class="footer-title">customer service</h3>
              <div class="footer-content">
                <ul class="footer-list">
                  <li><a href="account.html">My account</a></li>
                  <li><a href="#">New</a></li>
                  <li><a href="#">Gift Cards</a></li>
                  <li><a href="#">Return Policy</a></li>
                  <li><a href="#">Your Orders</a></li>
                  <li><a href="#">Subway</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Footer Start -->
          <!-- Single Footer Start -->
          <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
            <div class="single-footer">
              <h3 class="footer-title">Let Us Help You</h3>
              <div class="footer-content">
                <ul class="footer-list">
                  <li><a href="#">Your Account</a></li>
                  <li><a href="#">Your Orders</a></li>
                  <li><a href="#">Shipping</a></li>
                  <li><a href="#">Amazon Prime</a></li>
                  <li><a href="#">Replacements</a></li>
                  <li><a href="#">Manage </a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Footer Start -->
        </div>
        <!-- Row End -->
      </div>
      <!-- Container End -->
    </div>
    <!-- Footer Top End -->
    <!-- Footer Bottom Start -->
    <div class="footer-bottom off-white-bg2">
      <div class="container">
        <div class="footer-bottom-content">
          <p class="copy-right-text">Copyright &copy; <?= date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a> All Rights Reserved.</p>
          <div class="footer-social-content">
            <ul class="social-content-list">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-wifi"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Container End -->
    </div>
    <!-- Footer Bottom End -->
  </footer>
  <!-- Footer End -->
  </div>
  <!-- Wrapper End -->
  <?php wp_footer(); ?>
  <?php do_action('do_geolocation_user_location_form'); ?>
  </body>

  </html>