<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Google Fonts & Butler Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,600;0,9..144,700;0,9..144,800;1,9..144,600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap"/>
  <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/butler"/>

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
            'brand-logo': ['Butler', 'Fraunces', 'Playfair Display', 'serif'],
            'butler': ['Butler', 'serif'],
          }
        }
      }
    }
  </script>

  <!-- Luxury Nav Menu Hover & Active Indicator Styles -->
  <style>
    .font-brand-logo,
    header,
    header *,
    footer,
    footer *,
    #mobile-drawer,
    #mobile-drawer * {
      font-family: 'Butler', 'Playfair Display', serif !important;
    }
    .font-brand-logo {
      letter-spacing: 0.04em;
    }
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
  $request_uri = sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI']));
  $is_home       = is_front_page() || $request_uri === '/' || strpos($request_uri, 'home') !== false;
  $is_collections= is_page('collections') || is_page('our-collections') || strpos($request_uri, 'collections') !== false;
  $is_craft      = is_page('craft') || is_page('our-craft') || is_page('about') || strpos($request_uri, 'craft') !== false;
  $is_journal    = (is_home() && !is_front_page()) || is_singular('post') || strpos($request_uri, 'journal') !== false;
  $is_stockist   = is_page('stockist') || is_page('stockists') || is_page('stock-lists') || strpos($request_uri, 'stock') !== false;
  $is_contact    = is_page('contact') || is_page('concierge') || strpos($request_uri, 'contact') !== false || strpos($request_uri, 'concierge') !== false;

  // Smart URL resolver for header links
  $link_home       = esc_url(home_url('/'));
  $link_collections= ec_get_smart_page_link(array('our-collections', 'collections'), '/our-collections');
  $link_craft      = ec_get_smart_page_link(array('about-us', 'about', 'our-craft', 'craft'), '/about-us');
  $link_team       = ec_get_smart_page_link(array('meet-the-team', 'our-team', 'team'), '/meet-the-team');
  $link_journal    = ec_get_smart_page_link(array('cacao-journal', 'journal'), '/cacao-journal');
  $link_stockist   = ec_get_smart_page_link(array('stockist', 'stockists', 'stock-lists'), '/stockist');
  $link_contact    = ec_get_smart_page_link(array('contact', 'concierge'), '/contact');
  ?>

  <!-- Header Navigation Component -->
  <header class="glass-header border-b border-cacao-dark/10 sticky top-0 z-50 transition-all duration-300">
    <nav class="flex items-center justify-between max-w-7xl mx-auto px-6 md:px-12 py-5">
      <!-- Brand Logo & Name -->
      <div class="flex items-center shrink-0">
        <a href="<?php echo $link_home; ?>" class="flex items-center gap-3 group">
          <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
          <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand/logo.png" alt="<?php bloginfo('name'); ?>" class="h-10 md:h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105" />
          <?php endif; ?>
          <span class="font-brand-logo logo-text site-title flex items-center group-hover:text-accent-terracotta transition-colors">
            <svg viewBox="0 0 395 38" class="h-6 md:h-8 w-auto text-cacao-dark group-hover:text-accent-terracotta fill-current transition-colors" aria-label="EVERYTHING CACAO">
              <g fill="currentColor">
                <!-- E -->
                <path d="M8 8h17v3.5H12.5v7H23v3.5h-10.5v8H25.5V33.5H8V8z"/>
                <!-- V -->
                <path d="M27.5 8h4.2l6.8 19.2L45.3 8h4.2l-9.3 25.5h-3.4L27.5 8z"/>
                <!-- E -->
                <path d="M51 8h17v3.5H55.5v7H66v3.5h-10.5v8H69.5V33.5H51V8z"/>
                <!-- R with sweeping swash tail under Y -->
                <path d="M71.5 8h12c5.2 0 8.8 2.8 8.8 7.2 0 3.8-2.6 6.1-6.2 6.9 2.5 0.8 4.2 2.2 4.2 4.5 0 2.8-2.1 4.5-5.5 4.5h-2.1c2.8 0 4.2-1.2 4.2-3.1 0-2.2-2.1-3.6-6.2-3.6h-4.7v9.1H71.5V8zm4.5 3.5v8.5h7c3 0 5-1.5 5-4.25s-2-4.25-5-4.25h-7z"/>
                <path d="M85.5 22.8c6.2 0 11.5 2.8 17.2 4.8 5.8 2 11.8 3.4 18.3 3.4 4.5 0 8.5-.8 11.5-2.2v2.1c-3.2 1.6-7.5 2.5-12.2 2.5-7 0-13.2-1.5-19.2-3.6-5.2-1.8-10.2-4.2-15.6-4.2-2.5 0-4.5.6-6.2 1.5v-2.8c2-1 4.2-1.5 6.2-1.5z"/>
                <!-- Y -->
                <path d="M97 8h4.5l7 11.5L115.5 8h4.5l-9.5 14.8v10.7H106.5V22.8L97 8z"/>
                <!-- T -->
                <path d="M120 8h20v3.5h-8v22H127.5v-22H120V8z"/>
                <!-- H -->
                <path d="M142 8h4.5v11h12V8h4.5v25.5h-4.5V22.5h-12v11H142V8z"/>
                <!-- I -->
                <path d="M165 8h4.5v25.5H165V8z"/>
                <!-- N -->
                <path d="M172.5 8h4.2l13.8 19.5V8h4.2v25.5h-3.8L176.7 13.5v20H172.5V8z"/>
                <!-- G -->
                <path d="M200 20.8c0-7.8 5.8-13.3 14-13.3 5.5 0 9.8 2.4 12.2 6.5l-3.2 2.1c-1.8-3.2-5.2-5.1-9-5.1-6 0-10 4.2-10 9.8s4 9.8 10 9.8c3.8 0 7.2-2 9.2-5.2h-7.5v-3.5h11.8v11.2c-3.2 4.2-8.2 6.5-13.5 6.5-8.2 0-14-5.5-14-13.3z"/>
                <!-- C -->
                <path d="M242 20.8c0-7.8 5.8-13.3 14-13.3 6.2 0 10.8 3.5 12.5 8.8l-3.5 1.5c-1.4-4.2-5.1-6.8-9-6.8-6 0-10 4.2-10 9.8s4 9.8 10 9.8c4 0 7.8-2.8 9.2-7l3.5 1.4c-1.8 5.5-6.5 9.1-12.7 9.1-8.2 0-14-5.5-14-13.3z"/>
                <!-- A -->
                <path d="M275 8h3.8l9.8 25.5h-4.2l-2.6-7h-9.8l-2.6 7h-4.2L275 8zm4.2 15l-3.3-8.8-3.3 8.8h6.6z"/>
                <!-- C -->
                <path d="M291 20.8c0-7.8 5.8-13.3 14-13.3 6.2 0 10.8 3.5 12.5 8.8l-3.5 1.5c-1.4-4.2-5.1-6.8-9-6.8-6 0-10 4.2-10 9.8s4 9.8 10 9.8c4 0 7.8-2.8 9.2-7l3.5 1.4c-1.8 5.5-6.5 9.1-12.7 9.1-8.2 0-14-5.5-14-13.3z"/>
                <!-- A -->
                <path d="M324 8h3.8l9.8 25.5h-4.2l-2.6-7h-9.8l-2.6 7h-4.2L324 8zm4.2 15l-3.3-8.8-3.3 8.8h6.6z"/>
                <!-- O with Leaf Counter Motif -->
                <path d="M340 20.8c0-7.8 6.2-13.3 14.5-13.3S369 13 369 20.8s-6.2 13.3-14.5 13.3S340 28.6 340 20.8zm24.5 0c0-6-3.8-9.8-10-9.8s-10 3.8-10 9.8 3.8 9.8 10 9.8 10-3.8 10-9.8z"/>
                <!-- Leaf inside O counter -->
                <path d="M354.5 15.5c2.5 2 3.8 5.2 2.8 8.5-1 3.2-3.8 5.5-7 5.8 2.2-2.2 3.2-5.2 2.5-8.2-.8-3-3.2-5.2-6-5.8 2.8-.5 5.8 0 7.7-0.3z"/>
                <path d="M347.2 25.2c2.2-2.5 4.5-5.2 6.8-7.8" stroke="currentColor" stroke-width="0.8" fill="none"/>
              </g>
            </svg>
          </span>
        </a>
      </div>

      <!-- Desktop Navigation Menu -->
      <div class="hidden md:flex items-center gap-8 text-xs uppercase tracking-widest font-semibold text-cacao-dark">
        <!-- ABOUT US -->
        <a href="<?php echo $link_craft; ?>" class="nav-link <?php echo ($is_craft || is_page('meet-the-team')) ? 'active-page' : ''; ?>">
          <?php if ($is_craft || is_page('meet-the-team')) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          ABOUT US
        </a>

        <!-- CACAO JOURNAL -->
        <a href="<?php echo $link_journal; ?>" class="nav-link <?php echo $is_journal ? 'active-page' : ''; ?>">
          <?php if ($is_journal) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          CACAO JOURNAL
        </a>

        <!-- OUR COLLECTIONS -->
        <a href="<?php echo $link_collections; ?>" class="nav-link <?php echo $is_collections ? 'active-page' : ''; ?>">
          <?php if ($is_collections) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          OUR COLLECTIONS
        </a>

        <!-- STOCKISTS -->
        <a href="<?php echo $link_stockist; ?>" class="nav-link <?php echo $is_stockist ? 'active-page' : ''; ?>">
          <?php if ($is_stockist) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          STOCKISTS
        </a>

        <!-- CONTACT -->
        <a href="<?php echo $link_contact; ?>" class="nav-link <?php echo $is_contact ? 'active-page' : ''; ?>">
          <?php if ($is_contact) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          CONTACT
        </a>
      </div>

      <!-- Mobile Hamburger Button -->
      <button id="mobile-menu-btn" class="md:hidden text-cacao-dark p-2 focus:outline-none shrink-0" aria-label="Open Navigation Menu">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </nav>
  </header>

  <!-- Mobile Drawer Overlay Menu -->
  <div id="mobile-drawer" class="fixed inset-0 bg-cacao-dark text-canvas z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto">
    <div class="p-6 space-y-6">
      <div class="flex justify-between items-center border-b border-canvas/20 pb-4">
        <span class="font-brand-logo text-xl font-bold text-accent-gold">EVERYTHING CACAO GH</span>
        <button id="close-drawer-btn" class="text-canvas text-3xl font-light">&times;</button>
      </div>
      <div class="flex flex-col space-y-4 text-xs uppercase tracking-widest font-semibold">
        <!-- 1. ABOUT US -->
        <div class="border-b border-canvas/10 pb-3">
          <a href="<?php echo $link_craft; ?>" class="block text-canvas hover:text-accent-gold py-1 font-bold tracking-wider">ABOUT US</a>
        </div>

        <!-- 2. CACAO JOURNAL -->
        <div class="border-b border-canvas/10 pb-3">
          <a href="<?php echo $link_journal; ?>" class="block text-canvas hover:text-accent-gold py-1 font-bold tracking-wider">CACAO JOURNAL</a>
        </div>

        <!-- 3. OUR COLLECTIONS -->
        <div class="border-b border-canvas/10 pb-3">
          <a href="<?php echo $link_collections; ?>" class="block text-canvas hover:text-accent-gold py-1 font-bold tracking-wider">OUR COLLECTIONS</a>
        </div>

        <!-- 4. STOCKISTS -->
        <div class="border-b border-canvas/10 pb-3">
          <a href="<?php echo $link_stockist; ?>" class="block text-canvas hover:text-accent-gold py-1 font-bold tracking-wider">STOCKISTS</a>
        </div>

        <!-- 5. CONTACT -->
        <div class="border-b border-canvas/10 pb-3">
          <a href="<?php echo $link_contact; ?>" class="block text-canvas hover:text-accent-gold py-1 font-bold tracking-wider">CONTACT</a>
        </div>
      </div>

      <div class="space-y-4 pt-6">
        <a href="https://wa.me/<?php echo esc_attr(get_option('ec_whatsapp_number', '233240661866')); ?>?text=Hi%20Everything%20Cacao%20GH!" target="_blank" rel="noopener noreferrer" class="w-full py-4 bg-accent-whatsapp text-white font-semibold uppercase tracking-widest text-center block rounded">
          WhatsApp Support
        </a>
      </div>
    </div>
  </div>

  <!-- ✅ Mobile Drawer Toggle & Accordion Dropdowns — Inline script for zero dependency -->
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

      // Mobile sub-menu accordion toggle
      if (drawer) {
        var dropdownBtns = drawer.querySelectorAll('.mobile-dropdown-btn');
        dropdownBtns.forEach(function(dBtn) {
          dBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            var targetId = dBtn.getAttribute('data-target');
            var targetEl = document.getElementById(targetId);
            var chevron = dBtn.querySelector('.icon-chevron');

            if (targetEl) {
              targetEl.classList.toggle('hidden');
              if (chevron) {
                chevron.classList.toggle('rotate-180');
              }
            }
          });
        });

        // Close drawer when clicking any link inside
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

