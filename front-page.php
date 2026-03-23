<?php get_header(); ?>

<!-- ═══════════════════════════════════════════════════════════════
     HOMEPAGE — Pepora Health
     Redesigned with science visuals + purchase CTAs
     ═══════════════════════════════════════════════════════════════ -->

<!-- ─── HERO ──────────────────────────────────────────────────── -->
<section class="hero">
  <img src="<?php echo esc_url(get_template_directory_uri() . '/hero-bg.jpg'); ?>" alt="Pepora research peptide vials" class="hero-img" loading="eager" fetchpriority="high">
  <div class="hero-gradient-overlay"></div>

  <div class="hero-content">
    <div class="hero-eyebrow">Pepora Health — Research Grade</div>
    <h1>Biological<br>Peak.</h1>
    <p class="hero-sub">Research-grade peptides. 99.2% purity. Third-party tested. Ships from Australia within 24 hours.</p>
    <div class="hero-btns">
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">Order Now — Ships Tomorrow</a>
      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-ghost">Read the Research →</a>
    </div>
  </div>

  <div class="hero-accent">P</div>
</section>

<!-- ─── TRUST STRIP ──────────────────────────────────────────── -->
<div class="home-trust-strip">
  <div class="container">
    <div class="home-trust-items">
      <div class="home-trust-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        99.2% HPLC Purity
      </div>
      <div class="home-trust-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6C63FF" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        COA Every Batch
      </div>
      <div class="home-trust-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Third-Party Tested
      </div>
      <div class="home-trust-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFD93D" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        Ships Within 24hrs
      </div>
    </div>
  </div>
</div>

<!-- ─── MARQUEE TICKER ───────────────────────────────────────── -->
<div class="marquee">
  <div class="marquee-track">
    <span class="marquee-item">RESEARCH GRADE</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">PRECISION DOSED</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">LAB VERIFIED</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">RETATRUTIDE</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">BPC-157</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">SELANK</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">NAD+</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">CJC-1295</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">IPAMORELIN</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">SEMAX</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">GHK-CU</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">MELANOTAN</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">RESEARCH GRADE</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">PRECISION DOSED</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">LAB VERIFIED</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">RETATRUTIDE</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">BPC-157</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">SELANK</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">NAD+</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">CJC-1295</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">IPAMORELIN</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">SEMAX</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">GHK-CU</span><span class="marquee-dot"> · </span>
    <span class="marquee-item">MELANOTAN</span><span class="marquee-dot"> · </span>
  </div>
</div>

<!-- ─── QUALITY METRICS — Animated bars + numbers ────────────── -->
<section class="section bg-gun reveal">
  <div class="container">
    <div class="section-label">Analytical Data</div>
    <div class="section-title">Quality You Can Verify, Not Just Trust</div>

    <div class="sci-metrics">
      <div class="sci-metric-card">
        <div class="sci-metric-value">
          <span class="sci-metric-number" data-target="99.2">0</span><span class="sci-metric-unit">%</span>
        </div>
        <div class="sci-metric-bar">
          <div class="sci-metric-bar-fill" data-width="99.2" style="background: linear-gradient(90deg, #4ECDC4, #45B7AA);"></div>
        </div>
        <div class="sci-metric-label">HPLC Purity</div>
        <div class="sci-metric-desc">Verified via High-Performance Liquid Chromatography</div>
      </div>

      <div class="sci-metric-card">
        <div class="sci-metric-value">
          <span class="sci-metric-number" data-target="0.5">0</span><span class="sci-metric-unit"> EU/mg</span>
        </div>
        <div class="sci-metric-bar">
          <div class="sci-metric-bar-fill" data-width="10" style="background: linear-gradient(90deg, #6C63FF, #5A52E0);"></div>
        </div>
        <div class="sci-metric-label">Endotoxin Level</div>
        <div class="sci-metric-desc">Below USP threshold — safe for research use</div>
      </div>

      <div class="sci-metric-card">
        <div class="sci-metric-value">
          <span class="sci-metric-number" data-target="0.22">0</span><span class="sci-metric-unit"> μm</span>
        </div>
        <div class="sci-metric-bar">
          <div class="sci-metric-bar-fill" data-width="100" style="background: linear-gradient(90deg, #FF6B6B, #E05555);"></div>
        </div>
        <div class="sci-metric-label">Sterile Filtered</div>
        <div class="sci-metric-desc">Medical-grade membrane filtration</div>
      </div>

      <div class="sci-metric-card">
        <div class="sci-metric-value">
          <span class="sci-metric-number" data-target="100">0</span><span class="sci-metric-unit">%</span>
        </div>
        <div class="sci-metric-bar">
          <div class="sci-metric-bar-fill" data-width="100" style="background: linear-gradient(90deg, #FFD93D, #E5C235);"></div>
        </div>
        <div class="sci-metric-label">Mass Spec Confirmed</div>
        <div class="sci-metric-desc">Molecular identity verified via MS analysis</div>
      </div>
    </div>

    <div style="text-align:center;margin-top:2.5rem;">
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">Order Now — COA Included Free</a>
      <p style="font-size:0.7rem;color:var(--c30);margin-top:0.5rem;">Every order ships with a Certificate of Analysis for your specific batch</p>
    </div>
  </div>
