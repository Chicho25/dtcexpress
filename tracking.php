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
                                    <a class="page-scroll" href="not_identity.php">Paquetes mal identificados</a>
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
                            <h3 class="header-title">Tracking</h3>
                            <p class="text">
                            <form class="" action="" method="post" >
                              <div class="form-group row">
                                <div class="col-sm-8 header-btn">
                                  <input type="text" id="track" class="form-control" name="track" value="" autocomplete="off">
                                </div>
                                <div class="col-sm-1" style="color:white;"></div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <div class="header-btn rounded-buttons">
                                    <input type="submit" style="width:100%;" name="" class="main-btn rounded-one" value="Track">
                                  </div>
                                </div>
                              </div>
                            </form>
                            </p>
                        </div> <!-- header content -->

                        <div class="header-image d-none d-lg-block">
                            <div class="image">
                                <img src="images/trackin.png" alt="Header">
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

    <section id="features" class="features-area pt-60 pb-100">
        <div class="container">
            <div class="row justify-content-center">

    <?php
      if(isset($_POST['track'])){
        require 'simple-html-dom-master/simple_html_dom.php';
        $request = array(
          'http' => array(
          'header' => "Content-Type: application/x-www-form-urlencoded",
          'method' => 'POST',
          'content' => http_build_query(array(
            'track' => $_POST['track']
          )),
        )
      );

      $context = stream_context_create($request);
      $html = file_get_html('http://fuzion.cargotrack.net/m/track.asp', true, $context);

      $imagen = $html ->find('img[style="display:none;"]', 0);
      $detalle1 = str_replace("../", "", $html ->find('table[class="ntextbig"]', 0));
      $detalle2 = $html ->find('table[class="insert"]', 0);
      $tracking = $html ->find('table', 5);
      $contar = strlen($tracking);
      if($contar == 0){ ?>

                <div class="col-lg-4 col-md-7 col-sm-9" style="margin-top:-150px;">
                    <div class="single-features text-center mt-40">
                        <div class="features-icon">
                        <i class="lni-keyword-research"></i>
                        </div>
                        <div class="features-content">
                            <h4 class="features-title"><a href="#">No encontrado</a></h4>
                            <p class="text">El Paquete no ha sido encontrado, posiblemente esta en camino a nuestro centro de acopio</p>
                            <div class="features-btn rounded-buttons">
                                <!--<a class="main-btn rounded-one" href="#">Leer mas</a>-->
                            </div>
                        </div>
                    </div> <!-- single features -->
                </div>

     <?php }elseif($contar >= 1){ ?>

                <div class="col-lg-4 col-md-7 col-sm-9" style="margin-top:-150px;">
                    <div class="single-features text-center mt-40">
                        <div class="features-icon">
                        <i class="lni-rocket"></i>
                        </div>
                        <div class="features-content">
                            <h4 class="features-title"><a href="#">En camino a Panama</a></h4>
                            <p class="text">El paquete se encuentra en camino a Panama</p>
                            <div class="features-btn rounded-buttons">
                                <!--<a class="main-btn rounded-one" href="#">Leer mas</a>-->
                            </div>
                        </div>
                    </div> <!-- single features -->
                </div>

     <?php }
    } ?>



                <?php /*
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features text-center mt-40">
                        <div class="features-icon">
                        <i class="lni-home"></i>
                        </div>
                        <div class="features-content">
                            <h4 class="features-title"><a href="#">En nuestras oficinas</a></h4>
                            <p class="text">Actualemnte el paquete se encuentra en nuestras oficinas!</p>
                            <div class="features-btn rounded-buttons">
                                <a class="main-btn rounded-one" href="#">Leer mas</a>
                            </div>
                        </div>
                    </div> <!-- single features -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features text-center mt-40">
                        <div class="features-icon">
                        <i class="lni-emoji-happy"></i>
                        </div>
                        <div class="features-content">
                            <h4 class="features-title"><a href="#">Entregado!</a></h4>
                            <p class="text">El paquete ha sido entregado!</p>
                            <div class="features-btn rounded-buttons">
                                <a class="main-btn rounded-one" href="#">Leer mas</a>
                            </div>
                        </div>
                    </div> <!-- single features -->
                </div>*/ ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!-- Optional JavaScript -->
    <script type="text/javascript">
      document.querySelector("#track").focus();
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <!--====== FOOTER PART ENDS ======-->
    <!--====== BACK TOP TOP PART START ======-->
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
