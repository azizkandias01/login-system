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
                                <a href="detailPenari.jsp?id=<%=tarian.getIdtari()%>&status=detail"><button class="btn btn-primary">Detail</button></a>
                                <!-- <a href="#" class="my_link btn btn-default btn-rounded" data-toggle="modal" data-val="<?= $product->id_pupuk; ?>" data-target="#orangeModalSubscription">Pesan</a> -->
                                <a href="<?= base_url(); ?>keranjangController/tambahKeranjang/<?= $product->id_pupuk; ?>" class="btn btn-success">Pesan</a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notify modal-warning" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center">
                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Subscribe</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <!-- <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" id="form3" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="form3">Your name</label>
                            </div>
                            <h1>

                            </h1>

                            <div class="md-form">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="email" id="form2" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="form2">Your email</label>
                            </div> -->
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <a type="button" class="btn btn-outline-warning waves-effect">Send <i class="fas fa-paper-plane-o ml-1"></i></a>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
        </div>
    </div>
</section>