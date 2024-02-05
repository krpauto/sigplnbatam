
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url() ?>/assets/logo/location_black_bg.jpg" rel="icon">
  <title>GIS PLN BATAM- Login</title>
  <link href="<?= base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
              <?php $this->load->view('layout/alert') ?>
                <div class="login-form">
                  <div class="text-center">
                    <img src="https://www.plnbatam.com/wp-content/themes/brightpln/img/main_logo.jpg" alt="logo1" width="200px" class="mt-1 mb-2">
                    <h1 class="h4 text-gray-900 mb-4">Login GIS</h1>
                  </div>
                  <form class="user" action="<?= site_url("auth/process") ?>" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control" id="username" name="username"
                        placeholder="Masukkan Username Anda" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda" required>
                    </div>
                    <div class="form-group">
                      <button name="submit" class="btn btn-warning btn-block">Login</button>
                    </div>
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="font-weight-bold small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- <script src="<?= base_url() ?>/assets/js/ruang-admin.min.js"></script> -->
</body>

</html>