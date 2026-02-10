document.addEventListener('DOMContentLoaded', () => {
    const burger = document.querySelector('.burger-toggle');
    const menu = document.querySelector('.nav-menu');

    if (burger && menu) {
        burger.addEventListener('click', () => {
            menu.classList.toggle('active');
            console.log("Menu cliqué !"); // Pour vérifier dans la console (F12)
        });
    }
});