 <!--Scrool top-->
 <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
   <i class="fas fa-chevron-up"></i>
 </a>
 <!--Footer-->
 <footer class="main-footer">
   <strong>Copyright &copy; 2021 <a href="#">Suratku</a>.</strong>
   All rights reserved.
   <div class="float-right d-none d-sm-inline-block">
     <b>Version</b> 1.0.0
   </div>
 </footer>
 <!--Footer-->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->


 <!-- jQuery -->
 <script src="Theme/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="Theme/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
   $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="Theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="Theme/plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="Theme/plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="Theme/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="Theme/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="Theme/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="Theme/plugins/moment/moment.min.js"></script>
 <script src="Theme/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="Theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="Theme/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="Theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="Theme/dist/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="Theme/dist/js/demo.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="Theme/dist/js/pages/dashboard.js"></script>


 <script src="Theme/plugins/sweetalert2/sweetalert2.min.js"></script>
 <!-- Toastr -->
 <script src="Theme/plugins/toastr/toastr.min.js"></script>

 <!--Sweety Alert -->
 <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <!-- DataTables  & Plugins -->
 <script src="Theme/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="Theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="Theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="Theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="Theme/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="Theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="Theme/plugins/jszip/jszip.min.js"></script>
 <script src="Theme/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="Theme/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="Theme//plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="Theme/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="Theme/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <script>
   $(function() {
     $('#example2').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
     });
   });
 </script>
 <!--/. DataTables  & Plugins -->

 <!-- bs-custom-file-input -->
 <script src="Theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
 <script>
   $(function() {
     bsCustomFileInput.init();
   });
 </script>

 <!--Modal bot4-->
 <script>
   $('#myModal').on('shown.bs.modal', function() {
     $('#myInput').trigger('focus')
   })
 </script>


 <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set di dalam session sukses -->
 <!--Jika login sebagai Admin-->
 <?php if (@$_SESSION['sukses']) { ?>
   <script>
     Swal.fire({
       position: 'top-end',
       icon: 'success',
       title: 'Kamu berhasil login sebagai <?php echo $_SESSION['sukses']; ?>',
       showConfirmButton: false,
       timer: 2000
     })
   </script>
   <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['sukses']);
  } ?>

 <!--Jika login sebagai User-->
 <?php if (@$_SESSION['cekUser']) { ?>
   <script>
     Swal.fire({
       position: 'top-end',
       icon: 'success',
       title: 'Kamu berhasil login sebagai <?php echo $_SESSION['cekUser']; ?> ',
       showConfirmButton: false,
       timer: 2000
     })
   </script>
   <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['cekUser']);
  } ?>

 <!--Jika Input user lewat admin berhasil-->
 <?php if (@$_SESSION['inputUserADM']) { ?>
   <script>
     Swal.fire(
       'Success!',
       'User berhasil ditambahkan!',
       'success'
     )
   </script>
   <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['inputUserADM']);
  } ?>

 <!--Jika Input user lewat signup berhasil-->
 <?php if (@$_SESSION['inputUser']) { ?>
   <script>
     Swal.fire(
       'Success!',
       'Berhasil membuat akun!',
       'success'
     )
   </script>
   <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['inputUser']);
  } ?>


 <!--Input surat undangan-->
 <?php if (@$_SESSION['inputUndangan']) { ?>
   <script>
     Swal.fire(
       'Success!',
       'Berhasil membuat <?php echo $_SESSION['inputUndangan']; ?>',
       'success'
     )
   </script>
   <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['inputUndangan']);
  } ?>

 <!--Input surat Peminjaman tempat-->
 <?php if (@$_SESSION['inputTempat']) { ?>
   <script>
     Swal.fire(
       'Success!',
       'Berhasil membuat <?php echo $_SESSION['inputTempat']; ?>',
       'success'
     )
   </script>
   <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['inputTempat']);
  } ?>

 <!--Input surat izin kegiatan-->
 <?php if (@$_SESSION['inputKegiatan']) { ?>
   <script>
     Swal.fire(
       'Success!',
       'Berhasil membuat <?php echo $_SESSION['inputKegiatan']; ?>',
       'success'
     )
   </script>
   <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['inputKegiatan']);
  } ?>

 <!--Input surat dana-->
 <?php if (@$_SESSION['inputDana']) { ?>
   <script>
     Swal.fire(
       'Success!',
       'Berhasil membuat <?php echo $_SESSION['inputDana']; ?>',
       'success'
     )
   </script>
   <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
 <?php unset($_SESSION['inputDana']);
  } ?>

 <script>
   function buatSurat() {
     Swal.fire(
       'Mulai buat surat!',
       'Cara menggunakan suratku pertama pilih jenis template surat yang tersedia, kedua isi form dengan lengkap, ketiga klik Buat Surat',
       'info'
     )
   }
 </script>

 <?php
  echo "</body>";
  echo "</html>";
  ?>