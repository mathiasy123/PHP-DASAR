<?php
//METHOD GET DAN POST

//1. LINGKUP VARIABLE
//VARIABLE LOKAL UNTUK FILE index.php
// $x = 10;

// function tampilX(){
//     //VARIABLE GLOBAL, CARI $X YANG BERNILAI 10
//     global $x;
//     echo $x;
// }

// tampilX();

// echo "<br>";
// echo $x;

//2. VARIABLE SUPERGLOBALS (ARRAY ASOSIATIF)
//$_GET
// var_dump($_GET);
//$_POST
// var_dump($_POST);
//$_REQUEST
// var_dump($_REQUEST);
//$_SESSION
// var_dump($_SESSION);
//$_COOKIE
// var_dump($_COOKIE);
//$_SERVER
// var_dump($_SERVER);
//$_ENV
// var_dump($_ENV);

//INIT YANG DIBAHAS ADALAH METODE REQUEST
//1. GET
//BIASANYA DIGUNAKAN UNTUK MENGIRIM DATA MELALUI URL
//CARA (UNTUK 1 DATA): localhost/phpdasar/ketujuh/index.php?nama=Mathias
//SIMBOL ? ARTINYA MEMASUKAN DATA KE DALAM METODE REQUEST $_GET
//nama = Mathias, nama ADALAH KEY NYA, Mathias ADALAH VALUENYA
//CARA (UNTUK 2 DATA): localhost/phpdasar/ketujuh/index.php?nama=Mathias&nim=2017103126
//SIMBOL & ADALAH UNTUK MENAMBAHKAN ELEMEN DATA PADA METODE REQUEST $_GET
///SEHINGGA $_GET MEMILIKI KEY nama DAN nim DENGAN NILAINYA

//IMPLEMENTASI LIHAT HTML
$mahasiswa = [
    [
        "nama" => "Mathias", 
        "nim" => "201703126", 
        "alamat" => "Kelapa Gading", 
        "jurusan" => "Informatika",
        "gambar" => "9gag_2___Bd1aBuyH3pW___.jpg"
    ],
    [
        "nama" => "Marshell", 
        "nim" => "2017152", 
        "alamat" => "Jatinegara", 
        "jurusan" => "Informatika",
        "gambar" => "13092326_500501656816877_1124401049_n.jpg"
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME (GET)</title>
</head>
<body>
    <h3>Daftar Mahasiswa</h3>
    <ul>
    <?php foreach($mahasiswa as $mhs) : ?>
        <li>
            <a href="index2.php?nama=<?= $mhs["nama"]; ?>&nim=<?= $mhs["nim"] ?>&alamat=<?= $mhs["alamat"] ?>&jurusan=<?= $mhs["jurusan"] ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
        </li>
        <br>
    <?php endforeach; ?>
    </ul>
</body>
</html>