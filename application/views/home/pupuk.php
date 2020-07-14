<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Daftar Pupuk</h3>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <a href="##" class="btn btn-primary btn-sm btn-tambah">Tambah Pupuk</a><br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody><?php $index = 1; ?>
                        <?php foreach ($data as $pupuk) { ?>
                            <tr>
                                <td><?= $index; ?></td>
                                <td><?php echo ($pupuk->nama_pupuk) ?></td>
                                <td><?= $pupuk->jumlah_pupuk ?></td>
                                <td><?= $pupuk->harga_pupuk ?></td>
                                <td>
                                    <img src="<?= base_url('assets/'); ?>img/pupuk/<?= $pupuk->foto_pupuk; ?>" width="100" height="100" />
                                </td>
                                <td> <a href="##" class="btn btn-primary btn-sm btn-detail" data-detail="<?= $pupuk->deskripsi; ?>">Detail</a></td>
                                <?php $index++; ?>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $pupuk->id_pupuk; ?>">Delete</a>
                                    <a href="#" class="btn btn-success btn-sm btn-edit" data-id="<?= $pupuk->id_pupuk; ?>" data-nama="<?= $pupuk->nama_pupuk; ?>" data-jumlah="<?= $pupuk->jumlah_pupuk; ?>" data-harga="<?= $pupuk->harga_pupuk; ?>" data-foto="<?= base_url('assets/'); ?>img/pupuk/<?= $pupuk->foto_pupuk; ?>" data-deskripsi="<?= $pupuk->deskripsi; ?>">Edit<a>
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
        <?php echo form_open_multipart('PupukController/editPupuk'); ?>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Pupuk</label>
                            <input type="text" class="form-control pupuk_nama" name="pupuk_nama" placeholder="Nama Pupuk">
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" class="form-control pupuk_jumlah" name="pupuk_jumlah" placeholder="Jumlah">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control pupuk_harga" name="pupuk_harga" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control pupuk_deskripsi" name="pupuk_deskripsi" rows="20" cols="100"></textarea>
                        </div>
                        <br>
                        <img class="pupuk_foto" name="pupuk_foto" width="100" height="100"><br>
                        <input type="file" name="pupuk_foto" />
                        <input type="hidden" class="form-control pupuk_id" name="pupuk_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <?php echo form_open_multipart('PupukController/addPupuk'); ?>
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Pupuk</label>
                            <input type="text" class="form-control" name="pupuk_nama" placeholder="Nama Pupuk">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="pupuk_harga" placeholder="Harga Pupuk">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Pupuk</label>
                            <input type="text" class="form-control" name="pupuk_jumlah" placeholder="Nama Pupuk">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" name="pupuk_deskripsi" placeholder="deskripsi Pupuk">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="pupuk_foto" placeholder="foto Pupuk">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="product_id" class="product_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <?php echo form_open_multipart('PupukController/deletePupuk'); ?>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin mau menghapus data ini?</p>
                        <input type="hidden" class="pupuk_id" name="pupuk_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                        <input type="submit" class="btn btn-danger" value="Hapus" />
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form method="POST" ?>
            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deskripsi Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control detail" name="detail" rows="20" cols="100"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>