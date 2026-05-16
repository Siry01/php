/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./src/**/*.{js,css,php}", // Añadimos php aquí también por si acaso
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}