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
            gray: colors.gray,
            indigo: colors.indigo,
            pink: colors.pink,
            red: colors.rose,
            emerald: colors.emerald,
            orange: colors.orange,
            yellow: colors.yellow,
            cyan: colors.cyan,
            purple: colors.purple,
            slate: colors.slate,
            zinc: colors.zinc,
            neutral: colors.neutral,
            stone: colors.stone,
            amber: colors.amber,
            lime: colors.lime,
            teal: colors.teal,
            sky: colors.sky,
            violet: colors.violet,
            fuchsia: colors.fuchsia,
            rose: colors.rose,
            'primary-color': '#8a30ff',
            'light-primary-color': '#b57dff',
            'secondary-color': '#d9d7d7',
        },

        fontWeight: {
            hairline: 100,
            'extra-light': 100,
            thin: 200,
            light: 300,
            normal: 400,
            medium: 500,
            semibold: 600,
            bold: 700,
            'extra-bold': 800,
            black: 900,
        },

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
};

