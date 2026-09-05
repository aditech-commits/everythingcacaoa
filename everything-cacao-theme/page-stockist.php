<?php
/**
 * Template Name: Stockists & Retail Partners
 *
 * Everything Cacao GH - Stockist Page Template (page-stockist.php)
 * Automatically loaded for page slug 'stockist' or 'stockists'
 * (URL: https://everythingcacaogh.com/stockist/)
 *
 * All static headers, store tags, titles, descriptions, and address pins
 * are dynamically editable via WordPress Customizer under Panel:
 * "Stockists Page Management" (ID: theme_stockists_page_panel)
 *
 * @package EverythingCacao
 */

get_header();

$link_contact = ec_get_smart_page_link(array('contact', 'concierge'), '/contact');
?>

  <!-- Stockist Hero Banner -->
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold"><?php echo esc_html(ec_get_text_option('ec_stockist_hero_tagline', 'RETAIL PARTNERS & FLAGSHIP LOCATIONS')); ?></span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold"><?php echo esc_html(ec_get_text_option('ec_stockist_hero_title', 'Where to Find Everything Cacao')); ?></h1>
    </div>
  </section>


  <!-- Stockists Directory Grid -->
  <section class="py-20 max-w-7xl mx-auto px-6 md:px-12 space-y-16">
    <div class="text-center max-w-3xl mx-auto space-y-3">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta"><?php echo esc_html(ec_get_text_option('ec_stockist_intro_tagline', 'ACCRA & REGIONAL OUTLETS')); ?></span>
      <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_intro_title', 'Find Cherelle and Nahar Bars stocked at the following stores')); ?></h2>
    </div>

    <!-- Category 1: Boutique Hotels & Resorts -->
    <div class="space-y-6">
      <div class="flex items-center gap-3 border-b border-cacao-dark/10 pb-3">
        <span class="w-2 h-2 bg-accent-gold rounded-full"></span>
        <h3 class="font-sans text-xl md:text-2xl font-bold text-cacao-dark uppercase tracking-wider"><?php echo esc_html(ec_get_text_option('ec_stockist_cat1_title', 'LUXURY HOTELS & RESORTS')); ?></h3>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s1_tag', 'LABONE • ACCRA')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s1_name', 'Crown Heritage Boutique Hotel')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s1_desc', 'Carrying Nahar Executive Dark Boxes and Cherelle Milk bars at the lobby boutique & room amenities.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c1_s1_pin', 'Ring Road East, Labone')); ?></span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s2_tag', 'AKOSOMBO • EASTERN REGION')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s2_name', 'Royal Senchi Resort & Spa')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s2_desc', 'Featured at the resort gift shop and seasonal holiday turn-down chocolate amenity service.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c1_s2_pin', 'Volta River Front, Akosombo')); ?></span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s3_tag', 'BUSUA • WESTERN REGION')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s3_name', 'The Sanctuary Beach Resort')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c1_s3_desc', 'Artisanal coastal lounge stocking Cherelle Spiced Ginger and Nahar 70% Dark Cacao.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c1_s3_pin', 'Busua Beachfront, Western Region')); ?></span>
        </div>

      </div>
    </div>

    <!-- Category 2: Gourmet Cafes & Roasteries -->
    <div class="space-y-6">
      <div class="flex items-center gap-3 border-b border-cacao-dark/10 pb-3">
        <span class="w-2 h-2 bg-accent-terracotta rounded-full"></span>
        <h3 class="font-sans text-xl md:text-2xl font-bold text-cacao-dark uppercase tracking-wider"><?php echo esc_html(ec_get_text_option('ec_stockist_cat2_title', 'GOURMET CAFES & ESPRESSO BARS')); ?></h3>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-terracotta uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s1_tag', 'CANTONMENTS • ACCRA')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s1_name', 'The Gold Coast Roastery')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s1_desc', 'Specialty espresso bar offering Everything Cacao single-origin dark chocolate bar pairings.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c2_s1_pin', 'Cantonments Road, Accra')); ?></span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-terracotta uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s2_tag', 'OSU • ACCRA')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s2_name', 'Atelier Cacao & Espresso Bar')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s2_desc', 'Urban cafe featuring full seasonal Cherelle flavor bars and Nahar gift sets.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c2_s2_pin', 'Oxford Street Corridor, Osu')); ?></span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-terracotta uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s3_tag', 'AIRPORT CITY • ACCRA')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s3_name', 'Koffee Lounge & Roastery')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c2_s3_desc', 'Convenient business district cafe stocking executive 24-piece mini chocolate boxes.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c2_s3_pin', 'Marina Mall Plaza, Airport City')); ?></span>
        </div>

      </div>
    </div>

    <!-- Category 3: Airport & Retail Pavilions -->
    <div class="space-y-6">
      <div class="flex items-center gap-3 border-b border-cacao-dark/10 pb-3">
        <span class="w-2 h-2 bg-accent-gold rounded-full"></span>
        <h3 class="font-sans text-xl md:text-2xl font-bold text-cacao-dark uppercase tracking-wider"><?php echo esc_html(ec_get_text_option('ec_stockist_cat3_title', 'AIRPORT DUTY FREE & RETAIL PAVILIONS')); ?></h3>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s1_tag', 'TERMINAL 3 • ACCRA')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s1_name', 'KIA International Duty Free')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s1_desc', 'Official Ghanaian souvenir departure pavilion carrying premium gold-embossed gift boxes.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c3_s1_pin', 'Kotoka International Airport')); ?></span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s2_tag', 'RIDGE • ACCRA')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s2_name', 'The Heritage Concept Store')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s2_desc', 'High-end lifestyle boutique promoting authentic West African fashion, arts, and gourmet foods.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c3_s2_pin', 'Independence Avenue, Ridge')); ?></span>
        </div>

        <div class="p-6 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md transition-shadow">
          <span class="text-[10px] font-bold text-accent-gold uppercase tracking-widest"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s3_tag', 'REGIONAL HUB • TAKORADI')); ?></span>
          <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s3_name', 'Takoradi Artisanal Hub')); ?></h4>
          <p class="text-xs text-text-muted leading-relaxed"><?php echo esc_html(ec_get_text_option('ec_stockist_c3_s3_desc', 'Western Region partner stocking farm-traceable Suhum and Assin Fosu bean-to-bar chocolate.')); ?></p>
          <span class="text-[11px] font-semibold text-cacao-dark/70 block pt-2 border-t border-cacao-dark/10">📍 <?php echo esc_html(ec_get_text_option('ec_stockist_c3_s3_pin', 'Market Circle Precinct, Takoradi')); ?></span>
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
