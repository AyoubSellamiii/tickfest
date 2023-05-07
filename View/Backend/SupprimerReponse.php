<?php
    require_once 'C:\xampp\htdocs\rayen-gestion-reclamtion\Controller\ReponseC.php';

    $ReponseC = new ReponseC();
    $ReponseC->supprimerReponse($_GET['idreponse']);
    header('Location:reponseadmin.php');
?>