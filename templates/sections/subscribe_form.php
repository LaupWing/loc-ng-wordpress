<form
    method="post"
    action="<?php echo esc_url(home_url('/subscribe')); ?>"
    class="mt-8 flex bg-gray-100 dark:bg-gray-700 dark:border-gray-600 border border-gray-200 relative p-2 rounded-md flex-wrap sm:gap-1 gap-2 w-full max-w-md">
    <label for="email" class="absolute dark:bg-gray-700 -top-5 left-0 text-gray-300 bg-gray-100 text-xs font-bold rounded-t px-2 uppercase pb-1 border border-gray-200 border-b-0 dark:border-gray-600 dark:text-gray-500">
        Your email
    </label>
    <input
        id="email"
        type="email"
        required
        name="email"
        class="rounded flex-1 py-2 bg-white text-gray-700 placeholder:text-gray-400 px-2 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:ring-opacity-50"
        placeholder="Enter your email..." />
    <div class="group relative flex">
        <div class="absolute -inset-0.5 animate-pulse rounded blur from-custom-green bg-gradient-to-r to-custom-purple opacity-75 transition duration-1000 group-hover:opacity-100 group-hover:duration-200"></div>
        <div class="gradient-animation-border shadow hover:scale-[1.03] active:scale-[0.97] motion-safe:transform-gpu motion-reduce:hover:scale-100 transition duration-100 scale-100 ">
            <button
                type="submit"
                name="subscribe_submit"
                class="rounded font-bold px-4 scale-100 disabled:bg-gray-200  dark:disabled:bg-gray-700  bg-white py-[7px]">
                Subscribe
            </button>
        </div>
    </div>
</form>