<?php 


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
          
            $user = new User(1, $_POST['login'],$_POST['email'],$date,$target_file,$_POST['pswd'],$Now,"Client" );
            $UserC->register($user);
            
           
            header('Location:Inscrire.php');
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
          <li><a href="contact.html" class="active">Contact</a></li>
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
            <h2>S'inscrire</h2>
            <p>Bienvenue sur notre Plateforme</p>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      

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

  <div class="my-3">
  </div>

  <div class="text-center">
    <button type="submit" name="add" class="btn btn-primary me-2" onclick="return checkPassword()">S'inscrire</button>
  </div>
</form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

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