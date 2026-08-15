<?php
/**
 * Main Template File (Fallback)
 *
 * @package EverythingCacao
 */

get_header();
?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        if (did_action('elementor/loaded') && (\Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID()) || \Elementor\Plugin::$instance->preview->is_preview_mode())) :
            ?>
            <main id="primary" class="site-main elementor-page-wrapper">
              <?php the_content(); ?>
            </main>
            <?php
        else :
            ?>
            <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
              <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
                <h1 class="font-serif-luxury text-4xl md:text-5xl font-bold"><?php the_title(); ?></h1>
              </div>
            </section>

            <section class="py-20 max-w-7xl mx-auto px-6 md:px-12">
              <div class="entry-content space-y-6 text-sm text-text-muted leading-relaxed">
                <?php the_content(); ?>
              </div>
            </section>
            <?php
        endif;
    endwhile;
else :
    ?>
    <section class="py-20 max-w-7xl mx-auto px-6 md:px-12 text-center">
      <p class="text-text-muted text-sm">No content found.</p>
    </section>
    <?php
endif;

get_footer();
