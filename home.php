<?php
/**
 * Everything Cacao GH - Blog Archive / Journal Template (home.php)
 *
 * @package EverythingCacao
 */

get_header();
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

  <!-- Featured Post Section -->
  <section class="py-24 max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      <div class="lg:col-span-7 aspect-video bg-card-bg rounded-lg overflow-hidden border border-cacao-dark/10 shadow-xl">
        <img src="https://images.unsplash.com/photo-1541781774459-bb2af2f05b55?auto=format&fit=crop&w=1000&q=80" alt="The Art of the Bite: How to Properly Taste Fine Dark Chocolate" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" />
      </div>

      <div class="lg:col-span-5 space-y-6">
        <div class="space-y-2">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Featured Dispatch</span>
          <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark">The Art of the Bite: How to Properly Taste Fine Dark Chocolate</h2>
        </div>
        <p class="text-text-muted text-sm leading-relaxed">
          Think you know how to eat chocolate? Discover why letting a square melt slowly on your palate unlocks hidden notes of red fruit, spice, and smoke.
        </p>
        <div class="flex flex-wrap gap-2">
          <span class="text-[11px] bg-canvas px-3 py-1 rounded border border-cacao-dark/10 text-text-muted font-medium">#TastingGuide</span>
          <span class="text-[11px] bg-canvas px-3 py-1 rounded border border-cacao-dark/10 text-text-muted font-medium">#NaharObsidian</span>
          <span class="text-[11px] bg-canvas px-3 py-1 rounded border border-cacao-dark/10 text-text-muted font-medium">#SensoryExperience</span>
        </div>
        <a href="#" class="px-8 py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors inline-block">
          Read Full Article &rarr;
        </a>
      </div>
    </div>
  </section>

  <!-- Journal Article Grid -->
  <section class="py-24 bg-card-bg border-t border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <div class="text-center max-w-2xl mx-auto space-y-3 mb-16">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Field Notes &amp; Stories</span>
        <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark">Recent Journal Entries</h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if (!$thumb) {
                    $slug = get_post_field('post_name', get_the_ID());
                    if (strpos($slug, 'banana-bread') !== false) {
                        $thumb = get_template_directory_uri() . '/assets/images/brand/blog_post_banana_bread.jpg';
                    } elseif (strpos($slug, 'dark-chocolate') !== false || strpos($slug, 'benefits') !== false) {
                        $thumb = get_template_directory_uri() . '/assets/images/brand/blog_post_dark_chocolate.jpg';
                    } else {
                        $thumb = 'https://images.unsplash.com/photo-1549007994-cb92caebd54b?auto=format&fit=crop&w=800&q=80';
                    }
                }
                ?>
                <article class="bg-canvas rounded-lg overflow-hidden border border-cacao-dark/10 flex flex-col justify-between shadow-sm">
                  <div>
                    <div class="aspect-video overflow-hidden">
                      <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-6 space-y-3">
                      <span class="text-[10px] font-semibold text-accent-gold uppercase tracking-widest"><?php echo get_the_date('M Y'); ?></span>
                      <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark"><?php the_title(); ?></h3>
                      <p class="text-xs text-text-muted leading-relaxed line-clamp-3"><?php echo get_the_excerpt(); ?></p>
                    </div>
                  </div>
                  <div class="p-6 pt-0">
                    <a href="<?php the_permalink(); ?>" class="text-xs font-semibold uppercase tracking-widest text-cacao-dark underline hover:text-accent-terracotta">Read Full Story &rarr;</a>
                  </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <!-- Sample Article 1 -->
            <article class="bg-canvas rounded-lg overflow-hidden border border-cacao-dark/10 flex flex-col justify-between shadow-sm">
              <div>
                <div class="aspect-video overflow-hidden">
                  <img src="https://images.unsplash.com/photo-1606312619070-d48b4c652a52?auto=format&fit=crop&w=800&q=80" alt="Baking with Nahar" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>
                <div class="p-6 space-y-3">
                  <span class="text-[10px] font-semibold text-accent-gold uppercase tracking-widest">Culinary Journal</span>
                  <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">Baking with Nahar: 3 Elevated Dessert Recipes for Your Next Dinner Party</h3>
                  <p class="text-xs text-text-muted leading-relaxed line-clamp-3">
                    Transform your home hosting with single-origin Ghanaian cacao. Explore recipes for Nahar 72% molten lava cakes, gold-dusted chocolate tarts, and velvety nib mousses.
                  </p>
                </div>
              </div>
              <div class="p-6 pt-0">
                <a href="#" class="text-xs font-semibold uppercase tracking-widest text-cacao-dark underline hover:text-accent-terracotta">Read Full Recipe Guide &rarr;</a>
              </div>
            </article>

            <!-- Sample Article 2 -->
            <article class="bg-canvas rounded-lg overflow-hidden border border-cacao-dark/10 flex flex-col justify-between shadow-sm">
              <div>
                <div class="aspect-video overflow-hidden">
                  <img src="https://images.unsplash.com/photo-1549007994-cb92caebd54b?auto=format&fit=crop&w=800&q=80" alt="Behind the Wrapper" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>
                <div class="p-6 space-y-3">
                  <span class="text-[10px] font-semibold text-accent-terracotta uppercase tracking-widest">Design &amp; Identity</span>
                  <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">Behind the Wrapper: The Creative Story of the Cherelle Visual Identity</h3>
                  <p class="text-xs text-text-muted leading-relaxed line-clamp-3">
                    From warm caramel tones to embossed gold foil accents, discover how we designed packaging that captures the joyful, expressive spirit of Ghanaian milk chocolate.
                  </p>
                </div>
              </div>
              <div class="p-6 pt-0">
                <a href="#" class="text-xs font-semibold uppercase tracking-widest text-cacao-dark underline hover:text-accent-terracotta">Read Design Story &rarr;</a>
              </div>
            </article>

            <!-- Sample Article 3 -->
            <article class="bg-canvas rounded-lg overflow-hidden border border-cacao-dark/10 flex flex-col justify-between shadow-sm">
              <div>
                <div class="aspect-video overflow-hidden">
                  <img src="https://images.unsplash.com/photo-1548907040-4baa42d10919?auto=format&fit=crop&w=800&q=80" alt="Why Ghanaian Cacao is Regarded as Some of the Best" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>
                <div class="p-6 space-y-3">
                  <span class="text-[10px] font-semibold text-cherelle-caramel uppercase tracking-widest">Cacao Terroir</span>
                  <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark">Why Ghanaian Cacao is Regarded as Some of the Best in the World</h3>
                  <p class="text-xs text-text-muted leading-relaxed line-clamp-3">
                    Unpacking the equatorial climate, mineral-rich soils, and traditional fermentation methods that give Ghanaian cocoa its world-famous rich cocoa baseline and deep flavor profile.
                  </p>
                </div>
              </div>
              <div class="p-6 pt-0">
                <a href="#" class="text-xs font-semibold uppercase tracking-widest text-cacao-dark underline hover:text-accent-terracotta">Read Terroir Insight &rarr;</a>
              </div>
            </article>
            <?php
        endif;
        ?>
      </div>
    </div>
  </section>

<?php
get_footer();
