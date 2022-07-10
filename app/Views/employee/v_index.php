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
                    <h4 class="card-title" style="text-align: center;">Data Vaksinasi Karyawan</h4>
                </div>
                <div class="card-body">
                <div class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" style="margin-bottom:10px;">Tambah Data</button>
                </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Karyawan</th>
                                    <th>Usia</th>
                                    <th>Status Vaksin 1</th>
                                    <th>Status Vaksin 2</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($getKaryawan as $krywn) { ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $krywn['nama_karyawan']; ?></td>
                                        <td><?= $krywn['usia']; ?></td>
                                        <td><?= $krywn['status_vaksin_1']; ?></td>
                                        <td><?= $krywn['status_vaksin_2']; ?></td>
                                        <td>
                                            <div class="row justify-content-center">
                                            <a href='<?= "employee/edit/" . $krywn['id']; ?>' class="btn btn-warning m-1" data-target="#editModal">
                                                Edit</a>

                                            <form action="<?= "employee/hapus/" . $krywn['id']; ?>" method="post">
                                                <button type="submit" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data karyawan?')" class="btn btn-danger m-1">Hapus</button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
 </div>

<!--   Modal Tambah Data-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/employee/add">
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="age" class="col-form-label">Usia</label>
                        <input type="text" class="form-control" id="age" name="age">
                    </div>
                    <div class="form-group">
                        <label for="vaksin1" class="col-form-label">Status Vaksin 1</label>
                        <select class="form-control" name="vaksin1">
                            <option value="">---Pilih Status Vaksin---</option>
                            <option value="Belum" selected>Belum Vaksin</option>
                            <option value="Sudah">Sudah Vaksin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vaksin2" class="col-form-label">Status Vaksin 2</label>
                        <select class="form-control" name="vaksin2">
                            <option value="">---Pilih Status Vaksin---</option>
                            <option value="Belum" selected>Belum Vaksin</option>
                            <option value="Sudah">Sudah Vaksin</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

