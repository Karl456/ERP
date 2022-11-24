/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.css',
    ],
    safelist: [
        {
            pattern: /grid-cols-./,
        },
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
