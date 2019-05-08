<?php
//ASOSIATIF ARRAY
//KEY DAPAT BERASOSIASI DENGAN VALUE
//KEY ADALAH STRING YANG KITA BUAT SENDIRI
//LIHAT HTML 

//ARRAY NUMERIK
$angka = [1, 56, 43, 67, 88];

//ARRAY ASOSIATIF
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
    <title>Array</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: #BADA55;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
            transition: 1s;
        }

        .clear {clear: both;}

        .kotak:hover {
            transform: rotate(180deg);
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <h1>Angka Numerik</h1>
    <?php foreach($angka as $a) : ?>
    <div class="kotak"><?= $a; ?></div>
    <?php endforeach; ?>
    <div class="clear"></div>

    <h1>Daftar Mahasiswa Asosiatif</h1>
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>" width="100">
        </li>
        <li>Nama: <?= $mhs["nama"]; ?></li>
        <li>NIM: <?= $mhs["nim"]; ?></li>
        <li>Alamat: <?= $mhs["alamat"]; ?></li>
        <li>Jurusan: <?= $mhs["jurusan"]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>