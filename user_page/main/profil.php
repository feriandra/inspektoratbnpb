<div class="row">
    <div class="col-<?= ($this->session->userdata('privillage') != 2) ? '12' : '4' ?> d-flex justify-content-center mb-3" data-aos="fade-up" data-aos-delay="100">
        <div class="card w-100 shadow">
            <div class="card-header">
                <h4 class="mb-0">Detail Akun</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="align-content: center; width: 25%;">Username</td>
                            <td style="align-content: center; width: 2%;">:</td>
                            <td style="align-content: center;"><?= $this->session->userdata('username') ?></td>
                        </tr>
                        <tr>
                            <td style="align-content: center; width: 25%;">Nama</td>
                            <td style="align-content: center; width: 2%;">:</td>
                            <td style="align-content: center;"><?= $pegawai->nama ?? $this->session->userdata('nama') ?></td>
                        </tr>
                        <tr>
                            <td style="align-content: center; width: 25%;">Email</td>
                            <td style="align-content: center; width: 2%;">:</td>
                            <td style="align-content: center;"><?= $this->session->userdata('email') ?></td>
                        </tr>
                        <tr>
                            <td style="align-content: center; width: 25%;">Hak Akses</td>
                            <td style="align-content: center; width: 2%;">:</td>
                            <td style="align-content: center;">
                                <?php
                                switch ($this->session->userdata('privillage')) {
                                    case '0':
                                        echo "Super Admin";
                                        break;
                                    case '1':
                                        echo "Pengguna";
                                        break;
                                    case '2':
                                        echo "Tamu";
                                        break;
                                    default:
                                        echo "-";
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if (!empty($this->session->userdata('privillage')) && $this->session->userdata('privillage') == 2) : ?>
        <?php if (!empty($user)) : ?>
            <div class="col-8 d-flex justify-content-center mb-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card w-100 shadow">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">Username</td>
                                    <td style="width: 2%;">:</td>
                                    <td><?= $user->username ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $user->nama ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $user->email ?></td>
                                </tr>
                                <tr>
                                    <td>Hak Akses</td>
                                    <td>:</td>
                                    <td>Pengguna</td>
                                </tr>
                                <tr>
                                    <td>Status Akun</td>
                                    <td>:</td>
                                    <td><?= ($user->is_active == 1) ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Nonaktif</span>' ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle me-3" style="font-size: 47px;"></i>
                            <div>
                                Silakan hubungi admin untuk melakukan aktivasi.
                                Jika akun anda sudah aktif, abaikan pesan ini.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="col-8 d-flex justify-content-center mb-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card w-100 shadow">
                    <div class="card-body">
                        <form action="<?= base_url('account-profil/submit'); ?>" method="POST" id="form-submit">
                            <input type="hidden" name="id_user" value="<?= $this->session->userdata('user_id') ?>">
                            <input type="hidden" name="id_pegawai" value="<?= $pegawai->id ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $this->session->userdata('username') ?>" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai->nama ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="pass" class="form-label">Password</label>
                                        <div class="d-flex">
                                            <input type="password" class="form-control" id="pass" name="pass" aria-describedby="togglePassword" required>
                                            <button class="btn btn-outline-secondary" type="button" onclick="handlePassField(this)" aria-label="Show password">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Password Rules -->
                                <ul class="list-unstyled" id="password-rules" style="display:none;">
                                    <li id="capital" class="text-danger"></li>
                                    <li id="lower" class="text-danger"></li>
                                    <li id="number" class="text-danger"></li>
                                    <li id="length" class="text-danger"></li>
                                </ul>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="re-pass" class="form-label">Re-type Password</label>
                                        <input type="password" class="form-control" id="re-pass" name="re-pass" required>
                                        <div id="rePassHelp" class="form-text text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" onclick="submitForm()">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>