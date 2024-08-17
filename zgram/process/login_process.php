<?php
session_start();
require('../database.php');


//mendapatkan seluruh input data
$email = $_POST["email"];
$password = $_POST["password"];
$encyptedPassword = sha1($password);

//verifikasi / validasi
if (empty($email) || empty($password)){
    $msg = "Email dan katasandi tidak boleh kosong!";
    header("location: ../login.php?msg=".$msg);
    return;
}

// ceki ceki email password
$sql = "SELECT email, password FROM user WHERE email = '$email' AND password = '$encyptedPassword'";
$result = $mysqli->query($sql);

if($result->num_rows > 0){
    // simpan sesi dia
    $_SESSION ['email'] = $email;
    header("Location: ../feed.php");
} else {
   $msg = "Login gagal. Pastikan email dan kata sandi anda benar!";
   header("Location: ../login.php?msg".$msg);
}