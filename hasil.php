<?php
session_start();
if (isset($_POST["submit"])) {
    if ($_POST["jawab"] == $_SESSION["hasil"]) {
        $_SESSION["skor"] += 10;
        $_SESSION["ucapan"] = "Selamat, jawaban Anda benar. Skor +10";
    } elseif ($_SESSION["skor"] == 0){
        $_SESSION["nyawa"] -= 1;
        $_SESSION["skor"] == 0;
        $_SESSION["ucapan"] = "Maaf jawaban Anda salah. Lives -1 Skor -2";
    }
     else {
        $_SESSION["nyawa"] -= 1;
        $_SESSION["skor"] -= 2;
        $_SESSION["ucapan"] = "Maaf jawaban Anda salah. Lives -1 Skor -2";
    }
} 
if ($_SESSION["nyawa"] > 0) {
    header("Location: math.php");
    exit;
    } elseif ($_SESSION["nyawa"] <= 0) {
        $nama = $_SESSION["nama"];
        $skor = $_SESSION["skor"];
        header("Location: peringkat.php");
        exit;
    }
?>