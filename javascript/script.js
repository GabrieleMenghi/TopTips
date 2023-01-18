const sidebar = document.querySelector('.sidebar');
const navItems = document.querySelectorAll('nav .nav-item');
const toggle = document.querySelector('.toggle');
const footerMobile = document.querySelectorAll('.footer-mobile .nav-item');

const homeIcon = document.querySelectorAll('.i-home');
const bellIcon = document.querySelectorAll('.i-bell');
const postIcon = document.querySelectorAll('.i-post');
const userIcon = document.querySelectorAll('.i-user');

const bell = document.querySelector('.notification .i-bell');

const postimages = document.querySelectorAll('.imgpost');
const labelimages = document.querySelectorAll('article > label');

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

postimages.forEach(img => {
    img.addEventListener('click', () => {
        postimages.forEach(img2 => {
            if(img2.classList.contains('clicked') && img != img2){
                img2.classList.remove('clicked');
            }
        })
        if(!img.classList.contains('clicked')){
            img.classList.add('clicked');
        } else {
            img.classList.remove('clicked');
        }
    });
})

postimages.forEach(img => {
    img.addEventListener('mousedown', () => {
        postimages.forEach(img2 => {
            img2.setAttribute('style', 'width: 25%');
        })
        img.setAttribute('style', 'width: 60%; transition: .5s');
    });
    img.addEventListener('mouseup', () => {
        img.setAttribute('style', 'width: 25%; transition: .3s');
    });
})

postimages.forEach(img => {
    img.addEventListener('dblclick', () => {
        labelimages.forEach(l => {
            if(img.getAttribute('id') == l.getAttribute('for')){
                let votes = parseInt(l.innerHTML);
                votes = votes + 1;
                l.innerHTML = votes;
                l.setAttribute('style','display: inline');
            }
        });
    });
})