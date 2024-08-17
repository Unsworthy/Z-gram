<?php
require('../database.php');

// Step 1: mendapatkan semua nilai yang di input
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$confirmpassword = $_POST["confirm_password"];
$encryptedPassword = sha1($password);

// Memastkan input tidak NULL
if (empty($email) || empty($username) || empty($password) || empty($confirmpassword)){
    $msg = "Semua input wajib di isi!!";
    header("Location: ../register.php?msg=" . $msg);
    return;
}

// Cek password sama
if ($password !== $confirmpassword){
    $msg = "Kata sandi tidak sama!";
    header("Location: ../register.php?msg=" . $msg);
    return;
}

// Step 2: Menyimpan ke database

$sql = "INSERT INTO user (email, username, password) VALUE ('$email', '$username', '$encryptedPassword' )";
if ($mysqli->query($sql))  {
    $msg = "Register berhasil, Silahkan Login!!";
}else {
   $msg = "Register gagal!" ;
}

header("Location: ../login.php?msg=" . $msg);