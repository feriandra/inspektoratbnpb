<header id="header" class="header d-flex align-items-center sticky-top custom-header">
    <div class="container position-relative d-flex align-items-center">

        <a href="<?= base_url('') ?>" class="logo d-flex align-items-center me-auto">
            <img src="<?= base_url(); ?>assets/public_page/img/logo__241.png"
                alt="Official Logo BNPB"
                class="img-fluid" width="240"
                srcset="<?= base_url(); ?>assets/public_page/img/alt_logo.png 1x, <?= base_url(); ?>assets/public_page/img/alt_logo.png 2x"
                sizes="(max-width: 240px) 100vw, 240px">
            <!-- <h1 class="sitename">BNPB</h1> -->
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a class="nav-link scrollto" href="<?= base_url('') ?>#portfolio">Galeri</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('struktur-organisasi') ?>">Struktur Organisasi</a></li>
                <?php if (!empty($this->session->userdata('logged_in')) && $this->session->userdata('privillage') != 2) : ?>
                    <li><a class="nav-link scrollto" href="<?= base_url('list-pegawai') ?>">List Pegawai</a></li>
                <?php endif; ?>
                <li><a class="nav-link scrollto" href="<?= base_url('') ?>#contact">Kontak</a></li>
                <?php if (!empty($this->session->userdata('logged_in'))): ?>
                    <li class="dropdown">
                        <a href="#">
                            <span class="d-flex align-items-center gap-2">
                                <i class="fa-regular fa-circle-user custom-icon-ex"></i>
                                <?= $this->session->userdata('username') ?>
                            </span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul style="width: fit-content;">
                            <li><a href="<?= base_url('beranda') ?>">Dashboard</a></li>
                            <li><a href="<?= base_url('account-profil') ?>">Profil</a></li>
                            <li><a href="javascript:void(0)" onclick="handleLogout()">Logout</a></li>

                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <?php if (empty($this->session->userdata('logged_in'))): ?>
            <div class="header-social-links d-flex align-items-center">
                <button onclick="location.href='<?= base_url('login') ?>'" class="btn primary-button">Login</button>
            </div>
        <?php endif; ?>

    </div>
</header>

<style>
    .navmenu .dropdown ul li {
        min-width: fit-content !important;
    }
</style>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Main JS File -->
<script src="<?= base_url(); ?>assets/public_page/js/main.js"></script>
