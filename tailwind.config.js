module.exports = {
  content: [
    './*.{html,js,php}',
    './admin/**/*.{html,js,php}'
  ],
  theme: {
    
    extend: {
      fontFamily: {
        'sans': ["Lato", 'sans-serif'],
      },
      colors: {
        blue1: '#153448',
        blue2: '#3C5B6F',
        blue3: '#3b82f6',
        beige1: '#948979',
        beige2: '#DFD0B8',
      },

      
    },
    },
  plugins: [
      require("tailwindcss-animated"),
      require('tailwind-scrollbar-hide')
     
  ],
}
