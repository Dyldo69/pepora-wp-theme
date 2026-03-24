<?php
/**
 * Template Name: Pepora Shop
 * Custom shop page that bypasses WooCommerce archive template
 */

get_header();

$products = wc_get_products(array(
    'status' => 'publish',
    'limit'  => -1,
    'orderby' => 'title',
    'order'   => 'ASC',
));
?>

<section class="collection-hero">
  <div class="container">
    <div class="collection-hero-eyebrow">Pepora Health</div>
    <h1 class="collection-hero-title">All Compounds</h1>
    <div class="collection-meta">
      <span class="collection-count"><?php echo count($products); ?> compounds</span>
      <span class="collection-stock-label">
        <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="4" fill="#4ECDC4"/></svg>
        In Stock Now
      </span>
    </div>
  </div>
</section>

<section class="section bg-gun">
  <div class="container">
    <?php if (!empty($products)) : ?>
      <div class="collection-grid">
        <?php foreach ($products as $product) :
          $pid = $product->get_id();
          $link = get_permalink($pid);
          $title = $product->get_name();
          $thumb_id = $product->get_image_id();
        ?>
          <div class="product-card">
            <a href="<?php echo esc_url($link); ?>" class="product-card__img">
              <?php if ($thumb_id) :
                echo wp_get_attachment_image($thumb_id, 'pepora-product-thumb', false, array('loading' => 'lazy', 'alt' => esc_attr($title)));
              else : ?>
                <div class="product-card__img-placeholder">PEPORA</div>
              <?php endif; ?>
            </a>
            <div class="product-card__body">
              <a href="<?php echo esc_url($link); ?>" class="product-card__title"><?php echo esc_html($title); ?></a>
              <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
            </div>
            <div class="product-card__cta">
              <?php if ($product->is_in_stock()) : ?>
                <button class="product-card__btn js-add-to-cart" data-product-id="<?php echo esc_attr($pid); ?>">Add to Cart</button>
              <?php else : ?>
                <button class="product-card__btn" disabled style="opacity:0.4;cursor:not-allowed;">Sold Out</button>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <p style="color:var(--c50);text-align:center;padding:4rem 0;">No products yet.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
