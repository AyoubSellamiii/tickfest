<?php
session_start();
include "../../Controller/UserC.php";
include_once '../../Model/User.php';
$userC = new UserC();


if(isset($_REQUEST['search-btn']))
{
 $listuser = $userC->Recherche($_POST['search']);
}
else {
    $listuser = $userC->listUser();
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
            <script>
    function handleFormSubmit(event) {
      event.preventDefault(); // Prevents the default form submission behavior
      
      // Get the input value
      var searchValue = document.querySelector('input[name="search"]').value;
      
      // Perform any necessary processing or validation on the search value
      
      // Optional: Display the search value in the console
      console.log("Search value:", searchValue);
      
      // Optional: Perform an action based on the search value (e.g., send an API request, update the UI, etc.)
      // ...
    }
    
    // Attach the function to the form's submit event
    var form = document.querySelector('form');
    form.addEventListener('submit', handleFormSubmit);
  </script>
  
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
                            
                            
                            
                           
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['email'] ?>
                        <a href="disconnect.php" >Déconnecter</a>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                <table>
  <thead>
    <tr>
      <th>Login</th>
      <th>Email</th>
      <th>Date de naissance</th>
      <th>Image</th>
      <th>Mot de passe</th>
      <th>Date de création</th>
      <th>Role</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($listuser as $user) { ?>
    <tr>
      <td><?php echo $user['login'];?></td>
      <td><?php echo $user['email']; ?></td>
      <td><?php echo $user['ddn']; ?></td>
      <td><img src="<?php echo $user['img'];?>" width="50" height="50"></td>
      <td><?php echo $user['pswd']; ?></td>
      <td><?php echo $user['date_creation']; ?></td>
      <td><?php echo $user['role']; ?></td>
      <td><a href="deleteuser.php?id=<?php echo $user['id'] ?>" >Supprimer</a>
      <a href="edit.php?id=<?php echo $user['id'] ?>" >Modifier</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <div>
        <center>
            <form action="pdf.php">
    <button  class="btn btn-primary me-2 "   >Exporter PDF</button></form>
    </center>
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