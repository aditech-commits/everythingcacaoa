<?php
/**
 * Everything Cacao GH - Theme Functions & Configuration
 *
 * @package EverythingCacao
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * 1. Theme Setup
 */
function ec_theme_setup() {
    // Add theme support features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption', 'style', 'script'));

    // ── Block Editor & Page Builder Compatibility ───────────────────────────
    // Enables Gutenberg full/wide alignment for blocks
    add_theme_support('align-wide');

    // Loads block editor CSS in the editor so blocks look correct
    add_theme_support('wp-block-styles');

    // Responsive embeds (YouTube, Vimeo, etc.) inside Gutenberg/Elementor
    add_theme_support('responsive-embeds');

    // Allows editor stylesheets so Elementor/Gutenberg match front-end
    add_theme_support('editor-styles');
    add_editor_style('assets/css/tailwind.css');

    // ── Elementor & Page Builder Full Compatibility ──────────────────────
    add_theme_support('elementor');

    // Custom line-height and spacing controls in block editor
    add_theme_support('custom-line-height');
    add_theme_support('custom-spacing');

    // Custom colour palette — exposed to Gutenberg, Elementor, WPBakery
    add_theme_support('editor-color-palette', array(
        array('name' => 'Cacao Dark',     'slug' => 'cacao-dark',     'color' => '#1A0F0A'),
        array('name' => 'Canvas',         'slug' => 'canvas',         'color' => '#FAF7F2'),
        array('name' => 'Accent Gold',    'slug' => 'accent-gold',    'color' => '#D4AF37'),
        array('name' => 'Accent Terracotta','slug'=> 'accent-terracotta','color'=> '#C86D51'),
        array('name' => 'Cherelle Caramel','slug'=> 'cherelle-caramel','color'=> '#B8854A'),
        array('name' => 'Card BG',        'slug' => 'card-bg',        'color' => '#F5EDE4'),
    ));

    // Custom font size presets — exposed to Gutenberg & page builders
    add_theme_support('editor-font-sizes', array(
        array('name' => 'Small',    'size' => 12, 'slug' => 'small'),
        array('name' => 'Regular',  'size' => 16, 'slug' => 'regular'),
        array('name' => 'Large',    'size' => 24, 'slug' => 'large'),
        array('name' => 'XL',       'size' => 36, 'slug' => 'x-large'),
        array('name' => 'Headline', 'size' => 56, 'slug' => 'headline'),
    ));
    // ── End Block Editor & Page Builder Compatibility ───────────────────────

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation (Header)', 'everything-cacao'),
        'mobile'  => __('Mobile Drawer Menu', 'everything-cacao'),
        'footer'  => __('Footer Navigation Links', 'everything-cacao'),
    ));
}
add_action('after_setup_theme', 'ec_theme_setup');

/**
 * 1b. SEO: Dynamic Document Titles (replaces manual <title> tags in header.php)
 */
function ec_seo_document_title($title) {
    if (is_front_page()) {
        return 'Buy Ghanaian Chocolate Online | Everything Cacao';
    } elseif (is_page(array('craft', 'our-craft', 'about', 'about-us'))) {
        return 'About Everything Cacao | Ghana\'s Premium Chocolate Maker';
    } elseif (is_page(array('collections', 'our-collections', 'shop'))) {
        return 'Buy Chocolate Online in Ghana | Everything Cacao Shop';
    } elseif (is_page(array('concierge', 'stock-lists', 'stockists', 'contact'))) {
        return 'Contact Everything Cacao | Get in Touch';
    }
    return $title;
}
add_filter('pre_get_document_title', 'ec_seo_document_title');

/**
 * 1c. SEO: Meta Description output via wp_head
 */
function ec_seo_meta_description() {
    $desc = 'Shop Nahar and Cherelle — premium chocolate made from Ghana\'s finest cacao. Milk and dark bars available across Accra and Ghana. FDA and GSA certified.';

    if (is_front_page()) {
        $desc = 'Shop Nahar and Cherelle — premium chocolate made from Ghana\'s finest cacao. Milk and dark bars available across Accra and Ghana. FDA and GSA certified.';
    } elseif (is_page(array('craft', 'our-craft', 'about', 'about-us'))) {
        $desc = 'Learn the story behind Everything Cacao — a proudly Ghanaian chocolate company committed to quality, sustainability and supporting local cacao farmers.';
    } elseif (is_page(array('collections', 'our-collections', 'shop'))) {
        $desc = 'Shop Nahar and Cherelle chocolate bars online. Premium and everyday Ghanaian chocolate delivered across Accra and Ghana. Milk, dark and mini bars available.';
    } elseif (is_page(array('concierge', 'stock-lists', 'stockists', 'contact'))) {
        $desc = 'Get in touch with Everything Cacao for orders, wholesale enquiries or general questions. We\'d love to hear from you.';
    }

    echo '<meta name="description" content="' . esc_attr($desc) . '"/>' . "\n";
}
add_action('wp_head', 'ec_seo_meta_description', 1);

/**
 * Elementor: Load theme fonts/CSS inside Elementor editor preview
 * so it looks identical to the live front-end.
 */
add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style('ec-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0.0');
    wp_enqueue_style('ec-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap', array(), null);
});

/**
 * Elementor: Load theme CSS in Elementor front-end widgets view
 */
add_action('elementor/frontend/after_enqueue_scripts', function() {
    wp_enqueue_style('ec-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0.0');
});

/**
 * 2. Enqueue Scripts & Stylesheets
 */
function ec_enqueue_assets() {
    // Compiled Tailwind CSS
    wp_enqueue_style('ec-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0.0');

    // Google Fonts (Playfair Display & Hanken Grotesk)
    wp_enqueue_style('ec-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap', array(), null);

    // Theme JS Scripts
    wp_enqueue_script('ec-pixel', get_template_directory_uri() . '/assets/js/pixel-events.js', array(), '1.0.0', true);
    wp_enqueue_script('ec-app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ec-functions', get_template_directory_uri() . '/functions.js', array('ec-app'), '1.0.0', true);

    // Localize Script for AJAX & WP Nonces
    wp_localize_script('ec-app', 'EC_WP_Data', array(
        'ajax_url'       => admin_url('admin-ajax.php'),
        'nonce'          => wp_create_nonce('ec_concierge_nonce'),
        'concierge_email'=> get_option('ec_concierge_email', 'info@everythingcacaogh.com'),
        'whatsapp_num'   => get_option('ec_whatsapp_number', '233240661866'),
    ));
}
add_action('wp_enqueue_scripts', 'ec_enqueue_assets');

// Prevent empty Elementor content containers from creating whitespace and provide continuous marquee animation
add_action('wp_enqueue_scripts', function() {
    wp_add_inline_style('ec-tailwind', '.elementor-content-container:empty { display:none; } .elementor-content-container { margin:0; padding:0; } @keyframes ecMarquee { 0% { transform: translateX(0%); } 100% { transform: translateX(-50%); } } .ec-marquee-wrapper { display: flex; overflow: hidden; white-space: nowrap; user-select: none; } .ec-marquee-track { display: flex; flex-shrink: 0; min-width: 100%; animation: ecMarquee 25s linear infinite; } .ec-marquee-wrapper:hover .ec-marquee-track { animation-play-state: paused; }');
});


/**
 * Smart Template Router Fallback
 * Guarantees /contact and /stockist URLs render their custom page templates cleanly.
 */
add_filter('template_include', function($template) {
    if (is_admin()) {
        return $template;
    }

    $request_uri = strtok(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])), '?');
    $path = strtolower(trim($request_uri, '/'));

    if ($path === 'contact' || $path === 'concierge' || $path === 'contact-us') {
        $contact_template = get_template_directory() . '/page-contact.php';
        if (file_exists($contact_template)) {
            status_header(200);
            return $contact_template;
        }
    }

    if ($path === 'stockist' || $path === 'stockists' || $path === 'stock-lists') {
        $stockist_template = get_template_directory() . '/page-stockist.php';
        if (file_exists($stockist_template)) {
            status_header(200);
            return $stockist_template;
        }
    }

    return $template;
});

/**
 * 3. Register Custom Post Type: cacao_products (No WooCommerce needed)
 */
