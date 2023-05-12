<?php
require_once("admin.php");
require_once("libreria/database.php");


//VARIALIBI
$titolo = "Lista Studenti - Cyber Valley";
?>

<!DOCTYPE html>
<html lang="en">

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
  <link href="paper-dashboard-master/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="paper-dashboard-master/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />

  <link rel="stylesheet" href="CSS/stile.css">
  <link rel="stylesheet" href="CSS/dashboard.css">
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
          Cyber Valley

        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <!--<li>
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>-->
          <li class="active ">
            <a href="./admin_studenti.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Lista studenti</p>
            </a>
          </li>
          <li>
            <a href="./admin_corsi.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Corsi</p>
            </a>
          </li>
          <li>
            <a href="./admin_eventi.php">
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
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="admin_studenti.php">Studenti</a>
                  <a class="dropdown-item" href="admin_corsi.php">Corsi</a>
                  <a class="dropdown-item" href="admin_eventi.php">Eventi</a>
                  <a class="dropdown-item" href="libreria/logout.php">Logout</a>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">

        <button type="button" class="btn btn-warning btncrea">
          <a href="modifica.php?table=studenti" target='_blank' rel="noopener noreferrer">
            <i class="fa-solid fa-plus"></i> Crea
          </a>
        </button>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nome</th>
              <th scope="col">Cognome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Telefono</th>
              <th scope="col">Codice fiscale</th>
              <th scope="col">Data di nascita</th>
              <th scope="col">Ruolo</th>
              <th scope="col"></th>
              <th scope="col"></th> <!--<i class="fa-solid fa-trash-can"></i>-->
            </tr>
          </thead>
          <tbody>
            <?php


            $DB = databaseConnection($servername, $username, $dbpassword, $dbname);
            $studenti = readAlltable("studenti", $DB);
            ?>
            <?php
            $outtable = "";

            for ($i = 0; $i < count($studenti) - 1; $i++) {   //-1 perchè mi lascia l'ultimo campo a NULL
              $outtable .= "<tr>
              <th scope='row'>" . $studenti[$i]['id'] . "</th>
              <td>" . $studenti[$i]['nome'] . "</td>
              <td>" . $studenti[$i]['cognome'] . "</td>
              <td>" . $studenti[$i]['email'] . "</td>
              <td>" . $studenti[$i]['telefono'] . "</td>
              <td>" . $studenti[$i]['codice_fiscale'] . "</td>
              <td>" . $studenti[$i]['data_nascita'] . "</td>
              <td>" . $studenti[$i]['ruolo'] . "</td>
              <th scope='col'><a href='modifica.php?id=" . $studenti[$i]['id'] . "&table=studenti' target='_blank' rel='noopener noreferrer'><i class='fa-solid fa-pencil'></i></a>
              <th scope='col'><a href='delete.php?id=" . $studenti[$i]['id'] . "&table=studenti' target='_blank' rel='noopener noreferrer'><i class='fa-solid fa-trash-can'></i></a>
              </tr>
              
              ";
            }
            ?>

            <?= $outtable ?>

          </tbody>
        </table>
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