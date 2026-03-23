<?php
/**
 * Product Card — Pepora Health
 * WooCommerce template override for product within loops
 * Converted from Shopify snippets/product-card.liquid
 *
 * @package Pepora
 */

defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product instanceof WC_Product) {
    return;
}

$product_id    = $product->get_id();
$product_link  = get_permalink($product_id);
$product_title = get_the_title($product_id);

$terms = get_the_terms($product_id, 'product_cat');
$product_type = ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';
?>

<div class="product-card">
  <a href="<?php echo esc_url($product_link); ?>" class="product-card__img">
    <?php if (has_post_thumbnail($product_id)) : ?>
      <?php echo get_the_post_thumbnail($product_id, 'pepora-product-thumb', array(
        'loading' => 'lazy',
        'width'   => 480,
        'height'  => 480,
        'alt'     => esc_attr($product_title),
      )); ?>
    <?php else : ?>
      <div class="product-card__img-placeholder">PEPORA</div>
    <?php endif; ?>
    <?php if ($product_type) : ?>
      <span class="product-card__img-label"><?php echo esc_html($product_type); ?></span>
    <?php endif; ?>
  </a>

  <div class="product-card__body">
    <?php if ($product_type) : ?>
      <div class="product-card__type"><?php echo esc_html($product_type); ?></div>
    <?php endif; ?>
    <a href="<?php echo esc_url($product_link); ?>" class="product-card__title"><?php echo esc_html($product_title); ?></a>
    <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
  </div>

  <div class="product-card__cta">
    <?php if ($product->is_in_stock()) : ?>
      <a
        href="<?php echo esc_url($product->add_to_cart_url()); ?>"
        class="product-card__btn js-add-to-cart"
        data-product-id="<?php echo esc_attr($product_id); ?>"
        aria-label="Add <?php echo esc_attr($product_title); ?> to cart"
      >
        Add to Cart
      </a>
    <?php else : ?>
      <button class="product-card__btn" disabled style="opacity:0.4;cursor:not-allowed;">
        Sold Out
      </button>
    <?php endif; ?>
  </div>
</div>