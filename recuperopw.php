<?php

//VARIABILI
$email = "";
$reademail = "";
$title = "Modifica Password";


?>

<?php
require_once("header.php");

if (isset($_SESSION['datistudente'])) {
    $email = $_SESSION['datistudente']['email'];
    $reademail = "readonly";
}

?>
<div class="content">
    <form action="class/updatepw.php" method="post" class="form-control">
        <div class="form-control">
            <input type="email" name="email" id="" value="<?= $email ?>" <?= $reademail ?>>
        </div>
        <div class="form-control">
            <input type="password" name="pw" id="" placeholder="Nuova Password" required>
        </div>
        <div class="form-control">
            <button type="submit" class="btn btn-primary">Modifica Password</button>
        </div>
    </form>

</div>