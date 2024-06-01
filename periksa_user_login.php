<?php
// menghubungkan dengan koneksi
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE user_username='$username'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if (password_verify($password, $data['user_password'])) {
        session_start();
        $_SESSION['id'] = $data['user_id'];
        $_SESSION['nama'] = $data['user_nama'];
        $_SESSION['username'] = $data['user_username'];
        $_SESSION['status'] = "user_login";

        header("location:user/");
    } else {
        header("location:user_login.php?alert=gagal");
    }
} else {
    header("location:user_login.php?alert=gagal");
}

?>
