<header
    class="flex text-sm py-8 px-8 border-php-violet/50 border-b md:border-b-0 bg-inherit z-10 transition-all dark:border-php-gray md:py-0 md:h-24 md:sticky md:top-0"
    :class="{ 'md:border-b md:h-20': navAtTop }"
    @scroll.window="navAtTop = (window.pageYOffset < 50) ? false: true">
    <div class="container flex flex-col items-center gap-6 max-w-4xl mx-auto md:flex-row md:gap-10">
        <a href="/" class="w-full max-w-44 md:max-w-56 active:translate-y-px">
            <x-logo></x-logo>
            <h1 class="sr-only">PHP Operators</h1>
        </a>
        <form action="" class="relative h-12 w-full">
            <input
                class="bg-php-violet rounded-full px-6 w-full h-full focus:ring-2 ring-inset ring-php-purple/15 outline-none placeholder:text-php-purple-dark/50 dark:bg-php-gray-light dark:placeholder:text-white/50 dark:ring-php-purple/50"
                type="text" placeholder="Find out more about a PHP operator" />
            <button
                class="absolute top-0 right-0 px-6 h-full flex items-center text-lg text-php-purple-dark hover:text-php-purple active:translate-y-px dark:text-white dark:hover:text-white/50">
                <span class="pointer-events-none fa-duotone fa-shuffle"></span>
            </button>
            <button
                class="absolute top-0 right-0 px-6 h-full flex items-center text-lg text-php-purple-dark hover:text-php-purple active:translate-y-px dark:text-white dark:hover:text-white/50">
                <span class="pointer-events-none fa-sharp-duotone fa-xmark-large"></span>
            </button>
        </form>
    </div>
</header>
