<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$petugas = $_SESSION['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];

// Mengecek ukuran file yang diunggah
if ($_FILES['file']['size'] > 10000000000) { // 10GB dalam byte
    header("location:arsip.php?alert=gagal_ukuran");
    exit;
}

// Generate nama file acak dengan fungsi rand()
$rand = rand();

// Nama file asli dan ekstensi file yang diunggah
$filename = $_FILES['file']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);

$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];

// Mengecek apakah jenis file adalah PHP (berbahaya)
if(in_array($jenis, array("php", "phtml", "php3", "php4", "php5", "pht", "phar"))) {
    header("location:arsip.php?alert=gagal");
} else {
    // Memindahkan file yang diunggah ke direktori penyimpanan
    move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/'.$rand.'_'.$filename);
    $nama_file = $rand.'_'.$filename;
    
    // Menyimpan informasi file ke database
    mysqli_query($koneksi, "INSERT INTO arsip VALUES (NULL,'$waktu','$petugas','$kode','$nama','$jenis','$kategori','$keterangan','$nama_file')") or die(mysqli_error($koneksi));
    
    header("location:arsip.php?alert=sukses");
}
?>
