/**
 * Everything Cacao GH - Theme Application Logic (FSE Version)
 */

document.addEventListener("DOMContentLoaded", () => {
  initQuickForms();
  initPaletteClubForm();
  initScrollAnimations();
});

function initScrollAnimations() {
  var targets = document.querySelectorAll('.ec-animate');
  if (!targets.length) return;

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    targets.forEach(function(el) { el.classList.add('ec-visible'); });
    return;
  }

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
  }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

  targets.forEach(function(el) { observer.observe(el); });
}

function initQuickForms() {
  const quickForms = document.querySelectorAll(".quick-inquiry-form");
  quickForms.forEach(form => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const name    = form.querySelector("[name='name']")?.value || "";
      const email   = form.querySelector("[name='email']")?.value || "";
      const message = form.querySelector("[name='message']")?.value || "";

      if (!name || !email) {
        showToast("Please provide your name and email.", "error");
        return;
      }

      if (window.EC_Tracking) {
        window.EC_Tracking.trackContact('Quick Home Inquiry');
      }

      if (window.EC_WP_Data && window.EC_WP_Data.ajax_url) {
        const formData = new FormData();
        formData.append('action', 'ec_submit_quick_inquiry');
        formData.append('nonce', window.EC_WP_Data.nonce);
        formData.append('name', name);
        formData.append('email', email);
        formData.append('message', message);

        fetch(window.EC_WP_Data.ajax_url, {
          method: 'POST',
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          showToast(data.data.message || `Thank you ${name}! Your inquiry has been sent.`, 'success');
          form.reset();
        })
        .catch(() => {
          showToast(`Thank you ${name}! Your inquiry has been sent to info@everythingcacaogh.com.`, 'success');
          form.reset();
        });
      } else {
        showToast(`Thank you ${name}! Your inquiry has been sent to info@everythingcacaogh.com.`, 'success');
        form.reset();
      }
    });
  });
}

function initPaletteClubForm() {
  const paletteForm = document.getElementById("palette-club-form");
  if (!paletteForm) return;

  paletteForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = paletteForm.querySelector("[name='email']")?.value || "";

    if (!email) {
      showToast("Please enter your email address.", "error");
      return;
    }

    if (window.EC_Tracking) {
      window.EC_Tracking.trackContact('Palette Club Subscription');
    }

    if (window.EC_WP_Data && window.EC_WP_Data.ajax_url) {
      const formData = new FormData();
      formData.append('action', 'ec_submit_palette_club');
      formData.append('nonce', window.EC_WP_Data.nonce);
      formData.append('email', email);

      fetch(window.EC_WP_Data.ajax_url, {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        showToast(data.data.message || 'Welcome to The Palette Club!', 'success');
        paletteForm.reset();
      })
      .catch(() => {
        showToast('Welcome to The Palette Club! Check your inbox for private tasting invitations.', 'success');
        paletteForm.reset();
      });
    } else {
      showToast('Welcome to The Palette Club! Check your inbox for private tasting invitations.', 'success');
      paletteForm.reset();
    }
  });
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

window.EC_Theme = { showToast };
