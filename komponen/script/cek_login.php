<?php
// membuka koneksi
include('../koneksi.php');
// mengaktifkan session pada php
session_start();

// menangkap data yang dikirim dari form login
$vEmail = $_POST['email_user'];
$vPassword = $_POST['password_user'];

// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($conn, "SELECT * FROM tbl_user where email_user='$vEmail' and password_user='$vPassword' ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if($cek > 0)
{
    $data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level_user']=="Admin"){
        $_SESSION['id_user'] = $data['id_user'];

        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['email_user'] = $data['email_user'];
		$_SESSION['password_user'] = $vPassword;
		$_SESSION['level_user'] = "Admin";
        $_SESSION['sukses'] = "Admin";
		// alihkan ke halaman dashboard admin
		header("location:../../index.php");
        
	}// cek jika user login sebagai user
    elseif($data['level_user']=="User"){
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['email_user'] = $data['email_user'];
		$_SESSION['password_user'] = $vPassword;
		$_SESSION['level_user'] = "User";
        $_SESSION['cekUser'] = "User";
		// alihkan ke halaman dashboard user
        header("location:../../index.php");
    }
    else{
        // alihkan ke halaman login kembali
        header("location:../../login.php?pesan=gagal");
    }

}
else{
    header("location:../../login.php?pesan=gagal");
}
