<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">

    <section class="flex flex-col items-start justify-start py-8">
        <?php
        get_template_part('templates/sections/intro', null, [
            'section_label' => 'Thank You',
            'headline' => 'Thank you for subscribing, friend!',
            'description' => 'You will receive exclusive deals and lots of free value every other day. I am excited to have you on board. You can read my latest blog posts in the meantime!',
            'fade_in' => true
        ]);
        ?>
        <a class="mt-6" href="/blogs" data-fade="4">
            <?php get_template_part('templates/ui/button', null, ['button_text' => 'See all blogs']); ?>
        </a>
    </section>
</div>
<footer class="mt-auto pt-6">
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
    <p class="text-gray-200 dark:text-gray-700 text-sm font-bold uppercase">© All Rights Reserved.</p>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>