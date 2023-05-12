<?php
require_once("admin.php");
require_once("libreria/database.php");

?>

<?php


//Variabili
$displaystudenti = "none";
$displaycorsi = "none";
$displayeventi = "none";
$displayEC = "none";
$endbutton = "";
$id = "";

$DB = databaseConnection($servername, $username, $dbpassword, $dbname);


$array = [ //studente
    'nome' => "",
    'cognome' => "",
    'email' => "",
    'telefono' => "",
    'codice_fiscale' => "",
    'data_nascita' => "",
    //corso-evento
    'datainizio' => "",
    'datafine' => "",
    'img' => "",
    'descrizione' => "",
    'testo' => ""
];



//SESSION
if (isset($_GET["table"])) {
    $table = $_GET["table"];
    $endbutton = "Crea";
} else {
    header("location:dashboard.php");
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $endbutton = "Modifica";
    $record = readRecordtable($id, $table, $DB);

    /*if(){
        
    }*/
}

if ($table == "studenti") {
    $displaystudenti = "block";
} else if ($table == "corsi") {
    $displaycorsi = "block";
    $displayEC = "block";
} else if ($table == "eventi") {
    $displayeventi = "block";
    $displayEC = "block";
} else {
    header("location:dashboard.php");
}

$title = $endbutton;
require_once("minimalheader.php");

?>

<body>
    <div class="content">
        <form action="create.php" method="POST" id="modifica" enctype="multipart/form-data">
            <div class="form-control row">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Nome:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="nome" id="nome" value="<?= $array["nome"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaystudenti ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="cognome">Cognome:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="cognome" value="<?= $array["cognome"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaystudenti ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="email">Email:</label></div>
                <div class="forminput col-sm-10"><input type="email" name="email" value="email@email.it"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaystudenti ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="telefono">Telefono:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="telefono" value="<?= $array["telefono"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaystudenti ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Data di nascita:</label></div>
                <div class="forminput col-sm-10"><input type="date" name="nascita" value="<?= $array["data_nascita"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaystudenti ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="codice_fiscale">Codice fiscale:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="cf" id="" value="<?= $array["codice_fiscale"] ?>"></div>
            </div>

            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="img">Nome img:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="img" id="" value="<?= $array["img"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="img">Carica img:</label></div>
                <div class="forminput col-sm-10">
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg, image/svg, image/bmp">
                </div>
            </div>
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Data di inizio:</label></div>
                <div class="forminput col-sm-10"><input type="date" name="inizio" id="" value="<?= $array["datainizio"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Data di fine:</label></div>
                <div class="forminput col-sm-10"><input type="date" name="fine" id="" value="<?= $array["datafine"] ?>"></div>
            </div>

            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="img">Nome img:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="img" id="" value="<?= $array["img"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="img">Carica img:</label></div>
                <div class="forminput col-sm-10">
                    <?php
                    //
                    ?>
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg, image/svg, image/bmp">
                    <img src="" alt="" style="width: 200px;"><!--mettere percorso file-->
                </div>
            </div>
            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Data:</label></div>
                <div class="forminput col-sm-10"><input type="date" name="inizio" id="" value="<?= $array["datainizio"] ?>"></div>
            </div>

            <div class="form-control row" style="display:<?= $displayEC ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Descrizione:</label></div>
                <div class="forminput col-sm-10">
                    <textarea id="descrizione" name="descrizione" rows="4" cols="50"></textarea>
                </div>
            </div>

            <div class="form-control row" style="display:<?= $displayEC ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Testo:</label></div>
                <div class="forminput col-sm-10">
                    <textarea id="testo" name="testo" rows="4" cols="50"></textarea>
                </div>
            </div>

            <div class="modbutton" style="margin-top: 10px">
                <button type="submit" class="btn btn-warning" value="<?= $endbutton ?>"><?= $endbutton ?></button>
            </div>

            <input type="hidden" name="table" id="table" value="<?= $table ?>">
            <input type="hidden" name="id" id="id" value="<?= $id ?>">
        </form>
    </div>
</body>