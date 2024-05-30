//Scorrimento immagini first_main_div
const images =
[
    "Immagini/Homepage/latitude1.jpg",
    "Immagini/Homepage/latitude2.png",
    "Immagini/Homepage/latitude3.png",
    "Immagini/Homepage/latitude4.png"
];
let img_index = 0;


document.addEventListener('DOMContentLoaded', (event) => 
{
    setInterval(changeImage, 3000); //Cambia immagine ogni 3 secondi
});

//funzione di scorrimento immagini first_main_div homepage
function changeImage()
{
    const image = document.querySelector("#index_main #first_main_div img");
    if (image) 
    {
        image.src = nextImage();
    }
}

function nextImage()
{
    img_index++;                        //passaggio all'indice successivo

    if(img_index === images.length)     //se l'indice del vettore delle immagini è gia alla fine lo riporta all'inizio
        img_index = 0;
    
    return images[img_index];
}


//Scorrimento fluido sezioni
document.querySelectorAll("#moving_navbar div").forEach(link => 
{
    link.addEventListener('click', function(e) 
    {
        e.preventDefault();
        var targetId = this.getAttribute("data-target");
        var targetSection = document.querySelector(targetId);
        if (targetSection) 
        {
            const offset = 100; // Offset di 100px dal top della sezione
            const sectionTop = targetSection.getBoundingClientRect().top + window.pageYOffset - offset;

            window.scrollTo({
                top: sectionTop,
                behavior: 'smooth'
            });
        }
    });
});


//Modali (Accedi, Contattaci, Carrello)
function onModalClick(event)
{
    let clicked = event.currentTarget;                      //Differenziamo ciò che ha fatto partire l'evento
    
    blur_div.classList.add("blur_background");              //Effetto sfocato sfondo

    if(clicked.id === "accedi")
    {
        modale_accedi.classList.remove("hidden");           //Fa apparire la finestra di login  
        document.body.insertBefore(blur_div, modale_accedi);
        document.body.classList.add("no_scroll");               //Disattiva lo scroll della pagina
    }
    else if(clicked.id === "contattaci")
    {
        modale_contattaci.classList.remove("hidden");       //Fa apparire la finestra contattaci 
        document.body.insertBefore(blur_div, modale_contattaci);
        document.body.classList.add("no_scroll");               //Disattiva lo scroll della pagina
    }
    else if(clicked.id === "carrello")
    {
        modale_carrello.classList.remove("hidden");         //Fa apparire la finestra del carrello  
        document.body.insertBefore(blur_div, modale_carrello);
    }
    else if(clicked.id === "cambia_accedi")
    {
        login_form.classList.remove("hidden");
        register_form.classList.add("hidden");
        cambia_accedi.classList.add("hidden");  
        cambia_registrati.classList.remove("hidden");  
        document.body.classList.add("no_scroll");               //Disattiva lo scroll della pagina     
    }
    else if(clicked.id === "cambia_registrati")
    {
        login_form.classList.add("hidden");
        register_form.classList.remove("hidden");
        cambia_accedi.classList.remove("hidden");
        cambia_registrati.classList.add("hidden");  
        document.body.classList.add("no_scroll");               //Disattiva lo scroll della pagina       
    }
}

function onChiudiClick(event)
{
    let clicked = event.currentTarget;                      //Differenziamo ciò che ha fatto partire l'evento

    if(clicked.id === "chiudi_accedi" || clicked.id === "chiudi_registrati")
    {
        modale_accedi.classList.add("hidden");            //Nasconde la finestra di login/registrati
    }
    else if(clicked.id === "chiudi_contattaci")
    {
        modale_contattaci.classList.add("hidden");            //Nasconde la finestra contattaci
    }
    else if(clicked.id === "chiudi_carrello")
    {
        modale_carrello.classList.add("hidden");            //Nasconde la finestra del carrello
    }

    document.body.classList.remove("no_scroll");            //Riattiva lo scroll della pagina

    //Rimozione effetto sfocato
    blur_div.remove();
}


