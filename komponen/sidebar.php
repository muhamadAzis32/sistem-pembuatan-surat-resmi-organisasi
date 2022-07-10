<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="asset/Logo/Suratku2.png" alt="logo-suratku brand-image" class="img-fluid" width="150px">
  </a>
  <!--/. Brand Logo -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <!--Dasboard-->
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <?php
        if ($_SESSION['level_user'] == "Admin"){ ?>
          <!--Data User-->
          <li class="nav-item">
            <a href="dataUser.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
        <?php
        }
        ?>

        <!--Data Surat-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Surat
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="dt_s_undangan.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Undangan acara resmi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="dt_s_izinTempat.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Peminjaman Tempat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="dt_s_izinKegiatan.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Izin kegiatan organisasi </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="dt_s_permohonanDana.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Permohonan Dana</p>
              </a>
            </li>
          </ul>
        </li>


        <!--FAQ-->
        <li class="nav-item">
          <a href="faq.php" class="nav-link">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>
              FAQ
            </p>
          </a>
        </li>
        <!--Logout-->
        <li class="nav-item">
          <a href="komponen/script/logout.php" class="nav-link" onclick="return confirm('Apakah anda yakin akan Logout?') ">
            <i class="nav-icon fas fa-reply-all" aria-hidden="true"></i>
            <p>
              Logout
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->

  </div>
  <!-- /.sidebar -->

</aside>