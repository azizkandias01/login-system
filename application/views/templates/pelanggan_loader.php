<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

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