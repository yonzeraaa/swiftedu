const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    
    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'light-bg': '#f3f4f6',
                'dark-bg': '#111827',
                'light-card': '#ffffff',
                'dark-card': '#1f2937',
            },
            boxShadow: {
                'dark': '0 4px 6px -1px rgba(0, 0, 0, 0.3)',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
