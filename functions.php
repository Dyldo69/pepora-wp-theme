<?php
/**
 * Pepora Health Theme Functions
 */

// ─── Enqueue Styles & Scripts ─────────────────────────────────────
function pepora_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'pepora-google-fonts',
        'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Lato:wght@300;400;700&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&display=swap',
        array(),
        null
    );

    // Main theme stylesheet (pepora.css)
    wp_enqueue_style(
        'pepora-style',
        get_template_directory_uri() . '/pepora.css',
        array(),
        '1.0'
    );

    // Theme JS
    wp_enqueue_script(
        'pepora-js',
        get_template_directory_uri() . '/pepora.js',
        array(),
        '1.0',
        true
    );

    // Localize script for AJAX
    wp_localize_script('pepora-js', 'pepora_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('pepora_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'pepora_enqueue_assets');

// Add defer attribute to pepora.js
function pepora_defer_scripts($tag, $handle) {
    if ($handle === 'pepora-js') {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'pepora_defer_scripts', 10, 2);

// ─── Remove WooCommerce Default Styles ────────────────────────────
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// ─── Theme Support ────────────────────────────────────────────────
function pepora_theme_setup() {
    // Title tag
    add_theme_support('title-tag');

    // Post thumbnails
    add_theme_support('post-thumbnails');

    // HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'pepora'),
    ));
}
add_action('after_setup_theme', 'pepora_theme_setup');

// ─── WooCommerce Image Sizes ──────────────────────────────────────
function pepora_woocommerce_image_sizes() {
    add_image_size('pepora-product-thumb', 400, 400, true);
    add_image_size('pepora-product-single', 800, 800, true);
}
add_action('after_setup_theme', 'pepora_woocommerce_image_sizes');

// ─── Custom Excerpt Length ────────────────────────────────────────
function pepora_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'pepora_excerpt_length');

// ─── AJAX: Get Cart ──────────────────────────────────────────────
function pepora_get_cart() {
    check_ajax_referer('pepora_nonce', 'nonce');

    $cart = WC()->cart;
    $items = array();

    foreach ($cart->get_cart() as $cart_key => $cart_item) {
        $product = $cart_item['data'];
        $thumb = wp_get_attachment_image_url($product->get_image_id(), 'thumbnail');

        $items[] = array(
            'key'      => $cart_key,
            'name'     => $product->get_name(),
            'price'    => wc_price($product->get_price()),
            'quantity' => $cart_item['quantity'],
            'image'    => $thumb ?: '',
        );
    }

    wp_send_json_success(array(
        'count' => $cart->get_cart_contents_count(),
        'total' => $cart->get_cart_total(),
        'items' => $items,
    ));
}
add_action('wp_ajax_pepora_get_cart', 'pepora_get_cart');
add_action('wp_ajax_nopriv_pepora_get_cart', 'pepora_get_cart');

// ─── AJAX: Add to Cart ──────────────────────────────────────────
function pepora_add_to_cart() {
    check_ajax_referer('pepora_nonce', 'nonce');

    $product_id = absint($_POST['product_id']);
    $quantity   = absint($_POST['quantity']) ?: 1;

    $added = WC()->cart->add_to_cart($product_id, $quantity);

    if ($added) {
        wp_send_json_success(array('cart_key' => $added));
    } else {
        wp_send_json_error(array('message' => 'Could not add to cart.'));
    }
}
add_action('wp_ajax_pepora_add_to_cart', 'pepora_add_to_cart');
add_action('wp_ajax_nopriv_pepora_add_to_cart', 'pepora_add_to_cart');

// ─── AJAX: Remove Cart Item ─────────────────────────────────────
function pepora_remove_cart_item() {
    check_ajax_referer('pepora_nonce', 'nonce');

    $cart_key = sanitize_text_field($_POST['cart_key']);
    WC()->cart->remove_cart_item($cart_key);

    // Return updated cart
    pepora_get_cart();
}
add_action('wp_ajax_pepora_remove_cart_item', 'pepora_remove_cart_item');
add_action('wp_ajax_nopriv_pepora_remove_cart_item', 'pepora_remove_cart_item');

// ─── Remove WooCommerce Default Wrappers & Sidebar ──────────────
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// ─── Register Sidebar / Widget Area ──────────────────────────────
function pepora_widgets_init() {
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'pepora'),
        'id'            => 'blog-sidebar',
        'description'   => __('Widgets displayed on the blog sidebar.', 'pepora'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'pepora_widgets_init');
