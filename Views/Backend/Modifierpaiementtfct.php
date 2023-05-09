<?php 
include_once '../../config.php';
include "../../Controller/paiementC.php";


if(!isset($_POST['id'])||!isset($_POST['nom'])||!isset($_POST['statu']))
{
	echo "erreur de ";
}




$paiementC = new paiementC();

$prod=$paiementC->Modifierpaiement($_POST['id'],$_POST['nom'],$_POST['statu']);
header('location:index_paiement.php');




?>
