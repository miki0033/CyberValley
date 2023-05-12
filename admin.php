<?php
//SESSION
session_start();
if(!isset($_SESSION["datistudente"])){
  header("location:index.php");
}
else $studente=$_SESSION["datistudente"];

if($studente["ruolo"]!="admin"){
    header("location:ar_studente.php");
}
    
?>