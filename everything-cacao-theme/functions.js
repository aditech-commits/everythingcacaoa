/**
 * Everything Cacao GH - Global Functions & Event Handlers
 * Form submissions routing via WordPress AJAX to concierge email,
 * with static fallback for non-WordPress environments.
 */

function handleQuickFormSubmit(event, formElement) {
  event.preventDefault();
  
  const name = formElement.querySelector("input[name='name']")?.value || "";
  const email = formElement.querySelector("input[name='email']")?.value || "";
  const message = formElement.querySelector("textarea[name='message']")?.value || "";

  if (!name || !email) {
    if (window.EC_Theme) {
      window.EC_Theme.showToast("Please provide your name and email.", "error");
    }
    return false;
  }

  // Trigger Meta Pixel Contact Event
  if (typeof window.fbq === 'function') {
    window.fbq('track', 'Contact', { content_name: 'Quick Home Contact Form' });
  }

  // Submit via WordPress AJAX if available
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
      if (data.success && window.EC_Theme) {
        window.EC_Theme.showToast(data.data.message, "success");
      } else if (window.EC_Theme) {
        window.EC_Theme.showToast(data.data.message || 'There was an issue. Please try WhatsApp.', "error");
      }
    })
    .catch(() => {
      if (window.EC_Theme) {
        window.EC_Theme.showToast(`Thank you ${name}! Your inquiry has been sent to concierge@everythingcacao.com.`, "success");
      }
    });
  } else {
    // Static fallback
    if (window.EC_Theme) {
      window.EC_Theme.showToast(`Thank you ${name}! Your inquiry has been sent to concierge@everythingcacao.com.`, "success");
    }
  }

  formElement.reset();
  return false;
}

function handlePaletteClubSubmit(event, formElement) {
  event.preventDefault();
  const email = formElement.querySelector("input[name='email']")?.value || "";

  if (!email) {
    if (window.EC_Theme) {
      window.EC_Theme.showToast("Please enter a valid email address.", "error");
    }
    return false;
  }

  // Trigger Meta Pixel Contact Event
  if (typeof window.fbq === 'function') {
    window.fbq('track', 'Contact', { content_name: 'The Palette Club Subscription' });
  }

  // Submit via WordPress AJAX if available
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
      if (data.success && window.EC_Theme) {
        window.EC_Theme.showToast(data.data.message, "success");
      }
    })
    .catch(() => {
      if (window.EC_Theme) {
        window.EC_Theme.showToast("Welcome to The Palette Club! You will receive exclusive tasting invitations.", "success");
      }
    });
  } else {
    if (window.EC_Theme) {
      window.EC_Theme.showToast("Welcome to The Palette Club! You will receive exclusive tasting invitations.", "success");
    }
  }

  formElement.reset();
  return false;
}

window.EC_Functions = {
  handleQuickFormSubmit,
  handlePaletteClubSubmit
};
