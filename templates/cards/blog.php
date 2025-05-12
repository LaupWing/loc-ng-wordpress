<li class="border rounded-md flex flex-col overflow-hidden shadow border-gray-200 dark:border-gray-800">
    <a class="flex flex-col flex-1 gap-2 relative" href="<?php the_permalink(); ?>">
        <!-- Get the categories -->
        <?php
        $categories = get_the_category();
        $available_categories = [
            "fitness" => "bg-emerald-600/60",
            "coding" => "bg-blue-600/60",
            "social-skills" => "bg-indigo-600/60",
        ];
        if ($categories) {
            if (array_key_exists($categories[0]->slug, $available_categories)) {
                echo '<span class="absolute top-4 left-4 ' . $available_categories[$categories[0]->slug] . ' text-white backdrop-blur-md px-2 py-1 rounded-md text-xs tracking-wider uppercase font-bold">' . $categories[0]->name . '</span>';
            } else {
                echo '<span class="absolute top-4 left-4  text-white px-2 py-1 rounded-md text-xs font-bold">' . $categories[0]->name . '</span>';
            }
        }
        ?>
        <?php if (has_post_thumbnail()) : ?>
            <img class="aspect-video rounded-b-none object-cover" src="<?php the_post_thumbnail_url() ?>" alt="thumbnail photo">

        <?php endif; ?>
        <div class="flex flex-col flex-1 gap-2 p-4 pb-1">
            <h2 class="text-2xl text-gray-800 dark:text-white font-bold"><?php the_title(); ?></h2>
            <!-- get 100 charcaters of the contetn -->
            <p class="text-gray-400">
                <?php
                $content = get_the_content();
                $content = strip_tags($content);
                echo substr($content, 0, 100);
                ?>
            </p>
            <div class="flex gap-2 items-center">
                <span class="text-xs font-bold text-slate-300">
                    Loc Nguyen
                </span>
                <span class="text-xs text-slate-500"><?php the_date(); ?></span>
            </div>
            <span class="mt-auto pt-3 block text-xs uppercase text-gray-200 dark:text-gray-700 font-bold">Read more</span>
        </div>
    </a>
</li>