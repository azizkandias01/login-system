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
                <?php $index++; ?>
                <td>
                  <a href="<?= base_url('Admin/hapus/' . $user->id_akun) ?>" class="btn btn-danger">Delete</a>
                  <a href="<?= base_url('Admin/edit/' . $user->id_akun) ?>" class="btn btn-success">Edit</a>
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