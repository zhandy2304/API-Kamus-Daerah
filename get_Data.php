<?php

    // menangkap request dari header
    $header = apache_request_headers();
    // menangkap parameter key pada header
    $key = $header['api_key'];

    // header hasil berbentuk JSON
    header("Content-Type:application/json");

    // untuk mengidentifikasi method yang digunakan user
    $method = $_SERVER['REQUEST_METHOD'];

    // variabel hasil
    $result = array();

    // koneksi database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "api_kamus_daerah";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Membuat query
    $sql = "SELECT * FROM user WHERE key_token='$key'";
    
    // Eksekusi query
    $user=$conn->query($sql);

    if($user->num_rows > 0){

        // cek method
        if($method == 'GET'){

            // tangkap parameter bahasa dan kata
            $bahasa = $_GET['bahasa'];
            $kata = $_GET['kata'];

            // pengecekan parameter bahasa
            // jika bahasa == duri
            if($bahasa == 'duri'){

        
                // Membuat query
                $sql = "SELECT * FROM kamus_duri WHERE duri = '$kata'";
                
                // Eksekusi query
                $hasil_query = $conn->query($sql);

                if($hasil_query->num_rows > 0){

                    // menampilkan result berhasil
                    $result['status'] = [
                        "code" => 200,
                        "description" => 'Berhasil mendapatkan arti kata'
                    ];

                    // membuat hasil kueri menjadi array assosiate
                    $result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);


                }else{
                    $result['status'] = [
                        "code" => 400,
                        "description" => 'Kata tidak ditemukan'
                    ];
                };

            }elseif($bahasa == 'bugis'){
        
                // koneksi database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "api_kamus_daerah";
        
                $conn = new mysqli($servername, $username, $password, $dbname);
        
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        
                // Membuat query
                $sql = "SELECT * FROM kamus_bugis WHERE bugis = '$kata'";
                
                // Eksekusi query
                $hasil_query = $conn->query($sql);

                if($hasil_query->num_rows > 0){

                    // menampilkan result berhasil
                    $result['status'] = [
                        "code" => 200,
                        "description" => 'Berhasil mendapatkan arti kata'
                    ];

                    // membuat hasil kueri menjadi array assosiate
                    $result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);


                }else{
                    $result['status'] = [
                        "code" => 400,
                        "description" => 'Kata tidak ditemukan'
                    ];;
                };
            
            }else{
                $result['status'] = [
                    "code" => 400,
                    "description" => 'Bahasa tidak ada'
                ];
            };
            

        }else{
            $result['status'] = [
                "code" => 400,
                "description" => 'Request Not Valid'
            ];
        }
    }else{
        $result['status'] = [
            "code" => 400,
            "description" => 'API Key Not Valid'
        ];
    }

    // menampilkan data dalam format json
    echo json_encode($result);

?>