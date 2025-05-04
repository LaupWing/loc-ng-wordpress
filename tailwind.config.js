/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./**/*.php",
        "./src/**/*.jsx",
        "./src/**/*.ts",
        "./src/**/*.tsx",
    ],
    theme: {
        fontFamily: {
            sans: ["Lato", "sans-serif"],
            cursive: ["Roboto", "cursive"],
            display: ["Orbitron", "sans-serif"],
        },
        extend: {},
    },
    safelist: ["current-menu-item", "menu-item", "current_page_parent"],
    plugins: [],
}
