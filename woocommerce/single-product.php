<?php
/**
 * Single Product Page — Pepora Health
 * WooCommerce template override
 * Converted from Shopify product.liquid
 *
 * @package Pepora
 */

defined('ABSPATH') || exit;

get_header();
?>

<?php while (have_posts()) : the_post();
    global $product;
?>

<!-- ═══════════════════════════════════════════════════════════════
     PRODUCT DETAIL PAGE — Pepora Health
     ═══════════════════════════════════════════════════════════════ -->

<div class="pdp">
  <div class="container">
    <div class="pdp-layout">

      <!-- ─── LEFT: Product Image ────────────────────────────── -->
      <div class="pdp-gallery">
        <div class="pdp-main-image" id="pdpMainImage">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('pepora-product-single', array(
              'id'  => 'pdpMainImg',
              'alt' => get_the_title(),
            )); ?>
          <?php else : ?>
            <div class="pdp-main-image-placeholder">PEPORA</div>
          <?php endif; ?>
        </div>
      </div>

      <!-- ─── RIGHT: Product Info ────────────────────────────── -->
      <div class="pdp-info">
        <div class="pdp-type">
          <?php
          $terms = get_the_terms($product->get_id(), 'product_cat');
          if ($terms && !is_wp_error($terms)) {
              echo esc_html($terms[0]->name);
          } else {
              echo 'Research Compound';
          }
          ?>
        </div>

        <h1 class="pdp-title"><?php the_title(); ?></h1>
        <div class="pdp-price" id="pdpPrice"><?php echo $product->get_price_html(); ?></div>

        <!-- Trust Badges — compact row -->
        <div class="pdp-badges">
          <div class="pdp-badge"><div class="pdp-badge-dot"></div>Research Grade</div>
          <div class="pdp-badge"><div class="pdp-badge-dot"></div>Lab Verified</div>
          <div class="pdp-badge"><div class="pdp-badge-dot"></div>COA Available</div>
        </div>

        <!-- Quantity + Add to Cart -->
        <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype="multipart/form-data" id="pdpForm">

          <?php if ($product->is_type('variable')) : ?>
            <?php
            $attributes = $product->get_variation_attributes();
            $available_variations = $product->get_available_variations();
            $selected_attributes = $product->get_default_attributes();
            ?>
            <div class="form-field">
              <label class="form-label" for="variantSelect">Option</label>
              <select class="form-input" id="variantSelect" name="variation_id">
                <option value="">Select an option</option>
                <?php foreach ($available_variations as $variation) :
                  $variation_obj = wc_get_product($variation['variation_id']);
                ?>
                  <option
                    value="<?php echo esc_attr($variation['variation_id']); ?>"
                    data-price="<?php echo esc_attr($variation_obj->get_price_html()); ?>"
                  >
                    <?php echo esc_html(implode(' / ', $variation['attributes'])); ?> &mdash; <?php echo wp_kses_post($variation_obj->get_price_html()); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <?php
            // Hidden inputs for each attribute
            foreach ($attributes as $attribute_name => $options) :
            ?>
              <input type="hidden" name="attribute_<?php echo esc_attr(sanitize_title($attribute_name)); ?>" value="">
            <?php endforeach; ?>

            <div class="qty-row">
              <button type="button" class="qty-btn js-qty-minus" aria-label="Decrease quantity">&minus;</button>
              <input type="text" class="qty-num" name="quantity" value="1" min="1" readonly id="pdpQty">
              <button type="button" class="qty-btn js-qty-plus" aria-label="Increase quantity">+</button>
            </div>

            <?php if ($product->is_in_stock()) : ?>
              <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn btn-primary btn-full js-add-to-cart-pdp" id="pdpAddToCart">
                Add to Cart &mdash; Ships Within 24hrs
              </button>
            <?php else : ?>
              <button type="button" class="btn btn-disabled btn-full" disabled>Sold Out</button>
            <?php endif; ?>

          <?php else : ?>

            <div class="qty-row">
              <button type="button" class="qty-btn js-qty-minus" aria-label="Decrease quantity">&minus;</button>
              <input type="text" class="qty-num" name="quantity" value="1" min="1" readonly id="pdpQty">
              <button type="button" class="qty-btn js-qty-plus" aria-label="Increase quantity">+</button>
            </div>

            <?php if ($product->is_in_stock()) : ?>
              <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn btn-primary btn-full js-add-to-cart-pdp" id="pdpAddToCart">
                Add to Cart &mdash; Ships Within 24hrs
              </button>
            <?php else : ?>
              <button type="button" class="btn btn-disabled btn-full" disabled>Sold Out</button>
            <?php endif; ?>

          <?php endif; ?>
        </form>

        <!-- Purchase trust signals -->
        <div class="pdp-purchase-trust">
          <div class="pdp-purchase-trust-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
            Free COA Included
          </div>
          <div class="pdp-purchase-trust-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
            Tracked AU Shipping
          </div>
          <div class="pdp-purchase-trust-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
            Australian Stock
          </div>
        </div>

        <!-- ─── INLINE QUALITY METRICS (visible immediately) ── -->
        <div class="sci-metrics-inline">
          <div class="sci-metric-card">
            <div class="sci-metric-value">
              <span class="sci-metric-number" data-target="99.2">0</span><span class="sci-metric-unit">%</span>
            </div>
            <div class="sci-metric-bar">
              <div class="sci-metric-bar-fill" data-width="99.2" style="background: linear-gradient(90deg, #4ECDC4, #45B7AA);"></div>
            </div>
            <div class="sci-metric-label">HPLC Purity</div>
          </div>

          <div class="sci-metric-card">
            <div class="sci-metric-value">
              <span class="sci-metric-number" data-target="0.5">0</span><span class="sci-metric-unit"> EU/mg</span>
            </div>
            <div class="sci-metric-bar">
              <div class="sci-metric-bar-fill" data-width="10" style="background: linear-gradient(90deg, #6C63FF, #5A52E0);"></div>
            </div>
            <div class="sci-metric-label">Endotoxin</div>
          </div>

          <div class="sci-metric-card">
            <div class="sci-metric-value">
              <span class="sci-metric-number" data-target="0.22">0</span><span class="sci-metric-unit"> &mu;m</span>
            </div>
            <div class="sci-metric-bar">
              <div class="sci-metric-bar-fill" data-width="100" style="background: linear-gradient(90deg, #FF6B6B, #E05555);"></div>
            </div>
            <div class="sci-metric-label">Sterile Filtered</div>
          </div>

          <div class="sci-metric-card">
            <div class="sci-metric-value">
              <span class="sci-metric-number" data-target="100">0</span><span class="sci-metric-unit">%</span>
            </div>
            <div class="sci-metric-bar">
              <div class="sci-metric-bar-fill" data-width="100" style="background: linear-gradient(90deg, #FFD93D, #E5C235);"></div>
            </div>
            <div class="sci-metric-label">Mass Spec ID</div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════════════════════════════
     SCIENCE SECTIONS — Immediately after product hero
     ═══════════════════════════════════════════════════════════════ -->

