const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

module.exports = {
    darkMode: 'class',
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            green: colors.green,
            blue: colors.blue,
            gray: colors.neutral,
            indigo: colors.indigo,
            pink: colors.fuchsia,
            red: colors.rose,
            emerald: colors.emerald,
            orange: colors.orange,
            yellow: colors.amber,
            cyan: colors.cyan,
            'primary-color': '#8a30ff',
            'light-primary-color': '#b57dff',
            'secondary-color': '#d9d7d7',
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
};

