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

        <main id="inspiron16">
            <section id="first_main_div">
                <div class="left">
                    <p>
                        <h1>Inspiron 16</h1>
                        <h2>Il formato 16:10 su un display da 16 pollici all'interno della larghezza di un notebook da 15 pollici</h2>
                        <h3>Suono ricco e pulito</h3>
                        <h3>Rilassati con gli altoparlanti up-firing</h3>
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
                        <h3>Processore</h3>
                        <h4>Intel® Core™ i7-1360P di tredicesima generazione (18 MB di memoria cache, 12 core, 16 thread, fino a 5,00 GHz Turbo)</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Sistema operativo</h3>
                        <h4>Windows 11 Home, inglese, olandese, francese, tedesco, italiano</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Scheda grafica</h3>
                        <h4>Scheda grafica Intel® Iris® Xe</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Display</h3>
                        <h4>16,0", FHD+, 1.920 x 1.200, 60 Hz, WVA, non touch-screen, antiabbagliamento, 300 nit, ComfortView Plus</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Memoria</h3>
                        <h4>16 GB di memoria LPDDR5 a 4.800 MHz, integrata</h4>
                    </div>
                </div>
                <div class="flex-container">
                    <div class="flex-item">
                        <h3>Storage</h3>
                        <h4>SSD M.2 PCIe NVMe, 1 TB</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Software di produttività</h3>
                        <h4>Licenza di Microsoft Office non inclusa, offerta solo con prova gratuita di 30 giorni</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Software di sicurezza</h3>
                        <h4>McAfee+ Premium, 1 anno</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Servizi estesi</h3>
                        <h4>1 anno di assistenza on-site di base dopo la diagnosi in remoto con supporto solo hardware</h4>
                    </div>
                    <div class="flex-item">
                        <h3>Tastiera</h3>
                        <h4>Tastiera interna retroilluminata, italiano, QWERTY, Titan Grey</h4>
                    </div>
                </div>
                
            </section>

            <section class="altre_info">
                <div class="left">
                        <h1>Comodo e piacevole</h1>
                        <h3>Ammira ogni singolo dettaglio dei tuoi film preferiti grazie a alla frequenza di refresh di 120 Hz su un display opzionale da 2.5K. Riduci le dannose emissioni di luce blu con il software Dell ComfortView o l'hardware Dell ComfortView Plus.</h3>
                </div>
                <div class="right img_div">
                    

                </div>
            </section>

            <section class="altre_info">
                <div class="left img_div">

                </div>
                <div class="right">
                        <h1>Esperti di sostenibilità</h1>
                        <h3>Il tuo Inspiron 16 è progettato con materiali sostenibili e viene spedito in packaging composti da materiali riciclati o rinnovabili fino al 100%. Inoltre, è riciclabile al 100%. Alcuni notebook Inspiron utilizzano una tecnologia che incide il logo sul coperchio e questo permette di ridurre gli sprechi nel processo di produzione. La nuova linea Inspiron è registrata EPEAT Silver e certificata Energy Star.</h3>
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