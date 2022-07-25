const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",],
  theme: {
    extend: {},
    fontFamily: {
      inter: ["Inter", "sans-serif"],
      sans: ['Inter', ...defaultTheme.fontFamily.sans]
    }
  },
  plugins: [],
}



