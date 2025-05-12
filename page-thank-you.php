<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">

    <section class="flex flex-col py-8">
        <?php
        get_template_part('templates/sections/intro', null, [
            'section_label' => 'Products',
            'headline' => 'Actually useful stuff.',
            'description' => 'Built from decades of experience in fitness, coding, and self-mastery — no fluff, just tools that work.',
            'fade_in' => true
        ]);
        ?>

    </section>
</div>
<?php
get_footer()
?>