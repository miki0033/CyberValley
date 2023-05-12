<?php
require_once("admin.php");
require_once("libreria/database.php");

if(isset($_GET["table"])&&isset($_GET["id"])&&isset($_SESSION["dati"])){
    $table=$_GET["table"];
    $id=$_GET["id"];
    $DB=databaseConnection($servername, $username, $dbpassword, $dbname);
    $array=$_SESSION["dati"];
}
else{
    header("location:dashboard.php");
}


$sql="";
if($table=='studenti'){
    $sql="INSERT INTO `studenti`(`id`, `nome`, `cognome`, `email`, `password`, `telefono`, `codice_fiscale`, `data_nascita`, `data_registrazione`, `ruolo`) 
    VALUES ('".$array['id']."','".$array['nome']."','".$array['cognome']."','".$array['email']."','".$array['password']."','".$array['telefono']."','".$array['codice_fiscale']."','".$array['data_nascita']."','".$array['data_registrazione']."','".$array['ruolo']."')";
}
if($table=='corsi'){
    $sql="INSERT INTO `corsi`(`id`, `nomecorso`, `datainizio`, `datafine`) 
    VALUES ('".$array['id']."','".$array['nomecorso']."','".$array['datainizio']."','".$array['datafine']."')";
}   
if($table=='eventi'){
    $sql="INSERT INTO `eventi`(`id`, `nomeevento`, `dataevento`) 
    VALUES ('".$array['id']."','".$array['nomeevento']."','".$array['dataevento']."')";
}
echo $sql;




$DB=databaseConnection($servername, $username, $dbpassword, $dbname);
createRecord($DB, $sql);


header("location:dashboard.php");
