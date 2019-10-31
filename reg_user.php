<?php $messaje = ""; ?>
<?php include("config/config.php"); ?>
<?php include("config/defs.php"); ?>
<?php if (isset($_POST['register'])) {

      $obtener_numero = GetRecords2("SELECT max(membernumber) as numero FROM customer WHERE membernumber REGEXP ('^[0-9]+$')");
      foreach ($obtener_numero as $key => $value) {
        $max_number = $value['numero'];
      }

      $numero_max_1 = $max_number + 1;

      $array_reg = array("user_name"=>$_POST['name_customer'],
                         "email"=>$_POST['email'],
                         "phone"=>$_POST['phone'],
                         "stat"=>1,
                         "date_time"=>date("Y-m-d H:i:s"),
                         "number_member"=>$numero_max_1);

      $array_reg_cgl = array("name"=>$_POST['name_customer'],
                         "email"=>$_POST['email'],
                         "phone"=>$_POST['phone'],
                         "stat"=>1,
                         "created_on"=>date("Y-m-d H:i:s"),
                         "membernumber"=>$numero_max_1,
                         "id_user"=>$numero_max_1,
                         "id_membership"=>3,
                         "id_company"=>1
                         );

      $InR_cgl = InsertRec2("customer", $array_reg_cgl);
      $InR = InsertRec("dtc_users", $array_reg);

        $messaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Gracias por Registrarse!</strong> se ha enviado la informacion de envio y
                      terminos y condiciones a su correo electronico
                      por favor, revise su correo.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';

      $html = 'Bienvenid@ a DTC Express
Le hacemos llegar los detalles de los datos que debe colocar al momento que realice sus compras online o si desea que le manden algo desde Estados Unidos a Panamá.

                    DTC '.$_POST['name_customer'].' Nº '.$numero_max_1.'
                    1345 Nw 98Th Ct Unit 2
                    Miami, Florida 33172
                    TEL: 7863602816

                A continuación los servicios que ofrecemos y su tarifa.
                En DTC Express manejamos la tarifa única de $2.50 la libra (peso o volumen) el que sea mayor.
                Para su beneficio contamos con vuelos diarios de Lunes a Viernes de Miami a Panamá.
                Sus paquetes demoran 3 días hábiles aproximados en llegar a Panamá y ser entregados.
                Todas sus compras online o envíos que solicite deben llevar sus siglas DTC delante de su nombre, de no ponerlo no nos hacemos responsables de esos paquetes.
                Para servicio marítimo se debe cotizar, ya que tiene un costo mínimo de $300.
                Cualquier consulta estamos a la orden.

                Saludos,

                Silvana Medina
                Gerente DTC Express
                Tel: +507 6062-0511
                silvana@dtcexpress.net
                https://dtcexpress.net/
                ';

      $html2 = "Se ha registrado un cliente
                Estos son los datos
                Numero de Cliente: ".$numero_max_1."
                Nombre: ".$_POST['name_customer']."
                Email: ".$_POST['email']."
                Tef: ".$_POST['phone']."
                Fecha de registro: ".date("Y-m-d H:i:s")."";

$subject = 'DTC express Informacion de envio y servicio';
$subject2 = 'Cliente registrado dtcexpress.net';

$para      = $_POST['email'];
$cabeceras = 'From: silvana@dtcexpress.net' . "\r\n" .
    'Reply-To: silvana_82@hotmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $subject, $html, $cabeceras);

$para2      = 'silvana@dtcexpress.net';
$cabeceras2 = 'From: tayronperez17@gmail.com' . "\r\n" .
    'Reply-To: pedroarrieta25@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para2, $subject2, $html2, $cabeceras2);

}

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
                                <li><a class="light" href="reg_user.php">Registrate</a></li>
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
                            <p class="text">
                            <?php echo $messaje; ?>
                            <h3 class="header-title">Registro de usuario</h3>
                            <form action="" method="post" style="color:white;">
                              <div class="form-group">
                                <h4 class="contact-title" style="color:white;">Nombre Completo</h4>
                                <input type="text" required class="form-control" name="name_customer" placeholder="Nombre Completo">
                              </div>
                              <div class="form-group">
                              <h4 class="contact-title" style="color:white;">Email</h4>
                                <input type="email" required class="form-control" name="email" aria-describedby="Email" placeholder="Ingresa tu email">
                                <small id="emailHelp" class="form-text text-muted"></small>
                              </div>
                              <div class="form-group">
                              <h4 class="contact-title" style="color:white;">Telefono</h4>
                                <input type="text" required class="form-control" name="phone" placeholder="Telefono">
                              </div>
                              <br>
                              <button type="submit" name="register" class="main-btn rounded-one">Registrar</button>
                            </form>
                            </p>
                        </div> <!-- header content -->

                        <div class="header-image d-none d-lg-block">
                            <div class="image">
                                <img style="width:550px; margin-top:100px;" src="images/reg.png" alt="Header">
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


    <div class="container">

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
