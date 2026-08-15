# Everything Cacao GH — WordPress Theme Conversion & Architecture Guide

> **Purpose:** This guide provides step-by-step instructions for converting the static HTML theme into a modular, production-ready WordPress theme using standard PHP template hierarchy, Custom Post Types (`cacao_products`), ACF (Advanced Custom Fields), and form shortcode integrations (CF7 / WPForms).

---

## 1. Theme Header & `style.css`

Place `style.css` in the theme root folder:

```css
/*
Theme Name:    Everything Cacao GH
Theme URI:     https://everythingcacao.com
Author:        Everything Cacao GH
Author URI:    https://everythingcacao.com
Description:   Luxury Ghanaian bean-to-bar artisanal chocolate brand theme. Features Cherelle & Nahar sub-brand collections, WhatsApp direct ordering, Meta Pixel tracking, and concierge contact forms.
Version:       1.0.0
License:       GNU General Public License v2 or later
Text Domain:   everything-cacao
Tags:          luxury, chocolate, artisanal, ghana, custom-logo, custom-menu, featured-images, custom-post-type
*/
```

---

## 2. WordPress Template File Mapping

| Static HTML Source File                  | Target WordPress PHP Template       | WP Core Mechanism / Template Type            | Notes & Integration                                      |
|------------------------------------------|-------------------------------------|----------------------------------------------|----------------------------------------------------------|
| `components/header.html`                 | `header.php`                        | Global Theme Header                          | Calls `wp_head()` and outputs `wp_nav_menu()`            |
| `components/footer.html`                 | `footer.php`                        | Global Theme Footer                          | Calls `wp_footer()`, dynamic copyright & social links    |
| `templates/page-home.html`               | `front-page.php`                    | Front Page Template                          | Main homepage layout                                     |
| `templates/page-collections.html`        | `page-collections.php`              | Custom Page Template                         | Queries CPT `cacao_products` (no WooCommerce needed)     |
| `templates/page-craft.html`              | `page-craft.php`                    | Custom Page Template                         | `/* Template Name: Our Craft */`                         |
| `templates/page-journal.html`            | `home.php` / `index.php`            | WordPress Blog Index                         | Blog posts archive & featured post                       |
| `templates/page-concierge.html`          | `page-concierge.php`                | Custom Page Template                         | Compatible with Contact Form 7 / WPForms shortcodes      |
| `components/quick-form.html`             | `template-parts/quick-form.php`     | Template Part                                | Rendered via `get_template_part('template-parts/quick-form')` |
| `components/whatsapp-floating-btn.html`  | `template-parts/whatsapp-btn.php`   | Template Part                                | Included in `footer.php` before `</body>`               |

---

## 3. Meta Pixel & Analytics Integration Script

Embed the Meta Pixel Base Code into the `<head>` of your theme (in `header.php` right before `wp_head()`):

```html
<!-- Meta Pixel Base Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', 'YOUR_PIXEL_ID_HERE');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=YOUR_PIXEL_ID_HERE&ev=PageView&noscript=1"/></noscript>
```

---

## 4. `functions.php` Core Implementation

