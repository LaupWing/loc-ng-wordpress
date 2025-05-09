<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">
    <section class="py-20 flex items-start flex-col">
        <div class="p-1.5 bg-emerald-100 rounded-full mb-4">
            <div class="h-full px-3 py-1 bg-emerald-300 flex items-center rounded-full gap-2">
                <div class="h-2 w-2 rounded-full bg-lime-300 shadow-lime-200 shadow-lg animate-pulse"></div>
                <h2 class="text-white text-xs font-bold uppercase">Products to improve your life</h2>
            </div>
        </div>
        <span class="text-slate-400 uppercase text-sm tracking-wider">Loc Nguyen</span>
        <h1 class="font-bold max-w-sm text-4xl md:text-5xl 2xl:text-6xl" data-fade="2">Do what works. Enjoy
            <div class="inline-block text-light py-0.5">
                <span class="transition-colors gradient-animation-slow bg-clip-text text-transparent">
                    Life.
                </span>
            </div>
        </h1>
        <p class="mt-4 max-w-4xl text-gray-700 md:mt-6 md:text-lg 2xl:text-xl" data-fade="3">I possess a strong enthusiasm for both programming and fitness, finding fulfillment in assisting individuals either at the gym or in the realm of coding.</p>
        <div class="mt-8 flex bg-gray-100 border border-gray-200 relative p-2 rounded-md flex-wrap sm:gap-1 gap-2 w-full max-w-md" data-fade="4">
            <label for="email" class="absolute -top-5 left-0 text-gray-300 bg-gray-100 text-xs font-bold rounded-t px-2 uppercase pb-1 border border-gray-200 border-b-0">
                Your email
            </label>
            <input
                type="text"
                class="rounded flex-1 py-2 bg-white text-gray-700 placeholder:text-gray-400 px-2 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:ring-opacity-50"
                placeholder="Enter your email..." />
            <div class="group relative flex">
                <div class="absolute -inset-0.5 animate-pulse rounded blur from-custom-green bg-gradient-to-r to-custom-purple opacity-75 transition duration-1000 group-hover:opacity-100 group-hover:duration-200"></div>
                <div class="gradient-animation-border shadow hover:scale-[1.03] active:scale-[0.97] motion-safe:transform-gpu motion-reduce:hover:scale-100 transition duration-100 scale-100 ">
                    <button class="rounded font-bold px-4 scale-100 disabled:bg-gray-200  dark:disabled:bg-gray-700  bg-white py-[7px]">
                        <a href="/blog">Subscribe</a>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="flex flex-col py-8">
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
    <section class="flex flex-col py-8">
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
        <a class="mt-6" href="/blogs">
            <button class="rounded font-bold px-4 scale-100 bg-light text-gray-600 disabled:bg-gray-200 py-2 border border-gray-300 focus:outline-none focus-visible:ring focus-visible:ring-accent shadow-sm hover:scale-[1.03] active:scale-[0.97] motion-safe:transform-gpu motion-reduce:hover:scale-100 transition duration-100 cursor-pointer">See all blogs</button>
        </a>
    </section>

</div>
<?php
get_footer()
?>