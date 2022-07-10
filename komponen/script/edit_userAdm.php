<?php
include('../koneksi.php'); // membuka koneksi


// menyimpan data kedalam variabel
$idUser = $_POST['id_user'];
$vnama = $_POST['nama_user'];
$vpassword = $_POST['password_user'];
$vemail = $_POST['email_user'];
$vlevel =  $_POST['level_user'];

// mengambil nama dari file yang di upload
$namaFile = $_FILES['foto']['name'];
//mengambil lokasi sementara foto yang di upload
$namaSementara = $_FILES['foto']['tmp_name'];

if (empty($namaFile)) { //Jika tidak upload gambar

    //query SQL untuk edit data
    $query = "UPDATE tbl_user set id_user='$idUser', nama_user='$vnama', password_user='$vpassword', email_user='$vemail', level_user='$vlevel' WHERE id_user='$idUser' ";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        //Mengalihkan halaman
        header("location:../../dataUser.php");
    } else {
        die("Gagal menyimpan perubahan...");
    }
} 
else { //jika user upload gambar

    //Mengambil id
    $x = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM tbl_user where id_user='$x' ");
    $get = mysqli_fetch_array($data);

    //Cek apakah file foto sebelumnya ada di folder images
    if (is_file("" . $get['poto_user'])) // Jika foto ada
    {
        unlink("" . $get['poto_user']); // Hapus file foto sebelumnya yang ada di folder images
    }

    
    /**. PROSES PENGAMBILA DATA FILE */
    //folder tujuan yang di buat
    $lokasi_folder = "foto/";

    //file akan dipindahkan dari lokasi sementara ke lokasi tujuan 
    $terupload = move_uploaded_file($namaSementara, $lokasi_folder . $namaFile);

    if ($terupload) {
        // echo "Upload berhasil!<br/>";
        $lokasi = $lokasi_folder . $namaFile;
        echo $lokasi; // foto/nama_file.jpg
    } else {
        echo "Upload Gagal!";
    }
    /**. PROSES PENGAMBILA DATA FILE */

    //query SQL untuk edit data
    $query = "UPDATE tbl_user set id_user='$idUser', nama_user='$vnama', password_user='$vpassword', email_user='$vemail', level_user='$vlevel',poto_user='$lokasi' WHERE id_user='$idUser' ";

    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        //Mengalihkan halaman
        header("location:../../dataUser.php");
    } else {
        die("Gagal menyimpan perubahan...");
    }
}
/*

*/
