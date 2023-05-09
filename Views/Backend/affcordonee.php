<?php
include_once '../../config.php';
include "../../Controller/cordoneeC.php";

$cordoneeC = new cordoneeC();
$prod=$cordoneeC->affichercordonee();

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
            <a class="navbar-brand ps-3" href="index.php">TickFest</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!"><?php echo $_SESSION['login']?></a></li>
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
                        <h2>Table Cordonee</h2>
                <table>
        <table  class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Numero</th>
                                            <th>Mail</th>
                                            <th>Id_paiement</th>
                                          
                                       
                                            <th> supprimer</th>
                                            <th> modifier</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
 <?php
foreach($prod as $pro){

?>

                                         
                                            <td><?php echo $pro['Numero'] ?></td>
            
                                            <td><?php echo $pro['adresse_mail'] ?></td>
                                            <td><?php echo $pro['id_paiement'] ?></td>
                                              
                                          
                              
   

                        
                           
                                            
        
                                   <td>     <form method="post" action="supprumercordonee.php">
<input type="submit" value="Supprimer"class="btn btn-primary btn-lg" >
<input type="hidden" value="<?php echo $pro['id_cordo'] ?>" name="id_cordo">
</form></td>
<td> 
<form method="GET" action="Modifiercordonee.php" >
<input type="submit" value="Modifier"class="btn btn-primary btn-lg" >
<input type="hidden" value="<?php echo $pro['id_cordo'] ?>" name="id_cordo">
</form></td>
                                            </td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
</table>
    </div>
                </main>
                <style>
                    .container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #FFFFFF;
  border-radius: 10px;
  box-shadow: 0px 0px 10px #AAAAAA;
}

.container table {
  width: 100%;
  border-collapse: collapse;
}

.container th, .container td {
  padding: 10px;
  text-align: left;
  border: 1px solid #DDDDDD;
}

.container th {
  background-color: #EEEEEE;
}
                    </style>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
