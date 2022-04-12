const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors') 

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors:{
                'gray-background': '#f7f8fc',
                'regalblue': '#243c5a',
                },
            spacing:{
                70: '17.5rem',
                175:'43.75rem',
            },
            maxWidth:{
                custom:'62.5rem',

            },
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    //plugins: [require('@tailwindcss/forms')],
};
