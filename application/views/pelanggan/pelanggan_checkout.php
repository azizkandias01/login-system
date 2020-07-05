<body>
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/kabasaran.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1>Data Pesanan</h1><br><br>
                    <form name='autoSumForm'>
                        <table id="table_id" class="table table-hover table-striped display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah Beli</th>
                                    <th>subtotal</th>
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

                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/kabasaran.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1>Data Pengiriman</h1><br><br><br><br>
                    <table id="table_id" class="table table-hover table-striped display">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $_SESSION['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $_SESSION['address']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $_SESSION['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>:</td>
                            <td><?= $_SESSION['phone']; ?></td>
                        </tr>
                    </table>
                    <form action="<?= base_url(); ?>CheckoutController/pembelianPupuk">
                        <input name="name" type="hidden" value="<?= $_SESSION['name']; ?>">
                        <input name="address" type="hidden" value="<?= $_SESSION['address']; ?>">
                        <input name="email" type="hidden" value="<?= $_SESSION['email']; ?>">
                        <input name="phone" type="hidden" value="<?= $_SESSION['phone']; ?>">
                        <input class="btn btn-success" type="submit" name="submit" value="Pesan">
                    </form>
                </div>
            </div>
        </div>
    </section> <!-- End Modal Edit Product-->
</body>

</html>