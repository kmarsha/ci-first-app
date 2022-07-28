  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= route_to('contacts') ?>">Contacts</a></li>
              <li class="breadcrumb-item active">Create Contact</li>
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
                <h2 class="h2 text-center">New Contact</h2>
              </div>
                <!-- form start -->
                <form action="<?= base_url() ?>/contact" method="POST" name="contact" id="contact">
                  <div class="card-body">
                  	
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
                  
                  <span class="d-none alert alert-success mb-3" id="res_message"></span>

                    <div class="form-group">
                      <label for="inputName">Nama</label>
                      <input type="text" name="name" class="form-control" id="inputName" placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                      <label for="inputEmail">Email</label>
                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Masukkan Email ID">
                    </div>
                    
                    <div class="form-group">
                      <label>Message</label>
                      <textarea class="form-control" name="message" rows="3"></textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="row justify-content-end">
                      <button type="submit" id="send_form" class="btn btn-primary">Simpan</button>
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

  <script>
    $(document).ready(function() {
      $("#contact").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 50,
            email: true,
          },
          message: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "Masukkan Nama Lengkap"
          },
          email: {
            required: "Masukkan Email",
            email: "Masukkan Email yang Valid",
            maxlength: "Email harus 50 karakter atau kurang",
          },
          message: {
            required: "Masukkan Pesan"
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
          $('#send_form').html('Sending...');
          $.ajax({
            type: "POST",
            url: "<?= base_url() ?>/contact",
            data: $('#contact').serialize(),
            dataType: "json",
            success: function (response) {
              console.log(response);
              console.log(response.success);
              $('#send_form').html('Submit');
              $('#res_message').html(response.msg);
              // $('#res_message').show();
              $('#res_message').toggleClass('d-none');
              document.getElementById("contact").reset(); 
              setTimeout(function() {
              $('#res_message').toggleClass('d-none');
              $('#res_message').html('');
              location.href = '<?= base_url() ?>/contact';
              }, 5000);
            }
          });
        }
      })
    })
  </script>