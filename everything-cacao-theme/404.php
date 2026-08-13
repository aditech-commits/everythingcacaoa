<?php
/**
 * 404 Error Page Template
 *
 * @package EverythingCacao
 */

get_header();

$link_home        = esc_url(home_url('/'));
$link_collections = ec_get_smart_page_link(array('our-collections', 'collections'), '/our-collections');
$link_contact     = ec_get_smart_page_link(array('contact', 'concierge'), '/contact');
?>

  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Page Not Found</span>
      <h1 class="font-serif-luxury text-5xl md:text-7xl font-bold">404</h1>
      <p class="text-canvas/80 text-sm max-w-lg mx-auto leading-relaxed">
        The page you're looking for seems to have wandered off into the cacao groves. Let's get you back on track.
      </p>
    </div>
  </section>

  <section class="py-24 max-w-3xl mx-auto px-6 md:px-12 text-center space-y-10">
    <div class="space-y-4">
      <h2 class="font-serif-luxury text-2xl font-bold text-cacao-dark">Where would you like to go?</h2>
      <p class="text-sm text-text-muted leading-relaxed">
        Browse our collections of artisanal Ghanaian chocolate, learn about our craft, or get in touch with our concierge team.
      </p>
    </div>

    <div class="flex flex-wrap justify-center gap-4">
      <a href="<?php echo $link_home; ?>" class="px-8 py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-all duration-300 shadow-xl">
        Return Home
      </a>
      <a href="<?php echo $link_collections; ?>" class="px-8 py-4 border border-cacao-dark text-cacao-dark font-semibold text-xs uppercase tracking-widest hover:bg-cacao-dark hover:text-canvas transition-all duration-300">
        Browse Collections
      </a>
      <a href="<?php echo $link_contact; ?>" class="px-8 py-4 border border-accent-terracotta text-accent-terracotta font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta hover:text-canvas transition-all duration-300">
        Contact Us
      </a>
    </div>
  </section>

<?php
get_footer();
