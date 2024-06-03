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
    $old_password = $_POST['old_password'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['password_confirmation'];

    // Validasi input
    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        header("Location: gantipassword.php?alert=semuafield");
        exit();
    }

    if ($new_password !== $confirm_password) {
        header("Location: gantipassword.php?alert=passwordmismatch");
        exit();
    }

    // Cek password lama
    $stmt = $koneksi->prepare("SELECT admin_password FROM admin WHERE admin_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_password);
        $stmt->fetch();
        if (!password_verify($old_password, $stored_password)) {
            header("Location: gantipassword.php?alert=passwordlama");
            exit();
        }
    } else {
        header("Location: gantipassword.php?alert=usernotfound");
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
