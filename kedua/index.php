<?php
//TAG PEMBUKA PHP

//SINTAKS PHP

//SINTAKS PERTAMA : KOMENTAR
//1. INI KOMENTAR DALAM PHP '//'

/* 2.
 INI KOMENTAR JUGA
*/

//SINTAKS KEDUA: STANDAR OUTPUT
//1. ECHO atau PRINT
//MENCETAK ISI DARI VARIABLE atau STRING 
//UNTUK STRING BISA MENGGUNAKAN '' atau ""
//echo "Mathias ";
//echo 'Mathias ';
//print " Mathias ";

//2. PRINT_R
//MENCETAK ISI ARRAY atau STRING
//print_r("Mathias ");

//3. VAR_DUMP()
//INFORMASI ISI DARI VARIABEL
//var_dump("Mathias")
//PANJANG STRING DARI "Mathias" (TERMASUK SPASI)

//SINTAKS KETIGA: PENULISAN
//1. HTML DALAM PHP
//2. PHP DALAM HTML

//SINTAKS KEEMPAT: VARIABLE DAN TIPE DATA
//MENGGUNAKAN TANDA '$'
//TIDAK PERLU INISIALISASI TIPE DATA
//TIDAK BOLEH DIAWALI DENGAN ANGKA CONTOH: $1nama
//CONTOH:
//$nama;
//$angka;
//$nama = 'Mathias'; (STRING)
//$angka = 1; (INTEGER)
///$nama = 'mathias';
//echo "Halo nama saya $nama ";

//SINTAKS KELIMA: OPEREATOR
//1. OPERATOR MATEMATIKA => + - * / %
//CONTOH:
//$x = 10;
//$y = 11;
//$hasil = $x + $y;

//2. OPERATOR PENGGABUNG STRING (CONCATE) => .
//CONTOH
//$nama_depan = "Mathias";
//$nama_belakang = "Yeremia";
//echo $nama . " " . $nama_belakang; 

//3. OPERATOR ASSIGNMENT => +=, -=, *=, /=, %=, .=
//CONTOH
//$x = 1;
//$x -= 5;
//echo $x;

//4. OPERATOR PERBANDINGAN => <, >, <=, >=, ==
//MEMERIKSA NILAI BUKAN TIPE DATA
//CONTOH
//var_dump("1" == "2");

//5. OPERATOR IDENTITAS => ===, !==
//MEMERIKSA TIPE DATA
//var_dump(1 === "1");

//6. OPERATOR LOGIKA => &&(AND), ||(OR), !(NOT)
//MEMERIKSA KONDISI (HARUS BERNILAI TRUE)
//CONTOH
//$x = 30;
//var_dump($x < 20 $$ x > 30);

//TAG PENUTUP PHP
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?php echo "Mathias"; ?></h1>
    <?php
        echo "<h1>Mathias</h1>"
    ?>
</body>
</html>