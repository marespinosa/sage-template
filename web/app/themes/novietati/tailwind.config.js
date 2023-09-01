module.exports = {
    content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
    safelist: [{
        // pattern: [/grid/, /p/],
        pattern: /grid|p/,
        variants: ['lg'],
    }],
    theme: {
        extend: {
            colors: {},
        },
    },
    plugins: [],
};