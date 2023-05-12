<?php
require_once("admin.php");
require_once("libreria/database.php");

$titolo = "Delete";
//require_once("minimalheader.php");

?>

<?php
//Variabili
$table = "";
$id = "";
if (isset($_GET["table"]) && isset($_GET["id"])) {
    $table = $_GET["table"];
    $id = $_GET["id"];
    $DB = databaseConnection($servername, $username, $dbpassword, $dbname);
    $array = readRecordtable($id, $table, $DB);
    closeConnection($DB);
} else {
    header("location:dashboard.php");
}




$item = "";
if ($_GET["table"] == "studenti") {
    $item = "lo studente";
}
if ($_GET["table"] == "corsi") {
    $item = "il corso";
}
if ($_GET["table"] == "eventi") {
    $item = "l'evento";
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titolo ?></title>

    <!-- Boostrap CSS -->


    <link href="fontawesome/css/all.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

</head>
<?php
$DB = databaseConnection($servername, $username, $dbpassword, $dbname);
$msg = deleteRecord($DB, $table, $id);
?>
<p>
    <?= $msg ?>
</p>


<a href="ripristina.php?table=<?= $table ?>&id=<?= $id ?>">Ripristina</a>
<?php
if (!isset($_SESSION)) {
    session_start();
}
$_SESSION["dati"] = $array;
?>