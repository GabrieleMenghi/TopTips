const sidebar = document.querySelector('.sidebar');
const toggle = document.querySelector('.toggle');

const postimages = document.querySelectorAll('.imgpost');
const labelimages = document.querySelectorAll('article > label');

const activePage = window.location.pathname;
const pagebuttons = document.querySelectorAll('.pagebutton');

pagebuttons.forEach(b => {
    if(b.href.includes(`${activePage}`)){
        b.classList.add('active');
    }
});

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