<?php
/**
 * Title: Dual-Line Brand Showcase (Nahar & Cherelle)
 * Slug: everything-cacao/brand-showcase
 * Categories: everything-cacao, featured
 * Description: Side-by-side card showcase for Nahar luxury and Cherelle everyday ranges.
 */
?>
<!-- wp:group {"className":"py-24 bg-card-bg border-t border-b border-cacao-dark/10","layout":{"type":"constrained"}} -->
<div class="wp-block-group py-24 bg-card-bg border-t border-b border-cacao-dark/10">
  <div class="max-w-7xl mx-auto px-6 md:px-12">
    <div class="text-center mb-16 space-y-4 max-w-2xl mx-auto">
      <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark">Two Ranges. One Ghanaian Story.</h2>
      <p class="text-text-muted text-sm leading-relaxed">Whether you're treating yourself, sharing with family or finding the perfect gift, Everything Cacao has a chocolate for every moment.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      <!-- Card A: Nahar -->
      <div class="group relative overflow-hidden bg-cacao-dark text-canvas rounded-xl p-8 md:p-12 flex flex-col justify-between min-h-[580px] border border-cacao-dark/10 subbrand-nahar shadow-sm">
        <div class="space-y-2">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold block">THE ESSENCE OF LUXURY</span>
          <h3 class="font-serif-luxury text-4xl sm:text-5xl font-bold text-canvas">Nahar</h3>
          <p class="font-serif-luxury text-xl text-accent-gold italic">Luxury Ghanaian Chocolate</p>
        </div>

        <div class="space-y-6 pt-6">
          <p class="text-xs text-canvas/80 leading-relaxed">
            Nahar is our premium chocolate range, crafted for discerning palates. Rich, complex flavours made from the finest Ghanaian cocoa, wrapped in elegant packaging.
          </p>
          <div class="flex justify-between items-end w-full border-t border-canvas/15 pt-4">
            <div>
              <span class="text-[10px] font-semibold text-canvas/60 uppercase tracking-wider block">COLLECTION TYPE</span>
              <span class="font-serif-luxury text-2xl font-bold text-accent-gold">Luxury &amp; Bespoke Reserve</span>
            </div>
            <a href="/our-collections?lineage=nahar" class="px-6 py-3.5 bg-accent-gold text-cacao-dark font-semibold text-xs uppercase tracking-widest hover:bg-white transition-colors">
              SHOP NAHAR &rarr;
            </a>
          </div>
        </div>
      </div>

      <!-- Card B: Cherelle -->
      <div class="group relative overflow-hidden bg-canvas rounded-xl p-8 md:p-12 flex flex-col justify-between min-h-[580px] border border-cacao-dark/10 subbrand-cherelle shadow-sm">
        <div class="space-y-2">
          <span class="text-xs font-semibold uppercase tracking-widest text-cherelle-caramel block">DELIGHT IN EVERY BITE</span>
          <h3 class="font-serif-luxury text-4xl sm:text-5xl font-bold text-cacao-dark">Cherelle</h3>
          <p class="font-serif-luxury text-xl text-accent-terracotta italic">Everyday Chocolate for Everyone</p>
        </div>

        <div class="space-y-6 pt-6">
          <p class="text-xs text-text-muted leading-relaxed">
            Cherelle is everyday chocolate for everyone. Affordable, joyful and bursting with the natural taste of Ghanaian cacao. Made for sharing and sweet everyday moments.
          </p>
          <div class="flex justify-between items-end w-full border-t border-cacao-dark/10 pt-4">
            <div>
              <span class="text-[10px] font-semibold text-text-muted uppercase tracking-wider block">COLLECTION TYPE</span>
              <span class="font-serif-luxury text-2xl font-bold text-cacao-dark">Everyday Range</span>
            </div>
            <a href="/our-collections?lineage=cherelle" class="px-6 py-3.5 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-cherelle-caramel transition-colors">
              SHOP CHERELLE &rarr;
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /wp:group -->
