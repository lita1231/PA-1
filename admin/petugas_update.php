<?php 
include '../koneksi.php';

// Validasi input untuk mencegah serangan SQL Injection
$id = mysqli_real_escape_string($koneksi, $_POST['id']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$pwd = mysqli_real_escape_string($koneksi, $_POST['password']);
$password = password_hash($pwd, PASSWORD_DEFAULT);

// Validasi input untuk mencegah serangan upload file yang berbahaya
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if ($pwd == "" && $filename == "") {
    mysqli_query($koneksi, "UPDATE petugas SET petugas_nama='$nama', petugas_username='$username' WHERE petugas_id='$id'");
    header("location:petugas.php");
} elseif ($pwd == "") {
    if (!in_array($ext, $allowed)) {
        header("location:petugas.php?alert=gagal");
    } else {
        if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
            // Penanganan jika terjadi kesalahan dalam upload file
            header("location:petugas.php?alert=gagal_upload");
            exit();
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/'.$rand.'_'.$filename);
        $x = $rand.'_'.$filename;
        mysqli_query($koneksi, "UPDATE petugas SET petugas_nama='$nama', petugas_username='$username', petugas_foto='$x' WHERE petugas_id='$id'");        
        header("location:petugas.php?alert=berhasil");
    }
} elseif ($filename == "") {
    mysqli_query($koneksi, "UPDATE petugas SET petugas_nama='$nama', petugas_username='$username', petugas_password='$password' WHERE petugas_id='$id'");
    header("location:petugas.php");
}
?>
