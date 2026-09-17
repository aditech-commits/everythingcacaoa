<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,600;0,9..144,700;0,9..144,800;1,9..144,600&family=Leckerli+One&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap"/>

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
            'brand-logo': ['Leckerli One', 'cursive', 'serif'],
            'leckerli': ['Leckerli One', 'cursive'],
          }
        }
      }
    }
  </script>

  <?php
  $ec_pixel_id = get_option('ec_pixel_id', '');
  if (!empty($ec_pixel_id) && is_numeric($ec_pixel_id)) :
  ?>
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
    fbq('init', '<?php echo esc_js($ec_pixel_id); ?>');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo esc_attr($ec_pixel_id); ?>&ev=PageView&noscript=1"/></noscript>
  <?php endif; ?>

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
    <nav class="flex items-center justify-between max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-3 md:py-4 w-full">
      <!-- Brand Logo & Name -->
      <div class="flex items-center shrink-0 pr-2 md:pr-4">
        <a href="<?php echo $link_home; ?>" class="flex items-center group shrink-0">
          <?php
          // Check Customizer option first, then fall back to the uploaded media library URL
          $ec_logo_url = get_option('ec_header_logo_url', '');
          if ( empty($ec_logo_url) ) {
            $ec_logo_url = 'https://everythingcacaogh.com/wp-content/uploads/2026/09/everything_cacao_header_logo.png';
          }
          $ec_logo_h = get_option('ec_header_logo_height', '50');
          $ec_logo_h_val = !empty($ec_logo_h) ? intval($ec_logo_h) : 50;
          $ec_logo_mobile_val = min($ec_logo_h_val, 42);

          $ec_menu_size = get_option('ec_header_menu_font_size', '13');
          $ec_menu_size_val = !empty($ec_menu_size) ? intval($ec_menu_size) : 13;
          ?>
          <img src="<?php echo esc_url($ec_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" style="--logo-h-desktop: <?php echo $ec_logo_h_val; ?>px; --logo-h-mobile: <?php echo $ec_logo_mobile_val; ?>px;" class="site-header-logo shrink-0 transition-transform duration-300 group-hover:scale-105" />
        </a>
      </div>

      <!-- Desktop Navigation Menu -->
      <div class="hidden md:flex items-center gap-4 lg:gap-7 xl:gap-8 uppercase tracking-widest font-bold text-cacao-dark shrink-0" style="font-size: <?php echo $ec_menu_size_val; ?>px;">
        <!-- ABOUT US -->
        <a href="<?php echo $link_craft; ?>" class="nav-link whitespace-nowrap <?php echo ($is_craft || is_page('meet-the-team')) ? 'active-page' : ''; ?>">
          <?php if ($is_craft || is_page('meet-the-team')) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          ABOUT US
        </a>

        <!-- CACAO JOURNAL -->
        <a href="<?php echo $link_journal; ?>" class="nav-link whitespace-nowrap <?php echo $is_journal ? 'active-page' : ''; ?>">
          <?php if ($is_journal) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          CACAO JOURNAL
        </a>

        <!-- OUR COLLECTIONS -->
        <a href="<?php echo $link_collections; ?>" class="nav-link whitespace-nowrap <?php echo $is_collections ? 'active-page' : ''; ?>">
          <?php if ($is_collections) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          OUR COLLECTIONS
        </a>

        <!-- STOCKISTS -->
        <a href="<?php echo $link_stockist; ?>" class="nav-link whitespace-nowrap <?php echo $is_stockist ? 'active-page' : ''; ?>">
          <?php if ($is_stockist) : ?><span class="w-1.5 h-1.5 bg-accent-gold rounded-full inline-block mr-1.5"></span><?php endif; ?>
          STOCKISTS
        </a>

        <!-- CONTACT -->
        <a href="<?php echo $link_contact; ?>" class="nav-link whitespace-nowrap <?php echo $is_contact ? 'active-page' : ''; ?>">
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
      <div class="flex flex-col space-y-4 text-sm uppercase tracking-widest font-bold">
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

