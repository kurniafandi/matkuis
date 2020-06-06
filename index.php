<?php
session_start();
require "koneksi.php";
if (isset($_SESSION["login"])) {
    header("Location: math.php");
    exit;
}
if (isset($_POST["mulai"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $_SESSION["login"] = true;
    $_SESSION["nyawa"] = 5;
    $_SESSION["skor"] = 0;
    $_SESSION["nama"] = $nama;
    $query = "INSERT INTO skor SET Nama='$nama', Email='$email', Skor=$_SESSION[skor]";
    mysqli_query($conn, $query);
    header("Location: math.php");
    exit;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header"><strong>Selamat datang :)</strong></div>
            <div class="card-body">
                <!-- action dikosongkan agar data POST diolah di halaman ini saja -->
                <form action="" method="POST">
                <div class="form-group">
                    <label for="nama"><h4> Masukkan nama Anda :</h4></label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                    <label for="email"><h4> Masukkan email Anda :</h4></label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                    <button type="submit" name="mulai" class="btn btn-success">Mulai</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
