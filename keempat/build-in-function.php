<?php
//FUNCTION
//1. PANGGIL FUNCTION
//2. BISA DIGUNAKAN

//BUILD IN FUNCTION

//--------------------------------------------------------------------------------
//1. DATE TIME (TANGGAL DAN WAKTU)
//time()
echo "<h3>FUNCTION TIME</h3>";
//MENDAPATKAN UNIX TIMESTAMP / EPOCH (WAKTU DICIPTAKAN UNTUK KOMPUTER)
//DETIK YANG SUDAH BERLALU SEJAK 1 JANUARI 1970 (WAKTU SEJAK DICIPTAKAN)
echo time();
echo "<br>";
//MENDAPATKAN HARI LUSA (WAKTU MASA DEPAN)
echo "Hari lusa adalah " . date("l", time() + 60*60*24*2);
echo "<br>";
//MENDAPATKAN DUA HARI KEMARIN (WAKTU MASA LALU)
echo "Hari dua hari kemairn adalah " . date("l", time() - 60*60*24*2);
echo "<br>";
//DENGAN FORMAT TANGGAL
echo date("d M Y", time() + 60*60*24*2);
echo "<br>";
//date(parameter)
echo "<h3>FUNCTION DATE </h3>";
//MENDAPATKAN HARI INI (HARI)
echo "Hari ini adalah hari " . date("l");
echo "<br>";
//MENDAPATKAN TANGGAL HARI INI (TANGGAL)
echo "Hari ini adalah tanggal " . date("d");
echo "<br>";
//MENDAPATKAN BULAN SEKARANG INI (BULAN ANGKA)
echo "Bulan ini adalah bulan ke - " . date("m");
echo "<br>";
//MENDAPATKAN BULAN SEKARANG INI (NAMA BULAN)
echo "Bulan ini adalah bulan " . date("M");
echo "<br>";
//MENDAPATKAN TAHUN SEKARANG INI (TAHUN)
echo "Tahun ini adalah tahun " . date("Y");
echo "<br>";
//FORMAT TANGGAL TERTENTU
//FORMAT TANGGAL ADA BANYAK SEKALI, PERIKSA DI DOKUMENTASI PHP
echo "Tanggalan hari ini " . date("l, d-M-Y");
//mktime(jam, menit, detik, bulan, tanggal, tahun)
echo "<h3>FUNCTION MKTIME</h3>";
//MENDAPATKAN DETIK YANG SUDAH BERJALAN SEJAK WAKTU TERTENTU (DARI TANGGAL LAHIR)
echo "Detik yang sudah berjalan dalam hidup saya " . mktime(0,0,0,3,1,1999);
echo "<br>";
//MENDAPATKAN HARI SEJAK WAKTU TERTENTU (DARI TANGGAL LAHIR)
echo "Hari tanggal lahir saya adalah " . date("l", mktime(0,0,0,3,1,1999));
//strtotime(parameter)
echo "<h3>FUNCTION STRTOTIME</h3>";
//KONVERSI STRING MENJADI WAKTU
echo strtotime("25 aug 1985");
echo "<br>";
echo date("l", strtotime("1 mar 1999"));
//--------------------------------------------------------------------------------
//2. STRING
//strlen()
//PANJANG STRING
//strcmp()
//MENGGABUNGKAN KEDUA STRING
//explode()
//MEMECAH STRING MENJADI ARRAY
//htmlspecialchars()
//--------------------------------------------------------------------------------
//3. UTILITY
//vardump()
//MENCETAK ISI SEBUAH VARIABLE, ARRAY, OBJEK
//isset()
//MEMERIKSA VARIABLE SUDAH DI DEFINISIKAN ATAU BELUM
//empty()
//MEMERIKSA VARIABLE KOSONG ATAU TIDAK
//die()
//MEMBERHENTIKAN PROGRAM 
//sleep()
//MEMBERHENTIKAN PROGRAM SEMENTARA (DELAY)
//--------------------------------------------------------------------------------
?>