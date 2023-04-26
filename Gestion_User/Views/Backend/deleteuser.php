<?php

include "../../Controller/UserC.php";
include_once '../../Model/User.php';

if(isset($_GET['id']))
{
    $userC= new UserC();
    $userC->deleteUser($_GET['id']);

    header('Location: index.php');
}

?>

