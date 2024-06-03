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

    // Ambil data pengguna dari database
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password lama
        if (password_verify($current_password, $user['user_password'])) {
            // Hash password baru
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

            // Update password di database
            $update_result = mysqli_query($koneksi, "UPDATE user SET user_password='$new_password_hashed' WHERE user_id='$id'");

            if ($update_result) {
                header("location:gantipassword.php?alert=sukses");
                exit();
            } else {
                header("location:gantipassword.php?alert=updateerror");
                exit();
            }
        } else {
            header("location:gantipassword.php?alert=passwordlama");
            exit();
        }
    } else {
        header("location:gantipassword.php?alert=usernotfound");
        exit();
    }
} else {
    header("location:gantipassword.php");
    exit();
}
?>
