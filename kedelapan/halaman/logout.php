<?php
//HAPUS SESSION
session_start();

$_SESSION = [];

session_unset();

session_destroy();

//HAPUS COOKIE
setcookie("5yd", "", time()-60);
setcookie("ky6", "", time()-60);

header("Location: login.php");
exit;
?>