<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">
    <section class="flex flex-col py-8">
        <div class="flex flex-col py-6">
            <span class="text-slate-400 uppercase text-sm tracking-wider">All Blogs</span>
            <h3 class="transition-colors text-5xl pb-2 font-bold gradient-animation-slow bg-clip-text text-transparent">
                Actually useful stuff
            </h3>
            <p class="max-w-4xl text-gray-700 md:text-lg 2xl:text-xl" data-fade="3">I possess a strong enthusiasm for both programming and fitnes.</p>
        </div>
        <ul class="grid mt-4 grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
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
                    <li class="border rounded-md flex flex-col overflow-hidden shadow border-gray-200">
                        <a class="flex flex-col flex-1 gap-2 relative" href="<?php the_permalink(); ?>">
                            <!-- Get the categories -->
                            <?php
                            $categories = get_the_category();
                            $available_categories = [
                                "fitness" => "bg-emerald-600/60",
                                "coding" => "bg-blue-600",
                                "mindset" => "bg-purple-600",
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
                                <h2 class="text-2xl text-gray-800 font-bold"><?php the_title(); ?></h2>
                                <!-- get 100 charcaters of the contetn -->
                                <p class="text-slate-400">
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
                                <span class="mt-auto pt-3 block text-xs uppercase text-slate-200 font-bold">Read more</span>
                            </div>
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