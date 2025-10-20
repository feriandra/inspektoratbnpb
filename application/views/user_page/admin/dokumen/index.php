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

$globalAkses = ($aksesEdit || $aksesDelete);
?>

<!-- <?= base_url('admin/dokumen/dokumen') ?>#dokumen -->
<div class="row">
    <div class="card w-100 shadow p-0">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4>List Data Dokumen</h4>
                <?php if ($aksesInsert) : ?>
                    <button onclick="location.href='<?= base_url('admin/dokumen/form') ?>'" class="btn btn-primary">Tambahkan Dokumen</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body px-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dt-table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th style="width: 25% !important;">Nama Dokumen</th>
                                <th>Deskripsi</th>
                                <th>Link Dokumen</th>
                                <?php if ($globalAkses) : ?>
                                    <th style="width: 10% !important;"></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dokumen as $u): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u->title ?></td>
                                    <td><?= $u->body ?></td>
                                    <td><a href="<?= $u->link ?? '#' ?>" target="_blank" rel="noopener noreferrer" class="btn btn-info">Buka Dokumen</a></td>
                                    <?php if ($globalAkses) : ?>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-start gap-2">
                                                <?php if ($aksesEdit) : ?>
                                                    <a href="<?= base_url('admin/dokumen/form/' . $u->id); ?>" class="btn btn-warning">
                                                        <i class="fas fa-pen text-dark"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($aksesDelete) : ?>
                                                    <button type="button" onclick="openModalDelete('<?= $u->id ?>')" class="btn btn-danger"
                                                        onclick="return confirm('Yakin ingin hapus user ini?')">
                                                        <i class="fas fa-trash"></i>
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