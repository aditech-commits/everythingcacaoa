<?php
/**
 * Everything Cacao GH - Single Blog Post Editorial Template (single.php)
 *
 * @package EverythingCacao
 */

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
  $categories   = get_the_category();
  $cat_name     = !empty($categories) ? $categories[0]->name : 'Dispatches';
  $post_date    = get_the_date('M d, Y');
  $author_name  = get_the_author() ?: 'Everything Cacao Editorial';
  $content      = get_the_content();
  $word_count   = str_word_count(strip_tags($content));
  $read_time    = max(1, ceil($word_count / 200)); // ~200 wpm
  $post_url     = urlencode(get_permalink());
  $post_title   = urlencode(get_the_title());
  $wa_number    = get_option('ec_whatsapp_number', '233240661866');
?>
  <!-- Article Header / Hero Banner -->
  <section class="py-16 md:py-24 bg-cacao-dark text-canvas border-b border-canvas/10 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-6 md:px-12 text-center space-y-6 relative z-10">
      <!-- Category Badge & Metadata -->
      <div class="flex items-center justify-center gap-3 text-xs uppercase tracking-widest font-semibold text-accent-gold">
        <span><?php echo esc_html($cat_name); ?></span>
        <span>•</span>
        <span><?php echo esc_html($post_date); ?></span>
        <span>•</span>
        <span><?php echo $read_time; ?> min read</span>
      </div>

      <!-- Main Post Title -->
      <h1 class="font-serif-luxury text-3xl md:text-5xl lg:text-6xl font-bold leading-tight text-canvas">
        <?php the_title(); ?>
      </h1>

      <!-- Author Byline -->
      <div class="pt-2 text-xs uppercase tracking-widest text-canvas/70 font-medium">
        By <span class="text-accent-gold font-bold"><?php echo esc_html($author_name); ?></span>
      </div>
    </div>
  </section>

  <!-- Main Article Body Container -->
  <article class="py-16 md:py-24 max-w-4xl mx-auto px-6 md:px-12 space-y-12">
    <!-- Featured Image -->
    <?php if (has_post_thumbnail()) : ?>
      <div class="aspect-video w-full rounded-2xl overflow-hidden border border-cacao-dark/10 shadow-2xl">
        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
      </div>
    <?php endif; ?>

    <!-- Editorial Content Styling Wrapper -->
    <div class="ec-editorial-content font-sans text-cacao-dark text-base md:text-lg leading-relaxed space-y-6">
      <?php the_content(); ?>
    </div>

    <!-- Article Tag Cloud & Share Section -->
    <div class="pt-8 border-t border-cacao-dark/15 flex flex-col md:flex-row items-center justify-between gap-6">
      <!-- Tags -->
      <div class="flex flex-wrap gap-2">
        <?php
        $tags = get_the_tags();
        if ($tags) :
          foreach ($tags as $tag) : ?>
            <span class="text-xs bg-canvas px-3 py-1.5 rounded-md border border-cacao-dark/10 text-cacao-dark font-medium uppercase tracking-wider">
              #<?php echo esc_html($tag->name); ?>
            </span>
          <?php endforeach;
        else : ?>
          <span class="text-xs bg-canvas px-3 py-1.5 rounded-md border border-cacao-dark/10 text-cacao-dark font-medium uppercase tracking-wider">
            #EverythingCacao
          </span>
          <span class="text-xs bg-canvas px-3 py-1.5 rounded-md border border-cacao-dark/10 text-cacao-dark font-medium uppercase tracking-wider">
            #GhanaianCacao
          </span>
        <?php endif; ?>
      </div>

      <!-- Social Share Buttons -->
      <div class="flex items-center gap-3 text-xs uppercase tracking-wider font-semibold text-cacao-dark">
        <span class="text-text-muted">Share:</span>
        <a href="https://wa.me/?text=<?php echo $post_title; ?>%20<?php echo $post_url; ?>" target="_blank" rel="noopener" class="p-2 bg-accent-whatsapp text-white rounded-full hover:opacity-90 transition-opacity" title="Share on WhatsApp">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 2c-5.516 0-9.994 4.478-9.994 9.994 0 1.763.459 3.483 1.332 5.001l-1.417 5.176 5.297-1.39c1.464.8 3.123 1.222 4.782 1.222h.004c5.516 0 9.994-4.478 9.994-9.994 0-2.673-1.041-5.185-2.929-7.073-1.888-1.888-4.4-2.929-7.069-2.929zm.004 18.334h-.003c-1.51 0-2.991-.406-4.283-1.173l-.307-.183-3.181.834.849-3.103-.201-.321c-.841-1.339-1.286-2.894-1.286-4.489 0-4.606 3.748-8.354 8.354-8.354 2.232 0 4.33.869 5.908 2.448 1.579 1.579 2.448 3.676 2.448 5.908 0 4.607-3.748 8.355-8.354 8.355z"/></svg>
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank" rel="noopener" class="p-2 bg-[#1877F2] text-white rounded-full hover:opacity-90 transition-opacity" title="Share on Facebook">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
      </div>
    </div>

    <!-- Editorial Author Bio Box -->
    <div class="bg-card-bg rounded-2xl p-8 border border-cacao-dark/10 flex flex-col sm:flex-row items-center gap-6 shadow-sm">
      <div class="w-16 h-16 rounded-full bg-cacao-dark text-accent-gold flex items-center justify-center font-serif-luxury text-2xl font-bold shrink-0">
        EC
      </div>
      <div class="space-y-2 text-center sm:text-left">
        <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">Everything Cacao GH Journal</h4>
        <p class="text-xs text-text-muted leading-relaxed">
          Crafting modern Ghanaian chocolate dispatches, sensory tasting notes, cacao heritage insights, and culinary inspiration straight from our Accra chocolate kitchen.
        </p>
      </div>
    </div>

    <!-- Next / Previous Post Navigation -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-6">
      <div class="p-6 bg-canvas rounded-xl border border-cacao-dark/10">
        <?php previous_post_link('<span class="text-[10px] uppercase font-bold text-accent-terracotta tracking-widest block mb-1">&larr; Previous Story</span> %link'); ?>
      </div>
      <div class="p-6 bg-canvas rounded-xl border border-cacao-dark/10 text-right">
        <?php next_post_link('<span class="text-[10px] uppercase font-bold text-accent-terracotta tracking-widest block mb-1">Next Story &rarr;</span> %link'); ?>
      </div>
    </div>
  </article>

<?php endwhile; endif; ?>

<?php
get_footer();

