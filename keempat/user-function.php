<?php
//USER DEFINITION FUNCTION
//GUNAKAN KEYWORD "function"
//JIKA PARAMETER DIDEFINISIKAN ITU ADALAH NILAI DEFAULT
function salam($waktu = "datang", $nama = "John Doe"){
    return "Selamat $waktu, $nama";
}
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
    <h2><?= salam("Pagi", "Mathias");  ?>!</h2>
</body>
</html>