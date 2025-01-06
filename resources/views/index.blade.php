<x-layout>
    <x-header></x-header>

    <main
        class="main"
        x-data="{
            currentOperator: '{{ $currentOperatorSlug ?? '' }}',
            init() {
                if (window.location.href.matches) {
                    this.currentOperator = slugFromUrl(window.location.href);
                }
            },
            selectOperator(slug) {
                this.currentOperator = slug;
                window.history.pushState({}, null, `/operators/${slug}`);
            },
            slugFromUrl(url) {
                const parts = url.split('/').filter(Boolean);
                return parts[parts.length - 1];
            },
        }"
    >
        @foreach ($operatorsByCategory as $category => $operators)
            <article class="max-w-4xl mx-auto px-12 my-12 overflow-hidden first:mt-36">
                <h2 class="lowercase mb-4 text-sm">{{ $category }}</h2>

                <dl class="flex flex-wrap gap-2">
                    @foreach ($operators as $operator)
                        <dt>
                            <x-operator
                                :operator="$operator"
                                class="bg-php-violet hover:bg-white dark:bg-php-gray dark:hover:bg-php-gray-light"
                                x-bind:class="{ '!bg-php-purple !text-white': currentOperator === '{{ $operator->slug }}' }"
                            />
                        </dt>
                        <dd
                            class="basis-full my-8 last:mb-0"
                            style="order: {{ count($operators) }}"
                            x-show="currentOperator === '{{ $operator->slug }}'"
                            x-cloak
                        >
                            <div
                                class="description relative bg-php-purple-bleak text-white py-4 md:py-12 dark:bg-php-gray">

                                <div class="grid gap-4 md:grid-cols-2">

                                    <div class="text-sm flex flex-col">
                                        <div class="flex items-center gap-6 mb-6">
                                            <p class="px-3 py-2 bg-php-purple text-white rounded-md font-semibold">
                                                {{ $operator->title }}</p>
                                            <p>{{ $operator->teaser }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <p>{{ $operator->contents }}</p>
                                        </div>
                                        <div class="mt-auto flex gap-2 text-xs mb-3">
                                            <span class="opacity-50">tags</span>
                                            @foreach ($operator->tags as $tag)
                                                <a href="#"
                                                    class="text-php-purple-light hover:text-white hover:underline dark:text-php-purple dark:hover:text-php-purple-light">{{ $tag }}</a>
                                            @endforeach
                                        </div>
                                        {{-- @todo Related should be linked using operator slug in contents, not the operator itself --}}
                                        {{-- <div class="flex items-center gap-3 text-xs">
                                            <span class="opacity-50">related</span>
                                            @foreach ($operator->related as $related)
                                                <x-operator
                                                    :operator="$operators->first(fn ($operator) => $operator->title === $related)"
                                                    class="bg-php-violet-dark/50 hover:bg-php-violet-dark dark:bg-php-gray-light dark:hover:bg-php-gray-light/50"
                                                />
                                            @endforeach
                                        </div> --}}
                                    </div>

                                    <div
                                        class="relative bg-php-violet-dark rounded-md p-8 text-sm dark:bg-php-gray-dark">
                                        <pre><code>{{ $operator->code }}</code></pre>
                                        <div class="absolute flex top-0 right-0 py-3 px-3 text-xs">
                                            <span><svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 22 13">
                                                    <path fill="currentColor"
                                                        d="M11 .925C4.925.925 0 3.421 0 6.5s4.925 5.575 11 5.575S22 9.579 22 6.5 17.075.925 11 .925ZM8.136 7.586c-.262.246-.554.347-.875.451-.32.105-.73.084-1.226.084H4.91l-.312 1.8H3.284l1.172-6.122h2.528c.76 0 1.315.219 1.664.618.348.4.453.966.314 1.681-.053.285-.15.56-.29.813a2.72 2.72 0 0 1-.536.675Zm3.838.534.518-2.596c.06-.304.038-.53-.065-.64-.102-.11-.32-.184-.654-.184H10.73l-.671 3.42H8.754l1.173-5.941h1.305l-.312 1.62h1.162c.73 0 1.235.147 1.512.402.278.255.361.604.25 1.175l-.546 2.745h-1.325l.001-.001Zm7.248-2.012c-.053.283-.15.556-.29.808-.141.25-.322.477-.535.67-.263.246-.554.347-.875.451-.321.105-.73.084-1.227.084h-1.126l-.311 1.8h-1.315l1.173-6.122h2.528c.76 0 1.315.219 1.664.618.348.4.453.976.314 1.69v.001Zm-2.476-1.409h-.9l-.492 2.521h.8c.53 0 .925-.052 1.184-.252.26-.2.435-.509.526-.976.087-.448.047-.798-.12-.983-.166-.184-.499-.31-.998-.31Zm-10.26 0h-.9L5.095 7.22h.8c.53 0 .924-.052 1.184-.252.26-.2.434-.509.525-.976.087-.448.048-.798-.119-.983-.166-.184-.5-.31-.999-.31Z" />
                                                </svg></span>&nbsp;<span class="opacity-75">1.0+</span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </dd>
                    @endforeach
                </dl>
            </article>
        @endforeach
    </main>

    <footer class="w-full text-xs p-8 md:fixed md:bottom-0">
        <div class="flex justify-between items-center gap-6">
            <div class="flex items-center gap-3 lowercase">Made by
                <a class="hover:opacity-90 active:translate-y-px" href="https://spatie.be/" target="_blank"><img
                        class="w-16" src="{{ asset('assets/spatie_logo.svg') }}" alt="Spatie"></a>
            </div>
            <div class="flex gap-3 text-base">
                <button class="hover:opacity-70" data-mode="light"><span
                        class="fa-sharp fa-solid fa-brightness"></span></button>
                <button class="hover:opacity-70" data-mode="dark"><span
                        class="fa-sharp fa-solid fa-moon"></span></button>
                <a href="https://github.com/spatie/php-operators/" class="hover:opacity-70"><span
                        class="fa-brands fa-github"></span></a>
            </div>
        </div>
    </footer>

</x-layout>
