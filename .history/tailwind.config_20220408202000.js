import { fontFamily as _fontFamily } from 'tailwindcss/defaultTheme';
import colors from 'tailwindcss/colors';

export const content = [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
];
export const theme = {
    extend: {
        colors: {
            'bg-gray-background': '#ff0000',
        },
        fontFamily: {
            sans: ['Open Sans', ..._fontFamily.sans],
        },
    },
};
