/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './pages/**/*.html',      // Inclui todos os arquivos HTML na pasta 'pages'
    './parts/**/*.html',      // Inclui todos os arquivos HTML na pasta 'parts'
    './src/**/*.css',         // Inclui todos os arquivos CSS na pasta 'src'
    './js/**/*.js',           // Inclui todos os arquivos JavaScript na pasta 'js'
    './*.html',
  ],
  theme: {
    extend: {
      colors: {
        'brown-eyes': '#77493F', //backgroung do header e footer
        'darkslateblue': '#483D8BFF', //background do botão
        'dark-blue': 'rgb(19, 9, 83)', // background hover do botão
        'gray-300': 'rgba(209, 213, 219, 1)', // Cor do texto
        'blue-500': 'rgba(96, 165, 250, 0.2)', // Cor da borda
        'darkbrown': '#2F2325', // cor da linha de separação
      },
      fontFamily: {
        'roboto-flex': ['"Roboto Flex"', 'sans-serif'], // Adiciona a fonte Roboto Flex
        'tapestry': ['Tapestry', 'cursive'], // Adicionando a fonte 'Tapestry'
      },
    },
  },
  plugins: [],
}
