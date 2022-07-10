<?php
session_start();
include('komponen/koneksi.php');
if ($_SESSION['level_user'] == "") {
    header("location:login.php?pesan2=gagal2");
}

include('komponen/header.php');
include('komponen/sidebar.php');

//Mengambil data pada tabel pembuka
$data = mysqli_query($conn, "SELECT * FROM tbl_pembuka WHERE id_pembuka='IDP002'");
$pembuka = mysqli_fetch_array($data);
//Mengambil data pada tabel penutup
$data1 = mysqli_query($conn, "SELECT * FROM tbl_penutup WHERE id_penutup='INP002'");
$penutup = mysqli_fetch_array($data1);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Content Header  -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Surat Permohonan Izin Peminjaman Tempat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Surat Permohonan Izin Peminjaman Tempat</li>
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
            <form action="komponen/script/input_s_izinTempat.php" enctype="multipart/form-data" method="post">
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
                                    <input type="text" class="form-control" name="namaInstansi" id="nama_instansi" placeholder="Contoh : Politeknik Enjinering Indorama" required>
                                    <small class="form-text text-muted">Isikan dengan nama instansi/Lembaga yang menerbitkan surat.</small>
                                </div>

                                <!--Jenis Instansi-->
                                <div class="form-group">
                                    <label for="jenis_instansi">Jenis Instansi</label>
                                    <input type="text" class="form-control" name="jenisInstansi" id="jenis_instansi" placeholder="Contoh : Pemerintah Purwakarta ">
                                    <small class="form-text text-muted">Isikan nama jenis instansi.</small>
                                </div>

                                <!--Alamat-->
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control " rows="3" name="alamat" id="alamat" placeholder="Contoh : Kembangkuning, Kec. Jatiluhur, Kabupaten Purwakarta, Jawa Barat 41152"></textarea>
                                    <small class="form-text text-muted">Alamat Instansi.</small>
                                </div>
                            </div>
                            <!--/.Kiri-->

                            <!--kanan-->
                            <div class="col-md-6">
                                <!--Telp/hp-->
                                <div class="form-group">
                                    <label for="telp">Telp/Hp</label>
                                    <input type="text" class="form-control" name="telp" id="telp" placeholder="Contoh : 0822499623851">
                                    <small class="form-text text-muted">Kontak telp/hp instansi.</small>
                                </div>

                                <!--Website-->
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" name="website" id="website" placeholder="Contoh : https://pei.ac.id">
                                    <small class="form-text text-muted">Kosongkan jika tidak ada.</small>
                                </div>

                                <!-- Logo1 -->
                                <div class="form-group">
                                    <label for="">Logo </label>
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
                                    <input type="text" class="form-control" name="tempatTerbit" id="tempat_terbit" placeholder="Contoh : Purwakarta" required>
                                    <small class="form-text text-muted">Tempat diterbitkanya surat.</small>
                                </div>
                            </div>
                            <!--/.Kiri-->
                            <!--kanan-->
                            <div class="col-md-6">
                                <!--Tanggal Surat-->
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Surat</label>
                                    <input type="text" class="form-control" id="terbit-tanggal" name="tglTerbit" placeholder="4 Juni 2021" required>
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
                                    <input type="text" class="form-control" name="noSurat" id="nomor_surat" placeholder="Contoh : SU/02/PEI/III/2021">
                                    <small class="form-text text-muted">isi nomor surat </small>
                                </div>
                                <!--Perihal-->
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Contoh : Permohonan Izin Peminjaman Tempat " required>
                                    <small class="form-text text-muted">Pokok isi surat.</small>
                                </div>
                            </div>
                            <!--/.Kiri-->
                            <!--kanan-->
                            <div class="col-md-6">
                                <!--Lampiran-->
                                <div class="form-group">
                                    <label for="lampiran">Lampiran</label>
                                    <input type="text" class="form-control" name="lampiran" id="lampiran" placeholder="Contoh : 1 Lembar ">
                                    <small class="form-text text-muted">Tulis '-' jika tidak ada.</small>
                                </div>
                                <!--Tujuan-->
                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control" name="penerima" id="tujuan" placeholder="Contoh : Ka. Prodi Teknologi Rekayasa Perangkat Lunak PEI" required>
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
                            <textarea class="form-control " rows="2" name="isiSurat1" id="isi_surat">Dalam rangka (........) pada (....), maka kami selaku mahasiswa-mahasiswi yang tergabung kedalam (.......) Universitas (.....)  bermaksud menyelenggarakan (.......) dengan tema (“.......”) yang akan diselenggarakan pada :
                            </textarea>
                        </div>

                        <!--hari/tanggal-->
                        <div class="form-group row">
                            <label for="hari_tgl" class="col-sm-2">Hari/ Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hariTgl" id="hari_tgl" placeholder="Contoh : Jumat, 11 Juni 2021 " required>
                            </div>
                        </div>

                        <!--Waktu-->
                        <div class="form-group row">
                            <label for="waktu" class="col-sm-2">Waktu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="waktu" id="waktu" placeholder="Contoh : 10.00 - 13.00" required>
                            </div>
                        </div>

                        <!--Tempat-->
                        <div class="form-group row">
                            <label for="tempat_isi" class="col-sm-2">Tempat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat" id="tempat_isi" placeholder="Contoh : Gedung F " required>
                            </div>
                        </div>
                        <!--Isi Surat2-->
                        <div class="form-group">
                            <textarea class="form-control " rows="2" name="isiSurat2" id="isi_surat">Maka dari itu, kami bermaksud untuk meminjam tempat yakni Gedung (......) Memang pada waktu dan tanggal tersebut di atas guna kelancaran dan keberlangsungan kegiatan ini. Dalam surat ini, kami lampirkan pula sebuah proposal acara yang bisa disimak oleh Bapak/Ibu sekalian.
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
                                        <input type="text" class="form-control" name="ttdKetua" id="ketua_pelaksana" placeholder="Tulis nama ketua pelaksana di sini" required>
                                    </div>
                                </div>
                                <!-- Pengesahan Item -->
                                <div class="col-md-6 p-4">
                                    <label class="text-center w-100">TERTANDA : </label>
                                    <div class="form-group">
                                        <label for="sekretaris">Sekretaris </label>
                                        <input type="text" class="form-control" name="ttdSekretaris" id="sekretaris" placeholder="Tulis nama Sekretaris di sini" required>
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

                    <div class="card-body">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">Saya menyetujui semua persyaratan Suratku</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="index.php" class="btn btn-secondary ">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Buat Surat</button>
                    </div>
                    <!--/. card-body -->
                </div>
                <!-- /.Buat surat -->

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