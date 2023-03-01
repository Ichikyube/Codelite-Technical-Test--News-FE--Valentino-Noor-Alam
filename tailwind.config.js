/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        rampart: ['Rampart One', 'cursive'],
        poppins: ['Poppins', 'sans-serif'],
        inter: ['Inter', 'sans-serif']
      },
      animation: {
        ring: 'ring 4s ease-in-out infinite',
      },
      keyframes: {
        ring: {
          '0%': { transform:'rotate(-15deg)'},
          '2%': { transform:'rotate(15deg)'},
          '4%': { transform:'rotate(-18deg)'},
          '6%': { transform:'rotate(18deg)'},
          '8%': { transform:'rotate(-22deg)'},
          '10%':{ transform:'rotate(22deg)'},
          '12%':{ transform:'rotate(-18deg)'},
          '14%':{ transform:'rotate(18deg)'},
          '16%':{ transform:'rotate(-12deg)'},
          '18%':{ transform:'rotate(12deg)'},
          '100%,20%':{ transform:'rotate(0)'}
        },
      },
    },
  },
  plugins: [],
}
