<?php
//HALAMAN LOGIN
//GUNAKAN SESSION AGAR USER HARUS LOGIN DULU

//PERIKSA JIKA USER SUDAH LOGIN ATAU BELUM
session_start();

require "../function/function.php";

//PERIKSA COOKIE
//JIKA COOKIE SUDAH DI SET, BISA LOGIN
if(isset($_COOKIE["5yd"]) && isset($_COOKIE["ky6"])){
    $id = $_COOKIE["5yd"];
    $key = $_COOKIE["ky6"];

    //AMBIL USERNAME
    $query = "SELECT username FROM mahasiswa WHERE id = $id";
    $hasil = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($hasil);

    //COCOKAN COOKIE DENGAN DATABASE
    if($key == hash("sha256", $row["username"])){
        $_SESSION["login"] = true;
    }
}

if(isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}

if(isset($_POST["login"])){
    if(!empty($_POST["username"]) || !empty($_POST["password"])){
        //AMBIL DATA LOGIN DARI FORM
        $username = $_POST["username"];
        $password = $_POST["password"];

        //LAKUKAN QUERY
        $query = "SELECT * FROM user WHERE username = '$username'";

        //JALANKAN QUERY
        $hasil = mysqli_query($koneksi, $query);

        //PERIKSA DATA LOGIN APAKAH SUDAH SESUAI ATAU BELUM DENGAN MENCOCOKAN DARI DATABASE
        //GUNAKAN FUNGSI MYSQLI_NUM_ROWS() UNTUK MEMERIKSA APAKAH ADA BARIS YANG COCOK
        //PERIKSA USERNAME 
        if(mysqli_num_rows($hasil) == 1){
            $row = mysqli_fetch_assoc($hasil);

            //PERIKSA PASSWORD
            //GUNAKAN FUNGSI PASSWORD_VERIFY() UNTUK MENCOCOKAN PASSWORD YANG SUDAH DI ENKRIP
            if(password_verify($password, $row["password"])){
                //JIKA BERHASIL LOGIN, REDIRECT KE HALAMAN ADMIN
                //SET SESSION
                $_SESSION["login"] = true;

                //COOKIE
                //PERIKSA JIKA COOKIE DISET
                if(isset($_POST["remember"])){
                    //BUAT COOKIE
                    //5yd ADALAH id (NAMA DISAMARKAN)
                    //ky6 ADALAH username (NAMA DISAMARKAN)
                    setcookie("5yd", $row["id"], time()+60);
                    setcookie("ky6", hash("sha256", $row["username"]), time()+60);
                }

                header("Location: ../index.php");
                exit;
            }
        }
        //JIKA USERNAME ATAU PASSWORD SALAH
        //LIHAT HTML
        $error = "invalid";
    }else{
        //JIKA FORM KOSONG
        //LIHAT HTML
        $error = "belum";
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
    <title>Halaman Login</title>
</head>
<body class="login-body">
    <form class="box-login" action="" method="post">
        <h1>Aplikasi Mahasiswa</h1>
        
        <?php if(isset($error) && $error == "invalid") : ?>
            <p style="color: red;">Username atau password salah</p>
        <?php elseif(isset($error) && $error == "belum") : ?>
            <p style="color: red;">Isi form login dahulu</p>
        <?php endif; ?>

        <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">

        <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">

        <div class="remember-me">
            <input type="checkbox" name="remember" id="remember" autocomplete="off">
            <label for="remember">Remember Me</label>
        </div>

        <button type="submit" name="login">Masuk</button>
        <button class="regis"><a href="regis.php">Daftar</a></button>
 
    </form> 
</body>
</html>