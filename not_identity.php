<?php
// sube y baja del imigranmte
// regalar el pasaje .. marleivis
// mujer de un imigrante
 ?>
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
    <!-- google -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body style="background-color:#f5f6f8;">
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
                            <h3 class="header-title"></h3>
                            <p class="text"><?php  ?>
                            <form class="" action="" method="get" >
                              <div class="form-group row">
                                <h3 style="color:white;">No identificados</h3>
                                <div class="col-sm-8 header-btn">
                                  <input type="text" id="track" class="form-control" name="track" value="" autocomplete="off">
                                </div>
                                <div class="col-sm-1" style="color:white;"></div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <div class="header-btn rounded-buttons">
                                    <input type="submit" style="width:100%;" name="" class="main-btn rounded-one" value="Buscar">
                                  </div>
                                </div>
                              </div>
                            </form><?php  ?>
                            <!--<img src="images/franja.jpg" alt="Header" style="position:absolute;">
                            <iframe name='iframe1' id="iframe1" src="https://globalexpresslog.com/paquetes-noidentificados/" frameborder='0' width='100%' height='600'>

                            </iframe>-->
                            </p>

                        </div> <!-- header content -->

                        <div class="header-image d-none d-lg-block">
                            <div class="image">
                                <img src="images/cajaboy.png" alt="Header" width="150">
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

    <?php
    if(isset($_POST['reclamar'])){

      require 'simple-html-dom-master/simple_html_dom.php';
      $request = array(
        'http' => array(
        'header' => "Content-Type: application/x-www-form-urlencoded",
        'method' => 'POST',
        'content' => http_build_query(array(
          'track' => $_POST['input_4']
        )),
      )
    );

    $context = stream_context_create($request);
    $html = file_get_html('https://globalexpresslog.com/paquetes-noidentificados/?filter_3='.$_POST['input_4'].'&mode=any', true, $context);

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>La solicitus de reclamo ha sido enviada</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

    }elseif(isset($_GET['track'])){
      require 'simple-html-dom-master/simple_html_dom.php';
      $request = array(
        'http' => array(
        'header' => "Content-Type: application/x-www-form-urlencoded",
        'method' => 'GET',
        'content' => http_build_query(array(
          'track' => $_GET['track']
        )),
      )
    );

    $context = stream_context_create($request);
    $html = file_get_html('https://globalexpresslog.com/paquetes-noidentificados/?filter_3='.$_GET['track'].'&mode=any', true, $context);

    //$imagen = $html ->find('img[class"preloader-logo" style="display:none;"]', 0);
    //echo $detalle1 = str_replace("../", "", $html ->find('table[class="ntextbig"]', 0));
    //$ocultar_enbacezado = $html ->find('div[class="mk-header-inner add-header-height" style="display:none;"]', 0);
    //echo $tracking = $html ->find('div[class="gform_body"]', 0);
    //echo $html->find('input[id="input_5_1"]',0)->class = 'form-control';;
    echo '<div class="container" style="background-color:#f5f6f8;">
            <div class="row">
              <div class="col-lg-12">';
    echo $result = $html ->find('div[class="gv-table-container"]',0);
    //echo $result = $html ->find('div[class="wpb_accordion_wrapper"]',0);
    //echo $result = $html ->find('div.vc_column-inner', 0)->plaintext;
    //foreach($html->find('input') as $element)
    //   echo $element. '<br>';
    echo '<h3>Reclamo de paquete</h3>';
    echo '<p>Una vez compruebe que su paquete está mal identificado llene los campos con la información requerida</p>';
    echo '<form action="https://globalexpresslog.com/paquetes-noidentificados/?filter_3='.$_GET['track'].'&mode=any" id="gform_5" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" value="DTC" name="input_1" class="form-control">';
    echo '<label>No. Tracking a reclamar</label>';
    echo '<input type="text" value="" name="input_4" class="form-control">';
    echo '<label>Tiene numero de saco?</label><br>';
    echo '<input name="input_7" type="radio" value="Si"> Si <br>';
    echo '<input name="input_7" type="radio" value="No"> No <br>';
    echo '<label>No. de saco</label>';
    echo '<input type="text" value="" name="input_6" class="form-control">';
    echo '<input type="hidden" value="pedroarrieta25@hotmail.com" name="input_5" class="form-control">';
    echo '<label>Agregar Nota(Opcional)</label>';
    echo '<textarea value="" name="input_3" class="form-control"></textarea>';
    echo '<input type="hidden" value="" name="input_8" class="form-control">';
    echo '<br>';
    echo '<div id="input_5_2" class="ginput_container ginput_recaptcha" data-sitekey="6LeAURoUAAAAALlJILjL3WMrQjb4C7MIGzghnTmI" data-theme="light" data-tabindex="0"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LeAURoUAAAAALlJILjL3WMrQjb4C7MIGzghnTmI&amp;co=aHR0cHM6Ly9nbG9iYWxleHByZXNzbG9nLmNvbTo0NDM.&amp;hl=es-419&amp;v=v1565591531251&amp;theme=light&amp;size=normal&amp;cb=7qax95g064vw" width="304" height="78" role="presentation" name="a-k1e0rnft21jk" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>';
    echo '<br>';
    echo '<input type="submit" class="btn btn-primary" value="RECLAMAR" name="reclamar">';
    echo '<input type="hidden" class="gform_hidden" name="is_submit_5" value="1">
          <input type="hidden" class="gform_hidden" name="gform_submit" value="5">
          <input type="hidden" class="gform_hidden" name="gform_unique_id" value="">
          <input type="hidden" class="gform_hidden" name="state_5" value="WyJbXSIsIjFiYWYyOGQwNzg1NTM3ZWE4N2VmM2VkZmM3NzUyYTg4Il0=">
          <input type="hidden" class="gform_hidden" name="gform_target_page_number_5" id="gform_target_page_number_5" value="0">
          <input type="hidden" class="gform_hidden" name="gform_source_page_number_5" id="gform_source_page_number_5" value="1">
          <input type="hidden" name="gform_field_values" value="">';
    echo '</form>
        </div>
      </div>
    </div>'; ?>
    <?php //echo $form = $html ->find('form[id="gform_5"]',0);
    //echo $html;
    } ?>
    <!-- Optional JavaScript -->
    <script type="text/javascript">
      document.querySelector("#track").focus();
    </script>
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
