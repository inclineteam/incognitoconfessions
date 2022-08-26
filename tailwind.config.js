const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      burger: "550px",
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xlg: '1200px',
      xl: '1280px',
      
    },
    extend: {
      fontFamily: {
        inter: ["Inter", "sans-serif"],
        sans: ['Inter', ...defaultTheme.fontFamily.sans]
      },
      colors: {
        primary: '#4067bd',
        shark: '#1B1C21',
        'shark-lighter': '#292A2F' 
      }
    },
  },
  plugins: [],
}



