<?php
/**
 * Template Name: Meet The Team
 *
 * Everything Cacao GH - Meet The Team Page Template (page-meet-the-team.php)
 * Clean, elegant team picture showcase matching brand design system.
 *
 * @package EverythingCacao
 */

get_header();

$placeholder_img = 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png';

$team_members = array(
    array(
        'name'     => 'Master Chocolatier & Production Lead',
        'location' => 'Accra, Ghana',
        'image'    => $placeholder_img,
    ),
    array(
        'name'     => 'Head of Operations & Quality Control',
        'location' => 'Accra, Ghana',
        'image'    => $placeholder_img,
    ),
    array(
        'name'     => 'Sustainable Cacao & Farmer Liaison',
        'location' => 'Ghana Cacao Belt',
        'image'    => $placeholder_img,
    ),
);
?>

  <!-- Header Banner Section -->
  <section class="pt-14 pb-8 md:pt-20 md:pb-10 bg-canvas text-cacao-dark border-b border-cacao-dark/10">
    <div class="max-w-4xl mx-auto px-6 md:px-12 text-center space-y-4">
      
      <!-- Highlighted Pill Badge -->
      <div class="inline-block">
        <span class="text-xs md:text-sm font-semibold uppercase tracking-widest bg-accent-gold/20 text-cacao-dark px-6 py-2 rounded-full border border-accent-gold/40 shadow-sm">
          Our Team
        </span>
      </div>

      <h1 class="font-serif-luxury text-4xl md:text-6xl font-bold text-cacao-dark leading-tight">
        Meet The Everything Cacao Team
      </h1>
    </div>
  </section>

  <!-- Team Member Photo Cards Showcase (Adjusted Spacing & Clean Cards) -->
  <section class="pt-8 pb-20 md:pt-10 md:pb-24 max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">
      <?php foreach ($team_members as $member) : ?>
        <div class="ec-animate ec-card-hover group bg-card-bg rounded-2xl overflow-hidden border border-cacao-dark/15 shadow-md hover:shadow-2xl hover:border-accent-gold transition-all duration-500 flex flex-col justify-between">
          <div>
            <!-- Photo Slot -->
            <div class="relative w-full aspect-[4/5] overflow-hidden bg-canvas/80 cursor-pointer">
              <img src="<?php echo esc_url($member['image']); ?>" 
                   alt="<?php echo esc_attr($member['name']); ?>" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy" />
              
              <span class="absolute top-4 right-4 text-[10px] font-semibold uppercase tracking-wider bg-cacao-dark text-canvas px-3 py-1 rounded-full z-10 shadow-sm">
                <?php echo esc_html($member['location']); ?>
              </span>
            </div>

            <!-- Team Info Card -->
            <div class="p-6 md:p-8">
              <h3 class="font-serif-luxury text-xl md:text-2xl font-bold text-cacao-dark leading-snug">
                <?php echo esc_html($member['name']); ?>
              </h3>
            </div>
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
