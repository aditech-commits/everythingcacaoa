/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './*.html',
    './template-parts/**/*.php',
    './templates/**/*.php',
    './components/**/*.php',
    './everything-cacao-theme/**/*.php',
    './assets/js/**/*.js',
    './*.js'
  ],
  theme: {
    extend: {
      colors: {
        'canvas': '#FBF8F3',
        'card-bg': '#FFFFFF',
        'cacao-dark': '#2C1A11',
        'accent-gold': '#D4AF37',
        'accent-terracotta': '#C86D51',
        'accent-whatsapp': '#25D366',
        'cherelle-caramel': '#E08E45',
        'nahar-obsidian': '#18110D',
        'text-primary': '#2C1A11',
        'text-muted': '#7A685A',
      },
      fontFamily: {
        'serif-luxury': ['Playfair Display', 'Georgia', 'serif'],
        'sans': ['Hanken Grotesk', '-apple-system', 'sans-serif'],
        'brand-logo': ['Leckerli One', 'cursive', 'serif'],
        'leckerli': ['Leckerli One', 'cursive'],
      }
    }
  },
  plugins: [],
};
