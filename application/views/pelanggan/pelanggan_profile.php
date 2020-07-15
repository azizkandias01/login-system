<!DOCTYPE html>
<html>

<head>
    <jsp:include page="Head.jsp" />
    <title>Profile <%=session.getAttribute("nama")%></title>
</head>

<body>
    <section>
        <div class="content"><br><br>
            <div class="mt-5 container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="header">

                            <?= $this->session->flashdata('message') ?>
                            <h4 class="title">Isi Data Diri</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="<?= base_url(); ?>AkunController/updateAkun2" method="POST">
                                        <div class="form-group">
                                            <label>Nama Depan</label>
                                            <input type="text" name="akun_nama" class="form-control" value="<?= $_SESSION['name']; ?>" required>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="akun_email" class="form-control" value="<?= $_SESSION['email']; ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="akun_password" class="form-control" value="<?= $_SESSION['password']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="number" name="akun_telepon" class="form-control" value="<?= $_SESSION['phone']; ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="akun_alamat" class="form-control" required><?= $_SESSION['address']; ?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?= $_SESSION['id']; ?>" name="akun_id">
                                        <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <BR>
    <jsp:include page="Footer.jsp" />
    <jsp:include page="Loader.jsp" />
</body>

</html>