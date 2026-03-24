<?php
/**
 * Template Name: Pepora Contact
 * Contact page
 */

get_header();
?>

<!-- HERO -->
<section class="collection-hero">
  <div class="container">
    <div class="collection-hero-eyebrow">Pepora Health</div>
    <h1 class="collection-hero-title">Contact Us</h1>
    <p class="hero-sub" style="max-width:560px;margin-top:1rem;">Have a question about our compounds, your order, or our testing process? We typically respond within 24 hours.</p>
  </div>
</section>

<!-- CONTACT CONTENT -->
<section class="section bg-gun">
  <div class="container">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;max-width:900px;margin:0 auto;">

      <!-- CONTACT FORM -->
      <div>
        <h2 style="color:#fff;font-family:'Space Grotesk',sans-serif;font-size:1.3rem;margin-bottom:1.5rem;">Send a Message</h2>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display:flex;flex-direction:column;gap:1rem;">
          <input type="hidden" name="action" value="pepora_contact">

          <div>
            <label style="color:var(--c50);font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:0.4rem;">Name</label>
            <input type="text" name="name" required style="width:100%;padding:0.8rem 1rem;background:var(--c05);border:1px solid var(--c10);border-radius:6px;color:#fff;font-family:'Space Grotesk',sans-serif;font-size:0.9rem;">
          </div>

          <div>
            <label style="color:var(--c50);font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:0.4rem;">Email</label>
            <input type="email" name="email" required style="width:100%;padding:0.8rem 1rem;background:var(--c05);border:1px solid var(--c10);border-radius:6px;color:#fff;font-family:'Space Grotesk',sans-serif;font-size:0.9rem;">
          </div>

          <div>
            <label style="color:var(--c50);font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:0.4rem;">Subject</label>
            <select name="subject" style="width:100%;padding:0.8rem 1rem;background:var(--c05);border:1px solid var(--c10);border-radius:6px;color:#fff;font-family:'Space Grotesk',sans-serif;font-size:0.9rem;">
              <option value="general">General Inquiry</option>
              <option value="order">Order Question</option>
              <option value="product">Product Information</option>
              <option value="wholesale">Wholesale / Bulk</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div>
            <label style="color:var(--c50);font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:0.4rem;">Message</label>
            <textarea name="message" rows="5" required style="width:100%;padding:0.8rem 1rem;background:var(--c05);border:1px solid var(--c10);border-radius:6px;color:#fff;font-family:'Space Grotesk',sans-serif;font-size:0.9rem;resize:vertical;"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="align-self:flex-start;margin-top:0.5rem;">Send Message</button>
        </form>
      </div>

      <!-- CONTACT INFO -->
      <div>
        <h2 style="color:#fff;font-family:'Space Grotesk',sans-serif;font-size:1.3rem;margin-bottom:1.5rem;">Get in Touch</h2>

        <div style="display:flex;flex-direction:column;gap:2rem;">
          <div>
            <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.5rem;">
              <div style="width:36px;height:36px;border-radius:8px;background:rgba(78,205,196,0.08);display:flex;align-items:center;justify-content:center;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4ECDC4" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              </div>
              <span style="color:var(--c50);font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;">Email</span>
            </div>
            <a href="mailto:contact@pepora.health" style="color:#4ECDC4;text-decoration:none;font-size:1rem;">contact@pepora.health</a>
          </div>

          <div>
            <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.5rem;">
              <div style="width:36px;height:36px;border-radius:8px;background:rgba(108,99,255,0.08);display:flex;align-items:center;justify-content:center;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6C63FF" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              </div>
              <span style="color:var(--c50);font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;">Response Time</span>
            </div>
            <p style="color:var(--c70);font-size:1rem;">Within 24 hours</p>
          </div>

          <div>
            <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.5rem;">
              <div style="width:36px;height:36px;border-radius:8px;background:rgba(255,107,107,0.08);display:flex;align-items:center;justify-content:center;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF6B6B" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </div>
              <span style="color:var(--c50);font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;">Location</span>
            </div>
            <p style="color:var(--c70);font-size:1rem;">Australia</p>
          </div>

          <div>
            <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.5rem;">
              <div style="width:36px;height:36px;border-radius:8px;background:rgba(255,217,61,0.08);display:flex;align-items:center;justify-content:center;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FFD93D" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
              </div>
              <span style="color:var(--c50);font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;">Shipping</span>
            </div>
            <p style="color:var(--c70);font-size:1rem;">All orders ship within 24 hours via AusPost Express</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- FAQ QUICK -->
<section class="section section-tight bg-gun2 reveal">
  <div class="container" style="max-width:700px;">
    <div class="section-title" style="text-align:center;margin-bottom:2rem;">Common Questions</div>
    <div class="accordion">
      <div class="accordion-item">
        <button class="accordion-trigger" aria-expanded="false">
          <span>How long does shipping take?</span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="accordion-content">
          <p>All orders are dispatched within 24 hours from our Australian warehouse. Express shipping typically arrives in 1-3 business days within Australia.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button class="accordion-trigger" aria-expanded="false">
          <span>Do you provide a Certificate of Analysis?</span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="accordion-content">
          <p>Yes — every product includes a batch-specific COA from an independent third-party lab. You can download it from the product page before purchasing.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button class="accordion-trigger" aria-expanded="false">
          <span>What is your return policy?</span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="accordion-content">
          <p>Due to the nature of our products, we cannot accept returns on opened items. If your order arrives damaged or incorrect, contact us within 48 hours and we'll resolve it immediately.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
