<?php
//MEMERIKSA $_GET UNTUK KEAMANAN

if( !isset($_GET["nama"]) ||
    !isset($_GET["nim"]) ||
    !isset($_GET["alamat"]) ||
    !isset($_GET["jurusan"]) ||
    !isset($_GET["gambar"])){
    //REDIRECT
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HALAMAN MAHASISWA</title>
</head>
<body>
    <ul>
        <li>
            <img src="img/<?= $_GET["gambar"] ?>" width="100">
        </li>
        <li>Nama: <?= $_GET["nama"]; ?></li>
        <li>NIM: <?= $_GET["nim"]; ?></li>
        <li>Alamat: <?= $_GET["alamat"]; ?></li>
        <li>Jurusan: <?= $_GET["jurusan"]; ?></li>
    </ul>
    <a href="index.php">Kembali >></a>
</body>
</html>