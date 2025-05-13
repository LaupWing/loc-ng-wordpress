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
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <?php get_template_part('templates/cards/blog'); ?>
                <?php endwhile;
            else :
                ?>
                <li>No recent posts found.</li>
            <?php endif;
            wp_reset_postdata(); ?>
        </ul>
        <div class="mt-8 mr-auto">
            <?php
            echo paginate_links(array(
                'prev_text' => __('« Previous'),
                'next_text' => __('Next »'),
                'type' => 'list', // Optional: outputs <ul><li> structure
            ));
            ?>
        </div>
    </section>

</div>
<?php
get_footer()
?>