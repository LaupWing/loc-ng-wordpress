<?php
get_header()
?>
<div class="custom-container flex items-start flex-col py-8">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="flex flex-col">
                <header class="flex flex-col items-center">
                    <div class="flex gap-2 items-center">
                        <span class="font-semibold text-slate-600"><?php echo get_the_date(); ?></span>
                        <span class="font-semibold text-slate-600">|</span>
                        <span class="font-semibold text-slate-600">Loc Nguyen</span>
                    </div>
                    <h2 class="font-bold text-center text-black dark:text-white mt-1 mb-2 font-cursive text-4xl"><?php the_title(); ?></h2>
                    <div class="rounded mt-4 max-w-4xl aspect-video overflow-hidden relative">
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