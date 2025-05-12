<?php
get_header()
?>
<div class="custom-container flex items-start flex-col">

    <section class="flex flex-col py-8">
        <?php
        get_template_part('templates/sections/intro', null, [
            'section_label' => 'Thank You',
            'headline' => 'Thank you for subscribing, friend!',
            'description' => 'You will receive exclusive deals and lots of free value every other day. I am excited to have you on board. You can read my latest blog posts in the meantime!',
            'fade_in' => true
        ]);
        ?>

    </section>
</div>
<?php
get_footer()
?>