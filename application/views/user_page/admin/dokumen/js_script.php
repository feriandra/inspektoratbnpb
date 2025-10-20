<script>
    $(document).ready(function() {
        $('.dt-table').DataTable({
            responsive: true,
            dom: '<"row mb-3"<"col-md-6 d-flex justify-content-start gap-5"l><"col-md-6 d-flex justify-content-end"f>>' +
                'rt' +
                '<"row mt-3"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });

        $('#icon_doc').select2({
            placeholder: "-- Pilih Icon --",
            allowClear: true,
            theme: 'bootstrap-5',
            templateResult: function(state) {
                if (!state.id) {
                    return state.text;
                }
                return $(
                    '<span><i class="' + state.id + '"></i> ' + state.text + '</span>'
                );
            },
            templateSelection: function(state) {
                if (!state.id) {
                    return state.text;
                }
                return $(
                    '<span><i class="' + state.id + '"></i> ' + state.text + '</span>'
                );
            }
        });
    });

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger me-2"
        },
        buttonsStyling: false
    });

    function openModalDelete(idDok) {
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
                location.href = `<?= base_url('admin/dokumen/delete/'); ?>${idDok}`
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

    const $rawData = <?= json_encode($dokumen ?? null, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
    renderData($rawData)

    function renderData(data = null) {
        resetData()
        if (data) {
            $('input[name="id_dokumen"]').val(data.id)
            $('input[name="title_doc"]').val(data.title)
            $('input[name="desc_doc"]').val(data.body)
            $('select[name="icon_doc"]').val(data.icon).trigger('change')
            $('input[name="link_doc"]').val(data.link)

            if (data.is_showing == 1) {
                $('input[name="is_showing"]').prop('checked', true)
            } else {
                $('input[name="is_showing"]').prop('checked', false)
            }
        }
    }

    function resetData() {
        $('input[name="id_dokumen"]').val('')
        $('input[name="title_doc"]').val('')
        $('input[name="desc_doc"]').val('')
        $('select[name="icon_doc"]').val('').trigger('change')
        $('input[name="link_doc"]').val('')
        $('input[name="is_showing"]').prop('checked', false)
    }
</script>