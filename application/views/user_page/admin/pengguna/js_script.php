<script>
    $('.dt-table').DataTable({
        paging: true,
        searching: true,
        info: true,
        lengthChange: true
    });

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger me-2"
        },
        buttonsStyling: false
    });

    function openModalDelete(status, idPeg) {
        let txtTitle = `Apakah kamu yakin ingin ${(status == 1) ? "menerima" : "menolak"} permintaan ini ?`
        let txtBody = ''

        swalWithBootstrapButtons.fire({
            title: txtTitle,
            text: txtBody,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `<?= base_url('admin/pengguna/verify/'); ?>${status}/${idPeg}`
            }
        });
    }

    function openModalReset(idUser) {
        $('input[name="id_user"]').val(idUser)
        $('#resetPassModal').modal('show')
    }

    function openModalEditHakAkses(rawData) {
        let data = JSON.parse(atob(rawData))
        $('#container-akses').html('')
        $('#id_user_hak_akses').val('')

        $('#id_user_hak_akses').val(data.id)
        let fitur = data.fitur.split(';')
        let is_create = data.is_create.split(';')
        let is_read = data.is_read.split(';')
        let is_update =  data.is_update.split(';')
        let is_delete = data.is_delete.split(';')

        $.each(fitur, function(i, val) {
            $('#container-akses').append(`
                <div class="row mb-3">
                    <div class="col-4">
                        <input type="text" name="fitur[${val}]" value="${val}" class="form-control" readonly>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" name="insert[${val}]" style="border-color: #6b6b6bff !important;" 
                            ${is_create[i] == 1 ? "checked" : ""}>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" name="read[${val}]" style="border-color: #6b6b6bff !important;" 
                            ${is_read[i] == 1 ? "checked" : ""}>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" name="update[${val}]" style="border-color: #6b6b6bff !important;" 
                            ${is_update[i] == 1 ? "checked" : ""}>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" name="delete[${val}]" style="border-color: #6b6b6bff !important;" 
                            ${is_delete[i] == 1 ? "checked" : ""}>
                    </div>
                </div>
            `)
        })

        $('#editUserAKses').modal('show')
    }

    function openModalEdit(rawData) {
        let data = JSON.parse(atob(rawData))

        $('#id_user_edit').val('')
        $('#nama_edit').val('')
        $('#username_edit').val('')
        $('#email_edit').val('')

        $('#id_user_edit').val(data.id)
        $('#nama_edit').val(data.nama)
        $('#username_edit').val(data.username)
        $('#email_edit').val(data.email)

        $('#editUser').modal('show')
    }

    const $rules = $("#password-rules");

    function submitForm() {
        var isValid = true;
        var form = $('#form-submit')[0];
        if (!form.checkValidity()) {
            form.reportValidity();
            isValid = false;
            return false;
        }


        let pass = $("#pass").val();
        let rePass = $("#re-pass").val();
        let rePassHelp = $("#rePassHelp");
        rePassHelp.text("");
        if (rePass.length > 0 && pass !== rePass) {
            rePassHelp.text("Password tidak sama dengan Re-type Password.");
            isValid = false;
        }

        if (!validatePassword()) {
            $rules.stop(true, true).slideDown(300);
            isValid = false;
        }

        if (isValid) {
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

    function submitFormEdit() {
        var isValid = true;
        var form = $('#form-submit-edit')[0];
        if (!form.checkValidity()) {
            form.reportValidity();
            isValid = false;
            return false;
        }

        if (isValid) {
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

    function submitFormEditHakAkses() {
        var isValid = true;
        var form = $('#form-submit-hak-akses')[0];
        if (!form.checkValidity()) {
            form.reportValidity();
            isValid = false;
            return false;
        }

        if (isValid) {
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

    $("#re-pass").on("keyup blur", function() {
        validatePassword();
    });

    $("#pass").on("focus keyup", function() {
        validatePassword();
        $rules.stop(true, true).slideDown(300);
    });

    $("#pass").on("blur", function() {
        $rules.stop(true, true).slideUp(300);
    });

    function validatePassword() {
        let pass = $("#pass").val();
        let passHelp = $("#passHelp");

        // Regex: min 8, ada huruf besar, kecil, angka
        let conCapital = (/[A-Z]/.test(pass));
        let conLower = (/[a-z]/.test(pass));
        let conNum = (/\d/.test(pass));
        let conLength = (pass.length >= 8);

        // Cek huruf besar
        if (conCapital) {
            $("#capital").removeClass("text-danger").addClass("text-success").html(`<i class="fas fa-check-circle me-2"></i> Huruf Besar`);
        } else {
            $("#capital").removeClass("text-success").addClass("text-danger").html(`<i class="fas fa-times-circle me-2"></i> Huruf Besar`);
        }

        // Cek huruf kecil
        if (conLower) {
            $("#lower").removeClass("text-danger").addClass("text-success").html(`<i class="fas fa-check-circle me-2"></i> Huruf Kecil`);
        } else {
            $("#lower").removeClass("text-success").addClass("text-danger").html(`<i class="fas fa-times-circle me-2"></i> Huruf Kecil`);
        }

        // Cek angka
        if (conNum) {
            $("#number").removeClass("text-danger").addClass("text-success").html(`<i class="fas fa-check-circle me-2"></i> Angka`);
        } else {
            $("#number").removeClass("text-success").addClass("text-danger").html(`<i class="fas fa-times-circle me-2"></i> Angka`);
        }

        // Cek panjang
        if (conLength) {
            $("#length").removeClass("text-danger").addClass("text-success").html(`<i class="fas fa-check-circle me-2"></i> 8+ karakter`);
        } else {
            $("#length").removeClass("text-success").addClass("text-danger").html(`<i class="fas fa-times-circle me-2"></i> 8+ karakter`);
        }

        if (conCapital && conLower && conNum && conLength) {
            return true;
        } else {
            return false;
        }
    }

    function handlePassField(e) {
        var $btn = $(e);
        var $inp = $('#pass');
        var $inrep = $('#re-pass');
        var type = $inp.attr('type') === 'password' ? 'text' : 'password';
        var typerep = $inrep.attr('type') === 'password' ? 'text' : 'password';
        $inp.attr('type', type);
        $inrep.attr('type', typerep);

        var $icon = $btn.find('i');

        if (type === 'text') {
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
            $btn.attr('aria-label', 'Hide password');
        } else {
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
            $btn.attr('aria-label', 'Show password');
        }
    }
</script>