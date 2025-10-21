<script>
    $(document).ready(function() {
        $('.dt-table').DataTable({
            responsive: true,
            dom: '<"row mb-2"<"col-12 d-flex justify-content-end"B>>' +
                '<"row mb-3"<"col-md-6 d-flex justify-content-start gap-5"l><"col-md-6 d-flex justify-content-end"f>>' +
                'rt' +
                '<"row mt-3"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
            buttons: [{
                    extend: 'excelHtml5',
                    className: 'btn btn-success btn-sm ms-2 px-3 py-2 rounded-1',
                    text: '<i class="fas fa-file-excel"></i> Excel'
                },
                {
                    extend: 'pdfHtml5',
                    className: 'btn btn-danger btn-sm ms-2 px-3 py-2 rounded-1',
                    text: '<i class="fas fa-file-pdf"></i> PDF'
                },
                {
                    extend: 'print',
                    className: 'btn btn-secondary btn-sm ms-2 px-3 py-2 rounded-1',
                    text: '<i class="fas fa-print"></i> Print'
                }
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger me-2"
        },
        buttonsStyling: false
    });

    function openModalDelete(idPegawai) {
        swalWithBootstrapButtons.fire({
            title: `Apakah kamu yakin ingin menghapus pegawai ini ?`,
            text: "Ini akan menghapus data pegawai secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `<?= base_url('admin/pegawai/delete/'); ?>${idPegawai}`
            }
        });
    }
</script>

<script>
    function submitForm() {
        var isValid = true;
        var form = $('#form-submit')[0];
        if (!form.checkValidity()) {
            form.reportValidity();
            isValid = false;
            return false;
        }

        if (isValid) {
            $('#main-modal').modal('hide')
            Swal.fire({
                title: "Menyimpan...",
                html: "Mohon ditunggu, sistem sedang menyimpan data anda...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            form.submit();
        }
    }

    const $rawData = <?= json_encode($pegawai ?? null, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
    renderData($rawData)

    function renderData(data = null) {
        resetData()
        if (data) {
            $('input[name="id_pegawai"]').val(data.id)
            $('input[name="nama"]').val(data.nama)
            $('input[name="nip"]').val(data.nip)
            $('input[name="pengalaman"]').val(data.pengalaman_kerja)

            $('select[name="unit"]').val(data.unit).trigger('change')
            $('select[name="jabatan"]').val(data.jabatan).trigger('change')
            $('select[name="golongan"]').val(data.golongan_pangkat).trigger('change')
            $('select[name="sertifikasi"]').val(data.sertifikasi_jfa).trigger('change')
        }
    }

    function resetData() {
        $('input[name="id_pegawai"]').val('')
        $('input[name="nama"]').val('')
        $('input[name="nip"]').val('')
        $('input[name="pengalaman"]').val('')

        $('select[name="unit"]').val('').trigger('change')
        $('select[name="jabatan"]').val('').trigger('change')
        $('select[name="golongan"]').val('').trigger('change')
        $('select[name="sertifikasi"]').val('').trigger('change')
    }
</script>