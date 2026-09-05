<?php
/**
 * Template Name: Our Collections Catalog
 *
 * Everything Cacao GH - Catalog Page Template (page-collections.php)
 * All static header copy, tab labels, and badge defaults are dynamically
 * controlled via the WordPress Customizer:
 * Appearance → Customize → Our Collections Management
 *
 * Product data (title, image, price, cacao %, origin, tasting notes) remains
 * 100% dynamic via WP_Query on the `cacao_products` Custom Post Type —
 * managed under WP Admin → Confection Catalog.
 *
 * Features:
 *   - Functional filter tabs (All / Cherelle / Nahar / Gift Boxes)
 *   - Hover overlay with "View Details" action
 *   - Click-to-expand product detail modal
 *   - All product data editable via WP Admin → Confection Catalog
 *
 * @package EverythingCacao
 */

get_header();

// ── Read all Customizer values up-front ────────────────────────────────────

// Section 1: Hero Banner
$coll_hero_tagline  = get_theme_mod( 'ec_coll_hero_tagline',  'FDA & GSA CERTIFIED GHANAIAN CHOCOLATE' );
$coll_hero_title    = get_theme_mod( 'ec_coll_hero_title',    'Shop Everything Cacao — Nahar & Cherelle' );
$coll_hero_subtitle = get_theme_mod( 'ec_coll_hero_subtitle', "Browse our full range of Ghanaian chocolate bars. From Nahar's luxury dark and milk collections to Cherelle's affordable everyday bars — there's an Everything Cacao chocolate for every taste, budget and occasion." );

// Section 2: Filter Tab Labels
$tab_all      = get_theme_mod( 'ec_coll_tab_all',      'ALL COLLECTIONS' );
$tab_cherelle = get_theme_mod( 'ec_coll_tab_cherelle', 'CHERELLE' );
$tab_nahar    = get_theme_mod( 'ec_coll_tab_nahar',    'NAHAR' );
$tab_gifting  = get_theme_mod( 'ec_coll_tab_gifting',  'GIFT BOXES' );

// Section 3: Card Badges & Labels
$badge_dark_default   = get_theme_mod( 'ec_coll_badge_dark_default',   '100% RAW CACAO' );
$badge_light_cherelle = get_theme_mod( 'ec_coll_badge_light_cherelle', 'CHERELLE' );
$badge_light_nahar    = get_theme_mod( 'ec_coll_badge_light_nahar',    'NAHAR' );
$badge_light_gift     = get_theme_mod( 'ec_coll_badge_light_gift',     'GIFT BOX' );
$hover_overlay_text   = get_theme_mod( 'ec_coll_hover_overlay_text',   'View Details' );
$empty_title          = get_theme_mod( 'ec_coll_empty_title',          'No products in this collection yet' );
$empty_body           = get_theme_mod( 'ec_coll_empty_body',           'Check back soon or browse all collections.' );

