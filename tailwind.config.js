import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./_includes/**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
        japanese: ["Noto Sans JP", "sans-serif"],
      },
    },
  },
  plugins: [daisyui],
  daisyui: {
    themes: ["business"],
  },
};

/*
 npx tailwindcss -i ./public/css/input.css -o ./public/css/output.css --watch --verbose
*/
