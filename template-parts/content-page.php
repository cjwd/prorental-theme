<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title text-capitalize sub-heading">', '</h1>'); ?>
  </header>
  <!-- .entry-header end -->
  <div class="entry-content">
    <?php
    the_content();
    wp_link_pages(
      [
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'prorental'),
        'after' => '</div>'
      ]
    );
    ?>
  </div>
  <!-- entry-content end -->
  <?php if (get_edit_post_link()) :  ?>
    <footer class="entry-footer">
      <?php
      edit_post_link(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to sceen readers */
            __('Edit <span class="screen-reader-text">%s</span>', 'prorental'),
            [
              'span' => [
                'class' => []
              ]
            ]
          ),
          wp_kses_post(get_the_title())
        ),
        '<span class="edit-link">',
        '<span>'
      );
      ?>
    </footer>
    <!-- /.entry-footer -->
  <?php endif; ?>
</article>
<!-- $post-<?php the_ID(); ?> -->