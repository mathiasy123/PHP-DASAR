<?php
//METHOD REQUEST POST
//DIGUNAKAN MENGIRIMKAN DATA TANPA MELALUI URL
//DATA TIDAK DI TAMPILKAN DI URL
//BIASANYA DIGUNAKAN DALAM FORM
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME (POST)</title>
</head>
<body>
    <form action="index4.php" method="post">
        Masukan nama : <input type="text" name="nama"><br>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>