/**
 * Everything Cacao GH - Meta (Facebook) Pixel Event Helper
 */

function trackLead(productName, price, subBrand = 'Artisanal') {
  if (typeof window.fbq === 'function') {
    window.fbq('track', 'Lead', {
      content_name: productName,
      content_category: subBrand,
      value: parseFloat(price) || 0,
      currency: 'GHS'
    });
  }
}

function trackContact(inquiryType = 'General Inquiry') {
  if (typeof window.fbq === 'function') {
    window.fbq('track', 'Contact', {
      content_name: inquiryType
    });
  }
}

function trackViewContent(categoryName = 'Catalog') {
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
