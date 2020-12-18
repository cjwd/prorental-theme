  <footer class="off-white-bg">
    <div class="footer-top pt-50 pb-60">
      <div class="container">
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