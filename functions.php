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

function subscribe_endpoint_callback($request)
{
    $params = $request->get_params();

    if (empty($params["email"])) {
        return new WP_REST_Response(array(
            "success" => false,
            "message" => "Email is required"
        ), 400);
    }
    $email = sanitize_email($params["email"] ?? "");
    $api_key = defined("BEEHIVE_API_KEY") ? BEEHIVE_API_KEY : "";
    $api_response = wp_remote_post(BEEHIVE_API_URL, array(
        "body" => json_encode(array(
            "email" => $email
        )),
        "headers" => array(
            "Authorization" => "Bearer $api_key",
            "Content-Type" => "application/json"
        )
    ));
    if (is_wp_error($api_response)) {
        return new WP_REST_Response(array(
            "success" => false,
            "message" => "An api error occurred"
        ), 500);
    }
    $response = array(
        "success" => true,
        "message" => "Data received successfully and sended to api",
        "data" => array(
            "email" => $email,
            // "api_response" => json_decode(wp_remote_retrieve_body($api_response)),
        )
    );

    return new WP_REST_Response($response, 200);
}

add_action("rest_api_init", function () {
    register_rest_route("loc-ng/v1", "/subscribe", array(
        "methods" => "POST",
        "callback" => "subscribe_endpoint_callback",
        "permission_callback" => function ($request) {
            return wp_verify_nonce($request->get_header("X-WP-Nonce"), "wp_rest");
        }
    ));
});


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
