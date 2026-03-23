<?php
/**
 * Single Article — Research Journal Post
 * Template: single.php
 * Pepora Health — Conversion-optimised for ad traffic
 */
get_header();

// Reading time
$reading_time = max(1, ceil(str_word_count(strip_tags(get_the_content())) / 200));

// Tags and categories
$post_tags = get_the_tags();
$post_categories = get_the_category();

// Blog page URL
$blog_url = get_permalink(get_option('page_for_posts'));
if (!$blog_url) {
    $blog_url = home_url('/blog/');
}

// Shop URL
$shop_url = function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/');
?>

<!-- ═══════════════════════════════════════════
     ARTICLE — Individual Blog Post
     Pepora Health · Research Journal
     Conversion-optimised for ad traffic
═══════════════════════════════════════════════ -->

<!-- HERO — Compact, punchy, with reading time + stats -->
<section class="article-hero">
  <div class="article-hero-bg"></div>
  <div class="article-hero-content">
    <a href="<?php echo esc_url($blog_url); ?>" class="article-hero-back">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
      Research Journal
    </a>
    <div class="article-hero-tags">
      <?php if ($post_tags && !is_wp_error($post_tags)) :
          $tag_count = 0;
          foreach ($post_tags as $tag) :
              if ($tag_count >= 3) break;
      ?>
        <span class="article-hero-tag"><?php echo esc_html($tag->name); ?></span>
      <?php $tag_count++; endforeach; endif; ?>
    </div>
    <h1 class="article-hero-title"><?php the_title(); ?></h1>
    <div class="article-hero-meta">
      <div class="article-hero-author">
        <div class="article-hero-avatar">P</div>
        <div>
          <div class="article-hero-author-name">Pepora Research Team</div>
          <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('F d, Y')); ?></time>
        </div>
      </div>
      <div class="article-hero-reading">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        <span id="readingTime"><?php echo esc_html($reading_time); ?> min read</span>
      </div>
    </div>
  </div>
  <div class="article-hero-fade"></div>
</section>

<!-- TRUST BAR — Colored icons -->
<div class="article-trust-bar">
  <div class="container">
    <div class="article-trust-items">
      <div class="article-trust-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        Peer-Reviewed Sources
      </div>
      <div class="article-trust-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6C63FF" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        Evidence-Based
      </div>
      <div class="article-trust-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Research Use Only
      </div>
      <div class="article-trust-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFD93D" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        Updated Regularly
      </div>
    </div>
  </div>
</div>

<!-- MOBILE CTA — Visible immediately on mobile -->
<div class="article-mobile-cta">
  <div class="container">
    <a href="<?php echo esc_url($shop_url); ?>" class="article-mobile-cta-card">
      <div class="article-mobile-cta-left">
        <span class="article-mobile-cta-label">Get These Compounds — Ships Tomorrow</span>
        <span class="article-mobile-cta-sub">99.2% purity &middot; COA included &middot; Australian stock</span>
      </div>
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>
</div>

<!-- KEY STATS BAR — Quick visual data before content -->
<section class="article-stats-bar">
  <div class="container">
    <div class="article-stats">
      <div class="article-stat">
        <div class="article-stat-num" style="color:#4ECDC4;">99.2%</div>
        <div class="article-stat-label">HPLC Purity</div>
      </div>
      <div class="article-stat-divider"></div>
      <div class="article-stat">
        <div class="article-stat-num" style="color:#6C63FF;">80+</div>
        <div class="article-stat-label">Published Studies</div>
      </div>
      <div class="article-stat-divider"></div>
      <div class="article-stat">
        <div class="article-stat-num" style="color:#FF6B6B;">100%</div>
        <div class="article-stat-label">Mass Spec Verified</div>
      </div>
      <div class="article-stat-divider"></div>
      <div class="article-stat">
        <div class="article-stat-num" style="color:#FFD93D;">COA</div>
        <div class="article-stat-label">Every Batch</div>
      </div>
    </div>
  </div>
</section>

