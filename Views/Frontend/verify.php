<?php
session_start();
include "../../Controller/UserC.php";
include_once '../../Model/User.php';



  $clientC = new UserC();
  $message="";
if (isset($_POST["email"])&&isset($_POST["pswd"]))
   { 
    if (!empty($_POST["email"])&&
    !empty($_POST["pswd"])
       )
       { 
           $message=$clientC->connexionUser($_POST["email"],$_POST["pswd"]);
          
          
           echo $message;
           if ($message!='pseudo ou le mot de passe est incorrect')
           {
            if($_SESSION['role']=="Admin")
            header('Location:../Backend/index.php');
            else 
              header('Location:home.php');
          
           }
               else
                 {
               $message='pseudo ou le mot de passe est incorrect';
               echo $message;
               
               
                 }


       }
       else
      { 
        $message="Missing information";
       echo $message;}
}
?>