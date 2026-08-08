/**
 * Everything Cacao GH - Meta (Facebook) Pixel & Analytics Tracking Hook
 */

window.fbq = window.fbq || function() {
  (window.fbq.q = window.fbq.q || []).push(arguments);
};
window.fbq.l = +new Date();

/**
 * Track WhatsApp order lead event
 */
function trackLead(productName, price = 0, subBrand = 'Everything Cacao') {
  console.log(`[Meta Pixel] Tracking Lead: ${productName} (${subBrand}) - GHC ${price}`);
  if (typeof window.fbq === 'function') {
    window.fbq('track', 'Lead', {
      content_name: productName,
      content_category: subBrand,
      value: typeof price === 'number' ? price : parseFloat(price) || 0,
      currency: 'GHS'
    });
  }
}

/**
 * Track Contact Form submission event
 */
function trackContact(inquiryType = 'General Inquiry') {
  console.log(`[Meta Pixel] Tracking Contact: ${inquiryType}`);
  if (typeof window.fbq === 'function') {
    window.fbq('track', 'Contact', {
      content_name: inquiryType
    });
  }
}

/**
 * Track catalog view / tab filter event
 */
function trackViewContent(categoryName = 'All Collections') {
  console.log(`[Meta Pixel] Tracking ViewContent: ${categoryName}`);
  if (typeof window.fbq === 'function') {
    window.fbq('track', 'ViewContent', {
      content_category: categoryName
    });
  }
}

window.EC_Tracking = {
  trackLead,
  trackContact,
  trackViewContent
};