```php
<?php
/**
 * Everything Cacao GH - Theme Functions
 */

// 1. Theme Setup
function ec_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));

    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'everything-cacao'),
        'mobile'  => __('Mobile Drawer Menu', 'everything-cacao'),
        'footer'  => __('Footer Links', 'everything-cacao'),
    ));
}
add_action('after_setup_theme', 'ec_theme_setup');

// 2. Enqueue Assets
function ec_enqueue_scripts() {
    wp_enqueue_style('ec-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0.0');
    wp_enqueue_style('ec-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap', array(), null);

    wp_enqueue_script('ec-pixel', get_template_directory_uri() . '/assets/js/pixel-events.js', array(), '1.0.0', true);
    wp_enqueue_script('ec-app', get_template_directory_uri() . '/assets/js/app.js', array(), '1.0.0', true);
    wp_enqueue_script('ec-functions', get_template_directory_uri() . '/functions.js', array('ec-app'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'ec_enqueue_scripts');

// 3. Custom Post Type: cacao_products (No WooCommerce Required)
function ec_register_cacao_products_cpt() {
    register_post_type('cacao_products', array(
        'labels' => array(
            'name'          => 'Cacao Products',
            'singular_name' => 'Cacao Product',
            'add_new_item'  => 'Add New Confection',
            'edit_item'     => 'Edit Confection',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-store',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'      => array('slug' => 'confections'),
        'show_in_rest' => true,
    ));

    register_taxonomy('cacao_category', 'cacao_products', array(
        'labels' => array(
            'name'          => 'Confection Categories',
            'singular_name' => 'Category',
        ),
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => array('slug' => 'confection-category'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'ec_register_cacao_products_cpt');
```

---

## 5. ACF (Advanced Custom Fields) Configuration for `cacao_products`

Create a field group assigned to Post Type = `cacao_products`:

| Field Label       | Field Name       | Type     | Description / Choices                              |
|-------------------|------------------|----------|----------------------------------------------------|
| Sub-Brand Lineage | `sub_brand`      | Select   | `Cherelle`, `Nahar`, `Artisanal`                   |
| Price (GHS)       | `product_price`  | Number   | E.g. `420`                                         |
| Cacao Percentage  | `cacao_content`  | Text     | E.g. `72% Cacao`                                   |
| Harvest Origin    | `origin_region`  | Text     | E.g. `Sefwi Wiawso, Western Region`                |
| Tasting Notes     | `tasting_notes`  | Text     | E.g. `Deep cocoa intensity with fruity undertones` |
| Ingredients List  | `ingredients`    | Textarea | List of ingredients                                |
| Recommended Pair  | `pairings`       | Text     | Wine/Spirit pairing suggestions                    |

---

## 6. Template Conversion Code Snippets

### 6.1 `header.php` (converted from `components/header.html`)
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <!-- Meta Pixel Base Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo get_option('ec_pixel_id', 'YOUR_PIXEL_ID_HERE'); ?>');
    fbq('track', 'PageView');
  </script>
  
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-canvas text-cacao-dark antialiased flex flex-col min-h-screen'); ?>>
<?php wp_body_open(); ?>

<header class="glass-header border-b border-cacao-dark/10 sticky top-0 z-50 transition-all duration-300">
  <nav class="flex justify-between items-center max-w-7xl mx-auto px-6 md:px-12 py-5">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="font-serif-luxury text-2xl md:text-3xl font-bold tracking-tight text-cacao-dark flex items-center gap-2">
      <span class="w-3 h-3 bg-accent-gold rounded-full inline-block"></span>
      EVERYTHING CACAO <span class="text-xs font-sans tracking-widest text-text-muted font-normal">GH</span>
    </a>

    <div class="hidden md:flex items-center space-x-10 text-xs font-semibold uppercase tracking-widest">
      <?php
      wp_nav_menu(array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'flex items-center space-x-10',
          'fallback_cb'    => false,
      ));
      ?>
    </div>

    <div class="hidden md:flex items-center space-x-4">
      <a href="https://wa.me/233240000000?text=Hi!%20I'd%20like%20to%20order%20artisanal%20chocolate." target="_blank" rel="noopener noreferrer" class="btn-whatsapp rounded shadow-sm">
        Order via WhatsApp
      </a>
    </div>

    <button id="mobile-menu-btn" class="md:hidden text-cacao-dark p-2 focus:outline-none" aria-label="Open Navigation Menu">
      <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
  </nav>
