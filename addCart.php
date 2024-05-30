<?php
$conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " . mysqli_connect_error());

session_start();

if(isset($_SESSION["username"]) && isset($_GET["id_prodotto"]))
{
    $email = $_SESSION["email"];
    $id_prodotto = $_GET["id_prodotto"];


    // Aggiungi il prodotto al carrello nel database
    $query = "INSERT INTO carrelli (user_id, prodotto_id, quantita) VALUES ('".$email."','".$id_prodotto."','1')
          ON DUPLICATE KEY UPDATE quantita = quantita + 1";

    
    $res = mysqli_query($conn, $query);
    
    // Controlla se l'operazione è avvenuta con successo
    if($res) 
    {
        $response = array('status' => 'success', 'message' => 'Prodotto aggiunto al carrello!');
    } 
    else 
    {
        $response = array('status' => 'error', 'message' => 'Impossibile aggiungere al carrello!');
    }

    mysqli_free_result($res);   
    
    // Chiudi la connessione al database
    mysqli_close($conn);

    // Ritorna la risposta in formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
else
{
    // Risposta se i parametri non sono impostati correttamente
    $response = array('status' => 'error', 'message' => 'Parametri non validi');
    header('Content-Type: application/json');
    echo json_encode($response);   
}

?>