import './bootstrap';
import '../sass/app.scss';
import 'tailwindcss/tailwind.css';

// Debugging untuk memastikan bahwa event klik berfungsi dengan benar
document.addEventListener('DOMContentLoaded', () => {
    const collapseLinks = document.querySelectorAll('[data-bs-toggle="collapse"]');
    collapseLinks.forEach(link => {
        link.addEventListener('click', () => {
            console.log('Clicked:', link);
        });
    });
});


import './customStyle';
import './customHandler';
