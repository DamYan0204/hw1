<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " .mysqli_connect_error());

$query = "SELECT id, categoria, nome, immagine_url, dettagli_url, descrizione, prezzo FROM prodotti";
$res = mysqli_query($conn, $query);

$prodotti = [];
if (mysqli_num_rows($res) > 0) 
{
    while ($row = mysqli_fetch_assoc($res)) 
    {
        $prodotti[] = $row;
    }
}

echo json_encode($prodotti);

mysqli_free_result($res);   

mysqli_close($conn);
?>