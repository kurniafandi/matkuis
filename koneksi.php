<?php

//Deklarasi variabel
$servername = "localhost";
$username = "root";
$password = "";
$database = "math";

//Menghubungkan ke database
$conn = mysqli_connect($servername, $username, $password, $database);

//Mengecek koneksi
if (!$conn) {
      die("Koneksi ke database GAGAL : " . mysqli_connect_error());
}

?>