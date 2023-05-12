<?php
require_once("ar.php");
require_once("libreria/database.php");


$idstudente = $_SESSION['datistudente']['id'];
$table = $_GET['table'];
$id = $_GET['id'];
$msg = "";

$database = databaseConnection($servername, $username, $dbpassword, $dbname);

if ($table == 'corsi') {
    $sql = "DELETE FROM corsistudenti WHERE idstudente = '$idstudente' AND idcorso = '$id'";
}
if ($table == 'eventi') {
    $sql = "DELETE FROM eventistudenti WHERE idstudente = '$idstudente' AND idevento = '$id'";
}

echo $sql;

if ($database->query($sql) === TRUE) {
    $msg = "Record deleted successfully";
} else {
    $msg = "Error deleting record: " . $database->error;
}

echo $msg;

if ($table == 'corsi') {
    header("location:ar_corsi.php");
}
if ($table == 'eventi') {
    header("location:ar_eventi.php");
}
