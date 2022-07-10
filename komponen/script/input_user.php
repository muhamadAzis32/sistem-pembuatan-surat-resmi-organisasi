<?php
session_start();
include('../koneksi.php'); // membuka koneksi

// mengambil data USER dengan ID paling besar
$query1 = mysqli_query($conn, "SELECT max(id_user) as idTerbesar FROM tbl_user");
$data = mysqli_fetch_array($query1);
$idUser = $data['idTerbesar'];

// mengambil angka dari ID USER terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($idUser, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya IDU
$huruf = "IDU";
$idUser = $huruf . sprintf("%03s", $urutan);

// menyimpan data kedalam variabel
$vnama = $_POST['nama_user'];
$vpassword = $_POST['password_user'];
$vemail = $_POST['email_user'];

// query SQL untuk insert data
$query = "INSERT INTO tbl_user(id_user, nama_user, password_user, email_user, level_user) VALUES ('$idUser','$vnama','$vpassword','$vemail','User')"; 

$sql = mysqli_query($conn, $query);

$_SESSION['inputUser'] = "Berhasil";

if ($sql) {
   // mengalihkan ke halaman 
 header("location:../../login.php");

} else {
    die("Gagal input data...");
}

?>