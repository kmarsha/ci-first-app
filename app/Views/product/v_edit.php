  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url() ?>/product">Products</a></li>
              <li class="breadcrumb-item active">Create Product</li>
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
                <h2 class="h2 text-center">Edit Product</h2>
              </div>
                <!-- form start -->
                <form action="<?= base_url() ?>/product/<?= $product['product_id'] ?>" method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="inputProductName">Nama Produk</label>
                      <input type="text" name="product_name" value="<?= $product['product_name'] ?>" class="form-control" id="inputProductName" required placeholder="Masukkan Nama Produk">
                    </div>
                    
                    <div class="form-group">
                      <label>Deskripsi Produk</label>
                      <textarea class="form-control" name="product_deskripsi" rows="3" required placeholder="Masukkan Deskripsi Produk"><?= $product['product_deskripsi'] ?></textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="row justify-content-end">
                      <button type="submit" class="btn btn-primary">Ubah</button>
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

  