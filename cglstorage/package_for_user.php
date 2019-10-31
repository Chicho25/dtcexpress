<?php
    ob_start();
    $packageclass="class='active'";
    $editPackageForUser="class='active'";
    include("include/config.php");
    include("include/defs.php");
    $loggdUType = current_user_type();

    include("header.php");

    if(!isset($_SESSION['USER_ID']))
     {
          header("Location: index.php");
          exit;
     }
      $bcName = Package_List;
      include("breadcrumb.php") ;
    ?>
    <?php // comprobar los paquetes que estan en session ?>
    <?php if (!isset($_SESSION['id_session'])) {
      $_SESSION['id_session'] = session_id();
    } ?>
    <?php $comprobar = GetRecords("SELECT count(*) as contar from packages_temp where id_session <> '".$_SESSION['id_session']."'"); ?>
    <?php foreach ($comprobar as $key => $value) {
          $contar = $value['contar'];
    } ?>
    <?php if ($contar > 0) {
          DeleteRec("packages_temp", "(1=1)");
    }
    ?>
    <?php ////////////////////////////////////////////// ?>
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    <?php echo $message; ?>
                        <h5><?php echo Package_List?></h5>
                    </div>
                    <div class="ibox-content">
                      <form method="post" id="id_track_form">
                        <div class="row wrapper ">
                          <div class="col-sm-5 m-b-xs">
                            <select class="chosen-select form-control" name="customer" style="width:100%;" required="required">
                              <option value="">---------</option>
                              <?PHP
                              $where = ($loggdUType != 'Master') ? " and id_user = ".$_SESSION['USER_ID']." and id_company = ".$_SESSION['USER_COMPANY'] : '';
                              $arrKindMeetings = GetRecords("Select * from customer where stat=1 $where");
                              foreach ($arrKindMeetings as $key => $value) {
                                  $kinId = $value['id'];
                                  if($value['membernumber'] != "")
                                  $kinDesc = $value['name']." - ".$value['membernumber'];
                                  else
                                  $kinDesc = $value['name']; ?>
                              <option value="<?php echo $kinId?>" <?php if (isset($_SESSION['id_customer']) && $_SESSION['id_customer'] == $kinId){ echo 'selected'; }?>><?php echo $kinDesc?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-sm-3 m-b-xs pull-right">
                            <div class="input-group">
                              <span class="input-group-btn padder ">
                                <input type="button" class="btn btn-success btn-rounded" value="<?php echo Search?>" onclick="carga_track()">
                              </span>
                            </div>
                          </div>
                          <div class="col-sm-4 m-b-xs ph0 pull-right" >
                            <div class="input-group">
                              <input type="text" class="form-control" style="width:100%;" value="<?php echo $name?>" name="trank_number" id="trakin">
                            </div>
                          </div>
                        </div>
                      </form>
                        <script>
                        <?php if (isset($_GET['delete'])) { ?>

                          var url_act = 'track_temp.php';
                          fetch(url_act)
                          .then(res => {
                            return res.text();
                          })
                          .then(resFrond => document.querySelector("#datos").innerHTML = resFrond)

                        <?php } ?>
                            function guardar_tracks(){
                              let form = new FormData(document.querySelector("#guardar_form"));
                              var url_gur = 'track_temp.php';
                              fetch(url_gur, {
                                method: 'POST',
                                body: form
                              })
                              .then(res => {
                                return res.text();
                              })
                              .then(resFrond => document.querySelector("#datos").innerHTML = resFrond)

                            }

                            function carga_track(){
                                let formulario = new FormData(document.getElementById("id_track_form"));
                                var url = 'track_temp.php';
                                fetch(url, {
                                  method: 'POST',
                                  body: formulario
                                })
                                .then(respuesta => {
                                  return respuesta.text();
                                })
                                .then(respuestaJson => document.querySelector("#datos").innerHTML = respuestaJson)
                                // limpiar text track
                                document.querySelector("#trakin").value = "";
                                // fokus
                                document.querySelector("#trakin").focus();
                            }
                        </script>
                        <div class="table-responsive">
                          <div id="datos">
                          </div>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').show().attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById("trakin").focus();
  </script>
<?php
  include("footer.php");
?>
