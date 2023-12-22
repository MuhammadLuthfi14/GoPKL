const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        // './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        // './storage/framework/views/*.php',
        // './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    // plugins: [require("@tailwindcss/forms")],
    plugins: [
        require("@tailwindcss/forms"),
        require("daisyui"),
        // require('flowbite/plugin'),
    ],
    daisyui: {
        themes: [
            {
                mytheme: {

                    "primary": "#3C79F5",

                    "secondary": "#D9D9D9",

                    "accent": "#1dcdbc",

                    "neutral": "#2b3440",

                    "base-100": "#ffffff",

                    "info": "#3abff8",

                    "success": "#3CBA78",

                    "warning": "#FFBF00",

                    "error": "#DC3545",

                    "snow": "#ffffff"
                },
            },
        ],
    }
};
