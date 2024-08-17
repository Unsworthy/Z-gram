<?php
session_start();
require('../database.php');

// Step 1: mendapatkan semua nilai yang di input
$content = $_POST["content"];

// mendapatkan id user
$email = $_SESSION['email'];
$sqlUser = "SELECT id FROM `user` WHERE email = '$email'";
$resultUser = $mysqli->query($sqlUser);
$user_id = $resultUser->fetch_assoc()['id'];

// Memastikan input tidak NULL
if (empty($content)){
    $msg = "Status tidak boleh kosong";
    header("Location: ../feed.php?msg=" . $msg);
    return;
}

// Step 2: Menyimpan ke database
$sql = "INSERT INTO status (user_id, content) VALUES ('$user_id', '$content')";

if ($mysqli->query($sql)) {
    $msg = "Status berhasil diupdate!";
} else {
    $msg = "Gagal mengupdate status!";
}

header("Location: ../feed.php?msg=" . $msg);

?>
