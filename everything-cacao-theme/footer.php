<?php
/**
 * Everything Cacao GH - Footer Template Component
 *
 * @package EverythingCacao
 */

// Call Smart Page Link Resolver (defined safely in functions.php)

$link_home       = esc_url(home_url('/'));
$link_collections= ec_get_smart_page_link(array('our-collections', 'collections'), '/our-collections');
$link_craft      = ec_get_smart_page_link(array('about-us', 'about', 'our-craft', 'craft'), '/about-us');
$link_gallery    = ec_get_smart_page_link(array('our-story', 'story', 'our-gallery', 'gallery', 'meet-the-team', 'our-team', 'team'), '/our-story');
$link_journal    = ec_get_smart_page_link(array('cacao-journal', 'journal'), '/cacao-journal');
$link_stockist   = ec_get_smart_page_link(array('stockist', 'stockists', 'stock-lists'), '/stockist');
$link_contact    = ec_get_smart_page_link(array('contact', 'concierge'), '/contact');
?>
  <!-- Footer Component -->
  <footer class="bg-cacao-dark text-canvas border-t border-canvas/10 mt-auto py-16 px-6 md:px-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
      <div class="space-y-4">
        <a href="<?php echo $link_home; ?>" class="inline-block group">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand/logo.png" alt="<?php bloginfo('name'); ?>" class="h-20 md:h-24 w-auto object-contain transition-transform duration-300 group-hover:scale-105" />
          <span class="font-brand-logo footer-logo-text brand-heading flex items-center mt-2 group-hover:text-accent-gold transition-colors">
            <svg viewBox="0 0 395 38" class="h-6 md:h-8 w-auto text-canvas group-hover:text-accent-gold fill-current transition-colors" aria-label="EVERYTHING CACAO">
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
        <p class="text-xs text-canvas/50">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
      </div>

      <div class="space-y-3 text-xs uppercase tracking-widest font-semibold">
        <span class="text-accent-gold block mb-2">Explore Pages</span>
        <?php
        if (has_nav_menu('footer')) {
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'space-y-2 text-xs uppercase tracking-widest font-semibold',
                'depth'          => 1,
                'fallback_cb'    => false,
            ));
        } else {
            ?>
            <a href="<?php echo $link_home; ?>" class="block hover:text-accent-gold transition-colors">Home</a>
            <a href="<?php echo $link_craft; ?>" class="block hover:text-accent-gold transition-colors">ABOUT US</a>
            <a href="<?php echo $link_gallery; ?>" class="block hover:text-accent-gold transition-colors">OUR STORY</a>
            <a href="<?php echo $link_journal; ?>" class="block hover:text-accent-gold transition-colors">Cacao Journal</a>
            <a href="<?php echo $link_collections; ?>" class="block hover:text-accent-gold transition-colors">Our Collections</a>
            <a href="<?php echo $link_stockist; ?>" class="block hover:text-accent-gold transition-colors">STOCKISTS</a>
            <a href="<?php echo $link_contact; ?>" class="block hover:text-accent-gold transition-colors">Contact</a>
            <?php
        }
        ?>
      </div>

      <div class="space-y-3.5 text-xs">
        <span class="text-accent-gold uppercase tracking-widest font-semibold block mb-2">Contact &amp; Showroom</span>
        <p class="text-canvas/80 flex items-start gap-2.5">
          <svg class="w-4 h-4 text-accent-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
          <span>Accra, Ghana</span>
        </p>
        <p class="text-canvas/80 flex items-center gap-2.5">
          <svg class="w-4 h-4 text-accent-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
          <span><strong class="font-semibold text-canvas/90">Email:</strong> <a href="mailto:<?php echo esc_attr(get_option('ec_concierge_email', 'info@everythingcacaogh.com')); ?>" class="hover:text-accent-gold transition-colors"><?php echo esc_html(get_option('ec_concierge_email', 'info@everythingcacaogh.com')); ?></a></span>
        </p>
        <p class="text-canvas/80 flex items-center gap-2.5">
          <svg class="w-4 h-4 text-accent-gold shrink-0" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
          </svg>
          <span><strong class="font-semibold text-canvas/90">WhatsApp/Call:</strong> <a href="https://wa.me/<?php echo esc_attr(get_option('ec_whatsapp_number', '233240661866')); ?>" target="_blank" rel="noopener noreferrer" class="hover:text-accent-gold transition-colors">+<?php echo esc_html(substr_replace(substr_replace(get_option('ec_whatsapp_number', '233240661866'), ' ', 3, 0), ' ', 7, 0)); ?></a></span>
        </p>
        <div class="pt-2 flex gap-4 text-xs font-semibold text-accent-gold">
          <a href="https://instagram.com/everythingcacaogh" target="_blank" rel="noopener noreferrer" class="hover:underline flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            Instagram (@everythingcacaogh)
          </a>
          <a href="https://facebook.com/everythingcacaogh" target="_blank" rel="noopener noreferrer" class="hover:underline flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.5 5H18V0h-3.808C10.592 0 9 1.583 9 4.615V8z"/></svg>
            Facebook
          </a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Persistent Floating WhatsApp Trigger Widget -->
  <?php get_template_part('template-parts/whatsapp-btn'); ?>

  <?php wp_footer(); ?>
</body>
</html>
