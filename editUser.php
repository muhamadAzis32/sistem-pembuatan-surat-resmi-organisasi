<?php
session_start();
include('komponen/koneksi.php');
if ($_SESSION['level_user'] == "") {
    header("location:login.php?pesan2=gagal2");
}

include('komponen/header.php');
include('komponen/sidebar.php');

if (isset($_GET['id'])) {
    $x = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM tbl_user where id_user='$x' ");
    $set = mysqli_fetch_array($data);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                <form action="komponen/script/edit_userAdm.php?id=<?php echo $set['id_user']; ?>" method="post" enctype="multipart/form-data">
                    <!--card Header-->
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <!--/.card Header-->
                    <!--Card body-->
                    <div class="card-body">
                        <!--Foto Profile-->
                        <div class="form-group">
                            <label for="">Foto Profile </label>
                            <div class="img-choose" style="margin:inherit;margin-bottom:10px">
                                <div class="img-choose-container">
                                    <?= "<img src='komponen/script/" . $set['poto_user'] . "'style='height:100px;'>" ?>
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
                            <input type="text" name="id_user" id="id_user" class="form-control" value="<?php echo $set['id_user']; ?>" readonly>
                        </div>
                        <!--Nama Lengkap-->
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap</label>
                            <input type="text" name="nama_user" id="inputName" class="form-control" value="<?php echo $set['nama_user']; ?>">
                        </div>
                        <!--Email-->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email_user" id="email" class="form-control" value="<?php echo $set['email_user']; ?>">
                        </div>
                        <!--Password-->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password_user" id="password" class="form-control" value="<?php echo $set['password_user']; ?>">
                        </div>
                        <!--Level user-->
                        <div class="form-group">
                            <label for="inputStatus">Level User</label>
                            <select id="inputStatus" name="level_user" class="form-control custom-select">
                                <?php
                                // proses menampilkan pilihan level user
                                // jika level user = user, maka pada option 'user' diberi label 'selected', demikian seterusnya
                                if ($set['level_user'] == "") {
                                    echo "<option selected disabled>Select one</option>";
                                }
                                if ($set['level_user'] == "Admin") {
                                    echo "<option value='Admin' selected>Admin</option>";
                                } else {
                                    echo "<option value='Admin'>Admin</option>";
                                }
                                if ($set['level_user'] == "User") {
                                    echo "<option value='User' selected>User</option>";
                                } else {
                                    echo "<option value='User'>User</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="dataUser.php" class="btn btn-secondary">Cancel</a>
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
                                <!--/. Modal -->

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