<?php
    
    session_start();

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
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
        
        // Eksekusi query
        $result=$conn->query($sql);
    
        if($result->num_rows > 0){
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
        }else{
            echo "Login Gagal";
        };
    }

?>