//lower navbar sub-sections
function lower_navbar_sub(event)
{
    let element = event.currentTarget;

    let subDiv = element.querySelector("div");  //Sotto-menu del flex.item*/

    switch(element.dataset.nav_category)    //In base all'attributo data riguardo la categoria fa comparire elementi diversi
    {
        case "apex":
        {
            if(event.type === 'mouseenter')
                subDiv.classList.remove("hidden");   //Fa apparire il sottomenu relativo alla sezione apex
            else
                subDiv.classList.add("hidden");      //Nasconde il sottomenu

            break;
        }

        case "infrastruttura":
        {
            if(event.type === 'mouseenter')
                subDiv.classList.remove("hidden");   //Fa apparire il sottomenu relativo alla sezione apex
            else
                subDiv.classList.add("hidden");      //Nasconde il sottomenu

            break;
        }

        case "computeraccessori":
        {
            if(event.type === 'mouseenter')
                subDiv.classList.remove("hidden");   //Fa apparire il sottomenu relativo alla sezione apex
            else
                subDiv.classList.add("hidden");      //Nasconde il sottomenu
            break;
        }

        case "servizi":
        {
            if(event.type === 'mouseenter')
                subDiv.classList.remove("hidden");   //Fa apparire il sottomenu relativo alla sezione apex
            else
                subDiv.classList.add("hidden");      //Nasconde il sottomenu
            break;
        }

        case "supporto":
        {
            if(event.type === 'mouseenter')
                subDiv.classList.remove("hidden");   //Fa apparire il sottomenu relativo alla sezione apex
            else
                subDiv.classList.add("hidden");      //Nasconde il sottomenu
            break;
        }

        case "offerte":
        {
            if(event.type === 'mouseenter')
                subDiv.classList.remove("hidden");   //Fa apparire il sottomenu relativo alla sezione apex
            else
                subDiv.classList.add("hidden");      //Nasconde il sottomenu
            break;
        }
    }
}


//navbar fissa
function fixed_navbar() 
{
    if(navbar)
    {
        if (window.scrollY >= sticky)
            navbar.classList.add("fixed");
        else 
            navbar.classList.remove("fixed"); 
    }
     
}


//PayPal REST API
async function createOrder(intent) 
{
    // Funzione per ottenere il token di accesso OAuth2
    async function getAccessToken() 
    {
        const auth = `${client_id}:${client_secret}`;
        const data = 'grant_type=client_credentials';
        const response = await fetch(`${endpoint_url}/v1/oauth2/token`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `Basic ${btoa(auth)}`
            },
            body: data
        });
        const json = await response.json();
        return json.access_token;
    }

    const access_token = await getAccessToken();
    

    let subtotale_str = subtotale.toString();

    const order_data = 
    {
        intent: intent.toUpperCase(),
        purchase_units: 
        [{
            amount: 
            {
                currency_code: 'EUR',
                value: subtotale_str
            }
        }]
    };

    const response = await fetch(`${endpoint_url}/v2/checkout/orders`, 
    {
        method: 'POST',
        headers: 
        {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${access_token}`
        },
        body: JSON.stringify(order_data)
    });

    const responseData = await response.json();
    
    // Controlla se l'ordine è stato approvato
    if (responseData.status === 'APPROVED')
    {
        const completedOrderData = await completeOrder(responseData.id, 'capture');
        console.log('Ordine completato:', completedOrderData);
    }
    else
        window.location.href = responseData.links.find(link => link.rel === 'approve').href;
}

// Funzione per completare un ordine utilizzando l'API di PayPal
async function completeOrder(order_id, intent) 
{
    // Funzione per ottenere il token di accesso OAuth2
    async function getAccessToken() 
    {
        const auth = `${client_id}:${client_secret}`;
        const data = 'grant_type=client_credentials';
        const response = await fetch(`${endpoint_url}/v1/oauth2/token`, {
            method: 'POST',
            headers: 
            {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `Basic ${btoa(auth)}`
            },
            body: data
        });
        const json = await response.json();
        return json.access_token;
    }

    const access_token = await getAccessToken();
    const response = await fetch(`${endpoint_url}/v2/checkout/orders/${order_id}/${intent}`, 
    {
        method: 'POST',
        headers: 
        {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${access_token}`
        }
    });

    return response.json();
}

