<?php
include('../koneksi.php'); // membuka koneksi
session_start();
// mengambil data USER dengan ID paling besar
$query1 = mysqli_query($conn, "SELECT max(id_user) as idTerbesar FROM tbl_user");
$data = mysqli_fetch_array($query1);
$idUser = $data['idTerbesar'];
// mengambil angka dari ID USER terbesar, menggunakan fungsi substr
$urutan = (int) substr($idUser, 3, 3);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya IDU
$huruf = "IDU";
$idUser = $huruf . sprintf("%03s", $urutan);
/*.*/

/**PROSES PENGAMBILA DATA FILE */
// mengambil nama dari file yang di upload
$namaFile = $_FILES['foto']['name']; 
//mengambil lokasi sementara foto yang di upload
$namaSementara = $_FILES['foto']['tmp_name']; 
//folder tujuan yang di buat
$lokasi_folder = "foto/";

//file akan dipindahkan dari lokasi sementara ke lokasi tujuan 
$terupload = move_uploaded_file($namaSementara, $lokasi_folder .$namaFile);

if ($terupload) {
   // echo "Upload berhasil!<br/>";
    $lokasi = $lokasi_folder . $namaFile; 
    echo $lokasi; // foto/nama_file.jpg
} else {
    echo "Upload Gagal!";
}
/**. PROSES PENGAMBILA DATA FILE */

// menyimpan data kedalam variabel
$vnama = $_POST['nama_user'];
$vpassword = $_POST['password_user'];
$vemail = $_POST['email_user'];
$vlevel =  $_POST['level_user'];

// query SQL untuk insert data
$query = "INSERT INTO tbl_user(id_user, nama_user, password_user, email_user,level_user,poto_user) VALUES ('$idUser','$vnama','$vpassword','$vemail','$vlevel','$lokasi')"; 
 
$sql = mysqli_query($conn, $query);

$_SESSION['inputUserADM'] = "Input user berhasil";

if ($sql) {
   // mengalihkan ke halaman 
   header("location:../../dataUser.php");
  
} else {
    die("Gagal input data...");
}
