<!DOCTYPE html>
<html>
    <head>
        <title>Pdf livraison</title>
</head>
<body>
<?php

require ("fpdf.php");
include "../../Controller/UserC.php";

include_once "../../config.php";
$UserC=new UserC();
$listuser = $UserC->listUser();

$db = config::getConnexion();

$display_heading = array( 'login'=> 'login', 'email'=> 'email','pswd'=> 'pswd','ddn'=> 'ddn',);
$sql = "SELECT login, email, pswd, ddn FROM user";
$result= $db->query($sql);
$header = "SHOW COLUMNS(login,email,pswd,ddn) FROM user";
$pdf = new  FPDF();



$pdf->AddPage();
$pdf->SetFont("Arial","B",19);


$pdf->Cell(210,10,"liste des Utilisateurs",1,1,'C');

$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(55,12,"login","1","0","C");
$pdf->Cell(55,12,"email","1","0","C");
$pdf->Cell(55,12,"pswd","1","0","C");
$pdf->Cell(55,12,"ddn","1","0","C");
foreach($header as $heading) {
$pdf->Cell(50,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(55,12,$column,1);
}
$pdf->Output('user','I','false');


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}







?>


</body>
</html>