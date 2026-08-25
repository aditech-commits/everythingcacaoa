<?php
/**
 * Template Name: Our Gallery
 *
 * Everything Cacao GH - Our Gallery Page Template (page-gallery.php)
 * Clean, elegant photo gallery matching brand luxury design system.
 *
 * @package EverythingCacao
 */

get_header();

$placeholder_url = 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image-300x193.png';

$gallery_images = array(
    $placeholder_url,
    $placeholder_url,
    $placeholder_url,
    $placeholder_url,
    $placeholder_url,
    $placeholder_url,
    $placeholder_url,
    $placeholder_url,
    $placeholder_url,
);
?>

  <!-- Header Banner Section -->
  <section class="pt-14 pb-8 md:pt-20 md:pb-10 bg-canvas text-cacao-dark border-b border-cacao-dark/10">
    <div class="max-w-4xl mx-auto px-6 md:px-12 text-center space-y-4">
      
      <!-- Highlighted Pill Badge -->
      <div class="inline-block">
        <span class="text-xs md:text-sm font-semibold uppercase tracking-widest bg-accent-gold/20 text-cacao-dark px-6 py-2 rounded-full border border-accent-gold/40 shadow-sm">
          Our Story
        </span>
      </div>

      <h1 class="font-serif-luxury text-4xl md:text-6xl font-bold text-cacao-dark leading-tight">
        Our Story
      </h1>
    </div>
  </section>

  <!-- Gallery Showcase Grid (3 Rows x 3 Columns = 9 Photos) -->
  <section class="pt-12 pb-20 md:pt-16 md:pb-24 max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 md:gap-10">
      <?php foreach ($gallery_images as $img_url) : ?>
        <div class="ec-animate ec-card-hover group bg-card-bg rounded-2xl overflow-hidden border border-cacao-dark/15 shadow-md hover:shadow-2xl hover:border-accent-gold transition-all duration-500">
          <div class="relative w-full aspect-[4/3] overflow-hidden bg-canvas/80 cursor-pointer">
            <img src="<?php echo esc_url($img_url); ?>" 
                 alt="Everything Cacao Gallery Image" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                 loading="lazy" />
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- WP Content & Elementor Area -->
  <div class="elementor-content-container max-w-7xl mx-auto px-6 md:px-12 pb-16">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
  </div>

<?php
get_footer();
