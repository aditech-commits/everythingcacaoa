<?php
/**
 * Everything Cacao GH - Blog Archive / Journal Template (home.php)
 *
 * @package EverythingCacao
 */

get_header();

$placeholder_img = 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png';
?>

  <!-- Hero Banner -->
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Dispatches from the Cacao Heartland</span>
      <h1 class="font-serif-luxury text-4xl md:text-6xl font-bold">The Cacao Journal</h1>
      <p class="text-canvas/80 text-base max-w-2xl mx-auto leading-relaxed">
        Stories, recipes, pairing tips, and deep dives into the world of modern artisan chocolate.
      </p>
    </div>
  </section>

  <?php
  // Query Published Blog Posts dynamically
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $blog_args = array(
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'posts_per_page' => 12,
      'paged'          => $paged,
  );
  $blog_query = new WP_Query($blog_args);

  if ($blog_query->have_posts()) :
      $posts_list = $blog_query->posts;
      $first_post = array_shift($posts_list);
      ?>

      <!-- Featured Dispatch Section (Top Published Post) -->
      <?php if ($first_post) :
          $feat_id      = $first_post->ID;
          $feat_thumb   = get_the_post_thumbnail_url($feat_id, 'large') ?: $placeholder_img;
          $feat_title   = get_the_title($feat_id);
          $feat_link    = get_permalink($feat_id);
          $feat_date    = get_the_date('F j, Y', $feat_id);
          $feat_excerpt = get_the_excerpt($feat_id) ?: wp_trim_words($first_post->post_content, 35);
          ?>
          <section class="py-16 md:py-24 max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center bg-card-bg rounded-2xl p-6 md:p-10 border border-cacao-dark/15 shadow-md hover:shadow-xl transition-all duration-300">
              <div class="lg:col-span-7 aspect-video rounded-xl overflow-hidden border border-cacao-dark/10 bg-canvas group cursor-pointer" onclick="window.location.href='<?php echo esc_url($feat_link); ?>'">
                <img src="<?php echo esc_url($feat_thumb); ?>" alt="<?php echo esc_attr($feat_title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
              </div>

              <div class="lg:col-span-5 space-y-6">
                <div class="space-y-3">
                  <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-accent-gold"></span>
                    FEATURED DISPATCH • <?php echo esc_html($feat_date); ?>
                  </span>
                  <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark leading-tight">
                    <a href="<?php echo esc_url($feat_link); ?>" class="hover:text-accent-terracotta transition-colors">
                      <?php echo esc_html($feat_title); ?>
                    </a>
                  </h2>
                </div>
                <p class="text-cacao-dark/80 text-sm md:text-base leading-relaxed">
                  <?php echo esc_html($feat_excerpt); ?>
                </p>
                <div>
                  <a href="<?php echo esc_url($feat_link); ?>" class="px-8 py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors inline-block rounded-lg shadow-sm">
                    Read Full Article &rarr;
                  </a>
                </div>
              </div>
            </div>
          </section>
      <?php endif; ?>

      <!-- Remaining Published Articles Grid -->
      <?php if (!empty($posts_list)) : ?>
        <section class="py-16 md:py-24 bg-card-bg border-t border-b border-cacao-dark/10">
          <div class="max-w-7xl mx-auto px-6 md:px-12 space-y-12">
            <div class="text-center max-w-2xl mx-auto space-y-3">
              <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Field Notes &amp; Stories</span>
              <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark">Recent Journal Entries</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <?php foreach ($posts_list as $post_item) :
                  $post_id = $post_item->ID;
                  $thumb   = get_the_post_thumbnail_url($post_id, 'large') ?: $placeholder_img;
                  $title   = get_the_title($post_id);
                  $link    = get_permalink($post_id);
                  $date    = get_the_date('F Y', $post_id);
                  $excerpt = get_the_excerpt($post_id) ?: wp_trim_words($post_item->post_content, 25);
                  ?>
                  <article class="bg-canvas rounded-xl overflow-hidden border border-cacao-dark/15 flex flex-col justify-between shadow-sm hover:shadow-xl hover:border-accent-gold transition-all duration-300 group">
                    <div>
                      <div class="aspect-video overflow-hidden bg-card-bg cursor-pointer" onclick="window.location.href='<?php echo esc_url($link); ?>'">
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" />
                      </div>
                      <div class="p-6 md:p-8 space-y-3">
                        <span class="text-[10px] font-semibold text-accent-gold uppercase tracking-widest block"><?php echo esc_html($date); ?></span>
                        <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark leading-snug">
                          <a href="<?php echo esc_url($link); ?>" class="hover:text-accent-terracotta transition-colors"><?php echo esc_html($title); ?></a>
                        </h3>
                        <p class="text-xs text-cacao-dark/75 leading-relaxed line-clamp-3"><?php echo esc_html($excerpt); ?></p>
                      </div>
                    </div>
                    <div class="p-6 md:p-8 pt-0">
                      <a href="<?php echo esc_url($link); ?>" class="text-xs font-semibold uppercase tracking-widest text-cacao-dark underline hover:text-accent-terracotta inline-flex items-center gap-1">
                        Read Story &rarr;
                      </a>
                    </div>
                  </article>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
      <?php endif; ?>

  <?php else : ?>
      <!-- Clean Empty State (When no blog posts are published yet) -->
      <section class="py-24 max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
        <span class="text-5xl">📖</span>
        <h3 class="font-serif-luxury text-3xl font-bold text-cacao-dark">No Journal Dispatches Yet</h3>
        <p class="text-sm text-text-muted max-w-md mx-auto">We are currently writing new stories, tasting guides, and recipes. Check back soon!</p>
      </section>
  <?php endif; ?>

<?php
get_footer();
