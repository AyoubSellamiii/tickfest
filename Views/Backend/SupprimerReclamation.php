<?php
  include_once '..\..\Model\Reclamation.php';
  include_once '..\..\Controller\ReclamationC.php';

    $ReclamationC = new ReclamationC();
    $ReclamationC->supprimerReclamation($_GET['id_reclamtion']);
    header('Location:reclamationadmin.php');
?>