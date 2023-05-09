

<?php

include_once '..\..\Model\Reponse.php';
include_once '..\..\Controller\ReponseC.php';
$error = "";

    // create adherent
    $Reponse = null;
    $ReponseC = new ReponseC();
    if (
    isset($_POST["idreponse"]) &&
    isset($_POST["date"])&&
    isset($_POST["description"])
   
    ) {
        if (
            !empty($_POST["idreponse"]) &&
            !empty($_POST["date"]) &&
            !empty($_POST["description"]) 
            
        ) {
            $Reponse = new Reponse(
                $_POST['idreponse'],
                new DateTime($_POST['date']),
                $_POST['description']
               
            );
            $ReponseC->ajouteReponse($Reponse);
           
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
                            <div class="sb-sidenav-menu-heading">Gestion Reclamation</div>
                            <a class="nav-link" href="Reclamationliste.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Afficher tous
                            </a>
                            <div class="sb-sidenav-menu-heading">Gestion Paiement</div>
                            <a class="nav-link" href="index_paiement.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Afficher tous
                            </a>
                            <div class="sb-sidenav-menu-heading">Gestion Cordonees</div>
                            <a class="nav-link" href="affcordonee.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Afficher tous
                            </a>
                            <div class="sb-sidenav-menu-heading">Gestion Commande</div>
                            <a class="nav-link" href="index_commande.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Afficher tous
                            </a>
                        
                            
     
                        </div>
                    </div>
                    
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                <table>

        <button><a href="Reponseadmin.php">Retour à la liste des Reponses</a></button>
        <hr>
        
        <div idreponse="error">
            <?php echo $error; ?>
        </div>
        <form action="" method="POST">
        <form action="Reponseliste.php" method="GET" id="form-submit">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idreponse">idreponse:
                        </label>
                    </td>
                    <td><input type="number" name="idreponse" id="idreponse"></td>
                </tr>

                <tr>
                    <td>
                        <label for="date">Date:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date" id="date" >
                    </td>
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
