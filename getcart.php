<?php

$conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " . mysqli_connect_error());

session_start();

if(isset($_SESSION["email"]))
{
    $email = $_SESSION["email"];

    $prodotti = array();

    // Seleziona il carrello dell'utente della sessione insieme ai dati dei prodotti
    $query = "SELECT * FROM carrelli C JOIN prodotti P ON C.prodotto_id = P.id WHERE user_id = '".$email."'";

    
    $res = mysqli_query($conn, $query);
    
    // Controlla se l'operazione è avvenuta con successo
    if($res) 
    {
        while($row = mysqli_fetch_assoc($res))
        {
            $prodotti[] = $row;
        }
    } 
    else 
    {
        error_log("Risultato query getCart fallito: " . mysqli_error($conn));
    }
    
    
    mysqli_free_result($res);   
    
    // Chiudi la connessione al database
    mysqli_close($conn);


    // Ritorna
    echo json_encode($prodotti);
}
else
{
    error_log("Email sessione non impostata");
    echo json_encode(array());
}

?>