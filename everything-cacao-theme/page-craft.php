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
      <h1 class="font-serif-luxury text-4xl md:text-6xl font-bold leading-tight">Everything Cacao</h1>
      <p class="text-canvas/80 text-base max-w-3xl mx-auto leading-relaxed">
        Celebrating the rich heritage of Ghana’s cacao and the art of transforming processed cocoa into premium chocolate.
      </p>

      <!-- FDA & GSA Certification Badges -->
      <div class="pt-4 flex flex-wrap justify-center items-center gap-6 text-xs text-accent-gold font-semibold uppercase tracking-widest">
        <div class="flex items-center gap-2 bg-canvas/10 px-4 py-2 rounded-full border border-accent-gold/30">
          <svg class="w-4 h-4 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <span>FDA Certified (Food &amp; Drug Authority)</span>
        </div>
        <div class="flex items-center gap-2 bg-canvas/10 px-4 py-2 rounded-full border border-accent-gold/30">
          <svg class="w-4 h-4 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <span>GSA Certified (Ghana Standards Authority)</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Brand Story & Core Pillars Section -->
  <section id="about" class="py-24 md:py-32 max-w-7xl mx-auto px-6 md:px-12">
    <div class="text-center max-w-3xl mx-auto space-y-5 mb-20 ec-animate">
      <span class="text-sm font-semibold uppercase tracking-widest text-accent-terracotta">Our Journey</span>
      <h2 class="font-serif-luxury text-4xl md:text-5xl lg:text-6xl font-bold text-cacao-dark leading-tight">Ghana's Chocolate Story &mdash; Grown Here, Made Here</h2>
      <p class="text-cacao-dark/80 text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
        Everything Cacao was born from a passion for Ghana's cacao and a belief that the world's finest chocolate starts right here. We transform premium Ghanaian cocoa into exceptional chocolate &mdash; honouring our land, our farmers and the traditions that make Ghanaian cacao among the best in the world.
      </p>
    </div>

    <!-- 4 Brand Pillars Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5">
        <div class="w-14 h-14 rounded-full bg-cacao-dark/5 flex items-center justify-center text-accent-terracotta text-2xl font-serif-luxury font-bold">01</div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">Crafting Chocolate with Care</h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          We source high-quality, processed cocoa from local suppliers who share our commitment to excellence. By collaborating closely with these farmers, we ensure that every batch reflects the unique flavors and characteristics of Ghanaian cacao. Our team of skilled artisans takes this exceptional cocoa and transforms it into a range of delightful chocolate bars, each crafted with precision and love.
        </p>
      </div>

      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5 border-t-4 border-accent-gold">
        <div class="w-14 h-14 rounded-full bg-accent-gold/10 flex items-center justify-center text-accent-gold text-2xl font-serif-luxury font-bold">02</div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">Quality You Can Trust</h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          Certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA), Everything Cacao is dedicated to maintaining the highest standards of safety and quality. Our rigorous processes ensure that every chocolate bar you enjoy is not only delicious but also meets stringent regulatory requirements, giving you peace of mind with every bite.
        </p>
      </div>

      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5">
        <div class="w-14 h-14 rounded-full bg-cacao-dark/5 flex items-center justify-center text-accent-terracotta text-2xl font-serif-luxury font-bold">03</div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">Empowering Communities</h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          We believe in the power of chocolate to bring people together. By working with local farmers and suppliers, we help support sustainable practices and fair trade, fostering economic growth in our communities. Our commitment extends beyond our chocolate; it's about building a brighter future for all those involved in the cacao supply chain.
        </p>
      </div>

      <div class="ec-animate ec-card-hover bg-card-bg p-8 md:p-10 rounded-xl border border-cacao-dark/10 shadow-sm space-y-5">
        <div class="w-14 h-14 rounded-full bg-cacao-dark/5 flex items-center justify-center text-accent-terracotta text-2xl font-serif-luxury font-bold">04</div>
        <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">A Taste of Ghana</h3>
        <p class="text-sm md:text-base text-cacao-dark/75 leading-relaxed">
          At Everything Cacao, we're passionate about sharing the rich flavors of Ghana with the world. From our creamy milk chocolate to our bold dark chocolate, each bar is a celebration of the unique tastes and traditions of our homeland. We invite you to indulge in our creations and experience the joy that comes from chocolate made with heart.
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
          <p class="text-sm text-text-muted leading-relaxed">
            Cherelle is our brand dedicated to bringing the joy of chocolate to everyone. With a focus on accessibility and affordability, Cherelle offers a delightful range of chocolate bars that cater to all taste preferences. Crafted from high-quality processed cocoa, each product is designed to be an everyday treat, perfect for sharing with friends and family or indulging in a moment of self-care.
          </p>
          <p class="text-sm text-text-muted leading-relaxed">
            Cherelle embodies the spirit of community and togetherness, making it easy for everyone to enjoy the rich flavors of Ghanaian cacao. Our approachable packaging and playful branding invite chocolate lovers of all ages to experience the happiness that only chocolate can bring. With Cherelle, delicious moments are always within reach.
          </p>
        </div>

        <!-- Nahar Write-Up -->
        <div class="ec-animate ec-card-hover p-10 rounded-2xl bg-cacao-dark text-canvas border border-accent-gold/40 space-y-6 shadow-xl relative overflow-hidden">
          <div class="flex justify-between items-center">
            <span class="text-xs font-semibold uppercase tracking-widest text-accent-gold">Artisanal Grand Luxury</span>
            <span class="text-xs font-bold px-3 py-1 bg-accent-gold/20 text-accent-gold rounded-full">Pinnacle Reserve</span>
          </div>
          <h3 class="font-serif-luxury text-3xl font-bold text-canvas">Nahar: The Essence of Luxury</h3>
          <p class="text-sm text-canvas/80 leading-relaxed">
            Nahar is our premium brand, where chocolate becomes an exquisite experience. Designed for discerning palates, Nahar showcases the finest processed cocoa, expertly crafted into luxurious chocolate bars that elevate any occasion. With an emphasis on sophistication and flavor complexity, each Nahar product is a journey into the heart of Ghana’s cacao heritage.
          </p>
          <p class="text-sm text-canvas/80 leading-relaxed">
            From elegantly designed packaging to carefully curated flavors, Nahar is a celebration of quality and craftsmanship. Ideal for special occasions, gifts, or a personal indulgence, Nahar embodies the essence of luxury, offering chocolate lovers a unique experience that transcends the ordinary.
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

  <!-- OUR TEAM Section -->
  <section id="team" class="py-24 max-w-7xl mx-auto px-6 md:px-12">
    <div class="text-center max-w-2xl mx-auto space-y-4 mb-16">
      <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta">Leadership &amp; Artisans</span>
      <h2 class="font-serif-luxury text-3xl md:text-5xl font-bold text-cacao-dark">OUR TEAM</h2>
      <p class="text-text-muted text-sm">Meet the passionate minds and master chocolatiers behind Everything Cacao</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <?php
      $team_query = new WP_Query(array(
          'post_type'      => 'ec_team_member',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
      ));

      if ($team_query->have_posts()) :
          while ($team_query->have_posts()) : $team_query->the_post();
              $subtitle = get_post_meta(get_the_ID(), 'team_subtitle', true);
              $bio      = get_post_meta(get_the_ID(), 'team_bio', true) ?: get_the_excerpt();
              $img_url  = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: get_template_directory_uri() . '/assets/images/products/6.png';
              ?>
              <div class="ec-animate ec-card-hover bg-card-bg rounded-xl overflow-hidden border border-cacao-dark/10 shadow-sm group hover:shadow-xl transition-all">
                <div class="aspect-[4/5] bg-cacao-dark overflow-hidden relative">
                  <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>
                <div class="p-6 space-y-2">
                  <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php the_title(); ?></h4>
                  <?php if ($subtitle) : ?>
                    <span class="text-[11px] font-semibold text-accent-terracotta uppercase tracking-wider block"><?php echo esc_html($subtitle); ?></span>
                  <?php endif; ?>
                  <p class="text-xs text-text-muted"><?php echo esc_html($bio); ?></p>
                </div>
              </div>
              <?php
          endwhile;
          wp_reset_postdata();
      else :
          // Default fallback team display until client adds team members in WP Admin
          $default_team = array(
              array('name' => 'Managing Director & Founder', 'subtitle' => 'Strategic Vision & Heritage', 'bio' => 'Championing local Ghanaian cocoa transformation, fair-trade empowerment, and international brand expansion.', 'img' => '/assets/images/products/6.png'),
              array('name' => 'Master Chocolatier & Product Lead', 'subtitle' => 'Confection Craftsmanship', 'bio' => 'Over 12 years of experience in cocoa conching, micro-batch roasting, and signature flavor profiling.', 'img' => '/assets/images/products/4.png'),
              array('name' => 'Head of Quality & FDA/GSA Compliance', 'subtitle' => 'Standards & Regulatory Safety', 'bio' => 'Ensuring strict adherence to Ghana Standards Authority (GSA) and Food & Drug Authority (FDA) certifications.', 'img' => '/assets/images/products/3.png'),
              array('name' => 'Farmer Relations & Sourcing Lead', 'subtitle' => 'Community Engagement', 'bio' => 'Coordinating direct partnerships with cocoa farming co-operatives across Suhum, Assin Fosu, and Sefwi Wiawso.', 'img' => '/assets/images/products/Cherelle Milk Chocolate 90g.jpg'),
          );
          foreach ($default_team as $member) :
              ?>
              <div class="ec-animate ec-card-hover bg-card-bg rounded-xl overflow-hidden border border-cacao-dark/10 shadow-sm group hover:shadow-xl transition-all">
                <div class="aspect-[4/5] bg-cacao-dark overflow-hidden relative">
                  <img src="<?php echo esc_url(get_template_directory_uri() . $member['img']); ?>" alt="<?php echo esc_attr($member['name']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>
                <div class="p-6 space-y-2">
                  <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark"><?php echo esc_html($member['name']); ?></h4>
                  <span class="text-[11px] font-semibold text-accent-terracotta uppercase tracking-wider block"><?php echo esc_html($member['subtitle']); ?></span>
                  <p class="text-xs text-text-muted"><?php echo esc_html($member['bio']); ?></p>
                </div>
              </div>
              <?php
          endforeach;
      endif;
      ?>
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


