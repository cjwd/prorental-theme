<?php get_header(); ?>
<div class="hero-area slider-area slider-style-three">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="section-title border-line mb-30">
          <h2>Check Availability</h2>
        </div>
        <form class="search-form mb-60" action="" method="post">
          <div class="form-controls-wrapper address-wrapper">
            <div class="row">
              <div class="col-md-6">
                <div class="address-fname">
                  <label for="" class="label">Product Name</label>
                  <input type="text" class="input" placeholder="Product Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="address-fname">
                  <label for="" class="label">Model / Manufacturer</label>
                  <input type="text" class="input" placeholder="Model">
                </div>
              </div>
              <div class="col-md-6">
                <div class="address-fname">
                  <label for="" class="label">Start Date</label>
                  <input type="date" class="input" placeholder="Start Date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="address-fname">
                  <label for="" class="label">End Date</label>
                  <input type="date" class="input" placeholder="End Date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="address-fname">
                  <label for="" class="label">Location</label>
                  <input type="text" class="input" placeholder="Location">
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 footer-content mail-content">
            <div class="send-email">
              <input type="submit" value="Search" class="submit">
            </div>
          </div>
        </form>
        <!-- Search Form -->
      </div>
      <div class="col-md-4">
        <div class="single-banner zoom mb-20"><a href=""><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/img/banner/9.jpg" alt=""></a></div>
        <div class="single-banner zoom mb-20"><a href=""><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/img/banner/10.jpg" alt=""></a></div>
      </div>
    </div>
  </div>
</div>
<div class="new-products pb-60">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section-title border-line mb-60">
          <h2>Recent Available Items</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-4 order-2">
        <div class="side-product-list">
          <div class="slider-right-content">
            <div class="double-pro">
              <?php
              $recent_products_args = [
                'post_type' => 'product',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC'
              ];
              $recent_products = new WP_Query($recent_products_args);
              while ($recent_products->have_posts()) : $recent_products->the_post();
                get_template_part('template-parts/product', 'small');
              endwhile;
              wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-8 order-lg-2">
        <div class="new-pro-content">
          <h3 class="mb-30">New Items Available</h3>
          <div class="container">
            <div class="row">
              <?php
              $recent_products2_args = [
                'post_type' => 'product',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
                'offset' => 4
              ];
              $recent_products2 = new WP_Query($recent_products2_args);
              while ($recent_products2->have_posts()) : $recent_products2->the_post();
                get_template_part('template-parts/product');
              endwhile;
              wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Brand Logo Start -->
<div class="brand-area pb-60">
  <div class="container">
    <!-- Brand Banner Start -->
    <div class="brand-banner row">
      <div class="single-brand col-sm">
        <a href="#"><img class="img" src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/img/brand/1.png" alt="brand-image"></a>
      </div>
      <div class="single-brand col-sm">
        <a href="#"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/img/brand/2.png" alt="brand-image"></a>
      </div>
      <div class="single-brand col-sm">
        <a href="#"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/img/brand/3.png" alt="brand-image"></a>
      </div>
      <div class="single-brand col-sm">
        <a href="#"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/img/brand/4.png" alt="brand-image"></a>
      </div>
      <div class="single-brand col-sm">
        <a href="#"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/img/brand/5.png" alt="brand-image"></a>
      </div>
    </div>
    <!-- Brand Banner End -->
  </div>
</div>
<!-- Brand Logo End -->
<?php get_footer();
