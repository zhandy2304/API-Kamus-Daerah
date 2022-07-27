<?php
    session_start();

    $_SESSION['username'];
    $_SESSION['password'];

    if(isset($_SESSION['username']) && !empty($_SESSION['password'])) {
      echo '?>
      <!DOCTYPE html>
      <html lang="en">
      
      <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      
        <!-- Vendor CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
      
        <link rel="stylesheet"
            href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/night-owl.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
        <script>hljs.highlightAll();</script>
      
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
                <li><a class="nav-link scrollto" href="#contact">Dokumentasi</a></li>
                <li><a class="getstarted scrollto" href="user_profile_apiKey.php">API Key</a></li>
                <li><a class="nav-link scrollto" href="about_us.php">About Us</a></li>
                <li><a class="nav-link scrollto" href="logout_user.php">Log Out</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
      
          </div>
        </header><!-- End Header -->
      
        <main id="main">
      
          <!-- ======= Breadcrumbs ======= -->
          <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
      
              <ol>
                <li><a href="inner-page.php">Home</a></li>
                <li>Dokumentasi API</li>
              </ol>
      
            </div>
          </section><!-- End Breadcrumbs -->
      
          <section class="inner-page">
            <div class="container">
              <h3><b>
                Get Data Kata
              </b></h3>
              <p>Parameter Get Data Kata digunakan untuk mencari sebuah kata dalam bahasa bugis ataupun dalam bahasa duri<p>
              <h5><b>Parameter</b></h5>
              <table>
                <tr>
                  <th>Method</th>
                  <th>Params</th>
                  <th>Wajib</th>
                  <th>Tipe</th>
                  <th>Keterangan</th>
                </tr>
                <tr>
                  <td>HEAD/GET</td>
                  <td>api_key</td>
                  <td>Ya</td>
                  <td>String</td>
                  <td>API Key user</td>
                </tr>
                <tr>
                  <td>GET</td>
                  <td>bahasa</td>
                  <td>Ya</td>
                  <td>String</td>
                  <td>Bahasa kata yang dicari, bahasa duri atau bahasa bugis.</td>
                </tr>
                <tr>
                  <td>GET</td>
                  <td>kata</td>
                  <td>Ya</td>
                  <td>String</td>
                  <td>Kata yang ingin dicari</td>
                </tr>
              </table><br>

              <h5><b>Contoh URL : </b></h5>
              <p style="color: #f78c6c">http://localhost/api_kamusDaerah/get_Data.php?api_key="your_api_key"&bahasa=duri&kata=Aha</p>

              <h5><b>Response Sukses</b></h5>
              <pre><code class="language-json">
                {
                  "status": {
                      "code": 200,
                      "description": "Berhasil mendapatkan arti kata"
                  },
                  "results": [
                      {
                          "id_kata": "1",
                          "duri": "Aha",
                          "indo": "Hari Minggu"
                      }
                  ]
              }  
              </code></pre>

              <h5><b>Response Gagal</b></h5>
              <pre><code class="language-json">
              {
                "status": {
                    "code": 400,
                    "description": "Bahasa tidak ada"
                }
              }
              </code></pre>

              <br><hr>

              <h3><b>
                Edit Data Kata
              </b></h3>
              <p>Parameter Edit Kata digunakan untuk mengubah kata baik bahasa bugis, bahasa duri ataupun terjemahannya dalam
              bahasa Indonesia dengan menggunakan id_kata yang dapat diperoleh dari Get Data Kata</p>
              <h5><b>Parameter</b></h5>
              <table>
                <tr>
                  <th>Method</th>
                  <th>Params</th>
                  <th>Wajib</th>
                  <th>Tipe</th>
                  <th>Keterangan</th>
                </tr>
                <tr>
                  <td>HEAD/PUT</td>
                  <td>api_key</td>
                  <td>Ya</td>
                  <td>String</td>
                  <td>API Key user</td>
                </tr>
                <tr>
                  <td>BODY/PUT</td>
                  <td>id_kata</td>
                  <td>Ya</td>
                  <td>Integer</td>
                  <td>ID kata yang akan di ubah, dapat dicari dengan menggunakan pencarian data di dokumentasi Get Data Kata</td>
                </tr>
                <tr>
                  <td>BODY/PUT</td>
                  <td>bahasa</td>
                  <td>Ya</td>
                  <td>String</td>
                  <td>Kata dalam bahasa Duri atau Bugis yang akan diubah. Pilih duri atau bugis</td>
                </tr>
                <tr>
                  <td>BODY/PUT</td>
                  <td>kata</td>
                  <td>Ya</td>
                  <td>String</td>
                  <td>Input kata dalam bahasa bugis/duri yang akan diubah</td>
                </tr>
                <tr>
                  <td>BODY/PUT</td>
                  <td>indo</td>
                  <td>Ya</td>
                  <td>String</td>
                  <td>Kata dalam bahasa Indonesia yang akan diubah</td>
                </tr>
              </table><br>

              <h5><b>URL : </b></h5>
              <p style="color: #f78c6c">http://localhost/api_kamusDaerah/put_editData.php</p>

              <h5><b>Response Sukses</b></h5>
              <pre><code class="language-json">
                {
                  "status": {
                      "code": 200,
                      "description": "Data Berhasil di Update"
                  },
                  "results": {
                      "Id Kata": "1",
                      "Bahasa Duri": "Hari Ahad, Minggu",
                      "Bahasa Indonesia": "Aha"
                  }
                } 
              </code></pre>

              <h5><b>Response Gagal</b></h5>
              <pre><code class="language-json">
              {
                "status": {
                    "code": 400,
                    "description": "Pilih Bahasa Duri atau Indonesia"
                }
              }
              </code></pre>

            </div>
            


          </section>
      
        </main>
        <!-- End #main -->
      
      </body>
      
      </html>';
   }else{
    header("Location: index.php");
   }
    
