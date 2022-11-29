const sidebar = document.querySelector('.sidebar');
const navItems = document.querySelectorAll('nav .nav-item');
const toggle = document.querySelector('.toggle');
const footerMobile = document.querySelectorAll('.footer-mobile .nav-item');

toggle.addEventListener('click', () => {

    if(sidebar.className === 'sidebar')
    {
        sidebar.classList.add('open');
        toggle.classList.add('open');
    }
    else
    {
        sidebar.classList.remove('open');
        toggle.classList.remove('open');
    }
});

navItems.forEach(navItem => {
    navItem.addEventListener('click', () => {
        navItems.forEach(navItem => {
            navItem.classList.remove('active');
        })
        navItem.classList.add('active');
    });
});

footerMobile.forEach(navItem => {
    navItem.addEventListener('click', function() {
        footerMobile.forEach(navItem => {
            navItem.classList.remove('active');
        })
        navItem.classList.add('active');
    });
});
