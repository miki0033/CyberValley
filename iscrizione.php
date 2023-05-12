<?php
require_once("ar.php");
require_once("libreria/database.php");
$id = "";
$table = "";
if (isset($_GET['id']) && isset($_GET['table'])) {
    $id = $_GET['id'];
    $table = $_GET['table'];
} else {
    header("location:index.php");
}
if (count($_SESSION['datistudente']) > 0) {
    $studente = $_SESSION['datistudente'];
    $idstudente = $studente["id"];
}

$DB = databaseConnection($servername, $username, $dbpassword, $dbname);
//controllare se lo studente è già iscritto
$iscritto = true;

$iscritto = alreadyInTableRel($table, $idstudente, $id, $DB);
$record = readRecordtable($id, $table, $DB);
if ($table == 'corsi') {
    $sql = "INSERT INTO `corsistudenti`(`idstudente`, `idcorso`, `finecorso`) 
    VALUES ('$idstudente','$id','" . $record['datafine'] . "')";
}
if ($table == 'eventi') {
    $sql = "INSERT INTO `eventistudenti`(`idstudente`, `idevento`, `dataevento`) 
    VALUES ('$idstudente','$id','" . $record['dataevento'] . "')";
}
echo $sql;
if (!$iscritto) createRecord($DB, $sql);
else echo "<br>" . "GIA ISCRITTO";



if ($table == 'corsi') {
    header("location:corso.php?id=$id");
}
if ($table == 'eventi') {
    header("location:evento.php?id=$id");
}
