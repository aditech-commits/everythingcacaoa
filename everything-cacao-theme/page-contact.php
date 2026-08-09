<?php
/**
 * Template Name: Contact Us & Concierge
 *
 * Everything Cacao GH - Contact Page Template (page-contact.php)
 * Automatically loaded for page slug 'contact' or 'concierge'
 * (URL: https://everythingcacaogh.com/contact/)
 *
 * @package EverythingCacao
 */

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        if (did_action('elementor/loaded') && (\Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID()) || \Elementor\Plugin::$instance->preview->is_preview_mode())) :
            ?>
            <main id="primary" class="site-main elementor-page-wrapper">
              <?php the_content(); ?>
            </main>
            <?php
        else :
            ?>
  <!-- Hero Contact Banner -->
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">WHOLESALE, CORPORATE GIFTING &amp; CUSTOMER SUPPORT</span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold">Get in Touch with Everything Cacao GH</h1>
      <p class="text-canvas/80 text-sm max-w-3xl mx-auto leading-relaxed">
        Whether you're a chocolate lover with a question, a retailer interested in stocking our products, or a business looking for bespoke corporate gifting solutions &mdash; we'd love to hear from you.
      </p>
    </div>
  </section>

  <!-- 3 Enquiries Highlight Cards -->
  <section class="py-12 bg-card-bg border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <div class="p-8 rounded-xl bg-canvas border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
        <span class="text-xs font-semibold text-accent-terracotta uppercase tracking-wider block">Retail Partners</span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">Wholesale &amp; Retail Enquiries</h3>
        <p class="text-xs text-text-muted leading-relaxed">
          Interested in stocking Nahar or Cherelle in your store, supermarket, hotel or cafe? Get in touch with our partnership desk to discuss wholesale rates and display options.
        </p>
      </div>

      <div class="p-8 rounded-xl bg-canvas border border-cacao-dark/10 space-y-3 border-t-4 border-accent-gold shadow-sm hover:shadow-md transition-shadow">
        <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Bespoke Packages</span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">Corporate Gifting &amp; Events</h3>
        <p class="text-xs text-text-muted leading-relaxed">
          Looking for premium Ghanaian chocolate gifts for your team, executive clients or upcoming wedding? Everything Cacao offers custom gold-embossed sleeves and gift hampers.
        </p>
      </div>

      <div class="p-8 rounded-xl bg-canvas border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
        <span class="text-xs font-semibold text-accent-terracotta uppercase tracking-wider block">Questions &amp; Support</span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">General Enquiries</h3>
        <p class="text-xs text-text-muted leading-relaxed">
          For any questions about our 100% Ghanaian cacao bars, tasting workshops, ingredients or order status &mdash; reach out via our message form or WhatsApp desk.
        </p>
      </div>

    </div>
  </section>

  <!-- Contact & Concierge Form Section -->
  <section id="contact" class="py-24 max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

      <!-- Column 1: Direct Concierge & Contact Form -->
      <div class="lg:col-span-7 bg-card-bg p-8 md:p-12 rounded-2xl border border-cacao-dark/10 shadow-sm space-y-6">
        <div class="space-y-2">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Direct Concierge Routing</span>
          <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">Concierge Message Form</h3>
          <p class="text-xs text-text-muted">Submissions route directly to <strong class="text-cacao-dark">concierge@everythingcacao.com</strong> with fast-track routing for corporate gifting &amp; stockist bookings.</p>
        </div>

        <!-- Direct Concierge Contact Info Box -->
        <div class="p-6 bg-canvas border-l-4 border-accent-gold rounded text-xs text-text-muted space-y-4">
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Direct WhatsApp Chat</span>
            <a href="https://wa.me/<?php echo esc_attr(get_option('ec_whatsapp_number', '233240661866')); ?>" target="_blank" rel="noopener noreferrer" class="font-semibold text-cacao-dark text-sm hover:text-accent-terracotta transition-colors flex items-center gap-1.5">
              <span>+<?php echo esc_html(get_option('ec_whatsapp_number', '233240661866')); ?></span>
            </a>
            <p class="text-[11px] opacity-80">Click to instantly chat with a sales concierge representative</p>
          </div>
          <div class="space-y-1 border-t border-cacao-dark/10 pt-3">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Email Inquiries</span>
            <a href="mailto:concierge@everythingcacao.com" class="font-semibold text-cacao-dark text-sm hover:text-accent-terracotta transition-colors">concierge@everythingcacao.com</a>
          </div>
          <div class="space-y-1 border-t border-cacao-dark/10 pt-3">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Private Gifting &amp; Weddings</span>
            <p>Fast-track booking available for bulk orders and custom gold-embossed packaging.</p>
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
                  <label for="form-name" class="block text-xs font-semibold uppercase text-cacao-dark mb-1">Full Name *</label>
                  <input type="text" id="form-name" name="name" required placeholder="Kwame Mensah" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold" />
                </div>
                <div>
                  <label for="form-email" class="block text-xs font-semibold uppercase text-cacao-dark mb-1">Email Address *</label>
                  <input type="email" id="form-email" name="email" required placeholder="kwame@domain.com" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold" />
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label for="form-phone" class="block text-xs font-semibold uppercase text-cacao-dark mb-1">Phone Number / WhatsApp</label>
                  <input type="tel" id="form-phone" name="phone" placeholder="+233 24 066 1866" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold" />
                </div>
                <div>
                  <label for="form-inquiry" class="block text-xs font-semibold uppercase text-cacao-dark mb-1">Inquiry Category</label>
                  <select id="form-inquiry" name="inquiry_type" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold">
                    <option value="Personal Order Inquiry">Personal Chocolate Order</option>
                    <option value="Corporate Gifting &amp; Hampers">Corporate Gifting &amp; Hampers</option>
                    <option value="Weddings &amp; Custom Favors">Weddings &amp; Celebration Favors</option>
                    <option value="Wholesale &amp; Stockist Partnership" id="wholesale">Stockist &amp; Wholesale Inquiry</option>
                    <option value="Tasting Workshop &amp; Tour">Tasting Workshop Booking</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="form-message" class="block text-xs font-semibold uppercase text-cacao-dark mb-1">Your Message *</label>
                <textarea id="form-message" name="message" rows="5" required placeholder="Details about your order, quantity, target date, or custom request..." class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold"></textarea>
              </div>

              <button type="submit" id="concierge-submit-btn" class="w-full py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors shadow-lg flex items-center justify-center gap-2 rounded">
                <span>Send Concierge Message</span>
              </button>
            </form>
            <?php
        }
        ?>
      </div>

      <!-- Column 2: Showroom Info & Social Media Channels -->
      <div class="lg:col-span-5 space-y-8">
        
        <div class="space-y-4">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Accra Atelier &amp; Showroom</span>
          <h2 class="font-serif-luxury text-3xl font-bold text-cacao-dark">Visiting &amp; Hours</h2>
          <p class="text-xs text-text-muted leading-relaxed">
            Our atelier and showroom in Accra is open for chocolate pickups, corporate consultations, and private micro-batch tasting sessions.
          </p>
        </div>

        <div class="space-y-6 bg-card-bg p-8 rounded-2xl border border-cacao-dark/10 shadow-sm text-sm">
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Flagship Showroom</span>
            <p class="font-medium text-cacao-dark">Airport Residential Area, Accra, Ghana</p>
          </div>
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Operating Hours</span>
            <p class="text-xs text-text-muted">Monday – Saturday: 9:00 AM – 6:00 PM (GMT)</p>
            <p class="text-xs text-text-muted">Sunday: Private Appointments Only</p>
          </div>
          <div class="space-y-1 border-t border-cacao-dark/10 pt-4">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Direct Concierge Email</span>
            <p class="text-xs text-text-muted">concierge@everythingcacao.com</p>
          </div>
          <div class="space-y-1 border-t border-cacao-dark/10 pt-4">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Direct WhatsApp &amp; Calls</span>
            <p class="text-xs text-text-muted">+233 24 066 1866</p>
          </div>
        </div>

        <!-- Social Media Channels (STRICTLY 2 ACCOUNTS: Facebook & Instagram) -->
        <div class="p-8 bg-cacao-dark text-canvas rounded-2xl space-y-4 shadow-md">
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Official Social Media</span>
            <h4 class="font-serif-luxury text-xl font-bold">Connect With Us</h4>
          </div>
          <p class="text-xs text-canvas/80 leading-relaxed">
            Follow our official channels for micro-batch drops, behind-the-scenes harvest stories, and chocolate pairings.
          </p>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
            <!-- Instagram -->
            <a href="https://instagram.com/everythingcacaogh" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3.5 bg-canvas/10 hover:bg-canvas/20 rounded-xl transition-all border border-canvas/15 group">
              <div class="w-8 h-8 rounded-full bg-accent-gold/20 flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-accent-gold" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </div>
              <div class="text-left">
                <span class="text-[11px] font-bold uppercase tracking-wider block text-canvas group-hover:text-accent-gold transition-colors">Instagram</span>
                <span class="text-[10px] text-canvas/70 block">@everythingcacaogh</span>
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
                <span class="text-[11px] font-bold uppercase tracking-wider block text-canvas group-hover:text-accent-gold transition-colors">Facebook</span>
                <span class="text-[10px] text-canvas/70 block">Everything Cacao GH</span>
              </div>
            </a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- FAQ Accordion Section -->
  <section class="py-24 bg-canvas border-t border-cacao-dark/10">
    <div class="max-w-4xl mx-auto px-6 md:px-12 space-y-12">
      <div class="text-center space-y-3">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Common Questions</span>
        <h2 class="font-serif-luxury text-3xl font-bold text-cacao-dark">Frequently Asked Questions</h2>
      </div>

      <div class="space-y-4">
        <!-- FAQ 1 -->
        <div class="border border-cacao-dark/10 rounded-lg bg-card-bg overflow-hidden">
          <button class="faq-trigger w-full p-6 text-left font-serif-luxury font-bold text-lg text-cacao-dark flex justify-between items-center hover:bg-canvas/50">
            <span>How do I place an order for chocolate bars or gift sets?</span>
            <span class="faq-icon text-xl font-sans">+</span>
          </button>
          <div class="accordion-content px-6 pb-6 text-xs text-text-muted leading-relaxed">
            All purchases are processed directly via WhatsApp or our concierge desk to ensure personalized service. Submit an enquiry above or click the WhatsApp trigger to launch a pre-filled chat with our sales representative, who will confirm stock and delivery options in Ghana or internationally.
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="border border-cacao-dark/10 rounded-lg bg-card-bg overflow-hidden">
          <button class="faq-trigger w-full p-6 text-left font-serif-luxury font-bold text-lg text-cacao-dark flex justify-between items-center hover:bg-canvas/50">
            <span>Do you ship internationally outside Ghana?</span>
            <span class="faq-icon text-xl font-sans">+</span>
          </button>
          <div class="accordion-content px-6 pb-6 text-xs text-text-muted leading-relaxed">
            Yes! We ship insulated temperature-controlled micro-batches via express courier to selected destinations across West Africa, Europe, North America, and the UK. Contact our concierge desk for shipping quotes.
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="border border-cacao-dark/10 rounded-lg bg-card-bg overflow-hidden">
          <button class="faq-trigger w-full p-6 text-left font-serif-luxury font-bold text-lg text-cacao-dark flex justify-between items-center hover:bg-canvas/50">
            <span>What are the minimum wholesale order quantities for stockists?</span>
            <span class="faq-icon text-xl font-sans">+</span>
          </button>
          <div class="accordion-content px-6 pb-6 text-xs text-text-muted leading-relaxed">
            Our wholesale stockist program starts at a minimum order of 50 units. We offer tiered pricing, custom wooden countertop display units, and staff product training. Select "Stockist &amp; Wholesale Inquiry" in our form above to request our trade catalogue.
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="border border-cacao-dark/10 rounded-lg bg-card-bg overflow-hidden">
          <button class="faq-trigger w-full p-6 text-left font-serif-luxury font-bold text-lg text-cacao-dark flex justify-between items-center hover:bg-canvas/50">
            <span>Can we request custom gold-foil branding for corporate events &amp; weddings?</span>
            <span class="faq-icon text-xl font-sans">+</span>
          </button>
          <div class="accordion-content px-6 pb-6 text-xs text-text-muted leading-relaxed">
            Absolutely. We provide custom gold-embossed sleeves, custom wooden presentation hampers, and personalized wax seals for orders of 25 units or more. Submit a request via the form above or WhatsApp us directly for a quotation.
          </div>
        </div>
      </div>
    </div>
  <!-- Optional WP / Elementor Content Area -->
  <?php if (get_the_content()) : ?>
    <section class="py-12 max-w-7xl mx-auto px-6 md:px-12">
      <?php the_content(); ?>
    </section>
  <?php endif; ?>

  <?php
        endif;
    endwhile;
endif;

get_footer();

