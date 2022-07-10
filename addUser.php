<?php
session_start();
include('komponen/koneksi.php');
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level_user']==""){
    header("location:login.php?pesan2=gagal2");
  }

include('komponen/header.php');
include('komponen/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tambah User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card ">
                <!--Form-->
                <form action="komponen/script/input_userAdm.php" method="post" enctype="multipart/form-data">
                    <!--card Header-->
                    <div class="card-header">
                        <h3 class="card-title">Tambah User</h3>
                    </div>
                    <!--/.card Header-->
                    <!--Card body-->
                    <div class="card-body">
                        <!--Foto Profile-->
                        <div class="form-group">
                            <label for="">Foto Profile </label>
                            <div class="img-choose" style="margin:inherit;margin-bottom:10px">
                                <div class="img-choose-container">
                                    <img src="https://jagowebdev.com/demo/admin-template/public/images/user/administrator.png?r=1622963246">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input form-control" id="exampleInputFile_1">
                                            <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Nama Lengkap-->
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap</label>
                            <input type="text" name="nama_user" id="inputName" class="form-control" required>
                        </div>
                        <!--Email-->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email_user" id="email" class="form-control" required>
                        </div>
                        <!--Password-->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password_user" id="password" class="form-control" required>
                        </div>
                        <!--Level user-->
                        <div class="form-group">
                            <label for="inputStatus">Level User</label>
                            <select id="inputStatus" name="level_user" class="form-control custom-select" required>
                                <option selected disabled>Select one</option>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="dataUser.php" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Tambah User" class="btn btn-primary float-right">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
                <!--/. Form-->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
    
</div>
<!-- /.content-wrapper -->


<?php
include('komponen/footer.php');
?>