const sidebar = document.querySelector('.sidebar');
const toggle = document.querySelector('.toggle');

const postimages = document.querySelectorAll('.imgpost');
const labelimages = document.querySelectorAll('article > label');

const activePage = window.location.pathname;
const pagebuttons = document.querySelectorAll('.pagebutton');
const homebutton = document.querySelector('.pagebuttonhome');

pagebuttons.forEach(b => {
    if(b.href.includes(`${activePage}`) && activePage != "/TopTips/"){
        b.classList.add('active');
    } else if(activePage == "/TopTips/"){
        homebutton.classList.add('active');
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

//Check numero di file nella creazione di un post
const imgpicker = document.querySelector('#imagepicker');
const submit = document.querySelector('.submitpost');
const messages = document.querySelector('.postcreationmessages');

imgpicker.addEventListener('change', (e) => {
    const files = imgpicker.files;

    if (files.length < 2) {
        submit.setAttribute('disabled', 'true');
        messages.innerHTML="Inserire almeno 2 file";
        return;
    } else if (files.length > 4) {
        submit.setAttribute('disabled', 'true');
        messages.innerHTML="Inserire massimo 4 file";
        return;
    } else {
        submit.removeAttribute('disabled');
        messages.innerHTML="";
    }
});