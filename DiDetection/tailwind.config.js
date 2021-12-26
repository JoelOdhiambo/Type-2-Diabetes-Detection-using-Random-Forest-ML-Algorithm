module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],

    extend: {
      theme: {
        fontFamily:{
          body:['Nunito']
        }
    },
  },
  variants: {
    backgroundColour:['responsive','hover','focus','active']
  },
  plugins: [
    require('@tailwindcss/ui'),
    require('@themesberg/flowbite/plugin'),
  ]
}
