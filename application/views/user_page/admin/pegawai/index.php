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
        if ($x->fitur == 'pegawai') {
            if ($x->is_create == 1) $aksesInsert = true;
            if ($x->is_update == 1) $aksesEdit = true;
            if ($x->is_delete == 1) $aksesDelete = true;
        }
    }
}

$globalAkses = ($aksesEdit || $aksesDelete);
?>

<div class="row">
    <div class="card w-100 shadow p-0">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4>List Data Pegawai</h4>
                <?php if ($aksesInsert) : ?>
                    <button onclick="location.href='<?= base_url('admin/pegawai/form') ?>'" class="btn btn-primary">Tambahkan Pegawai</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body px-4">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dt-table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th style="width: 25% !important;">Nama</th>
                                <th>NIP</th>
                                <th>Unit</th>
                                <th>Jabatan & <br> Gol. Pangkat</th>
                                <th>Sertifikat</th>
                                <th>Pengalaman Kerja</th>
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
                                    <td><?= $u->nama ?></td>
                                    <td><?= $u->nip ?></td>
                                    <td><?= $u->unit ?></td>
                                    <td><?= $u->jabatan ?> <br> <?= $u->golongan_pangkat ?></td>
                                    <td><?= $u->sertifikasi_jfa ?></td>
                                    <td><?= $u->pengalaman_kerja ?> Tahun</td>
                                    <?php if ($globalAkses) : ?>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-start gap-2">
                                                <?php if ($aksesEdit) : ?>
                                                    <a href="<?= base_url('admin/pegawai/form/' . $u->id); ?>" class="btn btn-warning">
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