<!-- ─── HOW IT WORKS ────────────────────────────────────────── -->
<section class="section section-tight bg-gun2 reveal">
  <div class="container">
    <div class="section-label">Mechanism of Action</div>
    <div class="section-title">How <?php the_title(); ?> Works</div>

    <div class="sci-mechanism">
      <div class="sci-mech-step">
        <div class="sci-mech-icon" style="background: rgba(78,205,196,0.1); color: #4ECDC4;">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        </div>
        <div class="sci-mech-num">01</div>
        <h3 class="sci-mech-title">Receptor Binding</h3>
        <p class="sci-mech-text">Binds to specific cell-surface receptors, initiating targeted intracellular signalling cascades with high selectivity.</p>
      </div>

      <div class="sci-mech-connector"></div>

      <div class="sci-mech-step">
        <div class="sci-mech-icon" style="background: rgba(108,99,255,0.1); color: #6C63FF;">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
        </div>
        <div class="sci-mech-num">02</div>
        <h3 class="sci-mech-title">Signal Transduction</h3>
        <p class="sci-mech-text">Activates downstream pathways including MAPK, PI3K/Akt, and NF-&kappa;B modulation for targeted biological response.</p>
      </div>

      <div class="sci-mech-connector"></div>

      <div class="sci-mech-step">
        <div class="sci-mech-icon" style="background: rgba(255,107,107,0.1); color: #FF6B6B;">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <div class="sci-mech-num">03</div>
        <h3 class="sci-mech-title">Biological Response</h3>
        <p class="sci-mech-text">Produces measurable effects at the tissue level &mdash; from protein synthesis regulation to inflammatory modulation.</p>
      </div>
    </div>
  </div>
