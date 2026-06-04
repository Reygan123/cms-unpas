/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './public/**/*.html',
    './resources/**/*.html'
  ],
  theme: {
    extend: {
      colors: {
        primary: '#5676ff',
        secondary: '#fde047', // yellow-300 dari Tailwind default
      }
    },
  },
  plugins: [],
}

