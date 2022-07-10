<?php
session_start();
include('komponen/koneksi.php');
if ($_SESSION['level_user'] == "") {
    header("location:login.php?pesan2=gagal2");
}

include('komponen/header.php');
include('komponen/sidebar.php');
$login = mysqli_query($conn, "SELECT * FROM tbl_user where id_user ='" . $_SESSION['id_user'] . "' ");
$data = mysqli_fetch_assoc($login);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- card -->
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <!--User Profile-->
                        <div class="active tab-pane" id="profile">
                            <!-- /.card-body -->
                            <div class="card-body box-profile ">
                                <div class="text-center">
                                    <?= "<img src='komponen/script/" . $data['poto_user'] . "'style='' class='profile-user-img  img-circle'>" ?>
                                </div>
                                <h3 class="profile-username text-center mb-4"><?php echo $data['nama_user']; ?></h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nama Lengkap </b> <a class="float-right"><?php echo $data['nama_user']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right"><?php echo $data['email_user']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Level User</b> <a class="float-right"><?php echo $data['level_user']; ?></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!--/.User Profile-->
                        <!--setting -->
                        <div class="tab-pane" id="settings">

                <!--Form-->
                <form action="komponen/script/edit_user.php?id=<?php echo $data['id_user']; ?>" method="post" enctype="multipart/form-data">

                    <!--Card body-->
                    <div class="card-body">
                        <!--Foto Profile-->
                        <div class="form-group">
                            <label for="">Foto Profile </label>
                            <div class="img-choose" style="margin:inherit;margin-bottom:10px">
                                <div class="img-choose-container">
                                    <?= "<img src='komponen/script/" . $data['poto_user'] . "'style='height:100px;'>" ?>
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
                        <!--Id User-->
                        <div class="form-group">
                            <label for="idUser">Id User</label>
                            <input type="text" name="id_user" id="id_user" class="form-control" value="<?php echo $data['id_user']; ?>" readonly>
                        </div>
                        <!--Nama Lengkap-->
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap</label>
                            <input type="text" name="nama_user" id="inputName" class="form-control" value="<?php echo $data['nama_user']; ?>">
                        </div>
                        <!--Email-->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email_user" id="email" class="form-control" value="<?php echo $data['email_user']; ?>">
                        </div>
                        <!--Password-->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password_user" id="password" class="form-control" value="<?php echo $data['password_user']; ?>">
                        </div>
   
                        <div class="row">
                            <div class="col-12">
                                <a href="profile.php" class="btn btn-secondary">Cancel</a>
                                <!--
                                <input type="submit" value="Simpan" class="btn btn-success float-right"> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                    Simpan
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            Apakah Anda yakin melakukan perubahan?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" value="Simpan Perubahan" class="btn btn-success ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
                <!--/. Form-->

                        </div>
                        <!-- /.setting -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>
<!--/. Content Wrapper. Contains page content -->
<?php
include('komponen/footer.php');
?>