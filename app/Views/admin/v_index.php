  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Admins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admins</li>
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
                <h2 class="h2 text-center">List Users Admin</h2>
              </div>
              <div class="card-body">
                <div class="row justify-content-end">
                  <a href="<?= base_url() ?>/admin/create">
                    <button class="btn btn-primary mb-2">+ New Admin</button>
                  </a>
                </div>
                <table id="admins-table" class="table table-striped table-inverse text-center">
                  <thead class="thead-inverse">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Usia</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                        $no = 1;
                        foreach ($admins as $admin) {
                          ?>
                          <tr>
                            <td scope="row"><?= $no++ ?></td>
                            <td><?= $admin['name'] ?></td>
                            <td><?= $admin['age'] ?></td>
                            <td class="row justify-content-around">
                              <a href="<?= base_url() ?>/admin/<?= $admin['username'] ?>/edit">
                                <button class="btn btn-warning">Edit</button>
                              </a>
                              <a href="<?= base_url() ?>/admin/<?= $admin['username'] ?>/delete" onclick="return confirm('Hapus User Admin?')">
                                <button class="btn btn-danger">Hapus</button>
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<!-- jQuery -->
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  
<script>
  $(function () {
    $("#admins-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#admins-table-wrapper');
    // $('#admins-table').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>