<?php 
// Menghubungkan dengan koneksi
include 'koneksi.php';

// Memulai sesi
session_start();

// Menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$akses = $_POST['akses'];

// Menggunakan prepared statements untuk keamanan
if($akses == "admin"){
    $stmt = $koneksi->prepare("SELECT * FROM admin WHERE admin_username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $cek = $result->num_rows;

    if($cek > 0){
        $data = $result->fetch_assoc();
        if (password_verify($password, $data['admin_password'])) {
            $_SESSION['id'] = $data['admin_id'];
            $_SESSION['nama'] = $data['admin_nama'];
            $_SESSION['username'] = $data['admin_username'];
            $_SESSION['status'] = "admin_login";

            header("location:admin/");
        } else {
            header("location:login.php?alert=gagal");
        }
    }else{
        header("location:login.php?alert=gagal");
    }
    $stmt->close();
} else {
    $stmt = $koneksi->prepare("SELECT * FROM petugas WHERE petugas_username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $cek = $result->num_rows;

    if($cek > 0){
        $data = $result->fetch_assoc();
        if (password_verify($password, $data['petugas_password'])) {
            $_SESSION['id'] = $data['petugas_id'];
            $_SESSION['nama'] = $data['petugas_nama'];
            $_SESSION['username'] = $data['petugas_username'];
            $_SESSION['status'] = "petugas_login";

            header("location:petugas/");
        } else {
            header("location:login.php?alert=gagal");
        }
    }else{
        header("location:login.php?alert=gagal");
    }
    $stmt->close();
}

// Menutup koneksi
$koneksi->close();
?>
