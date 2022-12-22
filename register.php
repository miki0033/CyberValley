<?php
/*VARIABILI*/
    $title="Registrati - Cyber Valley";
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
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Nome:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="nome" id="nome" placeholder="Nome" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="cognome">Cognome:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="cognome" id="cognome" placeholder="Cognome" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="email">Email:</label></div>
                <div class="forminput col-sm-10"><input type="email" name="email" id="email" placeholder="" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="pw">Password:</label></div>
                <div class="forminput col-sm-10"><input type="password" name="pw" id="pw" placeholder="" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="telefono">Telefono:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="telefono" id="telefono" placeholder="Telefono" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="nascita">Data di nascita:</label></div>
                <div class="forminput col-sm-10"><input type="date" name="nascita" id="nascita" required></div>
            </div>
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="cf">Codice Fiscale:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="cf" id="cf" placeholder="Codice fiscale"></div>
            </div>
            
            <div class="form-control">
                <button type="submit" class="btn btn-primary">Registrati</button>
            </div>
            
            
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
