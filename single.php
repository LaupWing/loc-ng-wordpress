<?php
get_header()
?>
<section class="py-6 flex items-start flex-col">
    <h3 class="transition-colors text-4xl md:text-5xl 2xl:text-6xl font-bold gradient-animation-slow bg-clip-text text-transparent" data-fade="1">
        Not a subscriber?
    </h3>
    <p class="mt-4 max-w-4xl text-gray-700 dark:text-gray-400 md:mt-6 md:text-lg 2xl:text-xl" data-fade="2">Join 15,000+ becoming dangerous in body and mind.
        Every week, I send raw, real insights on fitness, self-mastery, energy, and attraction — no bullsh*t, just what actually works.
    </p>
    <p class="mt-4 max-w-4xl text-gray-700 dark:text-gray-400 md:mt-6 md:text-lg 2xl:text-xl" data-fade="3">When you join, I’ll send you my 30-Day Fitness Course to start building a body people can’t ignore.
    </p>
    <div data-fade="5" class="w-full">
        <?php get_template_part('templates/sections/subscribe_form'); ?>
    </div>
</section>
<div class="custom-container flex items-center flex-col pb-8 mt-2">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="flex flex-col max-w-4xl" data-fade="4">
                <header class="flex flex-col items-center">
                    <div class="flex gap-2 items-center">
                        <span class="font-semibold text-slate-600"><?php echo get_the_date(); ?></span>
                        <span class="font-semibold text-slate-600">|</span>
                        <span class="font-semibold text-slate-600">Loc Nguyen</span>
                    </div>
                    <h2 class="font-bold text-center text-black dark:text-white mt-1 mb-2 font-cursive text-3xl md:text-5xl sm:text-4xl"><?php the_title(); ?></h2>
                    <div class="rounded mt-4  aspect-video overflow-hidden relative">
                        <?php
                        get_template_part("templates/parts/categories");
                        ?>
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" class="h-full w-full object-cover object-center" alt="<?php echo get_the_post_thumbnail_caption() ?>">

                    </div>
                </header>
                <div id="content" class="mt-6">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile;
    else : ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>


</div>
<?php
get_footer()
?>