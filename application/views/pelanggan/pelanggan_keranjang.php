<body>
    <jsp:include page="Header.jsp"></jsp:include>
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/kabasaran.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1 class="mb-3 bread">Keranjang Pemesanan</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Tarian <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <form name='autoSumForm'>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah Baju</th>
                        <th>subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php var_dump($m); ?>
                <tbody>
                    <?php //foreach ($cart as $keranjang) { 
                    ?>
                    <tr>
                        <td><?= 1; ?></td>
                        <td><?= "a"; ?></td>
                        <td>Rp.<%=nf.format(data.getHarga())%></td>
                        <td><%=data.getJumlah()%>
                        </td>
                        <td>Rp.<%=nf.format(data.getHarga() * data.getJumlah())%></td>
                        <td><a href="../HapusKeranjang?index=<%=no%>&page=keranjang" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <?php //} 
                    ?>

                    <tr>

                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Rp.<%=nf.format(total)%></td>
                        <td></td>

                    </tr>

                </tbody>

            </table>
        </form>
        <a href="Baju.jsp" class="btn btn-success">Lanjutkan Belanja</a>
        <a href="CheckoutBaju.jsp" class="btn btn-warning">Checkout</a>
        <a href="../HapusKeranjang?page=keranjang" class="btn btn-danger">Hapus Semua Barang</a>
    </div>
    </div>
</body>

</html>