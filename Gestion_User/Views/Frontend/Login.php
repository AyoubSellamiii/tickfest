<?php 
session_start();
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
        <h1>TickFest</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

        <li><a href="#about">About</a></li>
  
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
            <h2>Bienvenue sur notre Plateforme</h2>
            <p>Login</p>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" >

    <div class="row justify-content-center mt-4">

          <div class="col-lg-9">
          <form action="verify.php"  method="post"  >
          <div class="form-group">
    <input placeholder="Email" type="text" name="email" class="form-control" id="email" required>
  </div>
  <div class="form-group">
    <input placeholder="Password" type="password" name="pswd" class="form-control" id="pswd" required>
  </div>
  <div class="text-center">
    <button type="submit" name="connect" class="btn btn-primary me-2" >Se Connecter</button>
  </div>
</form>
          </div><!-- End Contact Form -->

        </div>

      </div>
      <a href="inscrire.php">
      <button  class="btn btn-primary me-2" >S'inscrire</button></a>
    </section><!-- End Contact Section -->
    <section id="about" class="about">
  <div class="about-container">
    <div class="about-section about-section-1">
      <h2>Qui sommes-nous ?</h2>
      <p>Nous sommes une équipe passionnée par la musique et les festivals. Notre objectif est de rendre l'achat de billets pour les festivals plus facile et plus accessible aux passionnés du monde entier.</p>
    </div>
    <div class="about-section about-section-2">
      <h2>Nos services</h2>
      <p>Nous offrons une large gamme de festivals, un service de réservation de logements, une assistance en ligne pour les utilisateurs, des recommandations personnalisées et des partenariats avec des festivals.</p>
    </div>
  </div>
</section>
<style>
#about {
  background-color: #1c1c1c; /* dark grey */
  color: #fff; /* white */
  padding: 50px;
}

#about h2 {
  font-size: 30px;
  margin-top: 0;
}

#about p {
  font-size: 20px;
  line-height: 1.5;
}

.about-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  max-width: 1200px;
  margin: 0 auto;
}

.about-section {
  flex-basis: calc(50% - 30px);
  margin: 15px;
  padding: 30px;
  background-color: #000;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
}

.about-section-1 h2 {
  color: #ffea00; /* yellow */
}

.about-section-2 h2 {
  color: #00eaff; /* blue */
}
  </style>
</main><!-- End #main -->

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



</body>

</html>