<?php
session_start();
include('komponen/koneksi.php');
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level_user'] == "") {
  header("location:login.php?pesan2=gagal2");
}
include('komponen/header.php');
include('komponen/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="asset/Logo/logo-biru.png" alt="AdminLTELogo" height="60">
  </div>

  <!-- Content Header  -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <!--Jumbotron-->
    <div class="container-fluid">
      <div class="jumbotron bg-white">
        <img src="asset/Logo/logo-biru.png" alt="logo-suratku" class="img-fluid" width="210px">
        <h1 class="text-bold text-dark">Tempat Pembuat Surat</h1>
        <p>Menggunakan suratku akan memudahkan dalam membuat surat</p>
        <p><a class="btn bg-blue text-white btn-lg" onclick="buatSurat()" href="#suratku" role="button">Mulai buat surat</a></p>
      </div>
    </div>
    <!--/ Jumbotron-->

    <!-- Content Header  -->
    <div class="container-fluid " id="suratku">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Surat Organisasi</h3>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- /.content-header -->

    <!-- container-fluid surat -->
    <div class="container-fluid">
      <!--Row-->
      <div class="row">
        <!--Col-->
        <div class="col-lg-6">
          <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-blue"><i class="fa fa-user-plus"></i></span>
            <div class="info-box-content">
              <a href="s-undanganAcara.php" class="text-body">
                <h4 class="card-title w-100">Surat Undangan Acara Resmi</h4>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!--/. Col-->
        <!--Col-->
        <div class="col-lg-6">
          <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-blue"><i class="fa fa-home"></i></span>
            <div class="info-box-content">
              <a href="s-izinTempat.php" class="text-body">
                <h4 class="card-title w-100">Surat Permohonan Izin Peminjaman Tempat</h4>
              </a>
            </div>
            <!-- The progress section is optional -->

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!--/. Col-->
      </div>
      <!--/. Row-->

      <!--Row-->
      <div class="row">
        <!--Col-->
        <div class="col-lg-6">
          <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-blue"><i class="fa fa-calendar-alt"></i></span>
            <div class="info-box-content">
              <a href="s-izinKegiatan.php" class="text-body">
                <h4 class="card-title w-100">Surat Izin Kegiatan Organisasi</h4>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!--/. Col-->
        <!--Col-->
        <div class="col-lg-6">
          <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-blue"><i class="fa fa-handshake"></i></span>
            <div class="info-box-content">
              <a href="s-permohonanDana.php" class="text-body">
                <h4 class="card-title w-100">Surat Permohonan Dana Kegiatan</h4>
              </a>
            </div>
            <!-- The progress section is optional -->

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!--/. Col-->
      </div>
      <!--/. Row-->

    </div>
    <!--/. container-fluid surat -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('komponen/footer.php');
?>