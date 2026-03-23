<?php
/**
 * Archive Product (Shop / Collection) Page — Pepora Health
 * WooCommerce template override
 * Converted from Shopify collection.liquid
 *
 * @package Pepora
 */

defined('ABSPATH') || exit;

get_header();
?>

<!-- ═══════════════════════════════════════════════════════════════
     COLLECTION PAGE — Pepora Health
     ═══════════════════════════════════════════════════════════════ -->

<!-- COLLECTION HEADER -->
<section class="collection-hero">
  <div class="container">
    <div class="collection-hero-eyebrow">Pepora Health</div>
    <h1 class="collection-hero-title">
      <?php
      if (is_shop()) {
          echo 'All Compounds';
      } elseif (is_product_category()) {
          single_cat_title();
      } elseif (is_product_tag()) {
          single_tag_title();
      } else {
          woocommerce_page_title();
      }
      ?>
    </h1>
    <?php
    if (is_product_category()) {
        $term = get_queried_object();
        if ($term && !empty($term->description)) {
            echo '<p class="collection-hero-desc">' . esc_html($term->description) . '</p>';
        }
    }
    ?>
    <div class="collection-meta">
      <?php
      global $wp_query;
      $product_count = $wp_query->found_posts;
      ?>
      <span class="collection-count"><?php echo esc_html($product_count); ?> compound<?php echo $product_count !== 1 ? 's' : ''; ?></span>
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
    <?php if (woocommerce_product_loop()) : ?>

      <div class="collection-grid">
        <?php
        while (have_posts()) : the_post();
          wc_get_template_part('content', 'product');
        endwhile;
        ?>
      </div>

      <?php
      /* ─── Pagination ─── */
      $total_pages = $wp_query->max_num_pages;
      if ($total_pages > 1) :
        $current_page = max(1, get_query_var('paged'));
      ?>
        <nav class="pagination" aria-label="Collection pagination">
          <?php if ($current_page > 1) : ?>
            <a href="<?php echo esc_url(get_pagenum_link($current_page - 1)); ?>" class="btn btn-ghost btn-sm">&larr; Previous</a>
          <?php endif; ?>

          <div class="pagination-numbers">
            <?php
            for ($i = 1; $i <= $total_pages; $i++) :
              if ($i === $current_page) :
            ?>
                <span class="pagination-link pagination-current"><?php echo esc_html($i); ?></span>
              <?php else : ?>
                <a href="<?php echo esc_url(get_pagenum_link($i)); ?>" class="pagination-link"><?php echo esc_html($i); ?></a>
              <?php endif; ?>
            <?php endfor; ?>
          </div>

          <?php if ($current_page < $total_pages) : ?>
            <a href="<?php echo esc_url(get_pagenum_link($current_page + 1)); ?>" class="btn btn-ghost btn-sm">Next &rarr;</a>
          <?php endif; ?>
        </nav>
      <?php endif; ?>

    <?php else : ?>

      <div style="text-align:center;padding:4rem 0;">
        <p class="t-body" style="color:var(--c50);">No products in this collection yet. Check back soon.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-ghost" style="margin-top:1.5rem;">Back to Home</a>
      </div>

    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>