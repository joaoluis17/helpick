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
    extend: {},
  },
  plugins: [],
}
