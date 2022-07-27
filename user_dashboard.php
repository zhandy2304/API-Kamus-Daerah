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
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate API Key</title>
</head>
<body>

    Selamat Datang, <?php echo $_SESSION['username']=$username; ?>
    <form action="user_generate_key.php" method="post">

        <input type="hidden" name="username" value="<?php echo $_SESSION['username']=$username; ?>"><br>
        <input type="hidden" name="password" value="<?php echo $_SESSION['password']=$password; ?>"><br>
        <input type="submit" name="submit" value="Generate Key">

    </form>
</body>
</html>
