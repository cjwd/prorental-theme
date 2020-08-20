<?php
/**
 * Template Name: Slate Fullwidth
 * Description: Keep the theme's header and footer
 */

get_header();
?>
  <?php do_action('slate_before_fw_main_content'); ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  <?php do_action('slate_after_fw_main_content'); ?>

<?php get_footer();