<!DOCTYPE html>
<html>

<head>
    <jsp:include page="Head.jsp" />
    <title>JSP Page</title>
</head>

<body>
    <jsp:include page="Header.jsp" />
    <br><br><br><br>
    <section class="riwayat">
        <div class="container">
            <br><br><br><br>
            <h1 align="center">Riwayat Pemesanan</h1><br><br>
            <?= $this->session->flashdata('message') ?>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Tanggal Pesan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Total Item</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data as $riwayat) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $riwayat['tanggal']; ?></td>
                                <td>Rp.<?= number_format($riwayat['total_pembelian']); ?></td>
                                <td><?= $riwayat['status']; ?></td>
                                <td><?= $riwayat['total']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>NotaController/Nota?id=<?= $riwayat['id_pembelian']; ?>&tanggal=<?= $riwayat['tanggal']; ?>&status=<?= $riwayat['status']; ?>&total=<?= $riwayat['total_pembelian']; ?>" class="btn btn-primary btn-sm">Nota</a>
                                    <?php if ($riwayat['status'] == "Menunggu Pembayaran") { ?>
                                        <a href="<?= base_url(); ?>PembayaranController/Pembayaran?id=<?= $riwayat['id_pembelian']; ?>&total=<?= $riwayat['total_pembelian']; ?>" class="btn btn-danger btn-sm">Pembayaran</a>
                                    <?php } ?>
                                    <?php if ($riwayat['status'] == "Pesanan Dikirimkan!") { ?>
                                        <a href="<?= base_url(); ?>TransaksiController/konfirmasiDiterima?id=<?= $riwayat['id_pembelian']; ?>" class="btn btn-info btn-sm">Terima</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br>
</body>

</html>