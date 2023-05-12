<?php
/*VARIABILI*/
$title = "Registrati - Cyber Valley";
require_once("libreria/database.php");
require_once("class/pwencode.php");

$table = "studenti";

$error_display_mail = "none";
$error_message_mail = "";

?>

<?php
if (count($_POST) > 0) {
    $name = $_POST['nome'];
    $surname = $_POST['cognome'];
    $email = $_POST['email'];
    $pw = Pwencode::pwcrypt($_POST['pw']);
    $tel = $_POST['telefono'];
    $CF = $_POST['cf'];
    $nascita = $_POST['nascita'];
    $reg = time();
    $conn = databaseConnection($servername, $username, $dbpassword, $dbname);
    //create
    $sqlmail = "SELECT email FROM studenti WHERE email = '$email'";
    $result = $conn->query($sqlmail);
    if ($result->num_rows > 0) {
        $error_display_mail = "d-block";
        $error_message_mail = "L' e-mail risulta già registrata";
    } else {
        $sql = "INSERT INTO `studenti` ( `nome`, `cognome`, `email`, `password`, `telefono`, `codice_fiscale`, `data_nascita`, `data_registrazione`) 
        VALUES ('$name', '$surname', '$email', '$pw', '$tel', '$CF', $nascita, $reg);";
        //echo $sql;
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            header("location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<br>";
            echo $sql;
        }

        $conn->close();
    }
}
?>

<?php
require_once("minimalheader.php");
?>

<body>
    <div class="clear">
        <br>
    </div>
    <div class="logincontent">
        <form action="" method="post" class="form-control">
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Nome: <span class="req">*</span></label></div>
                <div class="forminput col-sm-10"><input type="text" name="nome" id="nome" placeholder="Nome" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="cognome">Cognome:<span class="req">*</span></label></div>
                <div class="forminput col-sm-10"><input type="text" name="cognome" id="cognome" placeholder="Cognome" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="email">Email:<span class="req">*</span></label></div>
                <div class="forminput col-sm-10"><input type="email" name="email" id="email" placeholder="E-mail" required></div>
                <div>
                    <p style="display:<?= $error_display_mail ?>; color:red;"><?= $error_message_mail ?></p>
                </div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="pw">Password:<span class="req">*</span></label></div>
                <div class="forminput col-sm-10"><input type="password" name="pw" id="pw" placeholder="Password" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="telefono">Telefono:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="telefono" id="telefono" placeholder="Telefono"></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="nascita">Data di nascita:<span class="req">*</span></label></div>
                <div class="forminput col-sm-10"><input type="date" name="nascita" id="nascita" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="cf">Codice Fiscale:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="cf" id="cf" placeholder="Codice fiscale"></div>
            </div>

            <div class="form-control">
                <button type="submit" class="btn btn-primary">Registrati</button>
            </div>
            <input type="hidden" name="table" id="table" value="<?= $table ?>">


        </form>
    </div>

    <div class="clear">
        <br>
    </div>


    <?php
    require_once("footer.php");
    ?>
</body>

</html>