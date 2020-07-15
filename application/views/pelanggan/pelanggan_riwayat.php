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
                                        <a href="<?= base_url(); ?>PembayaranController/Pembayaran?id=<?= $riwayat['id_pembelian']; ?>&total=<?= $riwayat['total_pembelian']; ?>" class="btn btn-success btn-sm">Pembayaran</a>
                                    <?php } ?>
                                    <?php if ($riwayat['status'] == "Pesanan Dikirimkan!") { ?>
                                        <a href="<?= base_url(); ?>TransaksiController/konfirmasiDiterima?id=<?= $riwayat['id_pembelian']; ?>" class="btn btn-info btn-sm">Terima</a>
                                    <?php } ?>
                                    <a href="#" data-hapus="<?= $riwayat['id_pembelian']; ?>" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br>
    <form action="<?php base_url() ?>deleteHistory" method="POST">
        <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Akan Menghapus Riwayat?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Dengan Menghapus, Transaksi akan sepenuhnya dihapus, dan tidak dapat dikembalikan!</p>
                        <input type="hidden" class="form-control hapus" name="hapus">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger btn-sm" value="Hapus">
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="<?= base_url("/assets"); ?>/js/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script>
    $('.btn-hapus').on('click', function() {
        // get data from button edit
        const konfirmasi = $(this).data('hapus');
        // Set data to Form Edit
        $('.hapus').val(konfirmasi);
        // Call Modal Edit
        $('#hapus').modal('show');
    });
</script>

</html>