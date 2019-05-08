<?php
//ARRAY NUMERIK
//SEBUAH VARIABLE YANG BISA MENAMPUNG LEBIH DARI SATU NILAI (BANYAK NILAI)
//ELEMEN PADA ARRAY BOLEH MEMILIKI TIPE DATA YANG BERBEDA (PHP)
//KEY ADALAH INDEX DIMULAI DARI 0 (BERUPA ANGKA), VALUE ADALAH NILAI ELEMEN DARI ARRAY
//[KEY] => VALUE

//CARA LAMA
$hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
//CARA BARU
$bulan = ["Januari", "Febuari", "Maret"];
$array1 = [123, "Halo", false];

//MENAMPILKAN SELURUH ELEMEN ARRAY (PENGEMBANGAN)
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";

//MENAMPILKAN ELEMEN TERTENTU
echo $array1[0];
echo "<br>";
echo $bulan[1];
echo "<br>";

//MENAMBAHKAN ELEMEN PADA ARRAY
$bulan[] = "April";
print_r($bulan);
echo "<br>";

//MENAMPILKAN SELURUH ELEMEN ARRAY (USER) LIHAT HTML
//DENGAN PENGULANGAN
$angka = [1, 2, 5, 6, 10, 19, 20, 99];

//ARRAY MULTIDIMENSI (LIHAT HTML)
$mahasiswa = [
    ["Mathias", "2017103126", "Kelapa Gading", "Informatika"], 
    ["Marshell", "2017103152", "Jatinegara", "Informatika"]
];

//MENGHITUNG PANJANG ARRAY
count($angka);

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
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;       
        }

        .clear {clear: both;}
    
    </style>
</head>
<body>
    <?php for($i = 0; $i < count($angka); $i++){ ?>
    <div class="kotak"><?php echo $angka[$i]; ?></div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach($angka as $i){ ?>
    <div class="kotak"><?= $i; ?></div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach($angka as $i) : ?>
    <div class="kotak"><?= $i; ?></div>
    <?php endforeach; ?>
    
    <div class="clear"></div>
    
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li>Nama: <?= $mhs[0]; ?></li>
        <li>NIM: <?= $mhs[1]; ?></li>
        <li>Alamat: <?= $mhs[2]; ?></li>
        <li>Jurusan: <?= $mhs[3]; ?></li>
    </ul>
    <?php endforeach; ?>
    
</body>
</html>