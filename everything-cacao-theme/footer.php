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
$link_journal    = ec_get_smart_page_link(array('cacao-journal', 'journal'), '/cacao-journal');
$link_stockist   = ec_get_smart_page_link(array('stockist', 'stockists', 'stock-lists'), '/stockist');
$link_contact    = ec_get_smart_page_link(array('contact', 'concierge'), '/contact');
?>
  <!-- Footer Component -->
  <footer class="bg-cacao-dark text-canvas border-t border-canvas/10 mt-auto py-16 px-6 md:px-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
      <div class="space-y-4">
        <a href="<?php echo $link_home; ?>" class="inline-block">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand/logo.png" alt="<?php bloginfo('name'); ?>" class="h-20 md:h-28 w-auto object-contain transition-transform duration-300 hover:scale-105" />
        </a>
        <div class="flex items-center gap-2 pt-1 text-[11px] text-accent-gold font-semibold">
          <span>✓ FDA Certified</span>
          <span>•</span>
          <span>✓ GSA Certified</span>
        </div>
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
                'fallback_cb'    => false,
            ));
        } elseif (has_nav_menu('primary')) {
            // Mirror Primary Header Menu if footer menu is not separately assigned
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'space-y-2 text-xs uppercase tracking-widest font-semibold',
                'fallback_cb'    => false,
            ));
        } else {
            ?>
            <a href="<?php echo $link_home; ?>" class="block hover:text-accent-gold transition-colors">Home</a>
            <a href="<?php echo $link_craft; ?>" class="block hover:text-accent-gold transition-colors">ABOUT US</a>
            <a href="<?php echo $link_collections; ?>" class="block hover:text-accent-gold transition-colors">Our Collections</a>
            <a href="<?php echo $link_journal; ?>" class="block hover:text-accent-gold transition-colors">Cacao Journal</a>
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
          <span>Airport Residential Area, Accra, Ghana</span>
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
