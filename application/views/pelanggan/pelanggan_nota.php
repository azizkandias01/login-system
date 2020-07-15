<!DOCTYPE html>
<html>

<head>
    <jsp:include page="Head.jsp" />
    <title>Nota <%=session.getAttribute("nama")%> No.<%=request.getParameter("idSewa")%></title>
</head>

<body>
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

                Ke: <?= $_SESSION['name']; ?><br>
                Email: <?= $_SESSION['email']; ?><br>
                Alamat: <?= $_SESSION['address']; ?>
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
                foreach ($data2 as $nota) {
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
    </div><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if ($data['status'] == "Menunggu Pembayaran") { ?>
                    <div class="alert alert-danger">
                        <p> Pesanan Berhasil, Silahkan lakukan pembayaran sebesar Rp. <?= $subtotal; ?>
                            ke Rekening 0013-1321442-231 Bank BCA Atas nama AZIZ KANDIAS
                        </p>
                    </div>
                <?php } else if ($data['status'] == "Menunggu Konfirmasi") { ?>
                    <div class="alert alert-info">
                        <p> Bukti Pembayaran Telah Diterima, Pesanan Sedang Menunggu Konfirmasi!
                        </p>
                    </div>
                <?php } else if ($data['status'] == "Pesanan Dikirimkan!") { ?>
                    <div class="alert alert-success">
                        <p> Pesanan Telah Dikirim, Anda Telah Menerima Pesanan?
                        </p>
                    </div>
                <?php } else if ($data['status'] == "Pesanan Ditolak") { ?>
                    <div class="alert alert-danger">
                        <p> Pesanan Anda Ditolak!
                        </p>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-success">
                        <p> Pesanan Selesai
                        </p>
                    </div>
                <?php } ?>
            </div><br><br><br><br>
            <div class="col-md-7">
                <?php if ($data['status'] == "Menunggu Pembayaran") { ?>
                    <a href="<?= base_url(); ?>PembayaranController/Pembayaran?id=<?= $data['id']; ?>&total=<?= $data['total']; ?>" class="btn btn-danger">Pembayaran</a>
                <?php } ?>
                <?php if ($data['status'] == "Dikirim") { ?>
                    <a href="#" class="btn btn-success">Terima</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <br>
    <jsp:include page="Footer.jsp" />
    <jsp:include page="Loader.jsp" />
</body>

</html>