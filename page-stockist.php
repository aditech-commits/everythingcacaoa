<?php
/**
 * Template Name: Stockists & Retail Partners
 *
 * Everything Cacao GH - Stockist Page Template (page-stockist.php)
 * Automatically loaded for page slug 'stockist' or 'stockists'
 * (URL: https://everythingcacaogh.com/stockist/)
 *
 * Exclusively features official retail partners:
 * - MELCOM - ACCRA
 * - MELCOM - OUTSIDE ACCRA
 * - SHOPRITE
 * - MARINA Mall
 * - MAXMART
 * - PALACE
 * - CM SUPER PLAZA
 * - SUPER SAVE
 * - PANDA MART
 *
 * @package EverythingCacao
 */

get_header();

$link_contact = ec_get_smart_page_link(array('contact', 'concierge'), '/contact');

// Data arrays for retail partner outlets exactly as provided in Excel sheets
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

$maxmart = array(
    '37', 'ANC', 'Airport', 'Cantonment', 'Tema'
);

$palace = array(
    'Spintex', 'Labone', 'Comm 25', 'Adenta'
);

$cm_super_plaza = array(
    'Atomic', 'Airport'
);

$super_save = array(
    'East Legon', 'Weija'
);

$panda_mart = array(
    'Atomic'
);
?>

  <!-- Stockist Hero Banner -->
  <section class="py-16 md:py-24 bg-cacao-dark text-canvas border-b border-canvas/10 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#d4af37_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4 relative z-10">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold block"><?php echo esc_html(ec_get_text_option('ec_stockist_hero_tagline', 'RETAIL PARTNERS & OFFICIAL STOCKISTS')); ?></span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight"><?php echo esc_html(ec_get_text_option('ec_stockist_hero_title', 'Where to Find Everything Cacao')); ?></h1>
      <p class="text-canvas/70 max-w-2xl mx-auto text-sm md:text-base leading-relaxed pt-2">
        Find Cherelle and Nahar artisanal chocolate bars stocked at official retail partners across Ghana.
      </p>
    </div>
  </section>

  <!-- Store Locator Search & Live Filter Bar -->
  <section class="py-6 bg-card-bg border-b border-cacao-dark/10 sticky top-[72px] z-30 shadow-sm backdrop-blur-md bg-card-bg/95">
    <div class="max-w-7xl mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center justify-between gap-4">
      
      <!-- Live Search Box -->
      <div class="relative w-full md:w-80">
        <input 
          type="text" 
          id="stockist-search-input" 
          placeholder="🔍 Search branch location..." 
          class="w-full pl-10 pr-4 py-2.5 text-sm bg-canvas border border-cacao-dark/20 rounded-xl focus:outline-none focus:border-accent-gold transition-colors text-cacao-dark placeholder:text-cacao-dark/40 shadow-inner"
        />
        <svg class="w-4 h-4 text-cacao-dark/40 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
      </div>

      <!-- Partner Quick Filter Pills -->
      <div class="flex items-center gap-1.5 flex-wrap justify-center w-full md:w-auto" id="stockist-filter-pills">
        <button data-filter="all" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-cacao-dark text-canvas border border-cacao-dark">
          All Outlets (58)
        </button>
        <button data-filter="melcom-accra" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          MELCOM - ACCRA
        </button>
        <button data-filter="melcom-outside" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          MELCOM - OUTSIDE ACCRA
        </button>
        <button data-filter="shoprite" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          SHOPRITE
        </button>
        <button data-filter="marina" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          MARINA Mall
        </button>
        <button data-filter="maxmart" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          MAXMART
        </button>
        <button data-filter="palace" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          PALACE
        </button>
        <button data-filter="cm-super-plaza" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          CM SUPER PLAZA
        </button>
        <button data-filter="super-save" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          SUPER SAVE
        </button>
        <button data-filter="panda-mart" class="stockist-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-canvas text-cacao-dark/70 hover:text-cacao-dark border border-cacao-dark/15 hover:border-cacao-dark/40">
          PANDA MART
        </button>
      </div>

    </div>
  </section>


  <!-- Stockists Directory Grid -->
  <section class="py-16 md:py-24 max-w-7xl mx-auto px-6 md:px-12 space-y-16" id="stockist-directory-container">

    <!-- 1. MELCOM - ACCRA -->
    <div class="space-y-6 stockist-partner-group" id="group-melcom-accra">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-gold rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">MELCOM - ACCRA</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-gold bg-accent-gold/10 px-3 py-1.5 rounded-full border border-accent-gold/20">
          MELCOM - ACCRA
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($melcom_accra as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-gold/50 transition-all duration-300 group relative" data-partner="melcom-accra" data-search="<?php echo esc_attr(strtolower($branch . ' melcom accra')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-gold uppercase tracking-wider block">MELCOM - ACCRA</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-gold transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 2. MELCOM - OUTSIDE ACCRA -->
    <div class="space-y-6 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-melcom-outside">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-terracotta rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">MELCOM - OUTSIDE ACCRA</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-terracotta bg-accent-terracotta/10 px-3 py-1.5 rounded-full border border-accent-terracotta/20">
          MELCOM - OUTSIDE ACCRA
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($melcom_outside as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-terracotta/50 transition-all duration-300 group relative" data-partner="melcom-outside" data-search="<?php echo esc_attr(strtolower($branch . ' melcom outside accra')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-terracotta uppercase tracking-wider block">MELCOM - OUTSIDE ACCRA</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-terracotta transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 3. SHOPRITE -->
    <div class="space-y-6 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-shoprite">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-gold rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">SHOPRITE</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-gold bg-accent-gold/10 px-3 py-1.5 rounded-full border border-accent-gold/20">
          SHOPRITE
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($shoprite as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-gold/50 transition-all duration-300 group relative" data-partner="shoprite" data-search="<?php echo esc_attr(strtolower($branch . ' shoprite')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-gold uppercase tracking-wider block">SHOPRITE</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-gold transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 4. MARINA Mall -->
    <div class="space-y-6 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-marina">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-terracotta rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">MARINA Mall</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-terracotta bg-accent-terracotta/10 px-3 py-1.5 rounded-full border border-accent-terracotta/20">
          MARINA Mall
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($marina_mall as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-terracotta/50 transition-all duration-300 group relative" data-partner="marina" data-search="<?php echo esc_attr(strtolower($branch . ' marina mall')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-terracotta uppercase tracking-wider block">MARINA Mall</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-terracotta transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 5. MAXMART -->
    <div class="space-y-6 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-maxmart">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-gold rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">MAXMART</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-gold bg-accent-gold/10 px-3 py-1.5 rounded-full border border-accent-gold/20">
          MAXMART
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($maxmart as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-gold/50 transition-all duration-300 group relative" data-partner="maxmart" data-search="<?php echo esc_attr(strtolower($branch . ' maxmart')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-gold uppercase tracking-wider block">MAXMART</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-gold transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 6. PALACE -->
    <div class="space-y-6 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-palace">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-terracotta rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">PALACE</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-terracotta bg-accent-terracotta/10 px-3 py-1.5 rounded-full border border-accent-terracotta/20">
          PALACE
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($palace as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-terracotta/50 transition-all duration-300 group relative" data-partner="palace" data-search="<?php echo esc_attr(strtolower($branch . ' palace')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-terracotta uppercase tracking-wider block">PALACE</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-terracotta transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 7. CM SUPER PLAZA -->
    <div class="space-y-6 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-cm-super-plaza">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-gold rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">CM SUPER PLAZA</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-gold bg-accent-gold/10 px-3 py-1.5 rounded-full border border-accent-gold/20">
          CM SUPER PLAZA
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($cm_super_plaza as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-gold/50 transition-all duration-300 group relative" data-partner="cm-super-plaza" data-search="<?php echo esc_attr(strtolower($branch . ' cm super plaza')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-gold uppercase tracking-wider block">CM SUPER PLAZA</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-gold transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 8. SUPER SAVE -->
    <div class="space-y-6 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-super-save">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-terracotta rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">SUPER SAVE</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-terracotta bg-accent-terracotta/10 px-3 py-1.5 rounded-full border border-accent-terracotta/20">
          SUPER SAVE
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($super_save as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-terracotta/50 transition-all duration-300 group relative" data-partner="super-save" data-search="<?php echo esc_attr(strtolower($branch . ' super save')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-terracotta uppercase tracking-wider block">SUPER SAVE</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-terracotta transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- 9. PANDA MART -->
    <div class="space-y-6 stockist-partner-group pt-8 border-t border-cacao-dark/10" id="group-panda-mart">
      <div class="flex items-center justify-between border-b border-cacao-dark/15 pb-4">
        <div class="flex items-center gap-3">
          <span class="w-3.5 h-3.5 bg-accent-gold rounded-full shrink-0 shadow-sm"></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark uppercase tracking-wider">PANDA MART</h2>
        </div>
        <span class="text-xs font-bold uppercase tracking-widest text-accent-gold bg-accent-gold/10 px-3 py-1.5 rounded-full border border-accent-gold/20">
          PANDA MART
        </span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php foreach ($panda_mart as $branch) : ?>
          <div class="stockist-card p-5 rounded-2xl bg-card-bg border border-cacao-dark/10 space-y-3 shadow-sm hover:shadow-md hover:border-accent-gold/50 transition-all duration-300 group relative" data-partner="panda-mart" data-search="<?php echo esc_attr(strtolower($branch . ' panda mart')); ?>">
            <div class="flex items-center justify-between">
              <span class="text-[11px] font-bold text-accent-gold uppercase tracking-wider block">PANDA MART</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <h4 class="font-serif-luxury text-xl font-bold text-cacao-dark group-hover:text-accent-gold transition-colors pt-1"><?php echo esc_html($branch); ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <!-- No Search Results Found Message -->
    <div id="stockist-no-results" class="hidden text-center py-16 bg-card-bg rounded-2xl border border-cacao-dark/10 space-y-3">
      <div class="text-3xl">🔍</div>
      <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">No stockist locations matched your search</h3>
      <p class="text-xs text-cacao-dark/60">Try searching for another location or click "All Outlets".</p>
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

  <!-- Client-side Search and Filter Script -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('stockist-search-input');
    const filterBtns = document.querySelectorAll('.stockist-filter-btn');
    const partnerGroups = document.querySelectorAll('.stockist-partner-group');
    const noResults = document.getElementById('stockist-no-results');

    let activeFilter = 'all';

    function filterStockists() {
      const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
      let totalVisible = 0;

      partnerGroups.forEach(group => {
        let groupHasVisible = false;
        const groupCards = group.querySelectorAll('.stockist-card');

        groupCards.forEach(card => {
          const partner = card.getAttribute('data-partner');
          const searchText = card.getAttribute('data-search') || '';

          const matchesFilter = (activeFilter === 'all' || partner === activeFilter);
          const matchesQuery = !query || searchText.includes(query);

          if (matchesFilter && matchesQuery) {
            card.classList.remove('hidden');
            groupHasVisible = true;
            totalVisible++;
          } else {
            card.classList.add('hidden');
          }
        });

        if (groupHasVisible) {
          group.classList.remove('hidden');
        } else {
          group.classList.add('hidden');
        }
      });

      if (noResults) {
        if (totalVisible === 0) {
          noResults.classList.remove('hidden');
        } else {
          noResults.classList.add('hidden');
        }
      }
    }

    filterBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        filterBtns.forEach(b => {
          b.classList.remove('bg-cacao-dark', 'text-canvas', 'border-cacao-dark');
          b.classList.add('bg-canvas', 'text-cacao-dark/70', 'border-cacao-dark/15');
        });
        this.classList.remove('bg-canvas', 'text-cacao-dark/70', 'border-cacao-dark/15');
        this.classList.add('bg-cacao-dark', 'text-canvas', 'border-cacao-dark');

        activeFilter = this.getAttribute('data-filter');
        filterStockists();
      });
    });

    if (searchInput) {
      searchInput.addEventListener('input', filterStockists);
    }
  });
  </script>

<?php
get_footer();