</section>

<!-- ─── FEATURED PRODUCTS ────────────────────────────────────── -->
<section class="section bg-gun2 reveal">
  <div class="container">
    <div class="section-label">In Stock Now</div>
    <div class="section-title">Research Compounds</div>

    <?php
    $args = array(
        'limit'      => 4,
        'status'     => 'publish',
        'visibility' => 'visible',
    );
    $products = wc_get_products($args);
    if ($products) : ?>
    <div class="collection-grid">
        <?php foreach ($products as $product_obj) :
            setup_postdata($product_obj->get_id());
        ?>
        <div class="product-card">
            <a href="<?php echo esc_url(get_permalink($product_obj->get_id())); ?>" class="product-card__img">
                <?php if ($product_obj->get_image_id()) : ?>
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($product_obj->get_image_id(), 'medium')); ?>" alt="<?php echo esc_attr($product_obj->get_name()); ?>" loading="lazy">
                <?php else : ?>
                    <div class="product-card__img-placeholder">PEPORA</div>
                <?php endif; ?>
            </a>
            <div class="product-card__body">
                <a href="<?php echo esc_url(get_permalink($product_obj->get_id())); ?>" class="product-card__title"><?php echo esc_html($product_obj->get_name()); ?></a>
                <div class="product-card__price"><?php echo $product_obj->get_price_html(); ?></div>
            </div>
            <div class="product-card__cta">
                <?php if ($product_obj->is_in_stock()) : ?>
                    <a href="<?php echo esc_url($product_obj->add_to_cart_url()); ?>" class="product-card__btn" data-product-id="<?php echo esc_attr($product_obj->get_id()); ?>">Add to Cart</a>
                <?php else : ?>
                    <button class="product-card__btn" disabled style="opacity:0.4;cursor:not-allowed;">Sold Out</button>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>

    <div style="text-align:center;margin-top:2rem;">
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-ghost">View All Compounds →</a>
    </div>
  </div>
</section>

<!-- ─── HOW IT WORKS — Value props with coloured icons ────────── -->
<section class="section bg-gun reveal">
  <div class="container">
    <div class="section-label">The Pepora Difference</div>
    <div class="section-title">Why Researchers Choose Us</div>

    <div class="home-features">
      <div class="home-feature">
        <div class="home-feature-icon" style="background: rgba(78,205,196,0.08); color: #4ECDC4;">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <h3 class="home-feature-title">Third-Party Tested</h3>
        <p class="home-feature-text">Independent HPLC analysis on every batch. No in-house testing shortcuts. Your COA is included free.</p>
      </div>

      <div class="home-feature">
        <div class="home-feature-icon" style="background: rgba(108,99,255,0.08); color: #6C63FF;">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <h3 class="home-feature-title">Batch-Specific COA</h3>
        <p class="home-feature-text">Download the Certificate of Analysis for your exact batch. Full HPLC, mass spec, and endotoxin data.</p>
      </div>

      <div class="home-feature">
        <div class="home-feature-icon" style="background: rgba(255,107,107,0.08); color: #FF6B6B;">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
        </div>
        <h3 class="home-feature-title">Precision Dosed</h3>
        <p class="home-feature-text">Exact concentrations verified by mass spectrometry. No guesswork, no variance between vials.</p>
      </div>

      <div class="home-feature">
        <div class="home-feature-icon" style="background: rgba(255,217,61,0.08); color: #FFD93D;">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="home-feature-title">Australian Stock</h3>
        <p class="home-feature-text">Order today, shipped within 24 hours from Australia. Tracked delivery to your door in 2-5 days.</p>
      </div>
    </div>
  </div>