</section>

<!-- ─── RESEARCH DATA ───────────────────────────────────────── -->
<section class="section section-tight bg-gun reveal">
  <div class="container">
    <div class="section-label">Published Research</div>
    <div class="section-title">What the Data Shows</div>

    <div class="sci-research-grid">
      <!-- Big stat -->
      <div class="sci-big-stat">
        <div class="sci-big-stat-number" data-target="80">0</div>
        <div class="sci-big-stat-label">Published Studies</div>
        <div class="sci-big-stat-sub">Across PubMed, Google Scholar, and peer-reviewed journals</div>

        <!-- Mini bar chart -->
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

      <!-- Research highlights -->
      <div class="sci-research-highlights">
        <div class="sci-highlight">
          <div class="sci-highlight-icon" style="color: #4ECDC4;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
          </div>
          <div>
            <div class="sci-highlight-title">Preclinical Efficacy</div>
            <p class="sci-highlight-text">Consistent positive outcomes across multiple independent research groups and experimental models.</p>
          </div>
        </div>

        <div class="sci-highlight">
          <div class="sci-highlight-icon" style="color: #6C63FF;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <div>
            <div class="sci-highlight-title">Dose-Response Relationship</div>
            <p class="sci-highlight-text">Linear dose-response curves observed across standard research protocols.</p>
          </div>
        </div>

        <div class="sci-highlight">
          <div class="sci-highlight-icon" style="color: #FF6B6B;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
          </div>
          <div>
            <div class="sci-highlight-title">Bioavailability Profile</div>
            <p class="sci-highlight-text">Rapid absorption with measurable plasma levels within the expected pharmacokinetic window.</p>
          </div>
        </div>

        <div class="sci-highlight">
          <div class="sci-highlight-icon" style="color: #FFD93D;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div>
            <div class="sci-highlight-title">Safety Profile</div>
            <p class="sci-highlight-text">No significant adverse findings reported across standard preclinical research protocols.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── COMPARISON: PEPORA vs OTHERS ────────────────────────── -->
<section class="section section-tight bg-gun2 reveal">
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
        <div class="sci-compare-col sci-compare-us">&ge;98%</div>
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
        <div class="sci-compare-label">Mass Spec Verification</div>
        <div class="sci-compare-col sci-compare-us">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <div class="sci-compare-col sci-compare-dim">Rarely</div>
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
  </div>
</section>

<!-- ─── DESCRIPTION (pushed below science) ─────────────────── -->
<section class="section section-tight bg-gun reveal">
  <div class="container" style="max-width:800px;">
    <div class="section-label">About This Compound</div>
    <div class="section-title"><?php the_title(); ?></div>
    <div class="pdp-description-full">
      <?php
      $content = get_the_content();
      if (!empty($content)) {
          echo apply_filters('the_content', $content);
      } else {
          echo '<p>Research-grade compound. Precision-dosed and independently verified for purity. See lab results above.</p>';
      }
      ?>
    </div>
  </div>
</section>

