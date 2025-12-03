import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            witte_eend: '#F2F0EF',
            natuur_groen: '#3B8A2E',
            lnatuur_groen: '#81b175',
            vitamine_D: '#E9DA16',
            lvitamine_D: '#e9da16',
            sinas_sap: '#C64C01',
            lsinas_sap: '#d58c5a',
            blauwe_vogel: '#0076A8',
            lblauwe_vogel: '#5ea5be',
            kinder_blauw: '#00A9E0',
            lkinder_blauw: '#67bed9',
            roze_bloem: '#E20077',
            lroze_bloem: '#e65ea0',
            inkt_vis: '#37298B',
            linkt_vis: '#7f77ac',

        },
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
