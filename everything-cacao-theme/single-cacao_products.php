<?php
/**
 * Single Product Detail Template for cacao_products CPT
 *
 * @package EverythingCacao
 */

get_header();

if (have_posts()) : while (have_posts()) : the_post();

$sub_brand   = ec_get_product_field('sub_brand') ?: 'Artisanal';
$price       = ec_get_product_field('product_price') ?: '';
$cacao       = ec_get_product_field('cacao_content') ?: '';
$origin      = ec_get_product_field('origin_region') ?: 'Ghana';
$notes       = ec_get_product_field('tasting_notes') ?: '';
$description = ec_get_product_field('product_description') ?: get_the_content();
$wa_number   = get_option('ec_whatsapp_number', '233240661866');
$wa_text     = urlencode("Hi, I'd like to order " . get_the_title());
$thumb       = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png';

$link_collections = ec_get_smart_page_link(array('our-collections', 'collections'), '/our-collections');
?>

  <!-- Product Hero Banner -->
  <section class="py-16 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-3">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold"><?php echo esc_html($sub_brand); ?> Collection</span>
      <h1 class="font-serif-luxury text-3xl md:text-5xl font-bold"><?php the_title(); ?></h1>
      <?php if ($cacao) : ?>
        <span class="inline-block text-[11px] font-semibold uppercase tracking-wider bg-canvas/10 text-canvas px-4 py-1.5 rounded-full"><?php echo esc_html($cacao); ?></span>
      <?php endif; ?>
    </div>
  </section>

  <!-- Product Detail Content -->
  <section class="py-16 max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

      <!-- Product Image -->
      <div class="ec-animate">
        <?php if ($thumb) : ?>
          <div class="aspect-square rounded-xl overflow-hidden border border-cacao-dark/10 shadow-xl bg-card-bg">
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover" />
          </div>
        <?php elseif (has_post_thumbnail()) : ?>
          <div class="aspect-square rounded-xl overflow-hidden border border-cacao-dark/10 shadow-xl bg-card-bg">
            <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Product Details -->
      <div class="space-y-8 ec-animate">
        <!-- Origin & Badge -->
        <div class="space-y-2">
          <span class="text-[11px] font-semibold text-text-muted uppercase tracking-widest block"><?php echo esc_html($origin); ?></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark"><?php the_title(); ?></h2>
        </div>

        <!-- Tasting Notes -->
        <?php if ($notes) : ?>
          <div class="bg-card-bg p-6 rounded-lg border border-cacao-dark/10 space-y-2">
            <span class="text-[10px] font-semibold uppercase tracking-widest text-accent-terracotta block">Tasting Notes</span>
            <p class="text-sm text-cacao-dark font-medium"><?php echo esc_html($notes); ?></p>
          </div>
        <?php endif; ?>

        <!-- Description -->
        <div class="text-sm text-text-muted leading-relaxed space-y-4">
          <?php echo wp_kses_post(wpautop($description)); ?>
        </div>

        <!-- Price & Order -->
        <?php if ($price) : ?>
          <div class="flex items-center justify-between border-t border-b border-cacao-dark/10 py-5">
            <div>
              <span class="text-xs font-semibold text-text-muted uppercase tracking-widest block">Price</span>
              <span class="font-serif-luxury text-2xl font-bold text-cacao-dark">GHC <?php echo esc_html($price); ?></span>
            </div>
            <a href="https://wa.me/<?php echo esc_attr($wa_number); ?>?text=<?php echo $wa_text; ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn-whatsapp rounded shadow-lg"
               onclick="if(typeof fbq==='function'){fbq('track','Lead',{content_name:'<?php echo esc_js(get_the_title()); ?>',value:<?php echo intval($price); ?>,currency:'GHS'});}">
               Order via WhatsApp
            </a>
          </div>
        <?php endif; ?>

        <!-- Back to Collections -->
        <a href="<?php echo $link_collections; ?>" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-accent-terracotta hover:text-cacao-dark transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
          Back to All Collections
        </a>
      </div>
    </div>
  </section>

<?php endwhile; endif; ?>

<?php
get_footer();
