<?php
session_start();
require "koneksi.php";
if (!isset($_SESSION["login"])) {
    header("Location: form.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia Quiz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">Soal</div>
            <div class="card-body">
                <?php
                echo " <h6>Nama : " . $_SESSION["nama"] . "<br>
                Lives : " . $_SESSION["nyawa"] . "<br>
                Skor : " . $_SESSION["skor"] . "</h6>";
                echo "<h4>Jawablah pertanyaan berikut ini</h4>";
                $pertama = rand(0, 20);
                $kedua = rand(0, 20);
                $_SESSION["hasil"] = $pertama + $kedua;
                echo "<h4>", $pertama, " + ", $kedua, " =</h4>";
                ?>
                <form method="POST" action="hasil.php">
                    <div class="form-group mt-3">
                        <div>
                        <input type="text" name="jawab" required>
                        <?php
                        if (!isset($_SESSION["ucapan"])) {
                        echo "";
                        } else {
                            echo $_SESSION["ucapan"];
                        }
                        ?>
                        <a href="peringkat.php"><strong>Berhenti ?</strong></a>
                        </div>                        
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Jawab</button>
                    <h6><a href="hapus.php">Bukan <?php echo $_SESSION["nama"] ?> ?</a></h6>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
