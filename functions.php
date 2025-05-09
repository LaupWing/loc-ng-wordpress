<?php

function boilerplate_load_assets()
{
    wp_enqueue_script('mainjs', get_theme_file_uri('/build/index.js'), array('wp-element', 'react-jsx-runtime'), '1.0', true);
    wp_enqueue_style('maincss', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'boilerplate_load_assets');

function boilerplate_add_support()
{
    register_nav_menu("headerMenuLocation", "Header Menu Location");
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'boilerplate_add_support');


function register_product_post_type()
{
    register_post_type('product', array(
        'labels' => array(
            'name' => 'Products',
            'singular_name' => 'Product',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Product',
            'edit_item' => 'Edit Product',
            'new_item' => 'New Product',
            'view_item' => 'View Product',
            'search_items' => 'Search Products',
            'not_found' => 'No products found',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'products'),
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true // Optional, for block editor
    ));
}
add_action('init', 'register_product_post_type');

add_action('template_redirect', 'handle_subscribe_form');

function handle_subscribe_form()
{
    error_log('Subscribe form handler triggered');
    // Only run this logic when the request is a POST to the /subscribe page
    if (is_page('subscribe') && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscribe_submit'])) {
        $email = isset($_POST['subscriber_email']) ? sanitize_email($_POST['subscriber_email']) : '';

        if (!is_email($email)) {
            wp_die('Invalid email address.');
        }

        $api_key = defined("BEEHIVE_API_KEY") ? BEEHIVE_API_KEY : "";

        $response = wp_remote_post(BEEHIVE_API_URL, array(
            'body' => json_encode(['email' => $email]),
            'headers' => array(
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type'  => 'application/json',
            ),
        ));

        if (is_wp_error($response)) {
            wp_die('API request failed.');
        }

        // Redirect after success
        wp_redirect(home_url('/confirmed-email'));
        exit;
    }
}


function sort_products_by_free_field($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('product')) {

        // Modify the query to sort by the ACF 'free' field (false first, true last)
        $query->set('meta_key', 'is_free');
        $query->set('orderby', 'meta_value_num'); // 'free' should be stored as 1/0
        $query->set('order', 'ASC'); // false (0) comes before true (1)
    }
}
add_action('pre_get_posts', 'sort_products_by_free_field');
