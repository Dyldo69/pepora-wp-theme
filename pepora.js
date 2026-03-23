/* ═══════════════════════════════════════════════════════════════
   PEPORA HEALTH — Main JavaScript (WooCommerce)
   Vanilla JS · No dependencies · No jQuery
   ═══════════════════════════════════════════════════════════════ */

(function () {
  'use strict';

  /* ── 1. STICKY HEADER — Hide on scroll down, show on scroll up ── */
  var header = document.getElementById('siteHeader');
  if (header) {
    var lastScroll = 0;
    var headerHeight = header.offsetHeight;

    window.addEventListener('scroll', function () {
      var currentScroll = window.pageYOffset;

      if (currentScroll <= headerHeight) {
        header.classList.remove('header--hidden');
        return;
      }

      if (currentScroll > lastScroll && currentScroll > headerHeight) {
        header.classList.add('header--hidden');
      } else {
        header.classList.remove('header--hidden');
      }

      lastScroll = currentScroll;
    }, { passive: true });
  }


  /* ── 2. MOBILE NAVIGATION DRAWER ────────────────────────────── */
  var hamburger = document.getElementById('hamburger');
  var mobileNav = document.getElementById('mobileNav');
  var navOverlay = document.getElementById('navOverlay');

  function openMobileNav() {
    hamburger.classList.add('is-active');
    hamburger.setAttribute('aria-expanded', 'true');
    mobileNav.classList.add('is-open');
    navOverlay.classList.add('is-visible');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileNav() {
    hamburger.classList.remove('is-active');
    hamburger.setAttribute('aria-expanded', 'false');
    mobileNav.classList.remove('is-open');
    navOverlay.classList.remove('is-visible');
    document.body.style.overflow = '';
  }

  if (hamburger) {
    hamburger.addEventListener('click', function () {
      if (mobileNav.classList.contains('is-open')) {
        closeMobileNav();
      } else {
        openMobileNav();
      }
    });
  }

  if (navOverlay) {
    navOverlay.addEventListener('click', closeMobileNav);
  }


  /* ── 3. CART DRAWER (WooCommerce AJAX) ───────────────────────── */
  var cartToggle = document.getElementById('cartToggle');
  var cartDrawer = document.getElementById('cartDrawer');
  var cartClose = document.getElementById('cartClose');
  var cartOverlay = document.getElementById('cartOverlay');
  var cartCount = document.getElementById('cartCount');
  var cartItems = document.getElementById('cartItems');
  var cartTotal = document.getElementById('cartTotal');

  function openCartDrawer() {
    cartDrawer.classList.add('is-open');
    cartOverlay.classList.add('is-visible');
    document.body.style.overflow = 'hidden';
    fetchCart();
  }

  function closeCartDrawer() {
    cartDrawer.classList.remove('is-open');
    cartOverlay.classList.remove('is-visible');
    document.body.style.overflow = '';
  }

  if (cartToggle) cartToggle.addEventListener('click', openCartDrawer);
  if (cartClose) cartClose.addEventListener('click', closeCartDrawer);
  if (cartOverlay) cartOverlay.addEventListener('click', closeCartDrawer);

  // Pulse animation on cart badge
  function pulseCartBadge() {
    if (!cartCount) return;
    cartCount.classList.add('pulse');
    setTimeout(function () {
      cartCount.classList.remove('pulse');
    }, 400);
  }

  // Fetch cart via WooCommerce AJAX fragments
  function fetchCart() {
    var formData = new FormData();
    formData.append('action', 'pepora_get_cart');
    formData.append('nonce', pepora_ajax.nonce);

    return fetch(pepora_ajax.ajax_url, {
      method: 'POST',
      body: formData
    })
    .then(function (res) { return res.json(); })
    .then(function (data) {
      if (data.success) {
        renderCart(data.data);
      }
      return data;
    })
    .catch(function() {});
  }

  function renderCart(cart) {
    if (cartCount) cartCount.textContent = cart.count;
    if (cartTotal) cartTotal.textContent = cart.total;

    if (!cartItems) return;

    if (cart.count === 0) {
      cartItems.innerHTML = '<div class="cart-drawer-empty">Your cart is empty.</div>';
      return;
    }

    var html = '';
    cart.items.forEach(function (item) {
      html += '<div class="cart-item">';
      html += '  <div class="cart-item-img">';
      if (item.image) {
        html += '    <img src="' + item.image + '" alt="' + item.name + '" style="width:100%;height:100%;object-fit:cover;border-radius:4px;">';
      }
      html += '  </div>';
      html += '  <div class="cart-item-details">';
      html += '    <div class="cart-item-name">' + item.name + '</div>';
      html += '    <div class="cart-item-price">' + item.quantity + ' &times; ' + item.price + '</div>';
      html += '  </div>';
      html += '  <button class="cart-item-remove" data-key="' + item.key + '" aria-label="Remove ' + item.name + '">&times;</button>';
      html += '</div>';
    });
    cartItems.innerHTML = html;

    // Attach remove listeners
    cartItems.querySelectorAll('.cart-item-remove').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var key = this.getAttribute('data-key');
        removeCartItem(key);
      });
    });
  }

  function removeCartItem(key) {
    var formData = new FormData();
    formData.append('action', 'pepora_remove_cart_item');
    formData.append('cart_key', key);
    formData.append('nonce', pepora_ajax.nonce);

    fetch(pepora_ajax.ajax_url, {
      method: 'POST',
      body: formData
    })
    .then(function (res) { return res.json(); })
    .then(function (data) {
      if (data.success) {
        renderCart(data.data);
        pulseCartBadge();
      }
    });
  }

  // Add to cart via WooCommerce AJAX
  function addToCart(productId, quantity) {
    quantity = quantity || 1;
    var formData = new FormData();
    formData.append('action', 'pepora_add_to_cart');
    formData.append('product_id', productId);
    formData.append('quantity', quantity);
    formData.append('nonce', pepora_ajax.nonce);

    return fetch(pepora_ajax.ajax_url, {
      method: 'POST',
      body: formData
    })
    .then(function (res) { return res.json(); })
    .then(function (data) {
      if (data.success) {
        pulseCartBadge();
        return fetchCart();
      }
    })
    .then(function () {
      openCartDrawer();
    });
  }

  // Product card "Add to Cart" buttons
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.js-add-to-cart');
    if (!btn) return;
    e.preventDefault();

    var productId = btn.getAttribute('data-product-id');
    if (productId) {
      btn.textContent = 'Adding...';
      btn.disabled = true;
      addToCart(parseInt(productId, 10)).then(function () {
        btn.textContent = 'Added to Vials';
        setTimeout(function () {
          btn.textContent = 'Add to Cart';
          btn.disabled = false;
        }, 1500);
      });
    }
  });


  /* ── 4. PDP — Form submission via AJAX ──────────────────────── */
  var pdpForm = document.getElementById('pdpForm');
  if (pdpForm) {
    pdpForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var formData = new FormData(pdpForm);
      var productId = parseInt(formData.get('product_id'), 10);
      var quantity = parseInt(formData.get('quantity'), 10) || 1;

      var addBtn = document.getElementById('pdpAddToCart');
      if (addBtn) {
        addBtn.textContent = 'Adding...';
        addBtn.disabled = true;
      }

      addToCart(productId, quantity).then(function () {
        if (addBtn) {
          addBtn.textContent = 'Added to Vials';
          setTimeout(function () {
            addBtn.textContent = 'Add to Cart';
            addBtn.disabled = false;
          }, 1500);
        }
      });
    });
  }

  // PDP sticky bar "Add to Cart"
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.js-add-to-cart-pdp');
    if (!btn || btn.id === 'pdpAddToCart') return;

    if (pdpForm) {
      pdpForm.dispatchEvent(new Event('submit'));
    }
  });


  /* ── 5. QUANTITY SELECTOR ───────────────────────────────────── */
  document.addEventListener('click', function (e) {
    if (e.target.closest('.js-qty-minus')) {
      var input = e.target.closest('.qty-row').querySelector('.qty-num');
      var val = parseInt(input.value, 10);
      if (val > 1) input.value = val - 1;
    }
    if (e.target.closest('.js-qty-plus')) {
      var input = e.target.closest('.qty-row').querySelector('.qty-num');
      var val = parseInt(input.value, 10);
      input.value = val + 1;
    }
  });


  /* ── 6. ACCORDION ───────────────────────────────────────────── */
  document.querySelectorAll('.accordion-trigger').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var item = trigger.closest('.accordion-item');
      var content = item.querySelector('.accordion-content');
      var isOpen = item.classList.contains('is-open');

      var parent = item.closest('.accordion');
      if (parent) {
        parent.querySelectorAll('.accordion-item.is-open').forEach(function (openItem) {
          if (openItem !== item) {
            openItem.classList.remove('is-open');
            openItem.querySelector('.accordion-trigger').setAttribute('aria-expanded', 'false');
            openItem.querySelector('.accordion-content').style.maxHeight = null;
          }
        });
      }

      if (isOpen) {
        item.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
        content.style.maxHeight = null;
      } else {
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
        content.style.maxHeight = content.scrollHeight + 'px';
      }
    });
  });


  /* ── 7. PDP IMAGE GALLERY — Thumbnail switcher ──────────────── */
  document.querySelectorAll('.pdp-thumb').forEach(function (thumb) {
    thumb.addEventListener('click', function () {
      var mainImg = document.getElementById('pdpMainImg');
      var src = thumb.getAttribute('data-image-src');
      var alt = thumb.getAttribute('data-image-alt');

      if (mainImg && src) {
        mainImg.src = src;
        if (alt) mainImg.alt = alt;
      }

      document.querySelectorAll('.pdp-thumb').forEach(function (t) {
        t.classList.remove('active');
      });
      thumb.classList.add('active');
    });
  });


  /* ── 8. MOBILE STICKY BAR (PDP) ─────────────────────────────── */
  var stickyBar = document.getElementById('pdpStickyBar');
  var pdpAddBtn = document.getElementById('pdpAddToCart');

  if (stickyBar && pdpAddBtn) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          stickyBar.classList.remove('is-visible');
        } else {
          stickyBar.classList.add('is-visible');
        }
      });
    }, {
      threshold: 0,
      rootMargin: '-' + (header ? header.offsetHeight : 71) + 'px 0px 0px 0px'
    });

    observer.observe(pdpAddBtn);
  }


  /* ── 9. SCROLL REVEAL ───────────────────────────────────────── */
  var revealElements = document.querySelectorAll('.reveal');
  if (revealElements.length > 0) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -40px 0px'
    });

    revealElements.forEach(function (el) {
      revealObserver.observe(el);
    });
  }


  /* ── 10. COMPARISON MOBILE SCROLL DOTS ──────────────────────── */
  var comparisonMobile = document.getElementById('comparisonMobile');
  var comparisonDots = document.getElementById('comparisonDots');

  if (comparisonMobile && comparisonDots) {
    var dots = comparisonDots.querySelectorAll('.comparison-dot');

    comparisonMobile.addEventListener('scroll', function () {
      var cards = comparisonMobile.querySelectorAll('.comparison-mobile-card');
      if (cards.length === 0) return;

      var cardWidth = cards[0].offsetWidth + 16;
      var scrollLeft = comparisonMobile.scrollLeft;
      var activeIndex = Math.round(scrollLeft / cardWidth);

      dots.forEach(function (dot, i) {
        dot.classList.toggle('active', i === activeIndex);
      });
    }, { passive: true });
  }

})();
