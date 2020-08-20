<section class="no-result not-found">
  <header class="page-header">
    <h1 class="page-title"><?php esc_html_e('Nothing Found', 'prorental'); ?></h1>
    <!-- /.page-title -->
  </header>
  <!-- /.page-header -->
  <div class="page-content">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php
          if (is_home() && current_user_can('publish_posts')) :
            printf(
              '<p>' . wp_kses(
                /* translators: 1: link to WP admin new post page */
                __('Ready to publish your first post? <a href="%1$s">Get started here</a>', 'prorental'),
                [
                  'a' => [
                    'href' => [],
                  ],
                ]
              ) . '</p>',
              esc_url(admin_url('post-new.php'))
            );
          elseif (is_search()) : ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'prorental'); ?></p>
          <?php
            get_search_form();
          else : ?>
            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching help.', 'prorental'); ?></p>
          <?php
            get_search_form();
          endif; ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.page-content -->
</section>
<!-- /.no-result not-found -->