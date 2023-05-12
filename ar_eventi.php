<?php
//SESSION
require_once("ar.php");
require_once("libreria/database.php");

//Variabili
$titolo = "Eventi";

$evento = [ //evento
  'id' => "",
  'nome' => "",
  'dataevento' => "",
  'img' => "",
  'descrizione' => "",
  'testo' => ""
];



?>

<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="paper-dashboard-master/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $titolo ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="fontawesome/css/all.css" rel="stylesheet">

  <!-- CSS Files -->

  <link href="paper-dashboard-master/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="paper-dashboard-master/assets/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="CSS/stile.css">
  <link rel="stylesheet" href="CSS/dashboard.css">
  <link rel="stylesheet" href="CSS/formlogin.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-active-color="danger">
      <div class="logo">
        <a href="index.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="img/logo.png">
          </div>

        </a>
        <a href="index.php" class="simple-text logo-normal">
          CYber Valley
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li>
            <a href="./ar_studente.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Profilo Studente</p>
            </a>
          </li>
          <li>
            <a href="./ar_corsi.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Corsi</p>
            </a>
          </li>
          <li class="active ">
            <a href="./ar_eventi.php">
              <i class="fa-regular fa-calendar-days"></i>
              <p>Eventi</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"><?= $titolo ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa-sharp fa-solid fa-bars"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Men&ugrave;</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="margin: 20px 0 0 0" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="index.php">Home</a>
                  <a class="dropdown-item" href="corsi.php">Corsi</a>
                  <a class="dropdown-item" href="eventi.php">Eventi</a>
                  <a class="dropdown-item" href="libreria/logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <h4>Eventi prenotati:</h4>
        <?php
        //devo visualizzare le prenotazioni agli eventi
        //con possibilità di modifica
        $DB = databaseConnection($servername, $username, $dbpassword, $dbname);
        $record = readTableRel($_SESSION['datistudente']['id'], 'eventistudenti', $DB);
        $outeventi = "";
        //var_dump($record);
        if (count($record) < 1) {
          $outeventi = "<p>Non hai ancora prenotato nessun evento,
              ti puoi iscrivere agli eventi <a href='eventi.php'>qui</a></p>";
        } else {
          for ($i = 0; $i < count($record) - 1; $i++) {
            $eventi = readRecordtable($record[$i]['idevento'], 'eventi', $DB);
            $outeventi .= '<h6>' . $eventi['nome'] . '</h6>
              <div class="row listaeventi">
                <div class="col-3 overflow-hidden imglist" style="background-image: url(&quot;' . $eventi['img'] . '&quot;)">
                        
                </div>
                    <div class="col text-justify">
                        <p>' . $eventi['descrizione'] . '</p>
                        <a href="corso.php?id=' . $eventi['id'] . '" target="_blank">Vai al corso <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div style="display: block">
                    <button class="btn btn-danger"><a href="disiscrivi.php?id=' . $eventi['id'] . '&table=eventi" style="color:white">Cancella prenotazione</a></button>
                    </div>
              </div>
              ';
          }
        }


        ?>

        <?= $outeventi ?>
      </div>
    </div>


    <div class="clear">
      <br>
    </div>

  </div>
  </div>
  </div>
  <?php
  require_once("footer.php")
  ?>
  <!--   Core JS Files   -->
  <script src="paper-dashboard-master/assets/js/core/jquery.min.js"></script>
  <script src="paper-dashboard-master/assets/js/core/popper.min.js"></script>
  <script src="paper-dashboard-master/assets/js/core/bootstrap.min.js"></script>
  <script src="paper-dashboard-master/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="paper-dashboard-master/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="paper-dashboard-master/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="paper-dashboard-master/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="paper-dashboard-master/assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>