<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

  <!-- Tailwind CSS Engine & Brand Configuration -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'canvas': '#FBF8F3',
            'card-bg': '#FFFFFF',
            'cacao-dark': '#2C1A11',
            'accent-gold': '#D4AF37',
            'accent-terracotta': '#C86D51',
            'accent-whatsapp': '#25D366',
            'cherelle-caramel': '#E08E45',
            'nahar-obsidian': '#18110D',
            'text-primary': '#2C1A11',
            'text-muted': '#7A685A',
          },
          fontFamily: {
            'serif-luxury': ['Playfair Display', 'serif'],
            'sans': ['Hanken Grotesk', 'sans-serif'],
          }
        }
      }
    }
  </script>

  <!-- Luxury Nav Menu Hover & Active Indicator Styles -->
  <style>
    .nav-link {
      position: relative;
      display: inline-flex;
      align-items: center;
      padding-bottom: 4px;
      transition: color 0.3s ease;
    }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background-color: #C86D51;
      transition: width 0.3s ease, left 0.3s ease;
    }
    .nav-link:hover::after {
      width: 100%;
      left: 0;
    }
    .nav-link:hover {
      color: #C86D51;
    }
    .nav-link.active-page {
      color: #C86D51 !important;
      font-weight: 700 !important;
    }
    .nav-link.active-page::after {
      width: 100% !important;
      left: 0 !important;
      background-color: #C86D51 !important;
    }

    /* WordPress Dynamic Menu Items */
    .menu-item a {
      position: relative;
      display: inline-block;
      padding-bottom: 4px;
      transition: color 0.3s ease;
    }
    .menu-item a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background-color: #C86D51;
      transition: width 0.3s ease, left 0.3s ease;
    }
    .menu-item a:hover::after {
      width: 100%;
      left: 0;
    }
    .menu-item a:hover {
      color: #C86D51;
    }
    .current-menu-item > a,
    .current-menu-ancestor > a,
    .current_page_item > a {
      color: #C86D51 !important;
      font-weight: 700 !important;
    }
    .current-menu-item > a::after,
    .current-menu-ancestor > a::after,
    .current_page_item > a::after {
      width: 100% !important;
      left: 0 !important;
      background-color: #C86D51 !important;
    }
  </style>

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
    fbq('init', '<?php echo esc_js(get_option('ec_pixel_id', 'YOUR_PIXEL_ID_HERE')); ?>');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo esc_attr(get_option('ec_pixel_id', 'YOUR_PIXEL_ID_HERE')); ?>&ev=PageView&noscript=1"/></noscript>

  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-canvas text-cacao-dark antialiased flex flex-col min-h-screen'); ?>>
