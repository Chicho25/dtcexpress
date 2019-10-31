<?php

    ob_start();
    $packageclass="class='active'";
    $importPackageclass="class='active'";

    include("include/config.php");
    include("include/defs.php");
    $loggdUType = current_user_type();

    function comprobar($numero_track){
        $comprbar = GetRecords("SELECT count(*) as contar, trackingno FROM package WHERE trackingno ='".$numero_track."'");
        foreach ($comprbar as $key => $value) {
          $contar = $value['contar'];
          $n_track = $value['trackingno'];

          return $track = array("contar" => $contar, "n_track" => $n_track);
        }
    }

    include("header.php");

    if(!isset($_SESSION['USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     $getCompanyInfo = GetRecord("company", "id = ".$_SESSION['USER_COMPANY']);
     $message="";

     if(isset($_POST['n_invoice']) && $_POST['n_invoice'] != "")
     {

        if (isset($_FILES['excel'])) {

            include 'SimpleXLSX.php';
            $fileTmpPath = $_FILES['excel']['tmp_name'];
            $fileName = $_FILES['excel']['name'];
            $nuevo_nombre = rand(1, 999).$fileName;
            if(move_uploaded_file($fileTmpPath, 'excel/'.$nuevo_nombre))
            {
              $message ='Archivo Subido.';
              $xlsx = new SimpleXLSX('excel/'.$nuevo_nombre);
              $comprobar = 0;
              foreach ($xlsx->rows() as $fields)
              {
                $array_validar = comprobar($fields[2]);
                  if ($array_validar['contar'] != 0) {
                      $comprobar = 1;
                      $numero_track = $array_validar['n_track'];
                      break;
                  }
               }
            }
            else
            {
              $message = 'ubo un verguericidio';
            }
          }

        if ($comprobar == 1) {
          $message = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Este tracking ya se encuentra en la base de datos '.$numero_track.'</strong>
                      </div>';
        }else{

       $import_cvs = array("name" => $_POST['n_invoice'],
                            "date" => date("Y-m-d H:i:s"),
                            "stat" => 1,
                            "id_user" => $_SESSION['USER_ID'],
                            "descrition" => $_POST['description'],
                            "peso" => $_POST['peso'],
                            "amount" => $_POST['amount'],
                            "rute" => 'excel/'.$nuevo_nombre);

        $ID_IMPORT = InsertRec("importacion_cvs", $import_cvs);

        $i = 0;
        foreach ($xlsx->rows() as $fields) {
          $i++;
          if ($i == 1) {
            continue;
          }

          $buscar=array(chr(13).chr(10), "\r\n", "\n", "\r");
          $reemplazar=array("", "", "", "");
          $track=str_ireplace($buscar,$reemplazar,$fields[2]);

          $arrVal = array(
              "number"=> $fields[0],
              "type" => $fields[1],
              "trackingno" => $track,
              "length" => $fields[3],
              "height" => $fields[4],
              "width" => $fields[5],
              "widthlb" => $fields[6],
              "volume" => $fields[7],
              "totaltopay" => $fields[8],
              "id_user" => $_SESSION['USER_ID'],
              "id_company" => $_SESSION['USER_COMPANY'],
              "stat" => 1,
              "created_on" => date("Y-m-d H:i:s"),
              "id_import_cvs" => $ID_IMPORT
             );

             $NID = InsertRec("package", $arrVal);

          }

    if (isset($NID)) {
      $message = '<div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Registro Realizado con Exito</strong>
                  </div>';
    }
   }
 }
?>
  <?php
      $bcName = Import_Package;
      include("breadcrumb.php") ;
    ?>
  <div class="wrapper wrapper-content animated fadeInRight ecommerce">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5><?php echo 'Importar Paquetes';?></h5>
          </div>
          <div class="ibox-content">
            <form class="form-horizontal" role="form" method="post"  enctype="multipart/form-data">
                      <?php
                      if($message !="")
                          echo $message;
                ?>
                          <div class="form-body">
                              <h3 class="form-section"><?php echo 'Registrar';?></h3>
                              <div class="row">
                                  <div class="col-xs-12">
                                      <div class="form-group clearfix">
                                         <div class="col-sm-9 ">
                                            <div class="form-group">
                                              <input type="text" autocomplete="off" required placeholder="Numero de Factura" name="n_invoice" class="form-control">
                                            </div>
                                            <div class="form-group">
                                              <input type="text" autocomplete="off" placeholder="Peso" name="peso" class="form-control">
                                            </div>
                                            <div class="form-group">
                                              <input type="text" autocomplete="off" required placeholder="Monto" name="amount" class="form-control">
                                            </div>
                                            <div class="form-group">
                                              <input type="file" name="excel" class="form-control">
                                              <!--<textarea placeholder="Descripcion" name="description" class="form-control"></textarea>-->
                                            </div>
                                            <div class="form-group">
                                              <!--<textarea rows="8" cols="80" required placeholder="Traking" name="n_traking" class="form-control"></textarea>-->

                                            </div>
                                            <div class="form-group">
                                               <button  class="btn btn-primary">Registrar</button>
                                            </div>
                                         </div>
                                         <!-- ngIf: showprogbar -->
                                      </div>
                                  </div>
                              </div>
                              <!--/row-->
                          </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
<?php
  include("footer.php");
?>
