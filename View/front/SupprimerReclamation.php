<?php
    require_once 'C:\xampp\htdocs\rayen-gestion-reclamtion\Controller\ReclamationC.php';

    $ReclamationC = new ReclamationC();
    $ReclamationC->supprimerReclamation($_GET['id_reclamtion']);
    header('Location:reclamationadmin.php');
?>