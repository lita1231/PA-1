<?php 
include '../koneksi.php';
session_start();
$id = $_SESSION['id'];
$password = md5($_POST['password']);

if (isset($_POST['konfirmasi']) && $_POST['konfirmasi'] == "1") {
    mysqli_query($koneksi, "UPDATE petugas SET petugas_password='$password' WHERE petugas_id='$id'") or die(mysqli_errno());
    header("location:gantipassword.php?alert=sukses");
} else {
    header("location:gantipassword.php?alert=konfirmasi");
}
?>
