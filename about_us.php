<?php
    session_start();

    $_SESSION['username'];
    $_SESSION['password'];

    if(isset($_SESSION['username']) && !empty($_SESSION['password'])) {
      echo '

        <!DOCTYPE html>
        <html>
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
                    <li>About Us</li>
                    </ol>

                </div>
            </section><!-- End Breadcrumbs -->

            <main id="main">
            <div class="container">
                <div class="about-section">
                    <h1><b>About Us</b></h1>
                    <p>Kamus Sulawesi merupakan sebuah situs dan web service API yang menyediakan layanan
                        kamus dengan lebih dari 2000 kata dalam bahasa bugis dan bahasa duri. Secara umum, layanan
                        ini ditujukan untuk masyarakat yang ingin mencari tahu mengenai arti dari berbagai kata yang
                        ada baik dalam bahasa bugis maupun dalam bahasa duri. </p>

                    <p>
                        Sampai saat ini, layanan kami sudah mampu menyediakan data berbagai kata dalam dua Bahasa
                        yakni dalam bahasa duri (enrekang) maupun dalam bahasa bugis. Keunikan dari web service ini adalah
                        user hanya perlu melakukan input data kata, bahasa dan api key ke API, maka API akan langsung memberikan
                        respon. Kamus Sulawesi benar-benar mampu membantu pekerjaan Anda!
                    </p>
                </div>

                <h2 style="text-align:center">Our Team</h2>
                <div class="row">
                    <div class="column">
                        <div class="card">
                            <img src="assets/images/maryulianti.jpg" alt="Maryulianti" style="width:100%">
                            <div class="container"><br>
                                <h2>Maryulianti</h2>
                                    <p class="title">Mahasiswa</p>
                                    <p>Harapan adalah mimpi yang nyata</p>
                                    <p>maryulianti27@gmail.com</p>
                                    <p><button class="button" href="https://www.instagram.com/yulhy27_maryu">Instagram</button></p>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                        <div class="card">
                            <img src="assets/images/widya.jpg" alt="Widya Al Fitrah" style="width:100%">
                            <div class="container"><br>
                                <h2>Widya Al Fitrah</h2>
                                    <p class="title">Mahasiswa</p>
                                    <p>Make 1% progress every day. Later, your progress will exceed 100%</p>
                                    <p>widyaalftrh@gmail.com</p>
                                    <p><button class="button" href="https://www.instagram.com/widyaalftrh_">Instagram</button></p>
                                </div>
                            </div>
                        </div>
            
                        <div class="column">
                        <div class="card">
                            <img src="assets/images/zhandy.jpg" alt="Zhandy" style="width:100%">
                            <div class="container"><br>
                                <h2>Zhandy</h2>
                                    <p class="title">Mahasiswa</p>
                                    <p>Make 1% progress every day. Later, your progress will exceed 100%</p>
                                    <p>ahmadzdy230401@gmail.com</p>
                                    <p><button class="button" href="https://www.instagram.com/zhandy.ahm">Instagram</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

        </body>
        </html>';
    }else{
        header("Location: index.php");
    }