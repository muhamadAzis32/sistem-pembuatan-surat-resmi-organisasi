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

// cek apakah yang mengakses halaman ini sudah login
if ($data['level_user'] == "Admin") {
    // MENANGGIL DATA TBL_SURAT
    $sql = "SELECT * FROM tbl_surat WHERE jenisSurat='1'";
    $query = mysqli_query($conn, $sql);
} elseif ($data['level_user'] == "User") {
    // MENANGGIL DATA TBL_SURAT
    $sql = "SELECT * FROM tbl_surat WHERE jenisSurat='1' and id_user = '" . $_SESSION['id_user'] . "' ";
    $query = mysqli_query($conn, $sql);
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Surat undangan Acara Resmi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Surat undangan Acara Resmi</li>
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
                            <h3 class="card-title">Data Surat undangan Acara Resmi</h3>
                        </div>
                        <!-- /.card-header-->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Perihal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = mysqli_fetch_array($query)) : ?>
                                        <tr>
                                            <td> <?php echo $data['id_surat']; ?> </td>
                                            <td> <?php echo $data['noSurat']; ?> </td>
                                            <td> <?php echo $data['tglTerbit']; ?> </td>
                                            <td> <?php echo $data['perihal']; ?> </td>
                                            <td class="project-actions" width="22%">
                                                <!--
                                                <a class="btn btn-primary btn-sm" href="#">
                                                    <i class="fas fa-file-pdf">
                                                    </i>
                                                    Pdf
                                                </a> -->
                                                <a class="btn btn-info btn-sm" href="edit_s_undanganAcara.php?id=<?php echo $data['id_surat']; ?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>

                                                <a class="btn btn-primary btn-sm" target="_blank" href="prin-suratUndangan.php?id=<?php echo $data['id_surat']; ?>">
                                                    <i class="fas fa-print">
                                                    </i>
                                                    Print
                                                </a>

                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin akan delete?')" href="komponen/script/delete_s_undangan.php?id=<?php echo $data['id_surat']; ?>">
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
                                        <th>Id Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Perihal</th>
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
include('komponen/footer.php');
?>