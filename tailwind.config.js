import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        fontFamily: {
            mono: [
                'Commit Mono, monospace',
                {
                    fontFeatureSettings: '"cv02", "cv03", "cv06", "cv07", "cv11", "ss03", "ss04", "ss05"',
                },
                ...defaultTheme.fontFamily.sans,
            ],
        },
        extend: {
            colors: {
                "php-gray": "#2B2B31",
                "php-gray-dark": "#202023",
                "php-gray-light": "#3D3D47",
                "php-purple": "#6F75CF",
                "php-purple-dark": "#444880",
                "php-purple-bleak": "#606282",
                "php-violet": "#D1D2E8",
                "php-violet-dark": "#3A3A4F",
                "php-violet-light": "#E6E6F2"
            }
        }
    },
    plugins: [],
};