<!-- ─── FAQ ──────────────────────────────────────────────────── -->
<section class="section section-tight bg-gun2 reveal">
  <div class="container" style="max-width:800px;">
    <div class="section-label">Common Questions</div>
    <div class="section-title">Frequently Asked</div>

    <div class="accordion">
      <div class="accordion-item">
        <button class="accordion-trigger" aria-expanded="false">
          <span>What purity level are your peptides?</span>
          <svg class="accordion-arrow" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 4l4 4 4-4"/></svg>
        </button>
        <div class="accordion-content">
          <div class="accordion-inner">
            <p>All Pepora peptides are &ge;98% purity as verified by independent third-party HPLC analysis. Each batch comes with a Certificate of Analysis (COA) that you can download directly from the product page.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <button class="accordion-trigger" aria-expanded="false">
          <span>How should I store my peptides?</span>
          <svg class="accordion-arrow" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 4l4 4 4-4"/></svg>
        </button>
        <div class="accordion-content">
          <div class="accordion-inner">
            <p>Store lyophilised (freeze-dried) peptides at -20&deg;C for maximum stability (up to 24 months). Once reconstituted with bacteriostatic water, store at 2-8&deg;C and use within 30 days.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <button class="accordion-trigger" aria-expanded="false">
          <span>Do you ship within Australia?</span>
          <svg class="accordion-arrow" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 4l4 4 4-4"/></svg>
        </button>
        <div class="accordion-content">
          <div class="accordion-inner">
            <p>Yes. We ship Australia-wide with tracked shipping. Orders are dispatched within 1-2 business days. All packages are shipped in temperature-controlled packaging to maintain compound integrity.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <button class="accordion-trigger" aria-expanded="false">
          <span>What is a Certificate of Analysis (COA)?</span>
          <svg class="accordion-arrow" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 4l4 4 4-4"/></svg>
        </button>
        <div class="accordion-content">
          <div class="accordion-inner">
            <p>A COA is a document from an independent laboratory that verifies the purity, identity, and quality of a specific batch of peptide. It typically includes HPLC purity data, mass spectrometry results, endotoxin levels, and sterility testing results. Every Pepora product includes a batch-specific COA.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── DISCLAIMER ───────────────────────────────────────────── -->
<section class="section section-tight bg-gun reveal">
  <div class="container" style="max-width:800px;text-align:center;">
    <p style="color:var(--c30);font-size:0.72rem;line-height:1.8;">For research purposes only. Not for human consumption. These products have not been evaluated by the TGA or FDA and are not intended to diagnose, treat, cure or prevent any disease. All research data referenced is sourced from peer-reviewed literature and provided for educational purposes only.</p>
  </div>
</section>

<!-- ─── MOBILE STICKY BAR ────────────────────────────────────── -->
<div class="pdp-sticky-bar" id="pdpStickyBar">
  <div class="pdp-sticky-bar-info">
    <div class="pdp-sticky-bar-title"><?php the_title(); ?></div>
    <div class="pdp-sticky-bar-price"><?php echo $product->get_price_html(); ?></div>
  </div>
  <button class="btn btn-primary btn-sm js-add-to-cart-pdp">Order Now</button>
</div>

<!-- ─── RELATED PRODUCTS ─────────────────────────────────────── -->
<?php
$related_ids = wc_get_related_products($product->get_id(), 4);
if ($related_ids) :
?>
<section class="section bg-gun2">
  <div class="container">
    <div class="section-label">You May Also Need</div>
    <div class="section-title">Related Compounds</div>

    <div class="collection-grid">
      <?php
      $related_products = array_map('wc_get_product', $related_ids);
      foreach ($related_products as $related) :
        if (!$related || !$related instanceof WC_Product) continue;
        $post_object = get_post($related->get_id());
        setup_postdata($GLOBALS['post'] =& $post_object);
      ?>
        <div class="product-card">
          <a href="<?php echo esc_url(get_permalink($related->get_id())); ?>" class="product-card__img">
            <?php if (has_post_thumbnail($related->get_id())) : ?>
              <?php echo get_the_post_thumbnail($related->get_id(), 'pepora-product-thumb', array('loading' => 'lazy', 'width' => 480, 'height' => 480)); ?>
            <?php else : ?>
              <div class="product-card__img-placeholder">PEPORA</div>
            <?php endif; ?>
            <?php
            $related_terms = get_the_terms($related->get_id(), 'product_cat');
            if ($related_terms && !is_wp_error($related_terms)) :
            ?>
              <span class="product-card__img-label"><?php echo esc_html($related_terms[0]->name); ?></span>
            <?php endif; ?>
          </a>
          <div class="product-card__body">
            <?php if ($related_terms && !is_wp_error($related_terms)) : ?>
              <div class="product-card__type"><?php echo esc_html($related_terms[0]->name); ?></div>
            <?php endif; ?>
            <a href="<?php echo esc_url(get_permalink($related->get_id())); ?>" class="product-card__title"><?php echo esc_html($related->get_name()); ?></a>
            <div class="product-card__price"><?php echo $related->get_price_html(); ?></div>
          </div>
          <div class="product-card__cta">
            <?php if ($related->is_in_stock()) : ?>
              <a href="<?php echo esc_url($related->add_to_cart_url()); ?>" class="product-card__btn js-add-to-cart" data-product-id="<?php echo esc_attr($related->get_id()); ?>" aria-label="Add <?php echo esc_attr($related->get_name()); ?> to cart">Add to Cart</a>
            <?php else : ?>
              <button class="product-card__btn" disabled style="opacity:0.4;cursor:not-allowed;">Sold Out</button>
            <?php endif; ?>
          </div>
        </div>
      <?php
      endforeach;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ─── SCIENCE ANIMATIONS ──────────────────────────────────── -->
