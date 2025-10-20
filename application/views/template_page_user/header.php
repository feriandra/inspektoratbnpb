<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Inspektorat Utama BNPB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/public_page/img/LOGO.png">

    <!-- plugin css -->
    <link href="<?= base_url(); ?>assets/user_page/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url(); ?>assets/user_page/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url(); ?>assets/user_page/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url(); ?>assets/user_page/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 Bootstrap 5 Theme CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <style>
        #sidebar-menu ul li.mm-active>a {
            background-color: #044086 !important;
            color: white !important;
        }
    </style>
</head>

<body <?= (($this->session->userdata('privillage') == 2) ? 'data-layout="horizontal"' : '') ?>>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar" class="isvertical-topbar">
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

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
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
                            <a href="javascript:void(0)" onclick="handleLogout()" class="dropdown-item">
                                <i class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?php $this->load->view('template_page_user/sidebar'); ?>

        <div id="sidebar-setting"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">