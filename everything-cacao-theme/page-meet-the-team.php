<?php
/**
 * Template Name: Meet The Team
 *
 * Everything Cacao GH - Meet The Team Page Template (page-meet-the-team.php)
 * Features 4 rows of team member profile picture slots ready for image uploads.
 *
 * @package EverythingCacao
 */

get_header();

$placeholder_img = 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png';

$team_rows = array(
    array(
        'row_title' => 'Executive & Leadership Visionaries',
        'members'   => array(
            array(
                'name'     => 'Executive Director & Founder',
                'title'    => 'Founder & Chief Executive Officer',
                'location' => 'Accra Headquarters',
                'bio'      => 'Leading the vision of Everything Cacao GH to champion authentic Ghanaian cocoa processing, ethical sourcing, and global artisanal luxury.',
                'image'    => $placeholder_img,
            ),
            array(
                'name'     => 'Co-Founder & Director of Operations',
                'title'    => 'Head of Strategy & Operations',
                'location' => 'Accra & Airport Residential',
                'bio'      => 'Overseeing nationwide distribution, retail partnerships, stockist expansion, and operational excellence across Ghana.',
                'image'    => $placeholder_img,
            ),
            array(
                'name'     => 'Chief Financial Officer',
                'title'    => 'Head of Finance & Growth',
                'location' => 'Accra Headquarters',
                'bio'      => 'Managing financial growth, farmer cooperative investments, and sustainable business expansion for Cherelle & Nahar brands.',
                'image'    => $placeholder_img,
            ),
        ),
    ),
    array(
        'row_title' => 'Master Chocolatiers & Production Specialists',
        'members'   => array(
            array(
                'name'     => 'Master Chocolatier',
                'title'    => 'Head of Flavor & Recipe Innovation',
                'location' => 'Artisanal Lab • Suhum',
                'bio'      => 'Crafting single-origin roast profiles, 72-hour conching formulas, and signature truffle fillings for Nahar Obsidian and Cherelle lines.',
                'image'    => $placeholder_img,
            ),
            array(
                'name'     => 'Senior Conching Specialist',
                'title'    => 'Lead Processing & Batch Artisan',
                'location' => 'Production Facility',
                'bio'      => 'Perfecting texture, snap, and velvet mouthfeel through precision temperature tempering and double-conching techniques.',
                'image'    => $placeholder_img,
            ),
            array(
                'name'     => 'Quality Assurance Manager',
                'title'    => 'FDA & GSA Compliance Lead',
                'location' => 'Quality Assurance Lab',
                'bio'      => 'Ensuring strict compliance with Food and Drug Authority (FDA) and Ghana Standards Authority (GSA) safety and quality protocols.',
                'image'    => $placeholder_img,
            ),
        ),
    ),
    array(
        'row_title' => 'Agricultural & Farmer Relations Officers',
        'members'   => array(
            array(
                'name'     => 'Lead Agricultural Liaison',
                'title'    => 'Farmer Relations Manager',
                'location' => 'Suhum, Eastern Region',
                'bio'      => 'Partnering directly with local Ghanaian cocoa farmers to ensure fair compensation, sustainable harvesting, and bean quality.',
                'image'    => $placeholder_img,
            ),
            array(
                'name'     => 'Sourcing Specialist',
                'title'    => 'Sustainable Cacao Agronomist',
                'location' => 'Sefwi Wiawso, Western Region',
                'bio'      => 'Selecting premium single-origin cacao harvests and fostering bio-diverse cocoa agroforestry practices across Western Ghana.',
                'image'    => $placeholder_img,
            ),
            array(
                'name'     => 'Fermentation & Drying Lead',
                'title'    => 'Post-Harvest Specialist',
                'location' => 'Assin Fosu, Central Region',
                'bio'      => 'Supervising sun-drying and plantain-leaf fermentations to unlock deep red berry and floral cocoa notes in every batch.',
                'image'    => $placeholder_img,
            ),
        ),
    ),
    array(
        'row_title' => 'Brand Experience, Sales & Concierge Team',
        'members'   => array(
            array(
                'name'     => 'Head of Brand & Marketing',
                'title'    => 'Brand Director & Creative Lead',
                'location' => 'Accra Headquarters',
                'bio'      => 'Directing brand identity, luxury gift hamper packaging, digital storytelling, and international showcase campaigns.',
                'image'    => $placeholder_img,
            ),
            array(
                'name'     => 'Customer Experience Lead',
                'title'    => 'Concierge & Stockist Liaison',
                'location' => 'Showroom & Concierge Desk',
                'bio'      => 'Managing corporate gift inquiries, concierge sampling sessions, and customized chocolate orders across Accra.',
                'image'    => $placeholder_img,
            ),
            array(
                'name'     => 'Logistics & Dispatch Manager',
                'title'    => 'Nationwide Distribution Lead',
                'location' => 'Accra Fulfillment Hub',
                'bio'      => 'Coordinating temperature-controlled nationwide delivery to retail stockists, hotels, and direct-to-door customers.',
                'image'    => $placeholder_img,
            ),
        ),
    ),
);
?>

  <!-- Hero Page Banner -->
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-6">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">FDA &amp; GSA CERTIFIED ARTISANAL CHOCOLATIERS</span>
      <h1 class="font-serif-luxury text-4xl md:text-6xl font-bold leading-tight">Meet The Everything Cacao Team</h1>
      <p class="text-canvas/80 text-base max-w-3xl mx-auto leading-relaxed">
        The passionate chocolatiers, agricultural liaisons, master conchers, and visionaries dedicated to crafting Ghana's finest single-origin chocolate bars, truffles, and confections.
      </p>
    </div>
  </section>

  <!-- Team Members Grid (4 Rows) -->
  <section class="py-24 max-w-7xl mx-auto px-6 md:px-12 space-y-24">
    
    <?php foreach ($team_rows as $row_index => $row) : ?>
      <div class="space-y-10">
        <!-- Row Title Header -->
        <div class="flex items-center gap-4 border-b border-cacao-dark/15 pb-4">
          <span class="w-8 h-8 rounded-full bg-accent-gold/20 text-cacao-dark font-serif-luxury font-bold text-sm flex items-center justify-center">0<?php echo $row_index + 1; ?></span>
          <h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark"><?php echo esc_html($row['row_title']); ?></h2>
        </div>

        <!-- 3 Members per Row Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">
          <?php foreach ($row['members'] as $member) : ?>
            <div class="ec-animate ec-card-hover bg-card-bg rounded-xl overflow-hidden border border-cacao-dark/15 shadow-sm transition-all duration-300 hover:shadow-2xl hover:border-accent-gold group flex flex-col justify-between">
              <div>
                <!-- Team Member Picture Slot (Placeholder ready for uploads) -->
                <div class="relative w-full aspect-square overflow-hidden bg-canvas/60 border-b border-cacao-dark/10 group cursor-pointer">
                  <img src="<?php echo esc_url($member['image']); ?>" 
                       alt="<?php echo esc_attr($member['name']); ?>" 
                       class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                       loading="lazy" />
                  
                  <span class="absolute top-4 right-4 text-[10px] font-semibold uppercase tracking-wider bg-cacao-dark text-canvas px-3 py-1 rounded-full z-10 shadow-sm">
                    <?php echo esc_html($member['location']); ?>
                  </span>
                </div>

                <!-- Member Info -->
                <div class="p-6 md:p-8 space-y-3">
                  <span class="text-[10px] font-semibold text-accent-terracotta uppercase tracking-widest block"><?php echo esc_html($member['title']); ?></span>
                  <h3 class="font-serif-luxury text-xl md:text-2xl font-bold text-cacao-dark"><?php echo esc_html($member['name']); ?></h3>
                  <p class="text-sm text-cacao-dark/80 font-sans leading-relaxed"><?php echo esc_html($member['bio']); ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>

  </section>

  <!-- SEO / Page Content Area for WP Admin & Elementor -->
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
