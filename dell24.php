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
        </header>

        <main id="dell24">
            <section id="first_main_div">
                <div class="left">
                    <p>
                        <h1>Monitor Dell 24 - S2425HS</h1>
                        <h2>Monitor FHD da 23,8 pollici che riduce l'affaticamento degli occhi e offre immagini di straordinaria qualità con acustica eccezionale in un design ispirato allo stile di vita.</h2>
                        <h3>Qualità del suono riprogettata</h3>
                        <h3>Streaming e gaming in tutta facilità</h3>
                        <a href="shop.php"><span class="info tornaShop">Vai allo shop</span></a>
                    </p>
                </div>
                <div class="right img_div">
                    

                </div>
            </section>

            <section class="specifiche">
                <h1>Specifiche tecniche</h1>
                <div class="flex-container">
                    <div class="flex-item">
                        <h3>Dimensioni in diagonale</h3>
                        <h4>23,8"</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Tasso di resolution / refresh</h3>
                        <h4>1.920 x 1.080</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Audio</h3>
                        <h4>2 altoparlanti integrati da 5 W</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Frequenza di refresh</h3>
                        <h4>100 Hz</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Luminosità</h3>
                        <h4>250 cd/m2 (tipica)</h4>
                    </div>
                </div>
                <div class="flex-container">
                    <div class="flex-item">
                        <h3>Tecnologia di retroilluminazione</h3>
                        <h4>Sistema di illuminazione bordi a LED</h4>
                    </div>
                    <div class="flex-item">
                        <h3>PPI (Pixel per Inch)</h3>
                        <h4>93</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Software di sicurezza</h3>
                        <h4>McAfee Business Protection, 1 anno</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Servizi estesi</h3>
                        <h4>1 anno di assistenza on-site di base dopo la diagnosi in remoto con supporto solo hardware</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Compatibilità con Dell Display Manager</h3>
                        <h4>Sì, con EasyArrange</h4>
                    </div>
                </div>
                
            </section>

            <section class="altre_info">
                <div class="left">
                        <h1>Immagini vibranti</h1>
                        <h3>Riduci le dannose emissioni di luce blu senza compromettere la precisione del colore con Dell ComfortView Plus, tecnologia che ha ottenuto 4 stelle nella certificazione TÜV Eye Comfort.</h3>
                        <h3>La copertura cromatica sRGB al 99% e il rapporto di contrasto di 1.500:1 assicurano colori uniformi ed elevata nitidezza, mentre la frequenza di refresh di 100 Hz rende lo scorrimento e i movimenti più fluidi.</h3>
                </div>
                <div class="right img_div">
                    

                </div>
            </section>

            <section class="altre_info">
                <div class="left img_div">

                </div>
                <div class="right">
                        <h1>Comfort da ogni angolazione</h1>
                        <h3>Inclina il monitor, ruotalo lateralmente o da orizzontale a verticale e regolane l'altezza per svolgere qualsiasi attività in qualsiasi spazio.</h3>                      
                </div>
            </section>
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