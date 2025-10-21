<div class="row">
    <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

        <div class="card w-100 shadow">
            <div class="card-body">
                <form action="<?= base_url('admin/dokumen/submit'); ?>" method="POST" id="form-submit">
                    <input type="hidden" name="id_dokumen" value="">
                    <div class="mb-3">
                        <label for="title_doc" class="form-label">Nama Dokumen</label>
                        <input type="text" class="form-control" id="title_doc" name="title_doc" required>
                    </div>

                    <div class="mb-3">
                        <label for="desc_doc" class="form-label">Deskripsi Singkat</label>
                        <input type="text" class="form-control" id="desc_doc" name="desc_doc">
                    </div>

                    <div class="mb-3">
                        <label for="icon_doc" class="form-label">Icon</label>
                        <select name="icon_doc" id="icon_doc" class="form-select">
                            <option value=""></option>
                            <?php foreach ($list_icons_fa as $itemIcon) : ?>
                                <option value="fa-solid fa-<?= $itemIcon ?>">
                                    <i class="fa-solid fa-<?= $itemIcon ?>"></i>
                                    fa-<?= $itemIcon ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="link_doc" class="form-label">Link Dokumen</label>
                        <input type="text" class="form-control" id="link_doc" name="link_doc">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Apakah anda ingin menampilkan dokumen ini di homepage ?</label>
                        <div class="square-switch">
                            <input type="checkbox" id="is_showing" switch="bool" name="is_showing" checked="">
                            <label for="is_showing" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" onclick="window.history.back()">Kembali</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Simpan</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
