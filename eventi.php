<?php
require_once("libreria/database.php");
//VARIABILI
$title = "Eventi - Cyber Valley";

$DB = databaseConnection($servername, $username, $dbpassword, $dbname);
$eventi = readAlltable('eventi', $DB);
?>

<?php
require_once('header.php');

?>

<div class="content listacorsi">
    <h5>Eventi</h5>
    <?php
    for ($i = 0; $i < count($eventi) - 1; $i++) {
        echo '<hr>
        <div class="row listaeventi">
            <div class="col-sm-4 overflow-hidden" ">
                <img src="' . $eventi[$i]['img'] . '" class="card-img-top" alt="' . $eventi[$i]['nome'] . '">
            </div>
            <div class="col-sm-6 text-justify">
                <h5>' . $eventi[$i]['nome'] . '</h5>
                <p>' . $eventi[$i]['descrizione'] . '</p>
                <a href="evento.php?id=' . $eventi[$i]['id'] . '" target="_blank">Vai al evento <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    ';

        /*$outhtml .= '
            <div class="row evento">
                <div class="col-md-4 overflow-hidden" ">
                    <img src="' . $eventi[$i]['img'] . '" class="card-img-top" alt="' . $eventi[$i]['nome'] . '">
                </div>
                <div class="col-sm-6 text-justify">
                    <h5>' . $eventi[$i]['nome'] . '</h5>
                    <p>' . $eventi[$i]['descrizione'] . '</p>
                    <a href="evento.php?id=' . $eventi[$i]['id'] . '" target="_blank">
                    Scopri di pi&ugrave; <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
                        ';
    */
    }

    ?>
</div>
<div class="clear">
    <br>
</div>

<?php
require_once('footer.php');

?>