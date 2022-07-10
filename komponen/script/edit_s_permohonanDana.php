<?php
include('../koneksi.php'); // membuka koneksi

// menyimpan data kedalam variabel
$vidSurat = $_POST['id_surat']; //wajib
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
$visiSurat2 = $_POST['isiSurat2'];
//$vhariTgl = $_POST['hariTgl'];
//$vwaktu = $_POST['waktu'];
//$vtempat = $_POST['tempat'];
$vttdKetua = $_POST['ttdKetua'];
$vttdSekretaris = $_POST['ttdSekretaris'];

// mengambil nama dari file yang di upload
$namaFile = $_FILES['foto']['name'];
//mengambil lokasi sementara foto yang di upload
$namaSementara = $_FILES['foto']['tmp_name'];

if (empty($namaFile)) { //Jika tidak upload  gambar
    
    //query SQL untuk edit data
    $sql = "UPDATE tbl_surat SET namaInstansi='$vnamaInstansi',jenisInstansi='$vjeniInstansi',alamat='$valamat',telp='$vtelp',website='$vwebsite',tempatTerbit='$vtmpTerbit',tglTerbit='$vtglTerbit',noSurat='$vnoSurat',perihal='$vperihal',lampiran='$vlampiran',penerima='$vpenerima', isiSurat1='$visiSurat1',isiSurat2='$visiSurat2',ttdKetua='$vttdKetua',ttdSekretaris='$vttdSekretaris' WHERE id_surat='$vidSurat' ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // mengalihkan ke halaman 
        header("location:../../dt_s_permohonanDana.php");
    } else {
        die("Gagal edit data...");
    }

} 

else { //jika user upload  gambar

    /**FOTO 1 */
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
    /**. FOTO1 */

    //Mengambil id
    $x = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM tbl_surat where id_surat='$x' ");
    $get = mysqli_fetch_array($data);

    //Cek apakah file foto sebelumnya ada di folder foto
    if (is_file("" . $get['logoKop1'])) // Jika foto 1 ada
    {
        unlink("" . $get['logoKop1']); // Hapus file foto 1 sebelumnya yang ada di folder foto
    }
    //query SQL untuk edit data
    $sql = "UPDATE tbl_surat SET namaInstansi='$vnamaInstansi',jenisInstansi='$vjeniInstansi',alamat='$valamat',telp='$vtelp',website='$vwebsite',logoKop1='$lokasi',tempatTerbit='$vtmpTerbit',tglTerbit='$vtglTerbit',noSurat='$vnoSurat',perihal='$vperihal',lampiran='$vlampiran',penerima='$vpenerima', isiSurat1='$visiSurat1',isiSurat2='$visiSurat2',ttdKetua='$vttdKetua',ttdSekretaris='$vttdSekretaris' WHERE id_surat='$vidSurat' ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // mengalihkan ke halaman 
        header("location:../../dt_s_permohonanDana.php");
    } else {
        die("Gagal edit data...");
    }
}


?>