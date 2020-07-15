<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h3>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody><?php $index = 1; ?>
                        <?php foreach ($data as $transaksi) { ?>
                            <tr>
                                <td><?= $index; ?></td>
                                <td><?php echo ($transaksi->nama) ?></td>
                                <td>Rp.<?= number_format($transaksi->total_pembelian) ?></td>
                                <td><?= $transaksi->tanggal ?></td>
                                <td><?= $transaksi->status ?></td>
                                <?php $index++; ?>
                                <td>
                                    <a href="<?php base_url() ?>nota?id=<?= $transaksi->id_pembelian; ?>&tanggal=<?= $transaksi->tanggal; ?>&status=<?= $transaksi->status; ?>&total=<?= $transaksi->total_pembelian; ?>&id_pembayaran=<?= $transaksi->id_pembayaran; ?>&id_pelanggan=<?= $transaksi->id_pelanggan; ?>" class="btn btn-primary btn-sm">Nota</a>
                                    <?php if ($transaksi->status == "Menunggu Konfirmasi") { ?>
                                        <a href="##" data-konfirmasi="<?= $transaksi->id_pembelian; ?>" class="btn btn-success btn-sm btn-konfirmasi">Konfirmasi</a>
                                        <a href="##" data-tolak="<?= $transaksi->id_pembelian; ?>" class="btn btn-warning btn-sm btn-tolak">Tolak</a>
                                    <?php } ?>
                                    <a href="#" data-hapus="<?= $transaksi->id_pembelian; ?>" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <!-- End of Main Content -->

                        <!-- Footer -->

                        <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <form action="<?php base_url() ?>konfirmasiPembayaran" method="POST">
            <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Akan Mengkonfirmasi Pembayaran?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Dengan Mengkonfirmasi Pembayaran, barang akan langsung dikirim!</p>
                            <input type="hidden" class="form-control konfirmasi" name="konfirmasi">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success btn-sm" value="Konfirmasi">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="<?php base_url() ?>tolakPembayaran" method="POST">
            <div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Akan Menolak Pembayaran?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Dengan Menolak, Transaksi telah digagalkan!</p>
                            <input type="hidden" class="form-control tolak" name="tolak">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-danger btn-sm" value="Tolak ">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="<?php base_url() ?>hapusTransaksi" method="POST">
            <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Akan Menghapus Pembayaran?</h5>
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