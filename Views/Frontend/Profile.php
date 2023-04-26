<?php 

session_start();
include "../../Controller/UserC.php";
include_once '../../Model/User.php';
$userC = new UserC();
$thisuser = $userC->getuserbyID($_SESSION['id']);
if (isset($_REQUEST['edit-login'])) {

  $userC = new UserC();
  $userC->updatLogin($_SESSION['id'],$_POST['login']);
  header('Location: Profile.php');

}
if (isset($_REQUEST['edit-email'])) {

  $userC = new UserC();
  $userC->updateEmail($_SESSION['id'],$_POST['email']);
  header('Location: Profile.php');

}
if (isset($_REQUEST['edit-ddn'])) {

  $userC = new UserC();
  $date =new DateTime($_POST['date']);
  $userC->updateDate($_SESSION['id'],$date);
  header('Location: Profile.php');

}
if (isset($_REQUEST['edit-pass'])) {

  $userC = new UserC();
  $userC->updatePass($_SESSION['id'],$_POST['pass']);
  header('Location: Profile.php');

}
if (isset($_REQUEST['edit-img'])) {
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  $userC = new UserC();
  $userC->updateImg($_SESSION['id'],$target_file);
  header('Location: Profile.php');

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
          <li><a href="#about">About</a></li>
          
          <li><a href="profile.php" class="active">Profile</a></li>
          <li><a href="contact.html" >Contact</a></li>
          <li><a href="index.php" >Tickets</a></li>
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
            <p>Bienvenue sur notre Plateforme <?php echo $thisuser['login'];?></p>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div id="profile" >
        <img src="<?php echo $thisuser['img'] ?>" width="300" height="auto" >
        <button class="edit-button" id="modif-img">Modifier Image</button>
  <form id="form-img" method="POST" enctype="multipart/form-data"  style="display:none;">
    <input required type="file" class="form-control" id="fileToUpload" name="fileToUpload" >
    <button type="submit" name="edit-img">Modifier</button>
</form>
<strong>Login : </strong> <span><?php echo $thisuser['login']?></span>
<button class="edit-button" id="modif-login">Modifier Login</button>
  <form id="form-login" method="POST" style="display:none;">
    <input type="text" name="login" placeholder="new login" >
    <button type="submit" name="edit-login">Modifier</button>
</form>
<strong>email : </strong> <span><?php echo $thisuser['email']?></span>
<button class="edit-button" id="modif-email">Modifier Email</button>
<form id="form-email" method="POST" style="display:none;" >
<input type="email" id="email"  name="email" placeholder="new Email" >
<button type="submit" name="edit-email">Modifier</button>
</form>

<strong>Date de naissance : </strong> <span><?php echo $thisuser['ddn']?></span>
<button class="edit-button" id="modif-ddn">Modifier Date de naissance</button>
<form id="form-ddn" method="POST" style="display:none;" >
<input type="date" id="date"  name="date" >
<button type="submit" name="edit-ddn">Modifier</button>
</form>
<strong>Password : </strong> <span><?php echo $thisuser['pswd']?></span>
<button class="edit-button" id="modif-pass">Modifier mot de passe</button>
<form id="form-pass" method="POST" style="display:none;" >
<input type="password" id="pass"  name="pass" >
<button type="submit" name="edit-pass">Modifier</button>
</form>


<a href="deleteuser.php?id=<?php echo $_SESSION['id'] ?>" >Supprimer compte</a>

</div>
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
 
<script>
  // Get the button and form elements
  var modifButton = document.getElementById('modif-login');
  var loginForm = document.getElementById('form-login');
  
  // Add an event listener to the button
  modifButton.addEventListener('click', function() {
    // Toggle the display of the form
    if (loginForm.style.display === 'none') {
      loginForm.style.display = 'block';
    } else {
      loginForm.style.display = 'none';
    }
  });
  const modifEmailBtn = document.getElementById("modif-email");
    const formEmail = document.getElementById("form-email");

    modifEmailBtn.addEventListener("click", () => {
      if (formEmail.style.display === 'none') {
      formEmail.style.display = 'block';
    } else {
      formEmail.style.display = 'none';
    }
    });

    const modifDdnBtn = document.getElementById("modif-ddn");
const formDdn = document.getElementById("form-ddn");

modifDdnBtn.addEventListener("click", () => {
  if (formDdn.style.display === 'none') {
      formDdn.style.display = 'block';
    } else {
      formDdn.style.display = 'none';
    }
});
const modifPassBtn = document.getElementById("modif-pass");
const formPass = document.getElementById("form-pass");

modifPassBtn.addEventListener("click", () => {
  if (formPass.style.display === 'none') {
      formPass.style.display = 'block';
    } else {
      formPass.style.display = 'none';
    }
});
const modifImgBtn = document.getElementById("modif-img");
const formImg = document.getElementById("form-img");

modifImgBtn.addEventListener("click", () => {
  if (formImg.style.display === 'none') {
      formImg.style.display = 'block';
    } else {
      formImg.style.display = 'none';
    }
});
</script>
<style>
  .edit-button {
  display: inline-block;
  padding: 0.5em 1em;
  background-color: black;
  color: white;
  text-decoration: none;
  border-radius: 0.25em;
}

.edit-button:hover {
  background-color: white;
  color: black;
  border: 1px solid black;
}
  button[type="submit"][name="edit-login"] {
  background-color: #FFFFFF;
  color: #000000;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  box-shadow: 0px 0px 10px #FFFFFF;
}
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
  transition: all 0.3s ease-in-out;
}

#profile img:hover {
  transform: scale(1.2);
}

#profile span {
  font-size: 18px;
  margin-bottom: 10px;
}

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
    transition: all 0.3s ease-in-out;
  }

  #profile img:hover {
    transform: scale(1.2);
  }

  #profile span {
    font-size: 18px;
    margin-bottom: 10px;
  }

  #form-login {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
  }

  #form-login input[type="text"] {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
    border: none;
    box-shadow: 0px 0px 10px #FFFFFF;
    width: 100%;
    font-size: 16px;
    color: #FFFFFF;
    background-color: #000000;
  }

  #form-login button[type="submit"] {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    box-shadow: 0px 0px 10px #FFFFFF;
    font-size: 16px;
    color: #FFFFFF;
    background-color: #2ECC71;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }

  #form-login button[type="submit"]:hover {
    background-color: #27AE60;
  }
  #form-email {
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
}

#form-email #email {
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 5px;
  border: none;
  box-shadow: 0px 0px 10px #FFFFFF;
  width: 100%;
  font-size: 16px;
  color: #FFFFFF;
  background-color: #000000;
}
#form-pass #pass {
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 5px;
  border: none;
  box-shadow: 0px 0px 10px #FFFFFF;
  width: 100%;
  font-size: 16px;
  color: #FFFFFF;
  background-color: #000000;
}
#form-email button[type="submit"] {
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  box-shadow: 0px 0px 10px #FFFFFF;
  font-size: 16px;
  color: #FFFFFF;
  background-color: #2ECC71;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

#form-email button[type="submit"]:hover {
  background-color: #27AE60;
}
#form-ddn button[type="submit"] {
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  box-shadow: 0px 0px 10px #FFFFFF;
  font-size: 16px;
  color: #FFFFFF;
  background-color: #2ECC71;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

#form-ddn button[type="submit"]:hover {
  background-color: #27AE60;
}
#form-pass button[type="submit"] {
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  box-shadow: 0px 0px 10px #FFFFFF;
  font-size: 16px;
  color: #FFFFFF;
  background-color: #2ECC71;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

#form-pass button[type="submit"]:hover {
  background-color: #27AE60;
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