//Email validation API
//registrazione
function regFormValidate(event)
{      
    event.preventDefault(); //Impediamo il submit del form per evitare che l'asincronità della fetch faccia effettuare la submit del form senza i controlli

    let email = document.querySelector("#register #email").value;
    let username = document.querySelector("#register #username").value;
    let password = document.querySelector("#register #password").value;

    if(email === "" || username === "" || password === "")
        alert("(!) Compila tutti i campi");
    else
    {
        // Effettua la verifica se è presente il carattere '@'
        let atIndex = email.indexOf('@');

        // Estrapola il dominio dalla parte dell'email che segue '@'
        let domain = email.substring(atIndex + 1);

        //API validazione dominio
        fetch("https://api.mailcheck.ai/domain/" + domain)
            .then(response => 
            {
                if (!response.ok) {
                    throw new Error('Errore nella richiesta API: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => 
            {
                console.log("Risposta API:", data);

                //Controlli validità        Esempio dominio usa e getta: "tempmail.it"
                if(!data.mx || data.disposable) 
                {
                    console.log("(!) Validazione email: L'email non è valida.");
                    alert("(!) Email non valida (non usare email usa e getta)");
                }  
                else 
                {              
                    //controllo username
                    if(username.length > 12)
                        alert("(!) Username non valido (Deve essere di massimo 12 caratteri)")
                    else
                    {
                        //controllo password
                        if(password.length < 8 || !numberCheck(password))
                            alert("(!) La password non è valida (Almeno 8 caratteri e un numero)");
                        else
                        {
                            var regConfirm = confirm("Procedere alla registrazione?");
                            if(regConfirm)
                            {
                                regForm.submit(); //controlli superati con successo, quindi submit del form
                            };
                        }    
                    } 
                }                              
            })
            .catch(error => 
            {
                console.error('Si è verificato un errore:', error);
            });
    } 
}

//funzione di controllo della presenza di almeno un numero nella password
function numberCheck(password)
{
    for (let i = 0; i < password.length; i++) 
    {
        if (password[i] >= '0' && password[i] <= '9') 
            return true;
    }
    return false;
}

function loginFormValidate(event)
{
    event.preventDefault(); //Impediamo il submit del form per evitare che l'asincronità della fetch faccia effettuare la submit del form senza i controlli

    let email = document.querySelector("#login #email").value;
    let password = document.querySelector("#login #password").value;

    if(email === "" || password === "")
        alert("(!) Compila tutti i campi");
    else
    {  
        loginForm.submit();  //controlli superati con successo, quindi submit del form
    }       
}

function logoutEvent()
{
    var logoutConfirm = confirm("Uscire dall'account?");
    if(logoutConfirm)
    {
         window.location.href = "logout.php";    //Va a logout.php per uscire dalla sessione corrente
    }
}





//Modali (Accedi, Contattaci, Carrello)
const modale_accedi = document.querySelector("#modale_accedi");
const cambia_accedi = document.querySelector("#domanda_accedi");
const cambia_registrati = document.querySelector("#domanda_registrati");
const login_form = document.querySelector("#login");
const register_form = document.querySelector("#register");

const modale_contattaci = document.querySelector("#modale_contattaci");
const modale_carrello = document.querySelector("#modale_carrello");


document.addEventListener('DOMContentLoaded', function() 
{
    const accedi = document.querySelector("#accedi");   //aggancia un event listener solo se esiste l'elemento nella pagina
    if(accedi)
        accedi.addEventListener('click', onModalClick);
});

const cambia_accedi_button = document.querySelector("#cambia_accedi");
const cambia_registrati_button = document.querySelector("#cambia_registrati");

const contattaci = document.querySelector("#contattaci");
const carrello = document.querySelector("#carrello");

const chiudi_button_accedi = document.querySelector("#chiudi_accedi");
const chiudi_button_registrati = document.querySelector("#chiudi_registrati");
const chiudi_button_contattaci = document.querySelector("#chiudi_contattaci");
const chiudi_button_carrello = document.querySelector("#chiudi_carrello");

const blur_div = document.createElement("div");                                     //div per sfondo sfocato

cambia_accedi_button.addEventListener('click', onModalClick);
cambia_registrati_button.addEventListener('click', onModalClick);

contattaci.addEventListener('click', onModalClick);
carrello.addEventListener('click', onModalClick);

chiudi_button_accedi.addEventListener('click', onChiudiClick); 
chiudi_button_registrati.addEventListener('click', onChiudiClick); 
chiudi_button_contattaci.addEventListener('click', onChiudiClick); 
if(chiudi_button_carrello)
        chiudi_button_carrello.addEventListener('click', onChiudiClick);



//lower navbar sub-sections
const lowerNav_flexItem = document.querySelectorAll(".lower_navbar .flex-item"); 

for(let element of lowerNav_flexItem)                                              //Assegnazione di EventListener a ogni flex-item
{
    element.addEventListener('mouseenter', lower_navbar_sub);                      //Evento entrata mouse
    element.addEventListener('mouseleave', lower_navbar_sub);                      //Evento uscita mouse
}


//navbar fissa
window.addEventListener('scroll', fixed_navbar);

const navbar = document.querySelector("#moving_navbar");
let sticky;
if(navbar)
{
    sticky = navbar.offsetTop;
}
    


//PayPal REST API   https://developer.paypal.com/docs/api/payments/v2/

/*
CREDENZIALI PAYPAL SANDBOX
Email: sb-lip5330517516@personal.example.com
Password: nCSG>G3z
*/

//Variabili d'accesso 
const endpoint_url = 'https://api-m.sandbox.paypal.com'; // URL dell'endpoint di PayPal (sandbox)
const client_id = 'AYbELRRNR1eM0SfyYsSNBz_UaE0PgT_N_-JlFeLVCQSEAAKnIpMdI4ehEPOPELIANiPjXFHrJcsuYjG9';
const client_secret = 'EFi-ikrga6RnjrsqMHsCf1jsk3aX-uUxUHyQa-JBbjX2NypNiXo7R3c3AZK1MS35p7f80mDc6UcFsM5C'; 

document.addEventListener('DOMContentLoaded', function() 
{
    const pay_button = document.querySelector("#modale_carrello .blue_button"); //aggancia un event listener solo se esiste l'elemento nella pagina
    if (pay_button)
    {
        pay_button.addEventListener('click', async function()
        {
            try 
            {
                const orderData = await createOrder('capture');
                console.log('Ordine creato:', orderData);
                
            } 
            catch (error) 
            {
                console.error('Errore:', error);
            }
        });
    }
});


//Email validation API      https://docs.mailcheck.ai/
//Registrazione utente
const regForm = document.querySelector("#modale_accedi #register");
regForm.addEventListener('submit', regFormValidate);


//Login utente
const loginForm = document.querySelector("#modale_accedi #login");
loginForm.addEventListener('submit', loginFormValidate);


//logout utente
document.addEventListener('DOMContentLoaded', function() 
{
    const logout = document.querySelector("#logout");
    if (logout) 
    {
        logout.addEventListener('click', logoutEvent);  //aggancia un event listener solo se esiste l'elemento nella pagina
    }
});




// Funzione per caricare i prodotti
async function caricaProdotti() 
{
    try 
    {
        const response = await fetch('prodotti.php');
        const prodotti = await response.json();
        
        //Prendiamo i div delle sezioni dello shop
        const notebook_div = document.querySelector('#notebook .flex-container-shop');
        const desktop_div = document.querySelector('#desktop .flex-container-shop');
        const workstation_div = document.querySelector('#workstation .flex-container-shop');
        const server_div = document.querySelector('#server .flex-container-shop');
        const monitor_div = document.querySelector('#monitor .flex-container-shop');

        //Le svuotiamo per aggiornarle
        if(notebook_div && desktop_div && workstation_div && server_div && monitor_div)
        {
            notebook_div.innerHTML = '';  
            desktop_div.innerHTML = '';   
            workstation_div.innerHTML = ''; 
            server_div.innerHTML = '';      
            monitor_div.innerHTML = '';
        
                                        

            prodotti.forEach(prodotto => 
            {
                const prodottoDiv = document.createElement('div');
                prodottoDiv.classList.add('flex-container-shop_flex-item');   //associazione classe css

                prodottoDiv.innerHTML = `
                    <h2>${prodotto.nome}</h2>
                    <a href="${prodotto.dettagli_url}">
                        <img src="${prodotto.immagine_url}">
                    </a>
                    <h3>Prezzo: €${prodotto.prezzo}</h3>
                    <button class="blue_button" onclick="aggiungiProdotto(${prodotto.id})">Aggiungi al Carrello</button>
                `;

                //In base alla categoria del prodotto lo aggiungiamo nel div opportuno
                switch(prodotto.categoria)
                {
                    case "notebook":
                        notebook_div.appendChild(prodottoDiv);
                        break;

                    case "desktop":
                        desktop_div.appendChild(prodottoDiv);
                        break;

                    case "workstation":
                        workstation_div.appendChild(prodottoDiv);
                        break;

                    case "server":
                        server_div.appendChild(prodottoDiv);
                        break;

                    case "monitor":
                        monitor_div.appendChild(prodottoDiv);
                        break;
                }           
            });
        } 
        
    }
    catch(error) 
    {
        console.error('Errore nel caricamento dei prodotti:', error);
    }
}

// Carica i prodotti quando la pagina viene caricata
window.onload = caricaProdotti;


let subtotale;   //Subtotale del carrello (variabile globale)

// Stampa carrello
function onJSON(response)
{   
    response.text().then(text => 
    {
        let json;
        try 
        {
            json = JSON.parse(text);
        } 
        catch(e) 
        {
            console.error("Errore nel parsing del JSON:", e);
            return;
        }

        let carrello_sessione = document.querySelector("#carrello_sessione");
        let lista = document.createElement("ul");
        carrello_sessione.innerHTML = '';
        carrello_sessione.appendChild(lista);

        //Azzeriamo il totale del carrello prima dell'aggiornamento
        subtotale = 0;

        for(prodotto of json)
        {
            let li = document.createElement("li");
            let prodottoDiv = document.createElement("div");

            let immagine = document.createElement("img");
            immagine.src = prodotto.immagine_url;

            let nome = document.createElement("h3");
            nome.textContent = prodotto.nome;

            let quantita = document.createElement("h3");
            quantita.textContent = "Quantità: " + prodotto.quantita;

            let prezzo = document.createElement("h3");
            let prezzoTot = parseFloat(prodotto.prezzo) * prodotto.quantita;
            prezzo.textContent = "€" + prezzoTot;                                       //Si deve vedere il prezzo totale considerando la quantità

            subtotale += prezzoTot;                                                     //Incrementiamo il subtotale per ogni prodotto
            
            let aggiungi = document.createElement("button");
            aggiungi.textContent = "Aggiungi 1";
            aggiungi.classList.add("white_button");

            // Cattura il valore corrente di 'prodotto' in una variabile locale
            let prodottoCorrente = prodotto;

            aggiungi.addEventListener("click", function() 
            {
                aggiungiProdotto(prodottoCorrente.id);
            });

            let rimuovi = document.createElement("button");
            rimuovi.textContent = "Rimuovi 1";
            rimuovi.classList.add("red_button");
            rimuovi.dataset.id_prodotto = prodotto.id;
            rimuovi.addEventListener("click", rimuoviProdotto);

            li.appendChild(prodottoDiv);
            prodottoDiv.appendChild(immagine);
            prodottoDiv.appendChild(nome);
            prodottoDiv.appendChild(quantita);
            prodottoDiv.appendChild(prezzo);
            prodottoDiv.appendChild(aggiungi);
            prodottoDiv.appendChild(rimuovi);
            lista.appendChild(li);
        }

        let buttonDiv1 = document.createElement("div");
        let button1 = document.createElement("button");

        let subtotale_h3 = document.createElement("h3");
        subtotale_h3.id = "subtotale";                    
        subtotale_h3.textContent = "Subtotale: €" + subtotale;
        
        //Se il carrello è vuoto disabilita il button
        if(json.length === 0)
            button1.classList.add("disabled");
        else   
            button1.classList.add("blue_button");

        button1.textContent = "Procedi all'ordine";
        buttonDiv1.appendChild(subtotale_h3);
        buttonDiv1.appendChild(button1);

        let buttonDiv2 = document.createElement("div");
        let button2 = document.createElement("button");
        button2.classList.add("white_button");
        button2.textContent = "Chiudi carrello";
        button2.id = "chiudi_carrello";
        buttonDiv2.appendChild(button2);
        

        lista.appendChild(buttonDiv1);
        lista.appendChild(buttonDiv2);

        //funzione per associare i nuovi button (necessario causa DOM caricato dopo)
        associaEventi();

    })
}

//carica il carrello dopo che il DOM è stato caricato 
document.addEventListener("DOMContentLoaded", function() 
{
    aggiornaCarrello();
});


//funzione per associare gli eventi ai button creati da DOM
function associaEventi() 
{
    //associo la funzione per l'api di paypal al nuovo button
    let pay_button_session = document.querySelector("#carrello_sessione .blue_button");
    if (pay_button_session)
    {
        console.log("Associando evento a #proceed_order");
        pay_button_session.addEventListener('click', async function() {
            try {
                const orderData = await createOrder('capture');
                console.log('Ordine creato:', orderData);
            } catch (error) {
                console.error('Errore:', error);
            }
        });
    }

    //associo la funzione per chiudere il carrello al nuovo button
    let chiudi_carrello_session = document.querySelector("#chiudi_carrello");
    if (chiudi_carrello_session) 
    {
        chiudi_carrello_session.addEventListener('click', onChiudiClick);
    } 
}


function aggiornaCarrello()
{
    fetch("http://localhost/hw1/getCart.php")
    .then(onJSON)
    .catch(error => console.error("Fallimento nel caricamento del carrello:", error));
}

function aggiungiProdotto(id)
{
    fetch("http://localhost/hw1/addCart.php?id_prodotto=" + id)
    .then(aggiornaCarrello)
    .then(mostraPopup_addCart);
}

//Popup prodotto aggiunto
function mostraPopup_addCart() 
{
    var popup = document.querySelector("#popup_addCart");
    popup.style.display = "block";
    setTimeout(function() 
    {
        popup.style.display = "none";
    }, 2000); 
}

function rimuoviProdotto(event)
{
    const removeID = event.currentTarget.dataset.id_prodotto;

    fetch("http://localhost/hw1/removeCart.php?id_prodotto=" + removeID)
    .then(response => response.text())  // Modifica qui per ottenere prima il testo
    .then(text => 
    {
        try 
        {
            const data = JSON.parse(text); // Prova a fare il parse del testo come JSON
            console.log('Server response:', data);
            if (data.status === 'success') {
                aggiornaCarrello();
            } else {
                alert(data.message);
            }
        } 
        catch (error) 
        {
            console.error(`Parsing error: ${error}`);
            alert('Errore nella risposta del server: non è un JSON valido.');
        }
    })
    .catch(error => 
    {
        console.error(`Fetch error: ${error}`);
        alert('Errore nella richiesta al server.');
    });
}


// Caricamento dinamico immagini siti info

// Carica le immagini quando il contenuto della pagina è pronto
document.addEventListener('DOMContentLoaded', () => 
{
    const page = getPageFromUrl();
    loadImages(page);
});

// Funzione per ottenere il parametro 'page' dall'URL
function getPageFromUrl()
{
    const params = new URLSearchParams(window.location.search);
    return params.get('page');
}

// Funzione per caricare le immagini
async function loadImages(page) 
{
    try 
    {
        // Richiede le immagini dal file PHP
        const response = await fetch("imageLoader.php?page="+ page);
        const data = await response.json();
        
        // Prendo i div per caricare le immagini
        const imageDivs = document.querySelectorAll('#'+ page +' .img_div');             
        
        // Aggiungi ogni immagine ai div
        imageDivs.forEach((div, index) => 
        {
            div.innerHTML = '';

            // Controlla se esiste un URL per l'indice corrente
            if(data.imageUrls[index]) 
            {
                const img = document.createElement('img');
                img.src = data.imageUrls[index];
                div.appendChild(img);                       // Aggiungi l'immagine al div
            }
        });
    } 
    catch (error) 
    {
        console.error('Errore nel caricamento delle immagini:', error);
    }
}




