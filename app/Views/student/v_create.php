  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create User Admins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url() ?>/admin">Admins</a></li>
              <li class="breadcrumb-item active">Create Admins</li>
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
                <h2 class="h2 text-center">New Student</h2>
              </div>
                <!-- form start -->
                <form action="<?= base_url() ?>/student" method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="inputUsername">Username</label>
                      <input type="text" name="username" class="form-control" id="inputUsername" required placeholder="Masukkann Username">
                    </div>

                    <div class="form-group">
                      <label for="inputPassword">Password</label>
                      <input type="password" name="password" class="form-control" id="inputPassword" required placeholder="Masukkann Password">
                    </div>

                    <hr>

                    <div class="form-group">
                      <label for="inputNIS">NIS</label>
                      <input type="number" name="nis" class="form-control" id="inputNIS" placeholder="Masukkan NIS">
                    </div>

                    <div class="form-group">
                      <label for="inputName">Nama</label>
                      <input type="text" name="name" class="form-control" id="inputName" required placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                      <label for="inpurProg">Program Keahlian</label>
                      <input type="text" name="prog" class="form-control" id="inpurProg" required placeholder="Masukkan Program Keahlian">
                    </div>

                    <div class="form-group">
                      <label for="inputTingkat">Tingkat</label>
                      <input type="number" name="tingkat" class="form-control" id="inputTingkat" required placeholder="Masukkan Tingkat">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="row justify-content-end">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  