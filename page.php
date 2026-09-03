<?php
/**
 * Default Page Template
 * Fully compatible with Elementor, WP Block Editor, and Classic Editor.
 *
 * @package EverythingCacao
 */

get_header();
?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        // If built with Elementor or currently in Elementor Preview mode, render Elementor canvas container directly
        if (did_action('elementor/loaded') && (\Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID()) || \Elementor\Plugin::$instance->preview->is_preview_mode())) :
            ?>
            <main id="primary" class="site-main elementor-page-wrapper">
              <?php the_content(); ?>
            </main>
            <?php
        else :
            ?>
            <main id="primary" class="site-main">
              <!-- Page Header Banner -->
              <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
                <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
                  <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold"><?php the_title(); ?></h1>
                </div>
              </section>

              <!-- Page Content Area -->
              <section class="py-20 max-w-7xl mx-auto px-6 md:px-12 text-cacao-dark">
                <div class="entry-content space-y-6 text-sm leading-relaxed">
                  <?php the_content(); ?>
                </div>
              </section>
            </main>
            <?php
        endif;
    endwhile;
endif;
?>

<?php
get_footer();
