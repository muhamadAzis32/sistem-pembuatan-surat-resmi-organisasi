<?php
//KONEKSI DATABASE
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Mysql 
$db_pass = ''; // Password Mysql 
$db_name = 'uas_web2'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    echo "Error: " . mysqli_connect_error() ."<br>";
exit();
}



/*
else{
    echo 'Koneksi berhasil' ."<br>"; 
}

// MENANGGIL DATA TBL_SURAT
//$tampil = 'SELECT * FROM tbl_surat';
$tampil =' SELECT tbl_pembuka.isi_pembuka, tbl_surat.perihal_surat, tbl_penutup.isi_penutup
    FROM tbl_pembuka 
	LEFT JOIN tbl_surat ON tbl_surat.id_pembuka = tbl_pembuka.id_pembuka 
	LEFT JOIN tbl_penutup ON tbl_surat.id_penutup = tbl_penutup.id_penutup';

$query = mysqli_query($conn, $tampil);

while ($data = mysqli_fetch_array($query) ) {
    echo $data['isi_pembuka'] ."<br>";
    echo $data['perihal_surat'] ."<br>";
    echo $data['isi_penutup'] ."<br>";
}
*/


?>





