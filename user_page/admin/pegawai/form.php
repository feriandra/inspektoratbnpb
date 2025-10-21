<div class="row">
    <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

        <div class="card w-100 shadow">
            <div class="card-body">
                <form action="<?= base_url('admin/pegawai/submit'); ?>" method="POST" id="form-submit">
                    <input type="hidden" name="id_pegawai" value="">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <select name="unit" class="form-select">
                            <option value="">-- Pilih Unit --</option>
                            <option value="Inspektorat I">Inspektorat I</option>
                            <option value="Inspektorat II">Inspektorat II</option>
                            <option value="Inspektorat III">Inspektorat III</option>
                            <option value="Tata Usaha">Tata Usaha</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="number" class="form-control" id="nip" name="nip">
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="jabatan" class="form-select">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="Inspektur I">Inspektur I</option>
                            <option value="Inspektur II">Inspektur II</option>
                            <option value="Plt. Inspektur III">Plt. Inspektur III</option>
                            <option value="Auditor Ahli Madya">Auditor Ahli Madya</option>
                            <option value="Auditor Ahli Muda">Auditor Ahli Muda</option>
                            <option value="Auditor Ahli Pertama">Auditor Ahli Pertama</option>
                            <option value="Auditor Mahir">Auditor Mahir</option>
                            <option value="Auditor Terampil">Auditor Terampil</option>
                            <option value="Kepala Bagian Tata Usaha">Kepala Bagian Tata Usaha</option>
                            <option value="Analis Keuangan APBN Ahli Muda">Analis Keuangan APBN Ahli Muda</option>
                            <option value="Perencana Ahli Muda">Perencana Ahli Muda</option>
                            <option value="Penata Layanan Operasional">Penata Layanan Operasional</option>
                            <option value="Arsiparis Mahir">Arsiparis Mahir</option>
                            <option value="Pengolah Data dan Informasi">Pengolah Data dan Informasi</option>
                            <option value="Pranata Komputer Terampil">Pranata Komputer Terampil</option>
                            <option value="Arsiparis Terampil">Arsiparis Terampil</option>
                            <option value="Tenaga Administrasi">Tenaga Administrasi</option>
                            <option value="Tenaga Pengemudi Operasional">Tenaga Pengemudi Operasional</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="golongan" class="form-label">Golongan / Pangkat</label>
                        <select name="golongan" class="form-select">
                            <option value="">-- Pilih Golongan --</option>
                            <option>Pembina Utama Muda (IV/c)</option>
                            <option>Pembina Utama Madya (IV/d)</option>
                            <option>Pembina (IV/a)</option>
                            <option>Penata Tk. I (III/d)</option>
                            <option>Penata (III/c)</option>
                            <option>Penata Muda Tk. I (III/b)</option>
                            <option>Penata Muda (III/a)</option>
                            <option>Pengatur Tk. I (II/d)</option>
                            <option>Pengatur (II/c)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sertifikasi" class="form-label">Sertifikasi JFA</label>
                        <select class="form-select" id="sertifikasi" name="sertifikasi">
                            <option value="">-- Pilih Sertifikasi --</option>
                            <option value="Auditor Madya">Auditor Madya</option>
                            <option value="Auditor Mahir">Auditor Mahir</option>
                            <option value="Auditor Muda">Auditor Muda</option>
                            <option value="Auditor Pertama">Auditor Pertama</option>
                            <option value="Auditor Terampil">Auditor Terampil</option>
                            <option value="Non JFA">Auditor Terampil</option>
                            <option value="Belum sertifikasi">Belum sertifikasi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pengalaman" class="form-label">Pengalaman Kerja</label>
                        <input type="int" class="form-control" id="pengalaman" name="pengalaman" placeholder="contoh: 5 tahun ditulis 5">
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