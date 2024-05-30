<?php
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " .mysqli_connect_error());

    session_start();

    if(isset($_POST["email"])  && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        //controllo la presenza dell'utente nel database
        $query = "SELECT * FROM utenti WHERE email = '".$email."'";

        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) === 1)
        {
            //Utente trovato con quelle credenziali quindi login
            $row = mysqli_fetch_assoc($res);    //estrazione username dall'utente appena loggato

            //controllo password hashata
            if(password_verify($password, $row['password']))           
            {
                $username = $row['username'];       

                $_SESSION["username"] = $username;  //imposta variabile di sessione
                $_SESSION["email"] = $email;        //imposta variabile per recuperare il carrello

                echo "<script>alert('Login effettuato con successo!'); 
                window.location.href = 'index.php';</script>";     //ritorna alla home

                exit;
            }
        }
        else
        {
            echo "<script>alert('(!) Credenziali inesistenti'); 
            window.location.href = 'index.php';</script>";     //ritorna alla home
        }       
    }
    else
    {
        echo "<script>alert('(!) Credenziali incorrette'); 
        window.location.href = 'index.php';</script>";     //ritorna alla home
    }
        

    
    mysqli_free_result($res);   

    mysqli_close($conn);
?>