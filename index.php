<?php
get_header()
?>
<div class="flex flex-col gap-10 custom-container mt-10">
    <section class="text-slate-50 max-w-lg flex flex-col gap-4">
        <h3 class="font-display uppercase tracking-[10px] text-slate-500 text-lg">Before you read </h3>
        <h3 class="text-xl sm:text-2xl font-cursive text-slate-50 font-bold">Get The Latest Updates Of Coach Loc Send To Your Inbox Each Saturday</h3>
        <p>
            Join over 170 others on the journey to become the best and strongest version of yourself in the most efficient way. Also, learn a bit about life and coding.
        </p>
        <div class="signup-form-top">

        </div>
    </section>
    <div class="flex gap-10">
        <aside class="hidden sm:block">
            <ul class="grid text-sm gap-2 text-slate-300 tracking-wider w-44">
                <li class="uppercase mb-2 font-bold text-slate-500">
                    categories
                </li>
                <li class="capitalize rounded-md <?php echo esc_url(home_url($_SERVER['REQUEST_URI'])) == esc_url(get_permalink(get_option('page_for_posts'))) ? 'bg-slate-800' : 'hover:bg-slate-800/40'; ?>">
                    <a class="flex  px-4 py-2 items-center gap-2" href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
                        <div class="w-3 h-3 rounded-full bg-transparent">

                        </div>
                        <span>
                            All
                        </span>
                    </a>
                </li>
                </li>
                <!-- Loop through categories -->
                <?php
                $categories = get_categories(array(
                    'exclude' => get_cat_ID('Uncategorized')
                ));
                $categories_colors = [
                    "fitness" => "bg-green-600",
                    "coding" => "bg-blue-600",
                    "life" => "bg-yellow-600",
                    "meals" => "bg-red-600",
                    "mindset" => "bg-purple-600",
                ];

                foreach ($categories as $category) {
                    if ($category->name === "meals") continue;
                    $category_link = get_category_link($category->term_id);
                    $is_current_category = (is_category($category->term_id)) ? "bg-slate-800" : "hover:bg-slate-800/40";
                ?>
                    <li class="capitalize rounded-md <?php echo $is_current_category; ?>">
                        <a class="flex gap-2 items-center  px-4 py-2" href="<?php echo esc_url($category_link); ?>">
                            <div class="w-3 h-3 rounded-full <?php echo $categories_colors[$category->name] ?>">
                            </div>
                            <span>
                                <?php
                                echo $category->name
                                ?>
                            </span>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </aside>

        <section class="">
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-6">
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
                        <li>
                            <a class="flex flex-col gap-2 relative" href="<?php the_permalink(); ?>">
                                <!-- Get the categories -->
                                <?php
                                $categories = get_the_category();
                                $available_categories = [
                                    "fitness" => "bg-green-600",
                                    "coding" => "bg-blue-600",
                                    "life" => "bg-yellow-600",
                                    "meals" => "bg-red-600",
                                    "mindset" => "bg-purple-600",
                                ];
                                if ($categories) {
                                    if (array_key_exists($categories[0]->slug, $available_categories)) {
                                        echo '<span class="absolute top-4 left-4 ' . $available_categories[$categories[0]->slug] . ' text-white px-2 py-1 rounded-md text-sm font-bold">' . $categories[0]->name . '</span>';
                                    } else {
                                        echo '<span class="absolute top-4 left-4  text-white px-2 py-1 rounded-md text-xs font-bold">' . $categories[0]->name . '</span>';
                                    }
                                }
                                ?>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img class="aspect-video rounded-lg object-cover" src="<?php the_post_thumbnail_url() ?>" alt="thumbnail photo">

                                <?php endif; ?>
                                <h2 class="text-lg text-slate-50"><?php the_title(); ?></h2>
                                <!-- get 100 charcaters of the contetn -->
                                <p class="text-slate-400">
                                    <?php
                                    $content = get_the_content();
                                    $content = strip_tags($content);
                                    echo substr($content, 0, 100);
                                    ?>
                                </p>
                                <div class="flex gap-2 items-center">
                                    <span class="text-xs font-bold text-slate-300"><?php the_author(); ?></span>
                                    <span class="text-xs text-slate-500"><?php the_date(); ?></span>
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
</div>
<?php
get_footer()
?>