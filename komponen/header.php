<?php
include('koneksi.php');
$login = mysqli_query($conn, "SELECT * FROM tbl_user where id_user ='" . $_SESSION['id_user'] . "' ");
$data = mysqli_fetch_assoc($login);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suratku | Pembuat Surat Otomatis</title>
  <link rel="icon" href="asset/Logo/icon.png" type="image/icon type">

  <!-- import bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
  </link>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="Theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="Theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="Theme/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Theme/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="Theme/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="Theme/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="Theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="Theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="Theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Nav -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!--/ Left navbar links -->


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- User Account Menu -->
        <li class="nav-item dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <?= "<img src='komponen/script/" . $data['poto_user'] . "'style='' class='user-image'>" ?>

            <!-- hidden-xs hides the username on small devices so onlythe image appears. -->
            <span class="hidden-xs"> <?php echo $data['nama_user']; ?> </span>
          </a>

          <!--Profile user dropdown-->
          <ul class="dropdown-menu">
            <!-- menu body -->
            <li class="user-header">
              <?= "<img src='komponen/script/" . $data['poto_user'] . "'style='' class='img-circle'>" ?>
              <p>
                <?php echo $data['nama_user']; ?>
                <small> <?php echo $data['email_user']; ?></small>
              </p>
            </li>
            <!-- / Menu Body -->
            <!-- Menu Footer-->
            <li>
            <li class="user-footer">
              <div class="pull-left m-2">
                <a href="profile.php" class="btn btn-default btn-block btn-flat hover rounded">Profile</a>
              </div>
              <div class="pull-right m-2">
                <a href="komponen/script/logout.php" class="btn btn-default btn-block btn-flat hover rounded">Logout</a>
              </div>
            </li>
            <!-- /Menu Footer-->
          </ul>
          <!--/ Profile user dropdown-->
        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
      <!--/ Right navbar links -->




    </nav>