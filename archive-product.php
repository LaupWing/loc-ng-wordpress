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
            <p class="max-w-4xl text-gray-700 md:text-lg 2xl:text-xl" data-fade="3">I possess a strong enthusiasm for both programming and fitnes.</p>
        </div>
        <ul class="grid mt-4 grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-6">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <li>
                        <a class="flex flex-col gap-2 relative" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <img class="aspect-video rounded-lg object-cover" src="<?php the_post_thumbnail_url() ?>" alt="thumbnail photo">

                            <?php endif; ?>
                            <h2 class="text-3xl text-gray-800 font-bold"><?php the_title(); ?></h2>
                            <!-- get 100 charcaters of the contetn -->
                            <p class="text-slate-400 text-lg">
                                <?php
                                $content = get_the_content();
                                $content = strip_tags($content);
                                echo substr($content, 0, 100);
                                ?>
                            </p>
                        </a>
                    </li>
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