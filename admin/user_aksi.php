<?php 
include '../koneksi.php';

$nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
    mysqli_query($koneksi, "INSERT INTO user VALUES (NULL,'$nama','$username','$password','')");
    header("location:user.php");
} else {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$allowed) ) {
        header("location:user.php?alert=gagal");
    } else {
        move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
        $file_gambar = $rand.'_'.$filename;
        mysqli_query($koneksi, "INSERT INTO user VALUES (NULL,'$nama','$username','$password','$file_gambar')");
        header("location:user.php");
    }
}
?>