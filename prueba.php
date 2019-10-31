<?php
      if (isset($_POST['nombre1'])) {
        echo 'boton 1';
      }elseif(isset($_POST['nombre2'])){
        echo 'boton 2';
      }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prueba de pregistros</title>
  </head>
  <body>
    <form class="" action="" method="post">
      <input type="submit" name="nombre1" value="boton 1">
      <input type="submit" name="nombre2" value="boton 2">
    </form>
  </body>
</html>
