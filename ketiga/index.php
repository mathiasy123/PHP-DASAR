<?php

//STRUKTUR KENDALI
//PENGULANGAN
//1. FOR 
for($i = 0; $i < 5; $i++){
    echo "Hello World<br>";
}
//2. WHILE
echo "<br>";
$i = 0;
while($i < 5){
    echo "Hello World<br>";
    $i++;
}
//3. D0 WHILE
echo "<br>";
$i = 0;
do {
    echo "Hello World<br>";
    $i++;
}while($i < 5);

//PENGKONDISIAN
//1. IF ELSE
echo "<br>";
$x = 10;
if($x < 20){
    echo "benar";
}else{
    echo "salah";
}
echo "<br>";

//2. IF ELSE IF ELSE
echo "<br>";
$y = 20;
if($y < 20){
    echo "benar";
}else if($y == 20){
    echo "tepat";
}else{
    echo "salah";
}
echo "<br>";

//3. TERNERAY
//4. SWITCH
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .warna-baris {
            background-color: grey;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="10">
    <?php
    echo "<br>";
    for($i = 1; $i <= 3; $i++){
    ?>
        <?php if($i % 2 == 1) : //simbol : adalah {}?>
        <tr class="warna-baris">
        <?php else : ?>
        <tr>
        <?php endif; ?>
            <?php for ($j = 1; $j <=5; $j++) {?>
            <td><?= "$i, $j";  ?></td>
            <?php } ?>
           </tr>
    <?php } ?>
    </table>
</body>
</html>