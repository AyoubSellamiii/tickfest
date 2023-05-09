<?php
    include_once '..\..\Model\Reponse.php';
    include_once '..\..\Controller\ReponseC.php';

    $ReponseC = new ReponseC();
    $ReponseC->supprimerReponse($_GET['idreponse']);
    header('Location:reponseadmin.php');
?>