<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="siteHeader">
  <div class="header-accent"></div>
  <div class="header-inner">

    <!-- Logo -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo">PEPORA</a>

    <!-- Desktop Navigation -->
    <nav class="header-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php if (is_front_page()) echo 'active'; ?>">Home</a>
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="<?php if (is_shop() || is_product_category()) echo 'active'; ?>">Shop</a>
      <a href="<?php echo esc_url(home_url('/science/')); ?>">The Science</a>
      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="<?php if (is_home() || is_single()) echo 'active'; ?>">Journal</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
    </nav>

    <!-- Icons -->
    <div class="header-icons">
      <!-- Account -->
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('myaccount'))); ?>" class="header-icon" aria-label="Account">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
          <circle cx="12" cy="7" r="4"/>
        </svg>
      </a>

      <!-- Cart -->
      <button class="header-icon" id="cartToggle" aria-label="Open cart">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
          <line x1="3" y1="6" x2="21" y2="6"/>
          <path d="M16 10a4 4 0 01-8 0"/>
        </svg>
        <span class="cart-badge" id="cartCount"><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?></span>
      </button>

      <!-- Hamburger (mobile) -->
      <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

  </div>
</header>

<!-- Mobile Nav Drawer -->
<nav class="mobile-nav" id="mobileNav">
  <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
  <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Shop</a>
  <a href="<?php echo esc_url(home_url('/science/')); ?>">The Science</a>
  <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Journal</a>
  <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
</nav>
<div class="nav-overlay" id="navOverlay"></div>

<!-- Cart Drawer -->
<div class="cart-drawer" id="cartDrawer">
  <div class="cart-drawer-header">
    <span class="cart-drawer-title">Your Vials</span>
    <button class="cart-drawer-close" id="cartClose" aria-label="Close cart">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
    </button>
  </div>
  <div class="cart-drawer-items" id="cartItems">
    <div class="cart-drawer-empty">Your cart is empty.</div>
  </div>
  <div class="cart-drawer-footer">
    <div class="cart-drawer-total">
      <span>Total</span>
      <span id="cartTotal">$0.00</span>
    </div>
    <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="btn btn-primary btn-full">Checkout</a>
  </div>
</div>
<div class="cart-overlay" id="cartOverlay"></div>

<main>
