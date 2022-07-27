<?php
session_start();

$email = $_POST['email'];
$username = $_SESSION['username'];

// koneksi database
$servername = "localhost";
$uname = "root";
$password = "";
$dbname = "api_kamus_daerah";

$conn = new mysqli($servername, $uname, $password, $dbname);

// Membuat query
$sql = "UPDATE user SET email='".$email."' WHERE username='".$username."'";
echo $sql;

// Eksekusi query
$result=$conn->query($sql);

header("Location: user_profile_apiKey.php");

?>