</header>
```

### 6.2 `footer.php` (converted from `components/footer.html`)
```php
<footer class="bg-cacao-dark text-canvas border-t border-canvas/10 mt-auto py-16 px-6 md:px-12">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
    <div class="space-y-4">
      <span class="font-serif-luxury text-2xl font-bold block text-accent-gold"><?php bloginfo('name'); ?></span>
      <p class="text-xs text-canvas/70 leading-relaxed">Ghanaian Bean-to-Bar Artisanal Chocolate. Rooted in tradition, elevated by craft.</p>
      <p class="text-xs text-canvas/50">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
    </div>

    <div class="space-y-3 text-xs uppercase tracking-widest font-semibold">
      <span class="text-accent-gold block mb-2">Explore Pages</span>
      <?php
      wp_nav_menu(array(
          'theme_location' => 'footer',
          'container'      => false,
          'fallback_cb'    => false,
      ));
      ?>
    </div>

    <div class="space-y-3 text-xs">
      <span class="text-accent-gold uppercase tracking-widest font-semibold block mb-2">Contact & Showroom</span>
      <p class="text-canvas/80">Airport Residential Area, Accra, Ghana</p>
      <p class="text-canvas/80">Email: concierge@everythingcacao.com</p>
      <p class="text-canvas/80">WhatsApp: +233 24 000 0000</p>
      <div class="pt-2 flex gap-4 text-xs font-semibold text-accent-gold">
        <a href="https://instagram.com/everythingcacaogh" target="_blank" rel="noopener noreferrer" class="hover:underline">@everythingcacaogh</a>
      </div>
    </div>

    <div class="space-y-4">
      <span class="text-accent-gold text-xs uppercase tracking-widest font-semibold block">Join The Palette Club</span>
      <p class="text-xs text-canvas/70">Sign up for private tasting invitations and limited seasonal drops.</p>
      <form id="palette-club-form" onsubmit="return window.EC_Functions.handlePaletteClubSubmit(event, this);" class="space-y-2">
        <input type="email" name="email" required placeholder="Enter your email address..." class="w-full px-4 py-2.5 bg-canvas/10 border border-canvas/20 text-canvas text-xs rounded focus:outline-none focus:border-accent-gold placeholder-canvas/40" />
        <button type="submit" class="w-full py-2.5 bg-accent-gold text-cacao-dark font-semibold text-xs uppercase tracking-widest hover:bg-white transition-colors">
          Join Palette Club
        </button>
      </form>
    </div>
  </div>
</footer>

<?php get_template_part('template-parts/whatsapp-btn'); ?>
<?php wp_footer(); ?>
</body>
</html>
```

### 6.3 `page-collections.php` (Dynamic CPT Query)
```php
<?php
/* Template Name: Our Collections Catalog */
get_header();
?>

<section class="py-16 bg-cacao-dark text-canvas border-b border-canvas/10">
  <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
    <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Direct Inquiry Catalog</span>
    <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold"><?php the_title(); ?></h1>
    <p class="text-canvas/80 text-sm max-w-2xl mx-auto leading-relaxed">
      Discover single-origin dark chocolate bars, caramel milk creations, and handcrafted gift hampers. Order directly via WhatsApp.
    </p>
  </div>
</section>

