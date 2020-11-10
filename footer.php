  <footer class="off-white-bg">
    <div class="footer-top pt-50 pb-60">
      <div class="container">
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
        <?php Slate\widgetize_footer('sidebar-footer'); ?>
      </div>
    </div>

    <!-- Footer Bottom Start -->
    <div class="footer-bottom off-white-bg2">
      <div class="container">
        <div class="footer-bottom-content">
          <p class="copy-right-text">Copyright &copy; <?= date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a> All Rights Reserved.</p>
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