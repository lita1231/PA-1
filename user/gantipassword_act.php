<?php
include '../koneksi.php';
session_start();
$id = $_SESSION['id'];
$password = md5($_POST['password']);

// Tambahkan konfirmasi ganti password
if (isset($_POST['konfirmasi'])) {
    mysqli_query($koneksi, "UPDATE admin SET admin_password='$password' WHERE admin_id='$id'")or die(mysqli_errno());
    header("location:gantipassword.php?alert=sukses");
} else {
    header("location:gantipassword.php?alert=konfirmasi");
}