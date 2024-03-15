document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.hamburguer');
    const mobileNav = document.querySelector('.nav-itens-mobile');
    const dropdownMobile = document.querySelector('.dropdown-mobile');

    // Event listener para o botão do hambúrguer
    hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('is-active');
        mobileNav.classList.toggle('is-active');
    });

    // Event listener para o dropdown em dispositivos móveis
    dropdownMobile.addEventListener('click', function () {
        dropdownMobile.classList.toggle('is-active');
    });
});