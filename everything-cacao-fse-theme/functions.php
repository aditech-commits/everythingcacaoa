<?php
/**
 * Everything Cacao GH - FSE Block Theme Engine
 *
 * @package EverythingCacaoFSE
 * @version 2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * 1. FSE Theme Setup & Block Pattern Categories
 */
function ec_fse_theme_setup() {
    // Add Block Theme Features
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('elementor');

    // Register Custom Block Pattern Category
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category('everything-cacao', array(
            'label'       => __('Everything Cacao Patterns', 'everything-cacao-fse'),
            'description' => __('Luxury brand section patterns for Everything Cacao GH.', 'everything-cacao-fse'),
        ));
    }
}
add_action('after_setup_theme', 'ec_fse_theme_setup');

/**
 * 2. Enqueue Assets & Google Fonts
 */
function ec_fse_enqueue_assets() {
    // Google Fonts (Playfair Display & Hanken Grotesk)
    wp_enqueue_style(
        'ec-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Tailwind CDN engine for dynamic utilities
    wp_enqueue_script(
        'ec-tailwind-cdn',
        'https://cdn.tailwindcss.com',
        array(),
        null,
        false
    );
    wp_add_inline_script('ec-tailwind-cdn', '
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              "canvas": "#FBF8F3",
              "card-bg": "#FFFFFF",
              "cacao-dark": "#2C1A11",
              "accent-gold": "#D4AF37",
              "accent-terracotta": "#C86D51",
              "cherelle-caramel": "#E08E45",
              "nahar-obsidian": "#3D281C",
              "text-muted": "#7A685A"
            },
            fontFamily: {
              "serif-luxury": ["Playfair Display", "Georgia", "serif"],
              "sans-body": ["Hanken Grotesk", "sans-serif"]
            }
          }
        }
      };
    ');

    // Custom CSS & Tailwind engine
    wp_enqueue_style(
        'ec-tailwind',
        get_template_directory_uri() . '/assets/css/tailwind.css',
        array(),
        '2.0.0'
    );

    // Pixel events script
    wp_enqueue_script(
        'ec-pixel',
        get_template_directory_uri() . '/assets/js/pixel-events.js',
        array(),
        '2.0.0',
        true
    );

    // Main app JS
    wp_enqueue_script(
        'ec-app',
        get_template_directory_uri() . '/assets/js/app.js',
        array('jquery'),
        '2.0.0',
        true
    );

    wp_localize_script('ec-app', 'EC_WP_Data', array(
        'ajax_url'        => admin_url('admin-ajax.php'),
        'nonce'           => wp_create_nonce('ec_concierge_nonce'),
        'concierge_email' => get_option('ec_concierge_email', 'info@everythingcacaogh.com'),
        'whatsapp_num'    => get_option('ec_whatsapp_number', '233240661866'),
    ));
}
add_action('wp_enqueue_scripts', 'ec_fse_enqueue_assets');

/**
 * Enqueue styles inside Site Editor (Gutenberg Preview)
 */
function ec_fse_editor_assets() {
    wp_enqueue_style(
        'ec-google-fonts-editor',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap'
    );
    wp_enqueue_style(
        'ec-tailwind-editor',
        get_template_directory_uri() . '/assets/css/tailwind.css',
        array(),
        '2.0.0'
    );
}
add_action('enqueue_block_editor_assets', 'ec_fse_editor_assets');

/**
 * 3. Custom Post Type: Confection Catalog (cacao_products)
 */
function ec_register_cacao_products_cpt() {
    $labels = array(
        'name'               => 'Confection Catalog',
        'singular_name'      => 'Confection Product',
        'menu_name'          => 'Confection Catalog',
        'add_new'            => 'Add New Confection',
        'add_new_item'       => 'Add New Confection Product',
        'edit_item'          => 'Edit Confection Product',
        'new_item'           => 'New Confection Product',
        'view_item'          => 'View Confection Product',
        'search_items'       => 'Search Confections',
        'not_found'          => 'No confections found in database',
        'not_found_in_trash' => 'No confections found in Trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true, // Required for Gutenberg Block Editor
        'query_var'          => true,
        'rewrite'            => array('slug' => 'confections'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-grid-view',
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
    );

    register_post_type('cacao_products', $args);
}
add_action('init', 'ec_register_cacao_products_cpt');

/**
 * 4. Helper Function: Fetch Product Custom Field
 */
function ec_get_product_field($field_name, $post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    if (function_exists('get_field')) {
        $acf_val = get_field($field_name, $post_id);
        if ($acf_val !== null && $acf_val !== false && $acf_val !== '') {
            return $acf_val;
        }
    }
    return get_post_meta($post_id, $field_name, true);
}

/**
 * 5. SEO Page Document Titles (replaces manual title tags)
 */
function ec_seo_document_title($title) {
    if (is_front_page()) {
        return 'Buy Ghanaian Chocolate Online | Everything Cacao';
    } elseif (is_page(array('craft', 'our-craft', 'about', 'about-us'))) {
        return 'About Everything Cacao | Ghana\'s Premium Chocolate Maker';
    } elseif (is_page(array('collections', 'our-collections', 'shop'))) {
        return 'Buy Chocolate Online in Ghana | Everything Cacao Shop';
    } elseif (is_page(array('stockist', 'stockists', 'contact'))) {
        return 'Contact Everything Cacao | Get in Touch';
    }
    return $title;
}
add_filter('pre_get_document_title', 'ec_seo_document_title');

/**
 * 6. AJAX Form Submissions (Quick Form & Palette Club)
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
    $subject = sprintf('[Direct Inquiry] Message from %s', $name);
    $body    = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}\n";
    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>");

    $sent = wp_mail($to, $subject, $body, $headers);

    wp_send_json_success(array('message' => sprintf('Thank you %s! Your inquiry has been sent to %s.', $name, $to)));
}
add_action('wp_ajax_ec_submit_quick_inquiry', 'ec_handle_quick_inquiry_ajax');
add_action('wp_ajax_nopriv_ec_submit_quick_inquiry', 'ec_handle_quick_inquiry_ajax');

function ec_handle_palette_club_ajax() {
    check_ajax_referer('ec_concierge_nonce', 'nonce');

    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    if (empty($email) || !is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }

    $to      = get_option('ec_concierge_email', 'info@everythingcacaogh.com');
    $subject = '[Palette Club] New Subscriber';
    $body    = "New Palette Club subscriber:\nEmail: {$email}\n";
    $headers = array('Content-Type: text/plain; charset=UTF-8');

    wp_mail($to, $subject, $body, $headers);

    wp_send_json_success(array('message' => 'Welcome to The Palette Club! Check your inbox for private tasting invitations.'));
}
add_action('wp_ajax_ec_submit_palette_club', 'ec_handle_palette_club_ajax');
add_action('wp_ajax_nopriv_ec_submit_palette_club', 'ec_handle_palette_club_ajax');
