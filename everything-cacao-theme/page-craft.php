<?php
/**
 * Template Name: Our Craft
 *
 * Everything Cacao GH - Our Craft Page Template (page-craft.php)
 *
 * @package EverythingCacao
 */

get_header();
?>

  <!-- Hero Banner -->
  <section class="py-20 bg-cacao-dark text-canvas border-b border-canvas/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12 text-center space-y-6">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Official Brand Story &amp; Vision</span>
      <h1 class="font-serif-luxury text-4xl md:text-6xl font-bold leading-tight"><?php echo esc_html(ec_get_text_option('ec_craft_hero_title', 'Everything Cacao')); ?></h1>
      <p class="text-canvas/80 text-base max-w-3xl mx-auto leading-relaxed">
        <?php echo esc_html(ec_get_text_option('ec_craft_hero_subtitle', "Celebrating the rich heritage of Ghana's cacao and the art of transforming processed cocoa into premium chocolate.")); ?>
      </p>


    </div>
  </section>

  <!-- Brand Story & Core Pillars Section -->
  <section id="about" class="py-24 md:py-32 max-w-7xl mx-auto px-6 md:px-12">
    <div class="text-center max-w-3xl mx-auto space-y-5 mb-20 ec-animate">
      <span class="text-sm font-semibold uppercase tracking-widest text-accent-terracotta">Our Journey</span>
      <h2 class="font-serif-luxury text-4xl md:text-5xl lg:text-6xl font-bold text-cacao-dark leading-tight"><?php echo esc_html(ec_get_text_option('ec_craft_sec_title', "Ghana's Chocolate Story — Grown Here, Made Here")); ?></h2>
      <p class="text-cacao-dark/80 text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
        <?php echo esc_html(ec_get_text_option('ec_craft_sec_subtitle', "Everything Cacao was born from a passion for Ghana's cacao and a belief that the world's finest chocolate starts right here. We transform premium Ghanaian cocoa into exceptional chocolate — honouring our land, our farmers and the traditions that make Ghanaian cacao among the best in the world.")); ?>
      </p>
    </div>

    <!-- 4 Brand Pillars Grid (2x2 Layout for optimal breathing room) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 max-w-6xl mx-auto">
      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5">
        <div class="w-14 h-14 rounded-full bg-cacao-dark/5 flex items-center justify-center text-accent-terracotta text-2xl font-serif-luxury font-bold">01</div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_pillar1_title', 'Crafting Chocolate with Care')); ?></h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          <?php echo esc_html(ec_get_text_option('ec_pillar1_text', "We source high-quality, processed cocoa from local suppliers who share our commitment to excellence. By collaborating closely with these farmers, we ensure that every batch reflects the unique flavors and characteristics of Ghanaian cacao. Our team of skilled artisans takes this exceptional cocoa and transforms it into a range of delightful chocolate bars, each crafted with precision and love.")); ?>
        </p>
      </div>

      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5 border-t-4 border-accent-gold">
        <div class="w-14 h-14 rounded-full bg-accent-gold/10 flex items-center justify-center text-accent-gold text-2xl font-serif-luxury font-bold">02</div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_pillar2_title', 'Quality You Can Trust')); ?></h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          <?php echo esc_html(ec_get_text_option('ec_pillar2_text', "Certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA), Everything Cacao is dedicated to maintaining the highest standards of safety and quality. Our rigorous processes ensure that every chocolate bar you enjoy is not only delicious but also meets stringent regulatory requirements, giving you peace of mind with every bite.")); ?>
        </p>
      </div>

      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5">
        <div class="w-14 h-14 rounded-full bg-cacao-dark/5 flex items-center justify-center text-accent-terracotta text-2xl font-serif-luxury font-bold">03</div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_pillar3_title', 'Empowering Communities')); ?></h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          <?php echo esc_html(ec_get_text_option('ec_pillar3_text', "We believe chocolate should benefit everyone involved in its creation. Everything Cacao works closely with local cocoa processing companies and cocoa farmers in Ghana, ensuring fair trade practices and sustainable livelihoods. By choosing our chocolate, you contribute to empowering communities and supporting local industry in Ghana.")); ?>
        </p>
      </div>

      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5">
        <div class="w-14 h-14 rounded-full bg-cacao-dark/5 flex items-center justify-center text-accent-terracotta text-2xl font-serif-luxury font-bold">04</div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark"><?php echo esc_html(ec_get_text_option('ec_pillar4_title', 'A Taste of Ghana')); ?></h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          <?php echo esc_html(ec_get_text_option('ec_pillar4_text', "Every bar of Everything Cacao tells a story of Ghanaian heritage and artisanal pride. From rich dark chocolate bars to creamy milk varieties and delightful treats, our products celebrate the distinct flavor of Ghana's cacao. Experience the true taste of Ghana with every bite.")); ?>
        </p>
      </div>
    </div>
  </section>

  <!-- Two Lineages Write-Up: Cherelle vs Nahar -->
  <section class="py-20 md:py-24 bg-card-bg border-t border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <div class="text-center max-w-2xl mx-auto space-y-3 mb-12">
        <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark">Cherelle &amp; Nahar</h2>
        <p class="text-text-muted text-sm leading-relaxed">
          Together, Cherelle and Nahar represent our commitment to quality and passion for chocolate, ensuring there’s something for everyone to enjoy at Everything Cacao
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Cherelle Write-Up -->
        <div class="ec-animate ec-card-hover p-10 rounded-2xl bg-canvas border border-cherelle-caramel/30 space-y-6 shadow-sm relative overflow-hidden">
          <div class="flex justify-between items-center">
            <span class="text-xs font-semibold uppercase tracking-widest text-cherelle-caramel">Everyday Lifestyle</span>
            <span class="text-xs font-bold px-3 py-1 bg-cherelle-caramel/10 text-cherelle-caramel rounded-full">Joy &amp; Togetherness</span>
          </div>
          <h3 class="font-serif-luxury text-3xl font-bold text-cacao-dark">Cherelle: Delight in Every Bite</h3>
          <p class="text-base text-text-muted leading-relaxed font-medium">
            <?php echo esc_html(ec_get_text_option('ec_craft_cherelle_writeup', 'Cherelle brings chocolate joy to everyone. Made from quality Ghanaian cocoa, our affordable bars are perfect for everyday moments — sharing with loved ones or treating yourself. Playful, approachable, and made for all ages, Cherelle keeps delicious moments within easy reach.')); ?>
          </p>
        </div>

        <!-- Nahar Write-Up -->
        <div class="ec-animate ec-card-hover p-10 rounded-2xl bg-cacao-dark text-canvas border border-accent-gold/40 space-y-6 shadow-xl relative overflow-hidden">
          <div class="flex justify-between items-center">
            <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Artisanal Grand Luxury</span>
            <span class="text-xs font-bold px-3 py-1 bg-accent-gold/20 text-accent-gold rounded-full">Pinnacle Reserve</span>
          </div>
          <h3 class="font-serif-luxury text-3xl font-bold text-canvas">Nahar: The Essence of Luxury</h3>
          <p class="text-base text-canvas/90 leading-relaxed font-medium">
            <?php echo esc_html(ec_get_text_option('ec_craft_nahar_writeup', "Nahar is our premium chocolate brand for the discerning palate. Crafted from the finest Ghanaian cocoa, each bar delivers sophisticated, complex flavor rooted in Ghana's cacao heritage. With elegant packaging and curated craftsmanship, Nahar is the perfect choice for gifting, special occasions, or personal indulgence.")); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Mission & Vision Section -->
  <section class="py-24 bg-canvas border-b border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Mission Statement -->
        <div class="ec-animate ec-card-hover p-10 bg-card-bg rounded-2xl border-l-8 border-accent-terracotta shadow-md space-y-4">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta block">Our Purpose</span>
          <h3 class="font-serif-luxury text-3xl font-bold text-cacao-dark">Mission Statement</h3>
          <p class="text-sm text-text-muted leading-relaxed italic font-serif-luxury">
            "At Everything Cacao, our mission is to transform the rich heritage of Ghanaian cacao into exceptional chocolate experiences that delight the senses. Through our brands—Cherelle, bringing joy to every palate, and Nahar, offering a taste of luxury—we are committed to quality, sustainability, and community empowerment. We strive to create delicious moments that connect people, celebrate our culture, and support local farmers, ensuring that every bite reflects our passion for excellence and the spirit of Ghana."
          </p>
        </div>

        <!-- Vision Statement -->
        <div class="ec-animate ec-card-hover p-10 bg-card-bg rounded-2xl border-l-8 border-accent-gold shadow-md space-y-4">
          <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold block">Our Horizon</span>
          <h3 class="font-serif-luxury text-3xl font-bold text-cacao-dark">Vision Statement</h3>
          <p class="text-sm text-text-muted leading-relaxed italic font-serif-luxury">
            "Our vision at Everything Cacao is to become a globally recognized leader in premium chocolate, celebrated for our commitment to quality and the rich flavors of Ghanaian cacao. We aspire to create a world where our chocolates, under the Cherelle and Nahar brands, are enjoyed by communities locally and abroad, bridging cultures and bringing people together through the joy of exceptional chocolate. We envision a sustainable future where our partnerships with local farmers empower communities, and every bite of our chocolate tells the story of Ghana’s vibrant heritage."
          </p>
        </div>
      </div>
    </div>
  </section>



  <!-- OUR GALLERY Section -->
  <section class="py-24 bg-card-bg border-t border-cacao-dark/10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
      <div class="text-center max-w-2xl mx-auto space-y-4 mb-16">
        <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Visual Showcase</span>
        <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark">OUR GALLERY</h2>
        <p class="text-text-muted text-sm">Explore our cocoa processing, artisanal tempering, packaging atelier, and finished Cherelle &amp; Nahar collections.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="ec-animate ec-card-hover group relative aspect-square overflow-hidden rounded-xl bg-cacao-dark shadow-md">
          <img src="<?php echo esc_url(ec_get_smart_image_url('ec_gallery_1', 'Nahar dark choc long.png')); ?>" alt="Nahar 72% Dark Chocolate Long Bar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
          <div class="absolute inset-0 bg-cacao-dark/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-canvas">
            <span class="text-xs text-accent-gold uppercase font-semibold">Nahar Collection</span>
            <h5 class="font-serif-luxury font-bold text-lg">72% Dark Obsidian Long Bar</h5>
          </div>
        </div>

        <div class="group relative aspect-square overflow-hidden rounded-xl bg-cacao-dark shadow-md">
          <img src="<?php echo esc_url(ec_get_smart_image_url('ec_gallery_2', 'Cherelle Milk Chocolate 90g.jpg')); ?>" alt="Cherelle 45% Milk Chocolate Bar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
          <div class="absolute inset-0 bg-cacao-dark/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-canvas">
            <span class="text-xs text-accent-gold uppercase font-semibold">Cherelle Collection</span>
            <h5 class="font-serif-luxury font-bold text-lg">45% Milk Chocolate Artisanal Bar</h5>
          </div>
        </div>

        <div class="group relative aspect-square overflow-hidden rounded-xl bg-cacao-dark shadow-md">
          <img src="<?php echo esc_url(ec_get_smart_image_url('ec_gallery_3', '4.png')); ?>" alt="Ashanti Gold Truffle Box" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
          <div class="absolute inset-0 bg-cacao-dark/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-canvas">
            <span class="text-xs text-accent-gold uppercase font-semibold">Bespoke Gifting</span>
            <h5 class="font-serif-luxury font-bold text-lg">Ashanti Gold Truffle Collection</h5>
          </div>
        </div>

        <div class="group relative aspect-square overflow-hidden rounded-xl bg-cacao-dark shadow-md">
          <img src="<?php echo esc_url(ec_get_smart_image_url('ec_gallery_4', '5.png')); ?>" alt="Royal Ghanaian Luxury Cacao Hamper" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
          <div class="absolute inset-0 bg-cacao-dark/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-canvas">
            <span class="text-xs text-accent-gold uppercase font-semibold">Luxury Gifting</span>
            <h5 class="font-serif-luxury font-bold text-lg">Royal Ghanaian Luxury Hamper</h5>
          </div>
        </div>

        <div class="group relative aspect-square overflow-hidden rounded-xl bg-cacao-dark shadow-md">
          <img src="<?php echo esc_url(ec_get_smart_image_url('ec_gallery_5', 'Nahar dark choc small.png')); ?>" alt="Nahar Executive Mini Box" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
          <div class="absolute inset-0 bg-cacao-dark/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-canvas">
            <span class="text-xs text-accent-gold uppercase font-semibold">Executive Collection</span>
            <h5 class="font-serif-luxury font-bold text-lg">Nahar 72% Mini Square Box</h5>
          </div>
        </div>

        <div class="group relative aspect-square overflow-hidden rounded-xl bg-cacao-dark shadow-md">
          <img src="<?php echo esc_url(ec_get_smart_image_url('ec_gallery_6', 'Cherelle Milk Chocolate 50g.jpg')); ?>" alt="Cherelle Delights Snack Pouch" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
          <div class="absolute inset-0 bg-cacao-dark/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-canvas">
            <span class="text-xs text-accent-gold uppercase font-semibold">On-The-Go Snacking</span>
            <h5 class="font-serif-luxury font-bold text-lg">Cherelle Delights Standup Pouch</h5>
          </div>
        </div>

        <!-- Gallery 7: In-Store Sampling Video 1 -->
        <div class="group relative aspect-square overflow-hidden rounded-xl bg-cacao-dark shadow-md">
          <iframe class="w-full h-full border-0" src="https://drive.google.com/file/d/1JUC7nwQjQpqLD8z7WnyhiyPtkV6rkcvG/preview" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          <div class="absolute top-3 left-3 bg-accent-gold text-cacao-dark text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow z-10 pointer-events-none">
            In-Store Sampling Reel
          </div>
        </div>

        <!-- Gallery 8: In-Store Sampling Video 2 -->
        <div class="group relative aspect-square overflow-hidden rounded-xl bg-cacao-dark shadow-md">
          <iframe class="w-full h-full border-0" src="https://drive.google.com/file/d/1pKLN1VVG15IKg_WP6RUlZ8eD3UJnX1yW/preview" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          <div class="absolute top-3 left-3 bg-accent-terracotta text-white text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow z-10 pointer-events-none">
            In-Store Tasting Reel
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Elementor / WP Content Support Area -->
  <div class="elementor-content-container">
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


