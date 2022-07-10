<?php
session_start();
include('komponen/koneksi.php');
if ($_SESSION['level_user'] == "") {
    header("location:login.php?pesan2=gagal2");
}

include('komponen/header.php');
include('komponen/sidebar.php');


//Mengambil data pada tabel pembuka
$data = mysqli_query($conn, "SELECT * FROM tbl_pembuka WHERE id_pembuka='IDP003'");
$pembuka = mysqli_fetch_array($data);
//Mengambil data pada tabel penutup
$data1 = mysqli_query($conn, "SELECT * FROM tbl_penutup WHERE id_penutup='INP003'");
$penutup = mysqli_fetch_array($data1);

//data surat
if (isset($_GET['id'])) {
    $x = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM tbl_surat where id_surat='$x' ");
    $set = mysqli_fetch_array($data);
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Content Header  -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Surat Izin Kegiatan Organisasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Surat Izin Kegiatan Organisasi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- form start -->
            <form action="komponen/script/edit_s_izinKegiatan.php?id=<?php echo $set['id_surat']; ?>" enctype="multipart/form-data" method="post">

                <!-- Kop Surat-->
                <div class="card card-primary card-outline">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Kop Surat</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <!--Kiri-->
                            <div class="col-md-6">
                                <!--Nama instansi-->
                                <div class="form-group">
                                    <label for="nama_instansi">Nama Instansi</label>
                                    <input type="text" class="form-control" name="namaInstansi" id="nama_instansi" value="<?php echo $set['namaInstansi']; ?>" placeholder="Contoh : Politeknik Enjinering Indorama" required>
                                    <small class="form-text text-muted">Isikan dengan nama instansi/Lembaga yang menerbitkan surat.</small>
                                </div>

                                <!--Jenis Instansi-->
                                <div class="form-group">
                                    <label for="jenis_instansi">Jenis Instansi</label>
                                    <input type="text" class="form-control" name="jenisInstansi" id="jenis_instansi" value="<?php echo $set['jenisInstansi']; ?>" placeholder="Contoh : Pemerintah Purwakarta ">
                                    <small class="form-text text-muted">Isikan nama jenis instansi.</small>
                                </div>

                                <!--Alamat-->
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control " rows="3" name="alamat" id="alamat" placeholder="Contoh : Kembangkuning, Kec. Jatiluhur, Kabupaten Purwakarta, Jawa Barat 41152"> <?php echo $set['alamat'] ?> </textarea>
                                    <small class="form-text text-muted">Alamat Instansi.</small>
                                </div>
                            </div>
                            <!--/.Kiri-->

                            <!--kanan-->
                            <div class="col-md-6">
                                <!--Telp/hp-->
                                <div class="form-group">
                                    <label for="telp">Telp/Hp</label>
                                    <input type="text" class="form-control" name="telp" id="telp" value="<?php echo $set['telp']; ?>" placeholder="Contoh : 0822499623851">
                                    <small class="form-text text-muted">Kontak telp/hp instansi.</small>
                                </div>

                                <!--Website-->
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" name="website" id="website" value="<?php echo $set['website']; ?>" placeholder="Contoh : https://pei.ac.id">
                                    <small class="form-text text-muted">Kosongkan jika tidak ada.</small>
                                </div>

                                <!-- Logo1 -->
                                <div class="form-group">
                                    <label for="">Logo </label>
                                    <div class="img-choose" style="margin:inherit;margin-bottom:10px">
                                        <div class="img-choose-container">
                                            <?= "<img src='komponen/script/" . $set['logoKop1'] . "'style='height:70px;'>" ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="foto" class="custom-file-input form-control" id="exampleInputFile_1">
                                                    <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Masukan logo jika ada.</small>
                                </div>

                            </div>
                            <!--/.Kanan-->
                        </div>
                    </div>
                    <!--/. card-body -->
                </div>
                <!-- /.Kop Surat -->

                <!-- Tempat & Tanggal diterbitkanya surat -->
                <div class="card card-primary card-outline">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Tempat & Tanggal Diterbitkannya Surat</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <!--Kiri-->
                            <div class="col-md-6">
                                <!--Tempat Surat-->
                                <div class="form-group">
                                    <label for="tempat_terbit">Tempat Surat</label>
                                    <input type="text" class="form-control" name="tempatTerbit" id="tempat_terbit" value="<?php echo $set['tempatTerbit']; ?>" placeholder="Contoh : Purwakarta" required>
                                    <small class="form-text text-muted">Tempat diterbitkanya surat.</small>
                                </div>
                            </div>
                            <!--/.Kiri-->
                            <!--kanan-->
                            <div class="col-md-6">
                                <!--Tanggal Surat-->
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Surat</label>
                                    <input type="text" class="form-control" id="terbit-tanggal" name="tglTerbit" value="<?php echo $set['tglTerbit']; ?>" placeholder="Contoh : 4 Juli 2021" required>
                                    <small class="form-text text-muted">Waktu diterbitkannya surat(Tanggal/Bulan/Tahun).</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. card-body -->
                </div>
                <!-- /.Tempat & Tanggal diterbitkanya surat -->

                <!-- nomor,perihal,lampiran & tujuan-->
                <div class="card card-primary card-outline">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Nomor, Perihal, Lampiran, & Tujuan Surat</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <!--Kiri-->
                            <div class="col-md-6">
                                <!--Nomor surat-->
                                <div class="form-group">
                                    <label for="nomor_surat">Nomor Surat</label>
                                    <input type="text" class="form-control" name="noSurat" id="nomor_surat" value="<?php echo $set['noSurat']; ?>" placeholder="Contoh : SU/02/PEI/III/2021">
                                    <small class="form-text text-muted">isi nomor surat </small>
                                </div>
                                <!--Perihal-->
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" class="form-control" name="perihal" id="perihal" value="<?php echo $set['perihal']; ?>" placeholder="Contoh : Undangan Webinar " required>
                                    <small class="form-text text-muted">Pokok isi surat.</small>
                                </div>
                            </div>
                            <!--/.Kiri-->
                            <!--kanan-->
                            <div class="col-md-6">
                                <!--Lampiran-->
                                <div class="form-group">
                                    <label for="lampiran">Lampiran</label>
                                    <input type="text" class="form-control" name="lampiran" id="lampiran" value="<?php echo $set['lampiran']; ?>" placeholder="Contoh : 1 Lembar ">
                                    <small class="form-text text-muted">Tulis '-' jika tidak ada.</small>
                                </div>
                                <!--Tujuan-->
                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control" name="penerima" id="tujuan" value="<?php echo $set['penerima']; ?>" placeholder="Contoh : Ka. Prodi Teknologi Rekayasa Perangkat Lunak PEI" required>
                                    <small class="form-text text-muted">Jabatan penerima surat.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. card-body -->
                </div>
                <!-- /.nomor,perihal,lampiran & tujuan -->

                <!-- Salam Pembuka-->
                <div class="card card-primary card-outline">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Salam Pembuka</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <!--Salam Pembuka-->
                        <div class="form-group">
                            <label for="salam_pembuka">Salam Pembuka</label>
                            <textarea class="form-control " rows="2" name="isi_pembuka" id="salam_pembuka" splaceholder="Contoh : Dengan hormat," required><?php echo $pembuka['isi_pembuka']; ?></textarea>
                        </div>
                    </div>
                    <!--/. card-body -->
                </div>
                <!-- /.Salam Pembuka -->

                <!-- Isi Surat-->
                <div class="card card-primary card-outline">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Isi Surat</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <!--Isi Surat-->
                        <div class="form-group">
                            <label for="isi_surat">Isi Surat</label>
                            <textarea class="form-control " rows="2" name="isiSurat1" id="isi_surat"><?php echo $set['isiSurat1']; ?>
                            </textarea>
                        </div>

                        <!--hari/tanggal-->
                        <div class="form-group row">
                            <label for="hari_tgl" class="col-sm-2">Hari/ Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hariTgl" id="hari_tgl" value="<?php echo $set['hariTgl']; ?>" placeholder="Contoh : Jumat, 11 Juni 2021 " required>
                            </div>
                        </div>

                        <!--Waktu-->
                        <div class="form-group row">
                            <label for="waktu" class="col-sm-2">Waktu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="waktu" id="waktu" value="<?php echo $set['waktu']; ?>" placeholder="Contoh : 10.00 - 13.00" required>
                            </div>
                        </div>

                        <!--Tempat-->
                        <div class="form-group row">
                            <label for="tempat_isi" class="col-sm-2">Tempat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat" id="tempat_isi" value="<?php echo $set['tempat']; ?>" placeholder="Contoh : Gedung F " required>
                            </div>
                        </div>
                        <!--Isi Surat2-->
                        <div class="form-group">
                            <textarea class="form-control " rows="2" name="isiSurat2" id="isi_surat"><?php echo $set['isiSurat2']; ?>
                            </textarea>
                        </div>
                    </div>
                    <!--/. card-body -->
                </div>
                <!-- /.Isi Surat -->

                <!-- Salam Penutup-->
                <div class="card card-primary card-outline">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Salam Penutup</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <!--Salam Penutup-->
                        <div class="form-group">
                            <label for="salam_penutup">Salam Penutup</label>
                            <textarea class="form-control" rows="3" name="isi_penutup" id="salam_penutup" required><?php echo $penutup['isi_penutup']; ?>
                            </textarea>
                        </div>
                    </div>
                    <!--/. card-body -->
                </div>
                <!-- /.Salam Penutup -->

                <!-- Pengesahan-->
                <div class="card card-primary card-outline">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Pengesahan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- Pengesahan Item -->
                                <div class="col-md-6  p-4">
                                    <label class="text-center w-100">TERTANDA : </label>
                                    <div class="form-group">
                                        <label for="ketua_pelaksana">Ketua Pelaksana </label>
                                        <input type="text" class="form-control" name="ttdKetua" id="ketua_pelaksana" value="<?php echo $set['ttdKetua']; ?>" placeholder="Tulis nama ketua pelaksana di sini" required>
                                    </div>
                                </div>
                                <!-- Pengesahan Item -->
                                <div class="col-md-6 p-4">
                                    <label class="text-center w-100">TERTANDA : </label>
                                    <div class="form-group">
                                        <label for="sekretaris">Sekretaris </label>
                                        <input type="text" class="form-control" name="ttdSekretaris" id="sekretaris" value="<?php echo $set['ttdSekretaris']; ?>" placeholder="Tulis nama Sekretaris di sini" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Input Type text-->

                    </div>
                    <!--/. card-body -->
                </div>
                <!-- /.Pengesahan -->

                <!-- buat surat-->
                <div class="card card-primary card-outline">
                    <!-- card-body -->
                    <div class="card-footer">
                        <a href="dt_s_izinKegiatan.php" class="btn btn-secondary mr-3">Cancel</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            Simpan
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
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
                    <!--/. card-body -->
                </div>
                <!-- /.Buat surat -->
                <input type="hidden" name="id_surat" id="" value="<?php echo $set['id_surat']; ?>" class="form-control">


            </form>
            <!--/. form end-->

        </div>
    </section>
    <!--/. Main content -->


</div>
<!-- Content Wrapper. Contains page content -->


<?php
include('komponen/footer.php');
?>