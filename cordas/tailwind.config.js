/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'skin-color': '#DFB09E', //cor do bg dos botões
                'brown-eyes': '#77493F',
                'off-white': '#EDE3DB',
                'darkslateblue': '#483D8BFF',
                'dark-blue': 'rgb(19, 9, 83)',
                'gray-300': 'rgba(209, 213, 219, 1)',
                'blue-500': 'rgba(96, 165, 250, 0.2)',
            },
            fontFamily: {
                'roboto-flex': ['"Roboto Flex"', 'sans-serif'], // Adiciona a fonte Roboto Flex
                'tapestry': ['Tapestry', 'cursive'], // Adicionando a fonte 'Tapestry'
            },
        },
    },
    plugins: [],
}
