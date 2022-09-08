module.exports = {
    mode: 'default',
    darkMode: false, // or 'media' or 'class'
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    theme: {
        extend: {
            skew: {
                '30': '30deg',
                '-30': '-30deg'
            },
            colors: {
                'color-body': 'var(--body-background)',
                'color-primary': 'var(--primary-1)',
                'color-primary-font': 'var(--thirdary-3)',
                'color-secondary': 'var(--secondary-1)',
                'color-secondary-font': 'var(--thirdary-3)',
                'color-disabled': 'var(--background-breadcrumb-no-selected)',
                'color-disabled-font': 'var(--secondary-3)'
            }
        },
        width: {
            '1280': '1280px',
        }
    },
    variants: {
        extend: {
            margin: ['last']
        }
    },
    plugins: [
        require('@tailwindcss/forms')
    ]
}
