<?php
    session_start();
    if(!isset($_SESSION["datistudente"])){
      header("location:index.php");
    }
    else
    $studente=$_SESSION["datistudente"];
?>