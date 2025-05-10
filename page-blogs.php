<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">
    <section class="flex flex-col py-8">
        <?php
        get_template_part('templates/sections/intro', null, [
            'section_label' => 'All Blogs',
            'headline' => 'Actionable. Real. Timeless.',
            'description' => 'I share hard-earned insights on self-mastery, fitness, and spiritual growth — not theory, not trivia, just what actually works from real experience.',
            'fade_in' => true
        ]);
        ?>
        <ul class="grid mt-4 grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6" data-fade="4">
            <?php
            $args = array(
                "post_type" => "post",
                "post_status" => "publish",
                "posts_per_page" => "5",
                "order" => "DESC",
                "orderby" => "date"
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('templates/cards/blog'); ?>
                <?php endwhile;
            else :
                ?>
                <li>No recent posts found.</li>
            <?php endif;
            wp_reset_postdata(); ?>
        </ul>
    </section>

</div>
<?php
get_footer()
?>