<?php
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " .mysqli_connect_error());

    session_start();

    // Verifica se la sessione per l'utente è attiva
    $sessioneAttiva = isset($_SESSION["username"]);
?>

<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <script src="index.js" defer></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khojki&display=swap" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dell - Sito Ufficiale</title>
    </head>

    <body>
        <!-- MODALI -->
        <section class="hidden" id="modale_accedi">
            <div class="left">
                <form id="login" action="login.php" method="post">
                    <h1>ACCEDI</h1>               
                    <h3>Email</h3>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Inserisci la tua email">
                    <h3>Password</h3>
                    <i class="fa-solid fa-lock"></i>   
                    <input type="password" id="password" name="password" placeholder="Inserisci la tua password">
                    <div><button type="submit" class="blue_button">Accedi</button></div>
                    <div><button type="button" id="chiudi_accedi" class="white_button">Chiudi</button></div>            
                </form>

                <form id="register" class="hidden" action="registrazione.php" method="post">
                    <h1>REGISTRATI</h1>
                    <h3>Email</h3>  
                    <i class="fa-solid fa-envelope"></i>             
                    <input type="email" id="email" name="email" placeholder="Inserisci la tua email">
                    <h3>Username</h3>
                    <i class="fa-solid fa-user"></i>
                    <input type="name" id="username" name="username" placeholder="Inserisci un username">
                    <h3>Password</h3>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Conferma la tua password">   
                    <div><button type="submit" class="blue_button">Registrati</button></div>
                    <div><button type="button" id="chiudi_registrati" class="white_button">Chiudi</button></div>          
                </form>   
            </div>

            <div class="right">
                <span id="domanda_accedi" class="hidden">
                    <h2>Hai gia un account?</h2>
                    <button id="cambia_accedi" class="white_button">Accedi</button>
                </span>
                <span id="domanda_registrati">
                    <h2>Non hai ancora un account?</h2>
                    <button id="cambia_registrati" class="white_button">Crea un account</button>
                </span> 
            </div>
        </section>

        <section class="hidden" id="modale_contattaci">
            <div>
                <h1>Contatti</h1>               
                <h2>Email</h2>
                <h3>email@support.it</h3>
                <h2>Telefono</h2>
                <h3>800 547 123</h3>
                <div><button id="chiudi_contattaci" class="white_button">Chiudi</button></div>     
            </div>
        </section>

        <section class="hidden" id="modale_carrello">
            <?php if(!$sessioneAttiva): ?>  
                <div>
                    <h1>Carrello</h1>               
                    <h3>Per utilizzare il carrello devi accedere con un account!</h3>
                    <div><button id="chiudi_carrello" class="white_button">Chiudi</button></div>     
                </div>
            <?php endif; ?>

            <?php if($sessioneAttiva): ?>
                <div id="carrello_sessione">
                    <h1>Carrello</h1>                
                </div>
            <?php endif; ?>
        </section>


        <header>           
            <nav class="upper_navbar">
                <div class="logo">
                    <a href="index.php"><img src="Immagini/Homepage/dell-technologies9952.logowik.com.png" alt=""> </a>                   
                </div>
                <div class="flex-item" id="welcome">
                    <?php if($sessioneAttiva): ?>
                    <b><i><h2>Benvenuto <?php echo $_SESSION["username"]; ?> </h2></i></b>  
                    <?php endif; ?>
                </div>

                <?php if(!$sessioneAttiva): ?>
                <div class="flex-item-right" id="accedi">
                    <h4><i class="fa-solid fa-user"></i> Accedi</h4>
                </div>
                <?php endif; ?>

                <div class="flex-item-right" id="contattaci">
                    <h4><i class="fa-solid fa-circle-info"></i> Contattaci</h4>
                </div>
                <div class="flex-item-right" id="carrello">
                    
                    <h4><i class="fa-solid fa-cart-shopping"></i> Carrello</h4>
                </div>

                <?php if($sessioneAttiva): ?>
                <div class="flex-item-right" id="logout">
                    <h4><i class="fa-solid fa-right-from-bracket"></i> Logout</h4>
                </div>
                <?php endif; ?>
            </nav>
    
            <nav class="lower_navbar">
                <div class="flex-item" data-nav_category="apex">
                    <h4>APEX</h4>
                    <div class="hidden">
                        <h3>APEX Option 1</h3>
                        <h3>APEX Option 2</h3>
                        <h3>APEX Option 3</h3>
                        <h3>APEX Option 4</h3>
                    </div>
                </div>
                <div class="flex-item" data-nav_category="infrastruttura">
                    <h4>Infrastruttura IT</h4>
                    <div class="hidden">
                        <h3>infrastruttura Option 1</h3>
                        <h3>infrastruttura Option 2</h3>
                        <h3>infrastruttura Option 3</h3>
                        <h3>infrastruttura Option 4</h3>
                    </div>
                </div>
                <div class="flex-item" data-nav_category="computeraccessori">
                    <h4>Computer e accessori</h4>
                    <div class="hidden">
                        <h3>computeraccessor Option 1</h3>
                        <h3>computeraccessor Option 2</h3>
                        <h3>computeraccessor Option 3</h3>
                        <h3>computeraccessor Option 4</h3>
                    </div>
                </div>
                <div class="flex-item" data-nav_category="servizi">
                    <h4>Servizi</h4>
                    <div class="hidden">
                        <h3>servizi Option 1</h3>
                        <h3>servizi Option 2</h3>
                        <h3>servizi Option 3</h3>
                        <h3>servizi Option 4</h3>
                    </div>
                </div>
                <div class="flex-item" data-nav_category="supporto">
                    <h4>Supporto</h4>
                    <div class="hidden">
                        <h3>supporto Option 1</h3>
                        <h3>supporto Option 2</h3>
                        <h3>supporto Option 3</h3>
                        <h3>supporto Option 4</h3>
                    </div>
                </div>
                <div class="flex-item" data-nav_category="offerte">
                    <h4>Offerte</h4>
                    <div class="hidden">
                        <h3>offerte Option 1</h3>
                        <h3>offerte Option 2</h3>
                        <h3>offerte Option 3</h3>
                        <h3>offerte Option 4</h3>
                    </div>
                </div>
            </nav>
        </header>

        <nav id="moving_navbar">
            <div class="flex-item" data-target="#first_main_div">
                <h4>Notebook</h4>
            </div>
            <div class="flex-item" data-target="#seventh_main_div">
                <h4>Desktop</h4>
            </div>
            <div class="flex-item" data-target="#fourth_main_div">
                <h4>Workstation</h4>
            </div>
            <div class="flex-item" data-target="#sixth_main_div">
                <h4>Server e storage</h4>
            </div>
            <div class="flex-item" data-target="#innovazione-vincente_main_div">
                <h4>Monitor</h4>
            </div>
        </nav>

        <main id="index_main">
            <div id="first_main_div">
                <div class="left">
                    <p>
                        <h3>NUOVI NOTEBOOK LATITUDE</h3>
                        <h1>Produttività migliorata con l'AI</h1>
                        <h3>Elaborazione di livello superiore con PC AI e processori Intel Core Ultra</h3>
                        <a href="shop.php"><button class="blue_button">Acquista ora</button></a>
                        <a href="latitude5540.php?page=latitude5540"><button class="white_button">Ulteriori informazioni</button></a>
                    </p>
                </div>
                <div class="right">
                    <img src="Immagini/Homepage/latitude1.jpg" alt="">
                </div>
            </div>

            <div id="second_main_div">
                <h1>Scopri Dell Technologies</h1>
                <div id="flex-container">
                    <div class="flex-item">
                        <div class="upper_flex_item">
                            <img id="ai" src="Immagini/Homepage/AI.png" alt="">
                        </div>
                        <div class="lower_flex_item">
                            <h2>Porta l'AI nei tuoi dati</h2>
                        </div>
                    </div>
                    <div class="flex-item">
                        <div class="upper_flex_item">
                            <img id="multicloud" src="Immagini/Homepage/multi-cloud.jpg" alt="">
                        </div>
                        <div class="lower_flex_item">
                            <h2>Passa al multicloud nativo (in inglese)</h2>
                        </div>
                    </div>
                    <div class="flex-item">
                        <div class="upper_flex_item">
                            <img id="tek" src="Immagini/Homepage/dell-technologies-world.jpg" alt="">
                        </div>
                        <div class="lower_flex_item">
                            <h2>I vantaggi per gli ex partecipanti terminano il 31 marzo (in inglese)</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div id="third_main_div">
                <div class="left">
                    <img src="Immagini/Homepage/inspiron-plus-14-16-uma-family-1023x842-white.png" alt="">
                </div>
                <div class="right">
                    <p>
                        <h3>FAMIGLIA INSPIRON</h3>
                        <h1>L'immaginazione prende vita</h1>
                        <h3>Dai spazio alle tue idee con le prestazioni di Inspiron 14 Plus e Inspiron 16 Plus</h3>
                        <a href="shop.php"><span class="info">Acquista ora</span></a><a href="inspiron16.php?page=inspiron16"><span class="info">Ulteriori informazioni</span></a>
                    </p>
                </div>
            </div>

            <div id="fourth_main_div">
                <div class="left">
                    <p>
                        <h3>NUOVE WORKSTATION PRECISION PORTATILI</h3>
                        <h1>Workstation predisposte per l'AI</h1>
                        <h3>Dotate di processori Intel® Core™ Ultra con AI Boost.</h3>
                        <a href="shop.php"><span class="info">Acquista ora</span></a>
                    </p>
                </div>
                <div class="right">
                    <img src="Immagini/Homepage/mobile-workstation-precision-16-5690-1023x842-right.png" alt="">
                </div>
            </div>

            <div id="support_main_div">
                <div class="left">
                    <p>
                        <h1>Dell Support</h1>
                        <h3>Ricevi risposta alle tue domande</h3>
                    </p>
                </div>
                <div class="right">
                    <div>
                        <h2 class="info">Contatta il supporto</h2>
                        <h3>Siamo qui per aiutarti a rispondere alle tue domande per i nostri prodotti e servizi</h3>
                    </div>
                    <div>
                        <h2 class="info">Drivers & Downloads</h2>
                        <h3>Ottieni gli ultimi driver e programmi</h3>
                    </div>
                    <div>
                        <h2 class="info">Supporto prodotti</h2>
                        <h3>Competenza. Convenienza. Supporto di qualità.</h3>
                    </div>
                    <div>
                        <h2 class="info">Garanzie</h2>
                        <h3>Controlla lo stato della garanzia dei tuoi prodotti</h3>
                    </div>
                </div>
            </div>

            <div id="fifth_main_div">
                <div class="left">
                    <img src="Immagini/Homepage/alienware.png" alt="">
                </div>
                <div class="right">
                    <p>
                        <h3>ALIENWARE X16 R2</h3>
                        <h1>FX incredibile dal forte impatto</h1>
                        <h3>La nostra ultima meraviglia offre efficienza ed esperienze basate su AI grazie ai processori Intel® Core™ Ultra.</h3>
                        <a href="shop.php"><span class="info">Acquista ora</span></a>
                    </p>
                </div>
            </div>

            <div id="sixth_main_div">
                <div class="left">
                    <p>
                        <h3>SERVER, STORAGE, RETE</h3>
                        <h1>Soluzioni IT flessibili e scalabili</h1>
                        <h3>Stimola la trasformazione con soluzioni per server, storage e rete che si adattano alle tue esigenze aziendali.</h3>
                        <a href="shop.php"><span class="info">Acquista server e storage</span></a>
                    </p>
                </div>
                <div class="right">
                    <img src="Immagini/Homepage/servers-storage-network.png" alt="">
                </div>
            </div>

            <div id="recycle_main_div">
                <p>
                    <h1>Regala una nuova vita al tuo dispositivo</h1>
                    <h3>Riciclare la tua tecnologia obsoleta ci aiuta a creare soluzioni responsabili per noi tutti.</h3>
                </p>
            </div>

            <div id="seventh_main_div">
                <div class="left">
                    <img src="Immagini/Homepage/optiplex.png" alt="">
                </div>
                <div class="right">
                    <p>
                        <h3>FAMIGLIA DESKTOP OPTIPLEX</h3>
                        <h1>L'intelligenza incontra la semplicità</h1>
                        <h3>Progettati per garantire un'esperienza utente affidabile e gestione semplificata.</h3>
                        <a href="shop.php"><span class="info">Acquista ora</span></a>
                    </p>
                </div>
            </div>

            <div id="eighth_main_div">
                <div class="left">
                    <p>
                        <h3>POWERSTORE</h3>
                        <h1>Il futuro dello storage è qui</h1>
                        <h3>Lo storage intelligente a prova di futuro che ridefinisce le prestazioni.</h3>
                    </p>
                </div>
                <div class="right">
                    <img src="Immagini/Homepage/dell-powerstore.png" alt="">
                </div>
            </div>

            <div id="innovazione-vincente_main_div">
                <div class="left">
                    <h3>L'INNOVAZIONE VINCENTE</h3>
                    <h1>La tecnologia incontra l'innovazione</h1>
                    <h3>Scopri i PC più popolari e molto altro a prezzi incredibili</h3>
                    <img src="Immagini/Homepage/portatile_sinistra.png" alt="">
                </div>
                <div class="right">
                    <h3>L'INNOVAZIONE VINCENTE</h3>
                    <h1>I più amati da tutti</h1>
                    <h3>Acquista i prodotti tecnologici che attirano l'attenzione di tutti.</h3>
                    <img src="Immagini/Homepage/monitor.png" alt="">
                </div>
            </div>

            <div id="cosa-facciamo_main_div">
                <h1>Cosa facciamo</h1>
                <div class="flex-container">
                    <div class="flex-item">
                        <h2>Cosa facciamo</h2>
                        <div>
                            <div class="left">
                                <img src="Immagini/Homepage/box-1.png" alt="">
                            </div>
                            <div class="right">
                                <h3>Soluzioni complete per un domani migliore.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex-item">
                        <h2>Dispositivi sostenibili</h1>
                        <div>
                            <div class="left">
                                <img src="Immagini/Homepage/box-2.png" alt="">
                            </div>
                            <div class="right">
                                <h3>Sviluppiamo soluzioni e prodotti innovativi per un futuro più sostenibile.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-container">
                    <div class="flex-item">
                        <h2>Storie dei clienti</h2>
                        <div>
                            <div class="left">
                                <img src="Immagini/Homepage/box-3.png" alt="">
                            </div>
                            <div class="right">
                                <h3>PhonePe: Accelerare le iniziative di digitalizzazione dell'India grazie al maggiore accesso ai pagamenti digitali. </h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex-item">
                        <h2>Il nostro obiettivo in azione</h2>
                        <div>
                            <div class="left">
                                <img class="img" src="Immagini/Homepage/box-4.jpeg" alt="">
                            </div>
                            <div class="right">
                                <h3 class>Essere fautori di un cambiamento considerevole grazie alla tecnologia, all'espansione globale, alla partnership e ai membri del team che ci contraddistinguono.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer>
            <div class="flex-container_up">
                <div class="flex-item">
                    <h4>Mappa del sito</h4>
                </div>
                <div class="flex-item">
                    <h4>Account</h4>
                    <h4>Il mio account</h4>
                    <h4>Stato dell'ordine</h4>
                    <h4>I miei prodotti</h4>
                </div>
                <div class="flex-item">
                    <h4>Supporto</h4>
                    <h4>Home del supporto</h4>
                    <h4>Contatta il supporto tecnico</h4>
                </div>
                <div class="flex-item">
                    <h4>Seguici</h4>
                    <h4>Comunità</h4>
                    <h4>Contattateci</h4>
                </div>
            </div>
            <div class="flex-container_down">
                <div class="flex-item">
                    <h4>La nostra offerta</h4>
                    <h4>APEX</h4>
                    <h4>Prodotti</h4>
                    <h4>Soluzioni</h4>
                    <h4>Servizi</h4>
                    <h4>Offerte</h4>
                </div>
                <div class="flex-item">
                    <h4>La nostra azienda</h4>
                    <h4>Chi siamo</h4>
                    <h4>Opportunità di lavoro</h4>
                    <h4>Dell Technologies Capital</h4>
                    <h4>Investitori</h4>
                    <h4>Novità</h4>
                    <h4>Prospettive</h4>
                    <h4>Riciclo</h4>
                    <h4>ESG e impatto</h4>
                    <h4>Storie di clienti</h4>
                </div>
                <div class="flex-item">
                    <h4>I nostri partner</h4>
                    <h4>Trova un partner</h4>
                    <h4>Soluzioni OEM</h4>
                    <h4>Partner Program</h4>
                </div>
                <div class="flex-item">
                    <h4>Risorse</h4>
                    <h4>Blog</h4>
                    <h4>Eventi</h4>
                    <h4>Privacy Center</h4>
                    <h4>Librerie di risorse</h4>
                    <h4>Centro per la sicurezza e l'affidabilità</h4>
                    <h4>Download software di valutazione</h4>
                </div>
            </div>

            <div class="lowest">
                <span><b>Dell Technologies</b></span>
                <span><b>Dell Premier</b></span>
            </div>
            <div class="lowest">
                <span>Copyright © 2024 Dell Inc.</span>
                <span>Condizioni di vendita</span>
                <span>Informazioni confidenziali</span>
                <span>Cookies, Informazione sugli annunci</span>
                <span>Conformità giuridica e normative</span>
            </div>
        </footer>
    </body>
</html>