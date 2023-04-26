<?php 

include_once '../../config.php';
include "../../Controller/paiementC.php";

$paiementC = new paiementC();

$prod=$paiementC->supprimerpaiement($_POST['id_paiement']);


header('location:http://localhost/skander/Views/Backend/index.php');

?>


