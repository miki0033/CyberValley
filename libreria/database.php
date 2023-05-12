<?php
require_once("mysql_db.php");

//funzione di database
$servername = "localhost";
$username = "bdboryqu_userdb";
$dbpassword = "UserDB=asd";
$dbname = "bdboryqu_database";

function databaseConnection($servername, $username, $dbpassword, $dbname)
{
    //Mi collego al db
    $DB = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($DB->connect_error) {
        die("Connection failed: " . $DB->connect_error);    //al posto di DB c'era scritti $conn
    }
    return $DB;
}

function readAlltable($tablename, $database)
{
    $sql = "SELECT * FROM $tablename WHERE 1";
    $result = $database->query($sql);
    $array = [];
    if ($result->num_rows > 0) {
        /*$array = $result->fetch_assoc();*/
        // output data of each row
        $i = 0;
        while ($array[$i] = $result->fetch_assoc()) {
            $i++;
        }
    } else {
        echo "0 results";
    }

    return $array;
}
function readTable()
{
}

function closeConnection($DB)
{
    $DB->close();
}



function createRecord($database, $sql)
{
    //$result = $database->query($sql);

    if ($database->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $database->error;
    }
}

function readRecordtable($id, $table, $database)
{
    $sql = "SELECT * FROM $table WHERE id = $id;";
    //echo $sql . "<br>";
    $result = $database->query($sql);
    $array = [];
    if ($result->num_rows > 0) {
        $array = $result->fetch_assoc();
    } else {
        echo "0 results";
    }

    return $array;
}

function readTableRel($idstudente, $table, $database)
{
    $sql = "SELECT * FROM $table WHERE idstudente = $idstudente;";
    //echo $sql . "<br>";
    $result = $database->query($sql);
    $array = [];
    if ($result->num_rows > 0) {
        $i = 0;
        while ($array[$i] = $result->fetch_assoc()) {
            $i++;
        }
    } else {
        echo "0 results";
    }

    return $array;
}

function updateRecord($database, $sql)
{
    if ($database->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $database->error;
    }
}

function deleteRecord($database, $table, $id)
{
    $sql = "DELETE FROM $table WHERE `$table`.`id` = $id";
    echo $sql;
    if ($database->query($sql) === TRUE) {
        $msg = "Record deleted successfully";
    } else {
        $msg = "Error deleting record: " . $database->error;
    }
    return $msg;
}
function recoverFilename($path)
{
    $str = explode("/", $path);
    return $str[count($str) - 1];
}
function checkSpecialChar($text)
{
    /*apostrofo*/
    $puzzle = explode("'", $text);
    $result = $puzzle[0];
    for ($i = 1; $i < count($puzzle); $i++) {
        $result = $result . "&apos;" . $puzzle[$i];
    }
    /*virgolette*/
    $puzzle = explode('"', $result);
    $result = $puzzle[0];
    for ($i = 1; $i < count($puzzle); $i++) {
        $result = $result . "&quot;" . $puzzle[$i];
    }
    /* E commerciale*/
    /*  //problema: se ripasso nella funzione con una stringa gia controllata i caratteri speciali con & si riscrivono
    $puzzle = explode('&', $result);
    $result = $puzzle[0];
    for ($i = 1; $i < count($puzzle); $i++) {
        $result = $result . "&amp;" . $puzzle[$i];
    }*/
    /*Maggiore*/
    $puzzle = explode('>', $result);
    $result = $puzzle[0];
    for ($i = 1; $i < count($puzzle); $i++) {
        $result = $result . "&gt;" . $puzzle[$i];
    }
    /*Minore*/
    $puzzle = explode('<', $result);
    $result = $puzzle[0];
    for ($i = 1; $i < count($puzzle); $i++) {
        $result = $result . "&lt;" . $puzzle[$i];
    }



    return $result;
}

/* ***************************************************** */
function alreadyInTableRel($table, $idstudent, $idtable,  $database)
{
    /**funzione che restituisce:
     *  true se il dato è presente nelle tabelle relazionali e 
     *  false se non presente */
    if ($table == 'corsi') {
        $sql = "SELECT * FROM `corsistudenti` WHERE idstudente = '$idstudent' AND idcorso = '$idtable'";
        //SELECT * FROM `corsistudenti` WHERE idstudente = '6' AND idcorso = '123451'
    } else if ($table == 'eventi') {
        $sql = "SELECT * FROM `eventistudenti` WHERE idstudente = '$idstudent' AND idevento = '$idtable'";
    }
    $result = $database->query($sql);
    $array = [];
    if ($result->num_rows > 0) {
        $array = $result->fetch_assoc();
        $bool = true;
    } else {
        //echo "0 results";
        $bool = false;
    }
    return $bool;
}
/*
    function databaseCybervalley(){
        $servername = "localhost";
        $username = "bdboryqu_userdb";
        $dbpassword = "UserDB=asd";
        $dbname = "bdboryqu_database";
        $DB=databaseConnection($servername, $username, $dbpassword, $dbname);
        return $DB;
    }
    */
    
    /*
    $DB= new mysql_db();
    $sql= "SELECT * FROM studenti";
    $studenti = $DB->fetch_array($sql);

    $studentiHtml="";
    if(count($studenti)>0){
        $studentiHtml.='<tr>'.$studenti["cognome"].' '.$studeente["nome"].'</td>';
    }
    else{
        '<tr><td>Nessun risultato</td></tr>';
    }
    */
