<?php
//VARIABILI
require_once("libreria/database.php");
$title = "Corsi - Cyber Valley";

$DB = databaseConnection($servername, $username, $dbpassword, $dbname);
$corsi = readAlltable('corsi', $DB);
?>

<?php
require_once('header.php');

?>

<div class="content listacorsi">
    <h5>Corsi</h5>
    <?php   //
    for ($i = 0; $i < count($corsi) - 1; $i++) {
        echo '<hr>
        <div class="row listacorsi">
            <div class="col-sm-4 overflow-hidden">
                <img src="' . $corsi[$i]['img'] . '" class="card-img-top" alt="' . $corsi[$i]['nome'] . '">
            </div>                       
            <div class="col-sm-6 text-justify">
                <h5>' . $corsi[$i]['nome'] . '</h5>
                <p>' . $corsi[$i]['descrizione'] . '</p>
                <a href="corso.php?id=' . $corsi[$i]['id'] . '" target="_blank">Vai al corso <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    ';

        /*'<hr>
    <div class="row listaeventi">
    
    <div class="col-sm-6 text-justify">
        <h5>' . $eventi[$i]['nome'] . '</h5>
        <p>' . $eventi[$i]['descrizione'] . '</p>
        <a href="evento.php?id=' . $eventi[$i]['id'] . '" target="_blank">Vai al evento <i class="bi bi-arrow-right"></i></a>
    </div>
</div>
';*/
    }

    ?>
</div>
<div class="clear">
    <br>
</div>

<?php
require_once('footer.php');

?>