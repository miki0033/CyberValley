<?php
require_once("libreria/database.php");
//VARIABILI
$titolo = "Informatica";
$table = 'corsi';
$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$DB = databaseConnection($servername, $username, $dbpassword, $dbname);
$corso = readRecordtable($id, 'corsi', $DB);
?>

<?php
$title = $corso['nome'] . " - Cyber Valley";
require_once('header.php');

?>

<div class="content">

    <div class="row">
        <?php
        /*
            for($i=0;$i<count($img);$i++){
            echo '<div class=" col overflow-hidden" 
            style="background-image: url(&quot;'.$img[$i].'&quot;); background-size: 95%;">';   
            
            echo '</div>';

            if($i>3) break;
            
            }
            */

        echo '<div class="corsoimg col overflow-hidden" 
            style="background-image: url(&quot;' . $corso['img'] . '&quot;); background-size: contain;">
            </div>
            ';
        ?>
    </div>
    <div class="row">
        <h5><?= $corso['nome'] ?></h5>
        <p><?= $corso['testo'] ?></p>

    </div>
    <?php
    $btnsubscribe = "";
    if (isset($_SESSION['datistudente'])) {
        if (!alreadyInTableRel($table, $_SESSION['datistudente']['id'], $id, $DB))
            $btnsubscribe = "<button class='btn btn-primary'><a href='iscrizione.php?id= $id &table=corsi' style='color:white'>Iscriviti al corso</a></button>";
        else {
            $btnsubscribe = "<button class='btn btn-success'><a href='#' style='color:white'>Gia iscritto</a></button>";
        }
    }
    ?>
    <?= $btnsubscribe ?>
</div>
<div class="clear">
    <br>
</div>

<?php
require_once('footer.php');

?>