<!-- ARTICLE BODY -->
<section class="section section-tight bg-gun">
  <div class="container">
    <div class="article-layout">

      <!-- Main Content -->
      <article class="article-content">
        <?php
        // Start the Loop
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>

        <!-- MID-ARTICLE CTA — interrupts the read with a purchase prompt -->
        <div class="article-mid-cta">
          <div class="article-mid-cta-accent"></div>
          <div class="article-mid-cta-body">
            <div class="article-mid-cta-badge">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
              In Stock — Ships Within 24 Hours
            </div>
            <h3 class="article-mid-cta-title">Ready to Order?</h3>
            <p class="article-mid-cta-text">Every compound mentioned in this article is available now. 99.2% purity, third-party tested, with a Certificate of Analysis included free.</p>
            <div class="article-mid-cta-row">
              <a href="<?php echo esc_url($shop_url); ?>" class="btn btn-primary">Order Now — Free COA Included</a>
            </div>
            <div class="article-mid-cta-trust">
              <span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> 99.2% Pure</span>
              <span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#6C63FF" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> Lab Tested</span>
              <span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> AU Stock</span>
            </div>
          </div>
        </div>
      </article>

      <!-- Sidebar -->
      <aside class="article-sidebar">

        <!-- Quick Nav -->
        <div class="sidebar-card" id="articleNav">
          <div class="sidebar-card-label">In This Article</div>
          <nav class="sidebar-toc" id="sidebarToc"></nav>
        </div>

        <!-- Purity Visual -->
        <div class="sidebar-card sidebar-purity-card">
          <div class="sidebar-card-label">Compound Quality</div>
          <div class="sidebar-purity-row">
            <span class="sidebar-purity-label">HPLC Purity</span>
            <span class="sidebar-purity-val" style="color:#4ECDC4;">99.2%</span>
          </div>
          <div class="sidebar-purity-bar">
            <div class="sidebar-purity-bar-fill" style="width:99.2%; background: linear-gradient(90deg, #4ECDC4, #45B7AA);"></div>
          </div>
          <div class="sidebar-purity-row" style="margin-top:0.75rem;">
            <span class="sidebar-purity-label">Endotoxin</span>
            <span class="sidebar-purity-val" style="color:#6C63FF;">&lt;0.5 EU/mg</span>
          </div>
          <div class="sidebar-purity-bar">
            <div class="sidebar-purity-bar-fill" style="width:10%; background: linear-gradient(90deg, #6C63FF, #5A52E0);"></div>
          </div>
          <a href="<?php echo esc_url($shop_url); ?>" class="btn btn-primary btn-full" style="margin-top:1rem;">Order Now — Ships Tomorrow</a>
          <div style="text-align:center;margin-top:0.5rem;font-size:0.65rem;color:var(--c30);">Free COA with every order</div>
        </div>

        <!-- Urgency Card -->
        <div class="sidebar-card" style="border-color:rgba(78,205,196,0.2);">
          <div class="sidebar-card-label" style="color:#4ECDC4;">Australian Stock</div>
          <div class="sidebar-cta-text">Order today, delivered to your door within 2-5 business days. All orders include tracked shipping.</div>
          <a href="<?php echo esc_url($shop_url); ?>" class="btn btn-ghost btn-full" style="margin-top:0.75rem;">Browse Compounds</a>
        </div>

      </aside>
    </div>
  </div>
</section>

<!-- INLINE PRODUCT CALLOUT — after article content -->
<section class="section section-tight bg-gun2 reveal">
  <div class="container" style="max-width:800px;">
    <div class="article-products-section">
      <div class="section-label">Available Now</div>
      <div class="section-title" style="font-size:1.5rem;">Get the Compounds From This Article</div>

      <div class="article-product-cards">
        <?php
        if (function_exists('wc_get_products')) :
            $products = wc_get_products(array(
                'limit'      => 4,
                'status'     => 'publish',
                'visibility' => 'visible',
                'orderby'    => 'date',
                'order'      => 'DESC',
            ));
            if ($products) :
                foreach ($products as $product) :
                    $product_url   = get_permalink($product->get_id());
                    $product_title = $product->get_name();
                    $product_price = $product->get_price_html();
        ?>
          <a href="<?php echo esc_url($product_url); ?>" class="article-product-card">
            <div class="article-product-card-top">
              <span class="article-product-card-name"><?php echo esc_html($product_title); ?></span>
              <span class="article-product-card-price"><?php echo $product_price; ?></span>
            </div>
            <div class="article-product-card-bar">
              <div class="article-product-card-bar-fill"></div>
            </div>
            <div class="article-product-card-bottom">
              <span class="article-product-card-badge">&ge;98% Purity</span>
              <span class="article-product-card-link">View <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
            </div>
          </a>
        <?php
                endforeach;
            endif;
        endif;
        ?>
      </div>

      <div style="text-align:center;margin-top:1.5rem;">
        <a href="<?php echo esc_url($shop_url); ?>" class="btn btn-primary">Order Now — Free Shipping Over $200 &rarr;</a>
        <p style="font-size:0.7rem;color:var(--c30);margin-top:0.5rem;">All orders include Certificate of Analysis &middot; Australian stock &middot; Ships within 24hrs</p>
      </div>
    </div>
  </div>