<?php wp_body_open(); ?>

  <?php
  // Determine current active page for fallback menu links
  $request_uri = $_SERVER['REQUEST_URI'];
  $is_home       = is_front_page() || $request_uri === '/' || strpos($request_uri, 'home') !== false;
  $is_collections= is_page('collections') || is_page('our-collections') || strpos($request_uri, 'collections') !== false;
  $is_craft      = is_page('craft') || is_page('our-craft') || strpos($request_uri, 'craft') !== false;
  $is_journal    = (is_home() && !is_front_page()) || is_singular('post') || strpos($request_uri, 'journal') !== false;
  $is_concierge  = is_page('concierge') || is_page('stock-lists') || strpos($request_uri, 'stock') !== false || strpos($request_uri, 'concierge') !== false;

  // Smart URL resolver for header links (defined safely in functions.php)

  $link_home       = esc_url(home_url('/'));
  $link_collections= ec_get_smart_page_link(array('our-collections', 'collections'), '/our-collections');
  $link_craft      = ec_get_smart_page_link(array('our-craft', 'craft'), '/our-craft');
  $link_journal    = ec_get_smart_page_link(array('cacao-journal', 'journal'), '/cacao-journal');
  $link_concierge  = ec_get_smart_page_link(array('stock-lists', 'concierge', 'concierge-stockists'), '/stock-lists');
  ?>

  <!-- Header Navigation Component -->
  <header class="glass-header border-b border-cacao-dark/10 sticky top-0 z-50 transition-all duration-300">
    <nav class="flex justify-between items-center max-w-7xl mx-auto px-6 md:px-12 py-5">
      <!-- Brand Logo -->
      <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a href="<?php echo $link_home; ?>" class="flex items-center gap-3">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand/logo.png" alt="<?php bloginfo('name'); ?>" class="h-10 md:h-12 w-auto object-contain transition-transform duration-300 hover:scale-105" />
        </a>
      <?php endif; ?>

      <!-- Desktop Navigation Menu -->
      <div class="hidden md:flex items-center space-x-10 text-xs font-semibold uppercase tracking-widest">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex items-center space-x-10 text-xs font-semibold uppercase tracking-widest',
                'fallback_cb'    => false,
            ));
        } else {
            // Default fallback navigation links with active indicators
            ?>
            <a href="<?php echo $link_home; ?>" class="nav-link <?php echo $is_home && !$is_journal && !$is_collections && !$is_craft && !$is_concierge ? 'active-page' : ''; ?>">
              <?php if ($is_home && !$is_journal && !$is_collections && !$is_craft && !$is_concierge) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
              Home
            </a>
            <a href="<?php echo $link_collections; ?>" class="nav-link <?php echo $is_collections ? 'active-page' : ''; ?>">
              <?php if ($is_collections) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
              Our Collections
            </a>
            <a href="<?php echo $link_craft; ?>" class="nav-link <?php echo $is_craft ? 'active-page' : ''; ?>">
              <?php if ($is_craft) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
              Our Craft
            </a>
            <a href="<?php echo $link_journal; ?>" class="nav-link <?php echo $is_journal ? 'active-page' : ''; ?>">
              <?php if ($is_journal) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
              Cacao Journal
            </a>
            <a href="<?php echo $link_concierge; ?>" class="nav-link <?php echo $is_concierge ? 'active-page' : ''; ?>">
              <?php if ($is_concierge) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
              Concierge &amp; Stockists
            </a>
            <?php
        }
        ?>
      </div>

      <!-- Quick Action Buttons -->
      <div class="hidden md:flex items-center space-x-4">
        <a href="https://wa.me/<?php echo esc_attr(get_option('ec_whatsapp_number', '233240000000')); ?>?text=Hi!%20I'd%20like%20to%20order%20artisanal%20chocolate." target="_blank" rel="noopener noreferrer" class="btn-whatsapp rounded shadow-sm">
          Order via WhatsApp
        </a>
      </div>

      <!-- Mobile Hamburger Button -->
      <button id="mobile-menu-btn" class="md:hidden text-cacao-dark p-2 focus:outline-none" aria-label="Open Navigation Menu">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </nav>
  </header>

  <!-- Mobile Drawer Menu -->
  <div id="mobile-drawer" class="fixed inset-0 z-50 bg-cacao-dark text-canvas transform translate-x-full transition-transform duration-500 flex flex-col justify-between p-8 md:hidden">
    <div class="space-y-8">
      <div class="flex justify-between items-center border-b border-canvas/20 pb-4">
        <span class="font-serif-luxury text-xl font-bold">EVERYTHING CACAO GH</span>
        <button id="close-drawer-btn" class="text-canvas text-2xl">&times;</button>
      </div>
      <div class="flex flex-col space-y-6 text-sm uppercase tracking-widest font-medium">
        <?php
        if (has_nav_menu('mobile')) {
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'container'      => false,
                'menu_class'     => 'flex flex-col space-y-6 text-sm uppercase tracking-widest font-medium',
                'fallback_cb'    => false,
            ));
        } else {
            ?>
            <a href="<?php echo $link_home; ?>" class="<?php echo $is_home ? 'text-accent-gold font-bold' : ''; ?>">Home</a>
            <a href="<?php echo $link_collections; ?>" class="<?php echo $is_collections ? 'text-accent-gold font-bold' : ''; ?>">Our Collections</a>
            <a href="<?php echo $link_craft; ?>" class="<?php echo $is_craft ? 'text-accent-gold font-bold' : ''; ?>">Our Craft</a>
            <a href="<?php echo $link_journal; ?>" class="<?php echo $is_journal ? 'text-accent-gold font-bold' : ''; ?>">Cacao Journal</a>
            <a href="<?php echo $link_concierge; ?>" class="<?php echo $is_concierge ? 'text-accent-gold font-bold' : ''; ?>">Concierge &amp; Stockists</a>
            <?php
        }
        ?>
      </div>
    </div>
    <div class="space-y-4">
      <a href="https://wa.me/<?php echo esc_attr(get_option('ec_whatsapp_number', '233240000000')); ?>?text=Hi%20Everything%20Cacao%20GH!" target="_blank" rel="noopener noreferrer" class="w-full py-4 bg-accent-whatsapp text-white font-semibold uppercase tracking-widest text-center block rounded">
        WhatsApp Concierge
      </a>
    </div>
  </div>
