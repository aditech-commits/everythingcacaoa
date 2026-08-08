<?php
/**
 * Template Part: Quick Concierge Inquiry Form
 *
 * @package EverythingCacao
 */
?>
<div class="bg-cacao-dark text-canvas rounded-xl p-8 md:p-12 border border-cacao-dark shadow-2xl space-y-6">
  <div class="space-y-2 text-center max-w-lg mx-auto">
    <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Direct Inquiry</span>
    <h3 class="font-serif-luxury text-2xl md:text-3xl font-bold">Quick Concierge Inquiry</h3>
    <p class="text-xs text-canvas/70 leading-relaxed">
      Have a question about custom gifting, tasting masterclasses, or orders? Send us a quick message below.
    </p>
  </div>

  <form class="quick-inquiry-form space-y-4 max-w-xl mx-auto" onsubmit="return window.EC_Functions.handleQuickFormSubmit(event, this);">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div>
        <label class="block text-[11px] font-semibold uppercase tracking-widest text-canvas/70 mb-1">Your Name *</label>
        <input type="text" name="name" required placeholder="Kwame Mensah" class="w-full px-4 py-3 bg-canvas/10 border border-canvas/20 rounded text-canvas text-xs focus:outline-none focus:border-accent-gold placeholder-canvas/40" />
      </div>
      <div>
        <label class="block text-[11px] font-semibold uppercase tracking-widest text-canvas/70 mb-1">Email Address *</label>
        <input type="email" name="email" required placeholder="kwame@domain.com" class="w-full px-4 py-3 bg-canvas/10 border border-canvas/20 rounded text-canvas text-xs focus:outline-none focus:border-accent-gold placeholder-canvas/40" />
      </div>
    </div>

    <div>
      <label class="block text-[11px] font-semibold uppercase tracking-widest text-canvas/70 mb-1">Message *</label>
      <textarea name="message" rows="3" required placeholder="Tell us about your chocolate order, wedding favor count, or tasting studio request..." class="w-full px-4 py-3 bg-canvas/10 border border-canvas/20 rounded text-canvas text-xs focus:outline-none focus:border-accent-gold placeholder-canvas/40"></textarea>
    </div>

    <button type="submit" class="w-full py-3.5 bg-accent-gold text-cacao-dark font-semibold text-xs uppercase tracking-widest hover:bg-white transition-colors shadow-lg">
      Dispatch Inquiry to Concierge
    </button>
  </form>
</div>
