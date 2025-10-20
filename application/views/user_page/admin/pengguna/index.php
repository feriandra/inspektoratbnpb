<?php
$aksesInsert = false;
$aksesEdit = false;
$aksesDelete = false;

if ($this->session->userdata('privillage') == 0) {
    $aksesInsert = true;
    $aksesEdit = true;
    $aksesDelete = true;
} else {
    foreach ($akses as $x) {
        if ($x->fitur == 'dokumen') {
            if ($x->is_create == 1) $aksesInsert = true;
            if ($x->is_update == 1) $aksesEdit = true;
            if ($x->is_delete == 1) $aksesDelete = true;
        }
    }
}

$globalAkses = ($aksesEdit);
?>
<div class="row">
    <div class="card w-100 shadow p-0" data-aos="fade-up" data-aos-delay="100">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">List Data Pengguna</h4>
            </div>
        </div>
        <div class="card-body px-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped w-100 dt-table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th style="width: 25% !important;">Username</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <?php if ($globalAkses) : ?>
                                    <th style="width: 10% !important;"></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($users as $u): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u->username ?></td>
                                    <td><?= $u->nama ?></td>
                                    <td><?= $u->email ?></td>
                                    <td><?= (($u->is_active == 0) ? '<span class="badge bg-warning text-dark">Pending</span>' : (($u->is_active == 1) ? '<span class="badge bg-success">Verified</span>' : '<span class="badge bg-danger">Rejected</span>')) ?></td>
                                    <?php if ($globalAkses) : ?>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-start gap-2">
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <?php if ($u->is_active == 1) : ?>
                                                            <button type="button" class="dropdown-item" onclick="openModalEditHakAkses('<?= base64_encode(json_encode($u)) ?>')">
                                                                <i class="fas fa-lock me-1"></i>
                                                                Edit Hak Akses
                                                            </button>
                                                        <?php endif; ?>
                                                        <button type="button" class="dropdown-item" onclick="openModalEdit('<?= base64_encode(json_encode($u)) ?>')">
                                                            <i class="fas fa-pen me-1"></i>
                                                            Edit User
                                                        </button>
                                                        <button type="button" class="dropdown-item" onclick="openModalReset('<?= $u->id ?>')">
                                                            <i class="fas fa-key me-1"></i>
                                                            Edit User Password
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php if ($u->is_active == 0) : ?>
                                                    <button type="button" class="btn btn-success" onclick="openModalDelete(1, '<?= $u->id ?>')">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" onclick="openModalDelete(2, '<?= $u->id ?>')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <?php if ($u->is_active == 1) : ?>
                                                    <button type="button" class="btn btn-danger" onclick="openModalDelete(2, '<?= $u->id ?>')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <?php if ($u->is_active == 2) : ?>
                                                    <button type="button" class="btn btn-success" onclick="openModalDelete(1, '<?= $u->id ?>')">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="resetPassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="resetPassLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="resetPassLabel">Reset Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/pengguna/reset-password'); ?>" method="POST" id="form-submit">
                <div class="modal-body">
                    <input type="hidden" name="id_user" value="">
                    <div class="row">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserLabel">Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/pengguna/submit'); ?>" method="POST" id="form-submit-edit">
                <div class="modal-body">
                    <input type="hidden" name="id_user_edit" id="id_user_edit">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="nama_edit" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama_edit" name="nama_edit" required>
                                <div id="rePassHelp" class="form-text text-danger"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="username_edit" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username_edit" name="username_edit" required>
                                <div id="rePassHelp" class="form-text text-danger"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="email_edit" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email_edit" name="email_edit" required>
                                <div id="rePassHelp" class="form-text text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="submitFormEdit()">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserAKses" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserAksesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserAksesLabel">Hak Akses Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/pengguna/submit-akses'); ?>" method="POST" id="form-submit-hak-akses">
                <div class="modal-body">
                    <input type="hidden" name="id_user_hak_akses" id="id_user_hak_akses">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="" class="form-label">Nama Fitur</label>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <label for="" class="form-label">Insert</label>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <label for="" class="form-label">Read</label>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <label for="" class="form-label">Update</label>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <label for="" class="form-label">Delete</label>
                        </div>
                    </div>
                    <div id="container-akses"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="submitFormEditHakAkses()">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>