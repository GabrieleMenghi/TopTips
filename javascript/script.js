const sidebar = document.querySelector('.sidebar');
const navItems = document.querySelectorAll('nav .nav-item');
const toggle = document.querySelector('.toggle');
const footerMobile = document.querySelectorAll('.footer-mobile .nav-item');

const homeIcon = document.querySelectorAll('.i-home');
const bellIcon = document.querySelectorAll('.i-bell');
const postIcon = document.querySelectorAll('.i-post');
const userIcon = document.querySelectorAll('.i-user');

const bell = document.querySelector('.notification .i-bell');

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


//Cambio pagina in versione desktop
navItems.forEach(navItem => {
    navItem.addEventListener('click', () => {
        navItems.forEach(navItem => {
            navItem.classList.remove('active');
        })
        footerMobile.forEach(navItem => {
            navItem.classList.remove('active');
        })
        bellIcon.forEach(icon => {
            icon.classList.remove('active');
        });
        if(navItem.classList.contains('i-bell')){
            bellIcon.forEach(icon => {
                icon.classList.add('active');
            });
        } else if(navItem.classList.contains('i-post')){
            postIcon.forEach(icon => {
                icon.classList.add('active');
            });
        } else if(navItem.classList.contains('i-user')){
            userIcon.forEach(icon => {
                icon.classList.add('active');
            });
        } else if(navItem.classList.contains('i-home')){
            homeIcon.forEach(icon => {
                icon.classList.add('active');
            });
        }
    });
});

//Cambio pagina in versione mobile
footerMobile.forEach(navItem => {
    navItem.addEventListener('click', function() {
        footerMobile.forEach(navItem => {
            navItem.classList.remove('active');
        })
        navItems.forEach(navItem => {
            navItem.classList.remove('active');
        })
        bellIcon.forEach(icon => {
            icon.classList.remove('active');
        });
        if(navItem.classList.contains('i-post')){
            postIcon.forEach(icon => {
                icon.classList.add('active');
            });
        } else if(navItem.classList.contains('i-user')){
            userIcon.forEach(icon => {
                icon.classList.add('active');
            });
        } else if(navItem.classList.contains('i-home')){
            homeIcon.forEach(icon => {
                icon.classList.add('active');
            });
        }
    });
});

bell.addEventListener('click', () => {
    footerMobile.forEach(navItem => {
        navItem.classList.remove('active');
    })
    navItems.forEach(navItem => {
        navItem.classList.remove('active');
    })
    bellIcon.forEach(icon => {
        icon.classList.add('active');
    });
});