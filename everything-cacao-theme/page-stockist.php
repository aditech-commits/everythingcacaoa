<?php
/**
 * Template Name: Stockists & Retail Partners
 *
 * Everything Cacao GH - Stockist Page Template (page-stockist.php)
 * Automatically loaded for page slug 'stockist' or 'stockists'
 * (URL: https://everythingcacaogh.com/stockist/)
 *
 * Exclusively features official retail partners:
 * - MELCOM (Accra & Regional Outlets)
 * - SHOPRITE SUPERMARKETS
 * - MARINA MALL & MARKETS
 *
 * @package EverythingCacao
 */

get_header();

$link_contact = ec_get_smart_page_link(array('contact', 'concierge'), '/contact');

// Data arrays for retail partner outlets
$melcom_accra = array(
    'Accra Mall', 'Spintex Mall', 'Kaneshie', 'Achimota Mall', 'Achimota', 
    'Kass', 'Baatsona Mini', 'Madina', 'Nanakrom', 'Frafraha', 
    'Labone Mini', 'Domi Mini', 'Weija', 'Kasoa', 'Kasoa Mini', 
    'Tema Comm 1', 'Tema Comm 25', 'Haatso', 'Matehko', 'Adenta', 
    'Amasaman', 'Abelekuma', 'Lashibi', 'Ashaiman', 'Ashongman', 'Kisseman'
);

$melcom_outside = array(
    'Kumasi Mall', 'Adum', 'Adiebaba', 'Santasi', 'Suame', 
    'Manhyia', 'Cape Coast', 'Koforidua', 'Takoradi'
);

$shoprite = array(
    'Accra Mall', 'Junction Mall', 'West Hill Mall', 'Achimota Mall'
);

