<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin">
            <div class="card-body">
                <h5 class="card-title text-center"><b>LOGIN SIM-BK</b></h5>
                <!-- Pesan -->
                <?php Flasher::flashMessage(); ?>
                <!-- End Pesan -->
                <p style="font-size:11pt; margin-bottom:25px;">Silakan masukkan username dan password Anda untuk masuk ke dalam sistem ! </p>
                <form class="form-signin" action="<?= SITE_URL; ?>/auth/login" method="POST">
                <div class="form-label-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                    <label for="username">Username</label>
                </div>
                <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Lihat password</label>
                </div>
                <div style="margin-top:30px;">
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                </div>
                </form>
            </div>
            </div>
            <div style="text-align:center; margin-bottom:10px;">
                <span style="color:white; font-size:10pt;">Copyright © 2021 SI Bimbingan Konseling</span>
            </div>
        </div>
        </div>
    </div>
    <script src="<?= BASE_URL; ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/popper.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/bootstrap.min.js"></script>
</body>
</html>