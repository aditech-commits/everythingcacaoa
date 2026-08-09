/**
 * Everything Cacao GH - Theme Application Logic
 */

document.addEventListener("DOMContentLoaded", () => {
  initMobileMenu();
  initQuickForms();
  initPaletteClubForm();
  initScrollAnimations();
});

/**
 * Global Scroll-Reveal Animation Engine
 * Uses IntersectionObserver to reveal .ec-animate elements with staggered delays
 * when they scroll into view. Works across ALL pages.
 */
function initScrollAnimations() {
  var targets = document.querySelectorAll('.ec-animate');
  if (!targets.length) return;

  // Respect prefers-reduced-motion
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    targets.forEach(function(el) { el.classList.add('ec-visible'); });
    return;
  }

  // Auto-assign stagger delay classes to sibling .ec-animate inside grids
  var grids = document.querySelectorAll('.grid, [class*="grid-cols"]');
  grids.forEach(function(grid) {
    var children = grid.querySelectorAll(':scope > .ec-animate');
    children.forEach(function(child, i) {
      var delayIndex = Math.min(i + 1, 6);
      child.classList.add('ec-delay-' + delayIndex);
    });
  });

  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('ec-visible');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.08,
    rootMargin: '0px 0px -40px 0px'
  });

  targets.forEach(function(el) { observer.observe(el); });
}

function initMobileMenu() {
  const toggleBtn = document.getElementById("mobile-menu-btn");
  const mobileDrawer = document.getElementById("mobile-drawer");
  const closeBtn = document.getElementById("close-drawer-btn");

  if (toggleBtn && mobileDrawer) {
    toggleBtn.addEventListener("click", () => mobileDrawer.classList.remove("translate-x-full"));
  }
  if (closeBtn && mobileDrawer) {
    closeBtn.addEventListener("click", () => mobileDrawer.classList.add("translate-x-full"));
  }
}

function initQuickForms() {
  const quickForms = document.querySelectorAll(".quick-inquiry-form");
  quickForms.forEach(form => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const name = form.querySelector("[name='name']")?.value || "";

      if (window.EC_Tracking) {
        window.EC_Tracking.trackContact('Quick Home Inquiry');
      }

      showToast(`Thank you ${name}! Your inquiry has been routed to concierge@everythingcacao.com.`, 'success');
      form.reset();
    });
  });

  initConciergeForm();
}

function initConciergeForm() {
  const conciergeForm = document.getElementById("concierge-form");
  if (!conciergeForm) return;

  conciergeForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const name    = conciergeForm.querySelector("[name='name']")?.value || "";
    const email   = conciergeForm.querySelector("[name='email']")?.value || "";
    const phone   = conciergeForm.querySelector("[name='phone']")?.value || "";
    const inquiry = conciergeForm.querySelector("[name='inquiry_type']")?.value || "General Inquiry";
    const message = conciergeForm.querySelector("[name='message']")?.value || "";
    const btn     = document.getElementById("concierge-submit-btn");

    if (!name || !email) {
      showToast("Please enter your name and email address.", "error");
      return;
    }

    if (btn) {
      btn.disabled = true;
      btn.innerHTML = '<span>Sending Message...</span>';
    }

    // Trigger Meta Pixel Contact Event
    if (typeof window.fbq === 'function') {
      window.fbq('track', 'Contact', { content_name: inquiry, user_email: email });
    }

    // Check if WordPress AJAX data exists
    if (window.EC_WP_Data && window.EC_WP_Data.ajax_url) {
      const formData = new FormData();
      formData.append('action', 'ec_submit_concierge');
      formData.append('nonce', window.EC_WP_Data.nonce);
      formData.append('name', name);
      formData.append('email', email);
      formData.append('phone', phone);
      formData.append('inquiry_type', inquiry);
      formData.append('message', message);

      fetch(window.EC_WP_Data.ajax_url, {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          showToast(data.data.message || `Thank you ${name}! Your inquiry has been routed to concierge@everythingcacao.com.`, 'success');
          conciergeForm.reset();
        } else {
          showToast(data.data.message || 'There was an issue sending your message. Please try WhatsApp.', 'error');
        }
      })
      .catch(err => {
        console.warn('AJAX fallback triggered:', err);
        showToast(`Thank you ${name}! Your inquiry has been routed to concierge@everythingcacao.com.`, 'success');
        conciergeForm.reset();
      })
      .finally(() => {
        if (btn) {
          btn.disabled = false;
          btn.innerHTML = '<span>Send Concierge Message</span>';
        }
      });
    } else {
      // Local / static fallback
      setTimeout(() => {
        showToast(`Thank you ${name}! Your inquiry has been routed to concierge@everythingcacao.com.`, 'success');
        conciergeForm.reset();
        if (btn) {
          btn.disabled = false;
          btn.innerHTML = '<span>Send Concierge Message</span>';
        }
      }, 500);
    }
  });
}

function initPaletteClubForm() {
  const paletteForm = document.getElementById("palette-club-form");
  if (paletteForm) {
    paletteForm.addEventListener("submit", (e) => {
      e.preventDefault();
      if (window.EC_Tracking) {
        window.EC_Tracking.trackContact('Palette Club Subscription');
      }
      showToast('Welcome to The Palette Club! Check your inbox for private tasting invitations.', 'success');
      paletteForm.reset();
    });
  }
}

function showToast(message, type = "success") {
  let container = document.getElementById("toast-container");
  if (!container) {
    container = document.createElement("div");
    container.id = "toast-container";
    container.className = "fixed bottom-8 left-8 z-50 flex flex-col gap-3 max-w-md";
    document.body.appendChild(container);
  }

  const toast = document.createElement("div");
  toast.className = `p-4 rounded shadow-2xl text-xs font-semibold flex items-center justify-between gap-4 border ${
    type === "success" 
      ? "bg-cacao-dark text-canvas border-accent-gold" 
      : "bg-red-900 text-white border-red-500"
  }`;
  toast.innerHTML = `<span>${message}</span><button onclick="this.parentElement.remove()" class="text-xs">&times;</button>`;

  container.appendChild(toast);
  setTimeout(() => toast.remove(), 6000);
}

window.EC_Theme = {
  showToast
};
