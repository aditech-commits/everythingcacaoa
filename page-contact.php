<?php
/**
 * Template Name: Contact Us & Concierge
 *
 * Everything Cacao GH - Contact Page Template (page-contact.php)
 * Automatically loaded for page slug 'contact' or 'concierge'
 * (URL: https://everythingcacaogh.com/contact/)
 *
 * All static headers, enquiry cards, contact info, form labels, operating hours,
 * social links, and FAQ items are dynamically editable via WordPress Customizer under Panel:
 * "Contact Page Management" (ID: theme_contact_page_panel)
 *
 * @package EverythingCacao
 */

get_header();
?>

  <!-- Hero Contact Banner -->
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold"><?php echo esc_html(ec_get_text_option('ec_contact_hero_tagline', 'WHOLESALE, CORPORATE GIFTING & CUSTOMER SUPPORT')); ?></span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold"><?php echo esc_html(ec_get_text_option('ec_contact_hero_title', 'Get in Touch with Everything Cacao')); ?></h1>
      <p class="text-canvas/80 text-sm max-w-3xl mx-auto leading-relaxed">
        <?php echo esc_html(ec_get_text_option('ec_contact_hero_desc', "Whether you're a chocolate lover with a question, a retailer interested in stocking our products, or a business looking for bespoke corporate gifting solutions — we'd love to hear from you.")); ?>
      </p>
    </div>
  </section>

  <!-- 2 Enquiries Highlight Cards -->
  <section class="py-12 bg-card-bg border-b border-cacao-dark/10">
    <div class="max-w-5xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Card 1 -->
      <div class="p-8 rounded-xl bg-canvas border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
        <span class="text-xs font-semibold text-accent-terracotta uppercase tracking-wider block"><?php echo esc_html(ec_get_text_option('ec_contact_card1_tag', 'RETAIL PARTNERS')); ?></span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_contact_card1_title', 'Wholesale & Retail Enquiries')); ?></h3>
        <p class="text-xs text-text-muted leading-relaxed">
          <?php echo esc_html(ec_get_text_option('ec_contact_card1_desc', 'Interested in stocking Cherelle or Nahar in your store, supermarket, hotel or cafe? Get in touch with our partnership team for wholesale rates and distributor application.')); ?>
        </p>
      </div>

      <!-- Card 2 -->
      <div class="p-8 rounded-xl bg-canvas border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
        <span class="text-xs font-semibold text-accent-terracotta uppercase tracking-wider block"><?php echo esc_html(ec_get_text_option('ec_contact_card2_tag', 'QUESTIONS & SUPPORT')); ?></span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_contact_card2_title', 'General Enquiries')); ?></h3>
        <p class="text-xs text-text-muted leading-relaxed">
          <?php echo esc_html(ec_get_text_option('ec_contact_card2_desc', 'For general questions about our 100% Ghanaian cacao bars, tasting event trips, ingredients, or order status, send us a email or message us directly on WhatsApp.')); ?>
        </p>
      </div>

    </div>
  </section>

  <!-- Contact & Concierge Form Section -->
  <section id="contact" class="py-12 md:py-16 max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

      <!-- Column 1: Direct Concierge & Contact Form -->
      <div class="lg:col-span-7 bg-card-bg p-8 md:p-12 rounded-2xl border border-cacao-dark/10 shadow-sm space-y-6">
        <div class="space-y-2">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold"><?php echo esc_html(ec_get_text_option('ec_contact_form_title', 'Get in touch')); ?></span>
        </div>

        <!-- Direct Concierge Contact Info Box -->
        <div class="p-6 bg-canvas border-l-4 border-accent-gold rounded text-xs text-text-muted space-y-4">
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block"><?php echo esc_html(ec_get_text_option('ec_contact_phone_label', 'CALL / WHATSAPP US')); ?></span>
            <?php $phone_val = ec_get_text_option('ec_contact_phone_val', '+233 240 661 866'); ?>
            <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', get_option('ec_whatsapp_number', '233240661866'))); ?>" target="_blank" rel="noopener noreferrer" class="font-semibold text-cacao-dark text-sm hover:text-accent-terracotta transition-colors flex items-center gap-1.5">
              <span><?php echo esc_html($phone_val); ?></span>
            </a>
          </div>
          <div class="space-y-1 border-t border-cacao-dark/10 pt-3">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block"><?php echo esc_html(ec_get_text_option('ec_contact_email_label', 'EMAIL ENQUIRIES')); ?></span>
            <?php $email_val = ec_get_text_option('ec_contact_email_val', 'info@everythingcacaogh.com'); ?>
            <a href="mailto:<?php echo esc_attr($email_val); ?>" class="font-semibold text-cacao-dark text-sm hover:text-accent-terracotta transition-colors"><?php echo esc_html($email_val); ?></a>
          </div>
        </div>

        <?php
        // If an ACF shortcode or custom field is set for CF7/WPForms, render it; otherwise use native component
        $form_shortcode = function_exists('get_field') ? get_field('form_shortcode') : '';
        if (!empty($form_shortcode)) {
            echo do_shortcode($form_shortcode);
        } else {
            ?>
            <form id="concierge-form" class="space-y-4">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label for="form-name" class="block text-xs font-semibold uppercase text-cacao-dark mb-1"><?php echo esc_html(ec_get_text_option('ec_contact_form_label_name', 'Full Name')); ?> *</label>
                  <input type="text" id="form-name" name="name" required placeholder="<?php echo esc_attr(ec_get_text_option('ec_contact_form_placeholder_name', 'Kwame Mensah')); ?>" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold" />
                </div>
                <div>
                  <label for="form-email" class="block text-xs font-semibold uppercase text-cacao-dark mb-1"><?php echo esc_html(ec_get_text_option('ec_contact_form_label_email', 'Email Address')); ?> *</label>
                  <input type="email" id="form-email" name="email" required placeholder="<?php echo esc_attr(ec_get_text_option('ec_contact_form_placeholder_email', 'kwame@domain.com')); ?>" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold" />
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label for="form-phone" class="block text-xs font-semibold uppercase text-cacao-dark mb-1"><?php echo esc_html(ec_get_text_option('ec_contact_form_label_phone', 'Phone Number / WhatsApp')); ?></label>
                  <input type="tel" id="form-phone" name="phone" placeholder="<?php echo esc_attr(ec_get_text_option('ec_contact_form_placeholder_phone', '+233 24 066 1866')); ?>" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold" />
                </div>
                <div>
                  <label for="form-inquiry" class="block text-xs font-semibold uppercase text-cacao-dark mb-1"><?php echo esc_html(ec_get_text_option('ec_contact_form_label_category', 'Inquiry Category')); ?></label>
                  <select id="form-inquiry" name="inquiry_type" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold">
                    <option value="Personal Order Inquiry">Personal Chocolate Order</option>
                    <option value="Wholesale &amp; Stockist Partnership" id="wholesale">Stockist &amp; Wholesale Inquiry</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="form-message" class="block text-xs font-semibold uppercase text-cacao-dark mb-1"><?php echo esc_html(ec_get_text_option('ec_contact_form_label_message', 'Your Message')); ?> *</label>
                <textarea id="form-message" name="message" rows="5" required placeholder="<?php echo esc_attr(ec_get_text_option('ec_contact_form_placeholder_message', 'Details about your order, quantity, target date, or custom request...')); ?>" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold"></textarea>
              </div>

              <button type="submit" id="concierge-submit-btn" class="w-full py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors shadow-lg flex items-center justify-center gap-2 rounded">
                <span><?php echo esc_html(ec_get_text_option('ec_contact_form_btn_label', 'SEND MESSAGE')); ?></span>
              </button>
            </form>
            <?php
        }
        ?>
      </div>

      <!-- Column 2: Showroom Info & Social Media Channels -->
      <div class="lg:col-span-5 space-y-8">
        
        <div class="space-y-6 bg-card-bg p-8 rounded-2xl border border-cacao-dark/10 shadow-sm text-sm">
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block"><?php echo esc_html(ec_get_text_option('ec_contact_hours_label', 'OPERATING HOURS')); ?></span>
            <p class="text-xs text-text-muted"><?php echo esc_html(ec_get_text_option('ec_contact_hours_val', 'Monday – Saturday: 9:00 AM – 6:00 PM (GMT)')); ?></p>
          </div>
        </div>

        <!-- Social Media Channels (STRICTLY 2 ACCOUNTS: Facebook & Instagram) -->
        <div class="p-8 bg-cacao-dark text-canvas rounded-2xl space-y-4 shadow-md">
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block"><?php echo esc_html(ec_get_text_option('ec_contact_social_tagline', 'OFFICIAL SOCIAL MEDIA')); ?></span>
            <h4 class="font-serif-luxury text-xl font-bold"><?php echo esc_html(ec_get_text_option('ec_contact_social_title', 'Connect With Us')); ?></h4>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
            <!-- Instagram -->
            <a href="https://instagram.com/everythingcacaogh" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3.5 bg-canvas/10 hover:bg-canvas/20 rounded-xl transition-all border border-canvas/15 group">
              <div class="w-8 h-8 rounded-full bg-accent-gold/20 flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-accent-gold" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </div>
              <div class="text-left">
                <span class="text-[11px] font-bold uppercase tracking-wider block text-canvas group-hover:text-accent-gold transition-colors"><?php echo esc_html(ec_get_text_option('ec_contact_ig_label', 'INSTAGRAM')); ?></span>
                <span class="text-[10px] text-canvas/70 block"><?php echo esc_html(ec_get_text_option('ec_contact_ig_handle', '@everythingcacaogh')); ?></span>
              </div>
            </a>

            <!-- Facebook -->
            <a href="https://facebook.com/everythingcacaogh" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3.5 bg-canvas/10 hover:bg-canvas/20 rounded-xl transition-all border border-canvas/15 group">
              <div class="w-8 h-8 rounded-full bg-accent-gold/20 flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-accent-gold" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </div>
              <div class="text-left">
                <span class="text-[11px] font-bold uppercase tracking-wider block text-canvas group-hover:text-accent-gold transition-colors"><?php echo esc_html(ec_get_text_option('ec_contact_fb_label', 'FACEBOOK')); ?></span>
                <span class="text-[10px] text-canvas/70 block"><?php echo esc_html(ec_get_text_option('ec_contact_fb_name', 'Everything Cacao GH')); ?></span>
              </div>
            </a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- FAQ Accordion Section (Redesigned & Interactive) -->
  <section class="py-20 bg-canvas border-t border-cacao-dark/10">
    <div class="max-w-4xl mx-auto px-6 md:px-12 space-y-12">
      <div class="text-center space-y-3">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta"><?php echo esc_html(ec_get_text_option('ec_contact_faq_tagline', 'COMMON QUESTIONS')); ?></span>
        <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_contact_faq_title', 'Frequently Asked Questions')); ?></h2>
        <p class="text-xs md:text-sm text-text-muted max-w-xl mx-auto"><?php echo esc_html(ec_get_text_option('ec_contact_faq_desc', 'Everything you need to know about our artisanal chocolate collections, shipping policies, stockist partnerships, and custom gifting.')); ?></p>
      </div>

      <div class="space-y-4">
        
        <!-- FAQ 1 -->
        <details class="group border border-cacao-dark/10 rounded-2xl bg-card-bg overflow-hidden transition-all duration-300 hover:border-accent-gold/50 shadow-sm open:border-accent-gold/40 open:shadow-md">
          <summary class="flex justify-between items-center p-6 cursor-pointer select-none font-serif-luxury font-bold text-base md:text-lg text-cacao-dark list-none focus:outline-none">
            <span><?php echo esc_html(ec_get_text_option('ec_contact_faq1_q', 'How do I place an order for chocolate bars or gift sets?')); ?></span>
            <div class="w-8 h-8 rounded-full bg-canvas/80 flex items-center justify-center shrink-0 text-accent-gold group-open:rotate-180 transition-transform duration-300 border border-cacao-dark/10">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
          </summary>
          <div class="px-6 pb-6 text-xs md:text-sm text-text-muted leading-relaxed border-t border-cacao-dark/5 pt-4">
            <?php echo esc_html(ec_get_text_option('ec_contact_faq1_a', 'All purchases are processed directly via WhatsApp or our online concierge to ensure personalized service. Click any "Order via WhatsApp" button across our site to launch a pre-filled chat with our sales desk, who will confirm stock, local delivery in Ghana, or express international shipping options.')); ?>
          </div>
        </details>

        <!-- FAQ 2 -->
        <details class="group border border-cacao-dark/10 rounded-2xl bg-card-bg overflow-hidden transition-all duration-300 hover:border-accent-gold/50 shadow-sm open:border-accent-gold/40 open:shadow-md">
          <summary class="flex justify-between items-center p-6 cursor-pointer select-none font-serif-luxury font-bold text-base md:text-lg text-cacao-dark list-none focus:outline-none">
            <span><?php echo esc_html(ec_get_text_option('ec_contact_faq2_q', 'Do you ship internationally outside Ghana?')); ?></span>
            <div class="w-8 h-8 rounded-full bg-canvas/80 flex items-center justify-center shrink-0 text-accent-gold group-open:rotate-180 transition-transform duration-300 border border-cacao-dark/10">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
          </summary>
          <div class="px-6 pb-6 text-xs md:text-sm text-text-muted leading-relaxed border-t border-cacao-dark/5 pt-4">
            <?php echo esc_html(ec_get_text_option('ec_contact_faq2_a', 'Yes! We ship insulated, temperature-controlled micro-batches via express international courier to selected destinations in West Africa, Europe, North America, and the UK. Contact our concierge desk for direct international shipping rates and delivery timelines.')); ?>
          </div>
        </details>

        <!-- FAQ 3 -->
        <details class="group border border-cacao-dark/10 rounded-2xl bg-card-bg overflow-hidden transition-all duration-300 hover:border-accent-gold/50 shadow-sm open:border-accent-gold/40 open:shadow-md">
          <summary class="flex justify-between items-center p-6 cursor-pointer select-none font-serif-luxury font-bold text-base md:text-lg text-cacao-dark list-none focus:outline-none">
            <span><?php echo esc_html(ec_get_text_option('ec_contact_faq3_q', 'What are the minimum wholesale order quantities for stockists?')); ?></span>
            <div class="w-8 h-8 rounded-full bg-canvas/80 flex items-center justify-center shrink-0 text-accent-gold group-open:rotate-180 transition-transform duration-300 border border-cacao-dark/10">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
          </summary>
          <div class="px-6 pb-6 text-xs md:text-sm text-text-muted leading-relaxed border-t border-cacao-dark/5 pt-4">
            <?php echo esc_html(ec_get_text_option('ec_contact_faq3_a', 'Our wholesale partnership program for hotels, cafes, and boutique outlets begins at 50 units minimum order. We offer tiered wholesale pricing, custom gold-embossed counter displays, and dedicated account management. Submit an inquiry through the form above to receive our wholesale catalog.')); ?>
          </div>
        </details>

        <!-- FAQ 4 -->
        <details class="group border border-cacao-dark/10 rounded-2xl bg-card-bg overflow-hidden transition-all duration-300 hover:border-accent-gold/50 shadow-sm open:border-accent-gold/40 open:shadow-md">
          <summary class="flex justify-between items-center p-6 cursor-pointer select-none font-serif-luxury font-bold text-base md:text-lg text-cacao-dark list-none focus:outline-none">
            <span><?php echo esc_html(ec_get_text_option('ec_contact_faq4_q', 'Can we request custom gold-foil branding for corporate events & weddings?')); ?></span>
            <div class="w-8 h-8 rounded-full bg-canvas/80 flex items-center justify-center shrink-0 text-accent-gold group-open:rotate-180 transition-transform duration-300 border border-cacao-dark/10">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
          </summary>
          <div class="px-6 pb-6 text-xs md:text-sm text-text-muted leading-relaxed border-t border-cacao-dark/5 pt-4">
            <?php echo esc_html(ec_get_text_option('ec_contact_faq4_a', 'Absolutely. We provide custom gold-embossed sleeves, bespoke wooden presentation hampers, and personalized wax seals for luxury corporate gifting and private events. Submit a request via our concierge form or WhatsApp us directly for a 24-hour custom quote.')); ?>
          </div>
        </details>

      </div>
    </div>
  </section>

  <!-- Elementor / WP Content Support Area -->
  <div class="elementor-content-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
  </div>

<?php
get_footer();
