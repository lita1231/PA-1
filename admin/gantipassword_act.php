<?php
include '../koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi keberadaan session
    if (!isset($_SESSION['id'])) {
        header("Location: gantipassword.php?alert=sessionnotfound");
        exit();
    }

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

    // Prepared statement untuk update password
    $stmt = $koneksi->prepare("UPDATE admin SET admin_password=? WHERE admin_id=?");
    $stmt->bind_param("si", $new_password_hashed, $id);
    if ($stmt->execute()) {
        header("Location: gantipassword.php?alert=sukses");
        exit();
    } else {
        header("Location: gantipassword.php?alert=updatefailed");
        exit();
    }
} else {
    header("Location: gantipassword.php");
    exit();
}
?>
