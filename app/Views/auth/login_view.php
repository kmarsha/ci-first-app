  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="card w-100 m-4">
            <div class="card-header">
              <h3 class="text-center">Login</h3>
            </div>
            <div class="card-body">
              <form action="/login" method="post">
                <?= csrf_field(); ?>

                <?php
                  if (session()->has('error')) {
                    ?>
                    <div class="alert alert-danger">
                      <?= session()->getFlashdata('error') ?>
                      <?= service('validation')->listErrors() ?>
                    </div>
                    <?php
                  }
                ?>

                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" value="<?= old('username') ?>" name="username" id="username" aria-describedby="usernameHelp" placeholder="Your username here...">
                  <small id="usernameHelp" class="form-text text-muted">Username can't contain space.</small>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Your password here...">
                </div>
                <div class="mb-3">
                  <label for="confirm-password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="confirm_password" id="confirm-password"  placeholder="Confirm Password...">
                </div>
                <div class="row justify-content-between" style="padding: 8px;">
                    <a href="/masuk">
                      <p class="m-2 btn btn-default">Masuk</p>
                    </a>
                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
