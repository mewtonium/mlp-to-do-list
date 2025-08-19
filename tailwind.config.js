/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.{js,vue}',
    ],
    theme: {
        container: {
            padding: '2rem',
            center: true,
        },
        extend: {},
    },
    plugins: [],
}

