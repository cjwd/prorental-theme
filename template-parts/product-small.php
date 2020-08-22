<?php
$product = wc_get_product($post->ID);
?>
<!-- Single Product Start -->
<div class="rental-single-product" id="post-<?php the_ID(); ?>">
  <div class="pro-img">
    <?php if (has_post_thumbnail()) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail([95, 74], ['class' => 'img', 'alt' => get_the_title()]); ?>
      </a>
    <?php endif; ?>
  </div>
  <div class="pro-content">
    <div class="woocommerce product-rating">
      <?php echo wc_get_rating_html($product->get_average_rating()); ?>
    </div>
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <?php echo $product->get_price_html() . ' per hr.';  ?>
  </div>
</div>
<!-- Single Product End -->