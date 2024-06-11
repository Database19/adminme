import './bootstrap';
import '../sass/app.scss';
import 'tailwindcss/tailwind.css';
import Turbolinks from 'turbolinks';
Turbolinks.start();

document.addEventListener('DOMContentLoaded', () => {
    const collapseLinks = document.querySelectorAll('[data-bs-toggle="collapse"]');
    collapseLinks.forEach(link => {
        link.addEventListener('click', () => {
            console.log('Clicked:', link);
        });
    });
});

document.addEventListener('turbolinks:request-start', function() {
    document.getElementById('loading').style.display = 'flex';
});

document.addEventListener('turbolinks:load', function() {
    document.getElementById('loading').style.display = 'none';
});



import './customStyle';
import './customHandler';
