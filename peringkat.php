<?php
session_start();
require "koneksi.php";
if (!isset($_SESSION["login"])) {
    header("Location: form.php");
    exit;
}
$nama = $_SESSION["nama"];
$query = "UPDATE skor SET Skor=$_SESSION[skor] WHERE Nama='$nama'";
mysqli_query($conn, $query);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header"><strong>Maaf, game telah berakhir. Berikut peringkat Anda :)</strong></div>
            <div class="card-body">
                <!-- action dikosongkan agar data POST diolah di halaman ini saja -->
                <div class="container">
                <table class="table">
                    <tr>
                        <th scope="col">Peringkat</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Skor</th>
                    </tr>
                <tbody>
                    <?php
                    require "koneksi.php";
                    $peringkat = mysqli_query($conn, "SELECT * FROM skor ORDER BY Skor DESC");
                    $nomor = 1;
                    while ($row = mysqli_fetch_array($peringkat)) {
                        echo "<tr>
                        <td>" . $nomor . "</td>
                        <td>" . $row['Nama'] . "</td>
                        <td>" . $row['Skor'] . "</td>
                        </tr>";
                        $nomor++;
                    }
                    ?>
                </tbody>
                </table>
                <h6><a href="hapus.php">Main lagi ?</a></h6>
                </div>
            </div>
        </div>
    </div>
</body>
</html>