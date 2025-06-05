// tailwind.config.js
console.log('Tailwind config carregado');

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            translate: {
                '20': '5rem',
            },
            fontFamily: {
                aeonik: ['Aeonik-Regular', 'sans-serif'],
                'aeonik-medium': ['Aeonik-Medium', 'sans-serif'],
            },
        },
        screens: {
            'sm': '640px',
            'md': '820px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        },
    },
    plugins: [],
}
