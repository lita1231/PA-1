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
        header("Location: gantipassword.php?alert=semuafield");
        exit();
    }

    if ($new_password !== $confirm_password) {
        header("Location: gantipassword.php?alert=passwordmismatch");
        exit();
    }

    // Hash password baru
    $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

    // Update password di database
    $update_query = "UPDATE petugas SET petugas_password=? WHERE petugas_id=?";
    $stmt = $koneksi->prepare($update_query);
    $stmt->bind_param("si", $new_password_hashed, $id);

    if ($stmt->execute()) {
        header("Location: gantipassword.php?alert=sukses");
    } else {
        header("Location: gantipassword.php?alert=gagalupdate");
    }

    $stmt->close();
    $koneksi->close();
    exit();
} else {
    header("Location: gantipassword.php");
    exit();
}
?>
