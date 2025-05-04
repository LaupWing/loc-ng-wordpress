<?php

function loadAssets()
{
    wp_enqueue_script("mainjs", get_theme_file_uri("/build/index.js"), array("wp-element"), "1.0", true);
    wp_localize_script("mainjs", "models", array(
        "chad" => get_template_directory_uri() . "/assets/smallchad.glb"
    ));
    wp_localize_script("mainjs", "request_info", array(
        "nonce" => wp_create_nonce("wp_rest"),
        "url" => admin_url("admin-ajax.php")
    ));
    wp_enqueue_style("mainstyle", get_theme_file_uri("/build/index.css"));
}
function add_custom_current_menu_class($classes, $item)
{
    if (is_single() || is_category()) {
        if ($item->url == get_permalink(get_option("page_for_posts"))) {
            $classes[] = "current-menu-item";
        }
    }

    return $classes;
}

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


add_filter("nav_menu_css_class", "add_custom_current_menu_class", 10, 2);

add_action("wp_enqueue_scripts", "loadAssets");

add_action("rest_api_init", function () {
    register_rest_route("coachloc/v1", "/subscribe", array(
        "methods" => "POST",
        "callback" => "subscribe_endpoint_callback",
        "permission_callback" => function ($request) {
            return wp_verify_nonce($request->get_header("X-WP-Nonce"), "wp_rest");
        }
    ));
});


function addSupport()
{
    register_nav_menu("headerMenuLocation", "Header Menu Location");
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "addSupport");
