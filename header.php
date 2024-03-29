<?php
//SESSION
$login = false;
session_start();
if (isset($_SESSION["datistudente"])) {
    $login = true;
}

//log in button
if ($login) {
    $studente = $_SESSION["datistudente"];
    $loginbutton = "<a href='ar_studente.php'>" . $studente['nome'] . "</a>";
} else {
    $loginbutton = '<a href="login.php">Login</a>';
}

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="icon" type="image/png" href="img/logo.png">

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/stile.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>

<body>
    <div class="header">
        <div class="login">
            <button class="btn text-center"><?= $loginbutton ?></li>
                <!--<li><a href="register.php">Registrati</a></li>-->
        </div>
        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>
        <div class="titoli">
            <h1>Cyber Valley</h1>
            <h5>scuola di alta formazione</h5>
        </div>



        <div class="menu">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="corsi.php">Corsi</a></li>
                    <li><a href="eventi.php">Eventi</a></li>

                </ul>
            </nav>
        </div>
    </div>
    <div class="clear"><br></div>