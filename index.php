<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Kamus Sulawesi</title>
  </head>

  <body>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="assets/images/Sign-in.png" alt="Image" class="img-fluid">
        </div>

        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3><strong>Kamus Sulawesi</strong></h3>
              <p class="mb-4">Penyedia layanan API untuk data berbagai kata dalam bahasa Bugis maupun bahasa Duri</p>
              </div>

              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
              

                  <div class="form-group first">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                  </div>

                  <div class="form-group last mb-4">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  </br></br>

                  <input type="submit" value="Log In" class="btn text-white btn-block btn-primary" name="submit">

                  <a><span class="ml-auto">Belum punya akun?</span>
                  <span class="ml-auto"><a href="user_signup.php" class="daftar">Daftar</span>
                  </br></br>

                </form>

              </div>

              <?php

              if(isset($_POST['submit'])){
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  // koneksi database
                  $servername = "localhost";
                  $uname = "root";
                  $pass = "";
                  $dbname = "api_kamus_daerah";

                  $conn = new mysqli($servername, $uname, $pass, $dbname);

                  // Membuat query
                  $sql = "SELECT * FROM user WHERE username='$username' AND pass='$password'";
                  
                  // Eksekusi query
                  $result=$conn->query($sql);

                  if($result->num_rows > 0){
                    session_start();

                    $_SESSION['username']=$username;
                    $_SESSION['password']=$password;

                    header("Location: inner-page.php");

                  }else{
                    echo "<a style='color : red'>Username atau Password salah</a>";
                  };
              }

              ?>

            </div>
          </div>
        </div>
    </div>
  </div>

  </body>
</html>