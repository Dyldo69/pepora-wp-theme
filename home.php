<?php
/**
 * Blog Index — Research Journal
 * Template: home.php
 * Pepora Health — Conversion-optimised
 */
get_header();

// Get all posts for the main loop
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$blog_query = new WP_Query(array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 13,
    'paged'          => $paged,
));
$all_posts = $blog_query->posts;
$featured  = !empty($all_posts) ? $all_posts[0] : null;
$remaining = array_slice($all_posts, 1);

// Reading time helper
function pepora_reading_time($post_obj) {
    return max(1, ceil(str_word_count(strip_tags($post_obj->post_content)) / 200));
}
?>

<!-- ═══════════════════════════════════════════
     BLOG — Research Journal Index
     Pepora Health — Conversion-optimised
═══════════════════════════════════════════════ -->

<!-- HERO — Impact stats + animated counters -->
<section class="journal-hero">
  <div class="journal-hero-bg"></div>
  <div class="container">
    <div class="journal-hero-layout">
      <div class="journal-hero-text">
        <div class="hero-eyebrow">Education &middot; Research &middot; Science</div>
        <h1 class="journal-hero-title">Research Journal</h1>
        <p class="journal-hero-sub">Evidence-based insights into peptide science. No hype — only peer-reviewed data and compound analysis.</p>
      </div>
      <div class="journal-hero-stats">
        <div class="journal-hero-stat">
          <div class="journal-hero-stat-num" data-target="80">0</div>
          <div class="journal-hero-stat-label">Published Studies Referenced</div>
        </div>
        <div class="journal-hero-stat">
          <div class="journal-hero-stat-num" data-target="99">0</div>
          <div class="journal-hero-stat-label">% Purity Minimum</div>
        </div>
        <div class="journal-hero-stat">
          <div class="journal-hero-stat-num" data-target="100">0</div>
          <div class="journal-hero-stat-label">% Research-Grade Compounds</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TRUST BAR -->
<section class="journal-trust-bar">
  <div class="container">
    <div class="journal-trust-items">
      <div class="journal-trust-item">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        <span>Peer-Reviewed Sources</span>
      </div>
      <div class="journal-trust-item">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6C63FF" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        <span>Evidence-Based Only</span>
      </div>
      <div class="journal-trust-item">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <span>Research Use Only</span>
      </div>
      <div class="journal-trust-item">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FFD93D" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        <span>Updated Regularly</span>
      </div>
    </div>
  </div>
</section>

<!-- CATEGORY FILTER PILLS -->
<section class="bg-gun2" style="padding:1.5rem 0;">
  <div class="container">
    <div class="journal-filters">
      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="journal-pill<?php if (!is_category()) echo ' active'; ?>">All Topics</a>
      <?php
      $categories = get_categories(array('hide_empty' => true));
      foreach ($categories as $cat) :
      ?>
        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="journal-pill"><?php echo esc_html($cat->name); ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FEATURED ARTICLE -->
<?php if ($featured) :
    $feat_time = pepora_reading_time($featured);
    $feat_tags = get_the_tags($featured->ID);
    $feat_date = get_the_date('Y-m-d', $featured);
    $feat_date_display = get_the_date('F d, Y', $featured);
?>
<section class="section section-tight bg-gun">
  <div class="container">
    <a href="<?php echo esc_url(get_permalink($featured)); ?>" class="journal-featured-card">
      <div class="journal-featured-accent"></div>
      <div class="journal-featured-body">
        <div class="journal-featured-top">
          <span class="journal-featured-badge">Featured Research</span>
          <span class="journal-featured-time">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
            <?php echo esc_html($feat_time); ?> min read
          </span>
        </div>
        <?php if ($feat_tags && !is_wp_error($feat_tags)) : ?>
          <div class="journal-featured-tags">
            <?php $tag_count = 0; foreach ($feat_tags as $tag) : if ($tag_count >= 3) break; ?>
              <span class="journal-tag"><?php echo esc_html($tag->name); ?></span>
            <?php $tag_count++; endforeach; ?>
          </div>
        <?php endif; ?>
        <h2 class="journal-featured-title"><?php echo esc_html($featured->post_title); ?></h2>
        <p class="journal-featured-excerpt"><?php echo esc_html(wp_trim_words(strip_tags($featured->post_content), 45, '...')); ?></p>
        <div class="journal-featured-footer">
          <time datetime="<?php echo esc_attr($feat_date); ?>"><?php echo esc_html($feat_date_display); ?></time>
          <span class="journal-read-link">Read Full Article <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </div>
    </a>
  </div>
