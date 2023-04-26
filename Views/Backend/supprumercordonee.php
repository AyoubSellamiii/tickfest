<?php 

include_once '../../config.php';
include "../../Controller/cordoneeC.php";

$cordoneeC = new cordoneeC();

$prod=$cordoneeC->supprimercordonee($_POST['id_cordo']);


header('location:http://localhost/skander/Views/Backend/affcordonee.php');

?>


