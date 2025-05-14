/** @type {import('tailwindcss').Config} */
export default {
    content: [
  './resources/views/**/*.blade.php',
  './resources/js/**/*.js',
  './resources/**/*.php', 
],
    darkMode: 'class',
    theme: {
      extend: {},
    },
    plugins: [
        require('preline/plugin'),
    ],
  };
  