$placeholder_img = 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png';
?>

  <!-- ========================================================================
       SECTION 1: HERO BANNER
       Customizer: Our Collections Management → 1. Hero Banner
       ======================================================================== -->
  <section class="py-16 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">
        <?php echo esc_html( $coll_hero_tagline ); ?>
      </span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold">
        <?php echo esc_html( $coll_hero_title ); ?>
      </h1>
      <p class="text-canvas/80 text-sm max-w-3xl mx-auto leading-relaxed">
        <?php echo esc_html( $coll_hero_subtitle ); ?>
      </p>
    </div>
  </section>

  <!-- ========================================================================
       SECTION 2: FILTER TABS & PRODUCT GRID
       Tab labels: Customizer → Our Collections Management → 2. Collection Filter Tabs
       Product data: WP Admin → Confection Catalog (cacao_products CPT)
       ======================================================================== -->
  <section class="py-16 max-w-7xl mx-auto px-6 md:px-12 flex-grow">

    <!-- Filter Tabs (Customizer: tab labels; JS data-category values are fixed) -->
    <div class="flex flex-wrap items-center justify-center gap-3 mb-12 border-b border-cacao-dark/10 pb-6">
      <button data-category="all"
              class="catalog-tab px-6 py-2.5 rounded-full text-xs font-semibold uppercase tracking-widest bg-cacao-dark text-canvas transition-all active"
              onclick="filterProducts('all', this)">
        <?php echo esc_html( $tab_all ); ?>
      </button>
      <button data-category="cherelle"
              class="catalog-tab px-6 py-2.5 rounded-full text-xs font-semibold uppercase tracking-widest bg-card-bg text-cacao-dark hover:bg-cacao-dark/10 transition-all"
              onclick="filterProducts('cherelle', this)">
        <?php echo esc_html( $tab_cherelle ); ?>
      </button>
      <button data-category="nahar"
              class="catalog-tab px-6 py-2.5 rounded-full text-xs font-semibold uppercase tracking-widest bg-card-bg text-cacao-dark hover:bg-cacao-dark/10 transition-all"
              onclick="filterProducts('nahar', this)">
        <?php echo esc_html( $tab_nahar ); ?>
      </button>
      <button data-category="gifting"
              class="catalog-tab px-6 py-2.5 rounded-full text-xs font-semibold uppercase tracking-widest bg-card-bg text-cacao-dark hover:bg-cacao-dark/10 transition-all"
              onclick="filterProducts('gifting', this)">
        <?php echo esc_html( $tab_gifting ); ?>
      </button>
    </div>

    <!-- Product Card Grid -->
    <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php
      // ── PRIMARY: WP_Query on cacao_products CPT ────────────────────────
      $args = array(
          'post_type'      => 'cacao_products',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'orderby'        => 'menu_order date',
          'order'          => 'ASC',
      );
      $query = new WP_Query( $args );
      $wa_number = get_option( 'ec_whatsapp_number', '233240661866' );

      if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post();
              $sub_brand   = ec_get_product_field('sub_brand')          ?: 'Artisanal';
              $price       = ec_get_product_field('product_price')       ?: '420';
              $cacao       = ec_get_product_field('cacao_content')       ?: $badge_dark_default;
              $origin      = ec_get_product_field('origin_region')       ?: 'Single-Origin • Ghana';
              $notes       = ec_get_product_field('tasting_notes')       ?: get_the_excerpt();
              $description = ec_get_product_field('product_description') ?: '';
              $thumb_url   = get_the_post_thumbnail_url( null, 'large' ) ?: $placeholder_img;
              $wa_text     = urlencode( "Hi, I'd like to order the " . get_the_title() );

              // Determine filter category
              $brand_lower = strtolower( $sub_brand );
              if ( strpos( $brand_lower, 'gift' ) !== false ) {
                  $filter_cat = 'gifting';
              } elseif ( $brand_lower === 'cherelle' ) {
                  $filter_cat = 'cherelle';
              } elseif ( $brand_lower === 'nahar' ) {
                  $filter_cat = 'nahar';
              } else {
                  $filter_cat = 'other';
              }

              // Card border class
              $card_border = ( $brand_lower === 'cherelle' ) ? 'subbrand-cherelle'
                           : ( ( $brand_lower === 'nahar' ) ? 'subbrand-nahar' : 'border-t-4 border-accent-gold' );

              // Right (light) badge label — sub-brand, with Customizer fallback
              if ( $brand_lower === 'cherelle' ) {
                  $right_badge = $badge_light_cherelle;
              } elseif ( $brand_lower === 'nahar' ) {
                  $right_badge = $badge_light_nahar;
              } elseif ( strpos( $brand_lower, 'gift' ) !== false ) {
                  $right_badge = $badge_light_gift;
              } else {
                  $right_badge = esc_html( $sub_brand );
              }

              // Image background per brand
              $img_bg = ( $brand_lower === 'nahar' )
                        ? 'bg-[#18110D]'
                        : ( ( strpos( $brand_lower, 'gift' ) !== false ) ? 'bg-[#2C1A11]' : 'bg-[#F5EFE6]' );
          ?>
          <div class="product-card bg-card-bg rounded-xl overflow-hidden border border-cacao-dark/10 flex flex-col justify-between <?php echo esc_attr( $card_border ); ?> shadow-sm transition-all duration-300 hover:shadow-2xl hover:-translate-y-1"
               data-category="<?php echo esc_attr( $filter_cat ); ?>">
            <div>
              <!-- Product Image with Hover Overlay -->
              <div class="relative w-full overflow-hidden <?php echo esc_attr( $img_bg ); ?> group cursor-pointer"
                   style="aspect-ratio:1/1;"
                   onclick="openProductModal(this)"
                   data-title="<?php echo esc_attr( get_the_title() ); ?>"
                   data-image="<?php echo esc_url( $thumb_url ); ?>"
                   data-price="<?php echo esc_attr( $price ); ?>"
                   data-cacao="<?php echo esc_attr( $cacao ); ?>"
                   data-origin="<?php echo esc_attr( $origin ); ?>"
                   data-notes="<?php echo esc_attr( $notes ); ?>"
                   data-description="<?php echo esc_attr( $description ?: $notes ); ?>"
                   data-brand="<?php echo esc_attr( $sub_brand ); ?>"
                   data-wa="https://wa.me/<?php echo esc_attr( $wa_number ); ?>?text=<?php echo $wa_text; ?>">

                <img src="<?php echo esc_url( $thumb_url ); ?>"
                     alt="<?php echo esc_attr( get_the_title() ); ?>"
                     class="absolute inset-0 w-full h-full object-contain p-5 transition-transform duration-700 group-hover:scale-105"
                     loading="lazy" decoding="async" />

                <!-- Left Badge: Cacao content (dark) -->
                <span class="absolute top-4 left-4 text-[10px] font-semibold uppercase tracking-wider bg-cacao-dark text-canvas px-3 py-1 z-10">
                  <?php echo esc_html( $cacao ); ?>
                </span>
                <!-- Right Badge: Sub-brand (light) -->
                <span class="absolute top-4 right-4 text-[10px] font-semibold uppercase tracking-wider bg-white/90 text-cacao-dark px-3 py-1 rounded-full shadow-sm z-10">
                  <?php echo esc_html( $right_badge ); ?>
                </span>

                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-cacao-dark/60 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-400 z-20">
                  <span class="text-canvas font-serif-luxury text-lg font-bold mb-2">
                    <?php echo esc_html( $hover_overlay_text ); ?>
                  </span>
                  <span class="w-12 h-0.5 bg-accent-gold"></span>
                </div>
              </div>

              <!-- Product Title -->
              <div class="p-6">
                <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark"><?php the_title(); ?></h3>
              </div>
            </div>
          </div>
          <?php
          endwhile;
          wp_reset_postdata();

      else :
          // ── FALLBACK: Static products shown when no CPT records exist ──────
          $fallback_products = array(
              array( 'title' => 'Cherelle 45% Milk Chocolate Bar',                     'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '305',  'cacao' => '45% Milk Cacao',     'origin' => 'Suhum, Eastern Region • Ghana',          'notes' => 'Warm Caramel, Toasted Hazelnut, Vanilla',              'description' => 'Creamy artisanal milk chocolate crafted with pure Ghanaian cocoa butter, fresh milk, and golden cane sugar.',                               'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle 60% Dark Chocolate Executive Box (24x9g)',   'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '350',  'cacao' => '60% Dark Cacao',     'origin' => 'Assin Fosu, Central Region • Ghana',     'notes' => 'Red Berry, Dark Fudge, Caramel',                       'description' => 'Smooth medium-dark chocolate with subtle red berry and caramel undertones, presented in an executive mini square collection box.',        'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle Delights Milk Chocolate Standup Pouch (50g)','sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '280',  'cacao' => '40% Milk Cacao',     'origin' => 'On-The-Go Pouch • Accra',                'notes' => 'Creamy Cocoa, Sweet Honey, Toasted Milk',              'description' => 'Convenient re-sealable standup pouch packed with bite-sized Cherelle milk chocolate delights for daily snacking.',                        'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle 40% Milk Chocolate Square Box (24x9g)',      'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '320',  'cacao' => '40% Milk Cacao',     'origin' => 'Suhum, Eastern Region • Ghana',          'notes' => 'Creamy Butterscotch, Smooth Cocoa, Honey',             'description' => 'Individual 9g luxury squares of Cherelle signature milk chocolate wrapped in gold foil.',                                                'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle Milk Chocolate Long Artisanal Bar',          'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '310',  'cacao' => '45% Milk Cacao',     'origin' => 'Suhum, Eastern Region • Ghana',          'notes' => 'Toasted Almond, Creamy Caramel, Cocoa Butter',         'description' => 'Elongated artisanal milk chocolate bar crafted with double-conched milk cacao.',                                                          'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle Delights Mini Snack Pouch',                  'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '250',  'cacao' => '45% Milk Cacao',     'origin' => 'Accra • Ghana',                          'notes' => 'Creamy Cocoa, Vanilla Bean, Honey',                    'description' => 'On-the-go snack pouch containing silky milk chocolate nibbles crafted from 100% single-origin cacao.',                                   'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Nahar 72% Single-Origin Dark Chocolate Bar',          'sub_brand' => 'Nahar',             'filter_cat' => 'nahar',    'price' => '450',  'cacao' => '72% Dark Cacao',     'origin' => 'Single-Origin • Sefwi Wiawso',           'notes' => 'Black Cherry, Roasted Espresso, Smoked Timber',        'description' => 'Deep, intensely aromatic single-origin dark chocolate bar conched for 72 hours.',                                                         'image' => $placeholder_img, 'card_class' => 'subbrand-nahar'    ),
              array( 'title' => 'Nahar 85% Obsidian Reserve Extra Dark Bar',           'sub_brand' => 'Nahar',             'filter_cat' => 'nahar',    'price' => '480',  'cacao' => '85% Dark Cacao',     'origin' => 'Single-Origin • Tepa, Ashanti',          'notes' => 'Bittersweet Cocoa, Dark Plum, Smoked Wood',            'description' => 'Our highest cacao percentage bar. High in polyphenols and antioxidants for pure dark cocoa purists.',                                    'image' => $placeholder_img, 'card_class' => 'subbrand-nahar'    ),
              array( 'title' => 'Nahar 70% Roasted Cacao Nib & Ada Sea Salt Bar',      'sub_brand' => 'Nahar',             'filter_cat' => 'nahar',    'price' => '460',  'cacao' => '70% Dark Cacao',     'origin' => 'Sefwi Wiawso & Ada Foah',                'notes' => 'Crunch Nib, Sea Salt, Roasted Cocoa',                  'description' => 'Single-origin 70% dark chocolate studded with sun-roasted crunchy cacao nibs and sea salt flakes.',                                      'image' => $placeholder_img, 'card_class' => 'subbrand-nahar'    ),
              array( 'title' => 'Ashanti Gold Truffle & Praline Collection Box',       'sub_brand' => 'Gift Box',          'filter_cat' => 'gifting',  'price' => '680',  'cacao' => 'Assorted Reserve',   'origin' => 'Kumasi & Suhum • Ghana',                 'notes' => 'Golden Honeycomb, Hazelnut Praline, Dark Truffle',     'description' => 'Hand-painted luxury truffles infused with wild Ashanti honey and 72% dark chocolate ganache.',                                            'image' => $placeholder_img, 'card_class' => 'border-t-4 border-accent-gold' ),
              array( 'title' => 'Royal Ghanaian Luxury Cacao Hamper',                  'sub_brand' => 'Gift Box',          'filter_cat' => 'gifting',  'price' => '1250', 'cacao' => 'Grand Cru Collection','origin' => 'Suhum & Sefwi Wiawso',                  'notes' => 'Complete Confection Suite, Plush Keepsake',            'description' => 'Our grandest gift hamper featuring full-sized Cherelle & Nahar bars, snack pouches, and plush keepsake.',                                'image' => $placeholder_img, 'card_class' => 'border-t-4 border-accent-gold' ),
              array( 'title' => 'Cherelle Honeycomb & Salted Caramel Bar (90g)',        'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '340',  'cacao' => '50% Milk Cacao',     'origin' => 'Suhum, Eastern Region • Ghana',          'notes' => 'Golden Honeycomb, Salted Butter, Caramel',             'description' => 'Crunchy golden honeycomb pieces folded into creamy milk chocolate with a pinch of sea salt.',                                             'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Organic Sun-Dried Roasted Cacao Nibs (250g Pouch)',   'sub_brand' => 'Artisanal Reserve', 'filter_cat' => 'raw',      'price' => '220',  'cacao' => '100% Pure Cacao',    'origin' => 'Assin Fosu, Central Region • Ghana',     'notes' => 'Nutty, Raw Cocoa, Earthy Bitterness',                  'description' => 'Unsweetened, antioxidant-rich organic roasted cacao nibs. Superfood perfect for baking and smoothies.',                                  'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle 50% Dark Chocolate Snack Pouch (50g)',       'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '270',  'cacao' => '50% Dark Cacao',     'origin' => 'Suhum, Eastern Region • Ghana',          'notes' => 'Balanced Dark Cocoa, Caramel, Toasted Oat',            'description' => 'Semi-sweet 50% dark chocolate snack bites packed in a protective re-sealable foil pouch.',                                               'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle 70% Dark Chocolate Standup Pouch (50g)',     'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '290',  'cacao' => '70% Dark Cacao',     'origin' => 'Assin Fosu, Central Region • Ghana',     'notes' => 'Rich Cocoa, Black Currant, Espresso',                  'description' => 'Deep 70% dark chocolate bite-sized squares for health-conscious dark chocolate enthusiasts.',                                             'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle Roasted Peanut Milk Chocolate Bar (90g)',    'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '320',  'cacao' => '45% Milk Cacao',     'origin' => 'Northern Region & Suhum • Ghana',        'notes' => 'Crunchy Roasted Peanuts, Milk Cocoa',                  'description' => 'Slow-roasted Northern Ghanaian peanuts embedded in rich 45% milk chocolate.',                                                            'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle Orange Zest Dark Chocolate Bar (90g)',       'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '335',  'cacao' => '60% Dark Cacao',     'origin' => 'Suhum & Koforidua • Ghana',              'notes' => 'Citrus Zest, Dark Fudge, Citrus Blossom',              'description' => 'Infused with natural candied citrus peel oil and 60% dark Ghanaian cacao for a refreshing flavor.',                                     'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
              array( 'title' => 'Cherelle Spiced Ginger & Honey Dark Bar (90g)',       'sub_brand' => 'Cherelle',          'filter_cat' => 'cherelle', 'price' => '345',  'cacao' => '65% Dark Cacao',     'origin' => 'Assin Fosu & Suhum • Ghana',             'notes' => 'Warm Ginger Spice, Wild Honey, Dark Cocoa',            'description' => 'Zesty Ghanaian ginger root spice balanced with pure forest honey folded into smooth 65% dark chocolate.',                                'image' => $placeholder_img, 'card_class' => 'subbrand-cherelle' ),
          );

          foreach ( $fallback_products as $product ) :
              $p_brand_lower = strtolower( $product['sub_brand'] );
              $wa_text       = urlencode( "Hi, I'd like to order the " . $product['title'] );

              // Right badge fallback per sub-brand
              if ( $p_brand_lower === 'cherelle' ) {
                  $right_badge = $badge_light_cherelle;
              } elseif ( $p_brand_lower === 'nahar' ) {
                  $right_badge = $badge_light_nahar;
              } elseif ( strpos( $p_brand_lower, 'gift' ) !== false ) {
                  $right_badge = $badge_light_gift;
              } else {
                  $right_badge = esc_html( $product['sub_brand'] );
              }
          ?>
          <div class="product-card bg-card-bg rounded-lg overflow-hidden border border-cacao-dark/10 flex flex-col justify-between <?php echo esc_attr( $product['card_class'] ); ?> shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
               data-category="<?php echo esc_attr( $product['filter_cat'] ); ?>">
            <div>
              <!-- Product Image with Hover Overlay -->
              <div class="relative aspect-square overflow-hidden bg-canvas group cursor-pointer"
                   onclick="openProductModal(this)"
                   data-title="<?php echo esc_attr( $product['title'] ); ?>"
                   data-image="<?php echo esc_url( $product['image'] ); ?>"
                   data-price="<?php echo esc_attr( $product['price'] ); ?>"
                   data-cacao="<?php echo esc_attr( $product['cacao'] ); ?>"
                   data-origin="<?php echo esc_attr( $product['origin'] ); ?>"
                   data-notes="<?php echo esc_attr( $product['notes'] ); ?>"
                   data-description="<?php echo esc_attr( $product['description'] ); ?>"
                   data-brand="<?php echo esc_attr( $product['sub_brand'] ); ?>"
                   data-wa="https://wa.me/<?php echo esc_attr( $wa_number ); ?>?text=<?php echo $wa_text; ?>">

                <img src="<?php echo esc_url( $product['image'] ); ?>"
                     alt="<?php echo esc_attr( $product['title'] ); ?>"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />

                <!-- Left Badge: Cacao content (dark) -->
                <span class="absolute top-4 left-4 text-[10px] font-semibold uppercase tracking-wider bg-cacao-dark text-canvas px-3 py-1 z-10">
                  <?php echo esc_html( $product['cacao'] ); ?>
                </span>
                <!-- Right Badge: Sub-brand (light) -->
                <span class="absolute top-4 right-4 text-[10px] font-semibold uppercase tracking-wider bg-white/90 text-cacao-dark px-3 py-1 rounded-full shadow-sm z-10">
                  <?php echo esc_html( $right_badge ); ?>
                </span>

                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-cacao-dark/60 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-400 z-20">
                  <span class="text-canvas font-serif-luxury text-lg font-bold mb-2">
                    <?php echo esc_html( $hover_overlay_text ); ?>
                  </span>
                  <span class="w-12 h-0.5 bg-accent-gold"></span>
                </div>
              </div>

              <!-- Product Title -->
              <div class="p-6">
                <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">
                  <?php echo esc_html( $product['title'] ); ?>
                </h3>
              </div>
            </div>
          </div>
          <?php
          endforeach;
      endif; // end WP_Query / fallback
      ?>
    </div><!-- #product-grid -->

    <!-- Empty Filter State (shown via JS when filter finds 0 matches) -->
    <div id="no-results" class="hidden text-center py-20 space-y-4">
      <span class="text-5xl">🍫</span>
      <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">
        <?php echo esc_html( $empty_title ); ?>
      </h3>
      <p class="text-sm text-text-muted">
        <?php echo esc_html( $empty_body ); ?>
      </p>
      <button onclick="filterProducts('all', document.querySelector('[data-category=all]'))"
              class="px-8 py-3 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors">
        Browse All Collections
      </button>
    </div>

  </section>


  <!-- ════════════════════════════════════════════════
       PRODUCT DETAIL MODAL
       ════════════════════════════════════════════════ -->
  <div id="product-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-cacao-dark/80 backdrop-blur-sm" onclick="closeProductModal()"></div>

    <!-- Modal Content -->
    <div class="relative bg-canvas rounded-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl z-10 transform scale-95 transition-transform duration-300" id="modal-content">
      <!-- Close Button -->
      <button onclick="closeProductModal()"
              class="absolute top-4 right-4 z-30 w-10 h-10 flex items-center justify-center rounded-full bg-cacao-dark/80 text-canvas hover:bg-accent-terracotta transition-colors text-xl font-bold">
        &times;
      </button>

      <div class="grid grid-cols-1 lg:grid-cols-2">
        <!-- Product Image (Full) -->
        <div class="aspect-square lg:aspect-auto lg:min-h-[500px] overflow-hidden bg-nahar-obsidian">
          <img id="modal-image" src="" alt="" class="w-full h-full object-cover" />
        </div>

        <!-- Product Details -->
        <div class="p-8 md:p-12 flex flex-col justify-between space-y-6">
          <div class="space-y-6">
            <!-- Brand & Badges -->
            <div class="flex items-center gap-3">
              <span id="modal-brand" class="text-[10px] font-semibold uppercase tracking-widest bg-cacao-dark text-canvas px-3 py-1 rounded-full"></span>
              <span id="modal-cacao" class="text-[10px] font-semibold uppercase tracking-widest bg-accent-gold text-cacao-dark px-3 py-1 rounded-full"></span>
            </div>

            <!-- Title -->
            <h2 id="modal-title" class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark"></h2>

            <!-- Origin -->
            <span id="modal-origin" class="text-[10px] font-semibold text-text-muted uppercase tracking-widest block"></span>

            <!-- Tasting Notes -->
            <div class="space-y-2">
              <span class="text-xs font-semibold text-accent-gold uppercase tracking-wider">Tasting Notes</span>
              <p id="modal-notes" class="text-sm text-text-muted leading-relaxed italic"></p>
            </div>

            <!-- Full Description -->
            <div class="space-y-2">
              <span class="text-xs font-semibold text-accent-terracotta uppercase tracking-wider">About This Product</span>
              <p id="modal-description" class="text-sm text-text-muted leading-relaxed"></p>
            </div>
          </div>

          <!-- Price -->
          <div class="border-t border-cacao-dark/10 pt-6">
            <div class="flex justify-between items-center">
              <span class="text-xs font-semibold text-text-muted uppercase tracking-wider">Price</span>
              <span id="modal-price" class="font-serif-luxury text-2xl font-bold text-cacao-dark"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ════════════════════════════════════════════════
       COLLECTIONS PAGE JAVASCRIPT
       ════════════════════════════════════════════════ -->
  <script>
    // ── Filter Tabs ──
    function filterProducts(category, btn) {
      const cards = document.querySelectorAll('.product-card');
      const tabs  = document.querySelectorAll('.catalog-tab');
      const grid  = document.getElementById('product-grid');
      const empty = document.getElementById('no-results');
      let visibleCount = 0;

      // Update active tab styling
      tabs.forEach(t => {
        t.classList.remove('bg-cacao-dark', 'text-canvas', 'active');
        t.classList.add('bg-card-bg', 'text-cacao-dark');
      });
      btn.classList.remove('bg-card-bg', 'text-cacao-dark');
      btn.classList.add('bg-cacao-dark', 'text-canvas', 'active');

      // Filter cards with staggered animation
      cards.forEach(card => {
        const cardCat = card.getAttribute('data-category');
        if (category === 'all' || cardCat === category) {
          card.style.display = '';
          card.style.opacity = '0';
          card.style.transform = 'translateY(20px)';
          requestAnimationFrame(() => {
            setTimeout(() => {
              card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
              card.style.opacity = '1';
              card.style.transform = 'translateY(0)';
            }, visibleCount * 80);
          });
          visibleCount++;
        } else {
          card.style.display = 'none';
        }
      });

      // Show/hide empty state
      if (visibleCount === 0) {
        grid.classList.add('hidden');
        empty.classList.remove('hidden');
      } else {
        grid.classList.remove('hidden');
        empty.classList.add('hidden');
      }
    }

    // ── Product Detail Modal ──
    function openProductModal(el) {
      const modal   = document.getElementById('product-modal');
      const content = document.getElementById('modal-content');

      document.getElementById('modal-image').src              = el.dataset.image;
      document.getElementById('modal-image').alt              = el.dataset.title;
      document.getElementById('modal-title').textContent      = el.dataset.title;
      document.getElementById('modal-brand').textContent      = el.dataset.brand;
      document.getElementById('modal-cacao').textContent      = el.dataset.cacao;
      document.getElementById('modal-origin').textContent     = el.dataset.origin;
      document.getElementById('modal-notes').textContent      = el.dataset.notes;
      document.getElementById('modal-description').textContent= el.dataset.description;
      document.getElementById('modal-price').textContent      = 'GHC ' + el.dataset.price;
      var waBtn = document.getElementById('modal-wa-btn');
      if (waBtn) { waBtn.href = el.dataset.wa; }

      modal.classList.remove('opacity-0', 'pointer-events-none');
      modal.classList.add('opacity-100', 'pointer-events-auto');
      content.classList.remove('scale-95');
      content.classList.add('scale-100');
      document.body.style.overflow = 'hidden';
    }

    function closeProductModal() {
      const modal   = document.getElementById('product-modal');
      const content = document.getElementById('modal-content');

      modal.classList.add('opacity-0', 'pointer-events-none');
      modal.classList.remove('opacity-100', 'pointer-events-auto');
      content.classList.add('scale-95');
      content.classList.remove('scale-100');
      document.body.style.overflow = '';
    }
  </script>

  <!-- Elementor / WP Content Support Area -->
  <div class="elementor-content-container">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
  </div>

<?php
get_footer();
