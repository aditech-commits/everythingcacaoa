<?php
/**
 * Search Results Template
 *
 * @package EverythingCacao
 */

get_header();

$search_query = get_search_query();
$wa_number    = get_option('ec_whatsapp_number', '233240661866');
?>

<section class="py-16 bg-cacao-dark text-canvas border-b border-canvas/10">
  <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
    <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Search Results</span>
    <h1 class="font-serif-luxury text-3xl md:text-5xl font-bold">
      Results for &ldquo;<?php echo esc_html($search_query); ?>&rdquo;
    </h1>
  </div>
</section>

<section class="py-16 max-w-7xl mx-auto px-6 md:px-12">
  <?php if (have_posts()) : ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php while (have_posts()) : the_post(); ?>
        <?php if (get_post_type() === 'cacao_products') : ?>
          <?php
          $sub_brand = ec_get_product_field('sub_brand') ?: 'Artisanal';
          $price     = ec_get_product_field('product_price') ?: '';
          $cacao     = ec_get_product_field('cacao_content') ?: '';
          $notes     = ec_get_product_field('tasting_notes') ?: get_the_excerpt();
          $thumb     = get_the_post_thumbnail_url(get_the_ID(), 'large');
          $wa_text   = urlencode("Hi, I'd like to order " . get_the_title());
          ?>
          <div class="bg-card-bg rounded-lg overflow-hidden border border-cacao-dark/10 flex flex-col justify-between shadow-sm">
            <div>
              <div class="relative aspect-square overflow-hidden bg-canvas">
                <?php if ($thumb) : ?>
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover" />
                <?php endif; ?>
                <?php if ($cacao) : ?>
                  <span class="absolute top-4 left-4 text-[10px] font-semibold uppercase tracking-wider bg-cacao-dark text-canvas px-3 py-1"><?php echo esc_html($cacao); ?></span>
                <?php endif; ?>
                <span class="absolute top-4 right-4 text-[10px] font-semibold uppercase tracking-wider bg-white/90 text-cacao-dark px-3 py-1 rounded-full shadow-sm"><?php echo esc_html($sub_brand); ?></span>
              </div>
              <div class="p-6 space-y-3">
                <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">
                  <a href="<?php the_permalink(); ?>" class="hover:text-accent-terracotta transition-colors"><?php the_title(); ?></a>
                </h3>
                <p class="text-xs text-text-muted"><?php echo esc_html($notes); ?></p>
              </div>
            </div>
            <div class="p-6 pt-0 space-y-4">
              <?php if ($price) : ?>
                <div class="flex justify-between items-center border-t border-cacao-dark/10 pt-4">
                  <span class="text-xs font-semibold text-text-muted">PRICE</span>
                  <span class="font-serif-luxury text-lg font-bold text-cacao-dark">GHC <?php echo esc_html($price); ?></span>
                </div>
              <?php endif; ?>
              <a href="https://wa.me/<?php echo esc_attr($wa_number); ?>?text=<?php echo $wa_text; ?>" target="_blank" rel="noopener noreferrer" class="btn-whatsapp w-full rounded text-center block">
                Order via WhatsApp
              </a>
            </div>
          </div>
        <?php else : ?>
          <div class="bg-card-bg p-6 rounded-lg border border-cacao-dark/10 space-y-4 flex flex-col justify-between shadow-sm">
            <div class="space-y-3">
              <span class="text-[10px] font-semibold uppercase tracking-widest text-accent-terracotta"><?php echo esc_html(get_post_type()); ?></span>
              <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">
                <a href="<?php the_permalink(); ?>" class="hover:text-accent-terracotta transition-colors"><?php the_title(); ?></a>
              </h3>
              <p class="text-xs text-text-muted leading-relaxed"><?php echo get_the_excerpt(); ?></p>
            </div>
            <a href="<?php the_permalink(); ?>" class="text-xs font-semibold uppercase tracking-widest text-cacao-dark hover:text-accent-terracotta transition-colors">
              Read More &rarr;
            </a>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <div class="text-center space-y-6 py-12">
      <p class="text-text-muted text-sm">No confections or articles matched your search.</p>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block px-8 py-3 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors">
        Return Home
      </a>
    </div>
  <?php endif; ?>
</section>

<?php
get_footer();
