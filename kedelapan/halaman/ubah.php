<?php
//PERIKSA JIKA USER SUDAH LOGIN ATAU BELUM
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}


require "../function/function.php";

//AMBIL ID NYA DARI URL
$id = $_GET["id"];


//QUERY DATA BERDASARKAN ID NYA ARRAY NUMERIK
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//PERIKSA TOMBOL SUBMIT PADA TOMBOL FORM
if(isset($_POST["submit"])){

    //PERIKSA DATA BERHASIL DIUBAH
    //PERIKSA DARI PERUBAHAN BARIS PADA TABEL
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('DATA MAHASISWA BERHASIL DIUBAH');
                document.location.href='../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('DATA MAHASISWA GAGAL DIUBAH');
                document.location.href='../index.php';
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
    <title>Ubah Data Mahasiswa</title>
</head>
<body class="konten-body">

    <form class="box-ubah" action="" method="post" enctype="multipart/form-data">
        <h1>Ubah Data Mahasiswa</h1>

        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">

        <input type="text" name="nim" id="nim" value="<?= $mhs["nim"]; ?>" autocomplete="off">

        <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>" autocomplete="off">

        <input type="text" name="alamat" id="alamat" value="<?= $mhs["alamat"]; ?>" autocomplete="off">

        <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>" autocomplete="off">

        <img src="../img/<?= $mhs["gambar"]; ?>">
        <input type="file" name="gambar" id="gambar" class="input-file">
        <label for="gambar">Foto mahasiswa..</label>
        <div id="nama-file"></div>

        <button type="submit" name="submit">Ubah Data Mahasiswa</button>

        </ul>
    </form>
</body>
</html>