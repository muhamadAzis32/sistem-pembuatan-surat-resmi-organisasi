<?php
session_start();
$_SESSION['inputUndangan'] = "Surat undangan acara resmi";

include('../koneksi.php'); // membuka koneksi

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level_user'] == "") {
    header("location:login.php?pesan=gagal");
}


// Membuat id user
$query1 = mysqli_query($conn, "SELECT max(id_surat) as idMax FROM tbl_surat");
$data = mysqli_fetch_array($query1);
$idUser = $data['idMax'];
$urutan = (int) substr($idUser, 3, 3);
$urutan++;
$huruf = "IDS";
//Disimpan di variabel
$vidSurat = $huruf . sprintf("%03s", $urutan);

/**FOTO 1 */
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
/**. FOTO1 */

// menyimpan data kedalam variabel
$vjeniSurat ="1"; //Kode surat undangan
$vnamaInstansi = $_POST['namaInstansi'];
$vjeniInstansi = $_POST['jenisInstansi'];
$valamat = $_POST['alamat'];
$vtelp = $_POST['telp'];
$vwebsite = $_POST['website'];
$vtmpTerbit = $_POST['tempatTerbit'];
$vtglTerbit = $_POST['tglTerbit'];
$vnoSurat = $_POST['noSurat'];
$vperihal = $_POST['perihal'];
$vlampiran = $_POST['lampiran'];
$vpenerima = $_POST['penerima'];
$visiSurat1 = $_POST['isiSurat1'];
//$visiSurat2 = $_POST['isiSurat2'];
$vhariTgl = $_POST['hariTgl'];
$vwaktu = $_POST['waktu'];
$vtempat = $_POST['tempat'];
$vttdKetua = $_POST['ttdKetua'];
$vttdSekretaris = $_POST['ttdSekretaris'];

//id
$vidUser = $_SESSION['id_user'];
$vidPembuka ="IDP001";
$vidPenutup ="INP001";

// query SQL untuk insert data
$sql = "INSERT INTO tbl_surat (id_surat,jenisSurat,namaInstansi,jenisInstansi,alamat,telp,website,logoKop1,tempatTerbit,tglTerbit,noSurat,perihal,lampiran,penerima, isiSurat1, hariTgl,waktu,tempat,ttdKetua,ttdSekretaris, id_user,id_pembuka,id_penutup) VALUES ('$vidSurat','$vjeniSurat','$vnamaInstansi','$vjeniInstansi','$valamat','$vtelp','$vwebsite','$lokasi','$vtmpTerbit','$vtglTerbit','$vnoSurat','$vperihal','$vlampiran','$vpenerima','$visiSurat1','$vhariTgl','$vwaktu','$vtempat','$vttdKetua','$vttdSekretaris', '$vidUser','$vidPembuka','$vidPenutup') ";

$query = mysqli_query($conn, $sql);

if ($query) {
    // mengalihkan ke halaman 
    header("location:../../dt_s_undangan.php");
} else {
    die("Gagal input data...");
}

?>