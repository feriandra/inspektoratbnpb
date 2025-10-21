<?php
$aksesPegawai = false;
$aksesDokumen = false;
$aksesPengguna = false;

if ($this->session->userdata('privillage') == 0) {
    $aksesPegawai = true;
    $aksesDokumen = true;
    $aksesPengguna = true;
} else {
    foreach ($akses as $x) {
        if ($x->fitur == 'pegawai' && $x->is_read == 1) $aksesPegawai = true;
        if ($x->fitur == 'dokumen' && $x->is_read == 1) $aksesDokumen = true;
        if ($x->fitur == 'pengguna' && $x->is_read == 1) $aksesPengguna = true;
    }
}
?>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="<?= base_url('') ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= base_url(); ?>assets/public_page/img/LOGO.png" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="<?= base_url(); ?>assets/public_page/img/dark_logo.png" alt="" height="50">
            </span>
        </a>

        <a href="<?= base_url('') ?>" class="logo logo-light">
            <span class="logo-lg">
                <img src="<?= base_url(); ?>assets/public_page/img/LOGO.png" alt="" height="26">
            </span>
            <span class="logo-sm">
                <img src="<?= base_url(); ?>assets/public_page/img/dark_logo.png" alt="" height="50">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Dashboard</li>
                <li>
                    <a href="<?= base_url('beranda') ?>">
                        <i class="bx bx-home-alt icon nav-icon"></i>
                        <span class="menu-item">
                            Beranda
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('') ?>">
                        <i class="bx bx-exit icon nav-icon"></i>
                        <span>Halaman Depan</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-applications">Master Data</li>
                <?php if ($aksesPegawai == true) : ?>
                    <li <?= ($this->uri->segment(2) == 'pegawai') ? "class='mm-active'" : "" ?>>
                        <a href="<?= base_url('admin/pegawai/index') ?>">
                            <i class="bx bx bx-user icon nav-icon"></i>
                            <span class="menu-item">Data Pegawai</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($aksesDokumen) : ?>
                    <li <?= ($this->uri->segment(2) == 'dokumen') ? "class='mm-active'" : "" ?>>
                        <a href="<?= base_url('admin/dokumen/index') ?>">
                            <i class="bx bx-news icon nav-icon"></i>
                            <span class="menu-item">Data Dokumen</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($aksesPengguna) : ?>
                    <li <?= ($this->uri->segment(2) == 'pengguna') ? "class='mm-active'" : "" ?>>
                        <a href="<?= base_url('admin/pengguna/index') ?>">
                            <i class="bx bxs-user-rectangle icon nav-icon"></i>
                            <span class="menu-item">Data Pengguna</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="menu-title" data-key="t-menu">Other</li>
                <li <?= ($this->uri->segment(2) == 'account-profil') ? "class='mm-active'" : "" ?>>
                    <a href="<?= base_url('account-profil') ?>">
                        <i class="bx bx-toggle-left icon nav-icon"></i>
                        <span class="menu-item">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="handleLogout()">
                        <i class="bx bx-power-off icon nav-icon"></i>
                        <span class="menu-item">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

<header class="ishorizontal-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= base_url('') ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url(); ?>assets/public_page/img/LOGO.png" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url(); ?>assets/public_page/img/dark_logo.png" alt="" height="50">
                    </span>
                </a>

                <a href="<?= base_url('') ?>" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="<?= base_url(); ?>assets/public_page/img/LOGO.png" alt="" height="26">
                    </span>
                    <span class="logo-sm">
                        <img src="<?= base_url(); ?>assets/public_page/img/dark_logo.png" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="bx bx-menu align-middle"></i>
            </button>

            <!-- start page title -->
            <div class="page-title-box align-self-center d-none d-md-block">
                <h4 class="page-title mb-0"><?= $title ?></h4>
            </div>
            <!-- end page title -->

        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown-v"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bxs-user-circle" style="line-height: 0px !important; font-size: 36px;"></i>
                    <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15"><?= $this->session->userdata('nama') ?></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0"><?= $this->session->userdata('nama') ?></h6>
                        <p class="mb-0 font-size-11 text-muted"><?= $this->session->userdata('username') ?></p>
                    </div>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="handleLogout()">
                        <i class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i>
                        <span class="align-middle">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav d-flex w-100">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?= base_url('beranda') ?>">
                                <i class="bx bx-home-alt icon nav-icon"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('account-profil') ?>">
                                <i class="bx bx-toggle-left icon nav-icon"></i>
                                <span>Profil</span>
                            </a>
                        </li>

                        <li class="nav-item ms-auto">
                            <a class="nav-link" href="<?= base_url('') ?>">
                                <i class="bx bx-exit icon nav-icon"></i>
                                <span>Halaman Depan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>