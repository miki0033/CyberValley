<?php
require_once("admin.php");
require_once("libreria/database.php");

define('PATH_IMG', "img/");
$table = "";
$id = "";

if (isset($_POST["table"])) {
    $table = $_POST["table"];

    $DB = databaseConnection($servername, $username, $dbpassword, $dbname);

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }
} else {
    // header("location:dashboard.php");
}

//var_dump(($_POST));
$timestamp = $_SERVER['REQUEST_TIME'];
$array = [ //studente
    'nome' => "",
    'cognome' => "",
    'email' => "",
    'telefono' => "",
    'codice_fiscale' => "",
    'data_nascita' => "",
    'data_registrazione' => $timestamp,
    'ruolo' => "studente"
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
    'nome' => "",
    'dataevento' => "",
    'img' => "",
    'descrizione' => "",
    'testo' => ""
];
if (count($_POST) > 0) {
    //studente
    if ($table == 'studenti') {
        $array['nome'] = $_POST['nome'];
        $array['cognome'] = checkSpecialChar($_POST['cognome']);
        $array['email'] = $_POST['email'];
        $array['telefono'] = $_POST['telefono'];
        $array['codice_fiscale'] = $_POST['cf'];
        $array['data_nascita'] = $_POST['nascita'];
    }

    //corso
    if ($table == 'corsi') {
        $corso['id'] = $_POST['idcorso'];
        $corso['nome'] = $_POST['nomecorso'];
        $corso['datainizio'] = $_POST['iniziocorso'];
        $corso['datafine'] = $_POST['finecorso'];
        $corso['img'] = $_POST['imgcorso'];
        $corso['descrizione'] = checkSpecialChar($_POST['descrizionecorso']);
        $corso['testo'] = checkSpecialChar($_POST['testocorso']);
        $corso['num_ore'] = $_POST['num_ore'];
        $corso['docente'] = $_POST['docente'];

        $img = $corso['img'];
    }
    //evento
    if ($table == 'eventi') {
        $evento['id'] = $_POST['idevento'];
        $evento['nome'] = $_POST['nomeevento'];
        $evento['dataevento'] = $_POST['dataevento'];
        $evento['img'] = $_POST['imgevento'];
        $evento['descrizione'] = checkSpecialChar($_POST['descrizioneevento']);
        $evento['testo'] = checkSpecialChar($_POST['testoevento']);

        $img = $evento['img'];
    }
}
//percorso img
$img = recoverFilename($img);
$testo = checkSpecialChar($evento['descrizione']);
if ($table == 'corsi') {
    $corso['img'] = PATH_IMG . $img;
} else if ($table == 'eventi') {
    $evento['img'] = PATH_IMG . $img;
}

if ($id == "") {   //create
    $sql = "";
    if ($table == 'studenti') {
        $sql = "INSERT INTO `studenti` (`id`, `nome`, `cognome`, `email`, `telefono`, `codice_fiscale`, `data_nascita`, `data_registrazione`, `ruolo`) 
    VALUES ('" . $id . "','" . $array['nome'] . "','" . $array['cognome'] . "','" . $array['email'] . "','" . $array['telefono'] . "','" . $array['codice_fiscale'] . "','" . $array['data_nascita'] . "','" . $array['data_registrazione'] . "','" . $array['ruolo'] . "')";
        echo $sql;
    }
    if ($table == 'corsi') {
        $sql = "INSERT INTO `corsi`(`id`, `nome`, `img`, `datainizio`, `datafine`, `descrizione`, `testo`, `num_ore`, `docente`) 
    VALUES ('" . $id . "','" . $corso['nome'] . "','" . $corso['img'] . "','" . $corso['datainizio'] . "','" . $corso['datafine'] . "','" . $corso['descrizione'] . "','" . $corso['testo'] . "','" . $corso['num_ore'] . "','" . $corso['docente'] . "')";
    }
    if ($table == 'eventi') {
        $sql = "INSERT INTO `eventi`(`id`, `nome`, `img`, `dataevento`, `descrizione`, `testo`) 
    VALUES ('" . $id . "','" . $evento['nome'] . "','" . $evento['img'] . "','" . $evento['dataevento'] . "','" . $evento['descrizione'] .  "','" . $evento['testo'] . "')";
        echo $sql;
    }
    createRecord($DB, $sql);
} else {   //update
    $sql = "";
    if ($table == 'studenti') {
        $sql = "UPDATE `$table` SET `nome` ='" . $array['nome'] . "', `cognome`='" . $array['cognome'] . "', `email` = '" . $array['email'] . "', `telefono`='" . $array['telefono'] . "', `codice_fiscale`='" . $array['codice_fiscale'] . "', `data_nascita`='" . $array['data_nascita'] . "', `data_registrazione`='" . $array['data_registrazione'] . "', `ruolo`='" . $array['ruolo'] . "' WHERE `$table`.`id` = $id;";
        echo $sql;
    }
    if ($table == 'corsi') {
        $sql = "UPDATE `$table` SET `nome` = '" . $corso['nome'] . "', `img` = '" . $corso['img'] . "', `datainizio` = '" . $corso['datainizio'] . "', `datafine` = '" . $corso['datafine'] . "', `descrizione` = '" . $corso['descrizione'] . "', `testo` = '" . $corso['testo'] . "', `num_ore` = '" . $corso['num_ore'] . "', `docente` = '" . $corso['docente'] . "' WHERE `$table`.`id` = $id;"; //`docente`='prova' WHERE 'id'=256966;";
        //"UPDATE `corsi` SET `nome`='qwe',`img`='qwe',`datainizio`='',`datafine`='',`descrizione`='qwe',`testo`='qwe',`num_ore`= '8',`docente`='prova' WHERE 'id'=256966;";
        echo $sql;
    }
    if ($table == 'eventi') {
        $sql = "UPDATE `$table` SET `nome`='" . $evento['nome'] . "', `img`='" . $evento['img'] . "', `dataevento`='" . $evento['dataevento'] . "', `descrizione`='" . $evento['descrizione'] . "', `testo`='" . $evento['testo'] . "' WHERE `$table`.`id` = $id;";
        echo $sql;
    }
    updateRecord($DB, $sql);
}



header("location:dashboard.php");
