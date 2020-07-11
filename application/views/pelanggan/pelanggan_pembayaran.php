<body><br><br><br><br>
    <div class="container mt-10">
        <div class="container">
            <h2>konfirmasi pembayaran</h2>
            <p>kirim bukti pembayaran</p>
            <div class="alert alert-info">Total Tagihan anda sebesar <strong>Rp.<?= number_format($data['total']) ?></strong>, Silahkan upload bukti pembayaran!</div>
            <?php echo form_open_multipart('PembayaranController/addPembayaran'); ?>
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <label>Nama Penyetor</label>
                <input type="text" name="nama" class="form-control" required="">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" name="bank" class="form-control" required="">
            </div>
            <div class="form-group">
                <label>Jumlah(Rp.)</label>
                <input type="number" name="jumlah" class="form-control" value="<?= $data['total']; ?>" placeholder="<%=nf.format(total)%>" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal pembayaran</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Masukan bukti pembayaran di sini!</label>
                <input type="file" name="bukti" class="form-control" required>
                <p class="text-danger">file gambar harus jpg dan tidak lebih dari 2MB</p>
            </div>
            <div class="form-group">
                <button class="btn btn-success" name="kirim">kirim</button>
                <a href="index.jsp" class="btn btn-danger">batal</a>
            </div>
            <input type="hidden" name="idSewa" value="<%=idSewa%>">
            </form>
        </div>
    </div>
</body>