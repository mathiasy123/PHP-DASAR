<?php
//DATABASE
//1. EKSTENSI MYSQL
//2. EKSTENSI MYSQLi
//3. PDO (PHP DATA OBJECT)

//PERIKSA JIKA USER SUDAH LOGIN ATAU BELUM
session_start();

if(!isset($_SESSION["login"])){
    header("Location: halaman/login.php");
    exit;
}

require "function/function.php";

//MEMBUAT PAGINATION, MENENTUKAN BERAPA DATA DALAM SATU HALAMAN
//KONFIGURASI
$jumlahDataPerHalaman = 5;

//HITUNG KESELURUHAN UNTUK MENGHITUNG JUMLAH HALAMAN
//JUMLAH HALAMAN = JUMLAH SELURUH DATA / JUMAH DATA PER  HALAMAN
$jumlahData = count(query("SELECT * FROM mahasiswa"));
//BULATKAN HASIL, AGAR HALAMAN MENJADI BILANGAN BULAT
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

//PERIKSA HALAMAN SEKARANG
$halamanSekarang = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
//HITUNG HALAMAN AWAL DI SETIAP HALAMAN
//AWAL DATA = (JUMLAH DATA PER HALAMAN * HALAMAN SEKARANG) - JUMLAH DATA PER HALAMAN
$awalData = ($jumlahDataPerHalaman * $halamanSekarang) - $jumlahDataPerHalaman;

//DISINI MENENTUKAN DATA SEBANYAK 5 DATA
//MENAMPILKAN 5 DATA DIMULAI DARI INDEX 1 
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

// //PERIKSA JIKA TOMBOL CARI DI KLIK
// if(isset($_POST["cari"])){
//     $mahasiswa = cari($_POST["keyword"]);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
    <link href="fontawesome-free-5.7.2-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body class="konten-body">

        <a href="halaman/logout.php" class="logout btn-logout">Logout</a>

        <h2 class="text-h2">Daftar Mahasiswa</h2>

        <!-- SEARCHING -->
        <form class="box-cari" action="" method="post">
            <input type="text" class="text-cari" name="keyword" size="30" id="keyword" placeholder="Masukan kata kunci pencarian" autocomplete="off" autofocus>
            <a class="btn-cari" href="#">
                <i class="fas fa-search"></i>
            </a>
            <!-- <button type="submit" name="cari" id="tombol-cari">Cari</button> -->
        </form>

        <!-- <img src="img/loader.gif" class="loader"> -->

        <a href="halaman/tambah.php" class="btn-tambah">Tambah Data Mahasiswa</a>

        <!-- NAVIGASI PAGINATION -->
        <div class="paginasi">
            <!-- SIMBOL PREV -->
            <?php if($halamanSekarang > 1) : ?>
                <a href="?halaman=<?= $halamanSekarang - 1; ?>">&laquo;</a>
            <?php endif; ?>

    
            <!-- PINDAH HALAMAN -->
            <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if($i == $halamanSekarang) : ?>
                    <a href="?halaman=<?= $i; ?>" class="aktif"><?= $i; ?></a>
                <?php else : ?>
                    <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <!-- SIMBOL NEXT -->
            <?php if($halamanSekarang < $jumlahHalaman) : ?>
                <a href="?halaman=<?= $halamanSekarang + 1; ?>">&raquo;</a>
            <?php endif; ?>
        </div>
        
        <!-- MENAMPILKAN DATA -->
        <div id="tabel-data" class="tabel-mhs">
            <table>
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Gambar</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>    
                </tr>

                <?php $i = 1; ?>
                <?php foreach($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="halaman/ubah.php?id=<?= $mhs["id"]; ?>" class="btn-ubah">Ubah</a>
                        <a href="halaman/hapus.php?id=<?= $mhs["id"]; ?>" class="btn-hapus" onclick="return confirm('YAKIN MAU MENGHAPUS?');">Hapus</a>
                    </td>
                    <td><img src="img/<?= $mhs["gambar"]; ?>" width="80" height="70"></td>
                    <td><?= $mhs["nim"]; ?></td>
                    <td><?= $mhs["nama"]; ?></td>
                    <td><?= $mhs["jurusan"]; ?></td>
                    <td><?= $mhs["alamat"]; ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
</body>
</html>