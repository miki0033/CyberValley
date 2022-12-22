<?php
/*VARIABILI*/
    $title="Login - Cyber Valley";
?>

<?php
require_once("libreria/database.php");
require_once("minimalheader.php");
?>

<?php

//set session variables
session_start();
    if(count($_POST)>0){
        $email = $_POST["useremail"];
        $password = $_POST["pw"];
        $DB=databaseConnection($servername, $username, $dbpassword, $dbname);
        readDBlogin($email, $password, $DB);


    }
$error_display="none";
$error_message="Controlla la tua email e la password";

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
                <p><a href="#">Password dimenticata?</a></p>
            </div>
            <div>
            <p style="display:<?=$error_display?>" style="color:red"><?=$error_message?></p>
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
