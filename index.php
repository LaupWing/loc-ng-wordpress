<?php
get_header()
?>
<div class="custom-container py-20">
    <h1 class="mt-1 text-dark dark:text-light font-bold text-3xl md:text-5xl 2xl:text-6xl" data-fade="2">Do what works. Enjoy
        <div class="dark:!bg-gradient-to-r dark:!from-dark dark:!to-dark gradient-animation-slow inline-block text-light py-0.5">
            <span class="transition-colors dark:gradient-animation-slow dark:bg-clip-text dark:text-transparent">
                Life
            </span>
        </div>
    </h1>
    <p class="mt-4 max-w-4xl text-gray-700 dark:text-gray-200 md:mt-6 md:text-lg 2xl:text-xl" data-fade="3">I possess a strong enthusiasm for both programming and fitness, finding fulfillment in assisting individuals either at the gym or in the realm of coding.</p>
    <div class="mt-8 flex flex-wrap gap-4 md:!text-lg" data-fade="4">
        <div class="group relative flex">
            <div class="absolute -inset-0.5 animate-pulse rounded blur from-custom-green bg-gradient-to-r to-custom-purple opacity-75 transition duration-1000 group-hover:opacity-100 group-hover:duration-200"></div>
            <div class="gradient-animation-border shadow hover:scale-[1.03] active:scale-[0.97] motion-safe:transform-gpu motion-reduce:hover:scale-100 transition duration-100 scale-100 "><button class="rounded font-bold px-4 scale-100 bg-light dark:bg-dark text-gray-600 disabled:bg-gray-200 dark:text-gray-200 dark:disabled:bg-gray-700  bg-white py-[7px]"><a href="/blog">Read the Blog</a></button></div>
        </div><a href="/about"><button class="rounded font-bold px-4 scale-100 bg-light dark:bg-dark text-gray-600 disabled:bg-gray-200 dark:text-gray-200 dark:disabled:bg-gray-700  py-2 border border-gray-300 dark:border-gray-600 focus:outline-none focus-visible:ring focus-visible:ring-accent shadow-sm hover:scale-[1.03] active:scale-[0.97] motion-safe:transform-gpu motion-reduce:hover:scale-100 transition duration-100">Learn more about me</button></a>
    </div>
</div>
<?php
get_footer()
?>