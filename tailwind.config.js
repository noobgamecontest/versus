const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            margin: {
                '11': '2.75rem',
            },
            padding: {
                '9': '2.25rem',
            },
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
                title: ['Carter One'],
                secondary: ['Passion One']
            },
            colors: {
                'yellow-star': '#fabc3b',
            },
            fontSize: {
                '7xl': '5rem',
            },
            borderWidth: {
                '3': '3px',
            }
        },
    },
    variants: {},
    plugins: [
        require('@tailwindcss/custom-forms')
    ]
}
