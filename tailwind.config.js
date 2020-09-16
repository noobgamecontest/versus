const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                title: ['Carter One'],
            }
        }
    },
    variants: {},
    plugins: [
        require('@tailwindcss/custom-forms')
    ]
}
