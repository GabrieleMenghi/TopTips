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
    if(img.classList.contains('notvoteable')){
        labelimages.forEach(l => {
            if(img.getAttribute('id') == l.getAttribute('for') && l.getAttribute('for') != "imgpost"){                
                l.setAttribute('style','display: inline');
            }
        })
    }
})

postimages.forEach(img => {
    img.addEventListener('dblclick', () => {
        if(!img.classList.contains('notvoteable')) {
            img.classList.add('notvoteable');
            //Disabilitazione tramite database della possibilità di votare un post già votato
            var xhttp = new XMLHttpRequest();
            let parameters = "post=" + img.getAttribute('postnumber') + "&profilo=" + img.getAttribute('profilenumber');
            
            xhttp.open("POST", "aggiungi-voto.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(parameters);
            
            //Incremento voto su database
            var xhttpinc = new XMLHttpRequest();
            let parametersinc = "immagine=" + img.id.substring(7)+ "&post=" + img.getAttribute('postnumber');
            
            xhttpinc.open("POST", "incremento-voti.php", true);
            xhttpinc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttpinc.send(parametersinc);

            //Aggiornamento delle label
            labelimages.forEach(l => {
                if(img.getAttribute('id') == l.getAttribute('for')){
                    l.setAttribute('style','display: inline');
                    postimages.forEach(img2 => {
                        if(img2.getAttribute('postnumber') == img.getAttribute('postnumber')){
                            img2.classList.add('notvoteable');
                            labelimages.forEach(l2 => {
                                if(l2.getAttribute('for') == img2.getAttribute('id')){
                                    l2.setAttribute('style','display: inline');
                                }
                            })
                        }
                        window.location.reload();
                    })
                }
            });
        }
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