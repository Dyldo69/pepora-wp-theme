<?php
/**
 * Archive Product (Shop / Collection) Page — Pepora Health
 * WooCommerce template override
 *
 * @package Pepora
 */

defined('ABSPATH') || exit;

get_header();

// Get all products directly
$args = array(
    'status' => 'publish',
    'limit'  => -1,
    'orderby' => 'title',
    'order'   => 'ASC',
);
$products = wc_get_products($args);
?>

<!-- COLLECTION HEADER -->
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

<!-- PRODUCTS GRID -->
<section class="section bg-gun">
  <div class="container">
    <?php if (!empty($products)) : ?>
      <div class="collection-grid">
        <?php foreach ($products as $product) :
          $product_id    = $product->get_id();
          $product_link  = get_permalink($product_id);
          $product_title = $product->get_name();
          $terms = get_the_terms($product_id, 'product_cat');
          $product_type = ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';
        ?>
          <div class="product-card">
            <a href="<?php echo esc_url($product_link); ?>" class="product-card__img">
              <?php
              $thumb_id = $product->get_image_id();
              if ($thumb_id) :
                echo wp_get_attachment_image($thumb_id, 'pepora-product-thumb', false, array(
                  'loading' => 'lazy',
                  'alt'     => esc_attr($product_title),
                ));
              else : ?>
                <div class="product-card__img-placeholder">PEPORA</div>
              <?php endif; ?>
            </a>

            <div class="product-card__body">
              <a href="<?php echo esc_url($product_link); ?>" class="product-card__title"><?php echo esc_html($product_title); ?></a>
              <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
            </div>

            <div class="product-card__cta">
              <?php if ($product->is_in_stock()) : ?>
                <button
                  class="product-card__btn js-add-to-cart"
                  data-product-id="<?php echo esc_attr($product_id); ?>"
                  aria-label="Add <?php echo esc_attr($product_title); ?> to cart"
                >
                  Add to Cart
                </button>
              <?php else : ?>
                <button class="product-card__btn" disabled style="opacity:0.4;cursor:not-allowed;">
                  Sold Out
                </button>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div style="text-align:center;padding:4rem 0;">
        <p class="t-body" style="color:var(--c50);">No products in this collection yet. Check back soon.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-ghost" style="margin-top:1.5rem;">Back to Home</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
