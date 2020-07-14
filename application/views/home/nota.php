<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Detail transaksi</h3>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <div class="table-responsive">
                <br><br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"><strong>
                                <h1>Data Pemesanan</h1><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h2><strong>Dari</strong></h2>
                            <strong>Dari : PupukKita</strong><br>
                            Tanggal Pesan: <?= $data['tanggal']; ?><br>
                            Status : <?= $data['status']; ?><br>
                            Total : Rp.<?= number_format($data['total']); ?>
                            <br>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <h2><strong>Penerima</strong></h2>
                            Ke: <?= $data2['pelanggan'][0]['nama']; ?><br>
                            Email: <?= $data2['pelanggan'][0]['email']; ?><br>
                            Alamat: <?= $data2['pelanggan'][0]['alamat']; ?>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br><br><br>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>nama produk</th>
                                <th>harga</th>
                                <th>jumlah</th>
                                <th>subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            $subtotal = 0;
                            foreach ($data2['detail'] as $nota) {
                                $subtotal += $nota['jumlah'] * $nota['harga_pupuk'];  ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <th><?= $nota['nama_pupuk']; ?></th>
                                    <th>Rp.<?= number_format($nota['harga_pupuk']); ?></th>
                                    <th><?= $nota['jumlah']; ?></th>
                                    <th>Rp <?= number_format($nota['jumlah'] * $nota['harga_pupuk']); ?>
                                    </th>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total :</td>
                                <td colspan="5">Rp. <?= number_format($subtotal); ?></td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                    <?php if ($data['status'] == "Menunggu Konfirmasi") { ?>
                        <div class="col-md-10"><strong>
                                <h1>Data Pembayaran</h1><br>
                        </div>

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Id Pembayaran</th>
                                    <th>Nama Pembayar</th>
                                    <th>Bank</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $pembayaran = $data3[0] ?>
                                    <td><?= $pembayaran['id_pembayaran']; ?></td>
                                    <td><?= $pembayaran['nama']; ?></td>
                                    <td><?= $pembayaran['bank']; ?></td>
                                    <td>Rp.<?= number_format($pembayaran['jumlah']); ?></td>
                                    <td><?= $pembayaran['tanggal']; ?></td>
                                    <td><?= $pembayaran['bukti']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php $foto = base_url('assets/') . "img/pembayaran/" . $pembayaran['bukti']; ?><br><br>
                        <img src="<?= $foto; ?>" align="center"><br>
                    <?php } ?>
                </div><br><br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <?php if ($data['status'] == "Menunggu Pembayaran") { ?>
                                <div class="alert alert-danger">
                                    <p> Belum Melakukan Konfirmasi Pembayaran
                                    </p>
                                </div>
                            <?php } else if ($data['status'] == "Menunggu Konfirmasi") { ?>
                            <?php }
                            else if ($data['status'] == "Pesanan Dikirimkan!") { ?>
                                <div class="alert alert-success">
                                    <p> Pesanan Telah Dikirim
                                    </p>
                                </div>
                            <?php }
                            else { ?>
                                <div class="alert alert-success">
                                    <p> Pesanan Selesai
                                    </p>
                                </div>
                            <?php }  ?>
                        </div><br><br><br><br>
                    </div>
                </div>
                <br>
                <jsp:include page="Footer.jsp" />
                <jsp:include page="Loader.jsp" />
                </body>

                </html>