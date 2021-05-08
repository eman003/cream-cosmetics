const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                tillium : ['Titillium Web', 'sans-serif', ],
            },
        },
        height: {
            hero: "14rem",
            heroSm: "22rem",
            heroMd: "30rem",
            heroLg: "42rem"
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    corePlugins: {
        outline: false,
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
