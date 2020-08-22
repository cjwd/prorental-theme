<?php
$product = wc_get_product($post->ID);
?>
<!-- Single Product Start -->
<div class="rental-single-product col-sm">
  <!-- Product Image Start -->
  <div class="pro-img">
    <?php if (has_post_thumbnail()) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail([238, 185], ['class' => 'primary-img', 'alt' => get_the_title()]); ?>
      </a>
    <?php endif; ?>
  </div>
  <!-- Product Image End -->
  <!-- Product Content Start -->
  <div class="pro-content">
    <div class="woocommerce product-rating center">
      <?php echo wc_get_rating_html($product->get_average_rating()); ?>
    </div>

    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <?php echo $product->get_price_html() . ' per hr.'; ?>
    <div class="pro-actions">
      <div class="actions-secondary">
        <a class="add-cart" href="<?php echo wc_get_cart_url() . '?add-to-cart=' . $product->id; ?>" data-toggle="tooltip" title="Add to Cart">Rent</a>
      </div>
    </div>
  </div>
  <!-- Product Content End -->
</div>
<!-- Single Product End -->