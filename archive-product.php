<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">

    <section class="flex flex-col py-8">
        <?php
        get_template_part('templates/sections/intro', null, [
            'section_label' => 'Products',
            'headline' => 'Actually useful stuff.',
            'description' => 'Built from decades of experience in fitness, coding, and self-mastery — no fluff, just tools that work.'
        ]);
        ?>
        <ul class="grid mt-4 grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-6">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <?php get_template_part('templates/cards/product'); ?>
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