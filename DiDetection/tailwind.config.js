module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {}
  },
  variants: {
    backgroundColour:['responsive','hover','focus','active']
  },
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
