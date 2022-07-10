<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suratku | Log in </title>
    <link rel="icon" href="asset/Logo/icon.png" type="image/icon type">

    <!-- import bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Theme/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="Theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Theme/dist/css/adminlte.min.css">
    <!--Style tambahan -->
    <link rel="stylesheet" href="asset/style/style.css">

</head>

<body class="hold-transition login-page">
    <!--login-box -->
    <div class="login-box">
        <!-- card-->
        <div class="card roundedCard p-2">
            <div class="card-body">
                <div class="mb-4">
                    <img src="asset/Logo/logo-biru.png" alt="logo-suratku" class="img-fluid" width="120px">
                    <p class="h2 text-blue"><b>Log In</b> to Suratku</p>
                </div>
                <form action="komponen/script/cek_login.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <label for="email" class="input-group">E-mail</label>
                        <input type="email" name="email_user" class="form-control rounded-left" placeholder="Email" id="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="password" class="input-group">Password</label>
                        <input type="password" name="password_user" class="form-control rounded-left" placeholder="Password" id="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text border">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <p class="mb-1">
                        <a href="#" class="text-muted">Lupa password?</a>
                    </p>
                    <p class="mb-0">
                        <a href="signup.php" class="text-muted">Belum punya akun</a>
                    </p>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="Theme/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="Theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="Theme/dist/js/adminlte.min.js"></script>

    <!--Sweety Alert -->
    <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Jika Input user berhasil-->
    <?php if (@$_SESSION['inputUser']) { ?>
        <script>
            Swal.fire(
                'Success!',
                'Berhasil membuat user!',
                'success'
            )
        </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['inputUser']);
    } ?>

    <!--Jika user salah input data login-->
    <?php if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") { ?>
            <script>
                Swal.fire(
                    'Gagal login!',
                    'Data yang anda masukan tidak cocok!',
                    'error'
                )
            </script>
    <?php unset($_GET['pesan']);
        }
    }
    ?>

    <!--Jika user tidak login-->
    <?php if (isset($_GET['pesan2'])) {
        if ($_GET['pesan2'] == "gagal2") { ?>
            <script>
                Swal.fire(
                    'Gagal masuk!',
                    'Anda harus login terlebih dahulu!',
                    'warning'
                )
            </script>
    <?php unset($_GET['pesan2']);
        }
    }
    ?>

</body>

</html>