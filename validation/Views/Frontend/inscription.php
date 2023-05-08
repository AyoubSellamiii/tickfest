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

        $user = new User(1, $_POST['login'], $_POST['email'], $date, $target_file, $_POST['pswd'], $Now, "Client");
        $UserC->register($user);


        header('Location:inscription.php');
      }

    } else {
      echo 'error';
      //header('Location:blank.php');
    }

  }
}
include 'header.php';
?>


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
          <form action="" method="POST" enctype="multipart/form-data" class="php-email-form">
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
              <input placeholder="Confirm Password" type="password" name="confirm_pswd" class="form-control"
                id="confirm_pswd" required>
            </div>

            <div class="form-group">

              <input required type="file" class="form-control" id="fileToUpload" name="fileToUpload">
              <label for="fileToUpload" class="custom-file-upload">Choisir Image</label>
            </div>

            <div class="my-3"> </div>
            <div class="text-center">
              <button type="submit" name="add" class="btn btn-primary me-2"
                onclick="return checkPassword()">S'inscrire</button>
            </div>
          </form>
        </div><!-- End Contact Form -->
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php include 'footer.php';