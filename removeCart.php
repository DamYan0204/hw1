<?php

// Connessione al database
$conn = mysqli_connect("localhost", "root", "", "hw1");

session_start();


if(isset($_SESSION["username"]) && isset($_GET["id_prodotto"]))
{
    $email = $_SESSION["email"];
    $id_prodotto = $_GET["id_prodotto"];


    //Decrementa la riga se la quantita è >0
    $query1 = "UPDATE carrelli SET quantita = quantita - 1 WHERE user_id = '".$email."' AND prodotto_id = '".$id_prodotto."' AND quantita > 0";

    //Rimuove la riga se la quantità è < 1 (cioè 0)
    $query2 = "DELETE FROM carrelli WHERE user_id = '".$email."' AND prodotto_id = '".$id_prodotto."' AND quantita = 0";

    $res1 = mysqli_query($conn, $query1);
    $res2 = mysqli_query($conn, $query2);
    
    // Controlla se l'operazione è avvenuta con successo
    if($res1 && $res2) 
    {
        $response = array('status' => 'success', 'message' => 'Prodotto rimosso dal carrello!');
    } 
    else 
    {
        $response = array('status' => 'error', 'message' => 'IMPOSSIBILE RIMUOVERE DAL CARRELLO!');
    }
    
   // Chiudi la connessione al database
    mysqli_close($conn);

    // Ritorna la risposta in formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
else
{
    $response = array('status' => 'error', 'message' => 'Parametri non validi o sessione scaduta.');
    echo json_encode($response);
}

