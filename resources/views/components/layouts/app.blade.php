<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{
        theme: $persist(''),
    }"
    x-init="() => {
        if (theme) return;

        const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        theme = prefersDarkMode ? 'dark' : 'light';
    }"
>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="{{ $description ?? 'Learn more about each of the PHP operators. Click on an operator to read how it works and see code examples, or enter a search term to filter the list.' }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#E6E6F2" media="(prefers-color-scheme: light)" />
        <meta name="theme-color" content="#202023" media="(prefers-color-scheme: dark)" />

        <title>{{ isset($title) && (string) $title ? $title.' | ' : '' }}PHP Operators</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <meta property="og:title" content="{{ isset($title) && (string) $title ? $title.' | ' : '' }}PHP Operators" />
        <meta property="og:description" content="{{ $description ?? 'Learn more about each of the PHP operators. Click on an operator to read how it works and see code examples, or enter a search term to filter the list.' }}" />
        <meta property="og:image" content="{{ $image ?? asset('social.png') }}" />
        <meta property="og:author" content="Spatie" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <script src="https://kit.fontawesome.com/179125d0a6.js" crossorigin="anonymous"></script>
    </head>
    <body x-bind:class="theme" class="font-mono antialiased bg-php-violet-light text-php-gray-dark dark:bg-php-gray-dark dark:text-white selection:bg-php-purple-light">
        {{ $slot }}

        @persist('footer')
        <footer class="w-full text-xs px-12 py-8 xl:fixed md:bottom-0 pointer-events-none">
            <div class="flex justify-between items-center gap-6">
                <div class="flex items-center gap-3 lowercase pointer-events-auto">Made by
                    <a class="hover:opacity-90 active:translate-y-px" href="https://spatie.be/" target="_blank"><img
                            class="w-16" src="{{ asset('assets/spatie_logo.svg') }}" alt="Spatie"></a>
                </div>
                <div class="flex gap-3 text-base pointer-events-auto">
                    <button
                        x-bind:class="theme === 'light' ? '' : 'opacity-20'"
                        x-on:click="theme = 'light'"
                        class="hover:opacity-70"
                    >
                        <span class="fa-sharp fa-solid fa-brightness"></span>
                    </button>
                    <button
                        x-bind:class="theme === 'dark' ? '' : 'opacity-20'"
                        x-on:click="theme = 'dark'"
                        class="hover:opacity-70"
                    >
                        <span class="fa-sharp fa-solid fa-moon"></span>
                    </button>
                    <a
                        href="https://github.com/spatie/php-operators/"
                        class="hover:opacity-70"
                    >
                        <span class="fa-brands fa-github"></span>
                    </a>
                </div>
            </div>
        </footer>
        @endpersist

        @livewireScripts
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "FAQPage",
              "mainEntity": [
                @foreach ($operators as $index => $operator)
                {
                  "@type": "Question",
                  "name": "How does PHP {{ $operator['teaser'] }} work?",
                  "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "<main>{!! $operator['contents'] !!}</main><pre><code>{!! html_entity_decode(strip_tags($operator['code'])) !!}</code></pre>"
                  }
                }{{ $loop->last ? '' : ',' }}
                @endforeach
            ]
        }
        </script>
    </body>
</html>
