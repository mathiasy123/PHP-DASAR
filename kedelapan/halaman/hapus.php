<?php 

require "../function/function.php";

$id = $_GET["id"];

if(hapus($id) > 0){
        echo "
            <script>
                alert('DATA MAHASISWA BERHASIL DIHAPUS');
                document.location.href='../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('DATA MAHASISWA GAGAL DIHAPUS');
                document.location.href='../index.php';
            </script>
        ";
    }
