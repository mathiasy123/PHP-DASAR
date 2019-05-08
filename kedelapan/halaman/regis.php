<?php

require "../function/function.php";

if(isset($_POST["regis"])){
    if(regis($_POST) > 0){
        echo "
            <script>
                alert('REGISTRASI BERHASIL');
                document.location.href='login.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('REGISTRASI GAGAL');
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
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <title>Halaman Registrasi</title>
    <style>
        label {display: block;}
    </style>
</head>
<body class="regis-body">

    <form class="box-regis" action="" method="post">
        <h1>Registrasi</h1>
 
        <input type="text" name="username" id="username" autocomplete="off" placeholder="Isi username" required>

        <input type="password" name="password" id="password" autocomplete="off" placeholder="Isi password" required>

        <input type="password" name="konfirm" id="konfirm" autocomplete="off" placeholder="Isi konfirmasi password" required>

        <button type="submit" name="regis">Daftar</button>

    </form>
</body>
</html>