<section class="py-16 max-w-7xl mx-auto px-6 md:px-12 flex-grow">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php
    $products = new WP_Query(array(
        'post_type'      => 'cacao_products',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ));

    if ($products->have_posts()) :
      while ($products->have_posts()) : $products->the_post();
        $sub_brand    = get_field('sub_brand') ?: 'Artisanal';
        $price        = get_field('product_price') ?: '0';
        $cacao        = get_field('cacao_content') ?: '100% Cacao';
        $origin       = get_field('origin_region') ?: 'Ghana';
        $notes        = get_field('tasting_notes') ?: get_the_excerpt();
        $thumb        = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://images.unsplash.com/photo-1541781774459-bb2af2f05b55?auto=format&fit=crop&w=800&q=80';
        $wa_text      = urlencode("Hi, I'd like to order " . get_the_title());
        ?>
        <div class="bg-card-bg rounded-lg overflow-hidden border border-cacao-dark/10 flex flex-col justify-between shadow-sm">
          <div>
            <div class="relative aspect-square overflow-hidden bg-canvas">
              <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" />
              <span class="absolute top-4 left-4 text-[10px] font-semibold uppercase tracking-wider bg-cacao-dark text-canvas px-3 py-1"><?php echo esc_html($cacao); ?></span>
              <span class="absolute top-4 right-4 text-[10px] font-semibold uppercase tracking-wider bg-white/90 text-cacao-dark px-3 py-1 rounded-full shadow-sm"><?php echo esc_html($sub_brand); ?></span>
            </div>
            <div class="p-6 space-y-3">
              <span class="text-[10px] font-semibold text-text-muted uppercase tracking-widest block"><?php echo esc_html($origin); ?></span>
              <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark"><?php the_title(); ?></h3>
              <p class="text-xs text-text-muted"><strong class="text-cacao-dark">Tasting Notes:</strong> <?php echo esc_html($notes); ?></p>
            </div>
          </div>

          <div class="p-6 pt-0 space-y-4">
            <div class="flex justify-between items-center border-t border-cacao-dark/10 pt-4">
              <span class="text-xs font-semibold text-text-muted">PRICE</span>
              <span class="font-serif-luxury text-lg font-bold text-cacao-dark">GHC <?php echo esc_html($price); ?></span>
            </div>

            <a href="https://wa.me/233240000000?text=<?php echo $wa_text; ?>" 
               target="_blank" 
               rel="noopener noreferrer"
               class="btn-whatsapp w-full rounded text-center block"
               onclick="fbq('track', 'Lead', {content_name: '<?php echo esc_js(get_the_title()); ?>'});">
               Order via WhatsApp
            </a>
          </div>
        </div>
      <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</section>

<?php get_footer(); ?>
```

### 6.4 `page-concierge.php` (Compatible with Contact Form 7 / WPForms Shortcodes)
```php
<?php
/* Template Name: Concierge & Stockists */
get_header();
?>

<section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
  <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
    <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Client Experience Desk</span>
    <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold"><?php the_title(); ?></h1>
    <p class="text-canvas/80 text-sm max-w-2xl mx-auto leading-relaxed">
      Whether you are seeking personal chocolate pairings, corporate gifting arrangements, stockist wholesale terms, or private showroom appointments in Accra.
    </p>
  </div>
</section>

<section class="py-24 max-w-7xl mx-auto px-6 md:px-12">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    <!-- Form Column -->
    <div class="lg:col-span-7 bg-card-bg p-8 md:p-12 rounded-lg border border-cacao-dark/10 shadow-sm space-y-6">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Direct Concierge Routing</span>
      <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">Concierge Message Form</h3>
      
      <?php
      // Replace with your WPForms or Contact Form 7 shortcode in WordPress admin
      if (get_field('form_shortcode')) {
          echo do_shortcode(get_field('form_shortcode'));
      } else {
          get_template_part('template-parts/quick-form');
      }
      ?>
    </div>

    <!-- Details Column -->
    <div class="lg:col-span-5 space-y-8">
      <div class="space-y-4">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Accra Atelier & Retail Partners</span>
        <h2 class="font-serif-luxury text-3xl font-bold text-cacao-dark">Where to Find Us</h2>
        <p class="text-xs text-text-muted leading-relaxed">
          Our flagship atelier in Accra is open for private tastings and catalog pickups.
        </p>
      </div>

      <div class="space-y-4 bg-card-bg p-8 rounded-lg border border-cacao-dark/10 shadow-sm text-sm">
        <p><strong>Showroom:</strong> Airport Residential Area, Accra, Ghana</p>
        <p><strong>Direct Line:</strong> +233 24 000 0000</p>
        <p><strong>Email:</strong> concierge@everythingcacao.com</p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
```
