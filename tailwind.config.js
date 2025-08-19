/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.{js,vue}',
    ],
    theme: {
        container: {
            center: true,
        },
        extend: {},
    },
    plugins: [],
}

