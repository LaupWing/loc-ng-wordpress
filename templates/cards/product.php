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
        <?php if (get_field('is_free')) : ?>
            <span class="absolute top-4 left-4 bg-emerald-600/60 text-white backdrop-blur-md px-2 py-1 rounded-md text-xs tracking-wider uppercase font-bold">Free</span>
        <?php else : ?>
            <span class="absolute top-4 left-4 bg-white/80 text-black backdrop-blur-md px-2 py-1 rounded-md tracking-wider uppercase font-bold">
                $<?php echo get_field('price'); ?>
            </span>
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