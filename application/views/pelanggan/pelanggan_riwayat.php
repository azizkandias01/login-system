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
                                <td><a href="Nota.jsp?id=<%=riwayat.getIdSewa()%>&idSewa=<%=riwayat.getIdSewa()%>&idOngkir=<%=riwayat.getIdOngkir()%>&idAlamat=<%=riwayat.getIdAlamat()%>&idPembayaran=<%=riwayat.getIdPembayaran()%>&tanggalPesan=<%=riwayat.getTanggalPesan()%>&tanggalKirim=<%=riwayat.getTanggalKirim()%>&tanggalTerimaPenyewa=<%=riwayat.getTanggalTerimaPenyewa()%>&tanggalTerimaAdmin=<%=riwayat.getTanggalTerimaAdmin()%>&tanggalKembali=<%=riwayat.getTanggalKembali()%>" class="btn btn-primary">Nota</a>
                                    <?php if ($riwayat['status'] == "Menunggu Pembayaran") { ?>
                                        <a href="Pembayaran.jsp?id=<%=riwayat.getIdSewa()%>&subtotal=<%=riwayat.getHargaBayar()%>&idOngkir=<%=riwayat.getIdOngkir()%>" class="btn btn-success">Pembayaran</a>
                                    <?php } else if ($riwayat['status'] == "Dikirim") { ?>
                                        <a href="../TerimaPelanggan?id=<%=riwayat.getIdPembayaran()%>" class="btn btn-info">Terima</a>
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