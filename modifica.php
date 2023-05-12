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
    'data_nascita' => ""
];
$corso = [ //corso
    'id' => "",
    'nome' => "",
    'datainizio' => "",
    'datafine' => "",
    'img' => "",
    'descrizione' => "",
    'testo' => "",
    'num_ore' => "",
    'docente' => ""
];
$evento = [ //evento
    'id' => "",
    'nome' => "",
    'dataevento' => "",
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
}
if (isset($_GET["table"]) && (isset($_GET["id"]))) {
    if ($table == "studenti") {
        $array = readRecordtable($id, $table, $DB);
    } else if ($table == "corsi") {
        $corso = readRecordtable($id, $table, $DB);
    } else if ($table == "eventi") {
        $evento = readRecordtable($id, $table, $DB);
    }
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
            <!--studente-->
            <div class="form-control row" style="display:<?= $displaystudenti ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Nome:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="nome" id="nome" value="<?= $array["nome"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaystudenti ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="cognome">Cognome:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="cognome" value="<?= $array["cognome"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaystudenti ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="email">Email:</label></div>
                <div class="forminput col-sm-10"><input type="email" name="email" value="<?= $array["email"] ?>"></div>
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
            <!-- corso -->
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="id">ID:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="idcorso" id="idcorso" value="<?= $corso["id"] ?>" readonly></div>
            </div>
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Nome:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="nomecorso" id="nome" value="<?= $corso["nome"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="img">Nome img:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="imgcorso" id="" value="<?= $corso["img"] ?>"></div>
            </div>
            <!--<div class="form-control row" style="display:<?php //echo $displaycorsi; 
                                                                ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="img">Carica img:</label></div>
                <div class="forminput col-sm-10">
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg, image/svg, image/bmp">
                </div>
            </div>-->
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Data di inizio:</label></div>
                <div class="forminput col-sm-10"><input type="date" name="iniziocorso" id="" value="<?= $corso["datainizio"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Data di fine:</label></div>
                <div class="forminput col-sm-10"><input type="date" name="finecorso" id="" value="<?= $corso["datafine"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Nome docente:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="docente" id="docente" value="<?= $corso["docente"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Numero di ore:</label></div>
                <div class="forminput col-sm-10"><input type="number" name="num_ore" id="num_ore" value="<?= $corso["num_ore"] ?>"></div>
            </div>

            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Descrizione:</label></div>
                <div class="forminput col-sm-10">
                    <textarea id="descrizione" name="descrizionecorso" rows="4" cols="50"><?= $corso['descrizione'] ?></textarea>
                </div>
            </div>

            <div class="form-control row" style="display:<?= $displaycorsi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Testo:</label></div>
                <div class="forminput col-sm-10">
                    <textarea id="testo" name="testocorso" rows="4" cols="50"><?= $corso['testo'] ?></textarea>
                </div>
            </div>
            <!-- evento -->
            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="idevento">ID:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="idevento" id="idevento" value="<?= $evento["id"] ?>" readonly></div>
            </div>
            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Nome:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="nomeevento" id="nome" value="<?= $evento["nome"] ?>"></div>
            </div>
            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="img">Nome img:</label></div>
                <div class="forminput col-sm-10"><input type="text" name="imgevento" id="" value="<?= $evento["img"] ?>"></div>
            </div>
            <!--<div class="form-control row" style="display:<?php //echo $displayeventi 
                                                                ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="img">Carica img:</label></div>
                <div class="forminput col-sm-10">
                    <?php
                    //
                    ?>
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg, image/svg, image/bmp">
                    <img src="" alt="" style="width: 200px;">//mettere percorso file
            </div>
            </div>-->
            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Data:</label></div>
                <div class="forminput col-sm-10"><input type="date" name="dataevento" id="" value="<?= $evento["dataevento"] ?>"></div>
            </div>

            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Descrizione:</label></div>
                <div class="forminput col-sm-10">
                    <textarea id="descrizione" name="descrizioneevento" rows="4" cols="50"><?= $evento['descrizione'] ?></textarea>
                </div>
            </div>

            <div class="form-control row" style="display:<?= $displayeventi ?>">
                <div class="formlabel col-sm-2 col-form-label"><label for="nome">Testo:</label></div>
                <div class="forminput col-sm-10">
                    <textarea id="testo" name="testoevento" rows="4" cols="50"><?= $evento['testo'] ?></textarea>
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