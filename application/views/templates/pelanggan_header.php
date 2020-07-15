<!DOCTYPE html>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>UserController/Index">PupukKita</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?= base_url(); ?>UserController/Index" class="nav-link">Pupuk</a>
                </li>
                <li class="nav-item"><a href="<?= base_url(); ?>KeranjangController/Index" class="nav-link">Keranjang</a></li>
                <li class="nav-item"><a href="<?= base_url(); ?>RiwayatController/Index" class="nav-link">Riwayat</a></li>
                <li class="nav-item"><a href="<?= base_url(); ?>AkunController/Profile" class="nav-link"><?= $_SESSION['name']; ?></a></li>
                <?php if (!isset($_SESSION['name'])) { ?>
                    <li class="nav-item"><a href="<?= base_url(); ?>UserController/Logout" class="nav-link">Login</a></li>
                <?php } else { ?>

                    <li class="nav-item"><a href="<?= base_url(); ?>UserController/Logout" class="nav-link">Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>