<?php
include '../koneksi.php';

// Pastikan ada input yang diterima sebelum mengaksesnya
if(isset($_POST['id'], $_POST['nama'], $_POST['username'], $_POST['password'], $_FILES['foto'])) {
    $id  = $_POST['id'];
    $nama  = $_POST['nama'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $password = password_hash($pwd, PASSWORD_DEFAULT);

    // cek gambar
    $rand = rand();
    $allowed =  array('gif','png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(empty($pwd) && empty($filename)) {
        // Jika password dan foto kosong
        $query = mysqli_query($koneksi, "UPDATE user SET user_nama='$nama', user_username='$username' WHERE user_id='$id'");
        if($query) {
            header("location:user.php");
            exit;
        } else {
            header("location:user.php?alert=gagal");
            exit;
        }
    } elseif(empty($pwd)) {
        // Jika password kosong tapi ada upload foto
        if(in_array($ext,$allowed)) {
            move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
            $x = $rand.'_'.$filename;
            $query = mysqli_query($koneksi, "UPDATE user SET user_nama='$nama', user_username='$username', user_foto='$x' WHERE user_id='$id'");
            if($query) {
                header("location:user.php?alert=berhasil");
                exit;
            } else {
                header("location:user.php?alert=gagal");
                exit;
            }
        } else {
            header("location:user.php?alert=gagal");
            exit;
        }
    } elseif(empty($filename)) {
        // Jika upload foto kosong tapi password diisi
        $query = mysqli_query($koneksi, "UPDATE user SET user_nama='$nama', user_username='$username', user_password='$password' WHERE user_id='$id'");
        if($query) {
            header("location:user.php");
            exit;
        } else {
            header("location:user.php?alert=gagal");
            exit;
        }
    }
} else {
    // Jika ada input yang tidak diterima
    header("location:user.php?alert=gagal");
    exit;
}
?>
