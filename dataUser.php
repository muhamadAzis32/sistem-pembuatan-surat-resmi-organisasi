<?php
session_start();
include('komponen/koneksi.php');
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level_user'] == "") {
    header("location:login.php?pesan2=gagal2");
}

include('komponen/header.php');
include('komponen/sidebar.php');

$tampil = 'SELECT * FROM tbl_user';
$query = mysqli_query($conn, $tampil);
if (!$query) {
    die('SQL Error: ' . mysqli_error($conn));
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title pr-4 pt-1">Data User</h3>
                            <a href="addUser.php" class="btn btn-primary btn-sm "><i class="fa fa-plus pr-1"></i> Tambah User</a>
                        </div>
                        <!-- /.card-header-->

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id User</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email </th>
                                        <th>Level User</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = mysqli_fetch_array($query)) : ?>
                                        <tr>
                                            <td> <?php echo $data['id_user']; ?> </td>
                                            <td> <?php echo $data['nama_user']; ?> </td>
                                            <td> <?php echo $data['email_user']; ?> </td>
                                            <td> <?php echo $data['level_user']; ?> </td>
                                            <td class="text-center"> <?= "<img src='komponen/script/" . $data['poto_user'] . "'style='height:100px;'>" ?> </td>
                                            <td class="project-actions " width="16%">
                                                <a class="btn btn-info btn-sm" href="editUser.php?id=<?php echo $data['id_user']; ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>

                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin delete user?')" href="komponen/script/delete_userAdm.php?id=<?php echo $data['id_user']; ?>">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>
                                    <?php endwhile ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id User</th>
                                        <th>Nama </th>
                                        <th>Email </th>
                                        <th>Level User</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
mysqli_free_result($query); // untuk keamanan
mysqli_close($conn); // untuk keamanan
include('komponen/footer.php');
?>