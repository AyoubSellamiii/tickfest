<?php

include_once 'C:\xampp\htdocs\rayen-gestion-reclamtion\Model\Reclamation.php';
include_once 'C:\xampp\htdocs\rayen-gestion-reclamtion\Controller\ReclamationC.php';
$error = "";

    // create adherent
    $reclamation = null;
    $reclamationC = new ReclamationC();
    if (
    isset($_POST["id_reclamtion"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["contact"]) &&
    isset($_POST["description"])&&
    isset($_POST["date_creation"]) &&
    isset($_POST["type"]) 
    ) {
        if (
            !empty($_POST["id_reclamtion"]) &&
            !empty($_POST["sujet"]) &&
            !empty($_POST["contact"]) &&
            !empty($_POST["description"]) &&
            !empty($_POST["date_creation"])&&
            !empty($_POST["type"])  
        ) {
            $reclamation = new Reclamation(
                $_POST['id_reclamtion'],
                $_POST['sujet'],
                $_POST['contact'],
                $_POST['description'],
                new DateTime($_POST['date_creation']),
                $_POST['type']
              
            );
            $reclamationC->ajouteReclamation($reclamation);
           
        }
        else
            $error = "Missing information";
    }
  
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">TickFest</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="POST">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." name="search" />
                    <button class="btn btn-primary"  name="search-btn"  type="submit"></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                   
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Gestion Utilisateurs</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Afficher tous
                            </a>
                            <a class="nav-link" href="adduser.php" > 
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ajouter user 
                            </a>
                            <a class="nav-link" href="AjouterRéponse.php" > 
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Ajouter réponse 
                        </a>

                        <a class="nav-link" href="AjouterReclamation.php" > 
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Ajouter reclamation 
                        </a>
                        
                            
     
                        </div>
                    </div>
                    
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                <table>

        <button><a href="reclamationadmin.php">Retour à la liste des reclamations</a></button>
        <hr>
        
        <div id_reclamtion="error">
            <?php echo $error; ?>
        </div>
        <form action="" method="POST">
        <form action="View/AjouterReclamation.php" method="GET" id="form-submit">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_reclamtion">id_reclamtion:
                        </label>
                    </td>
                    <td><input type="number" name="id_reclamtion" id="id_reclamtion" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="sujet">sujet:
                        </label>
                        <small class="form-text text-error" id="sub-error"></small>
                    </td>
                    <td><input type="text" name="sujet" id="sujet" maxlength="50"></td>
                </tr>
				<tr>
                    <td>
                        <label for="contact">Contact:
                        </label>
                        <small class="form-text text-error" id="sub-error"></small>
                    </td>
                    <td><input type="email" name="contact" id="contact" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description:
                        </label>
                        <small class="form-text text-error" id="com-error"></small>

                    </td>
                    <td><input type="text" name="description" id="description" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="date_creation">Date Creation:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_creation" id="date_creation" >
                    </td>
              
                    <tr>
                    <td>
                        <label for="type">Type:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="type" id="type">
                    </td>
                </tr>
                   
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
        </form>
       


    </body>
    
</html>