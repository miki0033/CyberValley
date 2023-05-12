<?php
require_once("libreria/database.php");
$title = "HOMEPAGE - Cyber Valley";


//Collegamento al database

$DB = databaseConnection($servername, $username, $dbpassword, $dbname);
$corso = readAlltable('corsi', $DB);
$eventi = readAlltable('eventi', $DB);
?>
<?php require_once('header.php'); ?>

<div class="content">
    <div class="descrizione">
        <h1>Chi Siamo</h1>
        <p>L&#39; Istituto Cyber Valley si occupa, dal 1999, di Alta Formazione certificata.<br>
            Il nostro obiettivo è quello di formare professionisti IT pronti ad entrare nel mondo del lavoro 4.0<br>
            Cyber Valley è un istituto di alta formazione che offre corsi avanzati nell'ambito dell'informatica, della chimica e della meccanica.
        </p>
    </div>

    <div class="corsi container px-4 text-center">
        <div class="row ">
            <h2>Alcuni dei nostri corsi:</h2>
        </div>
        <div class="row gx-5">
            <?php
            $outhtml = "";
            for ($i = 0; $i < 3; $i++) {
                $outhtml .= '
                <div class="col" style="width: 18rem;">
                    <div class="corso p-3">
                        <a href="corso.php?id=' . $corso[$i]['id'] . '">
                        <img src="' . $corso[$i]['img'] . '" class="card-img-top" alt="' . $corso[$i]['nome'] . '">
                        <h2 class="card-title">' . $corso[$i]['nome'] . '</h2>
                        </a>
                    </div>
                </div>
                        ';
            }
            echo $outhtml;
            ?>
        </div>
        <div class="clear">
            <hr>
        </div>
    </div>
    <div class="container eventi">
        <h2>Alcuni dei nostri eventi:</h2>
        <?php
        $outhtml = "";
        //style="background-image: url(&quot;' . $eventi[$i]['img'] . '&quot;)
        for ($i = 0; $i < 3; $i++) {
            $outhtml .= '
            <div class="row evento">
                <div class="col-sm-4 overflow-hidden" ">
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
        }
        echo $outhtml;
        ?>
    </div>
</div>

</div>

<div class="credits">

    Immagine di <a href="https://it.freepik.com/foto-gratuito/concetto-di-hosting-di-siti-web-con-circuiti_26412535.htm#query=informatica&position=3&from_view=search&track=sph">Freepik</a>>
    Immagine di <a href="https://it.freepik.com/foto-gratuito/ricercatore-di-primo-piano-che-tiene-la-vetreria_11630658.htm#query=chimica&position=5&from_view=search&track=sph">Freepik</a>
    <a href="https://it.freepik.com/foto-gratuito/ingranaggi-e-ruote-dentate_1026583.htm#query=meccanica&position=18&from_view=search&track=sph">Immagine di onlyyouqj</a> su Freepik

</div>


























<?php require_once('footer.php'); ?>