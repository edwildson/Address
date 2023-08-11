/** @type {import('tailwindcss').Config} */
module.exports = {
content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    ],
  future: {
      removeDeprecatedGapUtilities: true,
      purgeLayersByDefault: true,
  },
//   purge: ["./resources/**/*.vue"],
  theme: {
      extend: {
          colors: {
              sample: "#eee",
          },
      },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/typography'),
    // require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    // require('@tailwindcss/container-queries'),
  ],
};