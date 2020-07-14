<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <?= $this->session->flashdata('message') ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody><?php $index = 1; ?>
            <?php foreach ($data as $user) { ?>
              <tr>
                <td><?= $index; ?></td>
                <td><?php echo ($user->nama) ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->password ?></td>
                <td><?= $user->telepon ?></td>
                <td><?= $user->alamat ?></td>
                <?php $index++; ?>
                <td>
                  <a href="#" class="badge badge-danger btn-sm btn-delete" data-id="<?= $user->id_akun; ?>">Delete</a>
                  <a href="#" class="badge badge-success btn-sm btn-edit" data-id="<?= $user->id_akun; ?>" data-nama="<?= $user->nama; ?>" data-email="<?= $user->email; ?>" data-password="<?= $user->password; ?>" data-alamat="<?= $user->alamat; ?>" data-telepon="<?= $user->telepon; ?>">Edit<a>
                </td>
              </tr>
            <?php } ?>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <form action="<?= base_url(); ?>AkunController/UpdateAkun/" method="POST">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control akun_nama" name="akun_nama" placeholder="Name">
                <input type="hidden" class="form-control akun_id" name="akun_id" placeholder="Name">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control akun_email" name="akun_email" placeholder="Email Name">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control akun_password" name="akun_password" placeholder="Password">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control akun_alamat" name="akun_alamat" placeholder="Alamat">
              </div>
              <div class="form-group">
                <label>Telepon</label>
                <input type="text" class="form-control akun_telepon" name="akun_telepon" placeholder="Telepon">
              </div>

            </div>
            <div class="modal-footer">
              <input type="hidden" name="product_id" class="product_id">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    </form>
    <form action="<?= base_url(); ?>AkunController/deleteAkun" ; method="POST" ?>
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Anda yakin mau menghapus data ini?</p>
              <input type="hidden" class="form-control akun_id" name="akun_id">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
              <input type="submit" class="btn btn-danger" value="Hapus" />
            </div>
          </div>
        </div>
      </div>
    </form>
    </body>

    </html>
    <script src="<?= base_url("/assets"); ?>/js/jquery-3.2.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
          // get data from button edit
          const id = $(this).data('id');
          const nama = $(this).data('nama');
          const email = $(this).data('email');
          const password = $(this).data('password');
          const alamat = $(this).data('alamat');
          const telepon = $(this).data('telepon');
          // Set data to Form Edit
          $('.akun_id').val(id);
          $('.akun_email').val(email);
          $('.akun_password').val(password);
          $('.akun_telepon').val(telepon);
          $('.akun_alamat').val(alamat);
          $('.akun_nama').val(nama);
          // Call Modal Edit
          $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
          // get data from button edit
          const id = $(this).data('id');
          // Set data to Form Edit
          $('.akun_id').val(id);
          // Call Modal Edit
          $('#deleteModal').modal('show');
        });

      });
    </script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.stellar.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/aos.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.animateNumber.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.timepicker.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="<?= base_url('assets/'); ?>js/google-map.js"></script>
    <script src="<?= base_url('assets/'); ?>js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>