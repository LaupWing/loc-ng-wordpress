<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">

    <section class="flex flex-col py-8">
        <div class="flex flex-col py-6">
            <span class="text-slate-400 uppercase text-sm tracking-wider">Products</span>
            <h3 class="transition-colors text-5xl pb-2 font-bold gradient-animation-slow bg-clip-text text-transparent">
                Actually useful stuff
            </h3>
            <p class="max-w-4xl text-gray-700 md:text-lg 2xl:text-xl" data-fade="3">
                Built from decades of experience in fitness, coding, and self-mastery — no fluff, just tools that work.
            </p>
        </div>
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