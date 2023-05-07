
<?php
include 'C:\xampp\htdocs\rayen-gestion-reclamtion\Controller\ReponseC.php';
$ReponseC = new ReponseC();
if (isset($_GET['idd'])) {
    $listeReponse = $ReponseC->recherche($_GET['idd']);}
else if(isset($_POST['tri'])) {
    $listeReponse = $ReponseC->triReponse();
 }else {
    $listeReponse = $ReponseC->afficherReponse();
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
<head>
<meta charset="utf-8">
   
</head>

<body>


    <button><a href="ajouterRéponse.php">Ajouter une Reponse</a></button>
    <form action="" method="POST">
  
    
</form>

    <center>
        <h1>Liste des Reponses </h1>
    </center>
    <table border="1" align="center" class="table table-bordered">
        <tr>
            <th>idreponse</th>
            <th>date</th>
            <th>description</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
		foreach ($listeReponse as $Reponse) {
		?>
        <tr>
            <td><?php echo $Reponse['idreponse']; ?></td>
            <td><?php echo $Reponse['date']; ?></td>
            <td><?php echo $Reponse['description']; ?></td>
           
            <td>
                <form method="POST" action="ModifierReponse.php">
                    <input type="submit" name="Modifier" value="Modifier">
                    <input type="hidden" value=<?PHP echo $Reponse['idreponse']; ?> name="idreponse">
                </form>
            </td>
            <td>
            <a href="SupprimerReponse.php?idreponse=<?php echo $Reponse['idreponse'] ; ?>"><img src="supp.png" witdh='25px' height='25px'></a>

            </td>
        </tr>
        <?php
		}
		?>
        </table>
    </body>


    <!-- Template Javascript -->
    <script src="../../js/main.js"></script>
</html>



