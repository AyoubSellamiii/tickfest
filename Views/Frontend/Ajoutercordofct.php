<?php 
include_once '../../config.php';
include "../../Controller/cordoneeC.php";
include "../../Model/cordonee.php";

if(!isset($_POST['id'])||!isset($_POST['id_part'])||!isset($_POST['num'])||!isset($_POST['mail']))
{
	echo "erreur de ";
}




$cordoneeC = new cordoneeC();

$ser=new cordonee($_POST['id'],$_POST['num'],$_POST['mail'],$_POST['id_part']);



$prod=$cordoneeC->Ajoutercordo($ser);

header('location:http://localhost/skander/Views/Frontend/profile.php');




?>
