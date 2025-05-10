<?php
$fade_in = isset($args["fade_in"]) ? true : false;
?>
<?php
if ($fade_in) {
?>
    <div class="flex flex-col py-6">
        <span class="text-slate-400 uppercase text-sm tracking-wider" data-fade="1">
            <?php echo esc_html($args['section_label'] ?? 'Section Label'); ?>

        </span>
        <h3 class="transition-colors text-4xl md:text-5xl 2xl:text-6xl pb-2 font-bold gradient-animation-slow bg-clip-text text-transparent" data-fade="2">
            <?php echo esc_html($args['headline'] ?? 'Headline'); ?>
        </h3>
        <p class="max-w-4xl text-gray-700 md:text-lg 2xl:text-xl" data-fade="3">
            <?php echo esc_html($args['description'] ?? 'Description'); ?>
        </p>
    </div>
<?php
} else {
?>
    <div class="flex flex-col py-6">
        <span class="text-slate-400 uppercase text-sm tracking-wider">
            <?php echo esc_html($args['section_label'] ?? 'Section Label'); ?>

        </span>
        <h3 class="transition-colors text-4xl md:text-5xl 2xl:text-6xl pb-2 font-bold gradient-animation-slow bg-clip-text text-transparent">
            <?php echo esc_html($args['headline'] ?? 'Headline'); ?>
        </h3>
        <p class="max-w-4xl text-gray-700 md:text-lg 2xl:text-xl">
            <?php echo esc_html($args['description'] ?? 'Description'); ?>
        </p>
    </div>
<?php
}
?>