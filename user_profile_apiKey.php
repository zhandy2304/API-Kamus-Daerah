<?php
    session_start();

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    // koneksi database
    $servername = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "api_kamus_daerah";

    $conn = new mysqli($servername, $uname, $pass, $dbname);

    // Membuat query
    $sql = "SELECT * FROM user WHERE username='$username'";
    
    // Eksekusi query
    $result=$conn->query($sql);

    if($result->num_rows > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $key_token = $row["key_token"];
            $email = $row["email"];
        }
    }else{
        echo "Anda belum memiliki token";
    };

?>
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

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">Kamus Sulawesi</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto" href="inner-page.php">Dokumentasi</a></li>
            <li><a class="getstarted scrollto" href="user_profile_apiKey.php">API Key</a></li>
            <li><a class="nav-link scrollto" href="about_us.php">About Us</a></li>
            <li><a class="nav-link scrollto" href="logout_user.php">Log Out</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="inner-page.php">Home</a></li>
          <li>Profil User</li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">

        <div class="container space-top-3 space-bottom-1" style="margin-bottom: 60px;>
            <div class="border-bottom w-md-75 w-lg-60 space-bottom-2 mx-md-auto">
                <div class="media d-block d-sm-flex">
                    <div class="position-relative mx-auto mb-3 mb-sm-0 mr-sm-4" style="width: 160px; height: 160px;">
                        <img class="img-fluid rounded-circle" src="assets/images/no_profile.jpg" width="160" height="160">
                    </div>
                    <div class="media-body">
                        <form action="user_insert_email.php" method="post" enctype="multipart/form-data">
                            <div>
                                <br><h3><strong><?php echo $username; ?></strong></h3><br>
                            </div>
                            <div class="input-group mb-2 ">
                                <input id="email" name="email" class="form-control mb-0 " placeholder="Masukkan Email Anda" aria-label="email" value="<?php echo $email; ?>"></input><br><br>
                            </div>
                            <div class="d-block">
                                <button type="submit" class="btn btn-xs btn-outline-primary font-weight-bold text-nowrap ml-1">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="container space-bottom-2">
            <div class="w-md-75 w-lg-60 mx-md-auto">
            <article class="card mb-3 mb-sm-5">
                <div class="card-body">
                    <h3>Your API Key</h3>
                    <small>Use this API key for each request. Please consult documents for more information</small>
        
                    <div class="input-group mb-3 mt-1">
                        <input id="api_key" type="text" readonly="" class="form-control" value="<?php echo $key_token; ?>">
                            <div class="input-group-append">
                                <input type="submit" value="Salin ke Clipboard" class="btn text-white btn-block btn-primary" name="submit" onclick="copy_API()">
                            </div>
                    </div>

                    <div class="d-block">
                        <form action="user_generate_apiKey.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="username" value="<?php echo $_SESSION['username']=$username; ?>">
                            <input type="hidden" name="password" value="<?php echo $_SESSION['password']=$password; ?>">
                            <button type="submit" class="btn btn-xs btn-outline-primary font-weight-bold text-nowrap ml-1">Generate New API Key</button><br><br>
                        </form>
                    </div>
    </section>

    <script>
        function copy_API() {
        var copyText = document.getElementById("api_key");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        }
    </script>

  </body>
</html>