</section>
<?php endif; ?>

<!-- ARTICLES GRID -->
<?php if (!empty($remaining)) : ?>
<section class="section section-tight bg-gun2">
  <div class="container">
    <div class="journal-grid-header">
      <div class="section-title" style="margin:0;">Latest Research</div>
      <div class="journal-count"><?php echo count($remaining); ?> articles</div>
    </div>

    <div class="journal-grid">
      <?php foreach ($remaining as $index => $post_item) :
          setup_postdata($post_item);
          $num = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
          $item_tags = get_the_tags($post_item->ID);
          $item_time = pepora_reading_time($post_item);
          $item_date = get_the_date('M d, Y', $post_item);
          $item_date_attr = get_the_date('Y-m-d', $post_item);
      ?>
        <a href="<?php echo esc_url(get_permalink($post_item)); ?>" class="journal-card">
          <div class="journal-card-number"><?php echo esc_html($num); ?></div>
          <div class="journal-card-body">
            <?php if ($item_tags && !is_wp_error($item_tags)) : ?>
              <div class="journal-card-tags">
                <?php $tag_count = 0; foreach ($item_tags as $tag) : if ($tag_count >= 2) break; ?>
                  <span class="journal-tag journal-tag-sm"><?php echo esc_html($tag->name); ?></span>
                <?php $tag_count++; endforeach; ?>
              </div>
            <?php endif; ?>
            <h2 class="journal-card-title"><?php echo esc_html($post_item->post_title); ?></h2>
            <p class="journal-card-excerpt"><?php echo esc_html(wp_trim_words(strip_tags($post_item->post_content), 25, '...')); ?></p>
            <div class="journal-card-footer">
              <time datetime="<?php echo esc_attr($item_date_attr); ?>"><?php echo esc_html($item_date); ?></time>
              <span class="journal-card-read">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                <?php echo esc_html($item_time); ?> min
              </span>
            </div>
          </div>
          <div class="journal-card-arrow">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </div>
        </a>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>

    <?php if ($blog_query->max_num_pages > 1) : ?>
      <div class="pagination" style="margin-top:2rem;">
        <?php
        $prev_link = get_previous_posts_page_link();
        $next_link = get_next_posts_page_link($blog_query->max_num_pages);
        ?>
        <?php if ($paged > 1) : ?>
          <a href="<?php echo esc_url($prev_link); ?>" class="btn btn-ghost">&larr; Previous</a>
        <?php endif; ?>
        <?php if ($paged < $blog_query->max_num_pages) : ?>
          <a href="<?php echo esc_url($next_link); ?>" class="btn btn-ghost">Next &rarr;</a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<!-- QUALITY VERIFICATION SECTION -->
