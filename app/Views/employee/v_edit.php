 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Vaksinasi Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">Edit Data Vaksinasi Karyawan</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url() ?>/employee/update/<?= $employee->id ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="">Nama Karyawan</label>
                            <input type="text" value="<?= $employee->nama_karyawan; ?>" name="nama" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Usia</label>
                            <input type="text" value="<?= $employee->usia; ?>" name="age" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Status Vaksin 1</label>
                            <select class="form-control" name="vaksin1">
                                <option value="<?= $employee->status_vaksin_1; ?>">---Pilih Status Vaksin--</option>
                                <option value="Belum">Belum Vaksin</option>
                                <option value="Sudah">Sudah Vaksin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status Vaksin 2</label>
                            <select class="form-control" name="vaksin2">
                                <option value="<?= $employee->status_vaksin_2; ?>">---Pilih Status Vaksin--</option>
                                <option value="Belum">Belum Vaksin</option>
                                <option value="Sudah">Sudah Vaksin</option>
                            </select>
                        </div>
        
                        <input type="hidden" value="<?= $employee->id; ?>" name="id">
                        <div class="text-right">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>
      </div>
    </section>
 </div>