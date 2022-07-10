<?php
include('../koneksi.php');// membuka koneksi

if (isset($_GET['id'])) {
   
    //Mengambil id
    $x = $_GET['id'];

    $data = mysqli_query($conn, "SELECT * FROM tbl_surat where id_surat='$x' ");
    $get = mysqli_fetch_array($data);

    //Cek apakah file foto sebelumnya ada di folder foto
    if (is_file("" . $get['logoKop1'])) // Jika foto 1 ada
    {
        unlink("" . $get['logoKop1']); // Hapus file foto 1 sebelumnya yang ada di folder foto
    }
    
    $sql = "DELETE FROM tbl_surat WHERE id_surat='$x'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("location:../../dt_s_izinTempat.php");
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}
?>
