<?php

//PERIKSA JIKA USER SUDAH LOGIN ATAU BELUM
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

//PERIKSA TOMBOL SUBMIT PADA TOMBOL FORM
if(isset($_POST["submit"])){
    require "../function/function.php";

    //PERIKSA DATA BERHASIL DITAMBAHKAN
    //PERIKSA DARI PERUBAHAN BARIS PADA TABEL
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('DATA MAHASISWA BERHASIL DITAMBAHKAN');
                document.location.href='../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('DATA MAHASISWA GAGAL DITAMBAHKAN');
            </script>
        ";
    }
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../style/style.css" rel="stylesheet">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Tambah Data Mahasiswa</title>
</head>
<body class="konten-body">
    <form class="box-tambah" action="" method="post" enctype="multipart/form-data">
        <h1>Tambah Data Mahasiswa</h1>
 
                <input type="text" name="nim" id="nim" autocomplete="off" placeholder="Isi NIM mahasiswa" required>

                <input type="text" name="nama" id="nama" autocomplete="off" placeholder="Isi nama mahasiswa" required>

                <input type="text" name="alamat" id="alamat" autocomplete="off" placeholder="Isi alamat mahasiswa" required>

                <input type="text" name="jurusan" id="jurusan" autocomplete="off" placeholder="Isi jurusan mahasiswa" required>

                <input type="file" name="gambar" id="gambar" class="input-file">
                <label for="gambar">Foto mahasiswa..</label>
                <div id="nama-file"></div>

                <button type="submit" name="submit">Tambah Data Mahasiswa</button>
            </li>
        </ul>
    </form>
</body>
</html>