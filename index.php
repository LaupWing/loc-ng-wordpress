<?php
get_header()
?>
<div class="custom-container flex items-start flex-col py-20">
    <div class="p-1.5 bg-emerald-100 rounded-full mb-4">
        <div class="h-full px-3 py-1 bg-emerald-300 flex items-center rounded-full gap-2">
            <div class="h-2 w-2 rounded-full bg-lime-300 shadow-lime-200 shadow-lg animate-pulse"></div>
            <h2 class="text-white text-xs font-bold uppercase">Products to improve your life</h2>
        </div>
    </div>
    <span class="text-slate-400 uppercase text-sm tracking-wider">Loc Nguyen</span>
    <h1 class="font-bold max-w-sm text-3xl md:text-5xl 2xl:text-6xl" data-fade="2">Do what works. Enjoy
        <div class="inline-block text-light py-0.5">
            <span class="transition-colors gradient-animation-slow bg-clip-text text-transparent">
                Life.
            </span>
        </div>
    </h1>
    <p class="mt-4 max-w-4xl text-gray-700 md:mt-6 md:text-lg 2xl:text-xl" data-fade="3">I possess a strong enthusiasm for both programming and fitness, finding fulfillment in assisting individuals either at the gym or in the realm of coding.</p>
    <div class="mt-8 flex bg-gray-100 border border-gray-200 relative p-2 rounded-md flex-wrap gap-1  w-full max-w-md" data-fade="4">
        <label for="email" class="absolute -top-5 left-0 text-gray-300 bg-gray-100 text-xs font-bold rounded-t px-2 uppercase pb-1 border border-gray-200 border-b-0">
            Your email
        </label>
        <input type="text" class="rounded flex-1 bg-white text-gray-700 placeholder:text-gray-400 px-2 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-custom-green focus:ring-opacity-50" placeholder="Enter your email..." />
        <div class="group relative flex">
            <div class="absolute -inset-0.5 animate-pulse rounded blur from-custom-green bg-gradient-to-r to-custom-purple opacity-75 transition duration-1000 group-hover:opacity-100 group-hover:duration-200"></div>
            <div class="gradient-animation-border shadow hover:scale-[1.03] active:scale-[0.97] motion-safe:transform-gpu motion-reduce:hover:scale-100 transition duration-100 scale-100 ">
                <button class="rounded font-bold px-4 scale-100 disabled:bg-gray-200  dark:disabled:bg-gray-700  bg-white py-[7px]">
                    <a href="/blog">Subscribe</a>
                </button>
            </div>
        </div>
    </div>

    <section class="py-12 flex flex-col">
        <span class="text-slate-400 uppercase text-sm tracking-wider">Recent blog posts</span>
        <h3 class="transition-colors text-4xl font-bold gradient-animation-slow bg-clip-text text-transparent">
            Actually useful stuff
        </h3>
        <div class="">
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
        </div>
    </section>
</div>
<?php
get_footer()
?>