 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <a href="<?= base_url("auth/logout") ?>" class="btn btn-danger">Keluar</a>
       </div>
     </div>
   </div>
 </div>
 <!-- Bootstrap core JavaScript-->

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
       const jumlah = $(this).data('jumlah');
       const harga = $(this).data('harga');
       const foto = $(this).data('foto');
       const deskripsi = $(this).data('deskripsi');
       // Set data to Form Edit
       $('.pupuk_id').val(id);
       $('.pupuk_nama').val(nama);
       $('.pupuk_jumlah').val(jumlah);
       $('.pupuk_harga').val(harga);
       $('.pupuk_deskripsi').val(deskripsi);
       $('.pupuk_foto').attr("src", foto);
       // Call Modal Edit
       $('#editModal').modal('show');
     });

     // get Add Product
     $('.btn-tambah').on('click', function() {
       // get data from button edit
       // Call Modal Edit
       $('#tambahModal').modal('show');
     });
     // get Delete Product
     $('.btn-delete').on('click', function() {
       // get data from button edit
       const id = $(this).data('id');
       // Call Modal Edit
       $('.pupuk_id').val(id);
       $('#deleteModal').modal('show');
     });
     $('.btn-detail').on('click', function() {
       // get data from button edit
       const detail = $(this).data('detail');
       // Set data to Form Edit
       $('.detail').val(detail);
       // Call Modal Edit
       $('#detailModal').modal('show');
     });
     $('.btn-konfirmasi').on('click', function() {
       // get data from button edit
       const konfirmasi = $(this).data('konfirmasi');
       // Set data to Form Edit
       $('.konfirmasi').val(konfirmasi);
       // Call Modal Edit
       $('#konfirmasi').modal('show');
     });
     $('.btn-tolak').on('click', function() {
       // get data from button edit
       const konfirmasi = $(this).data('tolak');
       // Set data to Form Edit
       $('.tolak').val(konfirmasi);
       // Call Modal Edit
       $('#tolak').modal('show');
     });
   });
 </script>
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
 <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

 </body>

 </html>