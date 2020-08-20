<?php
/**
 * Template Name: Divi
 */

get_header();
$post_id = get_the_ID();
$is_page_builder_used = Slate\is_divi_builder_used($post_id);
?>
  <?php do_action('slate_before_main_content'); ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <?php //get_template_part( 'template-parts/divi' ); ?>
      <?php the_content(); ?>

    <?php endwhile; // end of the loop. ?>
  <?php do_action('slate_after_main_content'); ?>

<?php get_footer();