<?php
/**
 * Everything Cacao GH - Blog Archive / Cacao Journal Template (home.php)
 *
 * All static header copy, labels, and section headings are dynamically
 * controlled via the WordPress Customizer:
 * Appearance → Customize → Cacao Journal Management
 *
 * Post titles, excerpts, thumbnails, and dates remain 100% dynamic via
 * WP_Query — managed under Posts → All Posts in the WP Dashboard.
 *
 * @package EverythingCacao
 */

get_header();

$placeholder_img = 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png';

// ── Customizer values ────────────────────────────────────────────────────────
// Section 1: Hero Header
$journal_tagline  = get_theme_mod( 'ec_journal_hero_tagline',  'DISPATCHES FROM THE CACAO HEARTLAND' );
$journal_title    = get_theme_mod( 'ec_journal_hero_title',    'The Cacao Journal' );
$journal_subtitle = get_theme_mod( 'ec_journal_hero_subtitle', 'Stories, recipes, pairing tips, and deep dives into the world of modern artisan chocolate.' );

// Section 2: Featured Dispatch
$featured_label    = get_theme_mod( 'ec_journal_featured_label',   'FEATURED DISPATCH' );
$featured_post_id  = (int) get_theme_mod( 'ec_journal_featured_post_id', '' );
$read_btn_text     = get_theme_mod( 'ec_journal_read_btn_text',    'READ FULL ARTICLE →' );

// Section 3: Recent Entries
$entries_tagline   = get_theme_mod( 'ec_journal_entries_tagline', 'FIELD NOTES &amp; STORIES' );
$entries_heading   = get_theme_mod( 'ec_journal_entries_heading', 'Recent Journal Entries' );
$read_story_text   = get_theme_mod( 'ec_journal_read_story_text', 'READ STORY →' );
$posts_per_page    = max( 1, (int) get_theme_mod( 'ec_journal_posts_per_page', '12' ) );
$empty_title       = get_theme_mod( 'ec_journal_empty_title', 'No Journal Dispatches Yet' );
$empty_body        = get_theme_mod( 'ec_journal_empty_body',  'We are currently writing new stories, tasting guides, and recipes. Check back soon!' );
?>

  <!-- ========================================================================
       SECTION 1: HERO HEADER
       Customizer: Cacao Journal Management → 1. Hero Header
       ======================================================================== -->
  <section class="py-10 md:py-14 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">
        <?php echo esc_html( $journal_tagline ); ?>
      </span>
      <h1 class="font-serif-luxury text-4xl md:text-6xl font-bold">
        <?php echo esc_html( $journal_title ); ?>
      </h1>
      <p class="text-canvas/80 text-base max-w-2xl mx-auto leading-relaxed">
        <?php echo esc_html( $journal_subtitle ); ?>
      </p>
    </div>
  </section>

<?php
// ── WP_Query: fetch all published posts ────────────────────────────────────
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$blog_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$blog_query = new WP_Query( $blog_args );

if ( $blog_query->have_posts() ) :
    $posts_list = $blog_query->posts;

    // ── Resolve featured post ───────────────────────────────────────────────
    // If a specific Post ID is set in the Customizer, use that post.
    // Otherwise fall back to the most recent published post in the query.
    $feat_post = null;
    if ( $featured_post_id > 0 ) {
        $feat_post = get_post( $featured_post_id );
        if ( ! $feat_post || $feat_post->post_status !== 'publish' ) {
            $feat_post = null; // invalid / unpublished — fall back to latest
        }
    }
    if ( ! $feat_post && ! empty( $posts_list ) ) {
        $feat_post = $posts_list[0];
    }
