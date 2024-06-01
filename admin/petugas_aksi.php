<?php 
include '../koneksi.php';

$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Menggunakan password_hash() untuk meng-hash password

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
    mysqli_query($koneksi, "INSERT INTO petugas VALUES (NULL,'$nama','$username','$password','')");
    header("location:petugas.php");
} else {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // Mengubah ekstensi file menjadi huruf kecil

    if(!in_array($ext, $allowed)) {
        header("location:petugas.php?alert=gagal&reason=invalid_extension");
    } else {
        $file_temp = $_FILES['foto']['tmp_name'];
        $file_destination = '../gambar/petugas/'.$rand.'_'.$filename;

        if(move_uploaded_file($file_temp, $file_destination)){
            $file_gambar = $rand.'_'.$filename;
            mysqli_query($koneksi, "INSERT INTO petugas VALUES (NULL,'$nama','$username','$password','$file_gambar')");
            header("location:petugas.php");
        } else {
            header("location:petugas.php?alert=gagal&reason=upload_failed");
        }
    }
}
?>
