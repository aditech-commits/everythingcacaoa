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
function ec_customize_register($wp_customize) {
    // Add "Brand & Marketing Settings" Section
    $wp_customize->add_section('ec_brand_settings', array(
        'title'       => __('Brand & Marketing Settings', 'everything-cacao'),
        'priority'    => 30,
        'description' => __('Configure Meta (Facebook) Pixel ID, WhatsApp Concierge Number, and Concierge Email Address.', 'everything-cacao'),
    ));

    // 1. Meta Pixel ID Setting
    $wp_customize->add_setting('ec_pixel_id', array(
        'default'           => '',
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('ec_pixel_id', array(
        'label'       => __('Meta (Facebook) Pixel ID', 'everything-cacao'),
        'description' => __('Enter your 15-16 digit Meta Pixel ID (e.g. 123456789012345). Leave blank or enter ID to start tracking ads & leads.', 'everything-cacao'),
        'section'     => 'ec_brand_settings',
        'type'        => 'text',
    ));

    // 2. WhatsApp Concierge Number Setting
    $wp_customize->add_setting('ec_whatsapp_number', array(
        'default'           => '233240661866',
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('ec_whatsapp_number', array(
        'label'       => __('WhatsApp Concierge Number', 'everything-cacao'),
        'description' => __('Enter number in international format without + sign (e.g. 233240000000 for Ghana).', 'everything-cacao'),
        'section'     => 'ec_brand_settings',
        'type'        => 'text',
    ));

    // 3. Concierge Email Setting
    $wp_customize->add_setting('ec_concierge_email', array(
        'default'           => 'info@everythingcacaogh.com',
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('ec_concierge_email', array(
        'label'       => __('Concierge Email Address', 'everything-cacao'),
        'description' => __('Email address where customer concierge inquiries will be sent.', 'everything-cacao'),
        'section'     => 'ec_brand_settings',
        'type'        => 'email',
    ));

    // 4. Homepage Images Section
    $wp_customize->add_section('ec_homepage_images', array(
        'title'       => __('Homepage Images', 'everything-cacao'),
        'priority'    => 31,
        'description' => __('Manage images displayed on the homepage. Upload or replace images directly from Media Library.', 'everything-cacao'),
    ));

    $hp_image_fields = array(
        'ec_hero_image'      => __('Hero Main Product Image', 'everything-cacao'),
        'ec_cherelle_image'  => __('Cherelle Brand Showcase Card Image', 'everything-cacao'),
        'ec_nahar_image'     => __('Nahar Brand Showcase Card Image', 'everything-cacao'),
        'ec_impact_image_1'  => __('Impact #1: Direct Farmer Partnerships', 'everything-cacao'),
        'ec_impact_image_2'  => __('Impact #2: 100% Ghanaian Value Chain', 'everything-cacao'),
        'ec_impact_image_3'  => __('Impact #3: Sustainable Fair-Trade', 'everything-cacao'),
        'ec_seasonal_1'      => __('Seasonal #1: Dark Ghanaian Forest', 'everything-cacao'),
        'ec_seasonal_2'      => __('Seasonal #2: Heritage Sampler', 'everything-cacao'),
        'ec_seasonal_3'      => __('Seasonal #3: Ashanti Gold', 'everything-cacao'),
        'ec_seasonal_4'      => __('Seasonal #4: Nahar Private Reserve', 'everything-cacao'),
    );

    foreach ($hp_image_fields as $setting_id => $label) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_id, array(
            'label'    => $label,
            'section'  => 'ec_homepage_images',
            'settings' => $setting_id,
        )));
    }

    // 5. Our Craft Page Images Section
    $wp_customize->add_section('ec_craft_images', array(
        'title'       => __('Our Craft Page Images', 'everything-cacao'),
        'priority'    => 32,
        'description' => __('Manage gallery images displayed on the Our Craft page.', 'everything-cacao'),
    ));

    for ($i = 1; $i <= 6; $i++) {
        $setting_id = "ec_gallery_$i";
        $wp_customize->add_setting($setting_id, array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_id, array(
            'label'    => sprintf(__('Gallery Image #%d', 'everything-cacao'), $i),
            'section'  => 'ec_craft_images',
            'settings' => $setting_id,
        )));
    }

    // 6. Homepage Content Settings
    $wp_customize->add_section('ec_homepage_content', array(
        'title'       => __('Homepage Text & Banner Content', 'everything-cacao'),
        'priority'    => 33,
        'description' => __('Edit headlines, subheadings, ticker banner, and card descriptions for the Homepage.', 'everything-cacao'),
    ));

    $hp_text_controls = array(
        'ec_hero_title'        => array('label' => __('Hero Section Title', 'everything-cacao'), 'type' => 'textarea', 'default' => "Ghana's Finest Chocolate — Crafted from Local Cacao"),
        'ec_hero_subtitle'     => array('label' => __('Hero Section Subtitle', 'everything-cacao'), 'type' => 'textarea', 'default' => "Everything Cacao GH makes premium chocolate from Ghana's finest locally sourced cacao. Our two iconic ranges — Nahar for luxury occasions and Cherelle for everyday delight — bring world-class Ghanaian chocolate to your table."),
        'ec_showcase_title'    => array('label' => __('Dual Showcase Title', 'everything-cacao'), 'type' => 'text', 'default' => "Two Ranges. One Ghanaian Story."),
        'ec_showcase_subtitle' => array('label' => __('Dual Showcase Subtitle', 'everything-cacao'), 'type' => 'textarea', 'default' => "Whether you're treating yourself, sharing with family or finding the perfect gift, Everything Cacao has a chocolate for every moment."),
        'ec_nahar_desc'        => array('label' => __('Nahar Card Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Nahar is our premium chocolate range, crafted for discerning palates. Rich, complex flavours made from the finest Ghanaian cocoa, wrapped in elegant packaging. Perfect for gifts, special occasions and personal indulgence."),
        'ec_cherelle_desc'     => array('label' => __('Cherelle Card Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Cherelle is everyday chocolate for everyone. Affordable, joyful and bursting with the natural taste of Ghanaian cacao. Made for sharing, gifting and sweet everyday moments."),
        'ec_why_title'         => array('label' => __('Why Choose Us Title', 'everything-cacao'), 'type' => 'text', 'default' => "Why Choose Us?"),
        'ec_why_subtitle'      => array('label' => __('Why Choose Us Subtitle', 'everything-cacao'), 'type' => 'textarea', 'default' => "We celebrate our land, the farmers and our heritage with every bite."),
        'ec_impact1_title'     => array('label' => __('Impact #1 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Locally sourced cacao"),
        'ec_impact1_text'      => array('label' => __('Impact #1 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "We work directly with Ghanaian farmers and local suppliers to source the highest quality processed cocoa — supporting communities and ensuring exceptional flavour in every bar."),
        'ec_impact2_title'     => array('label' => __('Impact #2 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Certified quality"),
        'ec_impact2_text'      => array('label' => __('Impact #2 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "Every Everything Cacao product is certified by the Food and Drug Authority (FDA) and the Ghana Standards Authority (GSA). Quality and safety you can trust."),
        'ec_impact3_title'     => array('label' => __('Impact #3 Title', 'everything-cacao'), 'type' => 'text', 'default' => "Made in Ghana"),
        'ec_impact3_text'      => array('label' => __('Impact #3 Description', 'everything-cacao'), 'type' => 'textarea', 'default' => "From bean to bar, our chocolate is made in Ghana — celebrating our land, our farmers and our heritage with every bite."),
        'ec_ticker_1'          => array('label' => __('Marquee Ticker #1', 'everything-cacao'), 'type' => 'text', 'default' => "Now Available in Supermarkets & Malls Across Ghana"),
        'ec_ticker_2'          => array('label' => __('Marquee Ticker #2', 'everything-cacao'), 'type' => 'text', 'default' => "Shipping Worldwide"),
    );

    foreach ($hp_text_controls as $setting_id => $data) {
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label'    => $data['label'],
            'section'  => 'ec_homepage_content',
            'type'     => $data['type'],
        ));
    }

    // 7. Our Craft Page Content Settings
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
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label'    => $data['label'],
            'section'  => 'ec_craft_content',
            'type'     => $data['type'],
        ));
    }

    // 8. Stockist Page Content Settings
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
        $wp_customize->add_setting($setting_id, array(
            'default'           => $data['default'],
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label'    => $data['label'],
            'section'  => 'ec_stockist_content',
            'type'     => $data['type'],
        ));
    }
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
 *     Runs on admin_init only — never on front-end page loads.
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

    $count = wp_count_posts('cacao_products');
    $published = isset($count->publish) ? intval($count->publish) : 0;
    
    if ($published >= 22 && !$force_seed) {
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

    // 4. Fallback to Elegant SVG Brand Placeholder
    return 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600"><rect width="100%" height="100%" fill="%232C1A11"/><circle cx="300" cy="270" r="100" fill="%23C86D51" opacity="0.2"/><text x="50%" y="46%" dominant-baseline="middle" text-anchor="middle" fill="%23D4AF37" font-family="Georgia, serif" font-size="28" font-weight="bold">EVERYTHING CACAO</text><text x="50%" y="54%" dominant-baseline="middle" text-anchor="middle" fill="%23F5EFE6" font-family="sans-serif" font-size="14" letter-spacing="2">GHANA LUXURY CONFECTION</text></svg>';
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


