<?php
session_start();



include '../../Controller/UserC.php';

require_once '../../model/User.php';

$UserC = new UserC();

if (isset($_REQUEST['add'])) {
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      // echo "File is not an image.";
     // $uploadOk = 0;
  }


  // Check if file already exists
  if (file_exists($target_file)) {
      //  echo "Sorry, file already exists.";
     // $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      //  echo "Sorry, your file is too large.";
     // $uploadOk = 0;
  }

  // Allow certain file formats
  if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
  ) {
      //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //  $uploadOk = 0;
  }
  if ($uploadOk == 0) {
      header('Location:blank.php?error=1');
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          //echo 'aaaaaa';
         
          $UserC = new UserC();
          if (isset($_REQUEST['add'])) {
            $UserC = new UserC();
          $Now = new DateTime('now', new DateTimeZone('Europe/Paris'));
          $date = DateTime::createFromFormat('Y-m-d', $_POST['ddn']);
          
            $user = new User(1, $_POST['login'],$_POST['email'],$date,$target_file,$_POST['pswd'],$Now,$_POST['role'] );
            $UserC->register($user);
            
           
            header('Location:index.php');
          } 
         
      } else {
          echo 'error';
          //header('Location:blank.php');
      }
    
    }}

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
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['email'] ?>
                        <a href="disconnect.php" >Déconnecter</a>
                    </div>
                    
                </nav>
                
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <h1>Ajouter un utilisateur</h1>
                <div class="row justify-content-center mt-4">

<div class="col-lg-9">
<form action="" method="POST" enctype="multipart/form-data" class="php-email-form"  >
<div class="form-group">
<input placeholder="Login" type="text" name="login" class="form-control" id="login" required>
</div>
    
<div class="form-group">
<input placeholder="Email" type="text" name="email" class="form-control" id="email" required>
</div>

<div class="form-group">
<input placeholder="Date de naissance" type="date" name="ddn" class="form-control" id="ddn" required>
</div>

<div class="form-group">
<input placeholder="Password" type="password" name="pswd" class="form-control" id="pswd" required>
</div>

<div class="form-group">
<input placeholder="Confirm Password" type="password" name="confirm_pswd" class="form-control" id="confirm_pswd" required>
</div>

<div class="form-group">

<input required type="file" class="form-control" id="fileToUpload" name="fileToUpload">
<label for="fileToUpload" class="custom-file-upload">Choisir Image</label>
</div>
<select name="role" >
    <option>Admin</option>
    <option>Client</option>
</select>
<div class="my-3">
</div>

<div class="text-center">
<button type="submit" id="submit-btn" name="add" class="btn btn-primary me-2" onclick="return checkPassword()">Ajouter user</button>
</div>
</form>
</div><!-- End Contact Form -->

</div>
                </main>
                <script>
  function checkPassword() {
    var password = document.getElementById("pswd").value;
    var confirm_password = document.getElementById("confirm_pswd").value;

    if (password != confirm_password) {
      alert("Le mot de passe et la confirmation ne correspondent pas");
      return false;
    }
    return true;
  }
</script>
<script>
      document.addEventListener('DOMContentLoaded', function() {


var submitBtn = document.getElementById('submit-btn');


submitBtn.addEventListener('click', function(event) {
  var nomInput = document.getElementById('login');
  var nomValue = nomInput.value;


  if (/^[a-zA-Z]+$/.test(nomValue)) {
    // nom input is valid
  } else {
    event.preventDefault();
    var nomErrorMsg = document.createElement('span');
    nomErrorMsg.innerText = 'Le login  ne doit contenir que des lettres.';
    nomInput.parentNode.insertBefore(nomErrorMsg, nomInput.nextSibling);
  }


  


  var emailInput = document.getElementById('email');
  var emailValue = emailInput.value;


  if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
    // email input is valid
  } else {
    event.preventDefault();
    var emailErrorMsg = document.createElement('span');
    emailErrorMsg.innerText = 'Veuillez entrer une adresse email valide.';
    emailInput.parentNode.insertBefore(emailErrorMsg, emailInput.nextSibling);
  }
});


});
</script>
        
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
