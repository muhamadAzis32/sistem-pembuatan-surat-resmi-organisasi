<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suratku | Sign Up</title>
    <link rel="icon" href="asset/Logo/icon.png" type="image/icon type">

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
    <!--register-box-->
    <div class="register-box">
        <!-- card-->
        <div class="card roundedCard p-2">
            <div class="card-body">
                <div class="mb-4">
                    <img src="asset/Logo/logo-biru.png" alt="logo-suratku" class="img-fluid" width="120px">
                    <p class="h2 text-blue"><b>Sign Up</b> Suratku</p>
                </div>
                <form action="komponen/script/input_user.php" method="post">
                    <div class="input-group mb-3">
                        <label for="nama" class="input-group">Nama Lengkap</label>
                        <input type="text" name="nama_user" class="form-control rounded-left" placeholder="Nama Lengkap" id="nama" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
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
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <p class="mb-1">
                        <a href="login.php" class="text-muted">Sudah punya akun?</a>
                    </p>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="Theme/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="Theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="Theme/dist/js/adminlte.min.js"></script>

</body>


</html>