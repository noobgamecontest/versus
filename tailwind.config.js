const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
                title: ['Carter One'],
            },
            colors: {
                'yellow-star': '#fabc3b',
                'blue-night': '#08224a',
                'blue-darker': '#193969',
            },
        }
    },
    variants: {},
    plugins: [
        require('@tailwindcss/custom-forms')
    ]
}
