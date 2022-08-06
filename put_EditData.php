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

    if($user->num_rows > 0 ){

        // cek method
        if($method == 'PUT'){

            // menangkap inputan data user, kemudian disimpan kedalam variabel $_PUT
            parse_str(file_get_contents("php://input"), $_PUT);

            // tangkap parameter bahasa
            $bahasa = $_PUT['bahasa'];

            // pengecekan parameter bahasa
            // jika bahasa == duri
            if($bahasa == 'duri'){

                // pengecekan parameter bahasa duri dan bahasa indonesia
                if(isset($_PUT['kata']) AND isset($_PUT['indo']) AND isset($_PUT['id_kata'])){

                    // tangkap parameter NIM
                    $kata = $_PUT['kata'];
                    $indo = $_PUT['indo'];
                    $id_kata = $_PUT['id_kata'];
            
                    // Membuat query
                    $sql = "UPDATE kamus_duri SET duri='$kata',
                                                        indo='$indo'
                                                    WHERE id_kata='$id_kata'";
                    
                    // Eksekusi query
                    $conn->query($sql);

                    $result['status'] = [
                        "code" => 200,
                        "description" => 'Data Berhasil di Update'
                    ];
            
                    // membuat hasil kueri menjadi array assosiate
                    $result['results'] = [
                        "Id Kata" => $id_kata,
                        "Bahasa Duri" => $kata,
                        "Bahasa Indonesia" => $indo
                    ];

                }else{
                    $result['status'] = [
                        "code" => 400,
                        "description" => 'Parameter Invalid'
                    ];
                };

            }elseif($bahasa == 'bugis'){

                // pengecekan parameter bahasa duri dan bahasa indonesia
                if(isset($_PUT['kata']) AND isset($_PUT['indo']) AND isset($_PUT['id_kata'])){

                    // tangkap parameter NIM
                    $kata = $_PUT['kata'];
                    $indo = $_PUT['indo'];
                    $id_kata = $_PUT['id_kata'];
            
                    // Membuat query
                    $sql = "UPDATE kamus_bugis SET bugis='$kata',
                                                        indo='$indo'
                                                    WHERE id_kata='$id_kata'";
                    
                    // Eksekusi query
                    $conn->query($sql);

                    $result['status'] = [
                        "code" => 200,
                        "description" => 'Data Berhasil di Update'
                    ];
            
                    // membuat hasil kueri menjadi array assosiate
                    $result['results'] = [
                        "Id Kata" => $id_kata,
                        "Bahasa Bugis" => $kata,
                        "Bahasa Indonesia" => $indo
                    ];

                }else{
                    $result['status'] = [
                        "code" => 400,
                        "description" => 'Parameter Invalid'
                    ];
                };
            
            }else{
                $result['status'] = [
                    "code" => 400,
                    "description" => 'Pilih Bahasa Duri atau Indonesia'
                ];
            }

        }else{
            $result['status'] = [
                "code" => 400,
                "description" => 'Method is Not Valid'
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