<x-layouts.app
    :title="$title"
    :description="$description"
    :image="$image"
    :operators="$operators"
>
    <div x-data="operators({ operators: @js($operators), currentOperatorSlug: @js($currentOperatorSlug) })">
        <header
            class="flex text-sm py-8 border-php-violet/50 border-b bg-php-violet-light dark:bg-php-gray-dark z-10 transition-all dark:border-php-gray md:border-b-0 md:py-0 md:h-24 md:fixed md:w-full md:top-0"
            :class="{ 'header-collapse': navAtTop }"
            x-data="{ navAtTop: false }"
            @scroll.window="navAtTop = (window.pageYOffset < 96) ? false: true"
        >
            <div class="container flex flex-col items-center gap-6 px-12 max-w-5xl mx-auto md:flex-row md:gap-10">
                <a href="/" class="w-full max-w-44 md:max-w-56 active:translate-y-px">
                    <x-logo></x-logo>
                    <h1 class="sr-only">PHP Operators</h1>
                </a>
                <div class="relative h-12 w-full">
                    <input
                        x-model="search"
                        class="bg-php-violet rounded-full px-6 w-full h-full focus:ring-2 ring-inset ring-php-purple/15 outline-none placeholder:text-php-purple-dark/50 dark:bg-php-gray-light dark:placeholder:text-white/50 dark:ring-php-purple/50"
                        type="text"
                        placeholder="Find out more about a PHP operator"
                    />
                    <button
                        class="absolute top-0 right-0 px-6 h-full flex items-center text-lg text-php-purple-dark hover:text-php-purple active:translate-y-px dark:text-white dark:hover:text-white/50"
                        x-show="search"
                        @click="search = ''"
                    >
                        <span class="pointer-events-none fa-duotone fa-xmark-large"></span>
                    </button>
                    <button
                        class="absolute top-0 right-0 px-6 h-full flex items-center text-lg text-php-purple-dark hover:text-php-purple active:translate-y-px dark:text-white dark:hover:text-white/50"
                        x-show="!search"
                        @click="random"
                    >
                        <span class="pointer-events-none fa-duotone fa-shuffle"></span>
                    </button>
                </div>
            </div>
        </header>

        <main class="main">

            <template x-if="empty">
                <div class="py-24 px-12 space-y-8 text-center">
                    <h2 class="text-lg text-balance">Oops, no-perator found. Have a joke instead.</h2>
                    <p class="text-php-purple" x-text="currentJoke"></p>
                </div>
            </template>

            <template x-for="[category, operators] in Object.entries(visibleOperatorsByCategory)">
                <section class="max-w-5xl mx-auto my-12 first:mt-12 md:first:mt-36">
                    <div class="px-12">
                        <h2 class="lowercase mb-4 text-sm" x-text="category"></h2>
                        <nav>
                            <ul class="flex flex-wrap gap-2">
                                <template x-for="operator in operators">
                                    <li>
                                        <x-operator
                                            class="bg-php-violet dark:bg-php-gray"
                                            x-bind:class="currentOperatorSlug === operator.slug ? '!bg-php-purple text-white' : 'hover:bg-white dark:hover:bg-php-gray-light'"
                                            @click.prevent="() => selectOperator(operator.slug)"
                                        />
                                    </li>
                                </template>
                            </ul>
                        </nav>
                    </div>
                    <template x-for="operator in operators">
                        <template x-if="currentOperatorSlug === operator.slug">
                            <article class="description relative bg-php-purple-bleak text-white px-12 py-6 md:py-12 dark:bg-php-gray my-8" data-operator-contents>
                                <div class="grid gap-8 md:grid-cols-2">
                                    <div class="text-sm flex flex-col">
                                        <div class="flex items-center gap-6 mb-6">
                                            <p x-text="operator.title" class="px-3 py-2 bg-php-purple text-white rounded-md font-semibold whitespace-nowrap"></p>
                                            <p x-text="operator.teaser"></p>
                                        </div>
                                        <div class="operator-content mb-4" x-html="operator.contents"></div>
                                        <div class="mt-auto flex gap-2 text-xs mb-3">
                                            <span class="opacity-50 lowercase">Tags</span>
                                            <template x-for="tag in operator.tags">
                                                <button
                                                    type="button"
                                                    class="text-php-purple-light hover:text-white hover:underline dark:text-php-purple dark:hover:text-php-purple-light selection:text-php-gray-dark"
                                                    x-text="tag"
                                                    @click="search = tag"
                                                ></button>
                                            </template>
                                        </div>
                                        <div class="grid gap-3 grid-cols-[auto_1fr] text-xs">
                                            <span class="flex items-center h-8 opacity-50 lowercase">Related</span>
                                            <div class="flex flex-wrap gap-3">
                                                <template x-for="operator in operator.related">
                                                    <x-operator
                                                        class="bg-php-violet-dark/50 hover:bg-php-violet-dark dark:bg-php-gray-light dark:hover:bg-php-gray-light/50"
                                                        @click.prevent="() => {
                                                            selectOperator(operator.slug);
                                                            search = '';
                                                        }"
                                                    />
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="relative bg-php-violet-dark rounded-md p-8 text-sm dark:bg-php-gray-dark">
                                        <pre class="overflow-x-auto whitespace-pre-line md:whitespace-pre"><code x-html="operator.code"></code></pre>
                                        <div class="absolute flex top-0 right-0 py-3 px-3 text-xs opacity-35">
                                            <span><svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 22 13">
                                                    <path fill="currentColor"
                                                        d="M11 .925C4.925.925 0 3.421 0 6.5s4.925 5.575 11 5.575S22 9.579 22 6.5 17.075.925 11 .925ZM8.136 7.586c-.262.246-.554.347-.875.451-.32.105-.73.084-1.226.084H4.91l-.312 1.8H3.284l1.172-6.122h2.528c.76 0 1.315.219 1.664.618.348.4.453.966.314 1.681-.053.285-.15.56-.29.813a2.72 2.72 0 0 1-.536.675Zm3.838.534.518-2.596c.06-.304.038-.53-.065-.64-.102-.11-.32-.184-.654-.184H10.73l-.671 3.42H8.754l1.173-5.941h1.305l-.312 1.62h1.162c.73 0 1.235.147 1.512.402.278.255.361.604.25 1.175l-.546 2.745h-1.325l.001-.001Zm7.248-2.012c-.053.283-.15.556-.29.808-.141.25-.322.477-.535.67-.263.246-.554.347-.875.451-.321.105-.73.084-1.227.084h-1.126l-.311 1.8h-1.315l1.173-6.122h2.528c.76 0 1.315.219 1.664.618.348.4.453.976.314 1.69v.001Zm-2.476-1.409h-.9l-.492 2.521h.8c.53 0 .925-.052 1.184-.252.26-.2.435-.509.526-.976.087-.448.047-.798-.12-.983-.166-.184-.499-.31-.998-.31Zm-10.26 0h-.9L5.095 7.22h.8c.53 0 .924-.052 1.184-.252.26-.2.434-.509.525-.976.087-.448.048-.798-.119-.983-.166-.184-.5-.31-.999-.31Z" />
                                                </svg></span>
                                            {{-- &nbsp;<span class="opacity-75">1.0+</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </template>
                    </template>
                </section>
            </template>

            <section class="max-w-5xl mx-auto my-12 mt-16 text-sm/relaxed group">
                <div class="px-12 text-php-violet-dark lg:text-php-violet lg:group-hover:text-php-violet-dark transition-colors duration-300">
                    <div class="pt-4 space-y-2 border-t-2 border-php-purple/20">
                        <h2 class="font-bold text-php-purple-light">What is this? Who are you!? <span class="hidden lg:inline">Hover me!</span></h2>
                    </div>
                        <p>
                            PHP Operators is a reference guide for operators old and new in the PHP programming language.
                            We're SPATIE, a web development agency from Belgium.
                            Besides client work we like to <a href="https://spatie.be/open-source" target="_blank" class="underline">contribute to the open source community</a> and make fun projects like this one.
                        </p>
                </div>
            </section>
        </main>
    </div>
</x-layouts.app>
