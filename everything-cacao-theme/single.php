<?php
/**
 * Single Post/Product View Template
 *
 * @package EverythingCacao
 */

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Everything Cacao GH</span>
      <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold"><?php the_title(); ?></h1>
    </div>
  </section>

  <section class="py-20 max-w-4xl mx-auto px-6 md:px-12 space-y-8">
    <?php if (has_post_thumbnail()) : ?>
      <div class="aspect-video rounded-lg overflow-hidden border border-cacao-dark/10 shadow-lg">
        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
      </div>
    <?php endif; ?>

    <div class="prose max-w-none text-text-muted text-sm leading-relaxed space-y-4">
      <?php the_content(); ?>
    </div>
  </section>
<?php endwhile; endif; ?>

<?php
get_footer();
