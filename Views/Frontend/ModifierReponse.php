<?php
include_once '..\..\Model\Reponse.php';
include_once '..\..\Controller\ReponseC.php';


$error = "";

// create adherent
$Reponse = null;

$ReponseC = new ReponseC();
if (
    isset($_POST["idreponse"]) &&
    isset($_POST["date"]) &&
    isset($_POST["description"])
) {
    if (
        !empty($_POST["idreponse"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["description"])

    ) {
        $Reponse = new Reponse(
          $_POST['idreponse'],
          new DateTime($_POST['date_creation']),
            $_POST['description']
        );
        $ReponseC->modifierReponse($Reponse, $_POST["idreponse"]);
            header('Location:reponseadmin.php');
    } else
            $error = "Missing information";
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
  background: rgba(39, 167, 118, 0.8);
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
            <h2>Reponse</h2>
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

<html lang="en">

<head>
    
</head>

<body >
       
    <button><a href="Reponseadmin.php">Retour à la liste des Reponses</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idreponse'])) {
        $Reponse = $ReponseC->recupererReponse($_POST['idreponse']);

    ?>

    <form action="" method="POST">
        <table border="1" align="center" class="table table-bordered">
            <tr>
                <td>
                    <label for="idreponse">idreponse :
                    </label>
                </td>
                <td><input type="number" name="idreponse" id="idreponse"
                        value="<?php echo $Reponse['idreponse']; ?>"></td>
            </tr>

            <tr>
                <td>
                    <label for="date">Date :
                    </label>
                </td>
                <td>
                    <input type="date" name="date" id="date" value="<?php echo $Reponse['date']; ?>">
                </td>
            </tr>

               

            <tr>
                <td>
                    <label for="description">Description:
                    </label>
                </td>
                <td>
                    <input type="text" name="description" value="<?php echo $Reponse['description']; ?>">
                </td>
            </tr>
        
                        
            
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Modifier">
                </td>
                <td>
                    <input type="reset" value="Annuler">
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>

</html>