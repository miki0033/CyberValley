<?php


/*VARIABILI*/
$title = "Login - Cyber Valley";
$error_display = "none";
$error_message = "Controlla la tua email e la password";

?>

<?php
require_once("libreria/database.php");
require_once("minimalheader.php");

require_once("class/pwencode.php");
?>

<?php

//set session variables
session_start();

function readDBlogin($email, $password, $DB)
{

    $error_display = "";
    $sql = "SELECT * FROM studenti WHERE email = '$email' AND password = '$password'";

    $result = $DB->query($sql);

    if ($result->num_rows > 0) {
        $studente = $result->fetch_assoc();
        $_SESSION["datistudente"] = $studente;
        header("location:dashboard.php");
    } else {
        $error_display = "d-block";
    }
    $DB->close();
    return $error_display;
}

if (count($_POST) > 0) {
    $email = $_POST["useremail"];
    $password = Pwencode::pwcrypt($_POST['pw']);

    $DB = databaseConnection($servername, $username, $dbpassword, $dbname);
    readDBlogin($email, $password, $DB);
}



if (!isset($_SESSION)) {
    $error_display = "d-block";
}

?>



<body>
    <div class="clear">
        <br>
    </div>
    <div class="logincontent">

        <form action="" method="post" class="form-control">
            <div class="form-control">
                <input type="email" name="useremail" id="" placeholder="email@esempio.it" required>
            </div>
            <div class="form-control">
                <input type="password" name="pw" id="" placeholder="Password" required>
            </div>
            <div class="form-control">
                <button type="submit" class="btn btn-primary">Log In</button>
                <p><a href="recuperopw.php">Password dimenticata?</a></p>
            </div>
            <div>
                <p style="display:<?= $error_display ?>; color:red;"><?= $error_message ?></p>
            </div>
            <div class="">
                <hr>
                <button class="reg btn btn-success"><a href="register.php">Registrati</a></button>
            </div>
        </form>
    </div>

</body>



<?php
require_once("footer.php");
?>

</html>