<div class="row">
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header bg-transparent border-bottom">
                <div class="px-4 d-flex justify-content-between gap-3 align-items-center">
                    <img src="<?= base_url(); ?>assets/public_page/img/LOGO.png" class="img-fluid" alt="" style="width: 25px; height: auto;">
                    <h4 class="w-100 mb-0">
                        INSPEKTORAT UTAMA BNPB
                    </h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Selamat datang kembali, <?= ucfirst($this->session->userdata('username')) ?>!</h4>
                    <?php if (!empty($this->session->userdata('privillage')) && $this->session->userdata('privillage') == 2) : ?>
                        <div class="alert alert-warning alert-dismissible fade show px-4 mb-0" role="alert">
                            <i class="mdi mdi-alert-outline d-block display-4 mt-2 mb-3 text-warning"></i>
                            <h5 class="text-warning">Akun Anda Belum Aman</h5>
                            <p>
                                Saat ini akun Anda masih menggunakan <strong>NIP</strong> sebagai metode login.
                                Demi keamanan akun, silakan melakukan reset akun di profil
                                dan gunakan email pribadi atau username unik sebagai metode login.
                            </p>
                            <hr>
                            <p class="mb-0">Langkah ini penting untuk melindungi data pribadi Anda dari potensi penyalahgunaan.</p>
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="<?= base_url('account-profil') ?>" class="btn btn-primary waves-effect waves-light">Reset Akun</a>
                            </div>
                        </div>

                    <?php elseif (!empty($this->session->userdata('privillage')) && $this->session->userdata('privillage') == 0) : ?>
                        <?php if (!empty($pending_user)) : ?>
                            <h4 class="alert-heading">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                                Akun Pengguna
                            </h4>
                            <p>
                                Terdapat <strong><?= count($pending_user) ?> akun pengguna</strong> yang masih dalam status <em>pending</em>.
                                Silakan lakukan verifikasi untuk akun tersebut agar dapat digunakan sepenuhnya.
                            </p>
                            <hr>
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="<?= base_url('admin/pengguna/index') ?>" class="btn btn-primary waves-effect waves-light">
                                    <b>Verifikasi Akun Pengguna</b>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="<?= base_url('') ?>" class="btn btn-primary waves-effect waves-light">
                                    <b>Beranda</b>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>