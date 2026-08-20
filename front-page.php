<?php
/**
 * Template Name: Home Page
 *
 * Everything Cacao GH - Front Page Template (front-page.php)
 * Matches the uploaded UI/UX design specification & image assets exactly.
 *
 * @package EverythingCacao
 */

get_header();

// Resolve page URLs using the same smart resolver as header/footer
$link_collections = ec_get_smart_page_link(array('our-collections', 'collections'), '/our-collections');
$link_craft       = ec_get_smart_page_link(array('our-craft', 'craft'), '/our-craft');
$link_concierge   = ec_get_smart_page_link(array('stockist', 'stockists', 'stock-lists', 'concierge'), '/stockist');
?>

  <!-- Hero Section -->
  <section class="relative min-h-[85vh] flex items-center overflow-hidden py-16">
    <div class="max-w-7xl mx-auto px-6 md:px-12 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center w-full">
      <!-- Text Content -->
      <div class="lg:col-span-6 z-10 space-y-8 ec-animate">
        <h1 class="font-serif-luxury text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-cacao-dark">
          <?php echo esc_html(ec_get_text_option('ec_hero_title', "Ghana's Finest Chocolate — Crafted from Local Cacao")); ?>
        </h1>

        <p class="text-base sm:text-lg text-text-muted max-w-lg leading-relaxed font-normal">
          <?php echo esc_html(ec_get_text_option('ec_hero_subtitle', "Everything Cacao GH makes premium chocolate from Ghana's finest locally sourced cacao. Our two iconic ranges — Nahar for luxury occasions and Cherelle for everyday delight — bring world-class Ghanaian chocolate to your table.")); ?>
        </p>

        <div class="flex flex-wrap gap-4 pt-4">
          <a href="<?php echo $link_collections; ?>" class="px-8 py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-all duration-300 shadow-xl">
            SHOP ALL CHOCOLATE
          </a>
          <a href="<?php echo $link_craft; ?>" class="px-8 py-4 border border-cacao-dark text-cacao-dark font-semibold text-xs uppercase tracking-widest hover:bg-cacao-dark hover:text-canvas transition-all duration-300">
            OUR STORY
          </a>
        </div>
      </div>

      <!-- Hero Visual Image Stack -->
      <div class="lg:col-span-6 relative aspect-square group ec-animate flex items-center justify-center">
        <div class="absolute inset-0 bg-cacao-dark/5 rounded-2xl border border-cacao-dark/10 transform rotate-3 scale-95 transition-transform duration-700 group-hover:rotate-0"></div>
        <div class="relative w-full h-full p-2 flex items-center justify-center bg-card-bg rounded-2xl shadow-xl z-10 border border-cacao-dark/10 overflow-hidden transform -rotate-3 transition-transform duration-700 group-hover:rotate-0">
          <img class="w-full h-full object-cover rounded-xl transition-transform duration-700 group-hover:scale-105" 
               alt="Ghanaian Cocoa Farm" 
               src="<?php echo esc_url(ec_get_smart_image_url('ec_hero_image', 'https://everythingcacaogh.com/wp-content/uploads/2026/08/cocoa-farm.jpg')); ?>" />
        </div>
      </div>
    </div>
  </section>

  <!-- Brand Showcase: Dual-Line Expressions -->
  <section class="py-24 bg-card-bg border-t border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <div class="text-center mb-16 space-y-4 max-w-5xl mx-auto ec-animate">
        <h2 class="font-serif-luxury text-3xl sm:text-4xl md:text-5xl font-bold text-cacao-dark md:whitespace-nowrap"><?php echo esc_html(ec_get_text_option('ec_showcase_title', 'Two Ranges. One Ghanaian Story.')); ?></h2>
        <p class="text-text-muted text-sm sm:text-base md:text-lg font-medium leading-relaxed md:whitespace-nowrap"><?php echo esc_html(ec_get_text_option('ec_showcase_subtitle', "Whether you're treating yourself, sharing with family or finding the perfect gift, Everything Cacao has a chocolate for every moment.")); ?></p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Card A: Nahar -->
        <div class="ec-animate ec-card-hover group relative overflow-hidden bg-cacao-dark text-canvas rounded-xl p-8 md:p-12 flex flex-col justify-between min-h-[580px] border border-cacao-dark/10 transition-all duration-500 subbrand-nahar shadow-sm">
          <div class="relative z-10 space-y-4">
            <div class="space-y-2">
              <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold block">THE ESSENCE OF LUXURY</span>
              <h3 class="font-serif-luxury text-4xl sm:text-5xl font-bold text-canvas">Nahar</h3>
              <p class="font-serif-luxury text-xl text-accent-gold italic">Luxury Ghanaian Chocolate</p>
            </div>
            <p class="font-sans text-base md:text-lg lg:text-xl font-medium text-canvas/90 leading-relaxed">
              <?php echo esc_html(ec_get_text_option('ec_nahar_desc', 'Nahar is our premium chocolate range, crafted for discerning palates. Rich, complex flavours made from the finest Ghanaian cocoa, wrapped in elegant packaging. Perfect for gifts, special occasions and personal indulgence.')); ?>
            </p>
          </div>

          <div class="relative z-10 space-y-6 pt-4">
            <div class="w-full aspect-[4/3] bg-[#3D281C] rounded-lg overflow-hidden border border-canvas/10 flex items-center justify-center">
              <img class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-700 opacity-90 group-hover:opacity-100" 
                   alt="Nahar Luxury Ghanaian Chocolate" 
                   src="<?php echo esc_url(ec_get_smart_image_url('ec_nahar_image', 'Nahar dark choc long.png')); ?>"
                   loading="eager" />
            </div>

            <div class="flex justify-between items-end w-full border-t border-canvas/15 pt-4">
              <div>
                <span class="text-[10px] font-semibold text-canvas/60 uppercase tracking-wider block">COLLECTION TYPE</span>
                <span class="font-serif-luxury text-2xl font-bold text-accent-gold">Luxury &amp; Bespoke Reserve</span>
              </div>
              <a href="<?php echo $link_collections; ?>?lineage=nahar" class="px-6 py-3.5 bg-accent-gold text-cacao-dark font-semibold text-xs uppercase tracking-widest hover:bg-white transition-colors">
                SHOP NAHAR &rarr;
              </a>
            </div>
          </div>
        </div>

        <!-- Card B: Cherelle -->
        <div class="ec-animate ec-card-hover group relative overflow-hidden bg-canvas rounded-xl p-8 md:p-12 flex flex-col justify-between min-h-[580px] border border-cacao-dark/10 hover:border-cherelle-caramel/50 transition-all duration-500 subbrand-cherelle shadow-sm">
          <div class="relative z-10 space-y-4">
            <div class="space-y-2">
              <span class="text-xs font-semibold uppercase tracking-widest text-cherelle-caramel block">DELIGHT IN EVERY BITE</span>
              <h3 class="font-serif-luxury text-4xl sm:text-5xl font-bold text-cacao-dark">Cherelle</h3>
              <p class="font-serif-luxury text-xl text-accent-terracotta italic">Everyday Chocolate for Everyone</p>
            </div>
            <p class="font-sans text-base md:text-lg lg:text-xl font-medium text-cacao-dark/85 leading-relaxed">
              <?php echo esc_html(ec_get_text_option('ec_cherelle_desc', 'Cherelle is everyday chocolate for everyone. Affordable, joyful and bursting with the natural taste of Ghanaian cacao. Made for sharing, gifting and sweet everyday moments.')); ?>
            </p>
          </div>

          <div class="relative z-10 space-y-6 pt-4">
            <div class="w-full aspect-[4/3] bg-[#F5EFE6] rounded-lg overflow-hidden border border-cacao-dark/10 flex items-center justify-center">
              <img class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-700" 
                   alt="Cherelle Everyday Ghanaian Chocolate" 
                   src="<?php echo esc_url(ec_get_smart_image_url('ec_cherelle_image', 'Cherelle Milk Chocolate 90g.jpg')); ?>"
                   loading="eager" />
            </div>
            
            <div class="flex justify-between items-end w-full border-t border-cacao-dark/10 pt-4">
              <div>
                <span class="text-[10px] font-semibold text-text-muted uppercase tracking-wider block">COLLECTION TYPE</span>
                <span class="font-serif-luxury text-2xl font-bold text-cacao-dark">Everyday Range</span>
              </div>
              <a href="<?php echo $link_collections; ?>?lineage=cherelle" class="px-6 py-3.5 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-cherelle-caramel transition-colors">
                SHOP CHERELLE &rarr;
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Everything Cacao GH Section -->
  <section class="py-24 max-w-7xl mx-auto px-6 md:px-12">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-8">
      <div class="max-w-2xl space-y-4">
        <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark leading-tight"><?php echo esc_html(ec_get_text_option('ec_why_title', 'Why Choose Us?')); ?></h2>
        <p class="text-text-muted text-base leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_why_subtitle', 'We celebrate our land, the farmers and our heritage with every bite.')); ?></p>
      </div>
      <a class="font-semibold text-xs uppercase tracking-widest text-cacao-dark border-b-2 border-cacao-dark pb-1 hover:text-accent-terracotta hover:border-accent-terracotta transition-colors flex items-center gap-2" 
         href="<?php echo $link_craft; ?>">
        OUR STORY &rarr;
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      <!-- Item 1: Locally sourced cacao -->
      <div class="ec-animate ec-card-hover space-y-6 group">
        <div class="w-full h-[380px] bg-card-bg overflow-hidden rounded-xl border border-cacao-dark/10 shadow-sm">
          <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
               alt="Locally Sourced Ghanaian Cacao Farmers" 
               src="<?php echo esc_url(ec_get_smart_image_url('ec_impact_image_1', '6.png')); ?>" />
        </div>
        <div class="space-y-3 p-6 md:p-7 bg-card-bg/60 rounded-xl border border-cacao-dark/15 transition-all duration-300 group-hover:border-accent-gold group-hover:bg-card-bg group-hover:shadow-lg">
          <h3 class="font-serif-luxury text-xl md:text-2xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_impact1_title', 'Locally sourced cacao')); ?></h3>
          <p class="font-sans text-base md:text-lg font-medium text-cacao-dark/85 leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_impact1_text', 'We work directly with Ghanaian farmers and local suppliers to source the highest quality processed cocoa — supporting communities and ensuring exceptional flavour in every bar.')); ?></p>
        </div>
      </div>

      <!-- Item 2: Made in Ghana -->
      <div class="ec-animate ec-card-hover space-y-6 group">
        <div class="w-full h-[380px] bg-card-bg overflow-hidden rounded-xl border border-cacao-dark/10 shadow-sm">
          <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
               alt="Made in Ghana Artisanal Chocolate Manufacturing" 
               src="<?php echo esc_url(ec_get_smart_image_url('ec_impact_image_3', '4.png')); ?>" />
        </div>
        <div class="space-y-3 p-6 md:p-7 bg-card-bg/60 rounded-xl border border-cacao-dark/15 transition-all duration-300 group-hover:border-accent-gold group-hover:bg-card-bg group-hover:shadow-lg">
          <h3 class="font-serif-luxury text-xl md:text-2xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_impact3_title', 'Made in Ghana')); ?></h3>
          <p class="font-sans text-base md:text-lg font-medium text-cacao-dark/85 leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_impact3_text', 'From bean to bar, our chocolate is made in Ghana — celebrating our land, our farmers and our heritage with every bite.')); ?></p>
        </div>
      </div>

      <!-- Item 3: Certified quality -->
      <div class="ec-animate ec-card-hover space-y-6 group">
        <div class="w-full h-[380px] bg-card-bg overflow-hidden rounded-xl border border-cacao-dark/10 shadow-sm">
          <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
               alt="FDA and GSA Certified Quality Ghanaian Chocolate" 
               src="<?php echo esc_url(ec_get_smart_image_url('ec_impact_image_2', '3.png')); ?>" />
        </div>
        <div class="space-y-3 p-6 md:p-7 bg-card-bg/60 rounded-xl border border-cacao-dark/15 transition-all duration-300 group-hover:border-accent-gold group-hover:bg-card-bg group-hover:shadow-lg">
          <h3 class="font-serif-luxury text-xl md:text-2xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_impact2_title', 'Certified quality')); ?></h3>
          <p class="font-sans text-base md:text-lg font-medium text-cacao-dark/85 leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_impact2_text', 'Every Everything Cacao product is certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA). Quality and safety you can trust.')); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Product Collection Storefront -->
  <section class="py-24 bg-cacao-dark text-canvas overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <!-- Section Header -->
      <div class="text-center max-w-3xl mx-auto space-y-3 mb-16 ec-animate">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold block">
          <?php echo esc_html(ec_get_text_option('ec_seasonal_badge', 'LIMITED & SEASONAL RELEASE')); ?>
        </span>
        <h2 class="font-serif-luxury text-3xl sm:text-4xl md:text-5xl font-bold text-canvas">
          <?php echo esc_html(ec_get_text_option('ec_seasonal_title', 'Signature Ghanaian Confections')); ?>
        </h2>
        <p class="text-canvas/80 text-sm sm:text-base leading-relaxed font-normal">
          <?php echo esc_html(ec_get_text_option('ec_seasonal_subtitle', 'Handcrafted single-origin bars and luxury gift reserves made from Ghana\'s finest cacao.')); ?>
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="<?php echo $link_collections; ?>" class="ec-animate ec-card-hover group bg-canvas/5 p-4 rounded-xl border border-canvas/10 flex flex-col justify-between hover:border-accent-gold/50 transition-colors duration-300">
          <div>
            <div class="aspect-[4/5] bg-nahar-obsidian relative overflow-hidden rounded-lg mb-4">
              <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                   alt="Dark Ghanaian Forest 85% Cacao" 
                   src="<?php echo esc_url(ec_get_smart_image_url('ec_seasonal_1', 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png')); ?>" />
              <span class="absolute top-3 left-3 text-[10px] font-semibold uppercase bg-accent-gold text-cacao-dark px-2.5 py-0.5 rounded">85% Cacao</span>
            </div>
            <div class="space-y-1">
              <h5 class="font-serif-luxury text-lg font-bold text-canvas">Dark Ghanaian Forest</h5>
              <p class="text-[11px] text-canvas/60 uppercase tracking-widest">100G ARTISAN BAR</p>
            </div>
          </div>
          <span class="block mt-4 text-xs font-semibold uppercase tracking-widest text-accent-gold group-hover:text-white transition-colors">
            View Product &rarr;
          </span>
        </a>

        <!-- Product 2: Heritage Sampler -->
        <a href="<?php echo $link_collections; ?>" class="ec-animate ec-card-hover group bg-canvas/5 p-4 rounded-xl border border-canvas/10 flex flex-col justify-between hover:border-accent-gold/50 transition-colors duration-300">
          <div>
            <div class="aspect-[4/5] bg-nahar-obsidian relative overflow-hidden rounded-lg mb-4">
              <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                   alt="Heritage Sampler Minis Box" 
                   src="<?php echo esc_url(ec_get_smart_image_url('ec_seasonal_2', 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png')); ?>" />
              <span class="absolute top-3 left-3 text-[10px] font-semibold uppercase bg-canvas text-cacao-dark px-2.5 py-0.5 rounded">Assorted</span>
            </div>
            <div class="space-y-1">
              <h5 class="font-serif-luxury text-lg font-bold text-canvas">Heritage Sampler</h5>
              <p class="text-[11px] text-canvas/60 uppercase tracking-widest">MINIS BOX (12 PCS)</p>
            </div>
          </div>
          <span class="block mt-4 text-xs font-semibold uppercase tracking-widest text-accent-gold group-hover:text-white transition-colors">
            View Product &rarr;
          </span>
        </a>

        <!-- Product 3: Ashanti Gold -->
        <a href="<?php echo $link_collections; ?>" class="ec-animate ec-card-hover group bg-canvas/5 p-4 rounded-xl border border-canvas/10 flex flex-col justify-between hover:border-accent-gold/50 transition-colors duration-300">
          <div>
            <div class="aspect-[4/5] bg-nahar-obsidian relative overflow-hidden rounded-lg mb-4">
              <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                   alt="Ashanti Gold Milk 45% Bar" 
                   src="<?php echo esc_url(ec_get_smart_image_url('ec_seasonal_3', 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png')); ?>" />
              <span class="absolute top-3 left-3 text-[10px] font-semibold uppercase bg-cherelle-caramel text-white px-2.5 py-0.5 rounded">Milk 45%</span>
            </div>
            <div class="space-y-1">
              <h5 class="font-serif-luxury text-lg font-bold text-canvas">Ashanti Gold</h5>
              <p class="text-[11px] text-canvas/60 uppercase tracking-widest">100G ARTISAN BAR</p>
            </div>
          </div>
          <span class="block mt-4 text-xs font-semibold uppercase tracking-widest text-accent-gold group-hover:text-white transition-colors">
            View Product &rarr;
          </span>
        </a>

        <!-- Product 4: Nahar Private Reserve -->
        <a href="<?php echo $link_collections; ?>" class="ec-animate ec-card-hover group bg-canvas/5 p-4 rounded-xl border border-canvas/10 flex flex-col justify-between hover:border-accent-gold/50 transition-colors duration-300">
          <div>
            <div class="aspect-[4/5] bg-nahar-obsidian relative overflow-hidden rounded-lg mb-4">
              <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                   alt="Nahar Private Reserve Luxury Gift Box" 
                   src="<?php echo esc_url(ec_get_smart_image_url('ec_seasonal_4', 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png')); ?>" />
              <span class="absolute top-3 left-3 text-[10px] font-semibold uppercase bg-accent-gold text-cacao-dark px-2.5 py-0.5 rounded">Exclusive</span>
            </div>
            <div class="space-y-1">
              <h5 class="font-serif-luxury text-lg font-bold text-canvas">Nahar Private Reserve</h5>
              <p class="text-[11px] text-canvas/60 uppercase tracking-widest">LUXURY GIFT BOX</p>
            </div>
          </div>
          <span class="block mt-4 text-xs font-semibold uppercase tracking-widest text-accent-gold group-hover:text-white transition-colors">
            View Product &rarr;
          </span>
        </a>
      </div>
    </div>
  </section>

  <!-- Stockist Banner Marquee -->
  <section class="bg-canvas py-8 border-y border-cacao-dark/10 overflow-hidden">
    <div class="flex whitespace-nowrap space-x-12 text-xs md:text-sm font-semibold uppercase tracking-widest text-cacao-dark/80 justify-center items-center">
      <span><?php echo esc_html(ec_get_text_option('ec_ticker_1', 'Now Available in Supermarkets & Malls Across Ghana')); ?></span>
      <span class="text-accent-gold">&bull;</span>
      <span><?php echo esc_html(ec_get_text_option('ec_ticker_2', 'Shipping Worldwide')); ?></span>
    </div>
  </section>

  <!-- Live In-Store Sampling Video Experience Section -->
  <section class="py-24 bg-card-bg border-t border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
        <div class="space-y-4 max-w-2xl">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Real People, Real Joy</span>
          <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark">What our customers say about our chocolate</h2>
          <p class="text-text-muted text-base leading-relaxed">Watch chocolate lovers across Ghana sample Cherelle and Nahar artisanal creations live in supermarkets, pop-up lounges, and luxury retail stores.</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Video 1 Reel -->
        <div class="ec-animate ec-card-hover group bg-cacao-dark rounded-xl overflow-hidden border border-cacao-dark/10 shadow-lg flex flex-col justify-between">
          <div class="aspect-[9/16] bg-nahar-obsidian relative overflow-hidden">
            <iframe class="w-full h-full border-0" src="https://drive.google.com/file/d/1JUC7nwQjQpqLD8z7WnyhiyPtkV6rkcvG/preview" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="absolute top-3 left-3 bg-accent-gold text-cacao-dark text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow pointer-events-none z-10">
              Live Sampling
            </div>
          </div>
          <div class="p-5 bg-card-bg space-y-1">
            <h5 class="font-serif-luxury text-base font-bold text-cacao-dark">Supermarket Tasting Reel #1</h5>
            <p class="text-xs text-text-muted">Customers discovering Cherelle 45% Milk Chocolate.</p>
          </div>
        </div>

        <!-- Video 2 Reel -->
        <div class="ec-animate ec-card-hover group bg-cacao-dark rounded-xl overflow-hidden border border-cacao-dark/10 shadow-lg flex flex-col justify-between">
          <div class="aspect-[9/16] bg-nahar-obsidian relative overflow-hidden">
            <iframe class="w-full h-full border-0" src="https://drive.google.com/file/d/1pKLN1VVG15IKg_WP6RUlZ8eD3UJnX1yW/preview" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="absolute top-3 left-3 bg-accent-terracotta text-white text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow pointer-events-none z-10">
              Nahar Luxury Tasting
            </div>
          </div>
          <div class="p-5 bg-card-bg space-y-1">
            <h5 class="font-serif-luxury text-base font-bold text-cacao-dark">Grand Reserve Sampling #2</h5>
            <p class="text-xs text-text-muted">Discerning palates savoring Nahar 72% Obsidian Dark.</p>
          </div>
        </div>

        <!-- Video 3 Reel -->
        <div class="ec-animate ec-card-hover group bg-cacao-dark rounded-xl overflow-hidden border border-cacao-dark/10 shadow-lg flex flex-col justify-between">
          <div class="aspect-[9/16] bg-nahar-obsidian relative overflow-hidden">
            <iframe class="w-full h-full border-0" src="https://drive.google.com/file/d/15lB6wkq0Cg6NT4pACbXxZiokmdDYtcE0/preview" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="absolute top-3 left-3 bg-accent-gold text-cacao-dark text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow pointer-events-none z-10">
              Retail Pop-Up
            </div>
          </div>
          <div class="p-5 bg-card-bg space-y-1">
            <h5 class="font-serif-luxury text-base font-bold text-cacao-dark">Accra Retail Pop-Up #3</h5>
            <p class="text-xs text-text-muted">Interactive tasting counter at Accra shopping mall.</p>
          </div>
        </div>

        <!-- Video 4 Reel -->
        <div class="ec-animate ec-card-hover group bg-cacao-dark rounded-xl overflow-hidden border border-cacao-dark/10 shadow-lg flex flex-col justify-between">
          <div class="aspect-[9/16] bg-nahar-obsidian relative overflow-hidden">
            <iframe class="w-full h-full border-0" src="https://drive.google.com/file/d/1FQK5L6ErULSbr0Wd_VKoGYcJo463HVYC/preview" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="absolute top-3 left-3 bg-cherelle-caramel text-white text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow pointer-events-none z-10">
              Family &amp; Kids Joy
            </div>
          </div>
          <div class="p-5 bg-card-bg space-y-1">
            <h5 class="font-serif-luxury text-base font-bold text-cacao-dark">Joy in Every Bite #4</h5>
            <p class="text-xs text-text-muted">Delighting young chocolate lovers with Cherelle treats.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Quick Home Contact Form Section -->
  <section class="py-24 max-w-4xl mx-auto px-6 md:px-12">
    <?php get_template_part('template-parts/quick-form'); ?>
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



