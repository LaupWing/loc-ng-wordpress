<section class="py-20 flex items-start flex-col">

    <h3 class="transition-colors text-4xl md:text-5xl 2xl:text-6xl pb-2 font-bold gradient-animation-slow bg-clip-text text-transparent" data-fade="2">
        Gain unique perspectives.
    </h3>
    <p class="mt-4 max-w-4xl text-gray-700 dark:text-gray-400 md:mt-6 md:text-lg 2xl:text-xl" data-fade="4">Join 15,000+ becoming dangerous in body and mind.
        Every week, I send raw, real insights on fitness, self-mastery, energy, and attraction — no bullsh*t, just what actually works.
    </p>
    <div data-fade="5" class="w-full mt-4">
        <?php get_template_part('templates/sections/subscribe_form'); ?>
    </div>
</section>

<footer class="mt-auto pt-10">
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
    <p class="text-gray-300 dark:text-gray-700 text-xl">© All Rights Reserved.</p>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>