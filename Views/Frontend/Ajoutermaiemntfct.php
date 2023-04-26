<?php 
include_once '../../config.php';
include "../../Controller/paiementC.php";
include "../../Model/paiement.php";

if(!isset($_POST['id'])||!isset($_POST['nom'])||!isset($_POST['prix'])||!isset($_POST['nbr'])||!isset($_POST['method']))
{
	echo "erreur de ";
}


$x=$_POST['prix']*$_POST['nbr'];

$paiementC = new paiementC();

$ser=new paiement($_POST['id'],$_POST['nom'],$x,$_POST['nbr'],$_POST['method'],0);



$prod=$paiementC->Ajouterpartenaire($ser);

header('location:http://localhost/skander/Views/Frontend/formulairecordonee.php');




?>
