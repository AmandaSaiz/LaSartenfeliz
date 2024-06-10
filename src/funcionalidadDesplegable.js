// JavaScript para el menú desplegable
document.querySelector('.menu-icon').addEventListener('click', function () {
    document.querySelector('.dropdown-menu').classList.toggle('show');
});

// Ocultar el menú desplegable si se hace clic fuera de él
window.addEventListener('click', function (e) {
    if (!document.querySelector('.menu-icon').contains(e.target)) {
        document.querySelector('.dropdown-menu').classList.remove('show');
    }
});