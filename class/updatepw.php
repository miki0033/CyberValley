<?php
require_once("../libreria/database.php");
require_once("pwencode.php");

if (!isset($_POST['email']) || !isset($_POST['pw'])) {
    header("location:../index.php");
}

$DB = databaseConnection($servername, $username, $dbpassword, $dbname);
function pwUpdate($email, $pw, $DB)
{
    $password = Pwencode::pwcrypt($pw);
    $sql = "UPDATE `studenti` SET `password` = '$password' WHERE `studenti`.`email` = '$email';";
    echo $sql;
    if ($DB->query($sql) === TRUE) {
        echo "record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $DB->error;
        echo "<br>";
    }
}

pwUpdate($_POST['email'], $_POST['pw'], $DB);


//header("location:index.php");
