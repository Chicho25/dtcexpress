<!doctype html>
<html lang="en">
  <head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title>DTC - Express</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="navbar-area navbar-one navbar-transparent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="#">
                            <img src="images/dtc-logo.png" alt="Logo" width="150">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item active">
                                    <a class="page-scroll" href="index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="tracking.php">Tracking</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#portfolio">Paquetes mal identificados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="dimenciones_calculo_paquetes.php">Calcular Volumen</a>
                                </li>
                                <!--<li class="nav-item">
                                    <a class="page-scroll" href="#contact">Contact</a>
                                </li>-->
                            </ul>
                        </div>
                        <div class="navbar-btn d-none d-sm-inline-block">
                            <ul>
                                <li><a class="light" href="index.php">DTC Express</a></li>
                            </ul>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    <div id="home" class="header-content-area d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-wrapper">
                        <div class="header-content">
                          <div class="container">
                            <h1 class="contact-title" style="color:white;">Calculadora</h1>
                            <p style="color:white;">Calcula el volumen de un paquete ingresando las dimenciones en pulgadas (")</p>
                            <div class="form-group">
                              <h4 class="contact-title" style="color:white;">Alto (")</h4>
                              <input value="" class="form-control" name="" id="alto" onkeyup="calculo();" placeholder="Alto en pulgadas">
                              <h4 class="contact-title" style="color:white;">Ancho (")</h4>
                              <input value="" class="form-control" name="" id="ancho" onkeyup="calculo();" placeholder="Ancho en pulgadas">
                              <h4 class="contact-title" style="color:white;">Largo (")</h4>
                              <input value="" class="form-control" name="" id="largo" onkeyup="calculo();" placeholder="Largo en pulgadas">
                              <h4 class="contact-title" style="color:white;">Resultado</h4>
                              <!--<input value="" class="form-control" name="" id="resultado">-->
                              <div class="resultado" style="font-size:32px; color:white;">

                              </div>
                            </div>
                          </div>
                        </div> <!-- header content -->

                        <div class="header-image d-none d-lg-block">
                            <div class="image">
                                <img style="" src="images/calculadora.png" alt="Header">
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="header-shape">
            <img src="assets/images/header-shape.svg" alt="shape">
        </div> <!-- header-shape -->
    </div>


    <script type="text/javascript">
      function calculo(){
        var alto = document.querySelector("#alto").value;
        var ancho = document.querySelector("#ancho").value;
        var largo = document.querySelector("#largo").value;

        if(isNaN((parseFloat(alto) + parseFloat(ancho) + parseFloat(largo))/166.7)){
          document.querySelector(".resultado").innerHTML = 0;
          //document.querySelector("#resultado").value = 0;
        }else{
          //document.querySelector("#resultado").value = (parseFloat(alto) + parseFloat(ancho) + parseFloat(largo))/166.7;
          document.querySelector(".resultado").innerHTML = "" + Math.ceil((parseFloat(alto) * parseFloat(ancho) * parseFloat(largo))/166.7) + " Libras </br>" +
          Math.ceil((parseFloat(alto) * parseFloat(ancho) * parseFloat(largo))/1728) + " Pie Cubico";
        }
      }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    <!--====== BACK TOP TOP PART ENDS ======-->
    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <!--====== Images Loaded js ======-->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!--====== Scrolling Nav js ======-->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>
    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