<script>
(function() {
  var animated = new Set();
  function animateNumbers() {
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

  window.addEventListener('scroll', animateNumbers);
  animateNumbers();

  /* ─── Quantity +/- buttons ─── */
  document.querySelectorAll('.js-qty-minus').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var input = this.closest('.qty-row').querySelector('.qty-num');
      var val = parseInt(input.value, 10);
      if (val > 1) input.value = val - 1;
    });
  });
  document.querySelectorAll('.js-qty-plus').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var input = this.closest('.qty-row').querySelector('.qty-num');
      var val = parseInt(input.value, 10);
      input.value = val + 1;
    });
  });

  /* ─── Accordion ─── */
  document.querySelectorAll('.accordion-trigger').forEach(function(trigger) {
    trigger.addEventListener('click', function() {
      var item = this.closest('.accordion-item');
      var content = item.querySelector('.accordion-content');
      var isOpen = this.getAttribute('aria-expanded') === 'true';

      /* Close all others */
      document.querySelectorAll('.accordion-item').forEach(function(other) {
        other.querySelector('.accordion-trigger').setAttribute('aria-expanded', 'false');
        other.querySelector('.accordion-content').style.maxHeight = null;
        other.classList.remove('is-open');
      });

      if (!isOpen) {
        this.setAttribute('aria-expanded', 'true');
        content.style.maxHeight = content.scrollHeight + 'px';
        item.classList.add('is-open');
      }
    });
  });

  /* ─── Mobile sticky bar show/hide ─── */
  var stickyBar = document.getElementById('pdpStickyBar');
  var addBtn = document.getElementById('pdpAddToCart');
  if (stickyBar && addBtn) {
    function checkSticky() {
      var btnRect = addBtn.getBoundingClientRect();
      if (btnRect.bottom < 0) {
        stickyBar.classList.add('is-visible');
      } else {
        stickyBar.classList.remove('is-visible');
      }
    }
    window.addEventListener('scroll', checkSticky);
    checkSticky();
  }

  /* ─── Mobile sticky bar "Order Now" triggers main form ─── */
  var stickyOrderBtn = stickyBar ? stickyBar.querySelector('.js-add-to-cart-pdp') : null;
  if (stickyOrderBtn && addBtn) {
    stickyOrderBtn.addEventListener('click', function(e) {
      e.preventDefault();
      addBtn.click();
    });
  }

  /* ─── Variable product: update price on variant change ─── */
  var variantSelect = document.getElementById('variantSelect');
  var priceEl = document.getElementById('pdpPrice');
  if (variantSelect && priceEl) {
    variantSelect.addEventListener('change', function() {
      var selected = this.options[this.selectedIndex];
      if (selected && selected.dataset.price) {
        priceEl.innerHTML = selected.dataset.price;
      }
    });
  }
})();
</script>

<?php endwhile; ?>

<?php get_footer(); ?>