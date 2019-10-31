<?php
ob_start();
session_start();
include("include/config.php");
include("include/defs.php");

if (!isset($_SESSION['id_customer'] )) {
    $_SESSION['id_customer'] = $_POST['customer'];
}

$mensaje = '';

if (isset($_GET['delete'])) {
$mensaje = '<h3 style="color:red;">Paquete quitado de la lista!</h3>';
}

if(isset($_POST['id_packages'])){
    foreach ($_POST['id_packages'] as $key => $value) {
      echo 'pasando'.$value.'<br>';
    }
}


if(isset($_POST['trank_number'])){
// comprobar
$comprobar = GetRecords("SELECT
                          count(*) as contar
                          from package p inner join packages_temp pt on p.id = pt.id_pakage
                          where
                          p.trackingno = '".$_POST['trank_number']."'");

foreach ($comprobar as $key => $value) {
    $comprobar_paketes = $value['contar'];
}
if ($comprobar_paketes > 0) {

  $mensaje = '<h3 style="color:orange;">Track ya registrado!</h3>';

}else{

$comprobar_contar = GetRecords("SELECT count(*) as contar from package where trackingno = '".$_POST['trank_number']."' and stat = 1");
foreach ($comprobar_contar as $key => $value) {
  if ($value['contar']==0) {
  $mensaje = '<h3 style="color:orange;">El paquete no existe o no ha sido cargado o ya esta en facturacion</h3>';
      }else{
  $stmt = GetRecords("SELECT * from package where trackingno = '".$_POST['trank_number']."' and stat = 1");
  foreach ($stmt as $key => $value) {
    InsertRec("packages_temp", array("id_pakage"=>$value['id'],
                                     "id_session"=>$_SESSION['id_session'],
                                     "id_customer"=>$_SESSION['id_customer']));
        }
      }
    }
  }
}
$obtener_pquetes = GetRecords("SELECT pt.id_pakage,
                                      p.trackingno,
                                      p.totaltopay,
                                      p.widthlb
                                      from package p inner join packages_temp pt on p.id = pt.id_pakage
                                      where
                                      pt.id_customer = '".$_SESSION['id_customer']."'
                                      and
                                      p.stat = 1");
//echo json_encode($stmt);
//echo json_encode($_POST['trank_number']);
?>
<?php echo $mensaje; ?>
<form id="guardar_form">
<table class="table table-striped table-bordered table-hover dataTables-example">
<thead>
<tr>
    <th><?php echo 'ID';?></th>
    <th><?php echo 'Numero de track'?></th>
    <th><?php echo 'Costo'; ?></th>
    <th><?php echo 'Peso';?></th>
    <th><?php echo Action?></th>
</tr>
</thead>
<tbody>
<?PHP
$i=1;
$peso_total = 0;
$monto_total = 0;?>

<?php foreach ($obtener_pquetes as $key => $value) { ?>
<tr>
    <td class="tbdata"> <?php echo $value['id_pakage']?>
      <input type="hidden" value="<?php echo $value['id_pakage']?>" name="id_packages[]">
    </td>
    <td class="tbdata"> <?php echo utf8_decode($value['trackingno'])?> </td>
    <td class="tbdata"> <?php echo $value['totaltopay']?> </td>
    <td class="tbdata"> <?php echo $value['widthlb']?> </td>
    <td>
      <a href="eliminar_pack_temp.php?id_pakage=<?php echo $value['id_pakage']?>" onclick="guardar_eliminar(1)" class="btn btn-danger btn-info"><?php echo 'Quitar de la lista';?></a>
    </td>
</tr>
<?php
$peso_total += $value['widthlb'];
$monto_total += $value['totaltopay'];
}
?>

<tr>
    <td class="tbdata">  </td>
    <td class="tbdata">  </td>
    <td class="tbdata"> <?php echo 'Monto Total: '.$monto_total?> </td>
    <td class="tbdata"> <?php echo 'Peso Total: '.$peso_total?> </td>
    <td>
    <input type="button" onclick="guardar_tracks()" class="btn btn-primary btn-info" value="<?php echo 'Guardar';?>">
    </td>
</tr>
</tbody>
</table>
</form>
