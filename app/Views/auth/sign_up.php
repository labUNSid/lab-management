<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Lab</b>UNS</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="/auth/save" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama'); ?>" placeholder="Name" name="nama">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email'); ?>" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control <?= ($validation->hasError('password_conf')) ? 'is-invalid' : ''; ?>" placeholder="Retype Password" name="password_conf">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="invalid-feedback"><?= $validation->getError('password_conf'); ?></div>
          </div>
          <div class="input-group mb-3">
            <input type="hidden" name="avatar" value="">
          </div>
          <div class="row">
            <div class="col-8">
              <a href="/auth" class="text-center">I already have a membership</a>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url('AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>