<section class="section section-tight bg-gun reveal">
  <div class="container">
    <div class="section-label">Quality You Can Verify</div>
    <div class="section-title">Every Compound We Reference Is Backed by Data</div>

    <div class="journal-quality-grid">
      <div class="journal-quality-card">
        <div class="journal-quality-icon" style="color: #4ECDC4; background: rgba(78,205,196,0.08);">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <h3 class="journal-quality-title">Third-Party Tested</h3>
        <p class="journal-quality-text">Independent HPLC analysis on every batch. No in-house testing shortcuts.</p>
        <div class="journal-quality-bar">
          <div class="journal-quality-bar-fill" data-width="99" style="background: linear-gradient(90deg, #4ECDC4, #45B7AA);"></div>
        </div>
        <div class="journal-quality-stat">99.2% Avg. Purity</div>
      </div>

      <div class="journal-quality-card">
        <div class="journal-quality-icon" style="color: #6C63FF; background: rgba(108,99,255,0.08);">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <h3 class="journal-quality-title">COA on Every Product</h3>
        <p class="journal-quality-text">Download the Certificate of Analysis for your specific batch directly from the product page.</p>
        <div class="journal-quality-bar">
          <div class="journal-quality-bar-fill" data-width="100" style="background: linear-gradient(90deg, #6C63FF, #5A52E0);"></div>
        </div>
        <div class="journal-quality-stat">100% Batch Coverage</div>
      </div>

      <div class="journal-quality-card">
        <div class="journal-quality-icon" style="color: #FF6B6B; background: rgba(255,107,107,0.08);">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
        </div>
        <h3 class="journal-quality-title">Mass Spec Verified</h3>
        <p class="journal-quality-text">Molecular identity confirmed via mass spectrometry. What's on the label is in the vial.</p>
        <div class="journal-quality-bar">
          <div class="journal-quality-bar-fill" data-width="100" style="background: linear-gradient(90deg, #FF6B6B, #E05555);"></div>
        </div>
        <div class="journal-quality-stat">100% Identity Match</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA SECTION -->
<section class="section section-tight bg-gun2 reveal">
  <div class="container">
    <div class="journal-cta-section">
      <div class="journal-cta-content">
        <div class="section-label">In Stock Now</div>
        <h2 class="journal-cta-title">Get the Compounds You Just Read About</h2>
        <p class="journal-cta-text">Every compound is 99.2% pure, third-party tested, and ships from Australia within 24 hours. COA included free with every order.</p>
        <div class="journal-cta-buttons">
          <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">Order Now — Ships Tomorrow</a>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('science'))); ?>" class="btn btn-ghost">See Our Lab Results</a>
        </div>
      </div>
      <div class="journal-cta-stats">
        <div class="journal-cta-stat">
          <span class="journal-cta-stat-icon" style="color:#4ECDC4;">&#10003;</span>
          <span>&ge;98% Purity Guaranteed</span>
        </div>
        <div class="journal-cta-stat">
          <span class="journal-cta-stat-icon" style="color:#6C63FF;">&#10003;</span>
          <span>Batch-Specific COA</span>
        </div>
        <div class="journal-cta-stat">
          <span class="journal-cta-stat-icon" style="color:#FF6B6B;">&#10003;</span>
          <span>Australian Owned &amp; Shipped</span>
        </div>
        <div class="journal-cta-stat">
          <span class="journal-cta-stat-icon" style="color:#FFD93D;">&#10003;</span>
          <span>Fast Tracked Delivery</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- NEWSLETTER -->
<section class="newsletter reveal">
  <div class="container">
    <div class="newsletter-serif">Research. Optimise. Perform.</div>
    <p class="hero-sub" style="margin:1rem 0 1.5rem;font-size:0.9rem;">Get compound research and insights delivered to your inbox.</p>
    <form class="newsletter-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
      <input type="hidden" name="action" value="pepora_newsletter">
      <?php wp_nonce_field('pepora_newsletter', 'pepora_newsletter_nonce'); ?>
      <input type="email" name="email" placeholder="Enter your email" required>
      <button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
  </div>
</section>

<!-- JOURNAL ANIMATIONS -->
<script>
(function() {
  var animated = new Set();
  function animateJournal() {
    document.querySelectorAll('.journal-hero-stat-num').forEach(function(el) {
      if (animated.has(el)) return;
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight * 0.9) {
        animated.add(el);
        var target = parseInt(el.dataset.target);
        var duration = 1500;
        var start = performance.now();
        function tick(now) {
          var elapsed = now - start;
          var progress = Math.min(elapsed / duration, 1);
          var eased = 1 - Math.pow(1 - progress, 3);
          el.textContent = Math.round(target * eased);
          if (progress < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
      }
    });
    document.querySelectorAll('.journal-quality-bar-fill').forEach(function(el) {
      if (animated.has(el)) return;
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight * 0.85) {
        animated.add(el);
        el.style.width = el.dataset.width + '%';
      }
    });
  }
  window.addEventListener('scroll', animateJournal);
  animateJournal();
})();
</script>

<?php get_footer(); ?>
