<?php
//SESSION
require_once("ar.php");

//Variabili
$titolo = "Profilo Studente";
/*$studente=  ["nome"=>"",
            "cognome"=>"",
            "email"=>"",
            "nascita"=>"",
            "cf"=>"",
            "telefono"=>""];*/


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
          <!-- <p>CT</p> -->
        </a>
        <a href="index.php" class="simple-text logo-normal">
          CYber Valley
          <!-- <div class="logo-image-big">
            <img src="paper-dashboard-master/assets/img/logo-big.png">
          </div> -->
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
          <li>
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
        <form action="" method="post">
          <div class="form-control row">
            <div class="formlabel col-sm-2 col-form-label"><label for="nome">Nome:</label></div>
            <div class="forminput col-sm-10"><input type="text" name="nome" id="nome" value="<?= $studente["nome"] ?>"></div>
          </div>
          <div class="form-control row">
            <div class="formlabel col-sm-2 col-form-label"><label for="cognome">Cognome:</label></div>
            <div class="forminput col-sm-10"><input type="text" name="cognome" id="" value="<?= $studente["cognome"] ?>"></div>
          </div>
          <div class="form-control row">
            <div class="formlabel col-sm-2 col-form-label"><label for="email">Email:</label></div>
            <div class="forminput col-sm-10"><input type="email" name="email" id="" value="<?= $studente["email"] ?>"></div>
          </div>
          <div class="form-control row">
            <div class="formlabel col-sm-2 col-form-label"><label for="telefono">Telefono:</label></div>
            <div class="forminput col-sm-10"><input type="text" name="telefono" id="" value="<?= $studente["telefono"] ?>"></div>
          </div>
          <div class="form-control row">
            <div class="formlabel col-sm-2 col-form-label"><label for="nome">Data di nascita:</label></div>
            <div class="forminput col-sm-10"><input type="date" name="nascita" id="" value="<?= $studente["data_nascita"] ?>"></div>
          </div>
          <div class="form-control row">
            <div class="formlabel col-sm-2 col-form-label"><label for="telefono">Codice fiscale:</label></div>
            <div class="forminput col-sm-10"><input type="text" name="cf" id="" value="<?= $studente["codice_fiscale"] ?>"></div>
          </div>
          <div class="modbutton">
            <button type="submit" class="btn btn-warning">Modifica</button>
          </div>
        </form>

        <div class="modpw">
          <button class="btn btn-primary">
            <a href="recuperopw.php" target="_blank" rel="noopener noreferrer" style="color: white;">Modifica Password</a>
          </button>
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