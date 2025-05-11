<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">
    <section class="flex flex-col py-8">
        <?php
        get_template_part('templates/sections/intro', null, [
            'section_label' => 'About',
            'headline' => 'Who is this guy?',
            'description' => 'An gym bro turned software engineer, I’m on a mission to help you become the best version of yourself.',
            'fade_in' => true
        ]);
        ?>

    </section>
    <article class="flex flex-col items-center sm:flex-row sm:mt-10">
        <div class="flex flex-col justify-center flex-shrink-0 items-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/profile.jpg" alt="Loc" class="mx-auto rounded-full flex-shrink-0 w-72 h-72 sm:w-80 sm:h-80 border-[5px] border-slate-50 object-cover mb-10" />
            <ul class="flex gap-4 mb-4 text-slate-300 justify-center">
                <?php
                $social_media = [
                    "facebook",
                    "instagram",
                    "twitter",
                    "youtube",
                    "linkedin",
                ];
                foreach ($social_media as $media) {
                ?>
                    <li>
                        <a href="https://x.com/LaupWing1994" target="_blank">
                            <?php
                            get_template_part("templates/icons/$media");
                            ?>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- show single blog post content -->
        <div id="content" class="sm:ml-6">
            <?php the_content(); ?>
        </div>

    </article>

</div>
<?php
get_footer()
?>