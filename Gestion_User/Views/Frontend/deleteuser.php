<?php
session_start();
include "../../Controller/UserC.php";
include_once '../../Model/User.php';

if(isset($_GET['id']))
{
    $userC= new UserC();
    $userC->deleteUser($_GET['id']);
    session_destroy();

    header('Location: Inscrire.php');
}

?>

