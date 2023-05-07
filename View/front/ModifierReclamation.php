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
        $reclamationC->modifierReclamation($reclamation, $_POST["id_reclamtion"]);
            header('Location:reclamationadmin.php');
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
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li class="dropdown"><a href="#"><span>Gallery</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="gallery.html">Nature</a></li>
              <li><a href="gallery.html">People</a></li>
              <li><a href="gallery.html">Architecture</a></li>
              <li><a href="gallery.html">Animals</a></li>
              <li><a href="gallery.html">Sports</a></li>
              <li><a href="gallery.html">Travel</a></li>
              <li class="dropdown"><a href="#"><span>Sub Menu</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Sub Menu 1</a></li>
                  <li><a href="#">Sub Menu 2</a></li>
                  <li><a href="#">Sub Menu 3</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="services.html">Services</a></li>
          <li><a href="Reclamationliste.php" class="active">reclamation</a></li>
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

<html lang="en">

<head>
    
</head>

<body >
       
    <button><a href="reclamationadmin.php">Retour à la liste des reclamations</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_reclamtion'])) {
        $reclamation = $reclamationC->recupererReclamation($_POST['id_reclamtion']);

    ?>

    <form action="" method="POST">
        <table border="1" align="center" class="table table-bordered">
            <tr>
                <td>
                    <label for="id_reclamtion">id_reclamtion :
                    </label>
                </td>
                <td><input type="number" name="id_reclamtion" id="id_reclamtion"
                        value="<?php echo $reclamation['id_reclamtion']; ?>"></td>
            </tr>

            <tr>
                    <td>
                        <label for="sujet">sujet:
                        </label>
                        <small class="form-text text-error" id="sub-error"></small>
                    </td>
                    <td><input type="text" name="sujet" id="sujet" value="<?php echo $reclamation['sujet']; ?>" maxlength="50"></td>
                </tr>

            <tr>
                <td>
                    <label for="contact">Contact:
                    </label>
                </td>
                <td><input type="email" name="contact" id="contact" value="<?php echo $reclamation['contact']; ?>" maxlength="50"></td>
            </tr>

            <tr>
                <td>
                    <label for="description">Description:
                    </label>
                </td>
                <td>
                    <input type="text" name="description" value="<?php echo $reclamation['description']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Date Creation:
                    </label>
                </td>
                <td>
                    <input type="date" name="date_creation" id="date_creation" value="<?php echo $reclamation['date_creation']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type">Type:
                    </label>
                </td>
                <td>
                    <input type="text" name="type" id="type" value="<?php echo $reclamation['type']; ?>">
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