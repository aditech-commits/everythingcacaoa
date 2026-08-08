<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <?php
  // Reach 360 Marketing Group - SEO Meta Titles & Descriptions
  $seo_title = 'Buy Ghanaian Chocolate Online | Everything Cacao GH';
  $seo_desc  = 'Shop Nahar and Cherelle — premium chocolate made from Ghana\'s finest cacao. Milk and dark bars available across Accra and Ghana. FDA and GSA certified.';

  if (is_front_page()) {
      $seo_title = 'Buy Ghanaian Chocolate Online | Everything Cacao GH';
      $seo_desc  = 'Shop Nahar and Cherelle — premium chocolate made from Ghana\'s finest cacao. Milk and dark bars available across Accra and Ghana. FDA and GSA certified.';
  } elseif (is_page(array('craft', 'our-craft', 'about', 'about-us'))) {
      $seo_title = 'About Everything Cacao GH | Ghana\'s Premium Chocolate Maker';
      $seo_desc  = 'Learn the story behind Everything Cacao GH — a proudly Ghanaian chocolate company committed to quality, sustainability and supporting local cacao farmers.';
  } elseif (is_page(array('collections', 'our-collections', 'shop'))) {
      $seo_title = 'Buy Chocolate Online in Ghana | Everything Cacao GH Shop';
      $seo_desc  = 'Shop Nahar and Cherelle chocolate bars online. Premium and everyday Ghanaian chocolate delivered across Accra and Ghana. Milk, dark and mini bars available.';
  } elseif (is_page(array('concierge', 'stock-lists', 'stockists', 'contact'))) {
      $seo_title = 'Contact Everything Cacao GH | Get in Touch';
      $seo_desc  = 'Get in touch with Everything Cacao GH for orders, wholesale enquiries or general questions. We\'d love to hear from you.';
  }
  ?>
  <title><?php echo esc_html($seo_title); ?></title>
  <meta name="description" content="<?php echo esc_attr($seo_desc); ?>"/>

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
  $is_craft      = is_page('craft') || is_page('our-craft') || is_page('about') || strpos($request_uri, 'craft') !== false;
  $is_journal    = (is_home() && !is_front_page()) || is_singular('post') || strpos($request_uri, 'journal') !== false;
  $is_concierge  = is_page('concierge') || is_page('stock-lists') || is_page('stockists') || strpos($request_uri, 'stock') !== false || strpos($request_uri, 'concierge') !== false;

  // Smart URL resolver for header links
  $link_home       = esc_url(home_url('/'));
  $link_collections= ec_get_smart_page_link(array('our-collections', 'collections'), '/our-collections');
  $link_craft      = ec_get_smart_page_link(array('our-craft', 'craft'), '/our-craft');
  $link_journal    = ec_get_smart_page_link(array('cacao-journal', 'journal'), '/cacao-journal');
  $link_concierge  = ec_get_smart_page_link(array('stock-lists', 'stockists', 'concierge'), '/stock-lists');
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

      <!-- Desktop Navigation Menu (Structure requested by Client) -->
      <div class="hidden md:flex items-center space-x-8 text-xs font-semibold uppercase tracking-widest">
        <!-- EXPERIENCE US Dropdown Menu -->
        <div class="relative group py-2">
          <button class="nav-link flex items-center gap-1.5 font-semibold uppercase tracking-widest text-xs <?php echo $is_craft ? 'active-page' : ''; ?>">
            <?php if ($is_craft) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1"></span><?php endif; ?>
            EXPERIENCE US
            <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180 text-accent-terracotta" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="absolute left-0 top-full hidden group-hover:flex flex-col bg-cacao-dark text-canvas min-w-[200px] py-3 rounded-lg shadow-2xl border border-canvas/15 transition-all z-50">
            <a href="<?php echo $link_craft; ?>#about" class="px-5 py-2.5 hover:bg-canvas/10 hover:text-accent-gold transition-colors text-xs font-medium uppercase tracking-wider block">ABOUT</a>
            <a href="<?php echo $link_craft; ?>#team" class="px-5 py-2.5 hover:bg-canvas/10 hover:text-accent-gold transition-colors text-xs font-medium uppercase tracking-wider block">MEET THE TEAM</a>
            <a href="<?php echo $link_craft; ?>" class="px-5 py-2.5 hover:bg-canvas/10 hover:text-accent-gold transition-colors text-xs font-medium uppercase tracking-wider block">OUR CRAFT</a>
          </div>
        </div>

        <!-- CACAO JOURNAL -->
        <a href="<?php echo $link_journal; ?>" class="nav-link <?php echo $is_journal ? 'active-page' : ''; ?>">
          <?php if ($is_journal) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          CACAO JOURNAL
        </a>

        <!-- OUR COLLECTIONS Dropdown Menu -->
        <div class="relative group py-2">
          <a href="<?php echo $link_collections; ?>" class="nav-link flex items-center gap-1.5 font-semibold uppercase tracking-widest text-xs <?php echo $is_collections ? 'active-page' : ''; ?>">
            <?php if ($is_collections) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1"></span><?php endif; ?>
            OUR COLLECTIONS
            <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180 text-accent-terracotta" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </a>
          <div class="absolute left-0 top-full hidden group-hover:flex flex-col bg-cacao-dark text-canvas min-w-[260px] py-3 rounded-lg shadow-2xl border border-canvas/15 transition-all z-50">
            <a href="<?php echo $link_collections; ?>?lineage=gifting" class="px-5 py-2.5 hover:bg-canvas/10 hover:text-accent-gold transition-colors text-xs font-medium uppercase tracking-wider block">CORPORATE &amp; CUSTOM GIFTING</a>
          </div>
        </div>

        <!-- STOCKISTS (Replaced Stocklists) -->
        <a href="<?php echo $link_concierge; ?>" class="nav-link <?php echo $is_concierge ? 'active-page' : ''; ?>">
          <?php if ($is_concierge) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          STOCKISTS
        </a>

        <!-- CONTACT -->
        <a href="<?php echo $link_concierge; ?>#contact" class="nav-link">
          CONTACT
        </a>
      </div>


      <!-- Mobile Hamburger Button -->

      <button id="mobile-menu-btn" class="md:hidden text-cacao-dark p-2 focus:outline-none" aria-label="Open Navigation Menu">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </nav>
  </header>

  <!-- Mobile Drawer Menu -->
  <div id="mobile-drawer" class="fixed inset-0 z-50 bg-cacao-dark text-canvas transform translate-x-full transition-transform duration-500 flex flex-col justify-between p-8 md:hidden overflow-y-auto">
    <div class="space-y-8">
      <div class="flex justify-between items-center border-b border-canvas/20 pb-4">
        <span class="font-serif-luxury text-xl font-bold text-accent-gold">EVERYTHING CACAO GH</span>
        <button id="close-drawer-btn" class="text-canvas text-3xl font-light">&times;</button>
      </div>
      <div class="flex flex-col space-y-6 text-xs uppercase tracking-widest font-semibold">
        <!-- EXPERIENCE US Dropdown / Links for Mobile -->
        <div class="space-y-3 border-b border-canvas/10 pb-4">
          <span class="text-accent-gold text-[10px] tracking-widest font-bold uppercase block">EXPERIENCE US</span>
          <a href="<?php echo $link_craft; ?>#about" class="block text-canvas/80 hover:text-accent-gold pl-2">About</a>
          <a href="<?php echo $link_craft; ?>#team" class="block text-canvas/80 hover:text-accent-gold pl-2">Meet the Team</a>
          <a href="<?php echo $link_craft; ?>" class="block text-canvas/80 hover:text-accent-gold pl-2">Our Craft</a>
        </div>

        <a href="<?php echo $link_journal; ?>" class="block text-canvas hover:text-accent-gold">CACAO JOURNAL</a>

        <!-- OUR COLLECTIONS Mobile -->
        <div class="space-y-3 border-b border-canvas/10 pb-4">
          <a href="<?php echo $link_collections; ?>" class="text-accent-gold text-[10px] tracking-widest font-bold uppercase block">OUR COLLECTIONS</a>
          <a href="<?php echo $link_collections; ?>?lineage=gifting" class="block text-canvas/80 hover:text-accent-gold pl-2">Corporate &amp; Custom Gifting</a>
        </div>

        <a href="<?php echo $link_concierge; ?>" class="block text-canvas hover:text-accent-gold">STOCKISTS</a>
        <a href="<?php echo $link_concierge; ?>#contact" class="block text-canvas hover:text-accent-gold">CONTACT</a>
      </div>

      <div class="space-y-4 pt-6">
        <a href="https://wa.me/<?php echo esc_attr(get_option('ec_whatsapp_number', '233240000000')); ?>?text=Hi%20Everything%20Cacao%20GH!" target="_blank" rel="noopener noreferrer" class="w-full py-4 bg-accent-whatsapp text-white font-semibold uppercase tracking-widest text-center block rounded">
          WhatsApp Concierge
        </a>
      </div>
    </div>
  </div>

  <!-- ✅ Mobile Drawer Toggle — Inline so it always works regardless of plugin/JS load order -->
  <script>
  (function() {
    function ecInitMobileMenu() {
      var btn    = document.getElementById('mobile-menu-btn');
      var drawer = document.getElementById('mobile-drawer');
      var close  = document.getElementById('close-drawer-btn');

      if (btn && drawer) {
        btn.addEventListener('click', function(e) {
          e.stopPropagation();
          drawer.classList.remove('translate-x-full');
          drawer.classList.add('translate-x-0');
          document.body.style.overflow = 'hidden';
        });
      }
      if (close && drawer) {
        close.addEventListener('click', function() {
          drawer.classList.add('translate-x-full');
          drawer.classList.remove('translate-x-0');
          document.body.style.overflow = '';
        });
      }
      // Close drawer when clicking backdrop (any link inside)
      if (drawer) {
        drawer.addEventListener('click', function(e) {
          if (e.target.tagName === 'A') {
            drawer.classList.add('translate-x-full');
            drawer.classList.remove('translate-x-0');
            document.body.style.overflow = '';
          }
        });
      }
      // Close on Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && drawer) {
          drawer.classList.add('translate-x-full');
          drawer.classList.remove('translate-x-0');
          document.body.style.overflow = '';
        }
      });
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', ecInitMobileMenu);
    } else {
      ecInitMobileMenu();
    }
  })();
  </script>

