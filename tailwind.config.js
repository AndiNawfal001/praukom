/** @type {import('tailwindcss').Config} */
module.exports = { 
  // daisyui: {
  //   themes: ["business"],
  // },
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}
// php -S localhost:8000 -t public