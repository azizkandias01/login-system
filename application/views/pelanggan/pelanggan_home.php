<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('<?= base_url('assets/'); ?>img/sawah.jpg');" data-stellar-background-ratio="0">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                <h1 class="mb-3 bread">Pupuk Pilihan Terbaik</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Pupuk <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section goto-here">
    <div class="container">

        <div class="row">
            <?php foreach ($data as $product) { ?>
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image:url('<?= base_url('assets/'); ?>img/pupuk/<?= $product->foto_pupuk; ?>')"></div>
                        <div class="text">
                            <p class="price mb-3"><span class="orig-price">Rp.<?= number_format($product->harga_pupuk); ?><small>/Kg</small></span></p>
                            <h3 class="mb-0"><?= $product->nama_pupuk; ?></a></h3>
                            <span class="location d-inline-block mb-3">Stock : <?= $product->jumlah_pupuk; ?> Kg</span>
                            <ul class="property_list">
                                <a href="##" class="btn btn-primary btn-sm btn-delete" data-id="<?= $product->deskripsi; ?>">Detail</a>
                                <?php if ($product->jumlah_pupuk >= 1) { ?>
                                    <a href="<?= base_url(); ?>keranjangController/tambahKeranjang/<?= $product->id_pupuk; ?>" class="btn btn-success">Pesan</a>
                                <?php } else { ?>
                                    <button class="btn btn-danger">Pupuk Kosong</button>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <form method="POST" ?>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deskripsi Produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <textarea class="form-control akun_id" name="akun_id" rows="20" cols="100"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<script src="<?= base_url("/assets"); ?>/js/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
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