</section>

<!-- ─── RESEARCH DATA — Big stat + bar chart ─────────────────── -->
<section class="section bg-gun2 reveal">
  <div class="container">
    <div class="section-label">Published Research</div>
    <div class="section-title">Backed by Data, Not Marketing</div>

    <div class="sci-research-grid">
      <div class="sci-big-stat">
        <div class="sci-big-stat-number" data-target="80">0</div>
        <div class="sci-big-stat-label">Published Studies Referenced</div>
        <div class="sci-big-stat-sub">Across PubMed, Google Scholar, and peer-reviewed journals</div>

        <div class="sci-bar-chart">
          <div class="sci-bar-chart-title">Research Volume by Year</div>
          <div class="sci-bars">
            <div class="sci-bar-col">
              <div class="sci-bar" style="height: 25%;" data-tooltip="2018"></div>
              <span>18</span>
            </div>
            <div class="sci-bar-col">
              <div class="sci-bar" style="height: 35%;" data-tooltip="2019"></div>
              <span>19</span>
            </div>
            <div class="sci-bar-col">
              <div class="sci-bar" style="height: 45%;" data-tooltip="2020"></div>
              <span>20</span>
            </div>
            <div class="sci-bar-col">
              <div class="sci-bar" style="height: 55%;" data-tooltip="2021"></div>
              <span>21</span>
            </div>
            <div class="sci-bar-col">
              <div class="sci-bar" style="height: 70%;" data-tooltip="2022"></div>
              <span>22</span>
            </div>
            <div class="sci-bar-col">
              <div class="sci-bar" style="height: 85%;" data-tooltip="2023"></div>
              <span>23</span>
            </div>
            <div class="sci-bar-col">
              <div class="sci-bar sci-bar-accent" style="height: 100%;" data-tooltip="2024"></div>
              <span>24</span>
            </div>
          </div>
        </div>
      </div>

      <div class="sci-research-highlights">
        <div class="sci-highlight">
          <div class="sci-highlight-icon" style="color: #4ECDC4;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
          </div>
          <div>
            <div class="sci-highlight-title">Preclinical Efficacy</div>
            <p class="sci-highlight-text">Consistent positive outcomes across multiple independent research groups.</p>
          </div>
        </div>

        <div class="sci-highlight">
          <div class="sci-highlight-icon" style="color: #6C63FF;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <div>
            <div class="sci-highlight-title">Dose-Response Relationship</div>
            <p class="sci-highlight-text">Linear dose-response curves observed across standard protocols.</p>
          </div>
        </div>

        <div class="sci-highlight">
          <div class="sci-highlight-icon" style="color: #FF6B6B;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
          </div>
          <div>
            <div class="sci-highlight-title">Bioavailability Profile</div>
            <p class="sci-highlight-text">Rapid absorption with measurable plasma levels within the expected window.</p>
          </div>
        </div>

        <div class="sci-highlight">
          <div class="sci-highlight-icon" style="color: #FFD93D;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div>
            <div class="sci-highlight-title">Safety Profile</div>
            <p class="sci-highlight-text">No significant adverse findings across standard preclinical research protocols.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── SUPPLIER COMPARISON ─────────────────────────────────── -->
<section class="section bg-gun reveal">
  <div class="container">
    <div class="section-label">Supplier Comparison</div>
    <div class="section-title">Why Source Matters</div>

    <div class="sci-compare">
      <div class="sci-compare-row sci-compare-header">
        <div class="sci-compare-label"></div>
        <div class="sci-compare-col sci-compare-us">Pepora</div>
        <div class="sci-compare-col">Generic Suppliers</div>
      </div>
      <div class="sci-compare-row">
        <div class="sci-compare-label">HPLC Purity</div>
        <div class="sci-compare-col sci-compare-us">≥98%</div>
        <div class="sci-compare-col sci-compare-dim">Unverified</div>
      </div>
      <div class="sci-compare-row">
        <div class="sci-compare-label">Third-Party Testing</div>
        <div class="sci-compare-col sci-compare-us">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <div class="sci-compare-col sci-compare-dim">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
        </div>
      </div>
      <div class="sci-compare-row">
        <div class="sci-compare-label">Batch-Specific COA</div>
        <div class="sci-compare-col sci-compare-us">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <div class="sci-compare-col sci-compare-dim">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
        </div>
      </div>
      <div class="sci-compare-row">
        <div class="sci-compare-label">Endotoxin Testing</div>
        <div class="sci-compare-col sci-compare-us">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <div class="sci-compare-col sci-compare-dim">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
        </div>
      </div>
      <div class="sci-compare-row">
        <div class="sci-compare-label">Ships Within 24hrs</div>
        <div class="sci-compare-col sci-compare-us">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <div class="sci-compare-col sci-compare-dim">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
        </div>
      </div>
      <div class="sci-compare-row">
        <div class="sci-compare-label">Australian Owned</div>
        <div class="sci-compare-col sci-compare-us">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <div class="sci-compare-col sci-compare-dim">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
        </div>
      </div>
    </div>

    <div style="text-align:center;margin-top:2rem;">
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">Order From Pepora — Ships Tomorrow</a>
    </div>
  </div>
