/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {},
    plugins: [require("daisyui")],
    daisyui: {
      themes: [
        {
          mytheme: {
            "primary": "#213555", //warna utama
            "primary-content": "#F5EFE7", //warna text ketika di class primary

            "secondary": "#4F709C", //warna notifikasi
            "secondary-content": "#F5EFE7", //warna text ketika di class primary

            "accent": "#D8C4B6", //untuk counter dari background
            "accent-content": "#213555", //untuk counter dari background

            "base-100": "#F5EFE7", //warna background
            "base-content": "#213555", //warna text
          }
        }
      ]
    }
  }

