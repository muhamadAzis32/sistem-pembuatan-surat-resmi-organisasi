<?php
include('../koneksi.php'); // membuka koneksi

if (isset($_GET['id'])) {

    //Mengambil id
    $x = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM tbl_user where id_user='$x' ");
    $get = mysqli_fetch_array($data);

    //Cek apakah file foto sebelumnya ada di folder images
    if (is_file("" . $get['poto_user'])) // Jika foto ada
    {
        unlink("" . $get['poto_user']); // Hapus file foto sebelumnya yang ada di folder images
    }

    $sql = "DELETE FROM tbl_user WHERE id_user='$x'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("location:../../datauser.php");
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
