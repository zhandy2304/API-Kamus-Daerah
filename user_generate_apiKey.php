<?php

$username = $_POST['username'];
$password = $_POST['password'];
$date = date_create();
$tanggal = date_timestamp_get($date);

//menggenerate token
$token = md5($username.$password.$tanggal);

// koneksi database
$servername = "localhost";
$uname = "root";
$password = "";
$dbname = "api_kamus_daerah";

$conn = new mysqli($servername, $uname, $password, $dbname);

// Membuat query untuk megenerate keytoken didatabase
$sql = "UPDATE user SET key_token='".$token."' WHERE username='".$username."'";
echo $sql;

// Eksekusi query
$result=$conn->query($sql);

if(! $result ) {
    die('Could not update data: ' . mysql_error());
 }

echo "Updated data successfully\n";

header("Location: user_profile_apiKey.php");

?>