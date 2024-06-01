<?php
include '../koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id = $_SESSION['id'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['password_confirmation'];

    // Validasi input
    if (empty($new_password) || empty($confirm_password)) {
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
        // Debugging: Tampilkan pesan error jika pengguna tidak ditemukan
        if (!$result) {
            // Query failed
            $error_message = mysqli_error($koneksi);
            echo "Error: " . $error_message;
        } elseif (mysqli_num_rows($result) == 0) {
            // No rows found
            echo "Error: User not found. ID: " . $id;
        }
        header("location:gantipassword.php?alert=usernotfound");
        exit();
    }
} else {
    header("location:gantipassword.php");
    exit();
}
?>
