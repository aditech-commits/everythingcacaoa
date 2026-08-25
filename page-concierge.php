<?php
/**
 * Template Name: Concierge & Stockists
 *
 * Everything Cacao GH - Concierge Page Template (page-concierge.php)
 * Compatible with Contact Form 7 or WPForms shortcodes via ACF/custom field
 *
 * @package EverythingCacao
 */

get_header();
?>

  <!-- Hero Contact Banner -->
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Wholesale, Corporate Gifting &amp; Customer Support</span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold">Get in Touch with Everything Cacao</h1>
      <p class="text-canvas/80 text-sm max-w-3xl mx-auto leading-relaxed">
        Whether you're a chocolate lover with a question, a retailer interested in stocking our products or a business looking for corporate gifting solutions &mdash; we'd love to hear from you.
      </p>
    </div>
  </section>

  <!-- 3 Enquiries Highlight Cards -->
  <section class="py-12 bg-card-bg border-b border-cacao-dark/10">
    <div class="max-w-5xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="p-8 rounded-xl bg-canvas border border-cacao-dark/10 space-y-3">
        <span class="text-xs font-semibold text-accent-terracotta uppercase tracking-wider block">Retail Partners</span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">Wholesale &amp; Retail Enquiries</h3>
        <p class="text-xs text-text-muted leading-relaxed">
          Interested in stocking Nahar or Cherelle in your store, supermarket or cafe? Get in touch with our team to discuss wholesale pricing and minimum orders.
        </p>
      </div>


      <div class="p-8 rounded-xl bg-canvas border border-cacao-dark/10 space-y-3">
        <span class="text-xs font-semibold text-accent-terracotta uppercase tracking-wider block">Questions &amp; Support</span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">General Enquiries</h3>
        <p class="text-xs text-text-muted leading-relaxed">
          For any other questions about our chocolate, our brands or our story &mdash; reach out via the form below or contact us directly.
        </p>
      </div>
    </div>
  </section>

  <!-- Contact & Concierge Form Section -->
  <section id="contact" class="py-12 md:py-16 max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

      <!-- Column 1: Direct Concierge & Contact Form -->
      <div class="lg:col-span-7 bg-card-bg p-8 md:p-12 rounded-lg border border-cacao-dark/10 shadow-sm space-y-6">
        <div class="space-y-2">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Get in touch</span>
        </div>

        <!-- Direct Concierge Contact Info -->
        <div class="p-6 bg-canvas border-l-4 border-accent-gold rounded text-xs text-text-muted space-y-4">
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Call/WhatsApp Chat</span>
            <a href="https://wa.me/<?php echo esc_attr(get_option('ec_whatsapp_number', '233240000000')); ?>" target="_blank" rel="noopener noreferrer" class="font-semibold text-cacao-dark text-sm hover:text-accent-terracotta transition-colors">
              +<?php echo esc_html(get_option('ec_whatsapp_number', '233240000000')); ?>
            </a>

          </div>
          <div class="space-y-1 border-t border-cacao-dark/10 pt-3">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Email Inquiries</span>
            <a href="mailto:concierge@everythingcacao.com" class="font-semibold text-cacao-dark text-sm hover:text-accent-terracotta transition-colors">concierge@everythingcacao.com</a>
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
                  <input type="tel" id="form-phone" name="phone" placeholder="+233 24 000 0000" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold" />
                </div>
                <div>
                  <label for="form-inquiry" class="block text-xs font-semibold uppercase text-cacao-dark mb-1">Inquiry Category</label>
                  <select id="form-inquiry" name="inquiry_type" class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold">
                    <option value="Personal Order Inquiry">Personal Chocolate Order</option>
                    <option value="Wholesale &amp; Stockist Partnership">Stockist &amp; Wholesale Inquiry</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="form-message" class="block text-xs font-semibold uppercase text-cacao-dark mb-1">Your Message *</label>
                <textarea id="form-message" name="message" rows="5" required placeholder="Details about your order, quantity, target date, or custom request..." class="w-full px-4 py-3 bg-canvas border border-cacao-dark/20 rounded text-sm focus:outline-none focus:border-accent-gold"></textarea>
              </div>

              <button type="submit" id="concierge-submit-btn" class="w-full py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors shadow-lg flex items-center justify-center gap-2">
                <span>Send Concierge Message</span>
              </button>
            </form>
            <?php
        }
        ?>
      </div>

      <!-- Column 2: Where to Find Us & Socials -->
      <div class="lg:col-span-5 space-y-8">
        <div class="space-y-4">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Accra Atelier &amp; Retail Partners</span>
          <h2 class="font-serif-luxury text-3xl font-bold text-cacao-dark">Where to Find Us</h2>
          <p class="text-xs text-text-muted leading-relaxed">
            Explore the list of upscale lifestyle boutiques, cafes, and gourmet grocers across Accra carrying our collections.
          </p>
        </div>

        <div class="space-y-6 bg-card-bg p-8 rounded-lg border border-cacao-dark/10 shadow-sm text-sm">
          <div class="space-y-1">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Operating Hours</span>
            <p class="text-xs text-text-muted">Monday – Saturday: 9:00 AM – 6:00 PM (GMT)</p>
          </div>
          <div class="space-y-1 border-t border-cacao-dark/10 pt-4">
            <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Accra Stockist Cafes</span>
            <ul class="text-xs text-text-muted space-y-1.5 pt-1">
              <li>• The Gold Coast Roastery — Cantonments</li>
              <li>• Atelier Cacao &amp; Espresso Bar — Osu</li>
              <li>• Crown Heritage Boutique Hotel — Labone</li>
            </ul>
          </div>
        </div>

        <!-- Social Media Integration -->
        <div class="p-6 bg-cacao-dark text-canvas rounded-lg space-y-4">
          <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider block">Social Media Integration</span>
          <p class="text-xs text-canvas/70">Follow @everythingcacaogh for micro-batch drops and behind-the-scenes stories.</p>
          <div class="flex items-center gap-4 text-xs font-semibold text-accent-gold">
            <a href="https://instagram.com/everythingcacaogh" target="_blank" rel="noopener noreferrer" class="hover:underline flex items-center gap-1">
              <span>Instagram</span> (@everythingcacaogh)
            </a>
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="hover:underline">Facebook</a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="hover:underline">LinkedIn</a>
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
        <div class="faq-item border border-cacao-dark/10 rounded-lg bg-card-bg overflow-hidden transition-all duration-300">
          <button type="button" class="faq-trigger w-full p-6 text-left font-serif-luxury font-bold text-lg text-cacao-dark flex justify-between items-center hover:bg-canvas/50 transition-colors">
            <span>How do I place an order for chocolate bars or gift sets?</span>
            <span class="faq-icon text-xl font-sans font-semibold text-accent-gold transition-transform duration-300">+</span>
          </button>
          <div class="accordion-content hidden px-6 pb-6 text-sm text-text-muted leading-relaxed border-t border-cacao-dark/5 pt-4">
            All purchases are processed directly via WhatsApp to ensure personalized service. Click any "Order via WhatsApp" button across our site to launch a pre-filled chat with our sales concierge, who will confirm stock, delivery address in Ghana or international shipping options.
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item border border-cacao-dark/10 rounded-lg bg-card-bg overflow-hidden transition-all duration-300">
          <button type="button" class="faq-trigger w-full p-6 text-left font-serif-luxury font-bold text-lg text-cacao-dark flex justify-between items-center hover:bg-canvas/50 transition-colors">
            <span>Do you ship internationally outside Ghana?</span>
            <span class="faq-icon text-xl font-sans font-semibold text-accent-gold transition-transform duration-300">+</span>
          </button>
          <div class="accordion-content hidden px-6 pb-6 text-sm text-text-muted leading-relaxed border-t border-cacao-dark/5 pt-4">
            Yes! We ship insulated temperature-controlled micro-batches via express international courier to selected destinations in West Africa, Europe, North America, and the UK. Contact our concierge desk for shipping rates.
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item border border-cacao-dark/10 rounded-lg bg-card-bg overflow-hidden transition-all duration-300">
          <button type="button" class="faq-trigger w-full p-6 text-left font-serif-luxury font-bold text-lg text-cacao-dark flex justify-between items-center hover:bg-canvas/50 transition-colors">
            <span>What are the minimum wholesale order quantities?</span>
            <span class="faq-icon text-xl font-sans font-semibold text-accent-gold transition-transform duration-300">+</span>
          </button>
          <div class="accordion-content hidden px-6 pb-6 text-sm text-text-muted leading-relaxed border-t border-cacao-dark/5 pt-4">
            Our wholesale partnership program begins at 50 units minimum order. We offer tiered pricing, custom gold-embossed packaging for corporate clients, and dedicated account management. Select the "Stockist &amp; Wholesale Inquiry" option in our form above.
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item border border-cacao-dark/10 rounded-lg bg-card-bg overflow-hidden transition-all duration-300">
          <button type="button" class="faq-trigger w-full p-6 text-left font-serif-luxury font-bold text-lg text-cacao-dark flex justify-between items-center hover:bg-canvas/50 transition-colors">
            <span>Can we request custom gold-foil branding for corporate events?</span>
            <span class="faq-icon text-xl font-sans font-semibold text-accent-gold transition-transform duration-300">+</span>
          </button>
          <div class="accordion-content hidden px-6 pb-6 text-sm text-text-muted leading-relaxed border-t border-cacao-dark/5 pt-4">
            Absolutely. We provide custom gold-embossed sleeves, custom wooden presentation hampers, and personalized wax seals for orders of 25 units or more. Submit a request via the form above or WhatsApp us directly for a 24-hour quotation.
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const triggers = document.querySelectorAll('.faq-trigger');
      triggers.forEach(function(trigger) {
        trigger.addEventListener('click', function() {
          const parent = trigger.closest('.faq-item') || trigger.parentElement;
          const content = parent.querySelector('.accordion-content');
          const icon = trigger.querySelector('.faq-icon');
          if (!content) return;
          const isHidden = content.classList.contains('hidden');
          if (isHidden) {
            content.classList.remove('hidden');
            if (icon) icon.textContent = '−';
            parent.classList.add('border-accent-gold/40', 'shadow-sm');
          } else {
            content.classList.add('hidden');
            if (icon) icon.textContent = '+';
            parent.classList.remove('border-accent-gold/40', 'shadow-sm');
          }
        });
      });
    });
  </script>

<?php
get_footer();
