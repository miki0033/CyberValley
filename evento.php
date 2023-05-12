<?php
require_once("libreria/database.php");
//VARIABILI
$titolo = "Evento";
$testo = "Grandissimo evento di Cyber Valley";
$img = ["img/logo.png"];

$id = "";
$table = 'eventi';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$DB = databaseConnection($servername, $username, $dbpassword, $dbname);
$evento = readRecordtable($id, 'eventi', $DB);
?>

<?php
$title = $evento['nome'] . " - Cyber Valley";
require_once('header.php');

?>

<div class="content">

    <div class="row">

        <?php
        /*
            for($i=0;$i<count($img);$i++){
            
            echo '<div class="eventoimg col overflow-hidden" style="background-image: url(&quot;'.$img[$i].'&quot;); background-size: contain;">';   
                
            echo '</div>';

            if($i>3) break;
            
            }
            */
        echo '<div class="eventoimg col overflow-hidden" 
            style="background-image: url(&quot;' . $evento['img'] . '&quot;); background-size: contain;">
            </div>
            ';
        ?>


        <h5><?= $evento['nome'] ?></h5>
        <p><?= $evento['testo'] ?></p>
        <a href='iscrizione.php?id=<?= $id ?>&table=eventi'></a>
    </div>
    <?php
    $btnsubscribe = "";
    if (isset($_SESSION['datistudente'])) {
        if (!alreadyInTableRel($table, $_SESSION['datistudente']['id'], $id, $DB))
            $btnsubscribe = "<button class='btn btn-primary'><a href='iscrizione.php?id= $id &table=eventi' style='color:white'>Iscriviti al evento</a></button>";
        else {
            $btnsubscribe = "<button class='btn btn-success'><a href='#' style='color:white'>Gia iscritto</a></button>";
        }
    }
    $dataevento = strtotime($evento['dataevento']);
    $timestamp = time();
    if (($dataevento - $timestamp) < 0) {

        $btnsubscribe = "<button class='btn btn-danger'><a href='#' style='color:white'>Evento passato</a></button>";
    }

    ?>
    <?= $btnsubscribe ?>
    <!--<button class="btn btn-primary"><a href='iscrizione.php?id=$id ?&table=eventi' style="color:white">Iscriviti al evento</a></button>-->
</div>
<div class="clear">
    <br>
</div>

<?php
require_once('footer.php');

?>