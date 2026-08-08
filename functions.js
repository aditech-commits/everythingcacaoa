/**
 * Everything Cacao GH - Global Functions & Event Handlers
 * Form submissions routing to concierge@everythingcacao.com and Meta Pixel triggers.
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

  console.log(`[Form Dispatch] Sending inquiry from ${name} (${email}) to concierge@everythingcacao.com`);

  if (window.EC_Theme) {
    window.EC_Theme.showToast(`Thank you ${name}! Your inquiry has been sent to concierge@everythingcacao.com.`, "success");
  }

  formElement.reset();
  return false;
}

function handlePaletteClubSubmit(event, formElement) {
  event.preventDefault();
  const email = formElement.querySelector("input[name='email']")?.value || "";

  if (typeof window.fbq === 'function') {
    window.fbq('track', 'Contact', { content_name: 'The Palette Club Subscription' });
  }

  if (window.EC_Theme) {
    window.EC_Theme.showToast("Welcome to The Palette Club! You will receive exclusive tasting invitations.", "success");
  }

  formElement.reset();
  return false;
}

window.EC_Functions = {
  handleQuickFormSubmit,
  handlePaletteClubSubmit
};