</section>

<!-- ─── FINAL CTA — Purchase push ────────────────────────────── -->
<section class="section bg-gun2 reveal">
  <div class="container">
    <div class="home-final-cta">
      <div class="home-final-cta-accent"></div>
      <div class="home-final-cta-body">
        <div class="section-label">In Stock — Ready to Ship</div>
        <h2 class="home-final-cta-title">Get 99.2% Pure Research Compounds Delivered to Your Door</h2>
        <p class="home-final-cta-text">Every order includes a Certificate of Analysis, tracked Australian shipping, and is dispatched within 24 hours.</p>

        <div class="home-final-cta-trust">
          <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> 99.2% Purity</span>
          <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6C63FF" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> Free COA</span>
          <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> Tracked Shipping</span>
          <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FFD93D" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> Ships in 24hrs</span>
        </div>

        <div style="margin-top:1.5rem;">
          <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary btn-lg">Order Now — Free COA Included</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── NEWSLETTER ───────────────────────────────────────────── -->
<section class="newsletter">
  <div class="container">
    <div class="newsletter-serif">Research. Optimise. Perform.</div>
    <form class="newsletter-form" method="post" action="">
      <input type="email" name="pepora_newsletter_email" placeholder="Enter your email" required aria-label="Email address">
      <button type="submit" class="btn btn-primary">Join</button>
    </form>
    <p class="newsletter-note">Join the Pepora mailing list for compound updates and research.</p>
  </div>
</section>

<!-- ─── DISCLAIMER ───────────────────────────────────────────── -->
<div style="padding:2rem 0;text-align:center;">
  <div class="container">
    <p style="color:var(--c30);font-size:0.68rem;line-height:1.8;max-width:800px;margin:0 auto;">For research purposes only. Not for human consumption. These products have not been evaluated by the TGA or FDA and are not intended to diagnose, treat, cure or prevent any disease.</p>
  </div>
</div>

<!-- ─── HOMEPAGE ANIMATIONS ──────────────────────────────────── -->
<script>
(function() {
  var animated = new Set();
  function animateHome() {
    document.querySelectorAll('.sci-metric-number, .sci-big-stat-number').forEach(function(el) {
      if (animated.has(el)) return;
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight * 0.85) {
        animated.add(el);
        var target = parseFloat(el.dataset.target);
        var duration = 1500;
        var start = performance.now();
        var isDecimal = target % 1 !== 0;
        function tick(now) {
          var elapsed = now - start;
          var progress = Math.min(elapsed / duration, 1);
          var eased = 1 - Math.pow(1 - progress, 3);
          var current = target * eased;
          el.textContent = isDecimal ? current.toFixed(1) : Math.round(current);
          if (progress < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
      }
    });
    document.querySelectorAll('.sci-metric-bar-fill').forEach(function(el) {
      if (animated.has(el)) return;
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight * 0.85) {
        animated.add(el);
        el.style.width = el.dataset.width + '%';
      }
    });
    document.querySelectorAll('.sci-bar').forEach(function(el) {
      if (animated.has(el)) return;
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight * 0.85) {
        animated.add(el);
        var h = el.style.height;
        el.style.height = '0';
        setTimeout(function() { el.style.height = h; }, 100);
      }
    });
  }
  window.addEventListener('scroll', animateHome);
  animateHome();
})();
</script>

<?php get_footer(); ?>
