<?php
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " .mysqli_connect_error());

    session_start();

    if(isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        //faccio l'hash della password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        //controllo la presenza di un altro utente con questi dati
        $query = "SELECT * FROM utenti WHERE email = '".$email."' OR username = '".$username."'";

        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) === 0)
        {
            //nessun utente trovato con quelle credenziali quindi registrazione del nuovo utente
            $query = "INSERT INTO utenti (email, username, password) VALUES ('".$email."','".$username."','".$hashed_password."')";

            $res = mysqli_query($conn, $query);
            if($res)
            {
                //avvia la sessione del nuovo utente
                $_SESSION["username"] = $username;  //imposta variabile di sessione
                $_SESSION["email"] = $email;        //imposta variabile per recuperare il carrello


                //invio email conferma registrazione    https://app.sendgrid.com/
                if(isset($_SESSION["email"]))
                {

                    //dati per invio email di conferma
                    $email = $_SESSION["email"];
                    $fromEmail = "hello.delltechnologies@gmail.com";
                    $name = "Dell Technologies";
                    $body = "Benvenuto su Dell, la tua registrazione è avvenuta con successo <br><br><a href='http://localhost/hw1/index.php'>Vai al sito</a>";
                    $subject = "Conferma registrazione su Dell";

                    $SENDGRID_API_KEY = "";     //api key sendgrid che non posso inserire per github causa l'immediata disattivazione

                    $headers = array
                    (
                        "Authorization: Bearer $SENDGRID_API_KEY",
                        "Content-Type: application/json"
                    );

                    $data = array
                    (
                        "personalizations" => array
                        (
                            array
                            (
                                "to" => array
                                (
                                    array
                                    (
                                        "email" => $email,
                                        "name" => $name
                                    )
                                )
                            )
                        ),

                        "from" => array
                        (
                            "email" => $fromEmail
                        ),

                        "subject" => $subject,

                        "content" => array
                        (
                            array
                            (
                                "type" => "text/html",
                                "value" => $body
                            )
                        )
                    );

                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
                    curl_setopt($curl, CURLOPT_POST, 1);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

                    $response = curl_exec($curl);


                    $response = curl_exec($curl);
                    if (curl_errno($curl)) {
                        $error_msg = curl_error($curl);
                        echo "<script>alert('Errore cURL: $error_msg');</script>";
                    }

                    curl_close($curl);
                }

                echo "<script>
                        alert('Registrazione completata con successo!');
                        window.location.href = 'index.php';
                    </script>";                                             //email di conferma e ritorna alla home
            }
        } 
        else
        {
            echo "<script>
                    alert('(!) Credenziali gia esistenti');
                    window.location.href = 'index.php';
                </script>";     //ritorna alla home
        }
        
        if(is_object($res)) 
        {
            mysqli_free_result($res); 
        }
    }
    else
    {
        echo "<script>
                alert('(!) Credenziali incorrette');
                window.location.href = 'index.php';
            </script>";  //ritorna alla home
    }
    
    
    mysqli_close($conn);

?>