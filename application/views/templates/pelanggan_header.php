<!DOCTYPE html>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.jsp">PupukKita</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?= base_url(); ?>UserController/Index" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item"><a href="AlatMusik.jsp" class="nav-link">Pesanan</a></li>
                <li class="nav-item"><a href="<?= base_url(); ?>KeranjangController/Index" class="nav-link">Keranjang</a></li>
                <li class="nav-item"><a href="about.jsp" class="nav-link">Tentang Kami</a></li>
                <li class="nav-item"><a href="contact.jsp" class="nav-link">Hubungi Kami</a></li>
                <?php if (!isset($_SESSION['name'])) { ?>
                    <li class="nav-item"><a href="<?= base_url(); ?>UserController/Logout" class="nav-link">Login</a></li>
                <?php } else { ?>

                    <li class="nav-item"><a href="<?= base_url(); ?>UserController/Logout" class="nav-link">Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>