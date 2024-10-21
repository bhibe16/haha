module.exports = {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
 
 theme: {
    extend: {
      colors: {
        pic: '#fad1b1',
        semiblack: '#404040'
      },
    },
  },
  plugins: [
    function({ addComponents }) {
      addComponents({
        '.custom-button': {
          '@apply flex items-center p-2 text-gray-200 rounded-lg dark:text-black hover:bg-gray-600 dark:hover:bg-gray-700': {},
        },
        '.custom-button.group:hover': {
          // Apply hover styles here if needed
        },
        'input:focus': {
          color: '#000000', // Set text color on focus
        },
      });
    },
  ],
};
