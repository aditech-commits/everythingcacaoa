<?php
/**
 * Main Template File (Fallback)
 *
 * @package EverythingCacao
 */

get_header();
?>

<section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
  <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
    <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold"><?php single_post_title(); ?></h1>
  </div>
</section>

<section class="py-20 max-w-7xl mx-auto px-6 md:px-12">
  <?php if (have_posts()) : ?>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php while (have_posts()) : the_post(); ?>
        <article class="bg-card-bg rounded-lg overflow-hidden border border-cacao-dark/10 p-6 space-y-4 shadow-sm">
          <h2 class="font-serif-luxury text-xl font-bold text-cacao-dark">
            <a href="<?php the_permalink(); ?>" class="hover:text-accent-terracotta"><?php the_title(); ?></a>
          </h2>
          <div class="text-xs text-text-muted leading-relaxed">
            <?php the_excerpt(); ?>
          </div>
          <a href="<?php the_permalink(); ?>" class="inline-block text-xs font-semibold uppercase tracking-widest text-cacao-dark underline hover:text-accent-terracotta">Read More &rarr;</a>
        </article>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <p class="text-center text-text-muted text-sm">No content found.</p>
  <?php endif; ?>
</section>

<?php
get_footer();
