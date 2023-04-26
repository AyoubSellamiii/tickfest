<?php 

session_start();
include_once '../../config.php';
include "../../Controller/paiementC.php";

$paiementC = new paiementC();
$prod=$paiementC->afficherpaiement();
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
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-camera"></i>
        <h1>TickFest</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.html">About</a></li>
          
          <li><a href="profile.php" class="active">Profile</a></li>
          <li><a href="contact.html" >Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="disconnect.php" > Déconnecter </a>
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
            <h2></h2>
           
            <p>Bienvenue sur notre Plateforme ></p>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div id="profile" >
        <img src="assets/img/lotfi.jpg" alt="" >
<strong>Lotfi Bouchnek </strong> <span></span>

 <?php
foreach($prod as $pro){
  $x=$pro['id_paiement'];
}

?>
<strong>50Dt</strong> <span></span>
   <form name="frm" action="Ajoutercordofct.php" method="post" >


                                            <div class="form-group">
            
                                               <input type="hidden" class="form-control" name="id"  >
                                                 
                                               <input type="hidden" class="form-control" name="id_part" value="<?php echo $x ?>" >
                                                  
                                            </div>
                                            <div class="form-group">
                                                <label >Numero</label>
                                                <input type="number" class="form-control" name="num" value=""  >
                                               </th>
                                                  
                                            </div>
                                                 <div class="form-group">
                                                <label >Mail</label>
                                                <input type="email" class="form-control" name="mail" value=""  >
                                               </th>
                                                  
                                            </div>
                                         
                                         
                                      
                                            
                                           
                                            
                                                <div>
                                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                                       
                                                        <span >Acheter </span>
                                                        
                                                    </button>
                                                </div>
                                        </form>
</div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<style>
  #profile {
  background-color: #000000;
  color: #FFFFFF;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px #FFFFFF;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
}

#profile img {
  margin-bottom: 20px;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  box-shadow: 0px 0px 10px #FFFFFF;
  
}

#profile img:hover {
 
}

#profile span {
  font-size: 18px;
  margin-bottom: 10px;
}

</style>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>PhotoFolio</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

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

</body>

</html>