?>

  <!-- ========================================================================
       SECTION 2: FEATURED DISPATCH SPOTLIGHT
       Customizer: Cacao Journal Management → 2. Featured Dispatch Spotlight
       ======================================================================== -->
  <?php if ( $feat_post ) :
      $feat_id      = $feat_post->ID;
      $feat_thumb   = get_the_post_thumbnail_url( $feat_id, 'large' ) ?: $placeholder_img;
      $feat_title   = get_the_title( $feat_id );
      $feat_link    = get_permalink( $feat_id );
      $feat_date    = get_the_date( 'F j, Y', $feat_id );
      $feat_excerpt = get_the_excerpt( $feat_id ) ?: wp_trim_words( $feat_post->post_content, 35 );
  ?>
  <section class="pt-8 pb-4 md:pt-10 md:pb-6 max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center bg-card-bg rounded-2xl p-6 md:p-10 border border-cacao-dark/15 shadow-md hover:shadow-xl transition-all duration-300">

      <!-- Thumbnail -->
      <div class="lg:col-span-7 aspect-video rounded-xl overflow-hidden border border-cacao-dark/10 bg-canvas group cursor-pointer"
           onclick="window.location.href='<?php echo esc_url( $feat_link ); ?>'">
        <img src="<?php echo esc_url( $feat_thumb ); ?>"
             alt="<?php echo esc_attr( $feat_title ); ?>"
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
      </div>

      <!-- Text Column -->
      <div class="lg:col-span-5 space-y-6">
        <div class="space-y-3">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-accent-gold"></span>
            <?php echo esc_html( $featured_label ); ?> &bull; <?php echo esc_html( $feat_date ); ?>
          </span>
          <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark leading-tight">
            <a href="<?php echo esc_url( $feat_link ); ?>" class="hover:text-accent-terracotta transition-colors">
              <?php echo esc_html( $feat_title ); ?>
            </a>
          </h2>
        </div>
        <p class="text-cacao-dark/80 text-sm md:text-base leading-relaxed">
          <?php echo esc_html( $feat_excerpt ); ?>
        </p>
        <div>
          <a href="<?php echo esc_url( $feat_link ); ?>"
             class="px-8 py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors inline-block rounded-lg shadow-sm">
            <?php echo esc_html( $read_btn_text ); ?>
          </a>
        </div>
      </div>

    </div>
  </section>
  <?php endif; // end featured dispatch ?>

  <!-- ========================================================================
       SECTION 3: RECENT ENTRIES GRID
       Customizer: Cacao Journal Management → 3. Recent Entries Grid
       Post data (title, excerpt, thumbnail, date) comes 100% from WP_Query.
       ======================================================================== -->
  <?php if ( ! empty( $posts_list ) ) : ?>
  <section class="py-10 md:py-14 bg-card-bg border-t border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 space-y-12">

      <!-- Section Header -->
      <div class="text-center max-w-2xl mx-auto space-y-3">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">
          <?php echo esc_html( html_entity_decode( $entries_tagline, ENT_QUOTES, 'UTF-8' ) ); ?>
        </span>
        <h2 class="font-serif-luxury text-3xl md:text-4xl font-bold text-cacao-dark">
          <?php echo esc_html( $entries_heading ); ?>
        </h2>
      </div>

      <!-- Post Cards Grid (3 columns) -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ( $posts_list as $post_item ) :
            $post_id = $post_item->ID;
            $thumb   = get_the_post_thumbnail_url( $post_id, 'large' ) ?: $placeholder_img;
            $title   = get_the_title( $post_id );
            $link    = get_permalink( $post_id );
            $date    = get_the_date( 'F Y', $post_id );
            $excerpt = get_the_excerpt( $post_id ) ?: wp_trim_words( $post_item->post_content, 25 );
        ?>
        <article class="bg-canvas rounded-xl overflow-hidden border border-cacao-dark/15 flex flex-col justify-between shadow-sm hover:shadow-xl hover:border-accent-gold transition-all duration-300 group">
          <div>
            <!-- Thumbnail -->
            <div class="aspect-video overflow-hidden bg-card-bg cursor-pointer"
                 onclick="window.location.href='<?php echo esc_url( $link ); ?>'">
              <img src="<?php echo esc_url( $thumb ); ?>"
                   alt="<?php echo esc_attr( $title ); ?>"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy" />
            </div>
            <!-- Meta + Title + Excerpt -->
            <div class="p-6 md:p-8 space-y-3">
              <span class="text-[10px] font-semibold text-accent-gold uppercase tracking-widest block">
                <?php echo esc_html( $date ); ?>
              </span>
              <h3 class="font-serif-luxury text-xl font-bold text-cacao-dark leading-snug">
                <a href="<?php echo esc_url( $link ); ?>" class="hover:text-accent-terracotta transition-colors">
                  <?php echo esc_html( $title ); ?>
                </a>
              </h3>
              <p class="text-xs text-cacao-dark/75 leading-relaxed line-clamp-3">
                <?php echo esc_html( $excerpt ); ?>
              </p>
            </div>
          </div>
          <!-- Read Link -->
          <div class="p-6 md:p-8 pt-0">
            <a href="<?php echo esc_url( $link ); ?>"
               class="text-xs font-semibold uppercase tracking-widest text-cacao-dark underline hover:text-accent-terracotta inline-flex items-center gap-1">
              <?php echo esc_html( $read_story_text ); ?>
            </a>
          </div>
        </article>
        <?php endforeach; ?>
      </div>

      <?php
      // Pagination (only shown when more posts exist than posts_per_page)
      $total_pages = $blog_query->max_num_pages;
      if ( $total_pages > 1 ) : ?>
      <div class="flex justify-center gap-3 pt-4">
        <?php
        echo paginate_links( array(
            'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'    => '?paged=%#%',
            'current'   => $paged,
            'total'     => $total_pages,
            'prev_text' => '&larr; Previous',
            'next_text' => 'Next &rarr;',
            'type'      => 'list',
        ) );
        ?>
      </div>
      <?php endif; ?>

    </div>
  </section>
  <?php endif; // end entries grid ?>

<?php
else : // ── Empty state (no posts published yet) ──────────────────────────────
?>
  <!-- ========================================================================
       EMPTY STATE — No posts published yet
       Customizer: Cacao Journal Management → 3. Recent Entries Grid
       ======================================================================== -->
  <section class="py-24 max-w-7xl mx-auto px-6 md:px-12 text-center space-y-4">
    <span class="text-5xl">📖</span>
    <h3 class="font-serif-luxury text-3xl font-bold text-cacao-dark">
      <?php echo esc_html( $empty_title ); ?>
    </h3>
    <p class="text-sm text-text-muted max-w-md mx-auto">
      <?php echo esc_html( $empty_body ); ?>
    </p>
  </section>
<?php
endif; // end have_posts

wp_reset_postdata();

get_footer();
