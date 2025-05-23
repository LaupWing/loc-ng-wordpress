<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (is_singular("post") || is_home() || is_archive()) {
        // Get post data
        $post_id = get_queried_object_id();
        $title = get_the_title($post_id);
        $excerpt = has_excerpt($post_id) ? get_the_excerpt($post_id) : wp_trim_words(get_the_content($post_id), 55, '...');
        $url = get_permalink($post_id);
        $type = ":article";
    } else {
        // For other pages, including front page
        $title = get_bloginfo("name");
        $excerpt = get_bloginfo("description");
        $url = home_url("/");
        $type = "website";
    }

    // Output meta tags
    ?>
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($excerpt); ?>">
    <meta property="og:url" content="<?php echo esc_url($url); ?>">
    <meta property="og:type" content="<?php echo $type; ?>">
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">

    <?php
    // Check for featured image
    if (is_singular("post") && has_post_thumbnail($post_id)) {
        $og_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), "large");
        if ($og_image) {
    ?>
            <meta property="og:image" content="<?php echo esc_url($og_image[0]); ?>">
            <meta property="og:image:width" content="<?php echo esc_attr($og_image[1]); ?>">
            <meta property="og:image:height" content="<?php echo esc_attr($og_image[2]); ?>">
            <meta name="twitter:image" content="<?php echo esc_url($og_image[0]); ?>">

        <?php
        }
    } else {
        // Use a default image for non-blog pages or posts without featured images
        $default_image = get_theme_mod("default_og_image", get_template_directory_uri() . "/assets/default-og.jpg");
        ?>
        <meta property="og:image" content="<?php echo esc_url($default_image); ?>">
        <meta name="twitter:image" content="<?php echo esc_url($default_image); ?>">
    <?php
    }
    // Add meta alt
    ?>
    <meta property="og:image:alt" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($excerpt); ?>">
    <?php
    if (is_singular("post") && has_post_thumbnail($post_id)) {
        $twitter_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), "large");
        if ($twitter_image) {
    ?>
            <meta name="twitter:image" content="<?php echo esc_url($twitter_image[0]); ?>">
        <?php
        }
    } else {
        // Use the same default image as OG
        ?>
        <meta name="twitter:image" content="<?php echo esc_url($default_image); ?>">
    <?php
    }
    ?>

    <?php wp_head() ?>
</head>

<body class="bg-white duration-300 dark:bg-black min-h-screen" <?php body_class() ?>>
    <div class="gradient-animation w-full h-1.5 bg-red-400"></div>
    <div class="flex flex-col items-center px-4 sm:px-14 py-2 sm:py-6">

        <header class="hidden sm:flex justify-between items-center custom-container w-full">
            <nav class="font-cursive gap-4 flex items-center w-full">
                <h1>
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <?php
                        $custom_class = "h-12";
                        get_template_part("templates/icons/logo", null, array(
                            "custom_class" => $custom_class
                        ));
                        ?>
                    </a>
                </h1>
                <?php
                wp_nav_menu([
                    "theme_location" => "headerMenuLocation"
                ]);
                ?>
            </nav>
            <div class="theme-button"></div>
        </header>
        <header class="grid grid-cols-3 sm:hidden justify-between items-center custom-container ">
            <button id="mobile-menu">
                <?php
                $custom_class = "w-8 h-8 dark:text-white text-black";
                get_template_part("templates/ui/menu", null, array(
                    "custom_class" => $custom_class
                ));
                ?>
            </button>

            <h1 class="flex items-center justify-center">
                <a href="<?php echo esc_url(home_url()); ?>">
                    <?php
                    $custom_class = "w-24 h-8";
                    get_template_part("templates/icons/logo", null, array(
                        "custom_class" => $custom_class
                    ));
                    ?>
                </a>
            </h1>
            <div class="theme-button ml-auto"></div>
        </header>
        <div id="side-nav" class="fixed sm:hidden transform -translate-x-full inset-0 p-10 dark:bg-gray-900 bg-white z-[100] duration-500">
            <nav id="mobile" class="font-cursive flex flex-col items-start">
                <button id="close" class="ml-auto mb-8">
                    <?php
                    $custom_class = "w-8 h-8 dark:text-gray-100 text-gray-600";
                    get_template_part("templates/icons/close", null, array(
                        "custom_class" => $custom_class
                    ));
                    ?>
                </button>
                <?php
                wp_nav_menu([
                    "theme_location" => "headerMenuLocation"
                ]);
                ?>
            </nav>
        </div>