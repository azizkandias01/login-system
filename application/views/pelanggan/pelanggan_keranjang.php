<body>
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/kabasaran.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <form name='autoSumForm'>
                        <table id="table_id" class="table table-hover table-striped display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah Beli</th>
                                    <th>subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                $subtotal = 0;
                                foreach ($data as $keranjang) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $keranjang['name']; ?></td>
                                        <td>Rp.<?= number_format($keranjang['price']); ?></td>
                                        <td><?= $keranjang['qty']; ?></td>
                                        <td>Rp.<?= number_format($keranjang['price'] * $keranjang['qty']); ?></td>
                                        <td><a href="<?= base_url(); ?>KeranjangController/hapusKeranjang/<?= $keranjang['rowid']; ?>" class="btn btn-danger">Hapus</a><span />
                                            <a href="#" class="btn btn-success btn-sm btn-edit" data-id="<?= $keranjang['rowid']; ?>" data-qty="<?= $keranjang['qty']; ?>" ?>Edit<a>
                                        </td>
                                    </tr>
                                <?php $subtotal += $keranjang['price'] * $keranjang['qty'];
                                    $i++;
                                }
                                ?>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Rp.<?= number_format($subtotal); ?></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <a href="<?= base_url(); ?>UserController/Index" class="btn btn-success">Lanjutkan Belanja</a>
                    <a href="<?= base_url(); ?>CheckoutController/Index" class="btn btn-warning">Checkout</a>
                    <a href="<?= base_url(); ?>KeranjangController/hapusSemua/" class="btn btn-danger">Hapus Semua Barang</a><br><br>
                </div>
            </div>
        </div>
        </div>
    </section>
    </div>
    <form action="<?= base_url(); ?>KeranjangController/editKeranjang/">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Product id</label>
                            <input type="text" class="form-control product_id" name="product_id" placeholder="Product Name">
                        </div>

                        <div class="form-group">
                            <label>Product qty</label>
                            <input type="text" class="form-control product_qty" name="product_qty" placeholder="Product Name">
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
    <!-- End Modal Edit Product-->
</body>

</html>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="<?= base_url("/assets"); ?>/js/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
            // get data from button edit
            const id = $(this).data('id');
            const qty = $(this).data('qty');
            // Set data to Form Edit
            $('.product_id').val(id);
            $('.product_qty').val(qty);
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.productID').val(id);
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