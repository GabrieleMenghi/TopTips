const sidebar = document.querySelector('.sidebar');
const toggle = document.querySelector('.toggle');

const postimages = document.querySelectorAll('.imgpost');
const labelimages = document.querySelectorAll('article label');

const activePage = window.location.pathname;
const pagebuttons = document.querySelectorAll('.pagebutton');
const homebutton = document.querySelector('.pagebuttonhome');

pagebuttons.forEach(b => {
    if(b.href.includes(`${activePage}`) && activePage != "/TopTips/"){
        b.classList.add('active');
    } else if(activePage == "/TopTips/"){
        homebutton.classList.add('active');
    }
})

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
    if(img.classList.contains('notvoteable')){
        labelimages.forEach(l => {
            if(img.getAttribute('id') == l.getAttribute('for') && l.getAttribute('for') != "imgpost"){   
                if(l.getAttribute('voted')==='yes'){
                    l.setAttribute('style','display: inline; margin-left: -10px; font-weight: bold;');
                } else {            
                    l.setAttribute('style','display: inline; margin-left: -10px');
                }
            }
        })
    }
})

postimages.forEach(img => {
    img.addEventListener('dblclick', () => {
        if(!img.classList.contains('notvoteable') && img.getAttribute('profilenumber') != 0) {
            img.classList.add('notvoteable');
            //Disabilitazione tramite database della possibilità di votare un post già votato
            let xhttp = new XMLHttpRequest();
            let parameters = "post=" + img.getAttribute('postnumber') + "&profilo=" + img.getAttribute('profilenumber') + "&immaginevotata=" + (img.getAttribute('id')).substring(7);
            
            xhttp.open("POST", "utils/aggiungi-voto.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(parameters);
            
            //Incremento voto su database
            let xhttpinc = new XMLHttpRequest();
            let parametersinc = "immagine=" + img.id.substring(7)+ "&post=" + img.getAttribute('postnumber');
            
            xhttpinc.open("POST", "utils/incremento-voti.php", true);
            xhttpinc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttpinc.send(parametersinc);

            //Aggiunta notifica su database
            let xhttpnot = new XMLHttpRequest();
            let parametersnot = "tiponotifica=votazione&utentenotificante=" + img.getAttribute('profilenumber') + "&utentenotificato=" + img.getAttribute('owner') + "&idpost=" + img.getAttribute('postnumber');
            
            xhttpnot.open("POST", "utils/inserisci-notifica.php", true);
            xhttpnot.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttpnot.send(parametersnot);

            //Aggiornamento delle label
            labelimages.forEach(l => {
                if(img.getAttribute('id') == l.getAttribute('for')){
                    l.setAttribute('style','display: inline; margin-left: -10px; font-weight: bold;');
                    postimages.forEach(img2 => {
                        if(img2.getAttribute('postnumber') == img.getAttribute('postnumber')){
                            img2.classList.add('notvoteable');
                            labelimages.forEach(l2 => {
                                if(l2.getAttribute('for') == img2.getAttribute('id')){
                                    l2.setAttribute('style','display: inline; margin-left: -10px;');
                                }
                            })
                        }
                        document.location.reload(true);
                    })
                }
            });
        }
    });
})

//Check numero di file nella creazione di un post
const imgpicker = document.querySelector('#imagepicker');
const submit = document.querySelector('.submitpost');

if(imgpicker != null){
    imgpicker.addEventListener('change', (e) => {
        const files = imgpicker.files;

        if (files.length < 2) {
            submit.setAttribute('disabled', 'true');
            return;
        } else if (files.length > 4) {
            submit.setAttribute('disabled', 'true');
            return;
        } else {
            submit.removeAttribute('disabled');
        }
    });
}

//Controllo e impongo che un nuovo utente inserisca un immagine: solo così può salvare il suo profilo
const input = document.getElementById('imgprofilo');
const salvaprofilo = document.getElementById('salvaprofilo');

if(input != null){
    input.addEventListener('change', (e) => {
        const f = input.files;
        
        if (f.length > 0) {
        salvaprofilo.removeAttribute('disabled');
        } else {
        salvaprofilo.setAttribute('disabled', 'true');
        }
    });
}