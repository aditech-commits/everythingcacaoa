<?php
/**
 * Template Name: Our Craft
 *
 * Everything Cacao GH - Our Craft Page Template (page-craft.php)
 * All content is dynamically controlled via the WordPress Customizer:
 * Appearance → Customize → About Us Management
 *
 * @package EverythingCacao
 */

get_header();
?>

  <!-- ========================================================================
       SECTION 1: HERO BANNER
       Customizer: About Us Management → 1. Hero Banner
       ======================================================================== -->
  <section class="py-10 md:py-14 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-6">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">
        <?php echo esc_html( ec_get_text_option( 'ec_about_hero_tagline', 'Official Brand Story &amp; Vision' ) ); ?>
      </span>
      <h1 class="font-serif-luxury text-4xl md:text-6xl font-bold leading-tight">
        <?php echo esc_html( ec_get_text_option( 'ec_about_hero_title', 'Everything Cacao' ) ); ?>
      </h1>
      <p class="text-canvas/80 text-base max-w-3xl mx-auto leading-relaxed">
        <?php echo esc_html( ec_get_text_option( 'ec_about_hero_subtitle', "Celebrating the rich heritage of Ghana's cacao and the art of transforming processed cocoa into premium chocolate." ) ); ?>
      </p>
    </div>
  </section>

  <!-- ========================================================================
       SECTION 2: OUR VALUES (Brand Story & Core Pillars)
       Customizer: About Us Management → 2. Our Values (Brand Pillars)
       ======================================================================== -->
  <section id="about" class="py-10 md:py-14 max-w-7xl mx-auto px-6 md:px-12">
    <div class="text-center max-w-3xl mx-auto space-y-5 mb-8 md:mb-10 ec-animate">
      <span class="text-sm font-semibold uppercase tracking-widest text-accent-terracotta">Our Journey</span>
      <h2 class="font-serif-luxury text-4xl md:text-5xl lg:text-6xl font-bold text-cacao-dark leading-tight">
        <?php echo esc_html( ec_get_text_option( 'ec_about_values_title', "Ghana's Chocolate Story — Grown Here, Made Here" ) ); ?>
      </h2>
      <p class="text-cacao-dark/80 text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
        <?php echo esc_html( ec_get_text_option( 'ec_about_values_subtitle', "Everything Cacao was born from a passion for Ghana's cacao and a belief that the world's finest chocolate starts right here. We transform premium Ghanaian cocoa into exceptional chocolate — honouring our land, our farmers and the traditions that make Ghanaian cacao among the best in the world." ) ); ?>
      </p>
    </div>

    <!-- 4 Value Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 max-w-6xl mx-auto">

      <!-- Value Card 01 -->
      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5 border-t-4 border-accent-gold">
        <div class="w-14 h-14 rounded-full bg-accent-gold/10 flex items-center justify-center text-accent-gold text-2xl font-serif-luxury font-bold">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v1_number', '01' ) ); ?>
        </div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v1_heading', 'Crafting Chocolate with Care' ) ); ?>
        </h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v1_body', 'We source high-quality, processed cocoa from local suppliers who share our commitment to excellence. By collaborating closely with these farmers, we ensure that every batch reflects the unique flavors and characteristics of Ghanaian cacao. Our team of skilled artisans takes this exceptional cocoa and transforms it into a range of delightful chocolate bars, each crafted with precision and love.' ) ); ?>
        </p>
      </div>

      <!-- Value Card 02 -->
      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5 border-t-4 border-accent-gold">
        <div class="w-14 h-14 rounded-full bg-accent-gold/10 flex items-center justify-center text-accent-gold text-2xl font-serif-luxury font-bold">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v2_number', '02' ) ); ?>
        </div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v2_heading', 'Quality You Can Trust' ) ); ?>
        </h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v2_body', 'Certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA), Everything Cacao is dedicated to maintaining the highest standards of safety and quality. Our rigorous processes ensure that every chocolate bar you enjoy is not only delicious but also meets stringent regulatory requirements, giving you peace of mind with every bite.' ) ); ?>
        </p>
      </div>

      <!-- Value Card 03 -->
      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5 border-t-4 border-accent-gold">
        <div class="w-14 h-14 rounded-full bg-accent-gold/10 flex items-center justify-center text-accent-gold text-2xl font-serif-luxury font-bold">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v3_number', '03' ) ); ?>
        </div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v3_heading', 'Empowering Communities' ) ); ?>
        </h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v3_body', 'We believe chocolate should benefit everyone involved in its creation. Everything Cacao works closely with local cocoa processing companies and cocoa farmers in Ghana, ensuring fair trade practices and sustainable livelihoods. By choosing our chocolate, you contribute to empowering communities and supporting local industry in Ghana.' ) ); ?>
        </p>
      </div>

      <!-- Value Card 04 -->
      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5 border-t-4 border-accent-gold">
        <div class="w-14 h-14 rounded-full bg-accent-gold/10 flex items-center justify-center text-accent-gold text-2xl font-serif-luxury font-bold">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v4_number', '04' ) ); ?>
        </div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v4_heading', 'A Taste of Ghana' ) ); ?>
        </h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          <?php echo esc_html( ec_get_text_option( 'ec_about_v4_body', "Every bar of Everything Cacao tells a story of Ghanaian heritage and artisanal pride. From rich dark chocolate bars to creamy milk varieties and delightful treats, our products celebrate the distinct flavor of Ghana's cacao. Experience the true taste of Ghana with every bite." ) ); ?>
        </p>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       SECTION 3: OUR STORY
       Customizer: About Us Management → 3. Our Story
       ======================================================================== -->
  <section class="py-8 md:py-12 bg-canvas border-t border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 space-y-12">

      <!-- Section Heading -->
      <div class="text-center max-w-2xl mx-auto">
        <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark">
          <?php echo esc_html( ec_get_text_option( 'ec_about_story_heading', 'Our Story' ) ); ?>
        </h2>
      </div>

      <!-- Image + Text Container -->
      <div class="ec-animate max-w-6xl mx-auto rounded-3xl border-2 border-accent-gold/30 shadow-xl overflow-hidden bg-card-bg">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center">

          <!-- Left: Image -->
          <div class="p-6 md:p-8 border-b md:border-b-0 md:border-r border-cacao-dark/15 h-full flex items-center justify-center">
            <div class="w-full aspect-[16/10] md:aspect-[4/3] rounded-2xl overflow-hidden shadow-md border border-cacao-dark/10 group">
              <img src="<?php echo esc_url( ec_get_text_option( 'ec_about_story_image', 'https://everythingcacaogh.com/wp-content/uploads/2026/08/team_everythingcacao.jpg' ) ); ?>"
                   alt="Everything Cacao Team"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy" />
            </div>
          </div>

          <!-- Right: Text with Inner Dashed Border Box -->
          <div class="p-6 md:p-8 h-full flex items-center">
            <div class="w-full p-6 md:p-8 rounded-2xl border-2 border-dashed border-accent-gold/40 bg-canvas/70 space-y-4 shadow-sm relative">
              <div class="flex items-center space-x-3 text-accent-gold">
                <span class="w-8 h-[2px] bg-accent-gold inline-block"></span>
                <span class="text-[11px] font-semibold uppercase tracking-widest text-accent-gold">
                  <?php echo esc_html( ec_get_text_option( 'ec_about_story_tagline', 'CRAFTED IN GHANA' ) ); ?>
                </span>
              </div>
              <div class="space-y-3 text-sm md:text-base text-cacao-dark/90 leading-relaxed font-medium">
                <p>
                  <?php echo esc_html( ec_get_text_option( 'ec_about_story_para1', "Everything Cacao GH Ltd. is a proudly Ghanaian chocolate manufacturer, born in 2025 from a deep love for Ghana's cacao and a vision to share it with the world." ) ); ?>
                </p>
                <p>
                  <?php echo esc_html( ec_get_text_option( 'ec_about_story_para2', 'We craft premium chocolate right here in Ghana — celebrating the farmers, the land and the heritage behind every bar. From our everyday Cherelle range to our luxury Nahar collection, each piece of chocolate we make is a testament to what Ghanaian cocoa can become in the right hands.' ) ); ?>
                </p>
                <p class="font-semibold text-cacao-dark">
                  <?php echo esc_html( ec_get_text_option( 'ec_about_story_para3', 'We are more than a chocolate company. We are a celebration of Ghana.' ) ); ?>
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Story CTA Button -->
      <div class="text-center pt-2">
        <a href="<?php echo esc_url( ec_get_text_option( 'ec_about_story_btn_url', '/our-story' ) ); ?>"
           class="inline-block px-8 py-3.5 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest rounded-full hover:bg-accent-gold hover:text-cacao-dark transition-all duration-300 shadow-md">
          <?php echo esc_html( ec_get_text_option( 'ec_about_story_btn_label', 'View More →' ) ); ?>
        </a>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       SECTION 4: BRAND HIGHLIGHTS — Cherelle & Nahar
       Customizer: About Us Management → 4. Brand Highlights — Cherelle & Nahar
       ======================================================================== -->
  <section class="py-20 md:py-24 bg-card-bg border-t border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <div class="text-center max-w-2xl mx-auto space-y-3 mb-12">
        <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark">
          <?php echo esc_html( ec_get_text_option( 'ec_about_hl_title', 'Cherelle & Nahar' ) ); ?>
        </h2>
        <p class="text-text-muted text-sm leading-relaxed">
          <?php echo esc_html( ec_get_text_option( 'ec_about_hl_subtitle', "Together, Cherelle and Nahar represent our commitment to quality and passion for chocolate, ensuring there's something for everyone to enjoy at Everything Cacao" ) ); ?>
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

        <!-- Cherelle Card -->
        <div class="ec-animate ec-card-hover p-10 rounded-2xl bg-canvas border border-cherelle-caramel/30 space-y-6 shadow-sm relative overflow-hidden">
          <div class="flex justify-between items-center">
            <span class="text-xs font-semibold uppercase tracking-widest text-cherelle-caramel">
              <?php echo esc_html( ec_get_text_option( 'ec_about_ch_tag', 'Everyday Lifestyle' ) ); ?>
            </span>
            <span class="text-xs font-bold px-3 py-1 bg-cherelle-caramel/10 text-cherelle-caramel rounded-full">
              <?php echo esc_html( ec_get_text_option( 'ec_about_ch_badge', 'Joy & Togetherness' ) ); ?>
            </span>
          </div>
          <h3 class="font-serif-luxury text-3xl font-bold text-cacao-dark">
            <?php echo esc_html( ec_get_text_option( 'ec_about_ch_title', 'Cherelle: Delight in Every Bite' ) ); ?>
          </h3>
          <p class="text-base text-text-muted leading-relaxed font-medium">
            <?php echo esc_html( ec_get_text_option( 'ec_about_ch_body', 'Cherelle brings chocolate joy to everyone. Made from quality Ghanaian cocoa, our affordable bars are perfect for everyday moments — sharing with loved ones or treating yourself. Playful, approachable, and made for all ages, Cherelle keeps delicious moments within easy reach.' ) ); ?>
          </p>
        </div>

        <!-- Nahar Card -->
        <div class="ec-animate ec-card-hover p-10 rounded-2xl bg-cacao-dark text-canvas border border-accent-gold/40 space-y-6 shadow-xl relative overflow-hidden">
          <div class="flex justify-between items-center">
            <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">
              <?php echo esc_html( ec_get_text_option( 'ec_about_nh_tag', 'Artisanal Grand Luxury' ) ); ?>
            </span>
            <span class="text-xs font-bold px-3 py-1 bg-accent-gold/20 text-accent-gold rounded-full">
              <?php echo esc_html( ec_get_text_option( 'ec_about_nh_badge', 'Pinnacle Reserve' ) ); ?>
            </span>
          </div>
          <h3 class="font-serif-luxury text-3xl font-bold text-canvas">
            <?php echo esc_html( ec_get_text_option( 'ec_about_nh_title', 'Nahar: The Essence of Luxury' ) ); ?>
          </h3>
          <p class="text-base text-canvas/90 leading-relaxed font-medium">
            <?php echo esc_html( ec_get_text_option( 'ec_about_nh_body', "Nahar is our premium chocolate brand for the discerning palate. Crafted from the finest Ghanaian cocoa, each bar delivers sophisticated, complex flavor rooted in Ghana's cacao heritage. With elegant packaging and curated craftsmanship, Nahar is the perfect choice for gifting, special occasions, or personal indulgence." ) ); ?>
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================================
       SECTION 5: MISSION & VISION
       Customizer: About Us Management → 5. Mission & Vision
       ======================================================================== -->
  <section class="py-24 bg-canvas border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

        <!-- Mission Card -->
        <div class="ec-animate ec-card-hover p-10 bg-card-bg rounded-2xl border-l-8 border-accent-terracotta shadow-md space-y-4">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta block">
            <?php echo esc_html( ec_get_text_option( 'ec_about_mission_tag', 'Our Purpose' ) ); ?>
          </span>
          <h3 class="font-serif-luxury text-3xl font-bold text-cacao-dark">
            <?php echo esc_html( ec_get_text_option( 'ec_about_mission_heading', 'Mission Statement' ) ); ?>
          </h3>
          <p class="text-sm text-text-muted leading-relaxed italic font-serif-luxury">
            <?php echo esc_html( ec_get_text_option( 'ec_about_mission_body', '"At Everything Cacao GH Ltd., our mission is to transform the chocolate landscape in Ghana and beyond by producing exceptional products that celebrate the richness of our local cocoa while fostering sustainable practices. We aim to enhance the lives of our consumers through our flavorful offerings, drive economic growth within our community, and promote the cultural significance of cacao."' ) ); ?>
          </p>
        </div>

        <!-- Vision Card -->
        <div class="ec-animate ec-card-hover p-10 bg-card-bg rounded-2xl border-l-8 border-accent-gold shadow-md space-y-4">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold block">
            <?php echo esc_html( ec_get_text_option( 'ec_about_vision_tag', 'Our Horizon' ) ); ?>
          </span>
          <h3 class="font-serif-luxury text-3xl font-bold text-cacao-dark">
            <?php echo esc_html( ec_get_text_option( 'ec_about_vision_heading', 'Vision Statement' ) ); ?>
          </h3>
          <p class="text-sm text-text-muted leading-relaxed italic font-serif-luxury">
            <?php echo esc_html( ec_get_text_option( 'ec_about_vision_body', '"We envision a world where high-quality chocolate is not a luxury but a delightful experience accessible to all. We aspire to be a leading name in the chocolate industry, known for our innovative products, commitment to quality, and dedication to sustainability."' ) ); ?>
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================================
       SECTION 6: CUSTOMER REVIEWS / TESTIMONIALS
       Customizer: About Us Management → 6. Customer Reviews / Testimonials
       ======================================================================== -->
  <section class="py-24 bg-card-bg border-t border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

      <!-- Section Header -->
      <div class="text-center max-w-2xl mx-auto space-y-4 mb-16">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">
          <?php echo esc_html( ec_get_text_option( 'ec_about_rev_tag', 'Real People, Real Joy' ) ); ?>
        </span>
        <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark">
          <?php echo esc_html( ec_get_text_option( 'ec_about_rev_title', 'What our Customer says about us' ) ); ?>
        </h2>
        <p class="text-text-muted text-sm">
          <?php echo esc_html( ec_get_text_option( 'ec_about_rev_desc', 'Watch chocolate lovers across Ghana sample Cherelle and Nahar artisanal creations live in supermarkets, pop-up lounges, and luxury retail stores.' ) ); ?>
        </p>
      </div>

      <!-- 4-Column Video Reel Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        <!-- Reel 1 -->
        <div class="ec-animate ec-card-hover group bg-cacao-dark rounded-xl overflow-hidden border border-cacao-dark/10 shadow-lg flex flex-col justify-between">
          <div class="aspect-[9/16] bg-nahar-obsidian relative overflow-hidden">
            <iframe class="w-full h-full border-0"
                    src="<?php echo esc_url( ec_get_text_option( 'ec_about_r1_url', 'https://drive.google.com/file/d/1JUC7nwQjQpqLD8z7WnyhiyPtkV6rkcvG/preview' ) ); ?>"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="absolute top-3 left-3 bg-accent-gold text-cacao-dark text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow pointer-events-none z-10">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r1_badge', 'Live Sampling' ) ); ?>
            </div>
          </div>
          <div class="p-5 bg-card-bg space-y-1">
            <h5 class="font-serif-luxury text-base font-bold text-cacao-dark">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r1_title', 'Supermarket Tasting Reel #1' ) ); ?>
            </h5>
            <p class="text-xs text-text-muted">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r1_desc', 'Customers discovering Cherelle 45% Milk Chocolate.' ) ); ?>
            </p>
          </div>
        </div>

        <!-- Reel 2 -->
        <div class="ec-animate ec-card-hover group bg-cacao-dark rounded-xl overflow-hidden border border-cacao-dark/10 shadow-lg flex flex-col justify-between">
          <div class="aspect-[9/16] bg-nahar-obsidian relative overflow-hidden">
            <iframe class="w-full h-full border-0"
                    src="<?php echo esc_url( ec_get_text_option( 'ec_about_r2_url', 'https://drive.google.com/file/d/1pKLN1VVG15IKg_WP6RUlZ8eD3UJnX1yW/preview' ) ); ?>"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="absolute top-3 left-3 bg-accent-terracotta text-white text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow pointer-events-none z-10">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r2_badge', 'Nahar Luxury Tasting' ) ); ?>
            </div>
          </div>
          <div class="p-5 bg-card-bg space-y-1">
            <h5 class="font-serif-luxury text-base font-bold text-cacao-dark">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r2_title', 'Grand Reserve Sampling #2' ) ); ?>
            </h5>
            <p class="text-xs text-text-muted">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r2_desc', 'Discerning palates savoring Nahar 72% Obsidian Dark.' ) ); ?>
            </p>
          </div>
        </div>

        <!-- Reel 3 -->
        <div class="ec-animate ec-card-hover group bg-cacao-dark rounded-xl overflow-hidden border border-cacao-dark/10 shadow-lg flex flex-col justify-between">
          <div class="aspect-[9/16] bg-nahar-obsidian relative overflow-hidden">
            <iframe class="w-full h-full border-0"
                    src="<?php echo esc_url( ec_get_text_option( 'ec_about_r3_url', 'https://drive.google.com/file/d/15lB6wkq0Cg6NT4pACbXxZiokmdDYtcE0/preview' ) ); ?>"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="absolute top-3 left-3 bg-accent-gold text-cacao-dark text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow pointer-events-none z-10">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r3_badge', 'Retail Pop-Up' ) ); ?>
            </div>
          </div>
          <div class="p-5 bg-card-bg space-y-1">
            <h5 class="font-serif-luxury text-base font-bold text-cacao-dark">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r3_title', 'Accra Retail Pop-Up #3' ) ); ?>
            </h5>
            <p class="text-xs text-text-muted">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r3_desc', 'Interactive tasting counter at Accra shopping mall.' ) ); ?>
            </p>
          </div>
        </div>

        <!-- Reel 4 -->
        <div class="ec-animate ec-card-hover group bg-cacao-dark rounded-xl overflow-hidden border border-cacao-dark/10 shadow-lg flex flex-col justify-between">
          <div class="aspect-[9/16] bg-nahar-obsidian relative overflow-hidden">
            <iframe class="w-full h-full border-0"
                    src="<?php echo esc_url( ec_get_text_option( 'ec_about_r4_url', 'https://drive.google.com/file/d/1FQK5L6ErULSbr0Wd_VKoGYcJo463HVYC/preview' ) ); ?>"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="absolute top-3 left-3 bg-cherelle-caramel text-white text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow pointer-events-none z-10">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r4_badge', 'Family & Kids Joy' ) ); ?>
            </div>
          </div>
          <div class="p-5 bg-card-bg space-y-1">
            <h5 class="font-serif-luxury text-base font-bold text-cacao-dark">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r4_title', 'Joy in Every Bite #4' ) ); ?>
            </h5>
            <p class="text-xs text-text-muted">
              <?php echo esc_html( ec_get_text_option( 'ec_about_r4_desc', 'Delighting young chocolate lovers with Cherelle treats.' ) ); ?>
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Elementor / WP Content Support Area -->
  <div class="elementor-content-container" style="margin:0;padding:0;">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
  </div>

<?php
get_footer();
