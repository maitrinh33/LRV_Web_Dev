function toggleMenu(icon) {
    let menu = document.querySelector('.nav-menu');
    icon.name = icon.name === 'menu-outline' ? 'close-outline' : 'menu-outline';
    menu.classList.toggle('top-[-400px]');
    menu.classList.toggle('opacity-0');
    menu.classList.toggle('top-[70px]');
    menu.classList.toggle('opacity-100');
}

function closeMenu() {
    let menu = document.querySelector('.nav-menu');
    let icon = document.querySelector('.menu-icon ion-icon');
    menu.classList.add('top-[-400px]');
    menu.classList.remove('opacity-100');
    menu.classList.remove('top-[70px]');
    menu.classList.add('opacity-0');
    icon.name = 'menu-outline';
}