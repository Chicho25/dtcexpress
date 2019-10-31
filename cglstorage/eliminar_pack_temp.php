<?php
include("include/config.php");
include("include/defs.php");
if (isset($_GET['id_pakage'])) {
    DeleteRec("packages_temp", "id_pakage = '".$_GET['id_pakage']."'");
    header("Location: package_for_user.php?delete=1");
}

 ?>
