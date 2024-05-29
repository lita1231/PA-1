<?php
include '../koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id = $_SESSION['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['password_confirmation'];

    // Validasi input
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        header("location:gantipassword.php?alert=semuafield");
        exit();
    }

    if ($new_password !== $confirm_password) {
        header("location:gantipassword.php?alert=passwordmismatch");
        exit();
    }

    // Ambil password lama dari database
    $result = mysqli_query($koneksi, "SELECT admin_password FROM admin WHERE admin_id='$id'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['admin_password'];

        // Verifikasi password lama
        if (!password_verify($current_password, $db_password)) {
            header("location:gantipassword.php?alert=passwordlama");
            exit();
        }

        // Hash password baru
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password di database
        mysqli_query($koneksi, "UPDATE admin SET admin_password='$new_password_hashed' WHERE admin_id='$id'") or die(mysqli_error($koneksi));
        header("location:gantipassword.php?alert=sukses");
        exit();
    } else {
        header("location:gantipassword.php?alert=usernotfound");
        exit();
    }
} else {
    header("location:gantipassword.php");
    exit();
}
?>