$marina_mall = array(
    'Airport', 'Cantonment', 'ANC', 'Baatsona', 'Adenta'
);
?>

  <!-- Stockist Hero Banner -->
  <section class="py-16 md:py-24 bg-cacao-dark text-canvas border-b border-canvas/10 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#d4af37_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4 relative z-10">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold block"><?php echo esc_html(ec_get_text_option('ec_stockist_hero_tagline', 'RETAIL PARTNERS & OFFICIAL STOCKISTS')); ?></span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight"><?php echo esc_html(ec_get_text_option('ec_stockist_hero_title', 'Where to Find Everything Cacao')); ?></h1>
      <p class="text-canvas/70 max-w-2xl mx-auto text-sm md:text-base leading-relaxed pt-2">
        Find Cherelle and Nahar artisanal chocolate bars stocked at leading superstores, malls, and premium retail partners across Accra and Ghana.
      </p>
    </div>
  </section>

  <!-- Store Locator Search & Live Filter Bar -->
  <section class="py-8 bg-card-bg border-b border-cacao-dark/10 sticky top-[72px] z-30 shadow-sm backdrop-blur-md bg-card-bg/95">
    <div class="max-w-7xl mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center justify-between gap-6">
      
      <!-- Live Search Box -->
      <div class="relative w-full md:w-96">
        <input 
          type="text" 
          id="stockist-search-input" 
          placeholder="🔍 Search branch e.g. Spintex, Kumasi, Accra Mall..." 
          class="w-full pl-10 pr-4 py-3 text-sm bg-canvas border border-cacao-dark/20 rounded-xl focus:outline-none focus:border-accent-gold transition-colors text-cacao-dark placeholder:text-cacao-dark/40 shadow-inner"
        />
        <svg class="w-4 h-4 text-cacao-dark/40 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
      </div>

      <!-- Partner Quick Filter Pills -->
      <div class="flex items-center gap-2 flex-wrap justify-center w-full md:w-auto" id="stockist-filter-pills">
        <button data-filter="all" class="stockist-filter-btn px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-cacao-dark text-canvas border border-cacao-dark">
          All Outlets (44)
        </button>
        <button data-filter="melcom-accra" class="stockist-filter-btn px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          Melcom Accra (26)
        </button>
        <button data-filter="melcom-outside" class="stockist-filter-btn px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          Melcom Regional (9)
        </button>
        <button data-filter="shoprite" class="stockist-filter-btn px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          Shoprite (4)
        </button>
        <button data-filter="marina" class="stockist-filter-btn px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          Marina Mall (5)
        </button>
      </div>

    </div>
  </section>


  <!-- Stockists Directory Grid -->
  <section class="py-16 md:py-24 max-w-7xl mx-auto px-6 md:px-12 space-y-20" id="stockist-directory-container">

    <!-- ===================================================================== -->
    <!-- SECTION 1: MELCOM SUPERSTORES & MALLS                                 -->
    <!-- ===================================================================== -->
    <div class="space-y-12 stockist-partner-group" id="group-melcom">
      
      <!-- Brand Partner Header -->
      <div class="flex flex-col md:flex-row md:items-center justify-between border-b-2 border-accent-gold/40 pb-4 gap-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-gold rounded-full shrink-0 shadow-sm"></span>
          <div>
            <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">MELCOM SUPERSTORES & MALLS</h2>
            <p class="text-xs text-cacao-dark/60">Official Retail Partner • 35 Outlets Nationwide</p>
          </div>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-gold bg-accent-gold/10 px-3 py-1.5 rounded-md border border-accent-gold/20 self-start md:self-auto">
          Melcom Outlets
        </span>
      </div>

      <!-- SUB-SECTION 1.1: MELCOM - ACCRA -->
      <div class="space-y-6 stockist-subgroup" id="subgroup-melcom-accra">
        <div class="flex items-center justify-between bg-cacao-dark/5 p-4 rounded-xl border border-cacao-dark/10">
          <div class="flex items-center gap-2.5">
            <span class="w-2.5 h-2.5 bg-accent-gold rounded-full"></span>
            <h3 class="font-sans text-lg md:text-xl font-bold text-cacao-dark uppercase tracking-wide">MELCOM - ACCRA</h3>
          </div>
          <span class="text-xs font-semibold text-cacao-dark/70 bg-canvas px-2.5 py-1 rounded-full border border-cacao-dark/10">26 Branches</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
          <?php foreach ($melcom_accra as $branch) : ?>
            <div class="stockist-card p-5 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-gold/50 transition-all duration-300 group" data-partner="melcom-accra" data-search="<?php echo esc_attr(strtolower($branch . ' melcom accra ghana')); ?>">
              <div class="flex items-center justify-between text-[10px] font-bold text-accent-gold uppercase tracking-widest">
                <span>MELCOM • ACCRA</span>
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
              </div>
              <h4 class="font-serif-luxury text-base font-bold text-cacao-dark group-hover:text-accent-gold transition-colors"><?php echo esc_html($branch); ?></h4>
              <div class="text-[11px] font-semibold text-cacao-dark/70 flex items-center gap-1.5 pt-2 border-t border-cacao-dark/10">
                <span class="text-accent-gold">📍</span>
                <span><?php echo esc_html($branch); ?>, Accra</span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- SUB-SECTION 1.2: MELCOM - OUTSIDE ACCRA -->
      <div class="space-y-6 stockist-subgroup pt-6" id="subgroup-melcom-outside">
        <div class="flex items-center justify-between bg-accent-terracotta/10 p-4 rounded-xl border border-accent-terracotta/20">
          <div class="flex items-center gap-2.5">
            <span class="w-2.5 h-2.5 bg-accent-terracotta rounded-full"></span>
            <h3 class="font-sans text-lg md:text-xl font-bold text-cacao-dark uppercase tracking-wide">MELCOM - OUTSIDE ACCRA</h3>
          </div>
          <span class="text-xs font-semibold text-cacao-dark/70 bg-canvas px-2.5 py-1 rounded-full border border-cacao-dark/10">9 Regional Branches</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
          <?php foreach ($melcom_outside as $branch) : ?>
            <div class="stockist-card p-5 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-terracotta/50 transition-all duration-300 group" data-partner="melcom-outside" data-search="<?php echo esc_attr(strtolower($branch . ' melcom regional outside accra ghana')); ?>">
              <div class="flex items-center justify-between text-[10px] font-bold text-accent-terracotta uppercase tracking-widest">
                <span>MELCOM • REGIONAL</span>
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
              </div>
              <h4 class="font-serif-luxury text-base font-bold text-cacao-dark group-hover:text-accent-terracotta transition-colors"><?php echo esc_html($branch); ?></h4>
              <div class="text-[11px] font-semibold text-cacao-dark/70 flex items-center gap-1.5 pt-2 border-t border-cacao-dark/10">
                <span class="text-accent-terracotta">📍</span>
                <span><?php echo esc_html($branch); ?>, Ghana</span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>


    <!-- ===================================================================== -->
    <!-- SECTION 2: SHOPRITE SUPERMARKETS                                     -->
    <!-- ===================================================================== -->
    <div class="space-y-8 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-shoprite">
      
      <!-- Brand Partner Header -->
      <div class="flex flex-col md:flex-row md:items-center justify-between border-b-2 border-accent-terracotta/40 pb-4 gap-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-terracotta rounded-full shrink-0 shadow-sm"></span>
          <div>
            <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">SHOPRITE SUPERMARKETS</h2>
            <p class="text-xs text-cacao-dark/60">Official Retail Partner • 4 Shopping Mall Outlets</p>
          </div>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-terracotta bg-accent-terracotta/10 px-3 py-1.5 rounded-md border border-accent-terracotta/20 self-start md:self-auto">
          Shoprite Outlets
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($shoprite as $branch) : ?>
          <div class="stockist-card p-5 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-terracotta/50 transition-all duration-300 group" data-partner="shoprite" data-search="<?php echo esc_attr(strtolower($branch . ' shoprite mall accra ghana')); ?>">
            <div class="flex items-center justify-between text-[10px] font-bold text-accent-terracotta uppercase tracking-widest">
              <span>SHOPRITE</span>
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-base font-bold text-cacao-dark group-hover:text-accent-terracotta transition-colors"><?php echo esc_html($branch); ?></h4>
            <div class="text-[11px] font-semibold text-cacao-dark/70 flex items-center gap-1.5 pt-2 border-t border-cacao-dark/10">
              <span class="text-accent-terracotta">📍</span>
              <span><?php echo esc_html($branch); ?>, Accra</span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>


    <!-- ===================================================================== -->
    <!-- SECTION 3: MARINA MALL & MARKETS                                      -->
    <!-- ===================================================================== -->
    <div class="space-y-8 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-marina">
      
      <!-- Brand Partner Header -->
      <div class="flex flex-col md:flex-row md:items-center justify-between border-b-2 border-accent-gold/40 pb-4 gap-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-gold rounded-full shrink-0 shadow-sm"></span>
          <div>
            <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">MARINA MALL & MARKETS</h2>
            <p class="text-xs text-cacao-dark/60">Official Retail Partner • 5 Premium Mall & Market Outlets</p>
          </div>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-gold bg-accent-gold/10 px-3 py-1.5 rounded-md border border-accent-gold/20 self-start md:self-auto">
          Marina Mall Outlets
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($marina_mall as $branch) : ?>
          <div class="stockist-card p-5 rounded-xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-gold/50 transition-all duration-300 group" data-partner="marina" data-search="<?php echo esc_attr(strtolower($branch . ' marina mall market airport cantonment accra ghana')); ?>">
            <div class="flex items-center justify-between text-[10px] font-bold text-accent-gold uppercase tracking-widest">
              <span>MARINA MALL</span>
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-base font-bold text-cacao-dark group-hover:text-accent-gold transition-colors"><?php echo esc_html($branch); ?></h4>
            <div class="text-[11px] font-semibold text-cacao-dark/70 flex items-center gap-1.5 pt-2 border-t border-cacao-dark/10">
              <span class="text-accent-gold">📍</span>
              <span><?php echo esc_html($branch); ?>, Accra</span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- No Search Results Found Message -->
    <div id="stockist-no-results" class="hidden text-center py-16 bg-card-bg rounded-2xl border border-cacao-dark/10 space-y-3">
      <div class="text-3xl">🔍</div>
      <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">No stockist locations matched your search</h3>
      <p class="text-xs text-cacao-dark/60">Try searching for another location e.g. "Spintex", "Kumasi", "Accra Mall", or click "All Outlets".</p>
    </div>

  </section>


  <!-- Direct Order / Concierge CTA Banner -->
  <section class="py-16 bg-cacao-dark text-canvas border-t border-canvas/10">
    <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">BESPOKE ORDERS & WHOLESALE</span>
      <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold">Can't Find a Nearby Outlet or Looking for Bulk Ordering?</h2>
      <p class="text-canvas/70 text-sm md:text-base leading-relaxed">
        Our Concierge Service delivers artisan Cherelle and Nahar chocolate boxes directly to your doorstep in Accra or ships custom wholesale orders nationwide.
      </p>
      <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
        <a href="<?php echo $link_contact; ?>" class="inline-flex items-center gap-2 bg-accent-gold hover:bg-accent-gold/90 text-cacao-dark font-semibold text-xs uppercase tracking-widest px-8 py-3.5 rounded-full transition-all shadow-md hover:shadow-lg">
          <span>Contact Concierge</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
          </svg>
        </a>
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

