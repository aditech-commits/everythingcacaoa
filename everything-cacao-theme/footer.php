<?php
/**
 * Everything Cacao GH - Footer Template Component
 *
 * @package EverythingCacao
 */

// Call Smart Page Link Resolver (defined safely in functions.php)

$link_home       = esc_url(home_url('/'));
$link_collections= ec_get_smart_page_link(array('our-collections', 'collections'), '/our-collections');
$link_craft      = ec_get_smart_page_link(array('our-craft', 'craft'), '/our-craft');
$link_journal    = ec_get_smart_page_link(array('cacao-journal', 'journal'), '/cacao-journal');
$link_concierge  = ec_get_smart_page_link(array('stockist', 'stockists', 'stock-lists', 'concierge', 'concierge-stockists'), '/stockist');
?>
  <!-- Footer Component -->
  <footer class="bg-cacao-dark text-canvas border-t border-canvas/10 mt-auto py-16 px-6 md:px-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
      <div class="space-y-4">
        <a href="<?php echo $link_home; ?>" class="inline-block">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand/logo.png" alt="<?php bloginfo('name'); ?>" class="h-12 md:h-14 w-auto object-contain transition-transform duration-300 hover:scale-105" />
        </a>
        <p class="text-xs text-canvas/70 leading-relaxed">Ghanaian Bean-to-Bar Artisanal Chocolate. Certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA).</p>
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
            <a href="<?php echo $link_collections; ?>" class="block hover:text-accent-gold transition-colors">Our Collections</a>
            <a href="<?php echo $link_craft; ?>" class="block hover:text-accent-gold transition-colors">Our Craft</a>
            <a href="<?php echo $link_journal; ?>" class="block hover:text-accent-gold transition-colors">Cacao Journal</a>
            <a href="<?php echo $link_concierge; ?>" class="block hover:text-accent-gold transition-colors">STOCKISTS</a>
            <a href="<?php echo $link_concierge; ?>#contact" class="block hover:text-accent-gold transition-colors">Contact</a>
            <?php
        }
        ?>
      </div>

      <div class="space-y-3 text-xs">
        <span class="text-accent-gold uppercase tracking-widest font-semibold block mb-2">Contact &amp; Showroom</span>
        <p class="text-canvas/80">Airport Residential Area, Accra, Ghana</p>
        <p class="text-canvas/80">Email: concierge@everythingcacao.com</p>
        <p class="text-canvas/80">WhatsApp: +233 24 066 1866</p>
        <div class="pt-2 flex gap-4 text-xs font-semibold text-accent-gold">
          <a href="https://instagram.com/everythingcacaogh" target="_blank" rel="noopener noreferrer" class="hover:underline">@everythingcacaogh</a>
        </div>
      </div>

      <!-- Join The Palette Club Newsletter Box -->
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

  <!-- Persistent Floating WhatsApp Trigger Widget -->
  <?php get_template_part('template-parts/whatsapp-btn'); ?>

  <?php wp_footer(); ?>
</body>
</html>
