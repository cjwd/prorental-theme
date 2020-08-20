<?php get_header(); ?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
  <div class="container">
    <div class="breadcrumb">
      <?= do_shortcode('[flexy_breadcrumb]'); ?>
      <!-- <ul>
        <li><a href="/">Home</a></li>
        <li class="active"><a href="/cart">Cart</a></li>
      </ul> -->
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<main id="primary" class="site-main" role="main">
  <div class="container">
    <div class="row">
      <div class="col">
        <?php
        if (have_posts()) :
          if (is_home() && !is_front_page()) : ?>
            <header>
              <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
        <?php endif;
          /** Start the loop */
          while (have_posts()) : the_post();
            get_template_part('template-parts/content', get_post_type());
          endwhile;
          the_posts_navigation();
        else :
          get_template_part('template-parts/content', 'none');
        endif; ?>
      </div>
    </div>
  </div>
</main>
<!-- #main end -->
<?php get_footer();
