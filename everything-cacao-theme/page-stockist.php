<?php
/**
 * Template Name: Stockists & Retail Partners
 *
 * Everything Cacao GH - Stockist Page Template (page-stockist.php)
 * Automatically loaded for page slug 'stockist' or 'stockists'
 * (URL: https://everythingcacaogh.com/stockist/)
 *
 * @package EverythingCacao
 */

get_header();

$link_contact = ec_get_smart_page_link(array('contact', 'concierge'), '/contact');
?>

  <!-- Stockist Hero Banner -->
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">RETAIL PARTNERS &amp; FLAGSHIP LOCATIONS</span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold">Where to Find Everything Cacao</h1>
      <p class="text-canvas/80 text-sm max-w-3xl mx-auto leading-relaxed">
        Discover our flagship atelier, luxury boutique hotels, fine dining establishments, and gourmet grocers across Ghana and select international destinations offering Nahar and Cherelle collections.
      </p>
    </div>
  </section>


  <!-- Stockists Directory Grid -->
  <section class="py-20 max-w-7xl mx-auto px-6 md:px-12 space-y-16">
    <div class="text-center max-w-3xl mx-auto space-y-3">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Accra &amp; Regional Outlets</span>
      <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark">Authorized Stockists &amp; Partner Venues</h2>
      <p class="text-xs text-text-muted leading-relaxed">
        Our artisanal chocolate bars are carefully supplied to handpicked stockists who share our commitment to freshness, elegance, and Ghanaian cocoa excellence.
      </p>
    </div>

    <!-- Category 1: Boutique Hotels & Resorts -->
    <div class="space-y-6">
      <div class="flex items-center gap-3 border-b border-cacao-dark/10 pb-3">
        <span class="w-2 h-2 bg-accent-gold rounded-full"></span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark uppercase tracking-wider">Luxury Hotels &amp; Resorts</h3>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest">Labone • Accra</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">Crown Heritage Boutique Hotel</h4>
          <p class="text-xs text-text-muted leading-relaxed">Carrying Nahar Executive Dark Boxes and Cherelle Milk bars at the lobby boutique &amp; room amenities.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Ring Road East, Labone</span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest">Akosombo • Eastern Region</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">Royal Senchi Resort &amp; Spa</h4>
          <p class="text-xs text-text-muted leading-relaxed">Featured at the resort gift shop and seasonal holiday turn-down chocolate amenity service.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Volta River Front, Akosombo</span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest">Busua • Western Region</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">The Sanctuary Beach Resort</h4>
          <p class="text-xs text-text-muted leading-relaxed">Artisanal coastal lounge stocking Cherelle Spiced Ginger and Nahar 70% Dark Cacao.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Busua Beachfront, Western Region</span>
        </div>

      </div>
    </div>

    <!-- Category 2: Gourmet Cafes & Roasteries -->
    <div class="space-y-6">
      <div class="flex items-center gap-3 border-b border-cacao-dark/10 pb-3">
        <span class="w-2 h-2 bg-accent-terracotta rounded-full"></span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark uppercase tracking-wider">Gourmet Cafes &amp; Espresso Bars</h3>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-terracotta uppercase tracking-widest">Cantonments • Accra</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">The Gold Coast Roastery</h4>
          <p class="text-xs text-text-muted leading-relaxed">Specialty espresso bar offering Everything Cacao single-origin dark chocolate bar pairings.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Cantonments Road, Accra</span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-terracotta uppercase tracking-widest">Osu • Accra</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">Atelier Cacao &amp; Espresso Bar</h4>
          <p class="text-xs text-text-muted leading-relaxed">Urban cafe featuring full seasonal Cherelle flavor bars and Nahar gift sets.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Oxford Street Corridor, Osu</span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-terracotta uppercase tracking-widest">Airport City • Accra</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">Koffee Lounge &amp; Roastery</h4>
          <p class="text-xs text-text-muted leading-relaxed">Convenient business district cafe stocking executive 24x9g mini chocolate boxes.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Marina Mall Plaza, Airport City</span>
        </div>

      </div>
    </div>

    <!-- Category 3: Airport & Retail Pavilions -->
    <div class="space-y-6">
      <div class="flex items-center gap-3 border-b border-cacao-dark/10 pb-3">
        <span class="w-2 h-2 bg-accent-gold rounded-full"></span>
        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark uppercase tracking-wider">Airport Duty Free &amp; Retail Pavilions</h3>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest">Terminal 3 • Accra</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">KIA International Duty Free</h4>
          <p class="text-xs text-text-muted leading-relaxed">Official Ghanaian souvenir departure pavilion carrying premium gold-embossed gift boxes.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Kotoka International Airport</span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest">Ridge • Accra</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">The Heritage Concept Store</h4>
          <p class="text-xs text-text-muted leading-relaxed">High-end lifestyle boutique promoting authentic West African fashion, arts, and gourmet foods.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Independence Avenue, Ridge</span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest">Regional Hub • Takoradi</span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">Takoradi Artisanal Hub</h4>
          <p class="text-xs text-text-muted leading-relaxed">Western Region partner stocking farm-traceable Suhum and Assin Fosu bean-to-bar chocolate.</p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 Market Circle Precinct, Takoradi</span>
        </div>

      </div>
    </div>

  </section>

  <!-- Stockist Program Benefits & Terms Section -->
  <section class="py-20 bg-canvas border-t border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 space-y-12">
      <div class="text-center max-w-3xl mx-auto space-y-3">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">WHOLESALE &amp; RETAIL PARTNERSHIPS</span>
        <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark">Why Partner With Everything Cacao</h2>
        <p class="text-xs text-text-muted leading-relaxed">
          We empower retailers, hoteliers, and gift concierges with premium Ghanaian chocolate backed by reliable supply, elegant presentation, and marketing support.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        
        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3">
          <span class="w-8 h-8 rounded-full bg-accent-gold/20 text-accent-gold flex items-center justify-center font-bold text-sm">1</span>
          <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">100% Ghanaian Single-Origin</h3>
          <p class="text-xs text-text-muted leading-relaxed">Authentic bean-to-bar cocoa sourced directly from Suhum &amp; Assin Fosu. FDA &amp; GSA certified quality.</p>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3">
          <span class="w-8 h-8 rounded-full bg-accent-gold/20 text-accent-gold flex items-center justify-center font-bold text-sm">2</span>
          <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Bespoke Counter Displays</h3>
          <p class="text-xs text-text-muted leading-relaxed">Custom branded wooden and gold-foil countertop display units tailored for luxury retail spaces.</p>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3">
          <span class="w-8 h-8 rounded-full bg-accent-gold/20 text-accent-gold flex items-center justify-center font-bold text-sm">3</span>
          <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Temperature-Controlled Delivery</h3>
          <p class="text-xs text-text-muted leading-relaxed">Insulated climate-controlled transport guaranteeing fresh arrival across all regions in Ghana.</p>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3">
          <span class="w-8 h-8 rounded-full bg-accent-gold/20 text-accent-gold flex items-center justify-center font-bold text-sm">4</span>
          <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Competitive Wholesale Pricing</h3>
          <p class="text-xs text-text-muted leading-relaxed">Tiered retail margins, low minimum order quantities (from 50 units), and staff tasting workshops.</p>
        </div>

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


