<?php
//IMPLEMENTASI POST PADA LOGIN
//GUNAKAN METHOD POST PADA FORM LOGIN AGAR AMAN

//BAGIAN VALIDASI

//1. CEK FORM
if(isset($_POST["submit"])){
    //2. CEK USERNAME DAN PASSWORD
    if($_POST["username"] == "admin" && $_POST["password"] == "123"){
        header("Location: admin.php");
        exit;
    }else{
        $pesan = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login Admin</h1>
    <?php if(isset($pesan)) : ?>
        <p style="color: red; font-style: bold;">Username atau password salah</p>
    <?php endif; ?>
    <ul>
        <form action="" method="post">
            <li>
                <label for="username">username  :</label>
                <input type="text" name="username" id="username" autocomplete="off">
            </li>
            <br>
            <li>
                <label for="password">password  :</label>
                <input type="password" name="password" id="password" autocomplete="off">
            </li>
            <br>
            <button type="submit" name="submit">Login</button>
        </form>
    </ul>
</body>
</html>