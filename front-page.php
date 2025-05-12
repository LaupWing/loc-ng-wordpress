<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">
    <section class="py-20 flex items-start flex-col">
        <div class="p-1.5 bg-emerald-100 dark:bg-emerald-200/40 rounded-full mb-4" data-fade="1">
            <div class="h-full px-3 py-1 bg-emerald-300 dark:bg-emerald-300/80 flex items-center rounded-full gap-2">
                <div class="h-2 w-2 rounded-full bg-lime-300 shadow-lime-200 shadow-lg animate-pulse"></div>
                <h2 class="text-white text-xs font-bold uppercase">Products to improve your life</h2>
            </div>
        </div>
        <span class="text-slate-400 uppercase text-sm tracking-wider" data-fade="2">Loc Nguyen</span>
        <h1 class="font-bold text-black dark:text-white max-w-sm text-4xl md:text-5xl 2xl:text-6xl" data-fade="3">Do what works. Enjoy
            <div class="inline-block text-light py-0.5">
                <span class="transition-colors gradient-animation-slow bg-clip-text text-transparent">
                    Life.
                </span>
            </div>
        </h1>
        <p class="mt-4 max-w-4xl text-gray-700 dark:text-gray-400 md:mt-6 md:text-lg 2xl:text-xl" data-fade="4">Join 15,000+ becoming dangerous in body and mind.
            Every week, I send raw, real insights on fitness, self-mastery, energy, and attraction — no bullsh*t, just what actually works.
        </p>
        <p class="mt-4 max-w-4xl text-gray-700 dark:text-gray-400 md:mt-6 md:text-lg 2xl:text-xl" data-fade="4">When you join, I’ll send you my 30-Day Fitness Course to start building a body people can’t ignore.
        </p>
        <div data-fade="5" class="w-full">
            <?php get_template_part('templates/sections/subscribe_form'); ?>
        </div>
    </section>
    <section class="flex flex-col py-8" data-fade="6">
        <?php
        get_template_part('templates/sections/intro', null, [
            'section_label' => 'Featured Products',
            'headline' => 'Actually useful stuff',
            'description' => 'Built from decades of experience in fitness, coding, and self-mastery — no fluff, just tools that work.'
        ]);
        ?>
        <ul class="grid mt-4 grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-6">
            <?php
            $args = array(
                "post_type" => "product",
                "post_status" => "publish",
                "posts_per_page" => "5",
                "order" => "DESC",
                "orderby" => "date",
                "meta_query" => array(
                    array(
                        "key" => "is_free",
                        "value" => '1',
                        "compare" => "!="
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('templates/cards/product'); ?>
                <?php endwhile;
            else :
                ?>
                <li>No recent posts found.</li>
            <?php endif;
            wp_reset_postdata(); ?>
        </ul>
        <a class="mt-6" href="/products">
            <?php get_template_part('templates/ui/button', null, ['button_text' => 'See all products']); ?>
        </a>
    </section>
    <section class="flex flex-col py-8" data-fade="7">
        <?php
        get_template_part('templates/sections/intro', null, [
            'section_label' => 'Recent blog posts',
            'headline' => 'Actionable. Real. Timeless.',
            'description' => 'I share hard-earned insights on self-mastery, fitness, and spiritual growth — not theory, not trivia, just what actually works from real experience.'
        ]);
        ?>
        <ul class="grid mt-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
        <a class="mt-6" href="/blogs">
            <?php get_template_part('templates/ui/button', null, ['button_text' => 'See all blogs']); ?>
        </a>
    </section>

</div>
<?php
get_footer()
?>