function ec_register_cacao_products_cpt() {
    $labels = array(
        'name'               => _x('Cacao Products', 'Post Type General Name', 'everything-cacao'),
        'singular_name'      => _x('Cacao Product', 'Post Type Singular Name', 'everything-cacao'),
        'menu_name'          => __('Confection Catalog', 'everything-cacao'),
        'parent_item_colon'  => __('Parent Confection:', 'everything-cacao'),
        'all_items'          => __('All Products', 'everything-cacao'),
        'view_item'          => __('View Product', 'everything-cacao'),
        'add_new_item'       => __('Add New Confection', 'everything-cacao'),
        'add_new'            => __('Add New', 'everything-cacao'),
        'edit_item'          => __('Edit Product', 'everything-cacao'),
        'update_item'        => __('Update Product', 'everything-cacao'),
        'search_items'       => __('Search Confections', 'everything-cacao'),
        'not_found'          => __('No confections found', 'everything-cacao'),
        'not_found_in_trash' => __('No confections found in Trash', 'everything-cacao'),
    );

    $args = array(
        'label'               => __('cacao_products', 'everything-cacao'),
        'description'         => __('Luxury Ghanaian Cacao Products & Gift Boxes', 'everything-cacao'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields'),
        'taxonomies'          => array('cacao_category'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-store',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type('cacao_products', $args);

    // Register Custom Taxonomy for Lineages / Collections
    $cat_labels = array(
        'name'              => _x('Confection Collections', 'taxonomy general name', 'everything-cacao'),
        'singular_name'     => _x('Collection', 'taxonomy singular name', 'everything-cacao'),
        'search_items'      => __('Search Collections', 'everything-cacao'),
        'all_items'         => __('All Collections', 'everything-cacao'),
        'edit_item'         => __('Edit Collection', 'everything-cacao'),
        'update_item'       => __('Update Collection', 'everything-cacao'),
        'add_new_item'      => __('Add New Collection', 'everything-cacao'),
        'new_item_name'     => __('New Collection Name', 'everything-cacao'),
        'menu_name'         => __('Collections', 'everything-cacao'),
    );

    register_taxonomy('cacao_category', array('cacao_products'), array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'collection'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'ec_register_cacao_products_cpt', 0);

/**
 * 4. Custom AJAX Form Submission Handler (Concierge Inquiry)
 */
function ec_handle_concierge_form_ajax() {
    check_ajax_referer('ec_concierge_nonce', 'nonce');

    $name    = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email   = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $inquiry = isset($_POST['inquiry_type']) ? sanitize_text_field($_POST['inquiry_type']) : 'General Inquiry';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    if (empty($name) || empty($email) || !is_email($email)) {
        wp_send_json_error(array('message' => 'Please provide a valid name and email address.'));
    }

    $to      = get_option('ec_concierge_email', 'info@everythingcacaogh.com');
    $subject = sprintf('[Concierge Inquiry] %s from %s', $inquiry, $name);
    $body    = "Name: {$name}\nEmail: {$email}\nInquiry Type: {$inquiry}\n\nMessage:\n{$message}\n";
    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>");

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => sprintf('Thank you %s! Your inquiry has been routed to info@everythingcacaogh.com.', $name)));
    } else {
        // Fallback response for dev environments without mail server setup
        wp_send_json_success(array('message' => sprintf('Thank you %s! Your inquiry has been received.', $name)));
    }
}
add_action('wp_ajax_ec_submit_concierge', 'ec_handle_concierge_form_ajax');
add_action('wp_ajax_nopriv_ec_submit_concierge', 'ec_handle_concierge_form_ajax');

/**
 * 5. ACF Pro Options Page Registration (If plugin is active)
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Everything Cacao Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'everything-cacao-options',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-admin-generic',
    ));
}

/**
 * 6. Native Product Meta Boxes (Works without ACF)
 *    Fields: sub_brand, product_price, cacao_content, origin_region, tasting_notes, product_description
 */
function ec_add_product_meta_boxes() {
    add_meta_box(
        'ec_product_details',
        __('Product Details', 'everything-cacao'),
        'ec_render_product_meta_box',
        'cacao_products',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ec_add_product_meta_boxes');

function ec_render_product_meta_box($post) {
    wp_nonce_field('ec_save_product_meta', 'ec_product_nonce');

    $sub_brand   = get_post_meta($post->ID, 'sub_brand', true);
    $price       = get_post_meta($post->ID, 'product_price', true);
    $cacao       = get_post_meta($post->ID, 'cacao_content', true);
    $origin      = get_post_meta($post->ID, 'origin_region', true);
    $notes       = get_post_meta($post->ID, 'tasting_notes', true);
    $description = get_post_meta($post->ID, 'product_description', true);
    ?>
    <style>
        .ec-meta-row { display: flex; gap: 16px; margin-bottom: 16px; flex-wrap: wrap; }
        .ec-meta-field { flex: 1; min-width: 200px; }
        .ec-meta-field label { display: block; font-weight: 600; margin-bottom: 4px; font-size: 13px; }
        .ec-meta-field input, .ec-meta-field select, .ec-meta-field textarea {
            width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;
        }
        .ec-meta-field textarea { min-height: 80px; }
    </style>
    <div class="ec-meta-row">
        <div class="ec-meta-field">
            <label for="ec_sub_brand">Sub-Brand / Lineage</label>
            <select id="ec_sub_brand" name="sub_brand">
                <option value="Cherelle" <?php selected($sub_brand, 'Cherelle'); ?>>Cherelle (Lifestyle)</option>
                <option value="Nahar" <?php selected($sub_brand, 'Nahar'); ?>>Nahar (Artisanal)</option>
                <option value="Gift Box" <?php selected($sub_brand, 'Gift Box'); ?>>Gift Box</option>
            </select>
        </div>
        <div class="ec-meta-field">
            <label for="ec_price">Price (GHC)</label>
            <input type="text" id="ec_price" name="product_price" value="<?php echo esc_attr($price); ?>" placeholder="e.g. 420" />
        </div>
        <div class="ec-meta-field">
            <label for="ec_cacao">Cacao Content</label>
            <input type="text" id="ec_cacao" name="cacao_content" value="<?php echo esc_attr($cacao); ?>" placeholder="e.g. 72% Cacao" />
        </div>
    </div>
    <div class="ec-meta-row">
        <div class="ec-meta-field">
            <label for="ec_origin">Origin Region</label>
            <input type="text" id="ec_origin" name="origin_region" value="<?php echo esc_attr($origin); ?>" placeholder="e.g. Single-Origin • Sefwi Wiawso" />
        </div>
    </div>
    <div class="ec-meta-row">
        <div class="ec-meta-field">
            <label for="ec_notes">Tasting Notes</label>
            <textarea id="ec_notes" name="tasting_notes" placeholder="e.g. Deep cocoa intensity with a satisfying crunch and fruity undertones."><?php echo esc_textarea($notes); ?></textarea>
        </div>
    </div>
    <div class="ec-meta-row">
        <div class="ec-meta-field">
            <label for="ec_description">Full Product Description (shown in detail modal)</label>
            <textarea id="ec_description" name="product_description" rows="4" placeholder="A detailed description shown when a customer clicks to view more..."><?php echo esc_textarea($description); ?></textarea>
        </div>
    </div>
    <p style="color: #666; font-size: 12px;">
        <strong>Tip:</strong> Set the product's <em>Featured Image</em> (in the right panel) to control the product photo displayed on the Collections page.
    </p>
    <?php
}

function ec_save_product_meta($post_id) {
    if (!isset($_POST['ec_product_nonce']) || !wp_verify_nonce($_POST['ec_product_nonce'], 'ec_save_product_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array('sub_brand', 'product_price', 'cacao_content', 'origin_region', 'tasting_notes', 'product_description');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post_cacao_products', 'ec_save_product_meta');

/**
 * 7. Helper: Get product meta (works with both ACF and native meta)
 */
function ec_get_product_field($field, $post_id = null) {
    if (!$post_id) $post_id = get_the_ID();
    // Try ACF first, then native meta
    if (function_exists('get_field')) {
        $val = get_field($field, $post_id);
        if ($val) return $val;
    }
    return get_post_meta($post_id, $field, true);
}

/**
 * 8. Smart Page Link Resolver (Safely resolves URLs without redeclaration errors)
 */
if (!function_exists('ec_get_smart_page_link')) {
    function ec_get_smart_page_link($slug_candidates, $fallback) {
        foreach ((array)$slug_candidates as $slug) {
            $page = get_page_by_path($slug);
            if ($page) {
                return get_permalink($page->ID);
            }
        }
        return esc_url(home_url($fallback));
    }
}

/**
 * 9. Customizer Settings & Admin Theme Options Panel
 * Allows easy management of Meta Pixel ID, WhatsApp Number, and Concierge Email in WP Admin
 */

/**
 * 9. Customizer Settings & Admin Theme Options Panel
 * Clean, Unified Hierarchy for Homepage Management & Theme Options
 */
function ec_customize_register($wp_customize) {

    // =========================================================================
    // UNIFIED "HOMEPAGE MANAGEMENT" PANEL
    // =========================================================================
    $wp_customize->add_panel('theme_homepage_panel', array(
        'priority'    => 20,
        'title'       => __('Homepage Management', 'everything-cacao'),
        'description' => __('Manage all sections, text, images, buttons, announcement tickers, and customer reviews on the Homepage.', 'everything-cacao'),
    ));

    // -------------------------------------------------------------------------
    // SECTION 1: HERO & MAIN BANNER CONTENT
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_hp_hero_section', array(
        'title'       => __('Section 1: Hero & Main Banner Content', 'everything-cacao'),
        'panel'       => 'theme_homepage_panel',
        'priority'    => 1,
    ));

    $hero_controls = array(
        'ec_hero_title'      => array('label' => __('Hero Heading Text', 'everything-cacao'), 'type' => 'textarea', 'default' => "Ghana's Finest Chocolate — Crafted from Local Cacao"),
        'ec_hero_subtitle'   => array('label' => __('Hero Subtitle / Description Text', 'everything-cacao'), 'type' => 'textarea', 'default' => "Everything Cacao GH makes premium chocolate from Ghana's finest locally sourced cacao. Our two iconic ranges — Nahar for luxury occasions and Cherelle for everyday delight — bring world-class Ghanaian chocolate to your table."),
        'ec_hero_btn1_label' => array('label' => __('Primary Button Label', 'everything-cacao'), 'type' => 'text', 'default' => "SHOP ALL CHOCOLATE"),
        'ec_hero_btn1_url'   => array('label' => __('Primary Button Link', 'everything-cacao'), 'type' => 'text', 'default' => "/our-collections"),
        'ec_hero_btn2_label' => array('label' => __('Secondary Button Label', 'everything-cacao'), 'type' => 'text', 'default' => "OUR STORY"),
        'ec_hero_btn2_url'   => array('label' => __('Secondary Button Link', 'everything-cacao'), 'type' => 'text', 'default' => "https://everythingcacaogh.com/about-us/"),
    );

    foreach ($hero_controls as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label'    => $data['label'],
            'section'  => 'theme_hp_hero_section',
            'type'     => $data['type'],
        ));
    }

    $wp_customize->add_setting('ec_hero_image', array(
        'default'           => 'https://everythingcacaogh.com/wp-content/uploads/2026/08/cocoa-farm.jpg',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ec_hero_image', array(
        'label'    => __('Hero Background / Featured Image', 'everything-cacao'),
        'section'  => 'theme_hp_hero_section',
        'settings' => 'ec_hero_image',
    )));

    // -------------------------------------------------------------------------
    // SECTION 2: SCROLLING ANNOUNCEMENT TICKER
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_hp_ticker_section', array(
        'title'       => __('Section 2: Scrolling Announcement Ticker', 'everything-cacao'),
        'panel'       => 'theme_homepage_panel',
        'priority'    => 2,
    ));

    $ticker_controls = array(
        'ec_ticker_1' => array('label' => __('Ticker Item 1', 'everything-cacao'), 'type' => 'text', 'default' => "NOW AVAILABLE IN SUPERMARKETS & MALLS ACROSS GHANA"),
        'ec_ticker_2' => array('label' => __('Ticker Item 2', 'everything-cacao'), 'type' => 'text', 'default' => "SHIPPING WORLDWIDE"),
        'ec_ticker_3' => array('label' => __('Ticker Item 3', 'everything-cacao'), 'type' => 'text', 'default' => "FDA & GSA CERTIFIED PREMIUM GHANAIAN CACAO"),
    );

    foreach ($ticker_controls as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label'    => $data['label'],
            'section'  => 'theme_hp_ticker_section',
            'type'     => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // SECTION 3: PRODUCT RANGES ("Two Ranges. One Ghanaian Story.")
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_hp_ranges_section', array(
        'title'       => __('Section 3: Product Ranges ("Two Ranges. One Ghanaian Story.")', 'everything-cacao'),
        'panel'       => 'theme_homepage_panel',
        'priority'    => 3,
    ));

    $ranges_controls = array(
        'ec_showcase_title'      => array('label' => __('Section Title', 'everything-cacao'), 'type' => 'text', 'default' => "Two Ranges. One Ghanaian Story."),
        'ec_showcase_subtitle'   => array('label' => __('Section Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Whether you're treating yourself, sharing with family or finding the perfect gift, Everything Cacao has a chocolate for every moment."),
        // Nahar Card
        'ec_nahar_tag'           => array('label' => __('Nahar Card Tag / Eyebrow', 'everything-cacao'), 'type' => 'text', 'default' => "THE ESSENCE OF LUXURY"),
        'ec_nahar_title'         => array('label' => __('Nahar Card Title', 'everything-cacao'), 'type' => 'text', 'default' => "Nahar"),
        'ec_nahar_subtitle'      => array('label' => __('Nahar Card Subtitle (Italic)', 'everything-cacao'), 'type' => 'text', 'default' => "Luxury Ghanaian Chocolate"),
        'ec_nahar_desc'          => array('label' => __('Nahar Card Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Nahar is our premium chocolate range, crafted for discerning palates. Rich, complex flavours made from the finest Ghanaian cocoa, wrapped in elegant packaging. Perfect for gifts, special occasions and personal indulgence."),
        'ec_nahar_type_label'    => array('label' => __('Nahar Collection Type Label', 'everything-cacao'), 'type' => 'text', 'default' => "COLLECTION TYPE"),
        'ec_nahar_type_value'    => array('label' => __('Nahar Collection Type Value', 'everything-cacao'), 'type' => 'text', 'default' => "Luxury & Bespoke Reserve"),
        'ec_nahar_btn_text'      => array('label' => __('Nahar Button Text', 'everything-cacao'), 'type' => 'text', 'default' => "SHOP NAHAR →"),
        'ec_nahar_btn_url'       => array('label' => __('Nahar Button URL', 'everything-cacao'), 'type' => 'text', 'default' => "/our-collections?lineage=nahar"),
        // Cherelle Card
        'ec_cherelle_tag'        => array('label' => __('Cherelle Card Tag / Eyebrow', 'everything-cacao'), 'type' => 'text', 'default' => "DELIGHT IN EVERY BITE"),
        'ec_cherelle_title'      => array('label' => __('Cherelle Card Title', 'everything-cacao'), 'type' => 'text', 'default' => "Cherelle"),
        'ec_cherelle_subtitle'   => array('label' => __('Cherelle Card Subtitle (Italic)', 'everything-cacao'), 'type' => 'text', 'default' => "Everyday Chocolate for Everyone"),
        'ec_cherelle_desc'       => array('label' => __('Cherelle Card Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Cherelle is everyday chocolate for everyone. Affordable, joyful and bursting with the natural taste of Ghanaian cacao. Made for sharing, gifting and sweet everyday moments."),
        'ec_cherelle_type_label' => array('label' => __('Cherelle Collection Type Label', 'everything-cacao'), 'type' => 'text', 'default' => "COLLECTION TYPE"),
        'ec_cherelle_type_value' => array('label' => __('Cherelle Collection Type Value', 'everything-cacao'), 'type' => 'text', 'default' => "Everyday Range"),
        'ec_cherelle_btn_text'   => array('label' => __('Cherelle Button Text', 'everything-cacao'), 'type' => 'text', 'default' => "SHOP CHERELLE →"),
        'ec_cherelle_btn_url'    => array('label' => __('Cherelle Button URL', 'everything-cacao'), 'type' => 'text', 'default' => "/our-collections?lineage=cherelle"),
    );

    foreach ($ranges_controls as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label'    => $data['label'],
            'section'  => 'theme_hp_ranges_section',
            'type'     => $data['type'],
        ));
    }

    $ranges_images = array(
        'ec_nahar_image'    => array('label' => __('Nahar Card Product Image', 'everything-cacao'), 'default' => 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png'),
        'ec_cherelle_image' => array('label' => __('Cherelle Card Product Image', 'everything-cacao'), 'default' => 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png'),
    );

    foreach ($ranges_images as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_id, array(
            'label'    => $data['label'],
            'section'  => 'theme_hp_ranges_section',
            'settings' => $setting_id,
        )));
    }

    // -------------------------------------------------------------------------
    // SECTION 4: WHY CHOOSE US
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_hp_why_section', array(
        'title'       => __('Section 4: Why Choose Us', 'everything-cacao'),
        'panel'       => 'theme_homepage_panel',
        'priority'    => 4,
    ));

    $why_controls = array(
        'ec_why_title'          => array('label' => __('Section Title', 'everything-cacao'), 'type' => 'text', 'default' => "Why Choose Us?"),
        'ec_why_subtitle'       => array('label' => __('Section Subtitle', 'everything-cacao'), 'type' => 'textarea', 'default' => "We celebrate our land, the farmers and our heritage with every bite."),
        'ec_why_story_btn_text' => array('label' => __('Our Story Link Text', 'everything-cacao'), 'type' => 'text', 'default' => "OUR STORY →"),
        'ec_why_story_btn_url'  => array('label' => __('Our Story Link URL', 'everything-cacao'), 'type' => 'text', 'default' => "/about-us/"),
        // Card 1
        'ec_impact1_title'      => array('label' => __('Card 1 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Locally sourced cacao"),
        'ec_impact1_text'       => array('label' => __('Card 1 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "We work directly with Ghanaian farmers and local suppliers to source the highest quality processed cocoa — supporting communities and ensuring exceptional flavour in every bar."),
        // Card 2
        'ec_impact2_title'      => array('label' => __('Card 2 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Made in Ghana"),
        'ec_impact2_text'       => array('label' => __('Card 2 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "From bean to bar, our chocolate is made in Ghana — celebrating our land, our farmers and our heritage with every bite."),
        // Card 3
        'ec_impact3_title'      => array('label' => __('Card 3 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Certified quality"),
        'ec_impact3_text'       => array('label' => __('Card 3 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Every Everything Cacao product is certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA). Quality and safety you can trust."),
    );

    foreach ($why_controls as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label'    => $data['label'],
            'section'  => 'theme_hp_why_section',
            'type'     => $data['type'],
        ));
    }

    $why_images = array(
        'ec_impact1_image' => array('label' => __('Card 1 Image (Locally Sourced)', 'everything-cacao'), 'default' => 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png'),
        'ec_impact2_image' => array('label' => __('Card 2 Image (Made in Ghana)', 'everything-cacao'), 'default' => 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png'),
        'ec_impact3_image' => array('label' => __('Card 3 Image (Certified Quality)', 'everything-cacao'), 'default' => 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png'),
    );

    foreach ($why_images as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_id, array(
            'label'    => $data['label'],
            'section'  => 'theme_hp_why_section',
            'settings' => $setting_id,
        )));
    }

    // -------------------------------------------------------------------------
    // SECTION 5: CUSTOMER REVIEWS & SOCIAL PROOF
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_hp_reviews_section', array(
        'title'       => __('Section 5: Customer Reviews & Social Proof', 'everything-cacao'),
        'panel'       => 'theme_homepage_panel',
        'priority'    => 5,
    ));

    $reviews_controls = array(
        'ec_reviews_tag'       => array('label' => __('Section Tag / Eyebrow', 'everything-cacao'), 'type' => 'text', 'default' => "Real People, Real Joy"),
        'ec_reviews_heading'   => array('label' => __('Section Heading', 'everything-cacao'), 'type' => 'text', 'default' => "What our customers say about our chocolate"),
        'ec_reviews_subheading'=> array('label' => __('Section Subheading', 'everything-cacao'), 'type' => 'textarea', 'default' => "Watch chocolate lovers across Ghana sample Cherelle and Nahar artisanal creations live in supermarkets, pop-up lounges, and luxury retail stores."),
        // Card 1
        'ec_review1_url'       => array('label' => __('Card 1 Video iFrame Embed URL', 'everything-cacao'), 'type' => 'text', 'default' => "https://drive.google.com/file/d/1JUC7nwQjQpqLD8z7WnyhiyPtkV6rkcvG/preview"),
        'ec_review1_badge'     => array('label' => __('Card 1 Badge Label', 'everything-cacao'), 'type' => 'text', 'default' => "Live Sampling"),
        'ec_review1_title'     => array('label' => __('Card 1 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Supermarket Tasting Reel #1"),
        'ec_review1_desc'      => array('label' => __('Card 1 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Customers discovering Cherelle 45% Milk Chocolate."),
        // Card 2
        'ec_review2_url'       => array('label' => __('Card 2 Video iFrame Embed URL', 'everything-cacao'), 'type' => 'text', 'default' => "https://drive.google.com/file/d/1pKLN1VVG15IKg_WP6RUlZ8eD3UJnX1yW/preview"),
        'ec_review2_badge'     => array('label' => __('Card 2 Badge Label', 'everything-cacao'), 'type' => 'text', 'default' => "Nahar Luxury Tasting"),
        'ec_review2_title'     => array('label' => __('Card 2 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Grand Reserve Sampling #2"),
        'ec_review2_desc'      => array('label' => __('Card 2 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Discerning palates savoring Nahar 72% Obsidian Dark."),
        // Card 3
        'ec_review3_url'       => array('label' => __('Card 3 Video iFrame Embed URL', 'everything-cacao'), 'type' => 'text', 'default' => "https://drive.google.com/file/d/15lB6wkq0Cg6NT4pACbXxZiokmdDYtcE0/preview"),
        'ec_review3_badge'     => array('label' => __('Card 3 Badge Label', 'everything-cacao'), 'type' => 'text', 'default' => "Retail Pop-Up"),
        'ec_review3_title'     => array('label' => __('Card 3 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Accra Retail Pop-Up #3"),
        'ec_review3_desc'      => array('label' => __('Card 3 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Interactive tasting counter at Accra shopping mall."),
        // Card 4
        'ec_review4_url'       => array('label' => __('Card 4 Video iFrame Embed URL', 'everything-cacao'), 'type' => 'text', 'default' => "https://drive.google.com/file/d/1FQK5L6ErULSbr0Wd_VKoGYcJo463HVYC/preview"),
        'ec_review4_badge'     => array('label' => __('Card 4 Badge Label', 'everything-cacao'), 'type' => 'text', 'default' => "Family & Kids Joy"),
        'ec_review4_title'     => array('label' => __('Card 4 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Joy in Every Bite #4"),
        'ec_review4_desc'      => array('label' => __('Card 4 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Delighting young chocolate lovers with Cherelle treats."),
    );

    foreach ($reviews_controls as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label'    => $data['label'],
            'section'  => 'theme_hp_reviews_section',
            'type'     => $data['type'],
        ));
    }

    // =========================================================================
    // BRAND & MARKETING SETTINGS (Separate Section)
    // =========================================================================
    $wp_customize->add_section('ec_brand_settings', array(
        'title'       => __('Brand & Marketing Settings', 'everything-cacao'),
        'priority'    => 30,
        'description' => __('Configure Meta (Facebook) Pixel ID, WhatsApp Concierge Number, and Concierge Email Address.', 'everything-cacao'),
    ));

    $wp_customize->add_setting('ec_pixel_id', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('ec_pixel_id', array('label' => __('Meta (Facebook) Pixel ID', 'everything-cacao'), 'section' => 'ec_brand_settings', 'type' => 'text'));

    $wp_customize->add_setting('ec_whatsapp_number', array('default' => '233240661866', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('ec_whatsapp_number', array('label' => __('WhatsApp Concierge Number', 'everything-cacao'), 'section' => 'ec_brand_settings', 'type' => 'text'));

    $wp_customize->add_setting('ec_concierge_email', array('default' => 'info@everythingcacaogh.com', 'type' => 'option', 'sanitize_callback' => 'sanitize_email'));
    $wp_customize->add_control('ec_concierge_email', array('label' => __('Concierge Email Address', 'everything-cacao'), 'section' => 'ec_brand_settings', 'type' => 'email'));

    // =========================================================================
    // OTHER PAGES CONTENT SETTINGS
    // =========================================================================
    $wp_customize->add_section('ec_craft_content', array(
        'title'       => __('Our Craft Page Content', 'everything-cacao'),
        'priority'    => 34,
        'description' => __('Edit headlines, subtitles, and the 4 Brand Pillars for the Our Craft / About page.', 'everything-cacao'),
    ));

    $craft_text_controls = array(
        'ec_craft_hero_title'    => array('label' => __('Craft Hero Title', 'everything-cacao'), 'type' => 'text', 'default' => "Everything Cacao"),
        'ec_craft_hero_subtitle' => array('label' => __('Craft Hero Subtitle', 'everything-cacao'), 'type' => 'textarea', 'default' => "Celebrating the rich heritage of Ghana's cacao and the art of transforming processed cocoa into premium chocolate."),
        'ec_craft_sec_title'     => array('label' => __('Story Section Title', 'everything-cacao'), 'type' => 'text', 'default' => "Ghana's Chocolate Story — Grown Here, Made Here"),
        'ec_craft_sec_subtitle'  => array('label' => __('Story Section Subtitle', 'everything-cacao'), 'type' => 'textarea', 'default' => "Everything Cacao was born from a passion for Ghana's cacao and a belief that the world's finest chocolate starts right here. We transform premium Ghanaian cocoa into exceptional chocolate — honouring our land, our farmers and the traditions that make Ghanaian cacao among the best in the world."),
        'ec_pillar1_title'       => array('label' => __('Pillar 1 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Crafting Chocolate with Care"),
        'ec_pillar1_text'        => array('label' => __('Pillar 1 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "We source high-quality, processed cocoa from local suppliers who share our commitment to excellence. By collaborating closely with these farmers, we ensure that every batch reflects the unique flavors and characteristics of Ghanaian cacao. Our team of skilled artisans takes this exceptional cocoa and transforms it into a range of delightful chocolate bars, each crafted with precision and love."),
        'ec_pillar2_title'       => array('label' => __('Pillar 2 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Quality You Can Trust"),
        'ec_pillar2_text'        => array('label' => __('Pillar 2 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA), Everything Cacao is dedicated to maintaining the highest standards of safety and quality. Our rigorous processes ensure that every chocolate bar you enjoy is not only delicious but also meets stringent regulatory requirements, giving you peace of mind with every bite."),
        'ec_pillar3_title'       => array('label' => __('Pillar 3 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Empowering Communities"),
        'ec_pillar3_text'        => array('label' => __('Pillar 3 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "We believe chocolate should benefit everyone involved in its creation. Everything Cacao works closely with local cocoa processing companies and cocoa farmers in Ghana, ensuring fair trade practices and sustainable livelihoods. By choosing our chocolate, you contribute to empowering communities and supporting local industry in Ghana."),
        'ec_pillar4_title'       => array('label' => __('Pillar 4 Title', 'everything-cacao'), 'type' => 'text', 'default' => "A Taste of Ghana"),
        'ec_pillar4_text'        => array('label' => __('Pillar 4 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Every bar of Everything Cacao tells a story of Ghanaian heritage and artisanal pride. From rich dark chocolate bars to creamy milk varieties and delightful treats, our products celebrate the distinct flavor of Ghana's cacao. Experience the true taste of Ghana with every bite."),
    );

    foreach ($craft_text_controls as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array('default' => $data['default'], 'type' => 'theme_mod', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control($setting_id, array('label' => $data['label'], 'section' => 'ec_craft_content', 'type' => $data['type']));
    }

    $wp_customize->add_section('ec_stockist_content', array(
        'title'       => __('Stockists Page Content', 'everything-cacao'),
        'priority'    => 35,
        'description' => __('Edit category headers and subtitles on the Stockists page.', 'everything-cacao'),
    ));

    $stockist_text_controls = array(
        'ec_stockist_hero_title' => array('label' => __('Stockist Hero Title', 'everything-cacao'), 'type' => 'text', 'default' => "Where to Find Everything Cacao"),
        'ec_stockist_cat1_title' => array('label' => __('Category 1 Header', 'everything-cacao'), 'type' => 'text', 'default' => "LUXURY HOTELS & RESORTS"),
        'ec_stockist_cat2_title' => array('label' => __('Category 2 Header', 'everything-cacao'), 'type' => 'text', 'default' => "GOURMET CAFES & ESPRESSO BARS"),
        'ec_stockist_cat3_title' => array('label' => __('Category 3 Header', 'everything-cacao'), 'type' => 'text', 'default' => "AIRPORT DUTY FREE & RETAIL PAVILIONS"),
    );

    foreach ($stockist_text_controls as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array('default' => $data['default'], 'type' => 'theme_mod', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control($setting_id, array('label' => $data['label'], 'section' => 'ec_stockist_content', 'type' => $data['type']));
    }

    // =========================================================================
    // "ABOUT US MANAGEMENT" PANEL  (ID: theme_about_page_panel)
    // Dedicated Customizer Panel for the About Us / Our Craft page.
    // Covers all 6 content sections with clean hierarchy.
    // =========================================================================
    $wp_customize->add_panel('theme_about_page_panel', array(
        'priority'    => 22,
        'title'       => __('About Us Management', 'everything-cacao'),
        'description' => __('Manage all sections, text, images, videos and buttons on the About Us / Our Craft page.', 'everything-cacao'),
    ));

    // -------------------------------------------------------------------------
    // ABOUT SECTION 1: HERO BANNER
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_about_hero_section', array(
        'title'    => __('1. Hero Banner', 'everything-cacao'),
        'panel'    => 'theme_about_page_panel',
        'priority' => 10,
    ));

    $about_hero_controls = array(
        'ec_about_hero_tagline'  => array(
            'label'   => __('Tagline / Top Subheading', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'Official Brand Story & Vision',
        ),
        'ec_about_hero_title'    => array(
            'label'   => __('Main Page Title', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'Everything Cacao',
        ),
        'ec_about_hero_subtitle' => array(
            'label'   => __('Subtitle / Description Text', 'everything-cacao'),
            'type'    => 'textarea',
            'default' => "Celebrating the rich heritage of Ghana's cacao and the art of transforming processed cocoa into premium chocolate.",
        ),
    );

    foreach ($about_hero_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_about_hero_section',
            'type'    => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // ABOUT SECTION 2: OUR VALUES (Brand Pillars)
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_about_values_section', array(
        'title'    => __('2. Our Values (Brand Pillars)', 'everything-cacao'),
        'panel'    => 'theme_about_page_panel',
        'priority' => 20,
    ));

    $about_values_controls = array(
        'ec_about_values_title'    => array(
            'label'   => __('Section Main Title', 'everything-cacao'),
            'type'    => 'text',
            'default' => "Ghana's Chocolate Story — Grown Here, Made Here",
        ),
        'ec_about_values_subtitle' => array(
            'label'   => __('Section Intro Paragraph', 'everything-cacao'),
            'type'    => 'textarea',
            'default' => "Everything Cacao was born from a passion for Ghana's cacao and a belief that the world's finest chocolate starts right here. We transform premium Ghanaian cocoa into exceptional chocolate — honouring our land, our farmers and the traditions that make Ghanaian cacao among the best in the world.",
        ),
        // Card 01
        'ec_about_v1_number'  => array('label' => __('Value Card 01 — Number', 'everything-cacao'),  'type' => 'text',     'default' => '01'),
        'ec_about_v1_heading' => array('label' => __('Value Card 01 — Heading', 'everything-cacao'), 'type' => 'text',     'default' => 'Crafting Chocolate with Care'),
        'ec_about_v1_body'    => array('label' => __('Value Card 01 — Body Text', 'everything-cacao'), 'type' => 'textarea', 'default' => 'We source high-quality, processed cocoa from local suppliers who share our commitment to excellence. By collaborating closely with these farmers, we ensure that every batch reflects the unique flavors and characteristics of Ghanaian cacao. Our team of skilled artisans takes this exceptional cocoa and transforms it into a range of delightful chocolate bars, each crafted with precision and love.'),
        // Card 02
        'ec_about_v2_number'  => array('label' => __('Value Card 02 — Number', 'everything-cacao'),  'type' => 'text',     'default' => '02'),
        'ec_about_v2_heading' => array('label' => __('Value Card 02 — Heading', 'everything-cacao'), 'type' => 'text',     'default' => 'Quality You Can Trust'),
        'ec_about_v2_body'    => array('label' => __('Value Card 02 — Body Text', 'everything-cacao'), 'type' => 'textarea', 'default' => 'Certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA), Everything Cacao is dedicated to maintaining the highest standards of safety and quality. Our rigorous processes ensure that every chocolate bar you enjoy is not only delicious but also meets stringent regulatory requirements, giving you peace of mind with every bite.'),
        // Card 03
        'ec_about_v3_number'  => array('label' => __('Value Card 03 — Number', 'everything-cacao'),  'type' => 'text',     'default' => '03'),
        'ec_about_v3_heading' => array('label' => __('Value Card 03 — Heading', 'everything-cacao'), 'type' => 'text',     'default' => 'Empowering Communities'),
        'ec_about_v3_body'    => array('label' => __('Value Card 03 — Body Text', 'everything-cacao'), 'type' => 'textarea', 'default' => 'We believe chocolate should benefit everyone involved in its creation. Everything Cacao works closely with local cocoa processing companies and cocoa farmers in Ghana, ensuring fair trade practices and sustainable livelihoods. By choosing our chocolate, you contribute to empowering communities and supporting local industry in Ghana.'),
        // Card 04
        'ec_about_v4_number'  => array('label' => __('Value Card 04 — Number', 'everything-cacao'),  'type' => 'text',     'default' => '04'),
        'ec_about_v4_heading' => array('label' => __('Value Card 04 — Heading', 'everything-cacao'), 'type' => 'text',     'default' => 'A Taste of Ghana'),
        'ec_about_v4_body'    => array('label' => __('Value Card 04 — Body Text', 'everything-cacao'), 'type' => 'textarea', 'default' => "Every bar of Everything Cacao tells a story of Ghanaian heritage and artisanal pride. From rich dark chocolate bars to creamy milk varieties and delightful treats, our products celebrate the distinct flavor of Ghana's cacao. Experience the true taste of Ghana with every bite."),
    );

    foreach ($about_values_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_about_values_section',
            'type'    => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // ABOUT SECTION 3: OUR STORY
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_about_story_section', array(
        'title'    => __('3. Our Story', 'everything-cacao'),
        'panel'    => 'theme_about_page_panel',
        'priority' => 30,
    ));

    $about_story_text = array(
        'ec_about_story_heading'  => array('label' => __('Section Heading', 'everything-cacao'),       'type' => 'text',     'default' => 'Our Story'),
        'ec_about_story_tagline'  => array('label' => __('Inner Tagline (e.g. CRAFTED IN GHANA)', 'everything-cacao'), 'type' => 'text', 'default' => 'CRAFTED IN GHANA'),
        'ec_about_story_para1'    => array('label' => __('Story Paragraph 1', 'everything-cacao'),     'type' => 'textarea', 'default' => "Everything Cacao GH Ltd. is a proudly Ghanaian chocolate manufacturer, born in 2025 from a deep love for Ghana's cacao and a vision to share it with the world."),
        'ec_about_story_para2'    => array('label' => __('Story Paragraph 2', 'everything-cacao'),     'type' => 'textarea', 'default' => 'We craft premium chocolate right here in Ghana — celebrating the farmers, the land and the heritage behind every bar. From our everyday Cherelle range to our luxury Nahar collection, each piece of chocolate we make is a testament to what Ghanaian cocoa can become in the right hands.'),
        'ec_about_story_para3'    => array('label' => __('Story Paragraph 3 (Bold Closer)', 'everything-cacao'), 'type' => 'textarea', 'default' => 'We are more than a chocolate company. We are a celebration of Ghana.'),
        'ec_about_story_btn_label'=> array('label' => __('Button Label', 'everything-cacao'),          'type' => 'text',     'default' => 'View More →'),
        'ec_about_story_btn_url'  => array('label' => __('Button URL', 'everything-cacao'),            'type' => 'text',     'default' => '/our-story'),
    );

    foreach ($about_story_text as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_about_story_section',
            'type'    => $data['type'],
        ));
    }

    // Featured Story Image
    $wp_customize->add_setting('ec_about_story_image', array(
        'default'           => 'https://everythingcacaogh.com/wp-content/uploads/2026/08/team_everythingcacao.jpg',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ec_about_story_image', array(
        'label'    => __('Featured Story Image', 'everything-cacao'),
        'section'  => 'theme_about_story_section',
        'settings' => 'ec_about_story_image',
    )));

    // -------------------------------------------------------------------------
    // ABOUT SECTION 4: BRAND HIGHLIGHTS (Cherelle & Nahar)
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_about_highlights_section', array(
        'title'    => __('4. Brand Highlights — Cherelle & Nahar', 'everything-cacao'),
        'panel'    => 'theme_about_page_panel',
        'priority' => 40,
    ));

    $about_highlights_controls = array(
        'ec_about_hl_title'    => array('label' => __('Section Main Title', 'everything-cacao'),    'type' => 'text',     'default' => 'Cherelle & Nahar'),
        'ec_about_hl_subtitle' => array('label' => __('Section Subtitle / Intro', 'everything-cacao'), 'type' => 'textarea', 'default' => "Together, Cherelle and Nahar represent our commitment to quality and passion for chocolate, ensuring there's something for everyone to enjoy at Everything Cacao"),
        // Cherelle Card
        'ec_about_ch_tag'    => array('label' => __('Cherelle — Eyebrow Tag', 'everything-cacao'),    'type' => 'text',     'default' => 'Everyday Lifestyle'),
        'ec_about_ch_badge'  => array('label' => __('Cherelle — Badge Text', 'everything-cacao'),     'type' => 'text',     'default' => 'Joy & Togetherness'),
        'ec_about_ch_title'  => array('label' => __('Cherelle — Card Title', 'everything-cacao'),     'type' => 'text',     'default' => 'Cherelle: Delight in Every Bite'),
        'ec_about_ch_body'   => array('label' => __('Cherelle — Body Text', 'everything-cacao'),      'type' => 'textarea', 'default' => 'Cherelle brings chocolate joy to everyone. Made from quality Ghanaian cocoa, our affordable bars are perfect for everyday moments — sharing with loved ones or treating yourself. Playful, approachable, and made for all ages, Cherelle keeps delicious moments within easy reach.'),
        // Nahar Card
        'ec_about_nh_tag'    => array('label' => __('Nahar — Eyebrow Tag', 'everything-cacao'),       'type' => 'text',     'default' => 'Artisanal Grand Luxury'),
        'ec_about_nh_badge'  => array('label' => __('Nahar — Badge Text', 'everything-cacao'),        'type' => 'text',     'default' => 'Pinnacle Reserve'),
        'ec_about_nh_title'  => array('label' => __('Nahar — Card Title', 'everything-cacao'),        'type' => 'text',     'default' => 'Nahar: The Essence of Luxury'),
        'ec_about_nh_body'   => array('label' => __('Nahar — Body Text', 'everything-cacao'),         'type' => 'textarea', 'default' => "Nahar is our premium chocolate brand for the discerning palate. Crafted from the finest Ghanaian cocoa, each bar delivers sophisticated, complex flavor rooted in Ghana's cacao heritage. With elegant packaging and curated craftsmanship, Nahar is the perfect choice for gifting, special occasions, or personal indulgence."),
    );

    foreach ($about_highlights_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_about_highlights_section',
            'type'    => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // ABOUT SECTION 5: MISSION & VISION
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_about_mission_section', array(
        'title'    => __('5. Mission & Vision', 'everything-cacao'),
        'panel'    => 'theme_about_page_panel',
        'priority' => 50,
    ));

    $about_mission_controls = array(
        // Mission Card
        'ec_about_mission_tag'     => array('label' => __('Mission — Eyebrow Tag', 'everything-cacao'),    'type' => 'text',     'default' => 'Our Purpose'),
        'ec_about_mission_heading' => array('label' => __('Mission — Card Heading', 'everything-cacao'),   'type' => 'text',     'default' => 'Mission Statement'),
        'ec_about_mission_body'    => array('label' => __('Mission — Body Text', 'everything-cacao'),      'type' => 'textarea', 'default' => '"At Everything Cacao GH Ltd., our mission is to transform the chocolate landscape in Ghana and beyond by producing exceptional products that celebrate the richness of our local cocoa while fostering sustainable practices. We aim to enhance the lives of our consumers through our flavorful offerings, drive economic growth within our community, and promote the cultural significance of cacao."'),
        // Vision Card
        'ec_about_vision_tag'      => array('label' => __('Vision — Eyebrow Tag', 'everything-cacao'),     'type' => 'text',     'default' => 'Our Horizon'),
        'ec_about_vision_heading'  => array('label' => __('Vision — Card Heading', 'everything-cacao'),    'type' => 'text',     'default' => 'Vision Statement'),
        'ec_about_vision_body'     => array('label' => __('Vision — Body Text', 'everything-cacao'),       'type' => 'textarea', 'default' => '"We envision a world where high-quality chocolate is not a luxury but a delightful experience accessible to all. We aspire to be a leading name in the chocolate industry, known for our innovative products, commitment to quality, and dedication to sustainability."'),
    );

    foreach ($about_mission_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_about_mission_section',
            'type'    => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // ABOUT SECTION 6: CUSTOMER REVIEWS / TESTIMONIALS
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_about_reviews_section', array(
        'title'    => __('6. Customer Reviews / Testimonials', 'everything-cacao'),
        'panel'    => 'theme_about_page_panel',
        'priority' => 60,
    ));

    $about_reviews_controls = array(
        'ec_about_rev_tag'     => array('label' => __('Section Eyebrow Tag', 'everything-cacao'),    'type' => 'text',     'default' => 'Real People, Real Joy'),
        'ec_about_rev_title'   => array('label' => __('Section Main Title', 'everything-cacao'),     'type' => 'text',     'default' => 'What our Customer says about us'),
        'ec_about_rev_desc'    => array('label' => __('Section Description', 'everything-cacao'),    'type' => 'textarea', 'default' => 'Watch chocolate lovers across Ghana sample Cherelle and Nahar artisanal creations live in supermarkets, pop-up lounges, and luxury retail stores.'),
        // Reel 1
        'ec_about_r1_url'      => array('label' => __('Reel 1 — Video iFrame URL', 'everything-cacao'),   'type' => 'text',     'default' => 'https://drive.google.com/file/d/1JUC7nwQjQpqLD8z7WnyhiyPtkV6rkcvG/preview'),
        'ec_about_r1_badge'    => array('label' => __('Reel 1 — Badge Label', 'everything-cacao'),        'type' => 'text',     'default' => 'Live Sampling'),
        'ec_about_r1_title'    => array('label' => __('Reel 1 — Card Title', 'everything-cacao'),         'type' => 'text',     'default' => 'Supermarket Tasting Reel #1'),
        'ec_about_r1_desc'     => array('label' => __('Reel 1 — Card Description', 'everything-cacao'),   'type' => 'textarea', 'default' => 'Customers discovering Cherelle 45% Milk Chocolate.'),
        // Reel 2
        'ec_about_r2_url'      => array('label' => __('Reel 2 — Video iFrame URL', 'everything-cacao'),   'type' => 'text',     'default' => 'https://drive.google.com/file/d/1pKLN1VVG15IKg_WP6RUlZ8eD3UJnX1yW/preview'),
        'ec_about_r2_badge'    => array('label' => __('Reel 2 — Badge Label', 'everything-cacao'),        'type' => 'text',     'default' => 'Nahar Luxury Tasting'),
        'ec_about_r2_title'    => array('label' => __('Reel 2 — Card Title', 'everything-cacao'),         'type' => 'text',     'default' => 'Grand Reserve Sampling #2'),
        'ec_about_r2_desc'     => array('label' => __('Reel 2 — Card Description', 'everything-cacao'),   'type' => 'textarea', 'default' => 'Discerning palates savoring Nahar 72% Obsidian Dark.'),
        // Reel 3
        'ec_about_r3_url'      => array('label' => __('Reel 3 — Video iFrame URL', 'everything-cacao'),   'type' => 'text',     'default' => 'https://drive.google.com/file/d/15lB6wkq0Cg6NT4pACbXxZiokmdDYtcE0/preview'),
        'ec_about_r3_badge'    => array('label' => __('Reel 3 — Badge Label', 'everything-cacao'),        'type' => 'text',     'default' => 'Retail Pop-Up'),
        'ec_about_r3_title'    => array('label' => __('Reel 3 — Card Title', 'everything-cacao'),         'type' => 'text',     'default' => 'Accra Retail Pop-Up #3'),
        'ec_about_r3_desc'     => array('label' => __('Reel 3 — Card Description', 'everything-cacao'),   'type' => 'textarea', 'default' => 'Interactive tasting counter at Accra shopping mall.'),
        // Reel 4
        'ec_about_r4_url'      => array('label' => __('Reel 4 — Video iFrame URL', 'everything-cacao'),   'type' => 'text',     'default' => 'https://drive.google.com/file/d/1FQK5L6ErULSbr0Wd_VKoGYcJo463HVYC/preview'),
        'ec_about_r4_badge'    => array('label' => __('Reel 4 — Badge Label', 'everything-cacao'),        'type' => 'text',     'default' => 'Family & Kids Joy'),
        'ec_about_r4_title'    => array('label' => __('Reel 4 — Card Title', 'everything-cacao'),         'type' => 'text',     'default' => 'Joy in Every Bite #4'),
        'ec_about_r4_desc'     => array('label' => __('Reel 4 — Card Description', 'everything-cacao'),   'type' => 'textarea', 'default' => 'Delighting young chocolate lovers with Cherelle treats.'),
    );

    foreach ($about_reviews_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_about_reviews_section',
            'type'    => $data['type'],
        ));
    }
    // =========================================================================
    // END ABOUT US MANAGEMENT PANEL
    // =========================================================================

    // =========================================================================
    // "CACAO JOURNAL MANAGEMENT" PANEL  (ID: theme_cacao_journal_panel)
    // Controls all static header copy, labels, and section headings on the
    // Blog / Cacao Journal archive page (home.php).
    // Post content (titles, excerpts, thumbnails) stays 100% dynamic via
    // WP_Query so posts are managed in Posts → All Posts in WP Dashboard.
    // =========================================================================
    $wp_customize->add_panel('theme_cacao_journal_panel', array(
        'priority'    => 24,
        'title'       => __('Cacao Journal Management', 'everything-cacao'),
        'description' => __('Manage the header copy, section labels, button text, and featured post selection on the Cacao Journal / Blog archive page.', 'everything-cacao'),
    ));

    // -------------------------------------------------------------------------
    // JOURNAL SECTION 1: HERO HEADER
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_journal_hero_section', array(
        'title'    => __('1. Hero Header', 'everything-cacao'),
        'panel'    => 'theme_cacao_journal_panel',
        'priority' => 10,
    ));

    $journal_hero_controls = array(
        'ec_journal_hero_tagline'  => array(
            'label'   => __('Top Subheading / Tagline', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'DISPATCHES FROM THE CACAO HEARTLAND',
        ),
        'ec_journal_hero_title'    => array(
            'label'   => __('Main Page Title', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'The Cacao Journal',
        ),
        'ec_journal_hero_subtitle' => array(
            'label'   => __('Subtitle / Description Text', 'everything-cacao'),
            'type'    => 'textarea',
            'default' => 'Stories, recipes, pairing tips, and deep dives into the world of modern artisan chocolate.',
        ),
    );

    foreach ($journal_hero_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_journal_hero_section',
            'type'    => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // JOURNAL SECTION 2: FEATURED DISPATCH SPOTLIGHT
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_journal_featured_section', array(
        'title'       => __('2. Featured Dispatch Spotlight', 'everything-cacao'),
        'panel'       => 'theme_cacao_journal_panel',
        'priority'    => 20,
        'description' => __('Control the featured post shown at the top of the journal. Leave "Featured Post ID" blank to automatically use the most recent published post.', 'everything-cacao'),
    ));

    $journal_featured_controls = array(
        'ec_journal_featured_label'    => array(
            'label'   => __('Tagline / Label (above featured post)', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'FEATURED DISPATCH',
        ),
        'ec_journal_featured_post_id'  => array(
            'label'   => __('Featured Post ID (leave blank = latest post)', 'everything-cacao'),
            'type'    => 'text',
            'default' => '',
        ),
        'ec_journal_read_btn_text'     => array(
            'label'   => __('Read Article Button Text', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'READ FULL ARTICLE →',
        ),
    );

    foreach ($journal_featured_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_journal_featured_section',
            'type'    => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // JOURNAL SECTION 3: RECENT ENTRIES GRID
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_journal_entries_section', array(
        'title'    => __('3. Recent Entries Grid', 'everything-cacao'),
        'panel'    => 'theme_cacao_journal_panel',
        'priority' => 30,
    ));

    $journal_entries_controls = array(
        'ec_journal_entries_tagline' => array(
            'label'   => __('Section Tagline / Eyebrow', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'FIELD NOTES & STORIES',
        ),
        'ec_journal_entries_heading' => array(
            'label'   => __('Section Main Heading', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'Recent Journal Entries',
        ),
        'ec_journal_read_story_text' => array(
            'label'   => __('Read Story Link Text', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'READ STORY →',
        ),
        'ec_journal_posts_per_page'  => array(
            'label'   => __('Posts to Show Per Page (number)', 'everything-cacao'),
            'type'    => 'text',
            'default' => '12',
        ),
        'ec_journal_empty_title'     => array(
            'label'   => __('Empty-State Heading (no posts published)', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'No Journal Dispatches Yet',
        ),
        'ec_journal_empty_body'      => array(
            'label'   => __('Empty-State Description Text', 'everything-cacao'),
            'type'    => 'textarea',
            'default' => 'We are currently writing new stories, tasting guides, and recipes. Check back soon!',
        ),
    );

    foreach ($journal_entries_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_journal_entries_section',
            'type'    => $data['type'],
        ));
    }
    // =========================================================================
    // END CACAO JOURNAL MANAGEMENT PANEL
    // =========================================================================

    // =========================================================================
    // "OUR COLLECTIONS MANAGEMENT" PANEL  (ID: theme_collections_page_panel)
    // Controls all page headers, tab labels, badge text, and static copy on
    // the Collections / Catalog page (page-collections.php).
    // Product grids, prices, titles, images, and queries remain 100% dynamic
    // via WP_Query / CPT — managed in WP Admin → Confection Catalog.
    // =========================================================================
    $wp_customize->add_panel('theme_collections_page_panel', array(
        'priority'    => 26,
        'title'       => __('Our Collections Management', 'everything-cacao'),
        'description' => __('Edit the page banner, filter tab labels, card badge defaults, and empty-state text on the Our Collections catalog page.', 'everything-cacao'),
    ));

    // -------------------------------------------------------------------------
    // COLLECTIONS SECTION 1: HERO BANNER
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_coll_hero_section', array(
        'title'    => __('1. Hero Banner', 'everything-cacao'),
        'panel'    => 'theme_collections_page_panel',
        'priority' => 10,
    ));

    $coll_hero_controls = array(
        'ec_coll_hero_tagline'  => array(
            'label'   => __('Top Subheading / Tagline', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'FDA & GSA CERTIFIED GHANAIAN CHOCOLATE',
        ),
        'ec_coll_hero_title'    => array(
            'label'   => __('Main Page Title', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'Shop Everything Cacao — Nahar & Cherelle',
        ),
        'ec_coll_hero_subtitle' => array(
            'label'   => __('Subtitle / Description Text', 'everything-cacao'),
            'type'    => 'textarea',
            'default' => "Browse our full range of Ghanaian chocolate bars. From Nahar's luxury dark and milk collections to Cherelle's affordable everyday bars — there's an Everything Cacao chocolate for every taste, budget and occasion.",
        ),
    );

    foreach ($coll_hero_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_coll_hero_section',
            'type'    => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // COLLECTIONS SECTION 2: FILTER TAB LABELS
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_coll_tabs_section', array(
        'title'       => __('2. Collection Filter Tabs', 'everything-cacao'),
        'panel'       => 'theme_collections_page_panel',
        'priority'    => 20,
        'description' => __('Edit the display label for each filter tab. The data-category attribute (all / cherelle / nahar / gifting) used for JS filtering is fixed and not changed here.', 'everything-cacao'),
    ));

    $coll_tab_controls = array(
        'ec_coll_tab_all'      => array('label' => __('Tab 1 — All Collections Label', 'everything-cacao'), 'type' => 'text', 'default' => 'ALL COLLECTIONS'),
        'ec_coll_tab_cherelle' => array('label' => __('Tab 2 — Cherelle Label',         'everything-cacao'), 'type' => 'text', 'default' => 'CHERELLE'),
        'ec_coll_tab_nahar'    => array('label' => __('Tab 3 — Nahar Label',             'everything-cacao'), 'type' => 'text', 'default' => 'NAHAR'),
        'ec_coll_tab_gifting'  => array('label' => __('Tab 4 — Gift Boxes Label',        'everything-cacao'), 'type' => 'text', 'default' => 'GIFT BOXES'),
    );

    foreach ($coll_tab_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_coll_tabs_section',
            'type'    => $data['type'],
        ));
    }

    // -------------------------------------------------------------------------
    // COLLECTIONS SECTION 3: PRODUCT CARD BADGES & LABELS
    // -------------------------------------------------------------------------
    $wp_customize->add_section('theme_coll_badges_section', array(
        'title'       => __('3. Product Card Badges & Labels', 'everything-cacao'),
        'panel'       => 'theme_collections_page_panel',
        'priority'    => 30,
        'description' => __('These control the default badge/overlay text on product cards. The left badge shows the cacao content from the product record; the right badge shows the sub-brand. The hover overlay text is also editable here.', 'everything-cacao'),
    ));

    $coll_badge_controls = array(
        'ec_coll_badge_dark_default'   => array(
            'label'   => __('Dark Badge — Fallback Text (left badge if no cacao % set)', 'everything-cacao'),
            'type'    => 'text',
            'default' => '100% RAW CACAO',
        ),
        'ec_coll_badge_light_cherelle' => array(
            'label'   => __('Light Badge — Cherelle Fallback Sub-brand Label', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'CHERELLE',
        ),
        'ec_coll_badge_light_nahar'    => array(
            'label'   => __('Light Badge — Nahar Fallback Sub-brand Label', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'NAHAR',
        ),
        'ec_coll_badge_light_gift'     => array(
            'label'   => __('Light Badge — Gift Box Fallback Sub-brand Label', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'GIFT BOX',
        ),
        'ec_coll_hover_overlay_text'   => array(
            'label'   => __('Hover Overlay Button Text (on product image)', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'View Details',
        ),
        'ec_coll_empty_title'          => array(
            'label'   => __('Empty Filter State — Heading', 'everything-cacao'),
            'type'    => 'text',
            'default' => 'No products in this collection yet',
        ),
        'ec_coll_empty_body'           => array(
            'label'   => __('Empty Filter State — Description Text', 'everything-cacao'),
            'type'    => 'textarea',
            'default' => 'Check back soon or browse all collections.',
        ),
    );

    foreach ($coll_badge_controls as $id => $data) {
        $wp_customize->add_setting($id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $data['label'],
            'section' => 'theme_coll_badges_section',
            'type'    => $data['type'],
        ));
    }
    // =========================================================================
    // END OUR COLLECTIONS MANAGEMENT PANEL
    // =========================================================================
}
add_action('customize_register', 'ec_customize_register');


/**
 * 9a. Helper: Get Customizer Text Option with Fallback
 */
if (!function_exists('ec_get_text_option')) {
    function ec_get_text_option($setting_id, $default = '') {
        $val = get_theme_mod($setting_id, get_option($setting_id, ''));
        return (!empty($val)) ? $val : $default;
    }
}

/**
 * 9b. Register Custom Post Type: ec_team_member (Team Members for Craft Page)
 */
function ec_register_team_cpt() {
    $labels = array(
        'name'               => _x('Team Members', 'Post Type General Name', 'everything-cacao'),
        'singular_name'      => _x('Team Member', 'Post Type Singular Name', 'everything-cacao'),
        'menu_name'          => __('Team Members', 'everything-cacao'),
        'all_items'          => __('All Team Members', 'everything-cacao'),
        'add_new_item'       => __('Add New Team Member', 'everything-cacao'),
        'add_new'            => __('Add New', 'everything-cacao'),
        'edit_item'          => __('Edit Team Member', 'everything-cacao'),
        'update_item'        => __('Update Team Member', 'everything-cacao'),
    );
    $args = array(
        'label'               => __('ec_team_member', 'everything-cacao'),
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail', 'page-attributes'),
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-groups',
        'capability_type'     => 'post',
        'hierarchical'        => false,
    );
    register_post_type('ec_team_member', $args);
}
add_action('init', 'ec_register_team_cpt');

function ec_add_team_meta_boxes() {
    add_meta_box(
        'ec_team_details',
        __('Team Member Details', 'everything-cacao'),
        'ec_render_team_meta_box',
        'ec_team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ec_add_team_meta_boxes');

function ec_render_team_meta_box($post) {
    wp_nonce_field('ec_save_team_meta', 'ec_team_nonce');
    $role     = get_post_meta($post->ID, 'team_role', true);
    $subtitle = get_post_meta($post->ID, 'team_subtitle', true);
    $bio      = get_post_meta($post->ID, 'team_bio', true);
    ?>
    <p>
        <label><strong>Role / Subtitle Tag:</strong></label><br>
        <input type="text" name="team_subtitle" value="<?php echo esc_attr($subtitle); ?>" style="width:100%;" placeholder="e.g. Strategic Vision & Heritage" />
    </p>
    <p>
        <label><strong>Short Bio:</strong></label><br>
        <textarea name="team_bio" rows="3" style="width:100%;" placeholder="Championing local Ghanaian cocoa transformation..."><?php echo esc_textarea($bio); ?></textarea>
    </p>
    <p style="color:#666; font-size:12px;"><strong>Tip:</strong> Set the team member's photo using the <em>Featured Image</em> box on the right side.</p>
    <?php
}

function ec_save_team_meta($post_id) {
    if (!isset($_POST['ec_team_nonce']) || !wp_verify_nonce($_POST['ec_team_nonce'], 'ec_save_team_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['team_subtitle'])) update_post_meta($post_id, 'team_subtitle', sanitize_text_field($_POST['team_subtitle']));
    if (isset($_POST['team_bio'])) update_post_meta($post_id, 'team_bio', sanitize_textarea_field($_POST['team_bio']));
}
add_action('save_post_ec_team_member', 'ec_save_team_meta');


/**
 * 10. Theme Settings Admin Submenu (Appearance -> Theme Settings)
 */
function ec_add_admin_menu() {
    add_theme_page(
        'Everything Cacao Settings',
        'Theme Settings',
        'manage_options',
        'everything-cacao-settings',
        'ec_render_admin_settings_page'
    );
}
add_action('admin_menu', 'ec_add_admin_menu');

function ec_render_admin_settings_page() {
    if (isset($_POST['ec_save_settings']) && check_admin_referer('ec_settings_nonce')) {
        if (isset($_POST['ec_pixel_id'])) {
            update_option('ec_pixel_id', sanitize_text_field($_POST['ec_pixel_id']));
        }
        if (isset($_POST['ec_whatsapp_number'])) {
            update_option('ec_whatsapp_number', sanitize_text_field($_POST['ec_whatsapp_number']));
        }
        if (isset($_POST['ec_concierge_email'])) {
            update_option('ec_concierge_email', sanitize_email($_POST['ec_concierge_email']));
        }
        echo '<div class="notice notice-success is-dismissible"><p><strong>Settings saved successfully!</strong></p></div>';
    }

    $pixel_id = get_option('ec_pixel_id', '');
    $whatsapp = get_option('ec_whatsapp_number', '233240661866');
    $email    = get_option('ec_concierge_email', 'info@everythingcacaogh.com');
    ?>
    <div class="wrap">
        <h1 style="font-family: Georgia, serif; color: #2C1A11;">🍫 Everything Cacao GH — Theme Settings</h1>
        <p>Manage your Meta (Facebook) Pixel tracking, WhatsApp Concierge phone number, and Concierge email address below.</p>
        <hr style="margin: 20px 0;" />

        <form method="post" action="">
            <?php wp_nonce_field('ec_settings_nonce'); ?>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="ec_pixel_id">Meta (Facebook) Pixel ID</label></th>
                    <td>
                        <input name="ec_pixel_id" type="text" id="ec_pixel_id" value="<?php echo esc_attr($pixel_id); ?>" class="regular-text" placeholder="e.g. 123456789012345" />
                        <p class="description">Enter your 15-16 digit Meta Pixel ID from <a href="https://business.facebook.com/events_manager2" target="_blank">Meta Events Manager</a>. PageView, Lead, and Contact events will automatically report to this Pixel.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="ec_whatsapp_number">WhatsApp Concierge Phone Number</label></th>
                    <td>
                        <input name="ec_whatsapp_number" type="text" id="ec_whatsapp_number" value="<?php echo esc_attr($whatsapp); ?>" class="regular-text" placeholder="233240000000" />
                        <p class="description">Enter your Ghana/International phone number without <code>+</code> or spaces (e.g., <code>233240000000</code>). All "Order via WhatsApp" buttons across the site will use this number.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="ec_concierge_email">Concierge Email Address</label></th>
                    <td>
                        <input name="ec_concierge_email" type="email" id="ec_concierge_email" value="<?php echo esc_attr($email); ?>" class="regular-text" placeholder="info@everythingcacaogh.com" />
                        <p class="description">Website contact form submissions will route directly to this email address.</p>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="ec_save_settings" id="submit" class="button button-primary" value="Save Settings" style="background: #C86D51; border-color: #C86D51;" />
            </p>
        </form>

        <hr style="margin: 30px 0;" />
        <h2>⚡ Confection Catalog Auto-Importer</h2>
        <p>Automatically upload and populate all 22 signature Ghanaian chocolate products (Cherelle, Nahar &amp; Gift Boxes) into WordPress <strong>Confection Catalog</strong> database with photos, prices, origins, and tasting notes.</p>
        <p>
            <a href="<?php echo admin_url('admin.php?page=everything-cacao-options&ec_action=seed_products'); ?>" class="button button-secondary" style="background: #2C1A11; color: #FFF; border-color: #2C1A11; padding: 6px 16px;">
                ⚡ Auto-Upload All 18 Confections to WordPress
            </a>
        </p>
    </div>
    <?php
}

/**
 * 10. Automatic Product Seeder for Confection Catalog (cacao_products CPT)
 *     Auto-creates all 22 Ghanaian artisanal chocolate products with images & meta fields in WordPress DB.
 *     Runs ONCE on first install only — never re-creates products deleted by the user.
 *     Can be manually re-triggered via the admin "Auto-Upload" button (?ec_action=seed_products).
 */
function ec_auto_seed_cacao_products() {
    if (!is_admin()) {
        return;
    }

    $force_seed = isset($_GET['ec_action']) && $_GET['ec_action'] === 'seed_products';
    
    if ($force_seed) {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible"><p><strong>🍫 Confection Catalog Auto-Uploaded!</strong> All 22 Ghanaian chocolate products (Cherelle, Nahar &amp; Gift Boxes) have been populated in WordPress database.</p></div>';
        });
    }

    // ── GUARD: Only auto-seed once. After initial seed, never re-create deleted products. ──
    // The manual "seed_products" button bypasses this guard for intentional re-seeding.
    $already_seeded = get_option('ec_products_seeded', false);
    if ($already_seeded && !$force_seed) {
        return;
    }

    $products = array(
        array(
            'title'       => 'Nahar 72% Dark Chocolate Long Bar',
            'sub_brand'   => 'Nahar',
            'price'       => '460',
            'cacao'       => '72% Dark Cacao',
            'origin'      => 'Sefwi Wiawso, Western Region • Ghana',
            'notes'       => 'Wild Blackberry, Smoked Timber, Roasted Espresso',
            'description' => 'Our flagship Nahar 72% obsidian dark chocolate long bar, conched for 72 hours for intense flavor.',
            'image_file'  => 'Nahar dark choc long.png',
        ),
        array(
            'title'       => 'Nahar 72% Dark Chocolate Executive Mini Box (24x9g)',
            'sub_brand'   => 'Nahar',
            'price'       => '490',
            'cacao'       => '72% Dark Cacao',
            'origin'      => 'Sefwi Wiawso • Ghana',
            'notes'       => 'Dark Fudge, Espresso, Velvet Cocoa',
            'description' => 'Individual 9g luxury squares of Nahar 72% dark chocolate packaged in a black & gold embossed executive box.',
            'image_file'  => 'Nahar dark choc small.png',
        ),
        array(
            'title'       => 'Nahar 55% Milk Chocolate Long Bar',
            'sub_brand'   => 'Nahar',
            'price'       => '440',
            'cacao'       => '55% Dark Milk Cacao',
            'origin'      => 'Sefwi Wiawso • Ghana',
            'notes'       => 'Caramelized Milk, Toasted Cocoa, Honey',
            'description' => 'High-cacao milk chocolate long bar balancing intense cocoa depth with smooth dairy richness.',
            'image_file'  => 'Nahar milk choc long.png',
        ),
        array(
            'title'       => 'Nahar 55% Milk Chocolate Executive Mini Box (24x9g)',
            'sub_brand'   => 'Nahar',
            'price'       => '470',
            'cacao'       => '55% Dark Milk Cacao',
            'origin'      => 'Sefwi Wiawso • Ghana',
            'notes'       => 'Rich Cocoa Butter, Caramel, Hazelnut',
            'description' => 'Executive collection box of Nahar 55% high-cacao milk chocolate squares in emerald gold foil.',
            'image_file'  => 'Nahar milk choc small.png',
        ),
        array(
            'title'       => 'Cherelle 45% Milk Chocolate Bar (90g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '305',
            'cacao'       => '45% Milk Cacao',
            'origin'      => 'Suhum, Eastern Region • Ghana',
            'notes'       => 'Warm Caramel, Toasted Hazelnut, Vanilla',
            'description' => 'Creamy artisanal milk chocolate crafted with pure Ghanaian cocoa butter, fresh milk, and golden cane sugar.',
            'image_file'  => 'Cherelle Milk Chocolate 90g.jpg',
        ),
        array(
            'title'       => 'Cherelle 60% Dark Chocolate Executive Box (24x9g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '350',
            'cacao'       => '60% Dark Cacao',
            'origin'      => 'Assin Fosu, Central Region • Ghana',
            'notes'       => 'Red Berry, Dark Fudge, Caramel',
            'description' => 'Smooth medium-dark chocolate with subtle red berry and caramel undertones, presented in an executive mini square collection box.',
            'image_file'  => 'Cherelle Dark Chocolate 24x9g.jpg',
        ),
        array(
            'title'       => 'Cherelle Delights Milk Chocolate Standup Pouch (50g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '280',
            'cacao'       => '40% Milk Cacao',
            'origin'      => 'On-The-Go Pouch • Accra',
            'notes'       => 'Creamy Cocoa, Sweet Honey, Toasted Milk',
            'description' => 'Convenient re-sealable standup pouch packed with bite-sized Cherelle milk chocolate delights for daily snacking.',
            'image_file'  => 'Cherelle Milk Chocolate 50g.jpg',
        ),
        array(
            'title'       => 'Cherelle 40% Milk Chocolate Square Box (24x9g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '320',
            'cacao'       => '40% Milk Cacao',
            'origin'      => 'Suhum, Eastern Region • Ghana',
            'notes'       => 'Creamy Butterscotch, Smooth Cocoa, Honey',
            'description' => 'Individual 9g luxury squares of Cherelle signature milk chocolate wrapped in gold foil, packaged in an elegant gift box.',
            'image_file'  => 'Cherelle Milk Chocolate 24x9g.jpg',
        ),
        array(
            'title'       => 'Cherelle Milk Chocolate Long Artisanal Bar',
            'sub_brand'   => 'Cherelle',
            'price'       => '310',
            'cacao'       => '45% Milk Cacao',
            'origin'      => 'Suhum, Eastern Region • Ghana',
            'notes'       => 'Toasted Almond, Creamy Caramel, Cocoa Butter',
            'description' => 'Elongated artisanal milk chocolate bar crafted with double-conched milk cacao.',
            'image_file'  => 'Cherelle milk choc long.png',
        ),
        array(
            'title'       => 'Cherelle Delights Mini Snack Pouch',
            'sub_brand'   => 'Cherelle',
            'price'       => '250',
            'cacao'       => '45% Milk Cacao',
            'origin'      => 'Accra • Ghana',
            'notes'       => 'Creamy Cocoa, Vanilla Bean, Honey',
            'description' => 'On-the-go snack pouch containing silky milk chocolate nibbles crafted from 100% single-origin cacao.',
            'image_file'  => 'Cherelle milk choc small b.png',
        ),
        array(
            'title'       => 'Nahar 72% Single-Origin Dark Chocolate Bar',
            'sub_brand'   => 'Nahar',
            'price'       => '450',
            'cacao'       => '72% Dark Cacao',
            'origin'      => 'Single-Origin • Sefwi Wiawso',
            'notes'       => 'Black Cherry, Roasted Espresso, Smoked Timber',
            'description' => 'Deep, intensely aromatic single-origin dark chocolate bar conched for 72 hours.',
            'image_file'  => '1.png',
        ),
        array(
            'title'       => 'Nahar 85% Obsidian Reserve Extra Dark Bar',
            'sub_brand'   => 'Nahar',
            'price'       => '480',
            'cacao'       => '85% Dark Cacao',
            'origin'      => 'Single-Origin • Tepa, Ashanti',
            'notes'       => 'Bittersweet Cocoa, Dark Plum, Smoked Wood',
            'description' => 'Our highest cacao percentage bar. High in polyphenols and antioxidants for pure dark cocoa purists.',
            'image_file'  => '2.png',
        ),
        array(
            'title'       => 'Nahar 70% Roasted Cacao Nib & Ada Sea Salt Bar',
            'sub_brand'   => 'Nahar',
            'price'       => '460',
            'cacao'       => '70% Dark Cacao',
            'origin'      => 'Sefwi Wiawso & Ada Foah',
            'notes'       => 'Crunch Nib, Sea Salt, Roasted Cocoa',
            'description' => 'Single-origin 70% dark chocolate studded with sun-roasted crunchy cacao nibs and sea salt flakes.',
            'image_file'  => '3.png',
        ),
        array(
            'title'       => 'Ashanti Gold Truffle & Praline Collection Box',
            'sub_brand'   => 'Gift Box',
            'price'       => '680',
            'cacao'       => 'Assorted Reserve',
            'origin'      => 'Kumasi & Suhum • Ghana',
            'notes'       => 'Golden Honeycomb, Hazelnut Praline, Dark Truffle',
            'description' => 'Hand-painted luxury truffles infused with wild Ashanti honey and 72% dark chocolate ganache.',
            'image_file'  => '4.png',
        ),
        array(
            'title'       => 'Royal Ghanaian Luxury Cacao Hamper',
            'sub_brand'   => 'Gift Box',
            'price'       => '1250',
            'cacao'       => 'Grand Cru Collection',
            'origin'      => 'Suhum & Sefwi Wiawso',
            'notes'       => 'Complete Confection Suite, Plush Keepsake',
            'description' => 'Our grandest gift hamper featuring full-sized Cherelle & Nahar bars, snack pouches, and plush keepsake.',
            'image_file'  => '5.png',
        ),
        array(
            'title'       => 'Cherelle Honeycomb & Salted Caramel Bar (90g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '340',
            'cacao'       => '50% Milk Cacao',
            'origin'      => 'Suhum, Eastern Region • Ghana',
            'notes'       => 'Golden Honeycomb, Salted Butter, Caramel',
            'description' => 'Crunchy golden honeycomb pieces folded into creamy milk chocolate with a pinch of sea salt.',
            'image_file'  => '6.png',
        ),
        array(
            'title'       => 'Organic Sun-Dried Roasted Cacao Nibs (250g Pouch)',
            'sub_brand'   => 'Artisanal Reserve',
            'price'       => '220',
            'cacao'       => '100% Pure Cacao',
            'origin'      => 'Assin Fosu, Central Region • Ghana',
            'notes'       => 'Nutty, Raw Cocoa, Earthy Bitterness',
            'description' => 'Unsweetened, antioxidant-rich organic roasted cacao nibs. Superfood perfect for baking and smoothies.',
            'image_file'  => '7.png',
        ),
        array(
            'title'       => 'Cherelle 50% Dark Chocolate Snack Pouch (50g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '270',
            'cacao'       => '50% Dark Cacao',
            'origin'      => 'Suhum, Eastern Region • Ghana',
            'notes'       => 'Balanced Dark Cocoa, Caramel, Toasted Oat',
            'description' => 'Semi-sweet 50% dark chocolate snack bites packed in a protective re-sealable foil pouch.',
            'image_file'  => 'cherelle-2.jpg',
        ),
        array(
            'title'       => 'Cherelle 70% Dark Chocolate Standup Pouch (50g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '290',
            'cacao'       => '70% Dark Cacao',
            'origin'      => 'Assin Fosu, Central Region • Ghana',
            'notes'       => 'Rich Cocoa, Black Currant, Espresso',
            'description' => 'Deep 70% dark chocolate bite-sized squares for health-conscious dark chocolate enthusiasts.',
            'image_file'  => 'cherelle-3.jpg',
        ),
        array(
            'title'       => 'Cherelle Roasted Peanut Milk Chocolate Bar (90g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '320',
            'cacao'       => '45% Milk Cacao',
            'origin'      => 'Northern Region & Suhum • Ghana',
            'notes'       => 'Crunchy Roasted Peanuts, Milk Cocoa',
            'description' => 'Slow-roasted Northern Ghanaian peanuts embedded in rich 45% milk chocolate.',
            'image_file'  => 'cherelle-4.jpg',
        ),
        array(
            'title'       => 'Cherelle Orange Zest Dark Chocolate Bar (90g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '335',
            'cacao'       => '60% Dark Cacao',
            'origin'      => 'Suhum & Koforidua • Ghana',
            'notes'       => 'Citrus Zest, Dark Fudge, Citrus Blossom',
            'description' => 'Infused with natural candied citrus peel oil and 60% dark Ghanaian cacao for a refreshing flavor.',
            'image_file'  => 'cherelle-5.jpg',
        ),
        array(
            'title'       => 'Cherelle Spiced Ginger & Honey Dark Bar (90g)',
            'sub_brand'   => 'Cherelle',
            'price'       => '345',
            'cacao'       => '65% Dark Cacao',
            'origin'      => 'Assin Fosu & Suhum • Ghana',
            'notes'       => 'Warm Ginger Spice, Wild Honey, Dark Cocoa',
            'description' => 'Zesty Ghanaian ginger root spice balanced with pure forest honey folded into smooth 65% dark chocolate.',
            'image_file'  => 'cherelle-6.jpg',
        )
    );

    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    foreach ($products as $prod) {
        $existing_posts = get_posts(array(
            'post_type'   => 'cacao_products',
            'title'       => $prod['title'],
            'post_status' => 'any',
            'numberposts' => 1,
        ));
        $existing = !empty($existing_posts) ? $existing_posts[0] : null;
        if ($existing) {
            continue;
        }

        $post_id = wp_insert_post(array(
            'post_title'   => $prod['title'],
            'post_content' => $prod['description'],
            'post_status'  => 'publish',
            'post_type'    => 'cacao_products',
        ));

        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, 'sub_brand', $prod['sub_brand']);
            update_post_meta($post_id, 'product_price', $prod['price']);
            update_post_meta($post_id, 'cacao_content', $prod['cacao']);
            update_post_meta($post_id, 'origin_region', $prod['origin']);
            update_post_meta($post_id, 'tasting_notes', $prod['notes']);
            update_post_meta($post_id, 'product_description', $prod['description']);

            $imgPath = get_template_directory() . '/assets/images/products/' . $prod['image_file'];
            if (file_exists($imgPath)) {
                $upload = wp_upload_bits($prod['image_file'], null, file_get_contents($imgPath));
                if (!isset($upload['error']) || !$upload['error']) {
                    $attachment = array(
                        'post_mime_type' => $upload['type'],
                        'post_title'     => sanitize_file_name($prod['image_file']),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );
                    $attach_id = wp_insert_attachment($attachment, $upload['file'], $post_id);
                    if (!is_wp_error($attach_id)) {
                        $attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);
                        wp_update_attachment_metadata($attach_id, $attach_data);
                        set_post_thumbnail($post_id, $attach_id);
                    }
                }
            } else {
                // If local theme file is missing (e.g. Git ignored), search WP Media Library for uploaded image
                global $wpdb;
                $attach_id = $wpdb->get_var($wpdb->prepare(
                    "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
                    '%' . $wpdb->esc_like($prod['image_file'])
                ));
                if ($attach_id) {
                    set_post_thumbnail($post_id, $attach_id);
                }
            }
        } elseif ($existing && !has_post_thumbnail($existing->ID)) {
            // Auto-link thumbnail if user uploaded image to Media Library after seeding
            global $wpdb;
            $attach_id = $wpdb->get_var($wpdb->prepare(
                "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
                '%' . $wpdb->esc_like($prod['image_file'])
            ));
            if ($attach_id) {
                set_post_thumbnail($existing->ID, $attach_id);
            }
        }
    }

    // ── Mark seeding as complete so it never auto-runs again ──
    update_option('ec_products_seeded', true);
}
add_action('admin_init', 'ec_auto_seed_cacao_products');

/**
 * 11. Smart Media Library Image Resolver
 * Auto-finds images uploaded to WP Media Library by filename.
 * Prevents broken images even if local theme assets are missing from Git.
 */
function ec_get_smart_image_url($setting_name, $filename) {
    // 1. Customizer Setting Override
    if ($setting_name) {
        $customizer_url = get_theme_mod($setting_name);
        if ($customizer_url) {
            return $customizer_url;
        }
    }

    // 2. Direct URL Fallback
    if ($filename && (strpos($filename, 'http://') === 0 || strpos($filename, 'https://') === 0)) {
        return $filename;
    }

    // 2. Search WP Media Library by Filename
    if ($filename) {
        global $wpdb;
        $attachment_id = $wpdb->get_var($wpdb->prepare(
            "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
            '%' . $wpdb->esc_like($filename)
        ));

        if ($attachment_id) {
            $url = wp_get_attachment_url($attachment_id);
            if ($url) {
                return $url;
            }
        }

        // Search by Attachment Title / Slug
        $clean_name = pathinfo($filename, PATHINFO_FILENAME);
        $attachment_results = get_posts(array(
            'post_type'   => 'attachment',
            'title'       => $clean_name,
            'post_status' => 'inherit',
            'numberposts' => 1,
        ));
        if (!empty($attachment_results)) {
            $url = wp_get_attachment_url($attachment_results[0]->ID);
            if ($url) {
                return $url;
            }
        }
    }

    // 3. Fallback to Local Theme Asset File (if present)
    $theme_file_path = get_template_directory() . '/assets/images/products/' . $filename;
    if (file_exists($theme_file_path)) {
        return get_template_directory_uri() . '/assets/images/products/' . $filename;
    }

    // 4. Fallback to User Uploaded Media Library Product Image
    return 'https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png';
}

/**
 * 12. Menu Filters & Permalink Resolver for Stockists Page
 * Automatically renames any WP menu item titled "Stock Lists" or "Stock Lists & Concierge" to "STOCKISTS"
 * and rewrites /stock-lists URLs to /stockist/
 */
function ec_customize_nav_menu_items($items, $args) {
    if (!is_array($items)) return $items;
    foreach ($items as $item) {
        if (isset($item->title) && preg_match('/stock\s*lists?/i', $item->title)) {
            $item->title = 'STOCKISTS';
        }
        if (isset($item->url) && strpos($item->url, '/stock-lists') !== false) {
            $item->url = str_replace('/stock-lists', '/stockist', $item->url);
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'ec_customize_nav_menu_items', 10, 2);

function ec_filter_nav_menu_item_title($title, $item, $args, $depth) {
    if (preg_match('/stock\s*lists?/i', $title)) {
        return 'STOCKISTS';
    }
    return $title;
}
add_filter('nav_menu_item_title', 'ec_filter_nav_menu_item_title', 10, 4);

/**
 * 13. Redirect /stock-lists/ to /stockist/ (301 Permanent Redirect)
 */
function ec_redirect_stock_lists_url() {
    if (is_admin()) return;
    $uri = sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI']));
    if (strpos($uri, '/stock-lists') !== false) {
        $new_uri = str_replace('/stock-lists', '/stockist', $uri);
        wp_redirect(home_url($new_uri), 301);
        exit;
    }
}
add_action('template_redirect', 'ec_redirect_stock_lists_url');

/**
 * 14. AJAX Handler: Quick Inquiry Form (Homepage)
 */
function ec_handle_quick_inquiry_ajax() {
    check_ajax_referer('ec_concierge_nonce', 'nonce');

    $name    = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email   = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    if (empty($name) || empty($email) || !is_email($email)) {
        wp_send_json_error(array('message' => 'Please provide a valid name and email address.'));
    }

    $to      = get_option('ec_concierge_email', 'info@everythingcacaogh.com');
    $subject = sprintf('[Quick Inquiry] Message from %s', $name);
    $body    = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}\n";
    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>");

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => sprintf('Thank you %s! Your inquiry has been sent to %s.', $name, $to)));
    } else {
        wp_send_json_success(array('message' => sprintf('Thank you %s! Your inquiry has been received.', $name)));
    }
}
add_action('wp_ajax_ec_submit_quick_inquiry', 'ec_handle_quick_inquiry_ajax');
add_action('wp_ajax_nopriv_ec_submit_quick_inquiry', 'ec_handle_quick_inquiry_ajax');

/**
 * 15. AJAX Handler: Palette Club Newsletter Signup
 */
function ec_handle_palette_club_ajax() {
    check_ajax_referer('ec_concierge_nonce', 'nonce');

    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    if (empty($email) || !is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }

    $to      = get_option('ec_concierge_email', 'info@everythingcacaogh.com');
    $subject = '[Palette Club] New Subscriber';
    $body    = "New Palette Club subscriber:\nEmail: {$email}\n\nPlease add to your mailing list.\n";
    $headers = array('Content-Type: text/plain; charset=UTF-8');

    wp_mail($to, $subject, $body, $headers);

    wp_send_json_success(array('message' => 'Welcome to The Palette Club! Check your inbox for private tasting invitations.'));
}
add_action('wp_ajax_ec_submit_palette_club', 'ec_handle_palette_club_ajax');
add_action('wp_ajax_nopriv_ec_submit_palette_club', 'ec_handle_palette_club_ajax');

/**
 * 16. Auto-Publish Recipe Blog Post: Chocolate Chunk Banana Bread
 */
function ec_auto_publish_recipe_blog_post() {
    $slug = 'chocolate-chunk-banana-bread-ghanaian-dark-chocolate';
    
    // Check if post already exists
    $existing = get_page_by_path($slug, OBJECT, 'post');
    if ($existing) {
        return;
    }

    // Ensure category 'Recipes' exists
    $cat_id = 0;
    $term = get_term_by('name', 'Recipes', 'category');
    if ($term) {
        $cat_id = $term->term_id;
    } else {
        $cat = wp_insert_term('Recipes', 'category', array('slug' => 'recipes'));
        if (!is_wp_error($cat)) {
            $cat_id = $cat['term_id'];
        }
    }

    $post_title = 'Chocolate Chunk Banana Bread Made with Ghanaian Dark Chocolate';
    $post_content = <<<'HTML'
<p class="text-xl font-medium text-cacao-dark leading-relaxed mb-6">
  We all know the feeling. You buy a bunch of bananas, life gets busy, and a few days later they are sitting on the counter soft, freckled and past the point where anyone wants to eat them. In our heat they get there quickly.
</p>

<p class="mb-6">
  Don't throw them away. Overripe bananas are the sweetest, most fragrant they will ever be, and they make the best banana bread — and banana bread happens to be one of the loveliest ways to bake with good chocolate.
</p>

<p class="mb-6">
  This is a simple, one-bowl recipe. What makes it special is the chocolate: one 100g bar of <a href="/our-collections?lineage=nahar" class="text-accent-terracotta font-semibold hover:underline">Nahar 72% dark</a>, chopped into rough chunks and folded through the batter. A proper dark chocolate bar, made here in Ghana from Ghanaian cocoa, broken up with a knife.
</p>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  Why a chopped bar makes a better bake than baking drops
</h2>

<p class="mb-4">Using a real chocolate bar instead of ready-made baking drops gives you three lovely things:</p>

<ul class="list-disc pl-6 space-y-2 mb-6 text-cacao-dark">
  <li><strong>Variety in every slice:</strong> When you chop by hand, the pieces come out all different sizes. The fine dust and slivers melt into the batter and flavour the whole loaf; the big chunks stay as generous bites of pure chocolate. Every slice is a little different.</li>
  <li><strong>Better chocolate:</strong> A Nahar bar is chocolate you would happily eat on its own — good cocoa, good cocoa butter, nothing extra. Baking drops are made to survive the oven rather than to taste wonderful, so a real bar simply gives you more flavour.</li>
  <li><strong>Beautiful melting pockets:</strong> Because the bar is full of real cocoa butter, it softens properly in the heat and leaves glossy seams and puddles of chocolate running through the crumb.</li>
</ul>

<blockquote class="border-l-4 border-accent-gold pl-6 py-4 my-8 bg-canvas/80 rounded-r-xl italic font-serif-luxury text-lg text-cacao-dark">
  One tip that makes chopping much easier: put the bar in the fridge for about 10 minutes first. A cold bar breaks into clean chunks under the knife, while a bar left in a warm kitchen tends to bend and smear.
</blockquote>

<p class="mb-6">
  Chop on a board with a large knife, working from one corner of the bar diagonally across. Aim for pieces roughly the size of your thumbnail, plus the smaller rubble. Keep about a quarter of the chunks aside to press into the top before baking, so the loaf comes out looking as good as it tastes.
</p>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  Why 72% is the right strength for this loaf
</h2>

<p class="mb-4">Very ripe bananas are sweet, and so is the sugar in the batter.</p>

<p class="mb-6">
  At 72%, the <a href="/our-collections?lineage=nahar" class="text-accent-terracotta font-semibold hover:underline">Nahar dark bar</a> sits in the sweet spot — enough sugar to read as a treat, enough cocoa to bring bitterness and that deep roasted note that cuts through the sweetness of the fruit. Ghanaian cocoa is known worldwide for exactly this profile: rounded, classic, chocolatey rather than sharp or fruity. It is why so much of the world's premium chocolate starts as beans grown here.
</p>

<!-- Recipe Card Container -->
<div class="my-10 p-8 bg-card-bg rounded-2xl border-2 border-accent-gold/40 shadow-xl space-y-6">
  <div class="border-b border-cacao-dark/15 pb-4">
    <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta block">Ghanaian Kitchen Special</span>
    <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">Chocolate Chunk Banana Bread Recipe</h3>
    <div class="flex flex-wrap items-center gap-4 text-xs font-semibold text-cacao-dark/80 mt-2">
      <span>⏱️ Prep: 15 mins</span>
      <span>•</span>
      <span>🔥 Bake: 55–65 mins</span>
      <span>•</span>
      <span>🍞 Yield: 1 Loaf (10 slices)</span>
    </div>
  </div>

  <div class="space-y-4">
    <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">Ingredients</h4>
    <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm text-cacao-dark">
      <li>• 3 large very ripe bananas (approx. 350g)</li>
      <li>• 115g butter, melted (or 110ml neutral oil)</li>
      <li>• 150g brown sugar</li>
      <li>• 2 large eggs / 3 medium eggs</li>
      <li>• 1 tsp vanilla extract</li>
      <li>• 190g plain flour</li>
      <li>• 1 tsp bicarbonate of soda</li>
      <li>• ½ tsp fine salt</li>
      <li>• ½ tsp ground cinnamon or nutmeg</li>
      <li>• 1 × 100g bar <a href="/our-collections?lineage=nahar" class="text-accent-terracotta font-semibold hover:underline">Nahar 72% dark chocolate</a></li>
    </ul>
  </div>

  <div class="space-y-4 pt-4 border-t border-cacao-dark/10">
    <h4 class="font-serif-luxury text-lg font-bold text-cacao-dark">Equipment Needed</h4>
    <p class="text-sm text-text-muted">A 23 × 13cm (9 × 5 inch) loaf tin, greased &amp; lined · One large mixing bowl, a fork and a spatula — no mixer needed.</p>
  </div>
</div>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  How to make it
</h2>

<ol class="list-decimal pl-6 space-y-4 mb-8 text-cacao-dark">
  <li><strong>Heat the oven:</strong> Preheat to 175°C (350°F). Grease your loaf tin and line it with baking paper.</li>
  <li><strong>Mash bananas:</strong> Mash the ripe bananas in a large mixing bowl with a fork until smooth.</li>
  <li><strong>Combine wet ingredients:</strong> Whisk in the melted butter, sugar, eggs one at a time, and vanilla until smooth and glossy.</li>
  <li><strong>Fold dry ingredients:</strong> Add flour, bicarbonate of soda, salt, and spice. Fold with a spatula only until no dry flour remains. <em>Do not overmix.</em></li>
  <li><strong>Fold in chocolate:</strong> Gently fold in three-quarters of the chopped Nahar 72% chocolate chunks.</li>
  <li><strong>Bake:</strong> Scrape into the tin, level top, and press reserved chunks on top. Bake for 55–65 minutes until a skewer comes out clean.</li>
  <li><strong>Cool:</strong> Cool in tin for 15 minutes, then transfer to a rack for 20 minutes before slicing.</li>
</ol>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  Baker's notes for Ghanaian kitchens
</h2>

<div class="p-6 bg-canvas rounded-xl border border-cacao-dark/15 space-y-3 my-6">
  <ul class="space-y-2 text-sm text-cacao-dark">
    <li>💡 <strong>Storage:</strong> Store chocolate somewhere cool, dry, and airtight away from spices.</li>
    <li>🧊 <strong>Chilling:</strong> 10 minutes in the fridge before chopping ensures crisp, clean chunks.</li>
    <li>🔥 <strong>Gas Ovens:</strong> Rotate the tin at 35 minutes; cover loosely with foil if browning too fast.</li>
    <li>💧 <strong>Rainy Season Humidity:</strong> If flour is holding moisture and batter looks loose, add 1 extra tbsp flour.</li>
  </ul>
</div>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  Ways to make it your own
</h2>

<ul class="list-disc pl-6 space-y-2 mb-6 text-sm text-cacao-dark">
  <li><strong>Roasted groundnuts:</strong> A handful of chopped roasted groundnuts folded in with the chocolate.</li>
  <li><strong>Toasted coconut:</strong> Fold 40g through the batter and scatter more on top.</li>
  <li><strong>Sea salt finish:</strong> A few flakes of sea salt over top chunks before baking.</li>
  <li><strong>For children:</strong> Swap half the Nahar 72% for our <a href="/our-collections?lineage=cherelle" class="text-accent-terracotta underline font-semibold">Cherelle 60%</a> for a sweeter finish.</li>
</ul>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  Where to buy the chocolate
</h2>

<p class="mb-6">
  You can find the Nahar 72% dark bar and the rest of the Everything Cacao GH range in <a href="/stockist" class="text-accent-terracotta underline font-semibold">supermarkets and malls across Ghana</a>. Every bar is made from Ghanaian cocoa, processed and produced right here.
</p>

<div class="my-8">
  <a href="/our-collections?lineage=nahar" class="px-8 py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors inline-block rounded-lg shadow-md">
    Shop the Nahar 72% Dark Bar &rarr;
  </a>
</div>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-12 mb-6">
  Frequently Asked Questions
</h2>

<div class="space-y-4 my-8">
  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">What if I don't want to use the 72% bar?</h3>
    <p class="text-sm text-text-muted">Use our Cherelle 60% instead. It is a gentler, sweeter chocolate, so the loaf comes out milder and more of a family favourite — especially good if you are baking for children.</p>
  </div>

  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Why did all my chocolate chunks sink to the bottom?</h3>
    <p class="text-sm text-text-muted">Toss the chopped chocolate in a teaspoon of your measured flour before folding it in — the light coating helps it grip the batter and stay suspended.</p>
  </div>

  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">My bananas aren't ripe enough. What can I do?</h3>
    <p class="text-sm text-text-muted">Put them, still in their skins, on a tray in a 180°C oven for 15–20 minutes until the skins turn black and shiny. Let them cool, then scoop out the flesh.</p>
  </div>

  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Can I make this without an oven?</h3>
    <p class="text-sm text-text-muted">Yes — a heavy-bottomed pot on the lowest possible flame, with the batter in a greased tin sitting on a trivet inside, lid on, will bake in 50–70 minutes.</p>
  </div>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Recipe",
  "name": "Chocolate Chunk Banana Bread Made with Ghanaian Dark Chocolate",
  "image": [
    "https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png"
  ],
  "author": {
    "@type": "Organization",
    "name": "Everything Cacao GH"
  },
  "datePublished": "2026-08-19",
  "description": "An easy banana bread recipe using one 100g bar of Nahar 72% dark chocolate cut into chunks. Made in Ghana chocolate, baked in a Ghanaian kitchen.",
  "prepTime": "PT15M",
  "cookTime": "PT60M",
  "totalTime": "PT75M",
  "keywords": "chocolate chunk banana bread recipe, Ghanaian dark chocolate, Nahar chocolate, banana bread with dark chocolate",
  "recipeYield": "10 slices",
  "recipeCategory": "Dessert",
  "recipeCuisine": "Ghanaian",
  "recipeIngredient": [
    "3 large very ripe bananas (about 350g peeled)",
    "115g butter, melted and slightly cooled",
    "150g brown sugar",
    "2 large eggs at room temperature",
    "1 tsp vanilla extract",
    "190g plain flour",
    "1 tsp bicarbonate of soda",
    "½ tsp fine salt",
    "½ tsp ground cinnamon",
    "100g bar Nahar 72% dark chocolate, chopped"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What if I don't want to use the 72% bar?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Use our Cherelle 60% instead. It is a gentler, sweeter chocolate, so the loaf comes out milder and more of a family favourite."
      }
    },
    {
      "@type": "Question",
      "name": "Why did all my chocolate chunks sink to the bottom?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Toss the chopped chocolate in a teaspoon of your measured flour before folding it in — the light coating helps it grip the batter."
      }
    },
    {
      "@type": "Question",
      "name": "My bananas aren't ripe enough. What can I do?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Put them, still in their skins, on a tray in a 180°C oven for 15–20 minutes until the skins turn black and shiny."
      }
    },
    {
      "@type": "Question",
      "name": "Can I make this without an oven?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — a heavy-bottomed pot on the lowest possible flame, with the batter in a greased tin sitting on a trivet inside, lid on, will bake in roughly 50–70 minutes."
      }
    }
  ]
}
</script>
HTML;

    $post_id = wp_insert_post(array(
        'post_title'    => $post_title,
        'post_name'     => $slug,
        'post_content'  => $post_content,
        'post_excerpt'  => 'An easy banana bread recipe using one 100g bar of Nahar 72% dark chocolate cut into chunks. Made in Ghana chocolate, baked in a Ghanaian kitchen.',
        'post_status'   => 'publish',
        'post_type'     => 'post',
        'post_category' => array($cat_id),
    ));

    if ($post_id && !is_wp_error($post_id)) {
        // SEO metadata for Yoast & Rank Math
        update_post_meta($post_id, '_yoast_wpseo_title', 'Chocolate Chunk Banana Bread with Ghanaian Dark Chocolate');
        update_post_meta($post_id, '_yoast_wpseo_metadesc', 'An easy banana bread recipe using one 100g bar of Nahar 72% dark chocolate cut into chunks. Made in Ghana chocolate, baked in a Ghanaian kitchen.');
        update_post_meta($post_id, 'rank_math_title', 'Chocolate Chunk Banana Bread with Ghanaian Dark Chocolate');
        update_post_meta($post_id, 'rank_math_description', 'An easy banana bread recipe using one 100g bar of Nahar 72% dark chocolate cut into chunks. Made in Ghana chocolate, baked in a Ghanaian kitchen.');
        update_post_meta($post_id, 'rank_math_focus_keyword', 'chocolate chunk banana bread recipe');
        wp_set_post_tags($post_id, array('GhanaianCacao', 'NaharObsidian', 'Recipe', 'Baking'));
    }
}
add_action('init', 'ec_auto_publish_recipe_blog_post');

/**
 * 17. Auto-Publish Wellbeing Blog Post: Is Dark Chocolate Good for You?
 */
function ec_auto_publish_wellbeing_blog_post() {
    $slug = 'benefits-of-dark-chocolate-ghana';

    // Check if post already exists
    $existing = get_page_by_path($slug, OBJECT, 'post');
    if ($existing) {
        return;
    }

    // Ensure category 'Cocoa & Wellbeing' exists
    $cat_id = 0;
    $term = get_term_by('name', 'Cocoa & Wellbeing', 'category');
    if ($term) {
        $cat_id = $term->term_id;
    } else {
        $cat = wp_insert_term('Cocoa & Wellbeing', 'category', array('slug' => 'cocoa-wellbeing'));
        if (!is_wp_error($cat)) {
            $cat_id = $cat['term_id'];
        }
    }

    $post_title = 'Is Dark Chocolate Good for You? The Facts, in Plain Language';
    $post_content = <<<'HTML'
<p class="text-xl font-medium text-cacao-dark leading-relaxed mb-6">
  Ghana grows some of the best cocoa in the world. But how many of us actually know what that cocoa does for the body once it becomes chocolate?
</p>

<p class="mb-6">
  Here is what dark chocolate does for you, in simple words. No jargon — just the good news, and how to get the most out of every bar.
</p>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  What makes chocolate "dark"
</h2>

<p class="mb-4">
  Look at the front of any good chocolate bar and you will see a number. Our <a href="/our-collections?lineage=nahar" class="text-accent-terracotta font-semibold hover:underline">Nahar bar</a> says 72%.
</p>

<p class="mb-6">
  That number is the cocoa content — how much of the bar comes from the cocoa bean itself, counting both the cocoa solids and the cocoa butter. The higher the number, the more cocoa you are getting. Dark chocolate carries a higher cocoa content than milk chocolate, and it is that generous amount of cocoa which brings the deep flavour and the goodness described below.
</p>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  1. It is good for your heart
</h2>

<p class="mb-4">
  Cocoa beans contain natural plant compounds called flavanols. These compounds help your blood vessels relax and open up, so blood moves through them more easily.
</p>

<p class="mb-4">Researchers have studied cocoa many times, across thousands of people, and the findings are encouraging:</p>

<ul class="list-disc pl-6 space-y-2 mb-6 text-cacao-dark">
  <li><strong>Healthier blood pressure:</strong> People who enjoyed cocoa daily tended to have healthier blood pressure readings.</li>
  <li><strong>Proven long-term benefits:</strong> In one large study of more than 21,000 adults, those taking cocoa every day showed better heart health over the years that followed.</li>
  <li><strong>Extensively researched:</strong> Cocoa is one of the most researched foods in the world for heart health — which is a wonderful thing to be able to say about something that tastes this good.</li>
</ul>

<blockquote class="border-l-4 border-accent-gold pl-6 py-4 my-8 bg-canvas/80 rounded-r-xl italic font-serif-luxury text-lg text-cacao-dark">
  Very few treats have this kind of reputation. Dark chocolate is one of the rare ones you can enjoy and feel good about.
</blockquote>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  2. It gives you iron and magnesium
</h2>

<p class="mb-4">
  This is the part most people never hear. Dark chocolate is not just a treat — it is genuinely full of minerals your body needs.
</p>

<p class="mb-4">Eat three squares (about 25g, a quarter of a 100g bar) and you get:</p>

<ul class="list-disc pl-6 space-y-2 mb-6 text-cacao-dark">
  <li><strong>Iron (approx. 3mg):</strong> Iron builds the blood and carries oxygen around the body, keeping your energy up through the day.</li>
  <li><strong>Magnesium (approx. 58mg):</strong> Magnesium helps your muscles and nerves work well and supports good, restful sleep.</li>
  <li><strong>Essential Minerals:</strong> Copper, manganese, and potassium in balanced amounts.</li>
</ul>

<div class="p-6 bg-canvas rounded-xl border border-cacao-dark/15 space-y-2 my-6">
  <p class="text-sm text-cacao-dark font-medium">
    💡 <strong>Pro Tip for Iron Absorption:</strong> Eat your chocolate with something containing vitamin C, like orange, pineapple, or fresh juice, and your body absorbs the iron better. Tea and coffee do the opposite, so leave a gap between them.
  </p>
</div>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  3. It is naturally rich in fibre
</h2>

<p class="mb-4">
  Cocoa brings fibre with it — around 11g in every 100g of dark chocolate, which is more than most people expect from something so indulgent.
</p>

<p class="mb-6">
  Fibre and cocoa butter together are what make dark chocolate so satisfying. A couple of squares genuinely feel like enough, which is why dark chocolate is the kind of treat you enjoy properly rather than finish without noticing.
</p>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  4. It lifts your mood and helps you focus
</h2>

<p class="mb-4">
  Cocoa contains theobromine. It is a cousin of caffeine, but gentler and longer lasting. It wakes you up slowly instead of jolting you, which is why a square of chocolate around 3pm works better than another cup of coffee.
</p>

<p class="mb-6">
  Research has also found that people feel brighter and concentrate better after enjoying cocoa. Anyone who has reached for a square during a long afternoon already knew that.
</p>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  5. It is packed with antioxidants — if it is made well
</h2>

<p class="mb-4">
  Cocoa has more antioxidants by weight than most fruits. Antioxidants protect your cells from daily damage.
</p>

<p class="mb-6">
  One thing worth knowing: the gentler the processing, the more of that natural goodness stays in the bar. Heavy factory processing strips much of it away, while careful handling keeps it intact. So when we talk about high-quality chocolate, we are talking about more than taste. Good beans, proper fermentation and drying, and gentle processing are what keep the goodness inside the bar — and they are exactly what make it taste better too.
</p>

<!-- Highlight Box: Made in Ghana -->
<div class="my-10 p-8 bg-card-bg rounded-2xl border-2 border-accent-gold/40 shadow-xl space-y-4">
  <span class="text-xs font-semibold uppercase tracking-widest text-accent-terracotta block">Why Local Sourcing Matters</span>
  <h3 class="font-serif-luxury text-2xl font-bold text-cacao-dark">Why chocolate made in Ghana is a better buy</h3>
  <p class="text-sm text-text-muted leading-relaxed">
    Ghana is the second-largest cocoa producer in the world. Our beans are famous globally for a rich, rounded, deeply chocolatey taste. That is why so much expensive chocolate sold in Europe and America quietly starts on a farm in the Western or Ashanti Region.
  </p>
  <p class="text-sm text-text-muted leading-relaxed">
    <a href="/about-us" class="text-accent-terracotta font-semibold underline">Everything Cacao GH</a> was built to change that. Our cocoa is sourced in Ghana and our chocolate is made in Ghana. For you, that means:
  </p>
  <ul class="list-disc pl-6 space-y-2 text-sm text-cacao-dark">
    <li><strong>Fresher chocolate:</strong> Your bar did not spend months on a ship before it became chocolate.</li>
    <li><strong>Full transparency:</strong> The farm and the factory are in the same country.</li>
    <li><strong>Empowering local communities:</strong> The jobs, skills, and profit stay in Ghana, with the farmers who grew the crop.</li>
  </ul>
</div>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  How to enjoy it
</h2>

<p class="mb-4">
  Two to three squares a day — about a quarter of a 100g bar — is the amount that appears again and again in the research, and it slips easily into everyday life. Morning coffee, afternoon break, after dinner: pick your moment.
</p>

<p class="mb-6">
  Eat it slowly. Let a square rest on your tongue and melt rather than chewing it. A 72% bar has a long, layered finish, and taking your time is how you taste it. This is chocolate to savour, not to rush.
</p>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  How to choose a good dark chocolate bar
</h2>

<ul class="list-disc pl-6 space-y-2 mb-8 text-cacao-dark">
  <li><strong>Read the first ingredient:</strong> In a good bar it is cocoa — cocoa mass, cocoa beans or cocoa liquor.</li>
  <li><strong>Look for cocoa butter:</strong> Real cocoa butter gives chocolate that smooth, clean melt on the tongue.</li>
  <li><strong>Choose 60% and above:</strong> Most people are happiest between 70% and 75%.</li>
  <li><strong>Short ingredient list:</strong> Cocoa, cocoa butter, sugar, a little lecithin, and vanilla is all a fine bar needs.</li>
  <li><strong>Check the snap:</strong> Good chocolate breaks with a clean, sharp crack and has a shiny surface.</li>
</ul>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-10 mb-4">
  Where to buy ours
</h2>

<p class="mb-6">
  You will find our <a href="/our-collections?lineage=nahar" class="text-accent-terracotta underline font-semibold">Nahar 72% dark bar</a> in <a href="/stockist" class="text-accent-terracotta underline font-semibold">supermarkets and malls across Ghana</a>, and in our online shop. Nahar is our premium range; Cherelle is our everyday range — sweeter, made for the family. And if you would rather <a href="/blog/chocolate-chunk-banana-bread-ghanaian-dark-chocolate" class="text-accent-terracotta underline font-semibold">bake with it</a> than eat it plain, one 100g Nahar bar chopped into chunks makes a beautiful chocolate chunk banana bread.
</p>

<div class="my-8">
  <a href="/our-collections?lineage=nahar" class="px-8 py-4 bg-cacao-dark text-canvas font-semibold text-xs uppercase tracking-widest hover:bg-accent-terracotta transition-colors inline-block rounded-lg shadow-md">
    Shop the Nahar 72% Dark Bar &rarr;
  </a>
</div>

<h2 class="font-serif-luxury text-2xl md:text-3xl font-bold text-cacao-dark mt-12 mb-6">
  Questions people ask
</h2>

<div class="space-y-4 my-8">
  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Which percentage of dark chocolate is best?</h3>
    <p class="text-sm text-text-muted">70% and above is where you get a generous amount of cocoa. 70% to 75% is the range most people love, which is exactly where our Nahar 72% sits.</p>
  </div>

  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Can I eat dark chocolate every day?</h3>
    <p class="text-sm text-text-muted">Yes — two or three squares a day is a lovely daily habit, and it is roughly the amount used in published research studies.</p>
  </div>

  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Is dark chocolate good for the heart?</h3>
    <p class="text-sm text-text-muted">Cocoa is one of the most studied foods in the world for heart health. The natural flavanols help blood vessels relax and support healthy blood pressure.</p>
  </div>

  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Is dark chocolate a good source of iron?</h3>
    <p class="text-sm text-text-muted">Yes! Three squares give you around 3mg of iron. Pair it with orange or pineapple for even better absorption.</p>
  </div>

  <div class="p-6 bg-card-bg rounded-xl border border-cacao-dark/10 space-y-2">
    <h3 class="font-serif-luxury text-lg font-bold text-cacao-dark">Why does chocolate made in Ghana taste different?</h3>
    <p class="text-sm text-text-muted">Ghanaian cocoa has a full, rounded, classic chocolate taste. Because our chocolate is made locally, it reaches you fresher without ocean shipping delays.</p>
  </div>
</div>

<p class="text-xs text-text-muted italic border-t border-cacao-dark/10 pt-6 mt-8">
  This article shares general information about cocoa and is not medical advice. Information draws on published nutrition and cocoa research, including clinical trials on cocoa and heart health, the COSMOS study of 21,442 adults, and USDA nutrition data for dark chocolate.
</p>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Is Dark Chocolate Good for You? The Facts, in Plain Language",
  "image": [
    "https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png"
  ],
  "datePublished": "2026-08-19",
  "author": {
    "@type": "Organization",
    "name": "Everything Cacao GH Editorial"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Everything Cacao GH",
    "logo": {
      "@type": "ImageObject",
      "url": "https://everythingcacaogh.com/wp-content/uploads/2026/08/placeholder_image.png"
    }
  },
  "description": "Dark chocolate is good for your heart, your blood and your mood. The simple facts — and why chocolate made in Ghana is the best kind to buy."
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Which percentage of dark chocolate is best?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "70% and above is where you get a generous amount of cocoa. 70% to 75% is the range most people love, which is exactly where our Nahar 72% sits."
      }
    },
    {
      "@type": "Question",
      "name": "Can I eat dark chocolate every day?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — two or three squares a day is a lovely daily habit, and it is roughly the amount used in research."
      }
    },
    {
      "@type": "Question",
      "name": "Is dark chocolate good for the heart?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Cocoa is one of the most studied foods in the world for heart health. The natural compounds help blood vessels relax."
      }
    },
    {
      "@type": "Question",
      "name": "Is dark chocolate a good source of iron?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Three squares give you around 3mg of iron. Pair it with orange or pineapple for even better absorption."
      }
    }
  ]
}
</script>
HTML;

    $post_id = wp_insert_post(array(
        'post_title'    => $post_title,
        'post_name'     => $slug,
        'post_content'  => $post_content,
        'post_excerpt'  => 'Dark chocolate is good for your heart, your blood and your mood. The simple facts — and why chocolate made in Ghana is the best kind to buy.',
        'post_status'   => 'publish',
        'post_type'     => 'post',
        'post_category' => array($cat_id),
    ));

    if ($post_id && !is_wp_error($post_id)) {
        // SEO metadata for Yoast & Rank Math
        update_post_meta($post_id, '_yoast_wpseo_title', 'Benefits of Dark Chocolate | Made in Ghana Chocolate');
        update_post_meta($post_id, '_yoast_wpseo_metadesc', 'Dark chocolate is good for your heart, your blood and your mood. The simple facts — and why chocolate made in Ghana is the best kind to buy.');
        update_post_meta($post_id, 'rank_math_title', 'Benefits of Dark Chocolate | Made in Ghana Chocolate');
        update_post_meta($post_id, 'rank_math_description', 'Dark chocolate is good for your heart, your blood and your mood. The simple facts — and why chocolate made in Ghana is the best kind to buy.');
        update_post_meta($post_id, 'rank_math_focus_keyword', 'benefits of dark chocolate');
        wp_set_post_tags($post_id, array('GhanaianCacao', 'NaharObsidian', 'Wellbeing', 'HealthBenefits'));
    }
}
add_action('init', 'ec_auto_publish_wellbeing_blog_post');


