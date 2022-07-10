<?php
include('komponen/koneksi.php');
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="asset/Logo/icon.png" type="image/icon type">
    <title>Suratku | Surat Izin Kegiatan Organisasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Theme/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Theme/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="Theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="Theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!--Style-->
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            margin: 4%;
        }

        .kop {
            line-height: 0.8;
        }

        .tmpTerbit {
            line-height: 0.4;
        }

        hr.hr1 {
            border-top: 5px solid black;
        }

        hr.hr2 {
            margin-top: -14px;
            border-top: 2px solid black;
        }

        .inden {
            text-indent: 2em;
        }

        .pengesahan {
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">

            <!--Kop surat-->
            <div class="row">
                <!--Logo kop Kiri-->
                <div class="col-2">
                    <?= "<img src='komponen/script/" . $set['logoKop1'] . "'style='height:135px;'>" ?>

                </div>
                <!--kop tengah-->
                <div class="col-8 text-center">
                    <b><?php echo $set['namaInstansi']; ?></b>
                    <div class="pt-2 kop">
                        <p><?php echo $set['jenisInstansi']; ?></p>
                        <p><?php echo $set['alamat']; ?></p>
                        <p>Telp/Hp : <?php echo $set['telp']; ?> Website : <?php echo $set['website']; ?></p>
                    </div>
                </div>
                <!--logo kop kanan-->
                <div class="col-2"></div>
            </div>
            <hr class="hr1">
            <hr class="hr2">

            <!--Keterangan surat-->
            <div class="row pl-5 pr-5 pt-3">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table  table-borderless tmpTerbit">
                            <tr>
                                <td style="width:10%">Nomor</td>
                                <td>: <?php echo $set['noSurat']; ?></td>
                                <td class="float-right"><?php echo $set['tempatTerbit']; ?>, <?php echo $set['tglTerbit']; ?> </td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                <td>: <?php echo $set['lampiran']; ?></td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>: <?php echo $set['perihal']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless tmpTerbit">
                            <tr>
                                <td>Kepada Yth,</td>
                            </tr>
                            <tr>
                                <td><?php echo $set['penerima']; ?></td>
                            </tr>
                            <tr>
                                <td>Di Tempat</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!--Pembukaan & isi & penutup-->
            <div class="row pl-5 pr-5">
                <div class="col-12">

                    <div class="table-responsive">
                        <table class="table table-borderless" style="margin-top: -10px;">
                            <tr>
                                <td>
                                    <?php echo $pembuka['isi_pembuka']; ?><br>
                                    <p class="inden text-justify"><?php echo $set['isiSurat1']; ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-responsive container" style="margin-top: -20px; margin-left: 10%;">
                        <table class="table  table-borderless tmpTerbit">
                            <tr>
                                <td style="width:20%">Hari/Tanggal</td>
                                <td>: <?php echo $set['hariTgl']; ?></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>: <?php echo $set['waktu']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat </td>
                                <td>: <?php echo $set['tempat']; ?></td>
                            </tr>
                        </table>
                    </div>

                    <!--Penutup-->
                    <div class="table-responsive">
                        <table class="table table-borderless" style="margin-top: -10px;">
                            <tr>
                                <td>
                                    <p class="inden text-justify"><?php echo $set['isiSurat2']; ?></p>
                                    <p class="inden text-justify" style="margin-top: -10px;"><?php echo $penutup['isi_penutup']; ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>

            <!--Pengesahan-->
            <div class="row">
                <div class="col-6 text-center">
                    <p class="pb-5">Ketua Panitia</p>
                    <b class="pengesahan">(<?php echo $set['ttdKetua']; ?>)</b>
                </div>
                <div class="col-6 text-center">
                    <p class="pb-5">Sekretaris</p>
                    <b class="pengesahan">(<?php echo $set['ttdSekretaris']; ?>)</b>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <!-- Page specific script-->
    <script>
        window.addEventListener("load", window.print());
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
</body>

</html>