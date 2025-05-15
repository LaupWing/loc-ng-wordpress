<li>
    <a class="flex flex-col gap-2 relative" href="<?php the_permalink(); ?>">
        <?php
        get_template_part("templates/icons/link", null, [
            "custom_class" => "absolute top-4 right-4 w-8 h-8 text-white"
        ]);
        ?>
        <?php if (has_post_thumbnail()) : ?>
            <img class="aspect-video rounded-lg object-cover" src="<?php the_post_thumbnail_url() ?>" alt="thumbnail photo">

        <?php endif; ?>
        <div class="flex gap-2 items-center absolute top-4 left-4">
            <?php if (get_field('is_free')) : ?>
                <span class="bg-emerald-600/60 text-white backdrop-blur-md px-2 py-1 rounded-md text-xs tracking-wider uppercase font-bold">Free</span>
            <?php else : ?>
                <?php
                if (get_field('show_sale_price')) {
                ?>
                    <span class="bg-white/60 line-through text-black backdrop-blur-md px-2 py-1 rounded-md tracking-wider uppercase font-bold">
                        $<?php echo get_field('price'); ?>
                    </span>
                    <span class="text-green-700 bg-white/80 backdrop-blur-md px-2 py-1 rounded-md tracking-wider uppercase text-lg font-extrabold">
                        $<?php echo get_field('sale_price'); ?>
                    </span>
                <?php
                } else {
                ?>
                    <span class="bg-white/80 text-black backdrop-blur-md px-2 py-1 rounded-md tracking-wider uppercase font-bold">
                        $<?php echo get_field('price'); ?>
                    </span>
                <?php
                }
                ?>
            <?php endif; ?>
        </div>
        <h2 class="text-2xl md:text-3xl 2xl:text-4xl text-gray-800 dark:text-gray-200 font-bold"><?php the_title(); ?></h2>
        <!-- get 100 charcaters of the contetn -->
        <p class="text-slate-400 text-lg md:text-xl 2xl:text-2xl">
            <?php
            $content = get_the_content();
            $content = strip_tags($content);
            echo substr($content, 0, 100);
            ?>
        </p>
    </a>
</li>