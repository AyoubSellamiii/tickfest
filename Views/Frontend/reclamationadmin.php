
<?php
include_once '..\..\Model\Reclamation.php';
include_once '..\..\Controller\ReclamationC.php';
$reclamationC = new ReclamationC();
if (isset($_GET['id_reclamtion'])) {
    $listeReclamation = $reclamationC->recherche($_GET['id_reclamtion']);}
else if(isset($_POST['tri'])) {
    $listeReclamation = $reclamationC->triReclamation();
 }else {
    $listeReclamation = $reclamationC->afficherReclamation();
 }
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PhotoFolio Bootstrap Template - Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    input[type="file"] {
  display: none;
}

.custom-file-upload {
  display: inline-block;
  padding: 10px 15px;
  cursor: pointer;
  background: rgba(255,255,255, 0.8);
  color: #fff;
  border-radius: 5px;
  font-size: 16px;
  transition: all 0.3s ease;
}

.custom-file-upload:hover {
  background-color: ##fff
;
}
    </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-camera"></i>
        <h1>Events</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home.php" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          
          <li><a href="profile.php" >Profile</a></li>
           <li><a href="Reclamationliste.php" >Reclamation</a></li>
           <li><a href="formulairepaiemnt.php" >Paiement</a></li>
           <li><a href="formulairecordonee.php" >Cordonne</a></li>
           <li><a href="index_commande.php" >Commande</a></li>
          <li><a href="contact.html" >Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Reclamation</h2>
            <p>Bienvenue sur notre Plateforme</p>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

   
  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
  
</script>

</body>

</html>
<!DOCTYPE html>
<html>

  <head>

  </head>

 <body>
    

            <button><a href="ajouterReclamation.php">Ajouter une reclamation</a></button>
    <center>
        <h1>Liste des reclamations </h1>
    </center>
    <table border="1" align="center" class="table table-bordered" style="color: white;">
        <tr>
        <th>id_reclamtion</th>
            <th>sujet</th>
            <th>contact</th>
            <th>description</th>
            <th>date_creation</th>
            <th>type</th>
           
            <th>Modifier</th>
            <th>Supprimer</th>
            
        </tr>
        <?php
		foreach ($listeReclamation as $reclamation) {
		?>
        <tr>
        <td><?php echo $reclamation['id_reclamtion']; ?></td>
            <td><?php echo $reclamation['sujet']; ?></td>
            <td><?php echo $reclamation['contact']; ?></td>
            <td><?php echo $reclamation['description']; ?></td>
            <td><?php echo $reclamation['date_creation']; ?></td>
            <td><?php echo $reclamation['type']; ?></td>
           
            <td>
                <form method="POST" action="modifierReclamation.php">
                    <input type="submit" name="Modifier" value="Modifier">
                    <input type="hidden" value=<?PHP echo $reclamation['id_reclamtion']; ?> name="id_reclamtion">
                </form>
            </td>
            <td>
            <a href="SupprimerReclamation.php?id_reclamtion=<?php echo $reclamation['id_reclamtion'] ; ?>"><img src="pou.jpg" witdh='25px' height='25px'></a>

            </td>
        </tr>
        <?php
		}
		?>
        </table>
                  
        
    </div>

 </body>

</html>