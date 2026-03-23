</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-body">

      <!-- Brand -->
      <div>
        <div class="footer-brand-name">PEPORA</div>
        <div class="footer-tagline">Research-grade precision peptides for performance, longevity and optimisation.</div>
      </div>

      <!-- Compounds -->
      <div>
        <div class="footer-col-title">Compounds</div>
        <div class="footer-links">
          <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">All Compounds</a>
          <!-- category links will be added as products are categorized -->
        </div>
      </div>

      <!-- Information -->
      <div>
        <div class="footer-col-title">Information</div>
        <div class="footer-links">
          <a href="<?php echo esc_url(home_url('/science/')); ?>">The Science</a>
          <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Research Journal</a>
          <a href="<?php echo esc_url(home_url('/about/')); ?>">About</a>
          <a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ</a>
          <a href="<?php echo esc_url(home_url('/consult/')); ?>">Consult</a>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
        </div>
      </div>

      <!-- Legal -->
      <div>
        <div class="footer-col-title">Legal</div>
        <div class="footer-links">
          <a href="<?php echo esc_url(get_privacy_policy_url()); ?>">Privacy Policy</a>
          <a href="<?php echo esc_url(home_url('/terms/')); ?>">Terms of Service</a>
          <a href="<?php echo esc_url(home_url('/refund-policy/')); ?>">Refund Policy</a>
          <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>">Shipping Policy</a>
        </div>
      </div>

    </div>

    <!-- Disclaimer -->
    <div class="footer-disclaimer">
      For research purposes only. Not for human consumption. These products have not been evaluated by the TGA or FDA and are not intended to diagnose, treat, cure or prevent any disease. Must be 18+ to purchase.
    </div>

    <!-- Bottom -->
    <div class="footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> Pepora Health. All rights reserved.</span>
      <span>Precision &middot; Purity &middot; Performance</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
