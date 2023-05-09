<?php 
include_once '../../config.php';
include "../../Controller/cordoneeC.php";
include "../../Model/cordonee.php";


if(!isset($_POST['id'])||!isset($_POST['id_paiement'])||!isset($_POST['mail'])||!isset($_POST['num']))
{
	echo "erreur de ";
}


$ser=new cordonee($_POST['id'],$_POST['num'],$_POST['mail'],$_POST['id_paiement']);

$cordoneeC = new cordoneeC();

$prod=$cordoneeC->Modifiercordo($ser);
header('location:affcordonee.php');




?>