</section>

<!-- CONTINUE READING — Other articles -->
<?php
$related_posts = get_posts(array(
    'numberposts'  => 4,
    'post__not_in' => array(get_the_ID()),
    'post_type'    => 'post',
    'post_status'  => 'publish',
));
if (!empty($related_posts)) :
?>
<section class="section section-tight bg-gun reveal">
  <div class="container">
    <div class="section-label">Keep Learning</div>
    <div class="section-title">Continue Reading</div>

    <div class="article-continue-grid">
      <?php foreach ($related_posts as $related) :
          $rel_tags = get_the_tags($related->ID);
          $rel_date = get_the_date('M d, Y', $related);
      ?>
        <a href="<?php echo esc_url(get_permalink($related)); ?>" class="article-continue-card">
          <div class="article-continue-accent"></div>
          <div class="article-continue-body">
            <?php if ($rel_tags && !is_wp_error($rel_tags)) : ?>
              <div class="article-continue-tags">
                <?php $tag_count = 0; foreach ($rel_tags as $tag) : if ($tag_count >= 2) break; ?>
                  <span class="journal-tag journal-tag-sm"><?php echo esc_html($tag->name); ?></span>
                <?php $tag_count++; endforeach; ?>
              </div>
            <?php endif; ?>
            <h3 class="article-continue-title"><?php echo esc_html($related->post_title); ?></h3>
            <p class="article-continue-excerpt"><?php echo esc_html(wp_trim_words(strip_tags($related->post_content), 20, '...')); ?></p>
            <div class="article-continue-footer">
              <time><?php echo esc_html($rel_date); ?></time>
              <span class="article-continue-read">Read <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- DISCLAIMER -->
<section class="section section-tight bg-gun2">
  <div class="container" style="max-width:800px;text-align:center;">
    <p style="color:var(--c30);font-size:0.72rem;line-height:1.8;">The information presented is sourced from peer-reviewed literature and is provided for educational and research purposes only. Pepora Health does not make therapeutic claims. All products are sold strictly for research use. Consult a qualified healthcare professional before making any health-related decisions.</p>
  </div>
</section>

<!-- STICKY BOTTOM CTA BAR -->
<div class="article-sticky-bar" id="articleStickyBar">
  <div class="article-sticky-bar-inner">
    <div class="article-sticky-bar-left">
      <span class="article-sticky-bar-text">These Compounds Are In Stock</span>
      <span class="article-sticky-bar-sub">99.2% purity &middot; COA included &middot; Ships within 24hrs</span>
    </div>
    <a href="<?php echo esc_url($shop_url); ?>" class="btn btn-primary btn-sm">Order Now &rarr;</a>
  </div>
</div>

<!-- SCRIPTS -->
<script>
(function() {
  // Reading time calculator (client-side update)
  var content = document.querySelector('.article-content');
  var readEl = document.getElementById('readingTime');
  if (content && readEl) {
    var words = content.textContent.trim().split(/\s+/).length;
    var mins = Math.max(1, Math.round(words / 200));
    readEl.textContent = mins + ' min read';
  }

  // Sticky bar
  var bar = document.getElementById('articleStickyBar');
  if (bar) {
    var shown = false;
    window.addEventListener('scroll', function() {
      var scrolled = window.scrollY > 400;
      var atBottom = (window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 200);
      if (scrolled && !atBottom && !shown) { bar.classList.add('is-visible'); shown = true; }
      else if ((!scrolled || atBottom) && shown) { bar.classList.remove('is-visible'); shown = false; }
    });
  }

  // Auto-generate TOC
  var toc = document.getElementById('sidebarToc');
  if (toc && content) {
    var headings = content.querySelectorAll('h2');
    if (headings.length === 0) {
      document.getElementById('articleNav').style.display = 'none';
    } else {
      headings.forEach(function(h, i) {
        h.id = 'section-' + i;
        var link = document.createElement('a');
        link.href = '#section-' + i;
        link.textContent = h.textContent;
        link.className = 'sidebar-toc-link';
        toc.appendChild(link);
      });
    }
  }

  // Animate product card bars on scroll
  var animated = new Set();
  function animateBars() {
    document.querySelectorAll('.article-product-card-bar-fill').forEach(function(el) {
      if (animated.has(el)) return;
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight * 0.9) {
        animated.add(el);
        el.style.width = '99%';
      }
    });
  }
  window.addEventListener('scroll', animateBars);
  animateBars();
})();
</script>

<?php get_footer(); ?>
